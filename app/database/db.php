<?php
// Ma'lumotlar omborini import qilib olamiz
require_once "connect.php";

// Test qilish uchun funksiya
function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function selectAll($table){

    // funksiya ichida bajariladigan amallar uchun $pdo o'zgaruvchisini funksiya tashqarisini ko'rishi uchun globallashtildi.
    global $pdo;

    // SQL so'rovni bajarish uchun code
    $sql = "SELECT * FROM `$table`";

    // So'rovni bajarish uchun tayyorlaydi va bog'langan ob'ektni qaytaradi
    $query = $pdo->prepare($sql);

    // Bajarish uchun tayyorlangan so'rovni ishga tushiradi
    $query->execute();

   // errorInfo() Ma'lumotlar bazasiga oxirgi marta kirishda yuzaga kelgan xato haqida kengaytirilgan ma'lumotni oladi.
    $errorInfo = $query->errorInfo();

    // ERR_NONE() Bu shuni anglatadiki, SQL so'rovi xato va ogohlantirishlarsiz muvaffaqiyatli yakunlandi.
    if ($errorInfo[0] !== PDO::ERR_NONE){
        // 2 Drayver tomonidan ko'rsatilgan xato xabari
        echo $errorInfo[2];
        // Xato aniqlangach bu so'rovni to'xtatish, va xato haqida xabar berish.
        exit();
    }


    /* fetch va fetchAll
     * Agarda bazadan bitta stroka qaytadigan bo'lsa fetch()
     * funksiyasi ishlatililadi agar ko'p malumot so'ralsa bu funksiya ishlatilmaydi.
     *
     * Bazadan ko'p ma'lumotlarni to'plash uchun fetchAll() ishlatililadi.
     * */
    return $query->fetchAll();


}

// Test funksiyasiga istalgan tablitsiyadagi barcha ma'lumotlarni chiqarish uchun.
test(selectAll('users'));