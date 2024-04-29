<?php

namespace Hilsager\MmfLib\Classes\Interfaces;

interface InterfacesLanguage
{
    public static function getProperty(string $property, array|string|null $pattern, array|string|null $values): string;
}
