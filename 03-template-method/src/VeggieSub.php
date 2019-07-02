<?php


namespace Acme;


class VeggieSub extends Sub
{

    public function addPrimaryToppings()
    {

        var_dump('Ohhhh boy, here come the veggies');

        return $this;

    }

}