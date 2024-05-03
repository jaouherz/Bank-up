<?php


global$db;
include 'config db.php';



$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->query("SELECT user.*, role.nom_role FROM user INNER JOIN role ON user.id_role = role.id_role WHERE role.nom_role='agent'");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $stmt = $db->prepare("DELETE FROM user WHERE User_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    // Return a success message
    echo "User deleted successfully.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/main.css" rel="stylesheet/scss" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>
<style>
    .table{
        width:1000px;
        margin-left:70px;
    }
    .dashboard-nav {
        background-color: #0a53be;
    }
</style>
<body>
<div class='dashboard'>
    <div class="dashboard-nav">
        <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo">
                <img src="images/img_2.png" class="iconimg"> <span>MENU</span></a></header>
        <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><img src="images/img_3.png" class="iconimg">
                Home </a><a
                    href="signup.php" class="dashboard-nav-item active"><img src="images/img_4.png" class="iconimg"> Add User
            </a>
            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><img src="images/img_5.png" class="iconimg"> Users </a>
                <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                            class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Subscribed</a><a
                            href="#"
                            class="dashboard-nav-dropdown-item">Non-subscribed</a><a
                            href="#" class="dashboard-nav-dropdown-item">Banned</a><a
                            href="#" class="dashboard-nav-dropdown-item">New</a></div>
            </div>
            <a href="#" class="dashboard-nav-item"><img src="images/img_7.png" class="iconimg"> Settings </a><a
                    href="#" class="dashboard-nav-item"><img src="images/img_6.png" class="iconimg"> Profile </a>
            <div class="nav-item-divider"></div>
            <a
                    href="#" class="dashboard-nav-item"><img src="images/img_8.png" class="iconimg"> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <table class="table table-hover">
            <thead >
            <tr style="background: #0a53be">
                <th style="text-align: center">First Name</th>
                <th style="text-align: center">Last Name</th>
                <th style="text-align: center">Num tel</th>
                <th style="text-align: center">Email</th>
                <th></th>
                <th></th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>

                <tr>
                    <th class="table-data"><?php echo $user['Firstname']; ?></th>
                    <th class="table-data"><?php echo $user['Lastname']; ?></th>
                    <th class="table-data"><?php echo $user['Numtel']; ?></th>
                    <th class="table-data"><?php echo $user['Email']; ?></th>
                    <th class="table-data">
                        <a href="updateuser.php?id=<?php echo $user['User_id']; ?>" class="btn btn-secondary">Edit</a>
                    </th>
                    <th > <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['User_id']; ?>)">Delete</button></th>



                </tr>
            <?php } ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            const mobileScreen = window.matchMedia("(max-width: 990px )");
            $(document).ready(function () {
                $(".dashboard-nav-dropdown-toggle").click(function () {
                    $(this).closest(".dashboard-nav-dropdown")
                        .toggleClass("show")
                        .find(".dashboard-nav-dropdown")
                        .removeClass("show");
                    $(this).parent()
                        .siblings()
                        .removeClass("show");
                });
                $(".menu-toggle").click(function () {
                    if (mobileScreen.matches) {
                        $(".dashboard-nav").toggleClass("mobile-show");
                    } else {
                        $(".dashboard").toggleClass("dashboard-compact");
                    }
                });
            });
        </script>


        <script>
            function deleteUser(userId) {
                if (confirm("Are you sure you want to delete user " + userId + "?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "main.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            alert(xhr.responseText);
                            location.reload();
                        }
                    };
                    xhr.send("id=" + userId);
                }
            }
        </script>

</body>

</html>