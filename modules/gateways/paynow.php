<?php
/*
 * Sage Pay Pay Now Module WHMCS Third Party Gateway
 */
function paynow_config() {
	$configarray = array (
			"FriendlyName" => array (
					"Type" => "System",
					"Value" => "Pay Now" 
			),
			"servicekey" => array (
					"FriendlyName" => "Service Key",
					"Type" => "text",
					"Size" => "20" 
			),
			"softwarevendorkey" => array (
					"FriendlyName" => "Software Vendor Key",
					"Type" => "text",
					"Size" => "20" 
			),
			"testmode" => array (
					"FriendlyName" => "Test Mode",
					"Type" => "yesno",
					"Description" => "Tick this to test" 
			) 
	);
	return $configarray;
}
function paynow_link($params) {
	
	// Gateway Specific Variables
	$gatewayusername = $params ['username'];
	$gatewaytestmode = $params ['testmode'];
	
	// Invoice Variables
	$invoiceid = $params ['invoiceid'];
	$description = $params ["description"];
	$amount = $params ['amount']; // Format: ##.##
	$currency = $params ['currency']; // Currency Code
	                                 
	// Client Variables
	$firstname = $params ['clientdetails'] ['firstname'];
	$lastname = $params ['clientdetails'] ['lastname'];
	$email = $params ['clientdetails'] ['email'];
	$address1 = $params ['clientdetails'] ['address1'];
	$address2 = $params ['clientdetails'] ['address2'];
	$city = $params ['clientdetails'] ['city'];
	$state = $params ['clientdetails'] ['state'];
	$postcode = $params ['clientdetails'] ['postcode'];
	$country = $params ['clientdetails'] ['country'];
	$phone = $params ['clientdetails'] ['phonenumber'];
	
	// System Variables
	$companyname = $params ['companyname'];
	$systemurl = $params ['systemurl'];
	$currency = $params ['currency'];
	
	// Enter your code submit to the gateway...
	
	$code = '<form method="http://www.domain.com/submit">
<input type="hidden" name="username" value="' . $gatewayusername . '" />
<input type="hidden" name="testmode" value="' . $gatewaytestmode . '" />
<input type="hidden" name="description" value="' . $description . '" />
<input type="hidden" name="invoiceid" value="' . $invoiceid . '" />
<input type="hidden" name="amount" value="' . $amount . '" />
<input type="submit" value="Pay Now" />
</form>';
	
	return $code;
}
function paynow_refund($params) {
	
	// Gateway Specific Variables
	$gatewayusername = $params ['username'];
	$gatewaytestmode = $params ['testmode'];
	
	// Invoice Variables
	$transid = $params ['transid']; // Transaction ID of Original Payment
	$amount = $params ['amount']; // Format: ##.##
	$currency = $params ['currency']; // Currency Code
	                                 
	// Client Variables
	$firstname = $params ['clientdetails'] ['firstname'];
	$lastname = $params ['clientdetails'] ['lastname'];
	$email = $params ['clientdetails'] ['email'];
	$address1 = $params ['clientdetails'] ['address1'];
	$address2 = $params ['clientdetails'] ['address2'];
	$city = $params ['clientdetails'] ['city'];
	$state = $params ['clientdetails'] ['state'];
	$postcode = $params ['clientdetails'] ['postcode'];
	$country = $params ['clientdetails'] ['country'];
	$phone = $params ['clientdetails'] ['phonenumber'];
	
	// Card Details
	$cardtype = $params ['cardtype'];
	$cardnumber = $params ['cardnum'];
	$cardexpiry = $params ['cardexp']; // Format: MMYY
	$cardstart = $params ['cardstart']; // Format: MMYY
	$cardissuenum = $params ['cardissuenum'];
	
	// Perform Refund Here & Generate $results Array, eg:
	$results = array ();
	$results ["status"] = "success";
	$results ["transid"] = "12345";
	
	// Return Results
	if ($results ["status"] == "success") {
		return array (
				"status" => "success",
				"transid" => $results ["transid"],
				"rawdata" => $results 
		);
	} elseif ($gatewayresult == "declined") {
		return array (
				"status" => "declined",
				"rawdata" => $results 
		);
	} else {
		return array (
				"status" => "error",
				"rawdata" => $results 
		);
	}
}

?>