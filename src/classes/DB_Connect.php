<?php

namespace HiLsAger\MMF\classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class DBConnect
{
    /**
     * Подключение к базе данных
     */
    public static function connect(array $config): void
    {
        $capsule = new Capsule();

        $capsule->addConnection($config);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
