<?php 
	require 'includes/pdoConnection.php';
	require 'includes/header_footer/header.php';

?>
	
<div class="container" id="content">
	<div class="row">
		<?php 
			$query = $conn->prepare("SELECT * FROM travel ORDER BY travelID DESC");
			$query->execute();
			
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$loc = $row['location'];
				$dec = substr($row['description'], 0, 28) . " . . .";
				
				echo "<div class='col-12 col-md-4 col-lg-3'>";
				echo 	"<div class='thumbnail'>";
				echo 		"<figure class='figure'>";
				echo 			"<img src='". $loc . "' class='img-responsive figure-img' alt='Responsive Image'>";
				echo 			"<figcaption class='figure-caption text-right'><span><i class='fas fa-heart'></i></span>" . $dec . "</figcaption>";
				echo 		"</figure>";
				echo 	"</div>";
				echo "</div>";
			}	
		 ?>
	</div>
</div>

<?php require 'includes/header_footer/footer.php' ?>