<?php

namespace App;


/**
 * Class Kernel
 * @package App
 */
class Kernel
{
    /**
     * @var App
     */
    static $app;
    /**
     * @var bool
     */
    static $is_init = false;

    /**
     * @return App
     */
    public static function app()
    {
        if (self::$is_init) {
            return self::$app;
        }
        self::$is_init = true;
        self::$app = new App();
        return self::$app;
    }

    public static function getMessageTemplate($template_name)
    {
        $templates = require '../templates/messages.tpl.php';

        return isset($templates[$template_name]) ? $templates[$template_name] : '';
    }

    public static function getDic($name = 'default')
    {
        if (file_exists('../dictionaries/' . $name . '.php')) {
            return require "../dictionaries/$name.php";
        }
        return '';
    }
}