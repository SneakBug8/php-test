<?php

new Config(basePath() . "../conf/conf.ini");

class Config
{
    private $_config = array();
    public static $Instance;
    public function __construct($path)
    {
        $this->LoadIni($path);

        Config::$Instance = $this;
    }

    public function GetKey($key)
    {
        if (isset($this->_config[$key])) {
            return $this->_config[$key];
        } else {
            return null;
        }
    }

    public function LoadIni($path)
    {
        $path = realpath($path);

        if ($path) {
            $this->_config = parse_ini_file($path);
        } else {
            error(500, "Wrong path for config");
        }
    }
}

function conf($key)
{
    return Config::$Instance->GetKey($key);
}

function basePath()
{
    return $_SERVER['DOCUMENT_ROOT'] . "/src/";
}

function viewsPath()
{
    return $_SERVER['DOCUMENT_ROOT'] . "/views/";
}

function error($code, $message)
{
    @header("HTTP/1.0 {$code} {$message}", true, $code);
    die($message);
}
