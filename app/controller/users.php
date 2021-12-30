<?php
include_once "app/database/db.php";
require_once "path.php";

$isSubmit = false;
$errMsg = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $admin = 0;
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['password-first']);
    $passS = trim($_POST['password-second']);



    if ($user === '' || $email === '' || $passF === ''){
    $errMsg = "Formada maydonchalar to'ldirilmagan!";
    }elseif (mb_strlen($user, 'UTF8') < 2){
        $errMsg = "Login 2-x simvoldan kotta bo'lishi kere!";
    }elseif ($passF !== $passS){
        $errMsg = "Tasdiqlash paroli o'xshash emas, parolni tog'ri yozing.";
    }else {
        $existence = selectOne('users', ['email' => $email]);
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
            //    $id = insert('users', $post);
            $isSubmit = true;
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            $_SESSION['id'] = $user['id'];
            $_SESSION['user'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if ($_SESSION['admin']){
                header('location: ' . BASE_URL . admin/admin.php);
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



