<?php
session_start();
include 'config db.php';
include 'sidebar.php';

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

global $db;
$userid = $_SESSION['id'];
$totalReceived = 0;
$totalSent = 0;
$stmt = $db->prepare("SELECT * FROM bank_account WHERE id_user = :id ");
$stmt->bindParam(':id', $userid);
$stmt->execute();
$bank_account = $stmt->fetch(PDO::FETCH_ASSOC);

// Search functionality
$searchResults = [];
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $stmt = $db->prepare("SELECT ba.id_account, CONCAT(u.User_id, ' - ', u.Firstname) AS user_account 
                      FROM user u, bank_account ba 
                      WHERE u.User_id=ba.id_user 
                      AND CONCAT(u.User_id, ' - ', u.Firstname) LIKE :term");
    $stmt->bindValue(':term', '%' . $searchTerm . '%');
    $stmt->execute();
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Return search results as JSON
    echo json_encode($searchResults);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <style>
        /* Your CSS styles here */
    </style>
    <meta charset="UTF-8">
    <title>Make Transaction</title>
</head>
<body>
<div class="container-fluid d-flex">
    <div class="flex-grow-1">
        <div class="d-flex align-items-center justify-content-end mb-4">
            <!-- Your solde display here -->
            <span>Your Solde: <?php echo $bank_account['solde'] ?></span>
            <i class="bx bx-search me-2"></i>
        </div>
        <div class="col-md-6">
            <label class="" for="receiver">Receiver<span style="color: #D72A12">*</span></label>
            <input class="form-control" id="receiver" type="text" name="receiver">
        </div>
        <div class="container" id="main-container" style="margin-top:100px;margin-left:-70px;">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header py-3" style="background-color:rgb(44, 134, 243);">
                            <h6 style="color:white;font-size: 17px;margin-left:280px;">Make a Transaction</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="receiver">Receiver<span style="color: #D72A12">*</span></label>
                                        <input class="form-control" id="receiver" type="text" name="receiver">
                                    </div>
                                    <div id="autocomplete-suggestions"></div> <!-- Autocomplete suggestions -->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="amount">Amount<span style="color: #D72A12">*</span></label>
                                        <input class="form-control" id="amount" type="text"  name="amount" >
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="text-align:center;width:250px; margin-left: 230px;margin-top:15px;">Make Transaction</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#receiver").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "",
                    type: "post",
                    dataType: "json",
                    data: {
                        searchTerm: request.term
                    },
                    success: function(data) {
                        var suggestions = [];
                        $.each(data, function(index, value) {
                            suggestions.push(value.id_account + ' - ' + value.user_account);
                        });
                        response(suggestions);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            },
            minLength: 1
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo("#autocomplete-suggestions");
        };
    });
</script>

</body>
</html>
