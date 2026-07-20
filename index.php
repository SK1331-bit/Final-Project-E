<?php include 'includes/functions.php'; include 'includes/header.php';
$camps=['Yosemite','Yellowstone','Acadia'];?>
<?php
session_start();

/*=====================================
    FUNCTIONS
======================================*/
function greeting()
{
    return "Welcome to Wilderness Reserve!";
}

function getCampingTip()
{
    $tips = array(
        "Always pack extra water for every trip.",
        "Leave your campsite cleaner than you found it.",
        "Check the weather forecast before camping.",
        "Store food properly to keep wildlife away.",
        "Bring a flashlight and extra batteries."
    );

    return $tips[array_rand($tips)];
}

/*=====================================
    ARRAYS
======================================*/
$campgrounds = array(
    "Yellowstone National Park",
    "Great Smoky Mountains",
    "Yosemite National Park",
    "Grand Canyon National Park",
    "Acadia National Park"
);

$events = array(
    "July 15 - Summer Hiking Adventure",
    "August 3 - Family Camping Weekend",
    "September 12 - Fishing Tournament",
    "October 7 - Fall Campfire Festival"
);

/*=====================================
    COOKIES
======================================*/
if (isset($_POST["visitor"])) {

    $visitor = htmlspecialchars(trim($_POST["visitor"]));

    setcookie("visitor", $visitor, time() + (86400 * 30), "/");

    $_COOKIE["visitor"] = $visitor;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Wilderness Reserve | Home</title>

<link rel="stylesheet" href="style.css">

<style>

body{
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f4f4;
    margin:0;
}

main{
    width:80%;
    margin:auto;
    background:white;
    padding:25px;
}

section{
    margin-bottom:40px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table, th, td{
    border:1px solid #999;
}

th,td{
    padding:10px;
}

input,select{
    padding:8px;
}

</style>

</head>

<body>

<main>

<h1><?php echo greeting(); ?></h1>

<?php
if(isset($_COOKIE["visitor"])){
    echo "<h2>Welcome back, ".ucwords($_COOKIE["visitor"])."!</h2>";
}
?>

<hr>

<section>

<h2>Tell Us Your Name</h2>

<form method="post">

<label>Your Name</label><br>

<input
type="text"
name="visitor"
placeholder="Enter your name"
required>

<input
type="submit"
value="Save">

</form>

</section>

<hr>

<section>

<h2>About Wilderness Reserve</h2>

<p>
Welcome to Wilderness Reserve! We are a community made for campers , hikers, RV travelers, and outdoor enthusiasts. This is a place that helps members meet others who have a knack for camping, discover amazing campgrounds, and pick up outdoor skills along the way. Whether you are a brand new camper or you’ve done it for years, the website feels like a warm spot, to share that love for nature , without all the fuss.
</p>

<p>
On the home page, visitors can get a quick intro to the website and, the main reasons to become a member. People can look through featured campgrounds, check what’s coming up in upcoming events, and read about camping groups, before they even create an account. So yeah, that page basically gives you the big picture of everything you can do here.
</p>

<p>
This project was built to show off PHP programming skills , but also to create something useful for outdoor lovers. Across the whole website, users will run into features made with PHP—like functions, arrays, loops, strings, forms, and cookies. The home page nudges everyone to explore more of the site, and to become active members, not just observers.
</p>

</section>

<hr>

<section>

<h2>Featured Campgrounds</h2>

<ul>

<?php

foreach($campgrounds as $camp){

    echo "<li>".strtoupper($camp)."</li>";

}

?>

</ul>

</section>

<hr>

<section>

<h2>Choose Your Next Adventure</h2>

<form method="post">

<label>Select a Campground</label><br>

<select name="favoriteCamp">

<?php

foreach($campgrounds as $camp){

    echo "<option>$camp</option>";

}

?>

</select>

<input type="submit" value="Explore">

</form>

<br>

<?php

if(isset($_POST["favoriteCamp"])){

    echo "<h3>You selected <strong>" .
          $_POST["favoriteCamp"] .
          "</strong> as your next camping destination!</h3>";

}

?>

</section>

<hr>

<section>

<h2>Camping Tip of the Day</h2>

<p>

<?php

echo getCampingTip();

?>

</p>

</section>

<hr>

<section>

<h2>Upcoming Camping Events</h2>

<table>

<tr>

<th>Event Schedule</th>

</tr>

<?php

foreach($events as $event){

    echo "<tr>";

    echo "<td>$event</td>";

    echo "</tr>";

}

?>

</table>

</section>

<hr>

<section>

<h2>Community Statistics</h2>

<?php

$totalMembers = rand(1000,2500);

$totalReviews = rand(500,2000);

$totalTrips = rand(200,800);

echo "<p><strong>Registered Members:</strong> $totalMembers</p>";

echo "<p><strong>Campground Reviews:</strong> $totalReviews</p>";

echo "<p><strong>Trips Planned:</strong> $totalTrips</p>";

?>

</section>

</main>

</body>

</html>
<?php include 'includes/footer.php';?>