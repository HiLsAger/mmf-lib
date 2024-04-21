<?php

namespace HiLsAger\MMF\classes\interfaces;

interface InterfacesLanguage
{
    public static function getProperty(string $property, array|string|null $pattern, array|string|null $values): string;
}
