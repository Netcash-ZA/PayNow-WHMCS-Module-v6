PayNow-WHMCS 
============

Introduction
------------

Sage Pay South Africa's Pay Now third party gateway integration for WHMCS.

Installation Instructions
-------------------------

Download the files from here:
* https://github.com/SagePay/PayNow-WHMCS/archive/master.zip

Copy the following two files:

* https://github.com/SagePay/PayNow-WHMCS/blob/master/modules/gateways/sagepaynow.php
* https://github.com/SagePay/PayNow-WHMCS/blob/master/modules/gateways/callback/sagepaynow.php


to

* /WHMCS_Installation/modules/gateways/sagepaynow.php
* /WHMCS_Installation/modules/gateways/callback/sagepaynow.php

Configuration
-------------

Prerequisites:

Pay Now Service Key, WHMCS login credentials, Pay Now login credentials

WHMCS Steps:

1. Go into WHMCS as admin
2. Click Setup / Payments / Payment Gateways
3. Active the Module 'Pay Now'
4. Type an appropriate display name such as 'MasterCard/Visa'
5. Enter your Pay Now Service Key
6. Click 'Send email' to have the Pay Now gateway send e-mail
7. Click 'Save Changes'

Pay Now Gateway Server Configuration Steps

1. Log into your Pay Now Gateway Server configuration page
2. Choose the following for both your success and failures URLs:
   http://whmcs_installation/modules/gateways/callback/paynow.php

Change Log 1.1
--------------
* 5 Mar 2014: Added information on Pay Now server side configuration
* 5 Mar 2014: First version

Tip
---
* You can assign default WHMCS payment methods per Product Group.
* Remember to take your WHMCS Gateway Server Configuration out of test mode

References
----------
WHMCS has a detailed and easy to use payment gateway integration guide:
* http://docs.whmcs.com/Payment_Gateways

Issues
------
Please log all issues on GitHub.
