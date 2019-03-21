<?php 
include 'include/art-header.php'; 
session_start();

?>


<?php 

	$pageID = $_GET['id'];

	$sqlPaint = "SELECT * FROM paintings WHERE PaintingID = " . $pageID . "";
	$sqlPaintResult = $conn->query($sqlPaint);
	$imgProperties = $sqlPaintResult->fetch_assoc();


	$sqlArtist = "SELECT FirstName, LastName FROM artists WHERE ArtistID = " . $imgProperties["ArtistID"];
	$sqlArtistResult = $conn->query($sqlArtist);
	$artistProperties = $sqlArtistResult->fetch_assoc();

	$sqlGenre = "SELECT p.PaintingID, e.GenreID, g.GenreID, g.GenreName FROM paintings p JOIN paintinggenres e ON p.PaintingID = e.PaintingID JOIN genres g ON e.GenreID = g.GenreID WHERE p.paintingID = " . $imgProperties["PaintingID"];
	$sqlGenreResult = $conn->query($sqlGenre);
	$genreProperties = $sqlGenreResult->fetch_assoc();

	$sqlGallery = "SELECT p.PaintingID, g.GalleryID, g.GalleryName, g.GalleryCity, g.GalleryCountry FROM paintings p JOIN galleries g ON p.GalleryID = g.GalleryID WHERE p.PaintingID = " . $imgProperties["PaintingID"];
	$sqlGalleryResult = $conn->query($sqlGallery);
	$galleryProperties = $sqlGalleryResult->fetch_assoc();

	$sqlSubject = "SELECT p.PaintingID, e.SubjectID, g.SubjectID, g.SubjectName FROM paintings p JOIN paintingsubjects e ON p.PaintingID = e.PaintingID JOIN subjects g ON e.SubjectID = g.SubjectID WHERE p.paintingID = " . $imgProperties["PaintingID"];
	$sqlSubjectResult = $conn->query($sqlSubject);
	

?>


	<div class="row">
		
		<div class="col-md-5">
			
			<div class="page-title">
				<h3 id="main-img-title"><?php echo $imgProperties["Title"]; ?></h3>
				<p>By <a href="#"><?php echo $artistProperties["FirstName"] . " " . $artistProperties["LastName"]; ?></a> </p>
			</div>

		</div>
		<div class="col-md-7"></div>

	</div>

	<div class="row">
		
		<div class="col-md-5">
			
			<div class="img-holder"><img class="img-thumbnail" src="images/medium/<?php echo $imgProperties["ImageFileName"]; ?>.jpg" alt="<?php echo $imgProperties["Title"]; ?>" id="main-img"></div>

		</div>
		<div class="col-md-7">
			
			<p class="desc-text"><?php echo $imgProperties["Excerpt"]; ?></p>
			<p class="price"><?php echo "$" . number_format($imgProperties["MSRP"], 2); ?></p>
<?php 
$wishListString = 'PaintingID=' . urlencode($imgProperties["PaintingID"]) . '&ImageFileName=' . urlencode($imgProperties["ImageFileName"]) . '&Title=' . urlencode($imgProperties["Title"]);
?>
			<div class="purchase-btn-container">
				<button type="button" class="btn btn-outline-primary"><?php echo '<a href="addToWishList.php?'. htmlentities($wishListString) . '">Add to Wish List</a>'; ?></button>
				<button type="button" class="btn btn-outline-primary"><a href="#">Add to Shopping Cart</a></button>
			</div>

			<div class="product-details card">
				
				<div class="card-header">
					Product Details
				</div>
				
				<table class="table">
					<tbody>
						<tr>
							<th>Date:</th>
							<td><?php echo $imgProperties["YearOfWork"]; ?></td>
						</tr>
						<tr>
							<th>Medium: </th>
							<td><?php echo $imgProperties["Medium"]; ?></td>
						</tr>
						<tr>
							<th>Dimensions: </th>
							<td><?php echo $imgProperties["Width"] . " x " . $imgProperties["Height"]; ?></td>
						</tr>
						<tr>
							<th>Home: </th>
							<td><a href="#"><?php echo $galleryProperties["GalleryName"] . ", " . $galleryProperties["GalleryCity"] . ", " . $galleryProperties["GalleryCountry"] ?></a></td>
						</tr>
						<tr>
							<th>Genres: </th>
							<td><a href="#"><?php echo $genreProperties["GenreName"]; ?></a></td>
						</tr>
						<tr>
							<th>Subjects:</th>
							<td>

							<?php 

							while($subjectProperties = $sqlSubjectResult->fetch_assoc()) {
								echo "<a href='#'>" . $subjectProperties["SubjectName"] . "</a> ";

								
							}

							?>
							</td>
						</tr>
					</tbody>
				</table>


			</div>

		</div>

	</div>
	
	<div class="row">
		<h3>Similar Products</h3>
	</div>
	<div class="row">
		
		<div class="col-12 cards-area">
			
			<div class="card-deck">
			
				
				<div class="card">
					<div class="card-body similar-card">
						<img class="img-thumbnail"src="images/thumbs/116010.jpg" alt="Self-portrait in a Straw Hat">

						<h5 class="card-title">Artist Holding a Thistle</h5>
						<button><a href="#">View</a></button>
						<button><a href="#">Wish</a></button>
						<button><a href="#">Cart</a></button>
					</div>
				</div>

				
				<div class="card">
					<div class="card-body similar-card">
						<img class="img-thumbnail" src="images/thumbs/107010.jpg" alt="Self-portrait in a Straw Hat">

						<h5 class="card-title">Madame de Pompadour</h5>
						<button><a href="#">View</a></button>
						<button><a href="#">Wish</a></button>
						<button><a href="#">Cart</a></button>
					</div>
				</div>

				
				<div class="card">
					<div class="card-body similar-card">
						<img class="img-thumbnail" src="images/thumbs/107010.jpg" alt="Self-portrait in a Straw Hat">

						<h5 class="card-title">Madame de Pompadour</h5>
						<button><a href="#">View</a></button>
						<button><a href="#">Wish</a></button>
						<button><a href="#">Cart</a></button>
					</div>
				</div>

				
				<div class="card">
					<div class="card-body similar-card">
						<img class="img-thumbnail"src="images/thumbs/106020.jpg" alt="Self-portrait in a Straw Hat">

						<h5 class="card-title">Girl with a Pearl Earring</h5>
						<button><a href="#">View</a></button>
						<button><a href="#">Wish</a></button>
						<button><a href="#">Cart</a></button>
					</div>
				</div>



		</div>

		</div>

	</div>

	<div class="row">
		
		<div class="col-md-12 footer">
			
			<nav class="navbar navbar-dark bg-dark">
				<p>All images are copyright to their owners. This is just a hypothetical site &copy; 2014 Copyright Art Store</p>
			</nav>

		</div>

	</div>
		
</div>

<!-- <script type="text/javascript" src="js/assign2-1.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>