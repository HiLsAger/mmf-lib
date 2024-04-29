<?php

namespace Hilsager\MmfLib\Classes;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Exception;
use Hilsager\MmfLib\Languages\Exceptions\ExceptionLanguage;

class Application
{

    /**
     * Получить конфигурацию приложения
     * 
     * @property string $property
     * 
     * @return array
     */
    static public function getConfig(string $property = null): array
    {
        $config = require BASE_PATH_WWW . '/configs/application.config.php';

        if ($property && isset($config[$property]))
            return $config[$property];
        else
            return $config;
    }

    /**
     * Запуск приложения
     */
    public function begin()
    {
        DBConnect::connect(self::getConfig('db'));
        $this->startController();
    }

    /**
     * Подключение системных файлов
     */
    private function includeClasses()
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(BASE_PATH_CLASSES));

        foreach ($iterator as $file) {
            if (
                $file->isFile() &&
                $file->getExtension() === 'php' &&
                basename($file) !== 'Application.php'
            ) {
                require_once $file;
            }
        }
    }

    /**
     * Поиск и запуск контроллера
     */
    private function startController()
    {
        /* Определение пути запроса */
        $page = strtok($_SERVER['REQUEST_URI'], '?');
        $page = substr($page, 1);

        /* Разделение пути запроса */
        $pages = explode('/', $page);

        /* Поиск и запуск контроллера */
        if (count($pages) >= 2) {
            $words = explode('-', $pages[0]);
            $controllerName = implode('', array_map('ucfirst', $words));
            if (file_exists("Hilsager\\MmfLib\\Controllers\\{$controllerName}.php")) {
                $className = 'Hilsager\\MmfLib\\Controllers\\' . $controllerName;

                if (class_exists($className)) {
                    $class = new $className;

                    $convert_function = ucwords(
                        str_replace(' ', '', str_replace('-', ' ', $pages[1]))
                    );

                    if (method_exists($class, $convert_function)) {
                        $class->{$convert_function}();
                        return true;
                    }
                }
            }
        } elseif (count($pages) == 1 && !$pages[0]) {
            $home = self::getConfig('home');

            if (class_exists($home['controller'])) {
                
                $class = new $home['controller'];

                if (method_exists($class, $home['action'])) {
                    $class->{$home['action']}();
                    return true;
                }
            }
        }
        throw new Exception(ExceptionLanguage::getProperty('unknown_controller'));
    }
}
