<?php

interface CarService {
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService {

    public function getCost()
    {
        return 20;
    }

    public function getDescription()
    {
        return 'A basic inspection.';
    }


}

class OilChange implements CarService {

    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


    public function getCost()
    {
        return 35 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' And change that oil!';
    }


}

class TireRotation implements CarService {

    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' And turn those wheels!';
    }


}

$service = new OilChange(new TireRotation(new BasicInspection));

echo $service->getCost() . ' ' . $service->getDescription();