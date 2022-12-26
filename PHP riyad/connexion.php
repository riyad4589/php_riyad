<?php
$dsn = 'mysql:host=localhost;dbname=db_nobel;charset=utf8';
$user = 'root';
$pass = '';

try{
    $db = new PDO($dsn, $user, $pass);

    // $sql = file_get_contents('dbNobel.sql');

    // $qr = $db->exec($sql);

}catch(PDOExeception $e){
    echo 'erreur connexion';
}

?>