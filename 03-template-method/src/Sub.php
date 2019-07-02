<?php


namespace Acme;


abstract class Sub
{

    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    protected function layBread()
    {

        var_dump('Throw down some bread');

        return $this;

    }

    protected function addLettuce()
    {

        var_dump('Bang in some lettooose');

        return $this;

    }

    protected function addSauces()
    {

        var_dump('It\'s sowce time');

        return $this;

    }

    protected abstract function addPrimaryToppings();

}