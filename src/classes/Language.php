<?php

namespace HiLsAger\MMF\classes;

use class\interfaces\InterfacesLanguage;

class Language implements InterfacesLanguage
{

    /**
     * Поиск значелия свойства
     * 
     * @property string $property Значение для поиска в файле локализации
     * @property string $class Название класса для поиска
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

        $childClass = get_called_class();

        return $childClass::$$property;
    }
}
