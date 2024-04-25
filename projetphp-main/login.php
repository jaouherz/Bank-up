

<!DOCTYPE html>
<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (empty($email) || empty($pass)) {

    } else {
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT user.*, role.nom_role FROM user INNER JOIN role ON user.id_role = role.id_role 
                          WHERE user.Email=:email AND user.password=:pass ");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Set user role name in session
            $_SESSION['role'] = $user['nom_role'];

            // Redirect based on role name
            switch ($user['nom_role']) {
                case 'admin':
                    header('Location: main.php');
                    break;
                case 'client':
                    header('Location: client.php');
                    break;
                case 'agent':
                    header('Location: agent.php');
                    break;
                default:
                    header('Location: index.php');
                    break;
            }
            exit;
        } else {
            echo "Invalid email or password";
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>24x7 Services Sky Bank</title>
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

</head>

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
                <li><a class="nav-link scrollto" href="contact.html">Contact</a></li>
                <li><a class="nav-link scrollto" href="signup.html">Sign Up</a></li>
                <li><a class="nav-link scrollto" href="login.html">Login</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">
    <section class="inner-page" >
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card py-3 px-2">
                        <p class="text-center mb-3 mt-2"> CONNECTER </p>
                        <div class="row mx-auto ">
                            <div class="col-4">
                                <i class="fa fa-university"></i>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-microchip"></i>
                            </div>
                            <div class="col-4">
                                <i class="fa  fa-id-card"></i>
                            </div>
                        </div>
                        <div class="division">
                            <div class="row">
                                <div class="col-3"><div class="line l"></div></div>
                                <div class="col-6"><span>OU AVEC MON EMAIL</span></div>
                                <div class="col-3"><div class="line r"></div></div>
                            </div>
                        </div>
                        <form class="myform" method="post" action="">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Rester connecte</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 bn">Mot se passe oublie</div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit"><small><i class="far fa-user pr-2"></i>Se connecter</small></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container2">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3> Bank-up</h3>

                </div>

                <div class="col-lg-2 col-md-6 footer-links">

                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>

                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">


                    <h1 class="text-center mt-2">SKY BANK</h1>
                </div>

            </div>
        </div>
    </div>

    <div class="container">

        <div class="copyright-wrap d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Bank-up</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                </div>

        </div>

    </div>
</footer>




</body>

</html>