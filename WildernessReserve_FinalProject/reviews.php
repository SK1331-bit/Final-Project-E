<?php include 'includes/header.php';?>
<h1>Reviews</h1>
<p>The reviews page lets campers share how their trips went after they visited different campgrounds. Members can even leave ratings along with short comments to help others pick better camping destinations.</p>
<p>When people read the reviews it gives them useful insight about campground facilities, the scenery, and the general vibe or overall experiences before they even start planning their trip.</p>
<?php
// Start session
session_start();

// Store reviewer name in a cookie
if (isset($_POST['name'])) {
    setcookie("reviewer", $_POST['name'], time() + (86400 * 30), "/");
}

// Function to clean user input
function cleanInput($data)
{
    return htmlspecialchars(trim($data));
}

// Existing sample reviews
$reviews = array(
    array(
        "name" => "Sarah",
        "campground" => "Yellowstone",
        "rating" => 5,
        "review" => "Beautiful scenery and great hiking trails!"
    ),
    array(
        "name" => "Mike",
        "campground" => "Smoky Mountains",
        "rating" => 4,
        "review" => "Very peaceful and family friendly."
    )
);

// Add new review
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = cleanInput($_POST["name"]);
    $campground = cleanInput($_POST["campground"]);
    $rating = cleanInput($_POST["rating"]);
    $review = cleanInput($_POST["review"]);

    $reviews[] = array(
        "name" => $name,
        "campground" => $campground,
        "rating" => $rating,
        "review" => $review
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Campground Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Campground Reviews</h1>

<?php
if(isset($_COOKIE['reviewer'])){
    echo "<h3>Welcome back, ".$_COOKIE['reviewer']."!</h3>";
}
?>

<h2>Leave a Review</h2>

<form method="post" action="">

    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Campground</label><br>
    <input type="text" name="campground" required><br><br>

    <label>Rating</label><br>

    <select name="rating">
        <option value="5">5 Stars</option>
        <option value="4">4 Stars</option>
        <option value="3">3 Stars</option>
        <option value="2">2 Stars</option>
        <option value="1">1 Star</option>
    </select>

    <br><br>

    <label>Review</label><br>

    <textarea name="review" rows="6" cols="50" required></textarea>

    <br><br>

    <input type="submit" value="Submit Review">

</form>

<hr>

<h2>Campground Reviews</h2>

<?php

foreach($reviews as $review){

    echo "<div class='review'>";

    echo "<h3>".ucwords($review['campground'])."</h3>";

    echo "<strong>Reviewer:</strong> ".$review['name']."<br>";

    echo "<strong>Rating:</strong> ".$review['rating']." / 5<br>";

    echo "<p>".$review['review']."</p>";

    echo "<hr>";

    echo "</div>";

}

?>

</body>
</html>
<p>This page shows off PHP string handling, plus loops, by printing several campground reviews in a neat, organized layout.</p>
<?php include 'includes/footer.php';?>