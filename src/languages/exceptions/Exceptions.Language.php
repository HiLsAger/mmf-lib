<?php

namespace Hilsager\MmfLib\Languages\Exceptions;

use Hilsager\MmfLib\Classes\Application;
use Hilsager\MmfLib\Classes\Interfaces\InterfacesLanguage;

class ExceptionLanguage implements InterfacesLanguage
{
    /**
     * Поиск значения свойства
     * 
     * @property string $property Значение для поиска в файле локализации
     * @property string $pattern Список заменяемых паттернов
     * @property string $values Список значений для замены
     * 
     * @return string Строка со значением локализации
     */
    public static function getProperty(
        string $property,
        array|string|null $pattern = null,
        array|string|null $values = null
    ): string {
        exit;
        $local = Application::getConfig('local')[0];

        $childClass = "Hilsager\\MmfLib\\Languages\\Exceptions$local";
        return $childClass::$$property;
    }
}
