<?php

class CustomersRepository
{

    public function whoMatch($specification)
    {

        return $specification->asScope(Customer::query())->get();

    }

    public function all()
    {
        return Customer::all();
    }

}