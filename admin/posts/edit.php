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
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <title>MY blog!</title>
</head>
<body>
    <!-- HEADER START -->
    <?php include_once "../../app/include/header-admin.php"; ?>
    <!-- HEADER END -->

    <div class="container">
    <?php include_once "../../app/include/sidebar-admin.php";?>
           
            <div class="add-post col-9">
             
                <div class="row title-table">
                    <h2>Blog tahrirlash sahifasi</h2>
                                     
                </div>
               <!-- hATOLIKLARNI KO'RSATISH UCHUN -->
               <?php include("../../app/helps/errorinfo.php");?>
        <?=$title?>
                <div class="row post">
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id; ?>">
                    <div class="col div">
                    <label for="title" class="form-label">Blogning nomlanishi</label>
                        <input type="text" value="<?=$title?>" name="title" id="title" class="form-control" placeholder="Blog nomi" aria-label="Blogni nomi">
                    </div>
                    <div class="col ">
                        <label for="content" class="form-label">Blogning asosiy qismi</label>
                        <textarea class="form-control" name="content" id="editor" rows="10" ><?=$content?></textarea>
                    </div>
                    <div class="input-group col div">
                        <input type="file" name="img" value="<?=$img?>" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text"  for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="col div">
                    <select class="form-select" name="id_topic" aria-label="Default select example">
                       
                        <?php  foreach($topics as $key => $topic): ?>
                        <option value="<?=$topic['id']?>"><?=$topic['name']?></option>
                        <?php endforeach ?>
                    </select>
                   
                    </div>
                    <div class="form-check">
                        <?php if (empty($status) && $status == 0): ?>
                        <input  class="form-check-input" type="checkbox" name="status" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                           Nashir qilish
                        </label>
                        <?php else: ?>
                        <input  class="form-check-input" type="checkbox" name="status" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                           Nashir qilish
                        </label>
                        <?php endif ?>

                    </div>
                    <div class="col div">
                        <button name="edit_post" class="btn btn-primary" type="submit">Blog saqlash</button>
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

<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
</body>
</html>