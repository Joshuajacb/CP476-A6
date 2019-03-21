<?php 
include 'include/art-header.php'; 
session_start();
?>

<?php 

$pageAID = isset($_GET["artist"]) ? $_GET["artist"] : null;
$pageMID = isset($_GET["museum"]) ? $_GET["museum"] : null;
$pageSID = isset($_GET["shape"]) ? $_GET["shape"] : null;



?>

    

    <div class="container" id="browse-page">
        
        <div class="row">
            
            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        <h3>Filters</h3>
                    </div>
                </div>
                
                <form method="get" action="browse-paintings.php">
                    
                    <div class="form-group row">
                       
                        <label for="inputArtist" class="col-sm-4 col-form-label">Artist</label>
                        <div class="col-sm-8">
                            
                            <select name="artist" id="inputArtist" class="form-control">
                                <option selected>Select Artist</option>
                                <?php  
                                    $sqlNames = "SELECT LastName, ArtistID FROM artists";
                                    $sqlNamesResult = $conn->query($sqlNames);

                                    if($sqlNamesResult->num_rows > 0) {

                                        while($row = $sqlNamesResult->fetch_assoc()) {
                                           if($row["LastName"] != NULL) {
                                             echo "<option value='" . $row["ArtistID"] . "'>" . $row["LastName"] . "</option>";
                                           }
                                        }

                                    } else {
                                        echo "No results";
                                        echo "<option value='1'>FAILED CONNECTION</option>";
                                    }
                                ?>
                            </select>

                        </div>

                    </div>
                    <div class="form-group row">
                       
                        <label for="inputMuseum" class="col-sm-4 col-form-label">Museum</label>
                        <div class="col-sm-8">
                            <select name="museum" id="inputMuseum" class="form-control">
                                <option selected>Select Museum</option>
                                <?php  
                                    $sqlGallery = "SELECT GalleryName, GalleryID FROM galleries";
                                    $sqlGalleryResult = $conn->query($sqlGallery);

                                    if($sqlGalleryResult->num_rows > 0) {

                                        while($row = $sqlGalleryResult->fetch_assoc()) {
                                           if($row["GalleryName"] != NULL) {
                                             echo "<option value='" . $row["GalleryID"] . "'>" . $row["GalleryName"] . "</option>";
                                           }
                                        }

                                    } else {
                                        echo "No results";
                                        echo "<option value='1'>FAILED CONNECTION</option>";
                                    }

                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">   

                        <label for="inputShape" class="col-sm-4 col-form-label">Shape</label>
                        <div class="col-sm-8">
                            
                            <select name="shape" id="inputShape" class="form-control">
                                <option selected>Select Shape</option>
                                <?php  
                                    $sqlShapes = "SELECT ShapeName, ShapeID FROM shapes";
                                    $sqlShapesResult = $conn->query($sqlShapes);

                                    if($sqlShapesResult->num_rows > 0) {

                                        while($row = $sqlShapesResult->fetch_assoc()) {
                                           if($row["ShapeName"] != NULL) {
                                             echo "<option value='" . $row["ShapeID"] . "'>" . $row["ShapeName"] . "</option>";
                                           }
                                        }

                                    } else {
                                        echo "No results";
                                        echo "<option value='1'>FAILED CONNECTION</option>";
                                    }

                                ?>
                            </select>

                        </div>

                   </div>

                   <div class="form-group row">
                       <div class="col-sm-4">
                           <button type="submit" class="btn btn-primary btn-lg">Filter</button>
                       </div>
                   </div>

                </form>

            </div>

            <div class="col-md-8">
                
                <div class="row">
                    <h1>Paintings</h1>
                </div>
                <div class="row">
                    <h3>All Paintings [Top 20]</h3>
                </div>
                
                <ul class="list-group list-group-flush" id="paintingsList">

                    <?php  

                         $sqlPaint = "SELECT a.PaintingID, a.ImageFileName, a.Title, a.Excerpt, a.MSRP, a.GalleryID, a.ShapeID, a.ArtistID, b.FirstName, b.LastName FROM paintings a JOIN artists b ON a.artistID = b.ArtistID";

                         if(!$pageAID && !$pageMID && !$pageSID) {
                            $sqlPaint .= " LIMIT 20";
                         }

                         if($pageAID != null && $pageAID > 0) {
                            $sqlPaint .= " WHERE a.ArtistID = " . $pageAID;
                         } 

                         if($pageMID != null && $pageMID > 0 && !$pageAID && !$pageSID) {
                            $sqlPaint .= " WHERE a.GalleryID = " . $pageMID;
                         } else if ($pageMID != null && $pageMID > 0) {
                            $sqlPaint .= " and a.GalleryID = " . $pageMID;
                         }

                         if($pageSID != null && $pageSID > 0 && !$pageAID && !$pageMID) {
                            $sqlPaint .= " WHERE a.ShapeID = " . $pageSID;
                         } else if($pageSID != null && $pageSID > 0) {
                            $sqlPaint .= " and a.ShapeID = " . $pageSID;
                         }

                        #echo "" . $sqlPaint . " ";
                         $sqlPaintResult = $conn->query($sqlPaint);

                         while($row = $sqlPaintResult->fetch_assoc()) {

                        
                    ?>

                    <li class="list-group-item">

                        <div class="row">
                            
                            <div class="col-sm-4">
                                 <div class="figure">

                                    <a href="single-painting.php?id=<?php echo $row['PaintingID']; ?>">
                                        <img src="images/square-medium/<?php echo $row['ImageFileName']; ?>.jpg">
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                
                                 <div class="itemright">
                                    <a href="single-painting.php?id=<?php echo $row['PaintingID']; ?>">
                                        <?php $row['Title']; ?></a>

                                    <div><span><a href="#"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></a></span></div>        


                                    <div class="description">
                                        <p><?php echo $row['Excerpt']; ?></p>
                                    </div>

                                    <div class="meta">     
                                        <strong><?php echo "$" . number_format($row['MSRP'], 2); ?></strong>        
                                    </div>        
        <?php 

            $wishListString = 'PaintingID=' . urlencode($row["PaintingID"]) . '&ImageFileName=' . urlencode($row["ImageFileName"]) . '&Title=' . urlencode($row["Title"]);

        ?>
                                    <div class="extra" >
                                        <a class="btn btn-outline-primary" href="cart.php?id=<?php echo $row['PaintingID']; ?>"><i class="fas fa-shopping-cart"></i></a>
                                        <a  class="btn btn-outline-primary"   href="addToWishList.php?<?php echo htmlentities($wishListString); ?>"><i class="fas fa-heart"></i>
                                        </a> 
                                    </div>       

                                </div> 

                            </div>

                        </div>

                    </li>

                    <?php
                    
                      }

                    ?>

                </ul>


            </div>

        </div>

    </div>








</div>

    <!-- <script type="text/javascript" src="js/assign2-1.js"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
    </body>
</html>
