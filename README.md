THIS PLUGIN IS NO LONGER SUPPORTED BY NETCASH
==
Netcash Pay Now WHMCS Credit Card Gateway Module
=============================================

Revision 2.0.0

Introduction
------------

A third party credit card gateway integration that works with Netcash South Africa's Pay Now product.

Installation Instructions
-------------------------

Copy the following two files from the archive:

* /modules/gateways/paynow.php
* /modules/gateways/callback/paynow.php

to

* /WHMCS_Installation/modules/gateways/paynow.php
* /WHMCS_Installation/modules/gateways/callback/paynow.php

Configuration
-------------

Prerequisites:

You will need:
* Netcash account
* Pay Now service activated
* Netcash account login credentials (with the appropriate permissions setup)
* Netcash - Pay Now Service key
* Cart admin login credentials

A. Netcash Account Configuration Steps:
1. Log into your Netcash account:
	https://merchant.netcash.co.za/SiteLogin.aspx
2. Type in your Username, Password, and PIN
2. Click on ACCOUNT PROFILE on the top menu
3. Select NETCONNECTOR from tghe left side menu
4. Click on PAY NOW from the subsection
5. ACTIVATE the Pay Now service
6. Type in your EMAIL address
7. It is highly advisable to activate test mode & ignore errors while testing
8. Select the PAYMENT OPTIONS required (only the options selected will be displayed to the end user)
9. Remember to remove the "Make Test Mode Active" indicator to accept live payments

* For immediate assistance contact Netcash on 0861 338 338


1. Log into your Netcash account
2. Choose the following for your accept, decline and notify URLs:
   http://whmcs_installation/modules/gateways/callback/paynow.php
3. Choose the following for your redirect URL:
	http://whmcs_installation/clientarea.php

B. WHMCS Steps:

1. Go into WHMCS as admin
2. Click Setup / Payments / Payment Gateways
3. Activate the Module 'Pay Now'
4. Type an appropriate display name such as 'MasterCard/Visa'
5. Enter your Pay Now Service Key
6. Enter an admin username for WHMCS Admin User Name. This is to utilise the localAPI() method.
7. Click 'Send email' to have the Pay Now gateway send e-mail
8. Click 'Save Changes'

You are now ready to transact. Remember to turn off "Make test mode active:" when you are ready to go live.

Here is a screenshot of what the WHMCS settings screen for the Netcash Pay Now configuration:
![alt tag](http://196.201.6.235/whmcs/whmcs_screenshot1.png)

Demo Site
---------

There is a demo site if you want to see WHMCS and the Netcash Pay Now gateway in action:
http://196.201.6.235/whmcs

Revision History
----------------

* 25 August 2015/2.0.0: Add support for Retail/EFT payments
* 18 February 2015/1.0.2: Added WHMCS Admin User Name step to readme and correct file names
* 11 May 2014/1.0.1: Added screenshot to readme, added to documentation
* 05 Mar 2014/1.0.0: Added information on Pay Now server side configuration
* 05 Mar 2014/1.0.0: First version

Tip
---

* You can assign default WHMCS payment methods per Product Group.
* Remember to take your WHMCS Gateway Server Configuration out of test mode

References
----------

WHMCS has a detailed and easy to use payment gateway integration guide:
* http://docs.whmcs.com/Payment_Gateways

Feedback, issues, comments, suggestions
---------------------------------------

We welcome your feedback.

If you have any comments or questions please contact Netcash South Africa or log the issue on GitHub.
