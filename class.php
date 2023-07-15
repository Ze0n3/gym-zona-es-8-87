<?php
require_once("base_datos/bd.php");
$daba = new Database();
$conex = $daba->conectar();


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
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 display-4 text-primary text-uppercase">Z<i style="color: orange;" class="bi bi-fire"></i>NA ES</h1>
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
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">Z<i class="bi bi-fire"></i>NA ES</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Inicio</a>
                            <a href="about.php" class="nav-item nav-link">Nosotros</a>
                            <a href="class.php" class="nav-item nav-link active">Horarios</a>
                            <a href="team.php" class="nav-item nav-link">Coachs</a>
                            <a href="contact.php" class="nav-item nav-link">Contactanos</a>
                        </div>
                        <a href="login.html" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Inicia Sesion</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->


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
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-1">lunes</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-1">lunes</a>
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
                   <a class="nav-link rounded-pill text-white active" data-bs-toggle="pill" href="#tab-3">miercoles</a>
                </li>
                <?php
                }
                else{
                    ?>
                    <li class="nav-item">
                   <a class="nav-link rounded-pill text-white" data-bs-toggle="pill" href="#tab-3">miercoles</a>
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
    
    

    <!-- Footer Start -->
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
</body>

</html>