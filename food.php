<?php 
	require 'includes/pdoConnection.php';
	require 'includes/header_footer/header.php'; 
?>
<div class="container" id="content">
	<div class="row">
		<?php 
			$query = $conn->prepare("SELECT * FROM food WHERE userID = ? ORDER BY foodID DESC");
			$query->execute(array($_SESSION['id']));
			
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$loc = $row['imgLocation'];
				$dec = (strlen($row['description']) < 28) ? $row['description'] : substr($row['description'], 0, 22) . " . . .";
				
				echo "<div class='col-12 col-sm-6 col-md-4 col-xl-3'>
						<figure class='figure img-thumbnail' style='background-color: #fff;'>
							<img class='img-fluid figure-img mx-auto d-block' alt='image' src=" . $loc  .">
							<figcaption class='figure-caption text-right'><span><i class='fas fa-heart'></i></span>" . $dec . "</figcaption>
						</figure>
					 </div>";
			}	
		 ?>
	</div>
</div>
<?php require 'includes/header_footer/footer.php' ?>