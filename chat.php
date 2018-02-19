
<?php
require('db.php');
			$query = "Select * From chats Order By id ASC";
			$run = $con->query($query);
			while($row = $run->fetch_array()):
			?>
				<span><b><?php echo $row['name']. " ".  $row['date'] . ":" . $row['msg']; ?></b></span>
			<?php endwhile; ?>