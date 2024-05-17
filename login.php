<?php 

require_once "Classes/ItemManager.php";
$ItemManager = new ItemManager();
$name = '';
$email = '';
$pswd='';
$loginemail='';
$loginpswd='';
$loginstatus='';
$signstatus='';
// $status='';
if (isset($_REQUEST['name'])) {
  $name = $_REQUEST['name'];
} 
if (isset($_REQUEST['email'])) {
  $email = $_REQUEST['email'];
} 
if (isset($_REQUEST['pswd'])) {
    $pswd = $_REQUEST['pswd'];
} 
if (isset($_REQUEST['loginemail'])) {
    $loginemail = $_REQUEST['loginemail'];
  } 
  if (isset($_REQUEST['loginpswd'])) {
      $loginpswd = $_REQUEST['loginpswd'];
  } 


if (isset($_POST["submit1"])) {
        $signstatus = $ItemManager->signup($name,$email,$pswd);  
   
}
if (isset($_POST["submit2"])) {
  
    $loginstatus = $ItemManager->login($loginemail,$loginpswd);  
}



?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!DOCTYPE html>
<html>
<head>

    <style>

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/image72.jpeg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}



body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
    background: url("images/image74.jpeg") no-repeat center/ cover;
    border-radius: 50px;
	/*--background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);*/
}
.main{
	width: 350px;
	height: 500px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	width: 60%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #573b8a;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
button:hover{
	background: #6d44b8;
}
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #573b8a;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-500px);
}
#chk:checked ~ .login label{
	transform: scale(1);	
}
#chk:checked ~ .signup label{
	transform: scale(.6);
}

    </style>

	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<script>
 $(document).ready(function () {
        var signstatus = $('#signstatus').val();
        var loginstatus = $('#loginstatus').val();
        if (signstatus == 'Success') {
            alert('Signed up successfully!'); 
            return false;
            // window.location.href = ("index.php");
        }
        if (loginstatus == 'Success') {
            alert('Loged in successfully!'); 
            return false;
        }
        if (loginstatus == 'error') {
            alert('Invalid email or password');
            $('#status').val("");
        }
        // $('#status').val('');
    });

</script>
</head>
<body>
    
    
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
        <input type="hidden" name="signstatus" id="signstatus" value="<?php echo $signstatus; ?>">
        <input type="hidden" name="loginstatus" id="loginstatus" value="<?php echo $loginstatus; ?>">
			<div class="signup">
				
                <form action="login.php" method="post" name="signup">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button type="submit" name="submit1">Sign up</button>
                    <!-- <input type="submit" value="Sign up" name="submit" class="btn" > -->
				</form>
			</div>

			<div class="login">
               <form action="login.php" method="post" name="login">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="loginemail" placeholder="Email" required="">
					<input type="password" name="loginpswd" placeholder="Password" required="">
					<button type="submit" name="submit2">Login</button>
                    <!-- <input type="submit" value="Login" name="submit" class="button" > -->
				</form>
			</div>
	</div>
</body>
</html>