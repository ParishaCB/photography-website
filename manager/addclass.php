<?php
session_start();
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST['submitclass'])){
	$class_name = $_POST['class_name'];
	$class_description = $_POST['class_description'];
	$prerequisite_skills = $_POST['prerequisite_skills'];
	$artist_name = $_POST['artist_name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];

	$insert = $con->prepare("INSERT INTO classes(class_name,class_description,prerequisite_skills,artist_name,date,time,location)
				values(:class_name, :class_description, :prerequisite_skills, :artist_name, :date, :time, :location)
				");
	$insert->bindParam (':class_name',$class_name);
	$insert->bindParam (':class_description',$class_description);
	$insert->bindParam (':prerequisite_skills',$prerequisite_skills);
	$insert->bindParam (':artist_name',$artist_name);
	$insert->bindParam (':date',$date);
	$insert->bindParam (':time',$time);
	$insert->bindParam (':location',$location);
	$insert->execute();

	if($insert) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Class Added Successfully.");
		
	}else{
		function_alert("Database unavailable. Try again later.");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Add Class</title>
	<link rel="stylesheet" href="http://localhost/PhotographyArt/user/userstyle.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>
	<header>

        <div><a href="class.php" class="addbutton">Back to Classes</a></div>
        
        <div>
        <h2 class="heading">Add New Class</h2>
        <form name="classForm" action="addclass.php" method="POST" class="addclass">

            <div>
                <label>Class Name:</label><br>
                <input type="text" name="class_name" class="nameinput" required="required">
            </div>

            <div>
                <br><label>Class Description:</label><br>
                <textarea name="class_description" rows="2" cols="40" required="required"></textarea>
            </div>

            <div>
                <br><label>Prerequisite Skills:</label><br>
                <textarea name="prerequisite_skills" rows="2" cols="40" required="required"></textarea>
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
                <input type="date" name="date" class="datetime" required="required">
            </div>

            <div>
                <br><label>Time:</label><br>
                <input type="time" name="time" class="datetime" required="required">
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
                <br><input name="submitclass" type="submit" value="Add Class" class="submitclass">
            </div>

        </form>
        </div> 

    </header>

</body>
</html>
