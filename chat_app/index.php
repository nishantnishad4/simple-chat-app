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
		<script>
		function chat_ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function() {
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send(); 
		}
		setInterval(function(){chat_ajax()}, 1000)
	</script>
    </head>
    
    <body>
        <div id="container">
            <div id="chat_data">
				<div id="chat">
				</div>
            </div>
            
            <form method="post" action="index.php">
                <input type="text" name="name" placeholder="Enter Name: " />
                <textarea name="message" placeholder="Enter Message"></textarea>
                <input type="submit" name="submit" value="Send!" />
            </form>
        </div>
    </body>
</html>