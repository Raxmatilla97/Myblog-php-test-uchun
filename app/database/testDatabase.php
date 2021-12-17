<?php
// Ma'lumotlar omborini import qilib olamiz
require_once "connect.php";

// Test qilish uchun funksiya
function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function testPdo(){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users (admin, username, email, password) VALUES (:admin, :username, :email, :password)");
    $stmt->bindParam(':admin', $admin);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // birinchi ma'lumotlar to'plamini kiritamiz
    $admin = 1;
    $username = "Bekzod";
    $email = "birnima22333@mail.ru";
    $password = "456456456";
    $stmt->execute();

    //    test($stmt);
    //    exit();

    // Ikkinchi ma'lumotlar to'plamini kiritiamiz
    $admin = 1;
    $username = "Bekzod";
    $email = "birnima22333@mail.ru";
    $password = "456456456";
    $stmt->execute();

    //    test($stmt);
    //    exit();
}




function testPdo2(){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users (admin, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $admin);
    $stmt->bindParam(2, $username);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $password);


    // birinchi ma'lumotlar to'plamini kiritamiz
    $admin = 1;
    $username = "Bekzod1";
    $email = "birnima22333@mail.ru";
    $password = "456456456";
    $stmt->execute();

    //    test($stmt);
    //    exit();

    // Ikkinchi ma'lumotlar to'plamini kiritiamiz
    $admin = 1;
    $username = "Bekzod2";
    $email = "birnima22333@mail.ru";
    $password = "456456456";
    $stmt->execute();
}


function testPdo3(){
    global $pdo;
    //http://127.0.0.1:4080/app/database/testDatabase.php?user=Bekzod2
    $stmt = $pdo->prepare("SELECT * FROM users where username = ?");
    $stmt->execute([$_GET['user']]);
    foreach ($stmt as $row) {
        test($row);
    }
}

function testPdo4(){
    global $pdo;
    $stmt = $pdo->prepare("CALL sp_returns_string(?)");
    $stmt->bindParam(1, $return_value, PDO::PARAM_STR, 4000);

// вызов хранимой процедуры
    $stmt->execute();

    print "процедура вернула $return_value\n";
}

//testPdo();
//testPdo2();
//testPdo3();
//testPdo4(); Error berdi
