<?php
session_start();
?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST["editclass"])) {

    $pdo_statement = $pdo->prepare("UPDATE classes SET class_name='" . $_POST[ 'class_name' ] . "', 
    class_description='" . $_POST[ 'class_description' ]. "', 
    prerequisite_skills='" . $_POST[ 'prerequisite_skills' ]. "', 
    artist_name='" . $_POST[ 'artist_name' ]. "', 
    date='" . $_POST[ 'date' ]. "', 
    time='" . $_POST[ 'time' ]. "', 
    location='" . $_POST[ 'location' ]. "' 
    WHERE class_id=" . $_GET["class_id"]);

	$results = $pdo_statement->execute();

    if($results) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Class Updated Successfully.");
		
	}else{
		function_alert("Database unavailable. Try again later.");
	}
    
}
$pdo_statement = $pdo->prepare("SELECT * FROM classes where class_id=" . $_GET["class_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Edit Class</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>

        <div><a href="class.php" class="addbutton">Back to Classes</a></div>

        <div>
        <h2 class="heading">Edit This Class</h2>
        <form name="classForm" action="" method="POST" class="addclass">

            <div>
                <label>Class Name:</label><br>
                <input type="text" name="class_name" class="nameinput" value="<?php echo $result[0]['class_name']; ?>" required="required">
            </div>

            <div>
                <br><label>Class Description:</label><br>
                <textarea name="class_description" rows="2" cols="40" required="required"><?php echo $result[0]['class_description']; ?></textarea>
            </div>

            <div>
                <br><label>Prerequisite Skills:</label><br>
                <textarea name="prerequisite_skills" rows="2" cols="40" required="required"><?php echo $result[0]['prerequisite_skills']; ?></textarea>
            </div>

            <div>
            <br><label>Artist Name:</label><br>
            
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
                $sql = "SELECT CONCAT( first_name, '', last_name) as FullName from registered_artists";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() > 0) { ?>
                <select name="artist_name" class="artistname">
                    <?php foreach ($results as $row) { ?>
                    <option value="<?php echo $row['FullName']; ?>"><?php echo $row['FullName']; ?></option>
                    <?php } ?>
                </select>
                <?php } ?>
            </div>

            <div>
                <br><label>Date:</label><br>
                <input type="date" name="date" class="datetime" value="<?php echo $result[0]['date']; ?>" required="required">
            </div>

            <div>
                <br><label>Time:</label><br>
                <input type="time" name="time" class="datetime" value="<?php echo $result[0]['time']; ?>" required="required">
            </div>
            
            <div>
                <br><label>Location:</label><br>
                <select name="location" class="location" required="required">
                <option value="" disabled selected>Choose Location</option>
                <option value="PhotographyArt, London, NW3 5TH, Studio Hall" name="PhotographyArt, London, NW3 5TH, Studio Hall">PhotographyArt, London, NW3 5TH, Studio Hall</option>
                <option value="PhotographyArt, London, NW3 5TH, Photo Room" name="PhotographyArt, London, NW3 5TH, Photo Room">PhotographyArt, London, NW3 5TH, Photo Room</option>
                <option value="PhotographyArt, London, NW3 5TH, Art Room" name="PhotographyArt, London, NW3 5TH, Art Room">PhotographyArt, London, NW3 5TH, Art Room</option>
                <option value="PhotographyArt, London, NW3 5TH, PhotoArt Room" name="PhotographyArt, London, NW3 5TH, PhotoArt Room">PhotographyArt, London, NW3 5TH, PhotoArt Room</option>
            </select>
            </div>

            <div>
                <br><input name="editclass" type="submit" value="Update Class" class="submitclass">
            </div>

        </form>
        
        </div> 

    </header>

</body>
</html>
