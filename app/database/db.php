<?php
// Ma'lumotlar omborini import qilib olamiz
require_once "connect.php";

// Test qilish uchun funksiya
function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function dbCheckError($query){
    // errorInfo() Ma'lumotlar bazasiga oxirgi marta kirishda yuzaga kelgan xato haqida kengaytirilgan ma'lumotni oladi.
    $errorInfo = $query->errorInfo();

    // ERR_NONE() Bu shuni anglatadiki, SQL so'rovi xato va ogohlantirishlarsiz muvaffaqiyatli yakunlandi.
    if ($errorInfo[0] !== PDO::ERR_NONE){
        // 2 Drayver tomonidan ko'rsatilgan xato xabari
        echo  $errorInfo[2];
        // Xato aniqlangach bu so'rovni to'xtatish, va xato haqida xabar berish.
        exit();
    }
    return true;
}

// Bu funksiya ma'lumotlar bazasidagi ko'p tablitsiyadan ko'p ma'lumot qabul qilib oladi.
function selectAll($table, $params = []){

    // funksiya ichida bajariladigan amallar uchun $pdo o'zgaruvchisini funksiya tashqarisini ko'rishi uchun globallashtildi.
    global $pdo;
    // SQL so'rovni bajarish uchun code
    $sql = "SELECT * FROM `$table`";

    if (!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE `$key` = $value";
            } else {
                $sql = $sql . " AND `$key` = $value";
            }
            $i++;
        }

    }

//    test($sql);
//    exit();


    // So'rovni bajarish uchun tayyorlaydi va bog'langan ob'ektni qaytaradi
    $query = $pdo->prepare($sql);

    // Bajarish uchun tayyorlangan so'rovni ishga tushiradi
    $query->execute();

    dbCheckError($query);

    /* fetch va fetchAll
     * Agarda bazadan bitta stroka qaytadigan bo'lsa fetch()
     * funksiyasi ishlatililadi agar ko'p malumot so'ralsa bu funksiya ishlatilmaydi.
     *
     * Bazadan ko'p ma'lumotlarni to'plash uchun fetchAll() ishlatililadi.
     * */
    return $query->fetchAll();


}


// Bu funksiya ma'lumotlar bazasidagi bir tablitsiyadan birgina ma'lumot qabul qilib oladi.
function selectOne($table, $params = []){

    // funksiya ichida bajariladigan amallar uchun $pdo o'zgaruvchisini funksiya tashqarisini ko'rishi uchun globallashtildi.
    global $pdo;
    // SQL so'rovni bajarish uchun code
    $sql = "SELECT * FROM `$table`";

    if (!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE `$key` = $value";
            } else {
                $sql = $sql . " AND `$key` = $value";
            }
            $i++;
        }

    }
    $sql = $sql . " LIMIT 1";
//    test($sql);
//    exit();


    // So'rovni bajarish uchun tayyorlaydi va bog'langan ob'ektni qaytaradi
    $query = $pdo->prepare($sql);

    // Bajarish uchun tayyorlangan so'rovni ishga tushiradi
    $query->execute();

    dbCheckError($query);

    /* fetch va fetchAll
     * Agarda bazadan bitta stroka qaytadigan bo'lsa fetch()
     * funksiyasi ishlatililadi agar ko'p malumot so'ralsa bu funksiya ishlatilmaydi.
     *
     * Bazadan ko'p ma'lumotlarni to'plash uchun fetchAll() ishlatililadi.
     * */
    return $query->fetch();
}

$params = [
    'admin' => 0,
    'email' => 'wi.fi.xor@gmail.com'
];

// Test funksiyasiga istalgan tablitsiyadagi barcha ma'lumotlarni chiqarish uchun.
//test(selectAll('users', $params));
//test(selectOne('users'));

//"<h2 style='text-align: center'>Boshqa so'rovlar</h2><br>" .


// Ma'lumotlar ombori jadvaliga ma'lumot joylash

function insert($table, $params){
    global $pdo;
    /* INSERT INTO `users` (`admin`, `username`, `email`, `password`, `created`)
       VALUES (NULL, '0', 'Raxmatilla', 'wi.fi.xor2@gmail.com', '5579187Er', CURRENT_TIMESTAMP);
    */
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {

        if ($i === 0){
            $coll = $coll . "`" ."$key" . "`";
            $mask = $mask . "'" . "$value" . "'";
        }else{
            $coll = $coll . ", `" ."$key" . "`";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO `$table` ($coll) VALUES ($mask)";

   /* test($sql);
    exit();*/
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

$arrData = [
    'admin' => '1',
    'username' => '22222222',
    'email' => 'wi-fo22223333o@gmail.com',
    'password' => '5579187Er',
    'created' => '2021-12-16 06:57:17'
];

insert('users', $arrData);

/*
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



testPdo();*/


