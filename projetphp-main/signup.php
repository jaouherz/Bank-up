
<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $numtel = $_POST['numtel'];
    $date_naissance = $_POST['date_naissance'];
    $adress = $_POST['adress'];
    $id_role = $_POST['role'];; // Assuming the role value is passed as a POST parameter
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');

    $stmt = $db->prepare("INSERT INTO user (Firstname, Email, password, Numtel, Date_N, Adresse, id_role) VALUES (:name, :email, :password, :numtel, :date_naissance, :adress, :id_role)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':numtel', $numtel);
    $stmt->bindParam(':date_naissance', $date_naissance);
    $stmt->bindParam(':adress', $adress);
    $stmt->bindParam(':id_role', $id_role);

    $stmt->execute();
    if ($stmt) {
        echo '<div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Form submitted successfully!</p>
                </div>
            </div>';
    } else {
        echo '<div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Form submission failed!</p>
                </div>
            </div>';
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--  style-->
    <link href="../signup.css" rel="stylesheet">

</head>
<style>
    #header.header-inner-pages {
        background: rgba(0, 125, 254, 255);
        padding: 12px 0;
    }
    </style>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="../SkyBank/">Sky Bank</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="index.html">Home</a></li>
                <li><a class="nav-link scrollto" href="about.php">About</a></li>
                <li><a class="nav-link scrollto " href="terms.html">Terms and Condition</a></li>
                <li><a class="nav-link scrollto" href="contact.html">Contact</a></li>
                <li><a class="nav-link scrollto" style="cursor: pointer" href="login.php">Login</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs" >
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Contact us</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section >
        <div class="container">


            <form autocomplete="off" method="POST">
                <div id="focus"></div>
                <h1>Your info</h1>
                <input type="text" half placeholder="First name" name="name" autocomplete="no">
                <input type="text" half placeholder="Last name" name="lastname" autocomplete="no">
                <input type="text" placeholder="Numtel" name="numtel" autocomplete="no">
                <input type="date" half placeholder="date naissance" name="date_naissance" autocomplete="no">
                <input type="text" half placeholder="adress" name="adress" autocomplete="no">
                <input type="email" placeholder="e-Mail" name="email" autocomplete="no">
                <input type="password" placeholder="Password" name="password" autocomplete="no">
                <input type="submit" value="Send it">
                <select name="role">
                    <?php
                    $stmt = $db->query("SELECT * FROM role");
                    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($roles as $role) {
                        echo '<option value="' . $role['id_role'] . '">' . $role['nom_role'] . '</option>';
                    }
                    ?>
                </select>

            </form>


        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container2">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Sky Bank</h3>
                    <p>
                        Sky Tower <br>
                        New Mumbai, NY 535022<br>
                        India <br><br>
                        <strong>Phone:</strong> +91 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="../SkyBank/#services">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="terms.html">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="privacypolicy.html">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="user/UserData/Transfer.php">Money Transfer</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="Online Banking.html">Online Banking</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="user/UserData/Dashboard.php">Check Balance</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="user/CreateAccount.php">Create Account</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="user/login.php">Login</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/Logo.svg" style="width: 100px; height: 100px;" alt="">
                    </div>

                    <h1 class="text-center mt-2">SKY BANK</h1>
                </div>

            </div>
        </div>
    </div>

    <div class="container">

        <div class="copyright-wrap d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Sky Bank</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Display the modal
    modal.style.display = "block";
</script>
</body>

</html>

