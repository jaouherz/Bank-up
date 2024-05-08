
<?php
include "sidebar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css"></head>

</head>
<div class="container-fluid d-flex">


  <div class="flex-grow-1">

    <div class="d-flex align-items-center mb-4" style="position: fixed; top: 100px; right: -160px; width: 30%;">

      <i class="bx bx-search me-2"></i>

    </div>


    <div class="container bootstrap snippets bootdey" style="margin-left:270px;width:1000px;margin-top:10px;">

      <h1 class="text-primary" style="margin-left:0px;"> My Profile</h1>
      <hr>
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
          <div class="text-center">
            <img class="avatar img-circle img-thumbnail" alt="avatar" src='bank-account-icon-in-trendy-outline-style-isolated-on-white-background-bank-account-silhouette-symbol-for-your-website-design-logo-app-ui-illustration-eps10-free-vector.jpg' >
            <h6>Photo</h6>
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
            <input class="form-control" id="email" type="text" name='email'>
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
            <input class="form-control" id="dateNaissance"  type="text"  name='dateNaissance' >
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
          <input class="form-control" id="numtel"  type="text" name='numtel'  >
        </div>
      </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                  <label class="small mb-1" for="ncin">Cin</label>
                  <input class="form-control" id="ncin"  type="text" name='ncin' >
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
</body>
</html>


