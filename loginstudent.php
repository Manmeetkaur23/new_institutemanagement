<?php
session_start();
include('config.php');
?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Prepare and execute the query
    $config = new dbConfig();
    $config->dbConfig();
   
    $stmt = mysqli_prepare( $config->conn, "SELECT * FROM sms_user WHERE email=?");
    mysqli_stmt_bind_param($stmt, "i", $username);
    mysqli_stmt_execute($stmt);
   
    $result = mysqli_stmt_get_result($stmt);
 
      

    // Check if username and password match
    if (mysqli_num_rows($result) == 1) {

      $row = mysqli_fetch_array($result);
    


      
        if (md5($password) == $row['password']) {
            // Password matches, set session variables and redirect to welcome page
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['details'] = $row;
            // echo("LOGIN SUCCESSFULLY");
            header("location: index1.php?login=true");
        } else {
            // Password doesn't match, show error message
            // echo "Incorrect username or password.";
            header("location: loginstudent.php?login=false");
        }
    } else {
        // Username doesn't exist, show error message
        echo "Incorrect username or password.";
    }
    // Close the connection
   
   
}

?>


<!-- <html>
    <head>
        <title>LOGIN STUDENT</title> -->
        <!--HEADING LOGIN-->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Bona+Nova&display=swap" rel="stylesheet"> -->
        <!--ICONS-->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"  href="assets/css/style.css">
        
    </head>
    <body style="background: url(assets/images/login.jpg)  center no-repeat">
    <div class="container">
        <div class="mainlogin">
        <div class="loginheading">
            <p>LOG IN</p>    
            </div>
            <form action="loginstudent.php" method="post">
            <div class="uname">
            <input type="text" placeholder="Enter User Name"><i class="fa-solid fa-user"></i>
            </div>
            <div class="pass">
                <input type="password" placeholder="Enter Your Password"><i class="fa-solid fa-lock"></i>
                </div>
                <div class="btn">
                   <input type="submit" value="Sign in ">
                    </div>
                    <div class="forgot-pass">
                        <a href="#popup1">FORGOT PASSWORD?</a>
                    </div>

            </div>
            </form>   
              -->
                 

                <!-- <div id="popup1" class="overlay_popup">
                    <div class="popup_box">
                        <h2>Reset Your Password</h2>
                        <div class="popup_content">
                            <p>Enter Your Email Address And We Will Send You An Updated Password </p>
                            <label>Enter Your Email</label>
                            <input type="email" placeholder="enter your email">
                            <button>RESET PASSWORD</button>
                          
                            <a class="popup_close" href="#">&times;</a>
                        </div>
                     

                    </div>  
                </div>
  
    </div>
  
    </body> -->

    <!-- <script>
        public function adminLogin(){		
		$errorMessage = '';
		if(!empty($_POST["login"]) && $_POST["email"]!=''&& $_POST["password"]!='') {	
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sqlQuery = "SELECT * FROM sms_user"; 
				WHERE email='".$email."' AND password='".md5($password)."' AND status = 'active' AND type = 'administrator';
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery) or die("error".mysql_error());
			$isValidLogin = mysqli_num_rows($resultSet);	
			if($isValidLogin){
				$userDetails = mysqli_fetch_assoc($resultSet);
				$_SESSION["adminUserid"] = $userDetails['id'];
				$_SESSION["admin"] = $userDetails['first_name']." ".$userDetails['last_name'];
				header("location: dashboard.php"); 		
			} else {		
				$errorMessage = "Invalid login!";		 
			}
		} else if(!empty($_POST["login"])){
			$errorMessage = "Enter Both user and password!";	
		}
		return $errorMessage; 		
	}	

    </script> -->
<!-- </html> -->


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>

body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
</style>
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">login Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>

   <?php

      if(isset($_GET["login"]) && ($_GET["login"]=='false')){
      
      
      ?>
     <div>
      <p>You can't login with the username or password ur provided</p>
     </div>
     <?php
      }
     ?>
   <p>Please enter your email and password....</p>
   </div>
    <form id="Login" action="loginstudent.php" method="POST">
      <br>
      
        <div class="form-group">


            <input  name="username" type="email" class="form-control" id="inputEmail" placeholder="Email Address">

        </div>

        <div class="form-group">

            <input  name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
   </div></div>


</body>
</html>
