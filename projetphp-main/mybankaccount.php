
<html>
<?php
session_start();
include 'config db.php'; // Assuming this file contains the database connection code

// Check if the user is logged in
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: login.php');
}
global$db;
$userid = $_SESSION['id'];

// Fetch user data based on ID
$stmt = $db->prepare("SELECT * FROM bank_account AS b
                      INNER JOIN transaction AS t
                      ON t.compte_sender = b.id_account OR b.id_account = t.compte_receiver
                      WHERE id_user = :id");
$stmt->bindParam(':id', $userid);
$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the query returned any data
if (!$account) {
    die("No transactions found.");
}

// Display the user's ID
echo $account['id_user'];
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
                                <p class="h1 fw-bold d-flex"> <span class=" fas fa-dollar-sign textmuted pe-1 h6 align-text-top mt-1"></span><?php
                                    $account['id_user']
                                    ?> <span class="textmuted">.00</span> </p>
                                <p class="ms-3 px-2 bg-green">+10% since last month</p>
                            </div>
                            <div class="col-md-4">
                                <p class="p-blue"> <span class="fas fa-circle pe-2"></span>RECIEVED </p>
                                <p class="fw-bold mb-3"><span class="fas fa-dollar-sign pe-1"></span>1254 <span class="textmuted">.50</span> </p>
                                <p class="p-org"><span class="fas fa-circle pe-2"></span>SEND</p>
                                <p class="fw-bold"><span class="fas fa-dollar-sign pe-1"></span>20<span class="textmuted">.00</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <section>
                            <h1>Latest Transactions</h1>
                            <br>
                            <details>
                                <summary>
                                    <div>
				<span style="background-color: #f2dcbb;">
					<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="currentColor" viewBox="0 0 256 256">
						<rect width="256" height="256" fill="none"></rect>
						<path d="M192,120h27.05573a8,8,0,0,0,7.15542-4.42229l18.40439-36.80878a8,8,0,0,0-3.18631-10.52366L192,40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
						<path d="M64,120H36.94427a8,8,0,0,1-7.15542-4.42229L11.38446,78.76893a8,8,0,0,1,3.18631-10.52366L64,40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
						<path d="M160,40a32,32,0,0,1-64,0H64V208a8,8,0,0,0,8,8H184a8,8,0,0,0,8-8V40Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
					</svg>
				</span>
                                        <h3>
                                            <strong>American Eagle</strong>
                                            <small>Clothes & Fashion</small>
                                        </h3>
                                        <span></span>
                                    </div>
                                </summary>
                                <div>
                                    <dl>
                                        <div>
                                            <dt>Time</dt>
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
                            <details>
                                <summary>
                                    <div>
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="currentColor" viewBox="0 0 256 256">
						<rect width="256" height="256" fill="none"></rect>
						<rect x="32" y="80" width="192" height="48" rx="7.99999" stroke-width="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="none"></rect>
						<path d="M208,128v72a8,8,0,0,1-8,8H56a8,8,0,0,1-8-8V128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
						<line x1="128" y1="80" x2="128" y2="208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
						<path d="M173.25483,68.68629C161.94113,80,128,80,128,80s0-33.94113,11.31371-45.25483a24,24,0,0,1,33.94112,33.94112Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
						<path d="M82.74517,68.68629C94.05887,80,128,80,128,80s0-33.94113-11.31371-45.25483A24,24,0,0,0,82.74517,68.68629Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
					</svg>
				</span>
                                        <h3>
                                            <strong>From Håvard Brynjulfsen</strong>
                                            <small>Gift</small>
                                        </h3>
                                        <span class="plus">+50.00 USD</span>
                                    </div>
                                </summary>
                                <div>
                                    <dl>
                                        <div>
                                            <dt>Time</dt>
                                            <dd>8.14am</dd>
                                        </div>

                                        <div>
                                            <dt>Reference ID</dt>
                                            <dd>3125-568912</dd>
                                        </div>
                                    </dl>
                                </div>
                            </details>
                            <details>
                                <summary>
                                    <div>
				<span style="background-color: #e0ece4;">
					<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#000000" viewBox="0 0 256 256">
						<rect width="256" height="256" fill="none"></rect>
						<line x1="88" y1="24" x2="88" y2="56" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
						<line x1="120" y1="24" x2="120" y2="56" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
						<line x1="152" y1="24" x2="152" y2="56" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
						<line x1="32" y1="216" x2="208" y2="216" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
						<path d="M83.29651,216.0038A88.01441,88.01441,0,0,1,32,136V88H208v48a88.0144,88.0144,0,0,1-51.29712,80.00408" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
						<path d="M208,88h0a32,32,0,0,1,32,32V128a32,32,0,0,1-32,32h-3.37846" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
					</svg>
				</span>
                                        <h3>
                                            <strong>Starbucks</strong>
                                            <small>Food & Beverage</small>
                                        </h3>
                                        <span>-14.99 USD</span>
                                    </div>
                                </summary>
                                <div>
                                    <dl>
                                        <div>
                                            <dt>Time</dt>
                                            <dd>7.49am</dd>
                                        </div>

                                        <div>
                                            <dt>Card used</dt>
                                            <dd>•••• 6890</dd>
                                        </div>

                                        <div>
                                            <dt>Reference ID</dt>
                                            <dd>3125-568913</dd>
                                        </div>
                                    </dl>
                                </div>
                            </details>
                            <details>
                                <summary>
                                    <div>
				<span>
<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#000000" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="96" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><g><path d="M179.1333,108.32931a112.19069,112.19069,0,0,0-102.3584.04859" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><path d="M164.29541,136.71457a79.94058,79.94058,0,0,0-72.68359.04736" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><path d="M149.47217,165.07248a47.97816,47.97816,0,0,0-43.03662.04736" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></g></svg>
				</span>
                                        <h3>
                                            <strong>Spotify</strong>
                                            <small>Music & Entertainment</small>
                                        </h3>
                                        <span>-9.99 USD</span>
                                    </div>
                                </summary>
                                <div>
                                    <dl>
                                        <div>
                                            <dt>Time</dt>
                                            <dd>1.00am</dd>
                                        </div>

                                        <div>
                                            <dt>Card used</dt>
                                            <dd>•••• 6890</dd>
                                        </div>

                                        <div>
                                            <dt>Reference ID</dt>
                                            <dd>3125-568915</dd>
                                        </div>
                                    </dl>
                                </div>
                            </details>
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