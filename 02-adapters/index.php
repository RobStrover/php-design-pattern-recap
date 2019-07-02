<?php

require 'vendor/autoload.php';

use Acme\Book;
use Acme\Kindle;
use Acme\Nook;
use Acme\BookInterface;
use Acme\eReaderAdapter;

Class Person {

    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }

}

(new Person)->read(new eReaderAdapter(new Nook()));