<?php
include_once __DIR__."/../../app/database/db.php";
require_once __DIR__."/../../path.php";


$id = '';
$title = '';
$content = '';
$topic = '';
$errMsg = [];
$img = '';
$id_user = $_SESSION['id'];

$topics = selectAll('topics');
$posts = selectAll('posts');

$postsAdm = selsectAllFromPostsWithUsers('posts', 'users');

//test($postsAdm);
// Bloglarni yaratish formasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post']) ){
  
    // Surat yuklanganda bajariladigan funksiya 
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" .$_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $destination = ROOT_PATH . "\assets\images\posts\\". $imgName;

        $fileType =  $_FILES['img']['type'];

        if (strpos($fileType, 'image' ) === false) {
            array_push($errMsg, "Siz bu yerga faqat surat yuklang");
        } else{      
        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        }else{
            array_push($errMsg, "Siz yuklagan surat serverga yuklanishida hatolik yuzaga keldi.");
        }
    }
    }else{
        array_push($errMsg, "Blogni surati bo'lishi lozim, iltimos surat yuklang!");
    }
    
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
         
            $post = insert('posts', $post);
            $post = selectOne('posts', ['id' => $post]);

            header("Location: " . PATH_URL . "/admin/posts/index.php");
    

    }


}else{
    echo 'GET';
  
    $id = '';
    $title = '';
    $content = '';
    $status = '';
    $topic = '';
  
}


// Bostlarni tahrirlash funksiyalari

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{    
    $post = selectOne('posts', ['id' =>  $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $status = $post['status'];
    $topic = $post['id_topic'];  
    
}    


// Postlarni tahrirlash funksiyasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post']))
{
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
    
    

// Bo'limlarni o'chirish funksiyalari

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delet_id'])){
    $id = $_GET['delet_id'];    
    delete('topics', $id);
    $topic = selectOne('topics', ['id' => $id]);
    $name = $topic['name'];
    $errMsg = "$name nomli bo'lim bazadan o'chirildi!";
    header("Location: " . PATH_URL . "/admin/topics/index.php");
   
}    
