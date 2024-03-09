<?php

class conexion extends mysqli
{

    public function __construct()
    {
        parent::__construct('localhost', 'root', '', 'api_web');

        $this->set_charset('utf8');

        if ($this->connect_error !== null) {
            throw new Exception("conexion Error" . $this->connect_error);
        }

        http_response_code(200);
    }
}
