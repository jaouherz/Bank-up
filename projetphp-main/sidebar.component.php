<html>
<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sidebar.component.css"></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<body>
<div class="logo">
    <img src="24016483-removebg-preview.png" alt="Logo">
</div>
<div class="area"></div><nav class="main-menu" >
    <ul>
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
</body>
</html>