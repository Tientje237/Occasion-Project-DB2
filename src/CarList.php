<?php

namespace Occasion;

use Occasion\Coupe;
use Occasion\MySql;
use Occasion\Sedan;
use Occasion\StationWagon;
use Occasion\SUV;



class CarList
{
    private array $cars = [];

    public function addVehicle(Car $car)
    {
        $this->cars[] = $car;
    }

    public function getAllCars(): array
    {
        // Haal auto's op uit de database

        $carRecords = Db::$db->select('car', ['*']);
        // Verwerk elke auto
        foreach ($carRecords as $carRecord) {
            switch (strtolower($carRecord['carrosserie'])) {
                case 'stationwagon':
                    $this->cars[] = new StationWagon($carRecord);
                    break;
                case 'suv':
                    $this->cars[] = new SUV($carRecord);
                    break;
                case 'sedan':
                    $this->cars[] = new Sedan($carRecord);
                    break;
                case 'coupe':
                    $this->cars[] = new Coupe($carRecord);
                    break;
            }
        }

        return $this->cars;
    }

    public function searchCars(string $term): array
    {

        $carData  = Db::$db->select('car', ['*'], "brand LIKE '%$term%' OR model LIKE '%$term%'")[0] ?? null;
        if (!$carData) {
            return [];
        }

        // Verwerk elke auto in de resultaten
        foreach ($carData as $carDetail) {
            if (!is_array($carDetail)) {
                continue; // Sla items over die geen arrays zijn
            }
            switch (strtolower($carDetail['carrosserie'] ?? '')) {
                case 'stationwagon':
                    $this->cars[] = new StationWagon($carDetail);
                    break;
                case 'suv':
                    $this->cars[] = new SUV($carDetail);
                    break;
                case 'sedan':
                    $this->cars[] = new Sedan($carDetail);
                    break;
                case 'coupe':
                    $this->cars[] = new Coupe($carDetail);
                    break;
            }
        }

        return $this->cars;
    }






    public function getCarById(int $carId): ?Car
    {
        foreach ($this->cars as $car) {
            if ($car->getId() === $carId) {
                return $car;
            }
        }
        return null;
    }


}

?>
