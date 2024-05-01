<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon-32x32.png" rel="icon">
    <link href="assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    ²    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--  style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sidebar.component.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    #header.header-inner-pages {
        background: rgba(0, 125, 254, 255);
        padding: 12px 0;
    }

</style>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages" style="position:absolute;">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="../SkyBank/">Bank-up</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="index.html">Home</a></li>
                <li><a class="nav-link scrollto" href="about.html">About</a></li>
                <li><a class="nav-link scrollto " href="terms.html">Terms and Condition</a></li>
                <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
<!-- End Header -->



<div class="area"></div><nav class="main-menu" >
    <ul>
        <li *ngIf="isrecette"routerLink="/dashboard">
            <a>
                <i class="fa fa-line-chart fa-2x"></i>
                <span class="nav-text">
                          Consulter le Tableau de bord
                        </span>
            </a>

        </li>
        <li class="has-subnav" *ngIf="isrecette"routerLink="/makeint">
            <a>
                <i class="fa fa-handshake-angle fa-2x" ></i>
                <span class="nav-text">
                            Faire une intervention
                        </span>

            </a>
        </li>
        <li class="has-subnav" *ngIf="isrecette"routerLink="/Seance">
            <a>
                <i class="fa fa-calendar fa-2x"></i>
                <span class="nav-text">
                            Consulter la calendrier
                        </span>
            </a>

        </li>

        <li class="has-subnav" *ngIf="!isrecette"routerLink="/Seance">
            <a>
                <i class="fa fa-calendar-days fa-2x"></i>
                <span class="nav-text">
                            Consulter mes séances
                        </span>
            </a>

        <li class="has-subnav" *ngIf="!isrecette" routerLink="/listseance">
            <a>
                <i class="fa fa-user-clock fa-2x"><span class="notification"</span></i>
                <span class="nav-text">Gérer mes séances</span>

            </a>
        </li>

        <li *ngIf="!isrecette"class="has-subnav" routerLink="/list">
            <a>
                <i class="fa fa-list fa-2x"  ></i>
                <span class="nav-text" >
                            Mes Projets
                        </span>

            </a>
        </li>
        <li *ngIf="isrecette" class="has-subnav" routerLink="/seancebyproject">
            <a>
                <i class="fa fa-list-ul fa-2x"  ></span></i>
                <span class="nav-text" >
                             Projets et Séances
                        </span>

            </a>
        </li>

        <li *ngIf="isrecette" class="has-subnav" routerLink="/project">
            <a>
                <i class="fa fa-plus fa-2x"></i>
                <span class="nav-text"  >
                            Ajouter un projet
                        </span>
            </a>
        </li>






    </ul>

</nav>
</header>
</body>
</html>