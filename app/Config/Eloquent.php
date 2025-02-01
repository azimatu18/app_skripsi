<?php

namespace Config;

use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent
{
    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => env('database.default.hostname', '127.0.0.1'),
            'database'  => env('database.default.database', 'ci4_db'),
            'username'  => env('database.default.username', 'root'),
            'password'  => env('database.default.password', ''),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ]);

        // Set Eloquent sebagai ORM default
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
