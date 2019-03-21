<?php  
    
    include 'include/config.php';
    include 'include/functions.php';

    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    $conn->set_charset("utf8");

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Can't connect to DB";
    }

    // $sqlR = "SELECT artists.LastName, artists.ArtistID FROM artists UNION SELECT galleries.GalleryName, galleries.GalleryID FROM galleries UNION SELECT shapes.ShapeName, shapes.ShapeID FROM shapes";
    // $sqlRx = $conn->quert($sqlR);
    // $results = array();
    // if($sqlRx->num_rows > 0) {
    //     while($row = $sqlRx->fetch_assoc()) {
    //         $results[] = $row
    //     }
    // }

    // echo json_encode($results);


        $sqlNames = "SELECT LastName, ArtistID FROM artists";
        $sqlNamesResult = $conn->query($sqlNames);
        $namesJSON = array();
        if($sqlNamesResult->num_rows > 0) {

            while($row = $sqlNamesResult->fetch_assoc()) {
                if($row["LastName"] != NULL) {
                    $namesJSON[] = $row;
                }
            }
            

        }

         $sqlGallery = "SELECT GalleryName, GalleryID FROM galleries";
        $sqlGalleryResult = $conn->query($sqlGallery);
        $galleryJSON = array();
        if($sqlGalleryResult->num_rows > 0) {

            while($row = $sqlGalleryResult->fetch_assoc()) {
                if($row["GalleryName"] != NULL) {
                    $namesJSON[] = $row;
                }
            }


        }

        $sqlShapes = "SELECT ShapeName, ShapeID FROM shapes";
        $sqlShapesResult = $conn->query($sqlShapes);
        $shapesJSON = array();
        if($sqlShapesResult->num_rows > 0) {

            while($row = $sqlShapesResult->fetch_assoc()) {
                if($row["ShapeName"] != NULL) {
                   $namesJSON[] = $row;
                }
            }

        }


        echo json_encode($namesJSON);


    // function getNames($conn) {
    //     $sqlNames = "SELECT LastName, ArtistID FROM artists";
    //     $sqlNamesResult = $conn->query($sqlNames);
    //     $namesJSON = array();
    //     if($sqlNamesResult->num_rows > 0) {

    //         while($row = $sqlNamesResult->fetch_assoc()) {
    //             if($row["LastName"] != NULL) {
    //                 $namesJSON[] = $row;
    //             }
    //         }
            
    //         $namesResults = json_encode($namesJSON);

    //     }

    //     return $namesResults;
    // }

    // function getGalleries($conn) {
    //      $sqlGallery = "SELECT GalleryName, GalleryID FROM galleries";
    //     $sqlGalleryResult = $conn->query($sqlGallery);
    //     $galleryJSON = array();
    //     if($sqlGalleryResult->num_rows > 0) {

    //         while($row = $sqlGalleryResult->fetch_assoc()) {
    //             if($row["GalleryName"] != NULL) {
    //                 $galleryJSON[] = $row;
    //             }
    //         }

    //         $galleryResults = json_encode($galleryJSON);

    //     }

    //     return $galleryResults;
    // }

    // function getShapes($conn) {
    //     $sqlShapes = "SELECT ShapeName, ShapeID FROM shapes";
    //     $sqlShapesResult = $conn->query($sqlShapes);
    //     $shapesJSON = array();
    //     if($sqlShapesResult->num_rows > 0) {

    //         while($row = $sqlShapesResult->fetch_assoc()) {
    //             if($row["ShapeName"] != NULL) {
    //                $shapesJSON[] = $row;
    //             }
    //         }

    //         $shapesResults = json_encode($shapesJSON);

    //     }

    //     return $shapesResults;
    // }

    // echo getNames($conn) . getGalleries($conn) . getShapes($conn);


?>

