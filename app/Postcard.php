<?php

namespace App;

class Postcard
{

    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {

        return self::resolveFacade('Postcard')->$method(...$arguments);
        //dump(app()->make('Postcard'));
        //dump(app()->Postcard);
        //dump($name);
        //dump($arguments);
    }

    // public static function any()
    // {
    //     dump('inside');
    // }
}
