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
test(selectOne('users'));

//"<h2 style='text-align: center'>Boshqa so'rovlar</h2><br>" .