<?php

include_once "../../app/controller/posts.php";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <script src="https://use.fontawesome.com/da17da73b6.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>MY blog!</title>
</head>
<body>
    <!-- HEADER START -->
    <?php include_once "../../app/include/header-admin.php"; ?>
    <!-- HEADER END -->

    <div class="container">
        <?php include_once "../../app/include/sidebar-admin.php";?>
           
            <div class="posts col-9">
                <div class="button row">
                    <a href="<?=PATH_URL . "admin/posts/create.php";?>" class="col-auto btn btn-success">Blog qo'shish</a>
                    <span class="col-1"></span>
                    <a href="<?=PATH_URL . "admin/posts/index.php";?>" class="col-auto btn btn-warning">Bloglarni tahrirlash</a>
                </div>
                <div class="row title-table">
                    <h2>Postlarni boshqarish</h2>
                    <div class="col-1">ID</div>
                    <div class="col-3">Nomlanishi</div>
                    <div class="col-2">Mualif</div>
                    <div class="col-2">Tahrirlash</div>
                    <div class="col-2">Status</div>
                  
                </div>
                <?php foreach($postsAdm as $key => $post): ?>
                <div class="row post">                  
                  
                    <div class="id col-1"><?=$key + 1?></div>
                    <div class="title col-3"><?=$post['title']?></div>
                    <div class="author col-2"><?=$post['username']?></div>
                    <div class="edit col-1"><a href="edit.php?id=<?= $post['id']?>">Edit</a></div>
                    <div class="delet col-1"><a href="edit.php?delet_id=<?= $post['id']?>">Delete</a></div>
                  
                    <?php if($post['status']): ?>
                    <div class="status col-2"><span class="badge rounded-pill bg-success">Ko'rinarli</span></div>
                    <?php else: ?>
                    <div class="status col-2"><span class="badge rounded-pill bg-secondary">Qoralama</span></div>
                    <?php endif ?>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- FOOTER START -->
    <?php include_once "../../app/include/footer.php";?>
    <!-- FOOTER END -->

</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>