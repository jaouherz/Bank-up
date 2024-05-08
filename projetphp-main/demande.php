
<?php
include "sidebar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request</title>

</head>

<body>
<div class="container-fluid d-flex">

    <div class="flex-grow-1">

        <div class="d-flex align-items-center mb-4" >
            <i class="bx bx-search me-2"></i>
        </div>
        <div class="container" id="main-container" style="margin-top:100px;margin-left:-70px;">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header py-3" style="background-color:rgb(44, 134, 243);">
                            <h6 style="color:white;font-size: 17px;margin-left:280px;">Add a new request</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="type">Request type<span style="color: #D72A12">*</span></label>
                                        <select name="type"   id="type" class="form-control" >
                                            <option value="" selected disabled>--Choose a type-</option>
                                            <option *ngFor="let type of type" [value]="type.typeconge">{{type.typeconge}}</option>

                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="objet">Object<span style="color: #D72A12">*</span></label>
                                        <input class="form-control" id="objet" type="text"  name="objet" >
                                    </div>

                                    <label class="small mb-1" for="description">Description</label>
                                    <textarea class="form-control"  id="description" type="text"  name="description" ></textarea>
                                    <button type="submit" class="btn btn-primary" style="text-align:center;width:250px; margin-left: 230px;margin-top:15px;
" >Request</button>
                                </div>

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