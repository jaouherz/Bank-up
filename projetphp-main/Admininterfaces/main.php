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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/mainpage.css"></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    @import url("https://fonts.googleapis.com/css?family=Raleway");
    :root {
        --glow-color: rgb(44, 134, 243);
    }
    .glowing-btn {
        position: relative;
        color: var(--glow-color);
        cursor: pointer;
        padding: 0.35em 1em;
        border: 0.15em solid var(--glow-color);
        border-radius: 0.45em;
        background: none;
        perspective: 2em;
        font-family: "Raleway", sans-serif;
        font-size: 2em;
        font-weight: 900;
        letter-spacing: 1em;
        -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
        -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
        box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
        animation: border-flicker 2s linear infinite;
    }
    .glowing-txt {
        float: left;
        margin-right: -0.8em;
        -webkit-text-shadow: 0 0 0.125em #000, 0 0 0.45em var(--glow-color);
        -moz-text-shadow: 0 0 0.125em #000, 0 0 0.45em var(--glow-color);
        text-shadow: 0 0 0.125em #000, 0 0 0.45em var(--glow-color);
        animation: text-flicker 3s linear infinite;
    }
    .faulty-letter {
        opacity: 0.5;
        animation: faulty-flicker 2s linear infinite;
    }
    .glowing-btn::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0.7;
        filter: blur(1em);
        transform: translateY(120%) rotateX(95deg) scale(1, 0.35);
        background: var(--glow-color);
        pointer-events: none;
    }
    .glowing-btn::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        z-index: -1;
        background-color: var(--glow-color);
        box-shadow: 0 0 2em 0.2em var(--glow-color);
        transition: opacity 100ms linear;
    }
    .glowing-btn:hover {
        color: rgba(0, 0, 0, 0.8);
        text-shadow: none;
        animation: none;
    }
    .glowing-btn:hover .glowing-txt {
        animation: none;
    }
    .glowing-btn:hover .faulty-letter {
        animation: none;
        text-shadow: none;
        opacity: 1;
    }
    .glowing-btn:hover:before {
        filter: blur(1.5em);
        opacity: 1;
    }
    .glowing-btn:hover:after {
        opacity: 1;
    }
    @keyframes faulty-flicker {
        0% {
            opacity: 0.1;
        }
        2% {
            opacity: 0.1;
        }
        4% {
            opacity: 0.5;
        }
        19% {
            opacity: 0.5;
        }
        21% {
            opacity: 0.1;
        }
        23% {
            opacity: 1;
        }
        80% {
            opacity: 0.5;
        }
        83% {
            opacity: 0.4;
        }
        87% {
            opacity: 1;
        }
    }
    @keyframes text-flicker {
        0% {
            opacity: 0.1;
        }
        2% {
            opacity: 1;
        }
        8% {
            opacity: 0.1;
        }
        9% {
            opacity: 1;
        }
        12% {
            opacity: 0.1;
        }
        20% {
            opacity: 1;
        }
        25% {
            opacity: 0.3;
        }
        30% {
            opacity: 1;
        }
        70% {
            opacity: 0.7;
        }
        72% {
            opacity: 0.2;
        }
        77% {
            opacity: 0.9;
        }
        100% {
            opacity: 0.9;
        }
    }
    @keyframes border-flicker {
        0% {
            opacity: 0.1;
        }
        2% {
            opacity: 1;
        }
        4% {
            opacity: 0.1;
        }
        8% {
            opacity: 1;
        }
        70% {
            opacity: 0.7;
        }
        100% {
            opacity: 1;
        }
    }
    @media only screen and (max-width: 600px) {
        .glowing-btn {
            font-size: 1em;
        }
    }
</style>
<body>
<div class="box" >
    <nav class="main-menu" >

        <ul>
            <div class="logo">
                <img src="../$RHR3ED6.png" alt="Logo">
                <img src="../$RRTVBNQ.png" style="margin-left: -27px">
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
        <div class="col-12 px-0 mb-4">
            <div class="container-box">
                <table class="table table-hover">
                    <thead >
                    <tr style="background: #0a53be">
                        <th >First Name</th>
                        <th >Last Name</th>
                        <th >Num tel</th>
                        <th>Adresse</th>
                        <th >Email</th>
                        <th> Edit</th>
                        <th> Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) { ?>

                        <tr>
                            <th class="table-data"><?php echo $user['Firstname']; ?></th>
                            <th class="table-data"><?php echo $user['Lastname']; ?></th>
                            <th class="table-data"><?php echo $user['Numtel']; ?></th>
                            <th class="table-data"><?php echo $user['Adresse']; ?></th>
                            <th class="table-data"><?php echo $user['Email']; ?></th>

                            <th class="table-data">
                                <a href="../BeforeloginInterfaces/updateuser.php?id=<?php echo $user['User_id']; ?>" class="btn btn-secondary">Edit</a>
                            </th>
                            <th > <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['User_id']; ?>)">Delete</button></th>



                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 px-0 mb-4" >
            <div class="container-box" style="    background-color: transparent">
                <button class='glowing-btn' ><a href="../BeforeloginInterfaces/signup.php"><span class='glowing-txt'>ADD<span class='faulty-letter'>-</span>AGENT</span></a></button>
            </div>
        </div>
    </div>
</div>

</body>

</html>