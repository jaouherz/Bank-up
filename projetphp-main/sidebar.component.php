<html>
<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sidebar.component.css"></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<body><div class="area"></div><nav class="main-menu" >
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
</body>
</html>