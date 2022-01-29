<?php
//checking connection and connecting to a database
require_once('connection/config.php');
error_reporting(1);
//Connect to mysqli server
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,'rms');
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error());
    }

    //Select database
    // $db = mysqli_select_db(DB_DATABASE);
    // if(!$db) {
    //     die("Unable to select database");
    // }

//retrieve questions from the questions table
$questions=mysqli_query($link,"SELECT * FROM questions")
or die("Something is wrong ... \n" . mysqli_error());
?>
<?php
//setting-up a remember me cookie
    if (isset($_POST['Submit'])){
        //setting up a remember me cookie
        if($_POST['remember']) {
            $year = time() + 31536000;
            setcookie('remember_me', $_POST['login'], $year);
        }
        else if(!$_POST['remember']) {
            if(isset($_COOKIE['remember_me'])) {
                $past = time() - 100;
                setcookie(remember_me, gone, $past);
            }
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo APP_NAME; ?> Restaurant:Home</title>
<link href="stylesheets/user_styles.css"  rel="stylesheet" type="text/css">

<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<div id="page">
  <div id="menu"><ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="foodzone.php">Food Zone</a></li>
  <li><a href="specialdeals.php">Special Deals</a></li>
  <li><a href="member-index.php">My Account</a></li>
  <li><a href="contactus.php">Contact Us</a></li>
  </ul>
</div>
<div id="header" class="stretchX">
    <div id="logo"> <a href="index.php" class="blockLink"></a></div>
    <div id="company_name"><!--<?php echo APP_NAME; ?>-->Dwarka Restaurant</div>
</div>
<div id="center">
  <h1><center>Online Food Ordering System!</center></h1>
      <!--<div class="body_text">
  Order your food today from the Food Zone and it will be delivered at your door step. Jump in to our weekly special deals in the Special Deals menu. Register an account with us to enjoy fast ordering, delivery, and convenient payment of your food. Start now by logging in below or registering if you don't have an account with us:
  </div>-->
 <table align="center" width="100%"> 
        <td style="text-align:center;">
            <div style="border:red solid 1px;padding:4px 6px 2px 6px;">
            <form id="loginForm" name="loginForm" method="post" action="register-exec.php" onsubmit="return registerValidate(this)">
              <table width="450" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                    <td colspan="2" style="text-align:center;"><font color="#FF0000"> </font><h1>Register Form</h1></td>
                </tr>
                <tr>
                  <th>First Name </th>
                  <td><font color="#FF0000">* </font><input name="fname" type="text" class="textfield" id="fname" /></td>
                </tr>
                <tr>
                  <th>Last Name </th>
                  <td><font color="#FF0000">* </font><input name="lname" type="text" class="textfield" id="lname" /></td>
                </tr>
                <tr>
                  <th width="124">Email</th>
                  <td width="168"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
                </tr>
                <tr>
                  <th>Password</th>
                  <td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
                </tr>
                <tr>
                  <th>Confirm Password </th>
                  <td><font color="#FF0000">* </font><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
                </tr>
                <tr>
                  <th>Security Question </th>
                    <td><font color="#FF0000">* </font><select name="question" id="question">
                    <option value="select">- select question -
                    <?php
                    //loop through quantities table rows
                    while ($row=mysqli_fetch_array($questions)){
                    echo "<option value=$row[question_id]>$row[question_text]";
                    }
                    ?>
                    </select></td>
                </tr>
                <tr>
                  <th>Security Answer</th>
                  <td><font color="#FF0000">* </font><input name="answer" type="text" class="textfield" id="answer" /></td>
                </tr>
                <tr>
                <td colspan="2"><input type="reset" value="Clear Fields"/>
                <input type="submit" name="Submit" value="Register" />
				<a href="index.php">Login Form</a></td>
				</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
              </table>
            </form>
            </div>
        </td>
		
		   </tr>
</table>
<hr>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>