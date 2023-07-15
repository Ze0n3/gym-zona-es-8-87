<?php
require_once("base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();
$SQL = $conex->prepare ("SELECT * FROM usuarios where tipo_usuario = 2" );
$SQL -> execute();
$resul=$SQL->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GYM-ZONA 8/67</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo_gym.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib1/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib1/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css1/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <form action="controller/iniciose.php" method="post" autocomplete="off">
        <div class="container-fluid bg-dark px-0" >
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 display-4 text-primary text-uppercase">Z<i class="bi bi-fire"></i>NA ES</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-secondary d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <h6 class="mb-0">info@example.com</h6>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <h6 class="mb-0">+012 345 6789</h6>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="btn btn-light btn-square rounded-circle me-2" href="https://www.instagram.com/zona.es867/">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="btn btn-light btn-square rounded-circle" href="">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Inicio</a>
                                <a href="about.php" class="nav-item nav-link">Nosotros</a>
                                <a href="class.php" class="nav-item nav-link">Horarios</a>
                                <a href="team.php" class="nav-item nav-link">Coachs</a>
                                <a href="contact.php" class="nav-item nav-link">Contactanos</a>
                            </div>
                            <a href="login.html" class="btn btn-primary py-md-3 px-md-5 d-lg-block">Inicia Sesion</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->
    
    
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/WhatsApp Image 2023-04-27 at 9.19.13 PM.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase">Mejor centro de gimnasio</h5>
                                <h1 class="display-2 text-white text-uppercase mb-md-4">Fortalece tu cuerpo con <br> Z<i style="color: orange;" class="bi bi-fire"></i>NA ES 8/67</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Contactanos</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img1/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase">Mejor centro de gimnasio</h5>
                                <h1 class="display-2 text-white text-uppercase mb-md-4">Aumenta tu fuerza con nuestros entrenadores</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Contactanos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previo</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    
    
        <!-- About Start -->
        <div class="container-fluid p-5">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img1/Captura de pantalla 2023-04-11 212816.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase">Sobre Nosotras</h5>
                        <h1 class="display-3 text-uppercase mb-0">Bienvenido A Z<i style="color: orange;" class="bi bi-fire"></i>NA ES</h1>
                    </div>
                    <h4 class="text-body mb-4"> Lo imposible no es un hecho, es una opinión. Imposible no es una declaración es un reto. Lo imposible es algo teórico, temporal. Imposible no existe</h4>
                    <p class="mb-4">Nonumy erat diam duo labore clita. Sit magna ipsum dolor sed ea duo at ut. Tempor sit lorem sit magna ipsum duo. Sit eos dolor ut sea rebum, diam sea rebum lorem kasd ut ipsum dolor est ipsum. Et stet amet justo amet clita erat, ipsum sed at ipsum eirmod labore lorem.</p>
                    <div class="rounded bg-dark p-5">
                        <ul class="nav nav-pills justify-content-between mb-3">
                            <li class="nav-item w-50">
                                <a class="nav-link text-uppercase text-center w-100 active" data-bs-toggle="pill" href="#pills-1">SOBRE NOSOTROS</a>
                            </li>
                            <li class="nav-item w-50">
                                    <a class="nav-link text-uppercase text-center w-100" data-bs-toggle="pill" href="#pills-2">¿Por qué elegirnos?</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-1">
                                <p class="text-secondary mb-0">Te motivaremos para que el ejercicio se convierta en un habito para tu vida, asi mismo que puedas llevar una vida saludable y una condición física deseada. En tanto a la instalación se llevará un ambiente agradable y seguro para que te sientas cómodo al momento de realizar tus rutinas</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2">
                                <p class="text-secondary mb-0">Nuestro objetivo es que cuentes con una excelente atención al momento de visitar nuestra instalación, así mismo nos preocuparemos por ti y por tu proceso para que puedas lograr los resultados propuestos y tendremos la mejor calidad para tus necesidades y que nuestro gimnasio pueda cumplir con todas tus expectativas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    
    
        <!-- Programe Start -->
        <div class="container-fluid programe position-relative px-5 mt-5" style="margin-bottom: 135px;">
            <div class="row g-5 gb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="bg-light rounded text-center p-5">
                        <i class="flaticon-six-pack display-1 text-primary"></i>
                        <h3 class="text-uppercase my-4">Culturismo</h3>
                        <p>Sed amet tempor amet sit kasd sea lorem dolor ipsum elitr dolor amet kasd elitr duo vero amet amet stet</p>
                        <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-light rounded text-center p-5">
                        <i class="flaticon-bi bi-universal-access display-1 text-primary"></i>
                        <h3 class="text-uppercase my-4">movilidad articular y músculos</h3>
                        <p>Sed amet tempor amet sit kasd sea lorem dolor ipsum elitr dolor amet kasd elitr duo vero amet amet stet</p>
                        <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-light rounded text-center p-5">
                        <i class="flaticon-bodybuilding display-1 text-primary"></i>
                        <h3 class="text-uppercase my-4">Desarrollo muscular</h3>
                        <p>Sed amet tempor amet sit kasd sea lorem dolor ipsum elitr dolor amet kasd elitr duo vero amet amet stet</p>
                        <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Programe Start -->
    
    
        <!-- Class Timetable Start -->
        <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">Horario de clase</h5>
            <h1 class="display-3 text-uppercase mb-0">Horas Laborales</h1>
        </div>
        <div class="tab-class text-center">

            <?php
                    // Obteniendo la fecha actual del sistema con PHP
                date_default_timezone_set('America/bogota');

                $fecha_actual = getdate();
                $jue =   $fecha_actual['wday']  ;
                   
                
            ?>  
            <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase rounded-pill mb-5">
            <?php
                if ($jue == "1"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-4">lunes</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-4">lunes</a>
                </li>
                <?php
                }
                ?>
                <?php
                if ($jue == "2"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-2">martes</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-2">martes</a>
                </li>
                <?php
                }
                ?>
                <?php
                if ($jue == "3"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-4">miercoles</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-4">miercoles</a>
                </li>
                <?php
                }
                ?>
                <?php
                if ($jue == "4"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-4">JUEVES</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-4">JUEVES</a>
                </li>
                <?php
                }
                ?>
                <?php
                if ($jue == "5"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-5">viernes</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-5">viernes</a>
                </li>
                <?php
                }
                ?>
                <?php
                if ($jue == "6"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-6">sabado</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-6">sabado</a>
                </li>
                <?php
                }
                ?>
                <?php
                if ($jue == "0"){
                ?>
                <li class="nav-item">
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-7">domingo</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-7">domingo</a>
                </li>
                <?php
                }
                ?>
            </ul>
            <?php
                if ($jue == "1"){
                ?>
            <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm unica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 ">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm unica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($jue == "2"){
                ?>
                    <div id="tab-2" class="tab-pane fade show p-0 active">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm uica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div id="tab-2" class="tab-pane fade p-0 ">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm uica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($jue == "3"){
                ?>
                    <div id="tab-3" class="tab-pane fade show p-0 active">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm uica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div id="tab-3" class="tab-pane fade p-0">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm uica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($jue == "4"){
                ?>
                    <div id="tab-4" class="tab-pane fade show p-0 active">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                    <h5 class="text-uppercase text-primary">5:00pm uica clase</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                    <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Alien</p>
                                </div>
                            </div>
                        </div>
                       </div>
                       <?php
                }
                else{
                    ?><div id="tab-4" class="tab-pane fade p-0">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                <h5 class="text-uppercase text-primary">ff</h5>
                                <p class="text-uppercase text-secondary mb-0">John Deo</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                <h5 class="text-uppercase text-primary">Body Building</h5>
                                <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">4:00pm - 5:00pm</h6>
                                <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">5:00pm - 6:00pm</h6>
                                <h5 class="text-uppercase text-primary">5:00pm uica clase</h5>
                                <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">6:00pm - 7:00pm</h6>
                                <h5 class="text-uppercase text-primary">Crossfit Class</h5>
                                <p class="text-uppercase text-secondary mb-0">James Alien</p>
                            </div>
                        </div>
                    </div>
                   </div>
                   <?php
                }
                ?>
                <?php
                if ($jue == "5"){
                ?>
                        <div id="tab-5" class="tab-pane fade show p-0 active" >
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div id="tab-5" class="tab-pane fade p-0 ">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">6:00am - 7:00am</h6>
                                    <h5 class="text-uppercase text-primary">ff</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7:00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Weight Loose</h5>
                                    <p class="text-uppercase text-secondary mb-0">Robert Smith</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($jue == "6"){
                ?>
                    <div id="tab-6"class="tab-pane fade show p-0 active">
                        <div class="row g-5">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">7.00am - 8:00am</h6>
                                    <h5 class="text-uppercase text-primary">Power Lifting</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                    <h5 class="text-uppercase text-primary">Body Building</h5>
                                    <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-m-5 col-m-5">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">5:00pm unica clase</h6>
                                    <h5 class="text-uppercase text-primary">Fitness Program</h5>
                                    <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?><div id="tab-6" class="tab-pane fade p-0 ">
                    <div class="row g-5">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">7.00am - 8:00am</h6>
                                <h5 class="text-uppercase text-primary">Power Lifting</h5>
                                <p class="text-uppercase text-secondary mb-0">John Deo</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">8:00am - 9:00am</h6>
                                <h5 class="text-uppercase text-primary">Body Building</h5>
                                <p class="text-uppercase text-secondary mb-0">James Taylor</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                <h5 class="text-uppercase text-primary">Cardio Program</h5>
                                <p class="text-uppercase text-secondary mb-0">Jack Sparrow</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-m-5 col-m-5">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">5:00pm unica clase</h6>
                                <h5 class="text-uppercase text-primary">Fitness Program</h5>
                                <p class="text-uppercase text-secondary mb-0">Adam Phillips</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <?php
                if ($jue == "0"){
                ?>
                    <div id="tab-7" class="tab-pane fade show p-0 active">
                        <div class="row g-5">
                            <div class="col-lg-5 col-md-5 col-m-7">
                                <div class="bg-dark rounded text-center py-5 px-3">
                                    <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                    <h5 class="text-uppercase text-primary">Power Lifting</h5>
                                    <p class="text-uppercase text-secondary mb-0">John Deo</p>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
                else{
                    ?>
                    <div id="tab-7" class="tab-pane fade p-0 ">
                    <div class="row g-5">
                        <div class="col-lg-5 col-md-5 col-m-7">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3">9:00am - 10:00am</h6>
                                <h5 class="text-uppercase text-primary">Power Lifting</h5>
                                <p class="text-uppercase text-secondary mb-0">John Deo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                
                    ?>

        <div class="container-fluid bg-dark facts p-5 my-5">
            <div class="row gx-5 gy-4 py-5">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-star fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-secondary text-uppercase">Experiencia</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">32412</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-secondary text-uppercase">Nuestros entrenadores</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">321332</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-secondary text-uppercase">Proyecto completo</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">32432</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-mug-hot fs-4 text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-secondary text-uppercase">Happy Clients</h5>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
    
    
        <!-- Team Start -->
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">El equipo</h5>
            <h1 class="display-3 text-uppercase mb-0">COACHS</h1>
        </div>
        <?php
        foreach ($resul as $usu) {
            //se abre el ciclo con la llave
        ?>
        <div class="row g-4 text-center">
            <div class="form-group row text-center ">
            <div class="col-lg-4 text-center ">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                        <img class="img-fluid w-100" src="img1/team-2.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: rgba(34, 36, 41, .9);">
                        <h5 class="text-uppercase text-light"><?= $usu['nom_completo'] ?></h5>
                        <p class="text-uppercase text-secondary m-0">Entrenador</p>
                    </div>
                </div>
                </div>
            </div>
            <?php
        } //se cierra el recorrido cerrando la llave
        ?>
            
        
            </div>
        </div>
    </div>
        <!-- Footer End -->
    
        <div class="container-fluid bg-dark text-secondary px-5 mt-5">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Ponerse en contacto</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Av. Guabinal #67, Ibagué, Tolima</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">info@example.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Enlaces rápidos</h4>
                        <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="https://www.herbalife.com.co/contactanos/"><i class="bi bi-arrow-right text-primary me-2"></i>Contactenos</a>
                                <a class="text-secondary mb-2" href="https://www.herbalife.com.co/inicia-tu-negocio/"><i class="bi bi-arrow-right text-primary me-2"></i>Hacer Parte</a>
                                <a class="text-secondary mb-2" href="https://www.herbalife.com.co/nosotros/"><i class="bi bi-arrow-right text-primary me-2"></i>Nosotros</a>
                                <a class="text-secondary mb-2" href="https://www.herbalife.com.co/nutricion-y-bienestar/"><i class="bi bi-arrow-right text-primary me-2"></i>Nutricion Y Beneficio</a>
                                <a class="text-secondary" href="https://www.herbalife.com.co/nuestros-productos/"><i class="bi bi-arrow-right text-primary me-2"></i>Productos</a>
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Enlaces populares</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Página de inicio</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre nosotros</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Horario de clase</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Nuestros entrenadores</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Blog más reciente</a>
                            <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contacta con nosotros</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-5">
                    <h4 class="text-uppercase text-white mb-4">Boletin informativo</h4>
                    <h6 class="text-uppercase text-white">Suscríbete a nuestro boletín</h6>
                    <p class="text-light">Amet justo diam dolor rebum lorem sit stet sea justo kasd</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Tu correo electrónico">
                            <button class="btn btn-dark">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>
    
    
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib1/easing/easing.min.js"></script>
        <script src="lib1/waypoints/waypoints.min.js"></script>
        <script src="lib1/counterup/counterup.min.js"></script>
        <script src="lib1/owlcarousel/owl.carousel.min.js"></script>
    
        <!-- Template Javascript -->
        <script src="js1/main.js"></script>
    </form>
</body>

</html>