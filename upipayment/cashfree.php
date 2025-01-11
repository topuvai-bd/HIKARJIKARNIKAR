<?php
//X9FBkoZ2
include("../db.php");

$amount=$_POST['txtvalue'];
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$productinfo=$_POST['productinfo'];
$txnid=$_POST['txnid'];
$datejoinds=date("d/M/Y");
 $result = mysqli_query($conn,"SELECT * FROM `addwallate_playe` WHERE  order_number='$productinfo'");
$count=mysqli_num_rows($result);
if($count==1)
{
}
else{
$insertdatas="INSERT INTO `addwallate_playe`(`username_player`, `number_player`, `usercode_player`, `amount_player`, `order_number`, `date_player`, `status`,`product_info`) VALUES ('$firstname','$phone','$email','$amount','$productinfo','$datejoinds','Pending','C')";
$hfjg=mysqli_query($conn,$insertdatas);

}
$MERCHANT_KEY = "YYnYcd";
$SALT = "yI2qFGmZLUxcYgPJKu2AnmEFUydQnelT";
// Merchant Key and Salt as provided by Payu.
//Jk7Lpw6Lau
$PAYU_BASE_URL = "https://secure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = "";

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if( empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
 <style>
* {
    margin: 0;
    padding: 0
}

body {
    overflow-x: hidden;
    background: #000000
}

#bg-div {
    margin: 0;
    margin-top: 100px;
    margin-bottom: 100px
}

#border-btm {
    padding-bottom: 20px;
    margin-bottom: 0px;
    box-shadow: 0px 35px 2px -35px lightgray
}

#test {
    margin-top: 0px;
    margin-bottom: 40px;
    border: 1px solid #FFE082;
    border-radius: 0.25rem;
    width: 60px;
    height: 30px;
    background-color: #FFECB3
}

.active1 {
    color: #00C853 !important;
    font-weight: bold
}

.bar4 {
    width: 35px;
    height: 5px;
    background-color: #ffffff;
    margin: 6px 0
}

.list-group .tabs {
    color: #000000
}

#menu-toggle {
    height: 50px
}

#new-label {
    padding: 2px;
    font-size: 10px;
    font-weight: bold;
    background-color: red;
    color: #ffffff;
    border-radius: 5px;
    margin-left: 5px
}

#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out
}

#sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem
}

#sidebar-wrapper .list-group {
    width: 15rem
}

#page-content-wrapper {
    min-width: 100vw;
    padding-left: 20px;
    padding-right: 20px
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0
}

.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #fff !important;
    border-color: #fff !important
}

@media (min-width: 768px) {
    #sidebar-wrapper {
        margin-left: 0
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
        display: none
    }
}

.card0 {
    margin-top: 10px;
    margin-bottom: 10px
}

.top-highlight {
    color: #00C853;
    font-weight: bold;
    font-size: 20px
}

.form-card input,
.form-card textarea {
    padding: 10px 15px 5px 15px;
    border: none;
    border: 1px solid lightgrey;
    border-radius: 6px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: arial;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

.form-card input:focus,
.form-card textarea:focus {
    -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
    -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
    box-shadow: 0px 0px 0px 1.5px skyblue !important;
    font-weight: bold;
    border: 1px solid skyblue;
    outline-width: 0
}

input.btn-success {
    height: 50px;
    color: #ffffff;
    opacity: 0.9
}

#below-btn a {
    font-weight: bold;
    color: #000000
}

.input-group {
    position: relative;
    width: 100%;
    overflow: hidden
}

.input-group input {
    position: relative;
    height: 90px;
    margin-left: 1px;
    margin-right: 1px;
    border-radius: 6px;
    padding-top: 30px;
    padding-left: 25px
}

.input-group label {
    position: absolute;
    height: 24px;
    background: none;
    border-radius: 6px;
    line-height: 48px;
    font-size: 15px;
    color: gray;
    width: 100%;
    font-weight: 100;
    padding-left: 25px
}

input:focus+label {
    color: #1E88E5
}

