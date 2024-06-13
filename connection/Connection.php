<?php

    class Connection extends Mysqli {
        function __construct() {
            parent::__construct('localhost', 'root', '', 'luzes');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Conexão foi um sucesso' : die('Erro ao conectar com o Banco de dados');
        }//end __construct
    }//end class Connection