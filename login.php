<?php include 'includes/header.php';
if($_SERVER['REQUEST_METHOD']=='POST'){$u=$_POST['username'];setcookie('username',$u,time()+3600);echo "<p>Welcome $u</p>";}
?>
<h1>Login</h1>
<form method='post'>Username:<input name='username'><br>Password:<input type='password' name='password'><br><input type='submit'></form>
<p>The login page lets registered members securely slip into their Wilderness Reserve accounts. Members just type in their username, and password, and can start using their personalized features across the website.</p>
<p>When you log in, you get to camper profiles, camping groups, trip planning tools, plus campground reviews. If you are a returning user, you can jump right back into planning trips, and also talk with other campers without much delay.</p>
<p>This page is also kind of a demo of PHP form processing and cookies. Cookies can store a user's username so future visits feel easier, while PHP processes the login information that the user enters</p>

<?php include 'includes/footer.php';?>