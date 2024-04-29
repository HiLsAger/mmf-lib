<?php

namespace Hilsager\MmfLib\Classes;

use Exception;

class DateBase
{
    public string $driver;

    public string $host;

    public string $user;

    public string $password;

    public string $db_name;

    public function load(array $db): bool
    {
        foreach ($db as $key => $item)
            if (isset($this->$key)) $this->$key = $item;
            else throw new Exception("");
        return true;
    }
}
