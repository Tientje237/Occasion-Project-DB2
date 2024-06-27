<?php

namespace Occasion;

use PDO;

class User {
    protected int $id;
    protected string $email;
    protected string $passwordHash;
    protected int $isAdmin;

    public function __construct(int $id = null, string $email = '', string $passwordHash = '', int $isAdmin = 0) {
        if ($id !== null) {
            $this->id = $id;
        }
        if ($email !== '') {
            $this->email = $email;
        }
        if ($passwordHash !== '') {
            $this->passwordHash = $passwordHash;
        }
        $this->isAdmin = $isAdmin;
    }

    public static function registerUser(string $email, string $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'Email' => $email,
            'PasswordHash' => $passwordHash
        ];
        return Db::$db->insert('users', $data);
    }

    public static function loginUser(string $email, string $password): User|null
    {
        $user = Db::$db->select('users', ['UserID', 'Email', 'PasswordHash', 'IsAdmin'], "Email = '$email'")[0] ?? null;
        if ($user && password_verify($password, $user['PasswordHash'])) {
            $userID = $user['UserID'];
            Db::$db->update('users', ['LastLogin' => 'CURRENT_TIMESTAMP'], "UserID = '$userID'");

            return new User($user['UserID'], $user['Email'], $user['PasswordHash'], $user['IsAdmin']);
        }
        return null;
    }

    public static function findById(int $id): ?self {
        $result = Db::$db->select('users', ['*'], "UserID = $id")[0] ?? null;
        if ($result) {
            return new self($result['UserID'], $result['Email'], $result['PasswordHash']);
        }
        return null;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin == 1;
    }


}
?>
