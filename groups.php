<?php include 'includes/functions.php'; include 'includes/header.php';$g=['Hikers','Families','RV Travelers'];?>
<?php
session_start();

/*=====================================
    FUNCTIONS
======================================*/
function cleanInput($data)
{
    return htmlspecialchars(trim($data));
}

/*=====================================
    CAMPING GROUPS (ARRAY)
======================================*/
$groups = array(
    array(
        "name" => "Weekend Campers",
        "activity" => "Family Camping",
        "members" => 48
    ),
    array(
        "name" => "Mountain Hikers",
        "activity" => "Hiking",
        "members" => 67
    ),
    array(
        "name" => "Fishing Friends",
        "activity" => "Fishing",
        "members" => 34
    ),
    array(
        "name" => "Backpacking Explorers",
        "activity" => "Backpacking",
        "members" => 51
    ),
    array(
        "name" => "RV Travelers",
        "activity" => "RV Camping",
        "members" => 42
    )
);

$message = "";

/*=====================================
    JOIN GROUP
======================================*/
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name = cleanInput($_POST["name"]);
    $group = cleanInput($_POST["group"]);

    setcookie("memberName",$name,time()+86400*30,"/");

    $message = "$name has successfully joined the $group group!";
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Camping Groups</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Camping Groups</h1>

<?php

if(isset($_COOKIE["memberName"])){

    echo "<h2>Welcome back, ".$_COOKIE["memberName"]."!</h2>";

}

?>

<!-- Three Required Paragraphs -->

<p>
The camping groups page lets members browse and join groups that share their interests. Most of the groups will be focused on hiking, camping, fishing, or backpacking , depending on whatever they’re into.
</p>

<p>
Joining a group helps members meet new people and also arrange outdoor adventures together more effectively. The group pages nudge communication and teamwork among outdoor lovers.
</p>

<p>
This page shows PHP arrays and loops in action, by printing out lists of available camping groups more dynamically, like not all at once.
</p>

<hr>

<h2>Available Groups</h2>

<table border="1" cellpadding="10">

<tr>

<th>Group</th>

<th>Activity</th>

<th>Members</th>

</tr>

<?php

foreach($groups as $campGroup){

echo "<tr>";

echo "<td>".$campGroup["name"]."</td>";

echo "<td>".$campGroup["activity"]."</td>";

echo "<td>".$campGroup["members"]."</td>";

echo "</tr>";

}

?>

</table>

<hr>

<h2>Join a Group</h2>

<form method="post">

<label>Your Name</label><br>

<input
type="text"
name="name"
required>

<br><br>

<label>Select a Group</label><br>

<select name="group">

<?php

foreach($groups as $campGroup){

echo "<option>".$campGroup["name"]."</option>";

}

?>

</select>

<br><br>

<input
type="submit"
value="Join Group">

</form>

<br>

<?php

if($message!=""){

echo "<h3>$message</h3>";

}

?>

<hr>

<h2>Group Statistics</h2>

<?php

$totalMembers = 0;

foreach($groups as $campGroup){

$totalMembers += $campGroup["members"];

}

echo "<p><strong>Total Groups:</strong> ".count($groups)."</p>";

echo "<p><strong>Total Members:</strong> ".$totalMembers."</p>";

echo "<p><strong>Average Members Per Group:</strong> ".round($totalMembers/count($groups))."</p>";

?>

<hr>

<h2>Featured Activities</h2>

<ul>

<?php

for($i=0;$i<count($groups);$i++){

echo "<li>".$groups[$i]["activity"]."</li>";

}

?>

</ul>

</body>

</html>
<?php include 'includes/footer.php';?>