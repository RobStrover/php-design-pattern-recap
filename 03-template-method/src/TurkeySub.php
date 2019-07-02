<?php


namespace Acme;


class TurkeySub extends Sub
{

    public function addPrimaryToppings()
    {

        var_dump('Get ready to gobble some Turkey');

        return $this;

    }

}