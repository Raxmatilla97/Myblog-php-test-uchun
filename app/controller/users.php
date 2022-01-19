<?php
include_once  ROOT_PATH . "/app/database/db.php";
require_once  ROOT_PATH . "/path.php";

//$isSubmit = false;
$errMsg = '';


$users = selectAll('users');


// Ro'yxatdan o'tish uchun kod
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
//    test($_POST);
//    echo "TEst register";
//    exit();
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



// Adminkadan foydalanuvchini yaratish finksiyasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])){
       // test($_POST);
    //    echo "TEst register";
    //    exit();
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
                if (isset($_POST['admin'])) $admin = 1; 

                $user = [
                    'admin' => $admin,
                    'username' => $user,
                    'email' => $email,
                    'password' => $pass
                ];
                //    $id = insert('users', $posts);
                $isSubmit = true;
                $id = insert('users', $user);
                $user = selectOne('users', ['id' => $id]);
               
                header('location: ' . PATH_URL . "admin/users/index.php");
              

            }
    
        }
    
    
    }else{
        echo 'GET';
        $user = '';
        $email = '';
    }
    
// Userlarni o'chiradigan funksiya
 
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];    
        delete('users', $id);       
        $errMsg = "$name nomli foydalanuvchi bazadan o'chirildi!";
        header("Location: " . PATH_URL . "/admin/users/index.php");
       
    }    
    

    // Userlarni tahrirlash funksiyasi

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id']))
    {    
        $user = selectOne('users', ['id' =>  $_GET['edit_id']]);
        //test($user);
        $id = $user['id'];
        $username = $user['username'];
        $content = $user['content'];
        $email = $user['email'];
       
        
    }  
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user']))
{
    test($_POST);
        $id = trim($_POST['id']);
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $topic = $_POST['id_topic'];
        $img = $_POST['img'];
        $status = isset($_POST['status']) ? 1 : 0;
    
        if ($title === '' || $content === '' || $topic === ''){
        array_push($errMsg, "Formada maydonchalar to'ldirilmagan!");
        
        }elseif (mb_strlen($title, 'UTF8') < 7){
            array_push($errMsg, "Nomlanish 7-x simvoldan kotta bo'lishi kere!");
        }else
            {
                
                $post = [
                    'id_user' => $id_user,
                    'title' => $title,
                    'content' => $content,
                    'id_topic' => $topic,
                    'img' => $img,
                    'status' => $status,
                               
                ];
                //    $id = insert('users', $posts);
             
                $post = update('posts', $id, $post);
               
                header("Location: " . PATH_URL . "/admin/posts/index.php"); 
        
    
        }
    
    
    }else{
        echo 'GET1';
      
        // $id = $_POST['id'];
        // $title =  '';
        // $content =  $_POST['content'];
        // $status = isset($_POST['status']) ? 1 : 0;
        // $topic =  $_POST['id_topic'];
      
      
    }
    