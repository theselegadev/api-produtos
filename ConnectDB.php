<?php
    class ConnectDB{
        private static $Connect;

        public static function getConnect(){
            
            if(!isset(self::$Connect)){
                try{
                    self::$Connect = new \PDO("mysql:host=localhost;dbname=loja","root","");
                    self::$Connect->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
                }catch(\PDOException $e){
                    die("Erro: ". $e->getMessage());
                }
            }

            return self::$Connect;
        }   
    }