<?php
include_once __DIR__."/../../app/database/db.php";
require_once __DIR__."/../../path.php";

$id = '';
$name = '';
$content = '';
$errMsg = [];
$topics = selectAll('topics');

// Bloglarni bo'limlarini yaratish formasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-create'])){
//    test($_POST);
//    echo "TEst register";
//    exit();
   
    $name = trim($_POST['name']);
    $content = trim($_POST['content']);
    



    if ($name === '' || $content === ''){
        array_push($errMsg, "Formada maydonchalar to'ldirilmagan!");

    }elseif (mb_strlen($name, 'UTF8') < 2){
        array_push($errMsg, "Nomlanish 2-x simvoldan kotta bo'lishi kere!");

    }else {
        $existence = selectOne('topics', ['name' => $name]);
        if ($existence['name'] === $name){
            array_push($errMsg, "$name = nomli bo'lim ro'yxatdan o'tgan! Iltimos boshqa nom yozing!");
        }else{
            
            $topic = [
                'name' => $name,
                'description' => $content               
            ];
            //    $id = insert('users', $posts);
         
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);

            header("Location: " . PATH_URL . "/admin/topics/index.php");
        }

    }


}else{
    echo 'GET';
    $name = '';
    $content = '';
}


// Bo'limlarni tahrirlash funksiyalari

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $content = $topic['description'];
   
}    


// Bo'limlarni tahrirlash funksiyasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){

    
        $name = trim($_POST['name']);
        $content = trim($_POST['content']);
           
        if ($name === '' || $content === ''){
        $errMsg = "Formada maydonchalar to'ldirilmagan!";
        }elseif (mb_strlen($name, 'UTF8') < 2){
            $errMsg = "Nomlanish 2-x simvoldan kotta bo'lishi kere!";
        }else {
            $existence = selectOne('topics', ['name' => $name]);
            if ($existence['name'] === $name){
                $errMsg = $name . " = nomli bo'lim ro'yxatdan o'tgan! Iltimos boshqa nom yozing!";
            }else{
                
                $topic = [
                    'name' => $name,
                    'description' => $content               
                ];
                //    $id = insert('users', $posts);
             
                $id = $_POST['id'];
                $topic_id = update('topics', $id, $topic);
    
                header("Location: " . PATH_URL . "/admin/topics/index.php");
            }
    
        }
    
    
    }

// Bo'limlarni o'chirish funksiyalari

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delet_id'])){
    $id = $_GET['delet_id'];    
    delete('topics', $id);
    $topic = selectOne('topics', ['id' => $id]);
    $name = $topic['name'];
    $errMsg = "$name nomli bo'lim bazadan o'chirildi!";
    header("Location: " . PATH_URL . "/admin/topics/index.php");
   
}    
