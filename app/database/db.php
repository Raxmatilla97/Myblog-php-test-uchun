<?php
session_start();

if (!$_SESSION) {
    header('location: ' . PATH_URL . 'log.php');
}


// Ma'lumotlar omborini import qilib olamiz
require_once "connect.php";

// Test qilish uchun funksiya
function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit();
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
     */
    return $query->fetchAll();


}

$params = [
    'admin' => 0,
    'email' => 'wi.fi.xor@gmail.com'
];

// Test funksiyasiga istalgan tablitsiyadagi barcha ma'lumotlarni chiqarish uchun.
//test(selectAll('users', $params));



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
    'admin' => 1,
    'email' => 'wi.fi.xor@gmail.com'
];

// Test funksiyasiga istalgan tablitsiyadagi barcha ma'lumotlarni chiqarish uchun.
//test(selectOne('users', $params));

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

    return $pdo->lastInsertId();
}

$arrData = [
    'admin' => '1',
    'username' => '22222222',
    'email' => 'wi-fo22223333o@gmail.com',
    'password' => '5579187Er',
    'created' => '2021-12-16 06:57:17'
];

//insert('users', $arrData);


// Ma'lumotlar omboriga kiritilgan ma'lumotni yangilash

function update($table, $id, $params){
    global $pdo;
    // UPDATE `users` SET `admin` = 100, `username` = "Raxmatilla" WHERE `id` = 40

    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {

        if ($i === 0){
            $str = $str . "`" . $key . "` = '" . $value . "'";
        }else{
            $str = $str .", `". $key . "` = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE `$table` SET $str WHERE `id` = $id";

     /*test($sql);
     exit();*/

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

$param = [
    'admin' => '1',
    'username' => '1111111111',
    'email' => 'wi-for@mail.ru'
];

//update('users', 40, $param);


// Ma'lumotlar omboriga kiritilgan ma'lumotni o'chirib tashlash

function delete($table, $id){
    global $pdo;
    // DELETE FROM `users` WHERE `id` = 40

    $sql = "DELETE FROM `$table` WHERE `id` = $id";

    /*test($sql);
    exit();*/

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

//delete('users', 41);

// Bloglar sahifasidagi bloglarni avtorini nomini chiqarish uchun

function selsectAllFromPostsWithUsers($table1, $table2){
    global $pdo;
    $sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.status, t1.id_topic, t2.username FROM `$table1` AS t1 JOIN `$table2` AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}