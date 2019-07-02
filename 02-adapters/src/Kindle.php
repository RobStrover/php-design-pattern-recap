<?php


namespace Acme;


class Kindle implements eReaderInterface
{

    public function turnOn()
    {

        var_dump('turn the kindle on');

    }

    public function pressNextButton()
    {

        var_dump('press the button on the side');

    }

}