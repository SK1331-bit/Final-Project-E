<?php include 'includes/header.php';?>
<h1>Signup</h1>
First Name:<input name='fname'><br>Last Name:<input name='lname'><br>Email: <input name='email'><br>Username:<input name='username'><br>Password:<input type='password' name='password'><br><input type='submit'></form>
<p>The signup page lets new visitors create member accounts for Wilderness Reserve. Folks fill in their personal info, pick a username and password, and share little details about their camping experience , not only the basics.</p>
<p>The stuff collected during registration helps shape more tailored camper profiles. Members can also note their preferred outdoor activities and their experience level, so they get improved camping suggestions and can quietly connect with similar people.</p>
<p>Overall this page shows PHP forms and how data gets collected. The user information is handled with PHP and it can later be put in storage for later use, as the website keeps growing and expanding bit by bit.</p>
<form method='post'>

<?php include 'includes/footer.php';?>