<?php
    class Connect {
        public static function start() {
            $pdo = new PDO('mysql:host=localhost;dbname=out-placement', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>
