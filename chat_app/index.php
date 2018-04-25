<?php include 'db.php' ?>

<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$msg = $_POST['message'];
		$query = "INSERT INTO chat (name,message) VALUES ('$name','$msg')";
		$run = $con->query($query);
		header("location: index.php");
	}  
?>

<!DOCTYPE html>

<html>

    <head>
        <title>My Chat App</title>
        <link rel="stylesheet" href="style.css" media="all" />
    </head>
    
    <body>
        <div id="container">
            <div id="chat_box">
<?php
	$query = "SELECT * FROM chat ORDER BY id";
	$run = $con->query($query);

	while($row = $run->fetch_array()) :
?>
                <div id="chat_data">
	<span style="color:green;"><?php echo $row['name']; ?> : </span> 
	<span style="color:brown;"><?php echo $row['message']; ?></span>
	<span style="float:right;"><?php echo $row['date']; ?></span>
</div>
<?php endwhile; ?>
            </div>
            
            <form method="post" action="index.php">
                <input type="text" name="name" placeholder="Enter Name: " />
                <textarea name="message" placeholder="Enter Message"></textarea>
                <input type="submit" name="submit" value="Send!" />
            </form>
        </div>
    </body>
</html>
