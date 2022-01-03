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
           
            <div class="add-post col-9">
                <div class="button row">
                    <a href="create.html" class="col-2 btn btn-success">Post qo'shish</a>
                    <span class="col-1"></span>
                    <a href="index.html" class="col-3 btn btn-warning">Postlarni boshqarish</a>
                </div>
                <div class="row title-table">
                    <h2>Blog yaratish sahifasi</h2>
                                     
                </div>
                <div class="row post">
                    <form action="create.php" method="post">
                    <div class="col">
                    <label for="title" class="form-label">Blogning nomlanishi</label>
                        <input type="text" id="title" class="form-control" placeholder="Blog nomi" aria-label="Blogni nomi">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Blogning asosiy qismi</label>
                        <textarea class="form-control" id="contnet" rows="3"></textarea>
                    </div>
                    <div class="input-group col">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="col">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    </div>
                   
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>

                    </form>
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