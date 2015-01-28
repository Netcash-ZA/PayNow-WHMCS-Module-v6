<?php

# Required File Includes
include("../../../dbconnect.php");
include("../../../includes/functions.php");
include("../../../includes/gatewayfunctions.php");
include("../../../includes/invoicefunctions.php");

$gatewaymodule = "paynow"; # Enter your gateway module name here replacing template

$GATEWAY = getGatewayVariables($gatewaymodule);
if (!$GATEWAY["type"]) die("Module Not Activated"); # Checks gateway module is active before accepting callback

# Get Returned Variables - Adjust for Post Variable Names from your Gateway's Documentation
$status = $_POST["TransactionAccepted"];
$invoiceid = $_POST["Reference"];
$transid = $_POST["RequestTrace"];
$amount = $_POST["Amount"];
$fee = "";

$invoiceid = checkCbInvoiceID($invoiceid,$GATEWAY["name"]); # Checks invoice ID is a valid invoice number or ends processing

checkCbTransID($transid); # Checks transaction number isn't already in the database and ends processing if it does

if ($status=="true") {
    # Successful
    addInvoicePayment($invoiceid,$transid,$amount,$fee,$gatewaymodule); # Apply Payment to Invoice: invoiceid, transactionid, amount paid, fees, modulename
	logTransaction($GATEWAY["name"],$_POST,"Successful"); # Save to Gateway Log: name, data array, status
	echo "<p>Payment was successful.</p>";
	echo "<p>You will be redirected to the client area in 5 seconds. <a href='../../../clientarea.php'>Click here</a> to return immediately.</p>";
	?>

	<script type="text/javascript">
		setTimeout(function () {
	       window.location.href = "../../../clientarea.php";
	    }, 5000);
	</script>
	<?php
} else {
	# Unsuccessful
    logTransaction($GATEWAY["name"],$_POST,"Unsuccessful"); # Save to Gateway Log: name, data array, status
    echo "<p>Payment was declined. Reason: " . $_POST['Reason'] . "</p>";
    echo "<p><a href='../../../cart.php'>Click here</a> to return to the cart.</p>";
}



?>