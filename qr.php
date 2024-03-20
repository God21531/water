<?php
declare(strict_types=1);
require("includes/common.php");



use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('vendor/autoload.php');

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 5,
  ]
);



$sum = 0;$id='';
$user_id = $_SESSION['user_id'];
$query = "SELECT items.price AS Price, items.id As id, items.name AS Name FROM user_item JOIN items ON user_item.item_id = items.id WHERE user_item.user_id='$user_id' and `status`=1";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
if (mysqli_num_rows($result) >= 1) {

    
    while ($row = mysqli_fetch_array($result)) {
        $sum+= $row["Price"];
        //$id .= $row["id"] . ", ";
        //echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>Rs " . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Remove</a></td></tr>";
    }
    //$id = rtrim($id, ", ");
    //echo "<tr><td></td><td>Total</td><td>Rs " . $sum . "</td><td><a href='qr.php?itemsid=" . $id . "' class='btn btn-primary'>Confirm Order</a></td></tr>";
    
    

                

$qrcode = (new QRCode($options))->render('upi://pay?pa=joshua21531@oksbi&pn=GODWIN VINO&am='. $sum .'&cu=INR&aid=uGICAgIC_57yTTQ');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Create QR Codes in PHP</title>
  <link rel="stylesheet" href="css/qr.css">
</head>
<body>
<h1>Pay!, by scanning this :</h1>
<div class="container">
  <img src='<?= $qrcode ?>' alt='QR Code' width='800' height='800'>


    <h1>Payment Confirmation</h1>
    <p>After paying, kindly press this confirm button for confirmation:</p>
    <a href="success.php">
    <button id="confirmButton">Confirm Payment</button>
  </a>
    <!--<button id="confirmButton" href="../success.php">Confirm Payment</button> -->
    </div>
</body>
</html>