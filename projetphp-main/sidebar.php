<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

}

?>
<html>
<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sidebar.css"></head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>

<div class="box" >
    <nav class="main-menu" >
        <ul>
            <div class="logo">
                <img href="index.html" src="$RHR3ED6.png" alt="Logo">
                <img src="$RRTVBNQ.png" style="margin-left: -27px">
            </div>
            <?php if ($role === 'user') { ?>
                <li >
                    <a href="Profile.php">
                        <i class="fa fa-solid fa-user" href="Profile.php"></i>
                        <span class="nav-text">
                                My profile
                            </span>
                    </a>
                </li>
                <li >
                    <a href="mybankaccount.php">
                        <i class="fa fa-solid fa-arrow-right-arrow-left"></i>
                        <span class="nav-text">
                              View my transactions
                        </span>
                    </a>
                </li>
                <li >
                    <a href="maketransaction.php">

                        <i class="fa fa-solid fa-circle-dollar-to-slot"></i>
                        <span class="nav-text">
                                Make a transaction
                            </span>

                    </a>
                </li>
                <li>
                    <a href="demande.php">

                        <i class="fa fa-solid fa-hand-point-up"></i>

                        <span class="nav-text"  >
                                Add request
                            </span>
                    </a>
                </li>
                <li>
                    <a href="agentLists.php">

                        <i class="fa fa-solid fa-user-tie"></i>

                        <span class="nav-text"  >
                                Agent list
                            </span>
                    </a>
                </li>
                <li>
                    <a href="addAgent.php">

                        <i class="fa fa-solid fa-user-plus"  style="margin-left: 3px;"></i>

                        <span class="nav-text"  >
                                 Add Agent
                            </span>
                    </a>
                </li>
                <li class="has-subnav" >
                    <a>
                        <i class=" fa fa-solid fa-comment-dots"></i>                    <span class="nav-text">
                                My requests
                            </span>
                    </a>

                </li>
            <?php } ?>
            <?php  if ($role === 'agent') {
                echo' <li >
                    <a href="agentpagemain.php">

                    <i class="fa fa-list fa-2x"  ></i>
                        <span class="nav-text" >
                                Users management
                            </span>

                    </a>
                </li>';
            } ?>
            <?php  if ($role === 'admin') {
                echo' <li >
                    <a href="main.php">

                    <i class="fa fa-list fa-2x"  ></i>
                        <span class="nav-text" >
                                agents management
                            </span>

                    </a>
                </li>';
            } ?>

        </ul>


    </nav>

</body>
</html>