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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>MY blog!</title>
  </head>
  <body>
    <!-- Menyu navigation qismi boshlanishi -->
    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1><a href="/">My BLog</a></h1>
                </div>
                <nav class="col-8">
                    <ul>
                        <li><a href="#"><i class="fas fa-house-user"></i> Asosiy sahifa</a></li>
                        <li><a href="#"><i class="fas fa-user-tie"></i> Biz haqimizda</a></li>
                        <li><a href="#"><i class="fas fa-user-graduate"></i> Hizmatlar</a></li>
                        <li>
                            <a href="#"><i class="fas fa-user-circle"></i> Profile</a>                       
                            <ul>
                                <li><a href="#">Admin panel</a></li>
                                <li><a href="#">Chiqish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </header>
    <!-- Menyu qismi tugadi -->
    
    <!-- Slayd qismi Boshlanishi-->
    <div class="container">
        <div class="row">
            <h2 class="slider-title">Qiziqarli ma'lumotlar</h2>
        </div>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
           
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="assets/images/slide-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>Anime haqida faktlar</h5>
                  <!-- <p>Some representative placeholder content for the first slide.</p> -->
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/slide-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>ARCANE filmi haqida</h5>
                  <!-- <p>Some representative placeholder content for the second slide.</p> -->
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/images/slide-3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>Valarant onlayn shooter o'yini haqida</h5>
                  <!-- <p>Some representative placeholder content for the third slide.</p> -->
                </div>
                
              </div>
              <div class="carousel-item">
                <img src="assets/images/slide-4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>Valarant onlayn shooter o'yini haqida</h5>
                  <!-- <p>Some representative placeholder content for the third slide.</p> -->
                </div>
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>  
    <!-- Slyad qismi tugadi -->

    <div class="container">
      <!-- Main qismi boshlandi -->
      <div class="content row">

        <!-- content qismi -->
        <div class="main-content col-md-9">
          <h2>So'ngi yozilgan maqiolalar</h2>

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/thumb-1920-1149476.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3><a href="#">Dinamik sayt uchun kulguli content</a></h3>
              <i class="far fa-user"> Muoalif nomi </i>
              <i class="far fa-calendar"> Mar 11, 2021 </i>
              <p class="preview-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iste accusamus 
                vel veniam rem dignissimos ad soluta fuga reiciendis ducimus error!
              </p>
            </div>           
          </div>

          <!-- Ajratkich -->

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/thumb-1920-1149476.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3><a href="#">Dinamik sayt uchun kulguli content</a></h3>
              <i class="far fa-user"> Muoalif nomi </i>
              <i class="far fa-calendar"> Mar 11, 2021 </i>
              <p class="preview-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iste accusamus 
                vel veniam rem dignissimos ad soluta fuga reiciendis ducimus error!
              </p>
            </div>           
          </div>

          <!-- Ajratkich -->

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/thumb-1920-1149476.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3><a href="#">Dinamik sayt uchun kulguli content</a></h3>
              <i class="far fa-user"> Muoalif nomi </i>
              <i class="far fa-calendar"> Mar 11, 2021 </i>
              <p class="preview-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iste accusamus 
                vel veniam rem dignissimos ad soluta fuga reiciendis ducimus error!
              </p>
            </div>           
          </div>

          <!-- Ajratkich -->

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/thumb-1920-1149476.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3><a href="#">Dinamik sayt uchun kulguli content</a></h3>
              <i class="far fa-user"> Muoalif nomi </i>
              <i class="far fa-calendar"> Mar 11, 2021 </i>
              <p class="preview-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iste accusamus 
                vel veniam rem dignissimos ad soluta fuga reiciendis ducimus error!
              </p>
            </div>           
          </div>

          <!-- Ajratkich -->

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/thumb-1920-1149476.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3><a href="#">Dinamik sayt uchun kulguli content</a></h3>
              <i class="far fa-user"> Muoalif nomi </i>
              <i class="far fa-calendar"> Mar 11, 2021 </i>
              <p class="preview-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iste accusamus 
                vel veniam rem dignissimos ad soluta fuga reiciendis ducimus error!
              </p>
            </div>           
          </div>

          <!-- Ajratkich -->

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/thumb-1920-1149476.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3><a href="#">Dinamik sayt uchun kulguli content</a></h3>
              <i class="far fa-user"> Muoalif nomi </i>
              <i class="far fa-calendar"> Mar 11, 2021 </i>
              <p class="preview-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iste accusamus 
                vel veniam rem dignissimos ad soluta fuga reiciendis ducimus error!
              </p>
            </div>           
          </div>

          <!-- Ajratkich -->
        </div>
        <!-- Content qismi tugadi -->
        <!-- Sidebar COntent qismi -->
        <div class="sidebar col-md-3 col-12">

          <div class="section search">
            <h3>Qidiruv</h3>
            <form action="index.htm" method="post">
              <input type="text" name="search-term" class="text-input" placeholder="Qidiruv .....">
            </form>
          </div>

          <div class="section topics">
            <h3>Bo'limlar</h3>

            <ul>
              <li><a href="#">PHP laravel</a></li>
              <li><a href="#">Javascript VUE</a></li>
              <li><a href="#">Python Django</a></li>
              <li><a href="#">Nginx aapanel</a></li>
              <li><a href="#">SQL Myasl</a></li>
              <li><a href="#">IT texnalogiyalari</a></li>
            </ul>
          </div>

        </div>
        <!-- Sidebar tugadi -->

      </div>
      <!-- Main qismi tugadi -->

      <div class="footer container-fluid">
        <div class="footer-content container">
          <div class="row">
            <div class="footer-section about col-md-4 col-12">
              <h3 class="logo-text">Mening blogim</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quisquam aliquid ut libero distinctio,
                quibusdam omnis. Nam illum deleniti nulla quaerat quia veniam blanditiis itaque,
                laboriosam dolore atque praesentium aspernatur!
              </p>
              <div class="contact">
                <span><i class="fas fa-phone"></i> 123-456-789 </span>
                <span><i class="fas fa-envelope"></i> wi-fi.xor@gmail.com </span>
              </div>
              <div class="socials">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>

            <div class="footer-section links col-md-4 col-12">
              <h3>Foydali havolalar</h3>
              <br>
              <ul>
                <a href="#"><li>Guruhlar</li></a>
                <a href="#"><li>Galleriya</li></a>
                <a href="#"><li>Masalalar</li></a>
                <a href="#"><li>Yana nimadur</li></a>
                <a href="#"><li>Biz haqimizda</li></a>
              </ul>
            </div>

            <div class="footer-section contact-form col-md-4 col-12">
              <h3>Bog'lanish</h3>
              <br>
              <form action="/" method="post">
                <input type="text" name="email" class="text-input contact-input" placeholder="Email pochtangizni kiriting .....">
                <textarea name="massage" rows="4" class="text-input contact-input" placeholder="Sizning xabaringiz ...."></textarea>
                <button type="submit" class="btn btn-big contact-btn">Yuborish</button>
              </form>
            </div>
          </div>
          <div class="footer-bottom" style="margin-top: 20px;">
            myblog.com | Designed by Raxmatilla
          </div>
        </div>
      </div>



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