<?php include 'includes/header.php';?>
<h1>Contact</h1>
<p>The contact page gives visitors a channel to get in touch with the Wilderness Reserve team, where members can ask questions, flag problems, or request help in general. It is a direct line for communication between the members and the Wilderness Reserve team.</p>
<?php
session_start();

// Function to clean form input
function cleanInput($data)
{
    return htmlspecialchars(trim($data));
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = cleanInput($_POST['name']);
    $email = cleanInput($_POST['email']);
    $subject = cleanInput($_POST['subject']);
    $reason = cleanInput($_POST['reason']);
    $comments = cleanInput($_POST['comments']);

    // Save user's name in a cookie
    setcookie("visitorName", $name, time() + (86400 * 30), "/");

    // Store information in an array
    $contactInfo = array(
        "Name" => $name,
        "Email" => $email,
        "Subject" => $subject,
        "Reason" => $reason,
        "Comments" => $comments
    );

    $message = "Thank you, $name! Your message has been received. We will contact you soon.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Wilderness Reserve</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Contact Wilderness Reserve</h1>

<?php
if(isset($_COOKIE["visitorName"])){
    echo "<h3>Welcome back, ".$_COOKIE["visitorName"]."!</h3>";
}
?>

<!-- Keep your three required paragraphs here -->


<form method="post" action="">

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Subject:</label><br>
    <input type="text" name="subject" required><br><br>

    <label>Reason for Contact:</label><br>

    <select name="reason">
        <option>General Question</option>
        <option>Membership Help</option>
        <option>Camping Suggestion</option>
        <option>Report a Problem</option>
        <option>Other</option>
    </select>

    <br><br>

    <label>Message:</label><br>

    <textarea name="comments" rows="8" cols="50" required></textarea>

    <br><br>

    <input type="submit" value="Send Message">

</form>

<br>

<?php

if($message != ""){

    echo "<h2>$message</h2>";

    echo "<h3>Information Submitted</h3>";

    echo "<ul>";

    foreach($contactInfo as $field => $value){

        echo "<li><strong>$field:</strong> $value</li>";

    }

    echo "</ul>";
}

?>

<hr>

<h3>Wilderness Reserve Contact Information</h3>

<p>Email: support@wildernessreserve.com</p>
<p>Phone: (555) 123-4567</p>
<p>Office Hours: Monday - Friday, 8:00 AM - 5:00 PM</p>

</body>
</html>
<p>Having steady, reliable support also builds a nice feeling for users and nudges them toward staying involved in the camping community for a long time.</p>
<p>This page finishes the website by giving people confidence that help will show up whenever assistance is needed.</p>
<?php include 'includes/footer.php';?>