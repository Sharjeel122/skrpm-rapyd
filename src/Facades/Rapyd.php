<?php

namespace skrpm\rapyd\Facades;

use Illuminate\Support\Facades\Facade;

class Rapyd extends Facade{

    public static function getFacadeAccessor()
    {
        return "rpm";
    }
}
