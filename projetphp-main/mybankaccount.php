<html>
<?php
session_start();
include 'config db.php'; // Assuming this file contains the database connection code

// Check if the user is logged in
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: login.php');
}

global $db;
$userid = $_SESSION['id'];
$totalReceived = 0;
$totalSent = 0;
// Fetch user data based on ID
$stmt = $db->prepare("SELECT * FROM bank_account AS b
                      INNER JOIN transaction AS t
                      ON t.compte_sender = b.id_account OR b.id_account = t.compte_receiver
                      WHERE id_user = :id
                      ORDER BY t.date desc ");
$stmt->bindParam(':id', $userid);
$stmt->execute();
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$transactions) {
    die("No transactions found.");
}




$stmt = $db->prepare("SELECT * FROM bank_account WHERE id_user = :id");
$stmt->bindParam(':id', $userid);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}
foreach ($transactions as $transaction) {
if ($transaction['compte_sender'] == $user['id_account']) {
    $totalSent += $transaction['montant'];
} else {
    $totalReceived += $transaction['montant'];
}}
?>
<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="mainpage.css"></head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>
<?php
include "sidebar.php"
?>

    <div class="container">
        <div class="col-12 px-0 mb-4 ">
            <div class="pagetitle">
                <h1>
                    Transaction Ledger: Tracking Your Financial Movements
                </h1>
                <br>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-md-7 col-12">
                <div class="row">

                    <div class="col-12 mb-4">
                        <div class="row box-right">
                            <div class="col-md-8 ps-0 ">
                                <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL CREDS</p>
                                <p class="h1 fw-bold d-flex"> <?php
                                    echo $user['solde']
                                    ?> <span class="  textmuted pe-1 h6 align-text-top mt-1"> DT</span> </p>
                                <p class="ms-3 px-2 bg-green">+10% since last month</p>
                            </div>
                            <div class="col-md-4">
                                <p class="p-blue"> <span class="fas fa-circle pe-2"></span>RECIEVED </p>
                                <p class="fw-bold mb-3"><span class="fas fa-dollar-sign pe-1"></span><?php echo $totalReceived?> <span class="textmuted">.50</span> </p>
                                <p class="p-org"><span class="fas fa-circle pe-2"></span>SEND</p>
                                <p class="fw-bold"><span class="fas fa-dollar-sign pe-1"></span><?php echo $totalSent?><span class="textmuted">.00</span></p>
                            </div>
                        </div>
                    </div>


                                <div class="col-12 px-0 mb-4">
                                    <section>
                                        <h1>Latest Transactions</h1>
                                        <br>
                                        <?php
                                        foreach ($transactions as $transaction) {

                                            ?>
                                            <details>
                                                <summary>
                                                    <div>

                                                        <h3>
                                                            <strong> <?php
                                                                if ($transaction['compte_sender'] == $transaction['id_account']) {
                                                                    $stmt2 = $db->prepare("SELECT * FROM user , bank_account WHERE id_user=User_id and id_account = :id");
                                                                    $stmt2->bindParam(':id', $transaction['compte_receiver']);
                                                                    if ($stmt2->execute()) {
                                                                        $user2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                                                        if ($user2) {
                                                                            ?>
                                                                            <span style="background-color: white;">
                                       <i class="fa-solid fa-arrow-up"></i>
                                    </span>
                                                                            <?php
                                                                            echo $user2['Firstname'];
                                                                        } else {
                                                                            echo "User not found";
                                                                        }
                                                                    } else {
                                                                        echo "Error executing query";
                                                                    }
                                                                } else {
                                                                    $stmt2 = $db->prepare("SELECT * FROM user , bank_account WHERE id_user=User_id and id_account = :id");
                                                                    $stmt2->bindParam(':id', $transaction['compte_sender']);
                                                                    if ($stmt2->execute()) {
                                                                        $user2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                                                        if ($user2) {
                                                                            ?>
                                                                            <span >
                                       <i class="fa-solid fa-arrow-down"></i>
                                    </span>


                                                                            <?php
                                                                            echo $user2['Firstname'];
                                                                         ?>






                                                                        <?php } else {
                                                                            echo "User not found";
                                                                        }
                                                                    } else {
                                                                        echo "Error executing query";
                                                                    }
                                                                }
                                                                ?></strong>
                                                            <small><?php $transaction['date']  ?></small>
                                                        </h3>
                                                        <span><?php echo $transaction['montant']; ?></span>
                                                    </div>
                                                </summary>
                                                <div>
                                                    <dl>
                                                        <div>
                                                            <dt><?php echo $transaction['date']; ?></dt>
                                                            <dd>4.27pm</dd>
                                                        </div>
                                                        <div>
                                                            <dt>Card used</dt>
                                                            <dd>•••• 6890</dd>
                                                        </div>
                                                        <div>
                                                            <dt>Reference ID</dt>
                                                            <dd>3125-568911</dd>
                                                        </div>
                                                    </dl>
                                                </div>
                                            </details>
                                            <?php
                                        }
                                        ?>
                                    </section>
                                </div>





                    <div class="col-12 px-0 ">
                        <div class="box-right">
                            <div class="d-flex pb-2">
                                <p class="fw-bold h7"><span class="textmuted">quickpay.to/</span>Publicnote</p>
                                <p class="ms-auto p-blue"><span class=" bg btn btn-primary fas fa-pencil-alt me-3"></span> <span class=" bg btn btn-primary far fa-clone"></span> </p>
                            </div>
                            <div class="bg-blue p-2">
                                <P class="h8 textmuted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum recusandae dolorem voluptas nemo, modi eos minus nesciunt.
                                <p class="p-blue bg btn btn-primary h8">LEARN MORE</p>
                                </P>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-5 col-12 ps-md-5 p-0 ">
                <div class="box-left">
                    <p class="textmuted h8">Invoice</p>
                    <p class="fw-bold h7">Alex Parkinson</p>
                    <p class="textmuted h8">3897 Hickroy St, salt Lake city</p>
                    <p class="textmuted h8 mb-2">Utah, United States 84104</p>
                    <div class="h8">
                        <div class="row m-0 border mb-3">
                            <div class="col-6 h8 pe-0 ps-2">
                                <p class="textmuted py-2">Items</p> <span class="d-block py-2 border-bottom">Legal Advising</span> <span class="d-block py-2">Expert Consulting</span>
                            </div>
                            <div class="col-2 text-center p-0">
                                <p class="textmuted p-2">Qty</p> <span class="d-block p-2 border-bottom">2</span> <span class="d-block p-2">1</span>
                            </div>
                            <div class="col-2 p-0 text-center h8 border-end">
                                <p class="textmuted p-2">Price</p> <span class="d-block border-bottom py-2"><span class="fas fa-dollar-sign"></span>500</span> <span class="d-block py-2 "><span class="fas fa-dollar-sign"></span>400</span>
                            </div>
                            <div class="col-2 p-0 text-center">
                                <p class="textmuted p-2">Total</p> <span class="d-block py-2 border-bottom"><span class="fas fa-dollar-sign"></span>1000</span> <span class="d-block py-2"><span class="fas fa-dollar-sign"></span>400</span>
                            </div>
                        </div>
                        <div class="d-flex h7 mb-2">
                            <p class="">Total Amount</p>
                            <p class="ms-auto"><span class="fas fa-dollar-sign"></span>1400</p>
                        </div>
                        <div class="h8 mb-5">
                            <p class="textmuted">Lorem ipsum dolor sit amet elit. Adipisci ea harum sed quaerat tenetur </p>
                        </div>
                    </div>
                    <div class="">
                        <p class="h7 fw-bold mb-1">Pay this Invoice</p>
                        <p class="textmuted h8 mb-2">Make payment for this invoice by filling in the details</p>
                        <div class="form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0"> <input class="form-control ps-5" type="text" placeholder="Card number"> <span class="far fa-credit-card"></span> </div>
                                </div>
                                <div class="col-6"> <input class="form-control my-3" type="text" placeholder="MM/YY"> </div>
                                <div class="col-6"> <input class="form-control my-3" type="text" placeholder="cvv"> </div>
                                <p class="p-blue h8 fw-bold mb-3">MORE PAYMENT METHODS</p>
                            </div>
                            <div class="btn btn-primary d-block h8">PAY <span class="fas fa-dollar-sign ms-2"></span>1400<span class="ms-3 fas fa-arrow-right"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>