<?php

require_once "vendor/autoload.php";

use Occasion\Car;
use Occasion\Db;
use Occasion\User;
use Smarty\Smarty;
use Occasion\CarList;

session_start();


$database = new Db();

$action = $_GET['action'] ?? null;
$user = $_SESSION['user'] ?? null;

$template = new Smarty();
$template->setTemplateDir("templates");
$template->clearCompiledTemplate();
$template->clearAllCache();


echo "Occasion site<br>";

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->isAdmin()) {
        echo "<td><a href='index.php?action=admin'>Admin Dashboard</a><br></td>";
    }
    echo "<td><a href='index.php?action=aanbod'>Aanbod</a><br></td>";
    echo "<td><a href='index.php?action=favorieten'>Favorieten</a><br></td>";
    echo "<td><a href='index.php?action=zoeken'>Zoeken</a><br></td>";
    echo "<td><a href='index.php?action=logout'>Uitloggen</a><br></td>";
} else {
    echo "<td><a href='index.php?action=aanbod'>Aanbod</a><br></td>";
    echo "<td><a href='index.php?action=favorieten'>Favorieten</a><br></td>";
    echo "<td><a href='index.php?action=zoeken'>Zoeken</a><br></td>";
    echo "<td><a href='index.php?action=login'>Inloggen</a><br></td>";
    echo "<td><a href='index.php?action=register'>Registreren</a><br></td>";
}
echo "<br><br>";



$carList = new CarList();

switch($action)
{
    case "detailpagina":
        $car_id = $_GET['id'] ?? null;
        if ($car_id) {
            $car = Car::getDetail($car_id);

            if ($car) {
                // Voeg logica toe voor favorieten toevoegen indien nodig
                $is_favorite = false;
                if (isset($_SESSION['user_id'])) {
                    $favorites = $user->getFavorites();
                    if (in_array($car_id, $favorites)) {
                        $is_favorite = true;
                    }
                }

                $template->assign('car', $car);
                $template->assign('is_favorite', $is_favorite);
                $template->display("CarDetails.tpl");
            } else {
                echo "Auto niet gevonden.";
            }
        } else {
            echo "Geen auto ID opgegeven.";
        }
        break;


    case "aanbod":
        $cars = $carList->getAllCars();
        $template->assign('cars', $cars);
        $template->display("CarList.tpl");
        break;


    case "admin":
        if (!$user || !$user->isAdmin()) {
            echo "Access denied. Admin privileges required.";
            exit;
        }

        echo "<h1>Admin Dashboard</h1>";
        echo "<h2>Je kan hier het aanbod beheren door voertuigen te verwijderen</h2>";
        $cars = $carList->getAllCars();
        $template->assign('cars', $cars);
        $template->display("AdminList.tpl");
        break;

    case "verwijderen":
        if (!$user || !$user->isAdmin()) {
            echo "Access denied. Admin privileges required.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['car_id'])) {
            $car_id = $_POST['car_id'];

            $car = Car::getDetail($car_id);
            if ($car) {
                $deleted = $car->deleteCar("$car_id");
                if ($deleted) {
                    echo "Auto met ID {$car_id} succesvol verwijderd.";
                } else {
                    echo "Fout bij het verwijderen van de auto met ID {$car_id}.";
                }
            } else {
                echo "Auto niet gevonden.";
            }
        } else {
            echo "Ongeldige aanvraag voor verwijderen.";
        }
        break;



    case "zoeken":
        $searchResults = [];
        $term = "";
        if (isset($_POST['searchTerm'])) {
            $term = $_POST['searchTerm'];
            $carList = new CarList();
            $searchResults = $carList->searchCars($term);
        }

        $template->assign('searchResults', $searchResults);
        $template->assign('searchTerm', $term);
        $template->display("SearchForm.tpl");
        break;


    case "favorieten":
        if (!isset($_SESSION['user_id'])) {
            echo "Log in om favorieten te beheren.";
            exit;
        }
        $user_id = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['car_id'])) {
            $car_id = $_POST['car_id'];

            if (isset($_POST['remove'])) {
                $stmt = $pdo->prepare('DELETE FROM Favorites WHERE UserID = ? AND CarID = ?');
                $stmt->execute([$user_id, $car_id]);
            } else {
                $stmt_check = $pdo->prepare('SELECT COUNT(*) FROM Favorites WHERE UserID = ? AND CarID = ?');
                $stmt_check->execute([$user_id, $car_id]);
                $is_favorite = (bool) $stmt_check->fetchColumn();

                if (!$is_favorite) {
                    $stmt = $pdo->prepare('INSERT INTO Favorites (UserID, CarID) VALUES (?, ?)');
                    $stmt->execute([$user_id, $car_id]);
                }
            }

            header('Location: index.php?action=favorieten');
            exit();
        }

        $stmt = $pdo->prepare('SELECT Car.* FROM Car JOIN Favorites ON Car.ID = Favorites.CarID WHERE Favorites.UserID = ?');
        $stmt->execute([$user_id]);
        $favorites = $stmt->fetchAll();
        $template->assign('favorites', $favorites);
        $template->display("Favorites.tpl");
        break;


    case "register":
        $success = '';
        $error = '';
        if (!empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                if ($_POST['password1'] == $_POST['password2']) {
                    $email = $_POST['email'];
                    $password = $_POST['password1'];


                    $registered = User::registerUser($email, $password);

                    if ($registered) {
                        $success = 'User registered successfully.';
                        header('Location: index.php?action=login', true, 303);
                        exit();
                    } else {
                        $error = 'Failed to register user.';
                    }
                } else {
                    $error = 'Passwords do not match.';
                }
            } else {
                $error = 'Invalid email address.';
            }
        } else {
            $error = 'All fields are required.';
        }
        $template->assign('success', $success);
        $template->assign('error', $error);
        $template->display("RegisterForm.tpl");
        break;

    case "login":
        $template->display("LoginForm.tpl");
        $success = '';
        $error = '';

        if (!empty($_POST['email']) && !empty($_POST['password1'])) {
            $email = $_POST['email'];
            $password = $_POST['password1'];

            $user = User::loginUser($email, $password);
            // van array object van user maken

            if ($user) {
                $_SESSION['user'] = $user;
                $success = 'User logged in successfully.';
                header('Location: index.php?action=aanbod', true, 303);
                exit();
            } else {
                $error = 'Invalid email or password.';
            }
        } else {
            $error = 'All fields are required.';
        }

        $template->assign('success', $success);
        $template->assign('error', $error);
        break;


    case "logout":
        session_unset();
        session_destroy();
        header('Location: index.php?action=aanbod', true, 303);
        exit();

    default:
        $template->display("Layout.tpl");
}
?>
