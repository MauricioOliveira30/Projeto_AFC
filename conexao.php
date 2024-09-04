<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$senha = "1234";
$bd = "bdsje";
global $con;
try {
    $con = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $senha);
} catch (PDOException $e) {
    echo"Não foi possivel acessar o banco".$e->getMessage();
    exit;
}
