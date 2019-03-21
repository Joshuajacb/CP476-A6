<?php 
	include "include/art-header.php";
	session_start();
?>


<div class="main-content">
	<div class="page-title">
		<h3 id="main-img-title">Wish-List Items</h3>
	</div>	

<?php 

	if(isset($_SESSION["wish-list"])) {

		$wishListArray = $_SESSION["wish-list"];

		echo "<table class='wishListTable'>";

		echo "<tr>";
		echo "<th>Image</th>";
		echo "<th>Title</th>";
		echo "<th>Action</th>";
		echo "</tr>";

		foreach($wishListArray as $var) {

			echo "<tr>";
			echo "<td><img src='images/square-medium/" . $var["ImageFileName"] . ".jpg'></td>";
			echo "<td><a href='single-painting.php?id=" . $var["PaintingID"] . "'>" . $var["Title"] . "</a></td>";
			echo "<td><a class='removeLinkStyle' href='remove-wish-list.php?PaintingID=" . $var["PaintingID"] . "'>Remove</a>";
			echo "</tr>";
		}

		echo "<tr class='emptyRow'></tr>";
		echo "<tr>";
		echo "<td><a class='removeLinkStyle' href='remove-wish-list.php'>Remove All Items from Wish List</a></td>";
		echo "</tr>";
		echo "</table>";


	} else {
		echo "No items in the Wish List";
	}

	

?>



	
</div>
	<footer>
		<p class="footer">All images are copyright to their owners. This is just a hypothetical site &copy; 2014 Copyright Art Store</p>
	</footer>


<script type="text/javascript" src="js/assign2-1.js"></script>
	
</body>
</html>