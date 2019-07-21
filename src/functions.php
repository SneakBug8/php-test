<?php

set_include_path(__DIR__);

$config = new Config();
$config->LoadIni(__DIR__ . "/../conf/conf.ini");

require_once "functions/filler.php";
require_once "functions/request.php";
require_once "functions/cms.php";
require_once "functions/posts.php";

class Config
{
    private $_config = array();

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
    global $config;
    return $config->GetKey($key);
}

function error($code, $message)
{
    @header("HTTP/1.0 {$code} {$message}", true, $code);
    die($message);
}
