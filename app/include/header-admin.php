<?php include_once "../../path.php";?>

<!-- Menyu navigation qismi boshlanishi -->
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1><a href="<?php echo PATH_URL?>">My BLog</a></h1>
            </div>
            <nav class="col-8">
                <ul>


                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['user'];?></a>
                            <ul>

                                <li><a href="<?php echo PATH_URL . "logout.php"; ?>">Chiqish</a></li>
                            </ul>


                        <?php endif; ?>

                    </li>

                </ul>
            </nav>
        </div>
    </div>

</header>
<!-- Menyu qismi tugadi -->