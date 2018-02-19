<?php
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
  	<meta name="description" content="Description">
  	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
  	<meta name="author" content="Babashov.info">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Default Css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<script>
	
	function ajax()
	{
		var req = new XMLHttpRequest();

		req.onreadystatechange = function()
		{
			if(req.readyState == 4 && req.status == 200)
			{
				document.getElementById('chat').innerHTML = req.responseText;
			}
		}

		req.open('GET','chat.php',true);
		req.send();
	}
setInterval(function(){ajax()},1000);
</script>

<body onload="ajax()">


<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 ccc">
			
			<div id="chat">
				<?php
			$query = "Select * From chats Order By id ASC";
			$run = $con->query($query);
			while($row = $run->fetch_array()):
			?>
				<span><b><?php echo $row['name']. " ".  $row['date'] . ":" . $row['msg']; ?></b></span>
			<?php endwhile; ?>
			</div>

		
			

			<form action="" method="post" class="formMessage">
				<input type="text" name="name" placeholder="Write Your Name">
				<br/>
				<textarea name="message" id="" cols="30" rows="10" placeholder="Write Your Message"></textarea>
				<br/>
				<input type="submit" name="submit" value="Gonder">
			</form>

			<?php
				if(isset($_POST['submit']))
				{
					$name = $_POST['name'];
					$message = $_POST['message'];
					$query = "Insert Into chats (name,msg) values('$name','$message')";
					$run = $con->query($query);

					if($run)
					{
						//Musiqi Elave Eliyecem
					}else{
					echo "Your Message Failed.";
				}
				}
				

			?>

		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>