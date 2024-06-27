<?php

namespace Occasion;

class Sedan extends Car
{
    private string $carrosserie;

    public function __construct(array $data)
    {
        parent::__construct(
            $data['ID'],
            $data['brand'],
            $data['model'],
            $data['price'],
            $data['horsepower'],
            $data['mileage'],
            $data['year'],
            $data['color'],
            $data['fueltype'],
            $data['interior'],
            $data['transmission'],
            $data['seats'],
            $data['specifications']
        );
        $this->carrosserie = 'Sedan';
    }

    public function printVehicleInfo(): string
    {
        return "$this->brand $this->model <br> €$this->price | $this->year | $this->mileage km<br><br>";
    }

    public function vehicleDetails(): string
    {
        return "$this->brand $this->model <br> €$this->price <br> $this->hpower pk <br> $this->mileage km<br> Datum Deel 1: $this->year <br> Carrosserie: $this->carrosserie <br> Kleur: $this->color <br> Brandstof: $this->fueltype <br> Interieur: $this->Interior <br> Transmissie: $this->transmission <br> Aantal stoelen: $this->seats <br> Specificaties: $this->specifications <br><br>";
    }
}

?>
