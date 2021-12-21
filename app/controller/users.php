<?php
include_once "app/database/db.php";

if (isset($_POST['button-reg'])){
    $admin = 0;
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password-second'], PASSWORD_DEFAULT);
    
    $post = [
        'admin' => $admin,
        'username' => $user,
        'email' => $email,
        'password' => $pass
    ];

  $id = insert('users', $post);
  $last_row = selectOne('users', ['id' => $id]);
  
  test($last_row);

}