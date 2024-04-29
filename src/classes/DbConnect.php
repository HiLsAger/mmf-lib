<?php

namespace Hilsager\MmfLib\Classes;

use Illuminate\Database\Capsule\Manager;

class DBConnect
{
    /**
     * Подключение к базе данных
     */
    public static function connect(array $config): void
    {
        $capsule = new Manager();

        $capsule->addConnection($config);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
