<?php
include_once "../../app/database/db.php";



//$isSubmit = false;
$errMsg = '';


// Bloglarni bo'limlarini yaratish formasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-create'])){
//    test($_POST);
//    echo "TEst register";
//    exit();
   
    $name = trim($_POST['name']);
    $content = trim($_POST['content']);
    



    if ($name === '' || $content === ''){
    $errMsg = "Formada maydonchalar to'ldirilmagan!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Nomlanish 2-x simvoldan kotta bo'lishi kere!";
    }else {
        $existence = selectOne('topics', ['name' => $name]);
        if ($existence['name'] === $name){
            $errMsg = $name . " = nomli bo'lim ro'yxatdan o'tgan!";
        }else{
            
            $topic = [
                'name' => $name,
                'description' => $content               
            ];
            //    $id = insert('users', $posts);
         
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);

            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }

    }


}else{
    echo 'GET';
    $name = '';
    $content = '';
}


