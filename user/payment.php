<?php
$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

if(isset($_POST['submitpayment'])) {
    $full_name = $_POST['full_name'];
    $user_email = $_POST['user_email'];
    $card_number = $_POST['card_number'];
    $card_cvc = $_POST['card_cvc'];
    $card_exp_month = $_POST['card_exp_month'];
    $card_exp_year = $_POST['card_exp_year'];
    $amount = $_POST['amount'];

    $insert = $pdo->prepare("INSERT INTO bookings_payment (full_name,user_email,card_number,card_cvc,card_exp_month,card_exp_year,amount)
				values(:full_name, :user_email, :card_number, :card_cvc, :card_exp_month, :card_exp_year, :amount)
				");
	$insert->bindParam (':full_name',$full_name);
	$insert->bindParam (':user_email',$user_email);
	$insert->bindParam (':card_number',$card_number);
	$insert->bindParam (':card_cvc',$card_cvc);
	$insert->bindParam (':card_exp_month',$card_exp_month);
	$insert->bindParam (':card_exp_year',$card_exp_year);
	$insert->bindParam (':amount',$amount);
	$insert->execute();

    if($insert) {
        header("Location: bookedclass.php");
    }else {
        echo "Database Not Available";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal</title>
</head>

<style>
    body {
        background-color: #b4d9b4;
    }
    h1 {
        font-size: 50px;
        justify-content: center;
        text-align: center;
    }
    h3 {
        font-size: 30px;
        text-align: center;
        justify-content: center;
    }

    .paymentform {
        position: absolute;
        top: 58%;
        left: 50%;
        transform: translate(-50%,-50%);
        font-size: 25px;
        text-align: center;
    }
    .paymentform input {
        font-size: 22px;
        border: 2px solid black;
        border-collapse: none;
        text-align: center;
    }
    .paybutton {
        font-size: 22px;
        border: 2px solid black;
        background-color: grey;
        cursor: pointer;
        padding: 4px;
    }
</style>

<body>

    <h1>Payment Portal</h1>
    <h3>Fill In The Payment Form Below To Complete Your Booking</h3>

    <form action="" method="POST" name="Paymentform" class="paymentform">

        <p>
            <label>Enter Your Full Name:</label><br>
            <input type="text" name="full_name" size="40" autocomplete="off" placeholder="e.g. John Doe"/>
        </p>

        <p>
        <label>Enter Your Email:</label><br>
        <input type="text" name="user_email" size="40" autocomplete="off" placeholder="e.g. user@email.com"/>
    </p>

    <p>
        <label>Enter Your Card Number:</label><br>
        <input type="text" name="card_number" size="20" autocomplete="off" placeholder="e.g. 123 456 789 123"/>
    </p>

    <p>
        <label>Enter The CVC:</label><br>
        <input type="text" name="card_cvc" size="4" autocomplete="off" placeholder="e.g. 342" />
    </p>

    <p>
        <label>Card Expiration (MM/YYYY):</label><br>
        <input type="text" name="card_exp_month" size="2" placeholder="MM"/>
        
        <input type="text" name="card_exp_year" size="4" placeholder="YYYY"/><br>
    </p>

    <p>
        <label style="font-weight:bold;">Amount To Pay:</label><br>
        <input type="text" name="amount" value="£10" readonly>
    </p>

    <button type="submit" name="submitpayment" class="paybutton">Submit Payment</button>

    </form>

    
</body>
</html>