#qr {
    margin-bottom: 150px;
    margin-top: 50px
}
</style>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <title>Add Wallet Money</title>
  <div class="container">
  <div class="contant">
  <div class="card shadow-lg p-3 mb-5 bg-white rounded">
  
    <h2 class="text-center">Add Money Wallet</h2>
    <br/>
    <?php if($formError) { ?>
	
     <!-- <span style="color:red">Please fill all mandatory fields.</span>-->
      <br/>
      <br/>
    <?php } ?>
    
    
    <div class="container-fluid px-0" id="bg-div">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-12">
          
                    <div id="page-content-wrapper">
                        <div class="row pt-3" id="border-btm">
                            <div class="col-4"> <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                                    <div class="bar4"></div>
                                    <div class="bar4"></div>
                                    <div class="bar4"></div>
                                </button> </div>
                            <div class="col-8">
                                <div class="row justify-content-right">
                                    <div class="col-12">
                                        <p class="mb-0 mr-4 mt-4 text-right">superludobd.com</p>
                                    </div>
                                </div>
                                <div class="row justify-content-right">
                                    <div class="col-12">
                                        <p class="mb-0 mr-4 text-right">Pay <span class="top-highlight">RS.<?php echo (empty($posted['amount'])) ? '' : $posted['amount']; ?></span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="text-center" id="test">Pay</div>
                        </div>
                        <div class="tab-content">
                          
                            <div id="menu2" class="tab-pane in active">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-card">
										  <h4 class="mt-0 mb-4 text-center">Please Confirm Your Wallet Details</h4>
                                            
                                            <form action="<?php echo $action; ?>" method="post" name="payuForm">
     <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group"> <input type="text" readonly name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" placeholder="Enter Your Full Name" minlength="1" maxlength="50"> <label>Full Name</label> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group"> <input type="text" readonly name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount']; ?>"placeholder="Enter Amount" minlength="1" maxlength="20"> <label>Amount</label> </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group"> <input type="text" readonly name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"  placeholder="Enter Mobile Number" class="placeicon" minlength="3" maxlength="10"> <label>Mobile Number</label> </div>
                                                    </div>
                                                </div>
												  <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group"> <input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>"  placeholder="Enter Email" minlength="5" maxlength="50">  </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group"> <input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo']; ?>"  placeholder="Enter Product Name" class="placeicon" minlength="2" maxlength="100">  </div>
                                                    </div>
                                                </div>
												
												
												
												 <div class="row">
                                                    <div class="col-4">
                                                        <div class="input-group"> <input type="text" hidden name="surl" id="surl" placeholder="Success URL"  value="https://ludokingroomcode.shop/addmoney/success.php"> <label></label> </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="input-group"> <input type="text" hidden name="furl" placeholder="Failure URL" class="placeicon" value="https://ludokingroomcode.shop/addmoney/success.php"> <label></label> </div>
                                                    </div>
													   <div class="col-4">
                                                        <div class="input-group"> <input type="text" hidden name="service_provider" placeholder="Service_Provider" class="placeicon" value="payu_paisa"> <label></label> </div>
                                                    </div>
                                                </div>
												
												
												
												
                                                <div class="row">
                                                    <?php if(!$hash) { ?>            
                                                    <div class="col-md-12"> <input type="submit" value="Pay Now" value="Pay Now" class="btn btn-success placeicon"> </div>
                                                </div>
                                                 <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
                                        <div class="row justify-content-center">
                                            <div id="qr"> <img src="https://i.imgur.com/DD4Npfw.jpg" width="200px" height="200px"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    


    
    <!--
    
    
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
       
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
         
          <td colspan="3"><input name="surl" hidden value="http://localhost/Payumoney/success.php" size="64" /></td>
        </tr>
        <tr>
          
          <td colspan="3"><input name="furl" hidden value="http://localhost/Payumoney/failure.php" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

       <!-- <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr
        <tr> 
          <?php if(!$hash) { ?>
            <td colspan="4"><input class="btn btn-success" type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>-->
  </body>
</html>
