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
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="mainpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Main</title>
</head>
<style>
   .table thead tr th{
       /*background-color: black;*/
   }
</style>
<body>
        <div class="box" >
            <nav class="main-menu" >

                <ul>
                    <div class="logo">
                        <img src="$RHR3ED6.png" alt="Logo">
                        <img src="$RRTVBNQ.png" style="margin-left: -27px">
                    </div>
                    <li >
                        <a>
                            <i class="fa fa-line-chart fa-2x"></i>
                            <span class="nav-text">
                          consulter mes transaction
                        </span>
                        </a>

                    </li>
                    <li >
                        <a>
                            <i class="fa fa-handshake-angle fa-2x" ></i>
                            <span class="nav-text">
                            Faire une transaction
                        </span>

                        </a>
                    </li>
                    <li class="has-subnav" >
                        <a>
                            <i class="fa fa-calendar fa-2x"></i>
                            <span class="nav-text">
                            mes demandes
                        </span>
                        </a>

                    </li>

                    <li >
                        <a>
                            <i class="fa fa-calendar-days fa-2x"></i>
                            <span class="nav-text">
                            mon profile
                        </span>
                        </a>


                    <li >
                        <a>
                            <i class="fa fa-list fa-2x"  ></i>
                            <span class="nav-text" >
                            Mes Projets
                        </span>

                        </a>
                    </li>
                    <li >
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
            <div class="container">
                <div class="col-12 px-0 mb-4 ">
                    <div class="pagetitle">
                        <h1>
                            Admin Panel: User Directory
                        </h1>
                        <br>
                    </div>
                </div>
                <div class="col-12 px-0 mb-4 ">
                    <div class="container-box">
                        <table class="table table-hover">
                            <thead >
                            <tr >
                                <th>First Name</th>
                                <th>Numtel</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <th class="table-data"><?php echo $user['Firstname']; ?></th>
                                    <th class="table-data"><?php echo $user['Numtel']; ?></th>
                                    <th class="table-data"><?php echo $user['Email']; ?></th>
                                    <th class="table-data"><?php echo $user['nom_role']; ?></th>
                                    <th class="table-data">
                                        <a href="updateuser.php?id=<?php echo $user['User_id']; ?>" class="btn btn-secondary">Edit</a>
                                    </th>
                                    <th > <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['User_id']; ?>)">Delete</button></th>



                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
</body>

</html>