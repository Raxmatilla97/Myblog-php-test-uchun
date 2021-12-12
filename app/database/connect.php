<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'myblog';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $options
    );

    echo '<img style="width: 150px;" src="https://social16.com/themes/social16/reaction/like.gif"> <br>';
    echo "Ma'lumotlar omboriga ulanish mavjud! Xech qanday xatolik yo'q!";

} catch (PDOException $i) {

    echo '<img style="width: 150px;" src="https://ucarecdn.com/e0a5b7b8-33ad-4304-9c1c-0253f97bf48c/"> <br>';    
    die("Ma'lumotlar omboriga ulanishda xatolik yuz berdi!");
}