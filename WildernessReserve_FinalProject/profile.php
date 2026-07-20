<?php include 'includes/header.php';$u=$_COOKIE['username']??'Guest';?>
<h1>Profile</h1><p><?php echo "Welcome ".$u; ?></p>
<form method="post" enctype="multipart/form-data">
    <label for="profilePhoto">Profile Photo:</label><br>
<input type="file" name="profilePhoto" id="profilePhoto" accept="image/*"><br><br>
<?php
session_start();

$uploadMessage = "";
$imagePath = "";

// Create uploads folder if it doesn't exist
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["profilePhoto"]) &&
        $_FILES["profilePhoto"]["error"] == 0) {

        $allowedTypes = array("jpg","jpeg","png","gif");

        $fileName = basename($_FILES["profilePhoto"]["name"]);

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($extension, $allowedTypes)) {

            $newName = time() . "_" . $fileName;

            $targetFile = "uploads/" . $newName;

            if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $targetFile)) {

                $_SESSION["profilePhoto"] = $targetFile;

                $uploadMessage = "Profile photo uploaded successfully!";
            }
            else {
                $uploadMessage = "Unable to upload your photo.";
            }

        }
        else {

            $uploadMessage = "Only JPG, JPEG, PNG, and GIF files are allowed.";

        }

    }

}

if (isset($_SESSION["profilePhoto"])) {
    $imagePath = $_SESSION["profilePhoto"];
}
?>
<?php

if ($uploadMessage != "") {

    echo "<p><strong>$uploadMessage</strong></p>";

}

if ($imagePath != "") {

    echo "<h2>Your Profile Photo</h2>";

    echo "<img src='$imagePath'
              alt='Profile Photo'
              width='200'
              style='border-radius:10px;
                     border:3px solid #4CAF50;'>";

}

?>
<p>The camper profile page shows info on each member, acting as a personal snapshot. Users can make things more personal by adding favorite activities, camping experience , and also preferred destinations.</p>
<p>These profiles help members meet up with other campers who have similar interests. When outdoor hobbies get shared, it builds real friendships, and then it’s easier to arrange future camping adventures too, like without all the awkward back and forth.</p>
<p>Overall this page is an example of how PHP can show tailored information by using strings and variables, and at the same time creating a more customized user experience.</p>
<?php include 'includes/footer.php';?>