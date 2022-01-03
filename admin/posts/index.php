<?php
//require_once "../../app/database/db.php";
session_start();
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
        <div class="row">
            <div class="sidebar col-3">
                <ul>
                    <li>
                        <a href="#">Yozuvlar</a>
                    </li>
                    <li>
                        <a href="">Foydalanuvchilar</a>
                    </li>
                    <li>
                        <a href="">Bo'limlar</a>
                    </li>
                </ul>
            </div>
           
            <div class="posts col-9">
                <div class="button row">
                    <a href="create.html" class="col-2 btn btn-success">Post qo'shish</a>
                    <span class="col-1"></span>
                    <a href="index.html" class="col-3 btn btn-warning">Postlarni boshqarish</a>
                </div>
                <div class="row title-table">
                    <h2>Postlarni boshqarish</h2>
                    <div class="col-1">ID</div>
                    <div class="col-5">Nomlanishi</div>
                    <div class="col-2">Mualif</div>
                    <div class="col-4">Tahrirlash</div>
                   
                </div>
                <div class="row post">
                    <div class="id col-1">1</div>
                    <div class="title col-5">Qandaydur yangilik nomi</div>
                    <div class="author col-2">Admin</div>
                    <div class="edit col-1"><a href="#">Edit</a></div>
                    <div class="delet col-1"><a href="#">Delete</a></div>
                </div>
                <div class="row post">
                    <div class="id col-1">1</div>
                    <div class="title col-5">Qandaydur yangilik nomi</div>
                    <div class="author col-2">Admin</div>
                    <div class="edit col-1"><a href="#">Edit</a></div>
                    <div class="delet col-1"><a href="#">Delete</a></div>
                </div>
                <div class="row post">
                    <div class="id col-1">1</div>
                    <div class="title col-5">Qandaydur yangilik nomi</div>
                    <div class="author col-2">Admin</div>
                    <div class="edit col-1"><a href="#">Edit</a></div>
                    <div class="delet col-1"><a href="#">Delete</a></div>
                </div>
                <div class="row post">
                    <div class="id col-1">1</div>
                    <div class="title col-5">Qandaydur yangilik nomi</div>
                    <div class="author col-2">Admin</div>
                    <div class="edit col-1"><a href="#">Edit</a></div>
                    <div class="delet col-1"><a href="#">Delete</a></div>
                </div>
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