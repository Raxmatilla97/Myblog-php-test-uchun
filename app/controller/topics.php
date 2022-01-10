<?php
include_once "app/database/db.php";
require_once "path.php";

//$isSubmit = false;
$errMsg = '';


// Ro'yxatdan o'tish uchun kod
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
        $existence = selectOne('topics', ['email' => $name]);
        if ($existence['email'] === $email){
            $errMsg = $email . " = nomli email foydalanuvchisi ro'yxatdan o'tgan!";
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $user,
                'email' => $email,
                'password' => $pass
            ];
            //    $id = insert('users', $posts);
            $isSubmit = true;
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            $_SESSION['id'] = $user['id'];
            $_SESSION['user'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if ($_SESSION['admin']){
                header('location: ' . PATH_URL . "admin/posts/index.php");
            }else{
                header('location: ' . PATH_URL );
            }
//            test($_SESSION);
//            exit();
        }

    }


}else{
    echo 'GET';
    $user = '';
    $email = '';
}

// Avtorizatsiya qilish uchun kod
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['password-second']);

    if ($email === '' || $pass === ''){
        $errMsg = "Formada maydonchalar to'ldirilmagan!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['user'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];

            if ($_SESSION['admin']){
                header('location: ' . PATH_URL . "admin/posts/index.php");
            }else{
                header('location: ' . PATH_URL );
            }
        }else{
            $errMsg = "Elektron pochta yoki parol no to'g'ri";
        }
    }



}else{

    $email = '';
}


