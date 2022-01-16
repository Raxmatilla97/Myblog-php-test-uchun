<?php
include_once __DIR__."/../../app/database/db.php";
require_once __DIR__."/../../path.php";

$id = '';
$title = '';
$content = '';
$topic = '';
$errMsg = '';
$img = '';
$id_user = $_SESSION['id'];

$topics = selectAll('topics');
$posts = selectAll('posts');

$postsAdm = selsectAllFromPostsWithUsers('posts', 'users');

//test($postsAdm);
// Bloglarni yaratish formasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post']) ){

   
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = $_POST['id_topic'];
    $img = $_POST['img'];
    $status = isset($_POST['status']) ? 1 : 0;

    if ($title === '' || $content === '' || $topic === ''){
    $errMsg = "Formada maydonchalar to'ldirilmagan!";
    }elseif (mb_strlen($title, 'UTF8') < 7){
        $errMsg = "Nomlanish 7-x simvoldan kotta bo'lishi kere!";
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
  
    $title = '';
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
