
<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (empty($email) || empty($pass)) {
        // Handle empty email or password
    } else {
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT user.*, role.nom_role FROM user INNER JOIN role ON user.id_role = role.id_role  
                             WHERE user.Email=:email");
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pass, $user['password'])) {
            // Password is correct, set session and redirect
            $_SESSION['role'] = $user['nom_role'];

            // Redirect based on role name
            switch ($user['nom_role']) {
                case 'admin':
                    header('Location: main.php');
                    exit;
                case 'client':
                    header('Location: client.php');
                    exit;
                case 'agent':
                    header('Location: agent.php');
                    exit;
                default:
                    header('Location: index.php');
                    exit;
            }
        } else {
            // Invalid password
            echo 'Invalid email or password';
        }
    }
}
?>


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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--  style-->

</head>

<style>
    #header.header-inner-pages {
        background: rgba(0, 125, 254, 255);
        padding: 12px 0;
    }
    section {
        margin-top: 50px;
    }
    .frm{
        border: 1px solid #d5dae2;
        margin-bottom: 20px;
        width: 450px;
        height: 450px;
    }
</style>
<style>
    /* formulaire*/
    #connexion {
        margin-bottom: 50px;
        margin-top: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: auto;
        flex-direction: column;
    }
    #connexion form {
        display: flex;
        background-color: rgba(0,0,0,0.05);
        padding: 25px;
        border-radius: 6px;
        flex-direction: column;
        width: 390px;
    }
    #connexion form  label {
        margin-bottom: 8px;
        font-size: 14px;
    }
    #connexion form input {
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid transparent;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        outline: 0;
    }
    #connexion form input:focus {
        outline: 1px solid #0CC0DF;
    }
    #connexion form input[type="submit"]{
        margin-top: 15px;
        color: #fff;
        background-color: #0CC0DF;
        border: 1px solid #0CC0DF;
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
</header><!-- End Header -->

<main id="main">
    <section class="inner-page">
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="frm">

                        <section id="connexion">
                            <h2 class="title"> LOGIN !</h2>

                        <form class="myform" method="post" action="" id="loginForm">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                <span id="emailError" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                <span id="passwordError" class="text-danger"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Stay connected</label>
                                    </div>
                                </div>
                                <a class="col-md-6 col-12 bn" href="entermailforget.php">Forget password?</a>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg" name="submit"><small><i class="far fa-user pr-2"></i>Se connecter</small></button>
                            </div>
                        </form>
                            </section>
                                </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        // Clear previous error messages
        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';

        // Fetching values from form fields
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Validating email
        if (email.trim() === '') {
            document.getElementById('emailError').textContent = 'Please enter your email address.';
            event.preventDefault();
            return false;
        }

        // Validating password
        if (password.trim() === '') {
            document.getElementById('passwordError').textContent = 'Please enter your password.';
            event.preventDefault();
            return false;
        }

        return true;
    });
</script>

</body>

</html>
