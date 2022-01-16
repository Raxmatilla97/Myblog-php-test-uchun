<?php include_once "path.php";?>

<!-- Menyu navigation qismi boshlanishi -->
    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1><a href="<?php echo PATH_URL?>">My BLog</a></h1>
                </div>
                <nav class="col-8">
                    <ul>
                        <li><a href="<?php echo PATH_URL?>"><i class="fas fa-house-user"></i> Asosiy sahifa</a></li>
                        <li><a href="#"><i class="fas fa-user-tie"></i> Biz haqimizda</a></li>
                        <li><a href="#"><i class="fas fa-user-graduate"></i> Hizmatlar</a></li>

                        <li>
                            <?php if (isset($_SESSION['id'])): ?>
                                <a href="#"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['user'];?></a>
                                <ul>
                                   
                                    <?php if ($_SESSION['admin'] == 1): ?>
                                    <li><a href="<?=PATH_URL.'admin/posts/index.php'?>">Admin panel</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo PATH_URL . "logout.php"; ?>">Chiqish</a></li>
                                </ul>

                            <?php else: ?>
                                <a href="<?php echo PATH_URL . "log.php"; ?>"><i class="fas fa-key"></i> Kirish</a>
                                <ul>
                                    <li><a href="<?php echo PATH_URL . "reg.php"; ?>">Ro'yxatdan o'tish</a></li>
                                </ul>
                            <?php endif; ?>

                        </li>

                    </ul>
                </nav>
            </div>
        </div>

    </header>
    <!-- Menyu qismi tugadi -->