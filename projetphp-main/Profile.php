
<?php
include "sidebar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="mainpage.css"></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<div class="container">
    <div class="col-12 px-0 mb-4 ">
        <div class="pagetitle">
            <h1>
                My Profile
            </h1>
            <br>
        </div>
    </div>
    <div class="col-12 px-0 mb-4">
        <div class="container-box">
            <div class="container-fluid d-flex">

                <div class="flex-grow-1">

                    <div class=" bootstrap snippets bootdey" >

                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img class="avatar img-circle img-thumbnail" alt="avatar" src='bank-account-icon-in-trendy-outline-style-isolated-on-white-background-bank-account-silhouette-symbol-for-your-website-design-logo-app-ui-illustration-eps10-free-vector.jpg' >
                                    <button ><input type="image" value="Photo"></button>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <form>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h6 class="mb-3 text-primary">Personal informations</h6>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label  class="small mb-1" for="nom">First Name</label>
                                                        <input type="text" name="nom" class="form-control" id="nom">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="prenom">Last Name</label>
                                                        <input type="prenom" type="text" class="form-control" name="prenom" id="prenom" >
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="email">Email</label>
                                                        <input class="form-control" id="email" type="email" name='email'>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="role">Role</label>
                                                        <input class="form-control" id="role"  type="text" name='role' readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h6 class="mt-3 mb-2 text-primary"></h6>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="dateNaissance">Date of birth</label>
                                                        <input class="form-control" id="dateNaissance"  type="date"  name='dateNaissance' >
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="adresse">Address</label>
                                                        <input class="form-control" id="adresse"  type="text"  name='adresse'  >
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="sexe">Gender</label>
                                                        <select name="sexe"id="sexe" class="form-control" >
                                                            <option value="" selected>--Sexe-</option>
                                                            <option value="Masculin">Masculin</option>
                                                            <option value="Feminin">Feminin</option>

                                                        </select>          </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="numtel">Phone number</label>
                                                        <input class="form-control" id="numtel"  type="number" name='numtel'  >
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="ncin">Cin</label>
                                                        <input class="form-control" id="ncin"  type="number" name='ncin' >
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="numcompte">Account number</label>
                                                        <input class="form-control" id="numcompte"  type="text"  name='numcompte'>
                                                    </div>
                                                </div>


                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="text-right">
                                                            <button type="submit" name="button" class="btn btn-primary">Save</button>
                                                        </div>

                                                    </div>
                                                </div>      </div>

                                        </form>


                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>


