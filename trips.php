<?php include 'includes/header.php';?><h1>Trips</h1>
<?php
session_start();

/*=====================================
    FUNCTIONS
======================================*/
function cleanInput($data)
{
    return htmlspecialchars(trim($data));
}

function calculateDays($startDate, $endDate)
{
    $start = strtotime($startDate);
    $end = strtotime($endDate);

    if ($end >= $start) {
        return floor(($end - $start) / (60 * 60 * 24)) + 1;
    }

    return 0;
}

/*=====================================
    DESTINATIONS ARRAY
======================================*/
$destinations = array(
    "Yellowstone National Park",
    "Great Smoky Mountains",
    "Yosemite National Park",
    "Grand Canyon National Park",
    "Acadia National Park",
    "Glacier National Park",
    "Rocky Mountain National Park"
);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = cleanInput($_POST["name"]);
    $destination = cleanInput($_POST["destination"]);
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $people = cleanInput($_POST["people"]);
    $activities = isset($_POST["activities"]) ? $_POST["activities"] : array();

    setcookie("traveler", $name, time() + (86400 * 30), "/");

    $tripDays = calculateDays($startDate, $endDate);

    $message = "Your camping trip has been planned!";
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Trip Planner</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Camping Trip Planner</h1>

<?php
if(isset($_COOKIE["traveler"])){
    echo "<h2>Welcome back, ".$_COOKIE["traveler"]."!</h2>";
}
?>

<!-- Three Required Paragraphs -->

<p>
The trip planner  helps members put together upcoming camping plans. People can pick destinations, set travel dates, and also invite friends to hop in with them .
</p>

<p>
When you plan trips through the website it will be more straightforward when arranging outdoor activities, and handy since you can keep everything important in one spot.
</p>

<p>
This page shows a practical way how PHP can handle user input, while it’s organizing the trip details for members, without making it confusing .
</p>

<hr>

<h2>Plan Your Camping Trip</h2>

<form method="post">

<label>Your Name</label><br>
<input type="text" name="name" required>

<br><br>

<label>Select Destination</label><br>

<select name="destination">

<?php
foreach($destinations as $camp){
    echo "<option>$camp</option>";
}
?>

</select>

<br><br>

<label>Arrival Date</label><br>
<input type="date" name="startDate" required>

<br><br>

<label>Departure Date</label><br>
<input type="date" name="endDate" required>

<br><br>

<label>Number of Campers</label><br>
<input type="number" name="people" min="1" max="20" value="2">

<br><br>

<label>Activities</label><br>

<input type="checkbox" name="activities[]" value="Hiking"> Hiking<br>
<input type="checkbox" name="activities[]" value="Fishing"> Fishing<br>
<input type="checkbox" name="activities[]" value="Camping"> Camping<br>
<input type="checkbox" name="activities[]" value="Photography"> Photography<br>
<input type="checkbox" name="activities[]" value="Kayaking"> Kayaking<br>

<br>

<input type="submit" value="Plan My Trip">

</form>

<hr>

<?php

if($message != ""){

echo "<h2>$message</h2>";

echo "<p><strong>Traveler:</strong> $name</p>";

echo "<p><strong>Destination:</strong> $destination</p>";

echo "<p><strong>Arrival:</strong> $startDate</p>";

echo "<p><strong>Departure:</strong> $endDate</p>";

echo "<p><strong>Trip Length:</strong> $tripDays day(s)</p>";

echo "<p><strong>Campers:</strong> $people</p>";

echo "<h3>Selected Activities</h3>";

if(count($activities) > 0){

echo "<ul>";

foreach($activities as $activity){

echo "<li>$activity</li>";

}

echo "</ul>";

}else{

echo "<p>No activities selected.</p>";

}

}

?>

<hr>

<h2>Featured Camping Destinations</h2>

<table border="1" cellpadding="10">

<tr>

<th>Destination</th>

</tr>

<?php

for($i = 0; $i < count($destinations); $i++){

echo "<tr>";

echo "<td>".$destinations[$i]."</td>";

echo "</tr>";

}

?>

</table>

<hr>

<?php

$tripIdeas = array(
    "Weekend Family Camping",
    "Mountain Hiking Adventure",
    "Fishing Getaway",
    "RV Road Trip",
    "Backpacking Expedition"
);

echo "<h2>Suggested Trip Ideas</h2>";

echo "<ol>";

foreach($tripIdeas as $idea){

echo "<li>$idea</li>";

}

echo "</ol>";

?>

</body>

</html>


<?php include 'includes/footer.php';?>