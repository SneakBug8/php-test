<?php

class Subscription {
    private $conn;

    protected static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Subscription();
        }

        return self::$instance;
    }

    public function __construct() {
        Config::getInstance()->LoadIni(basePath() . "../conf/mysql.ini");

        $this->conn = mysqli_connect(
            conf("mysql_server"),
            conf("mysql_user"),
            conf("mysql_password"),
            conf("mysql_database")
        );
    }

    public function addSubscriber($email) {
        $res = mysqli_query($this->conn, "INSERT INTO `subscribers` (email) VALUES (" . $email . ")");

        if ($res) {
            // success
        }
        else {
            // error
        }
    }

    public static function getController()
    {
        return function ($request, $response, $service) {
            if ($response->isSent()) {
                return;
            }

            $email = $request->query("email");

            if ($email) {
                self::getInstance()->addSubscriber($email);
            }

            $redirect = $request->query("redirect");

            if ($redirect) {
                $response->redirect($redirect);
            }
        };
    }
}

?>