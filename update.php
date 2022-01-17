<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Update Vinyl</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">

</head>



<?php
$username = "u961868699_vinyltag";
$password = "a5BqArM=";
$database = "u961868699_vinyltag";

$mysqli = new mysqli("sql151.main-hosting.eu", $username, $password, $database);


$gid = filter_var($_GET["id"], FILTER_SANITIZE_STRING);

$query = "SELECT * FROM VINYLTAG WHERE ID='$gid'";
$mysqli->query($query);



$result = $mysqli->query($query);
$row = $result->fetch_assoc();
        $dbid = $row["ID"];
        $dbartist = $row["ARTIST"];
        $dbalbum = $row["ALBUM"];
        $dbyear = $row["YEAR"];
        $dbgenre = $row["GENRE"]; 
        $dbdiscogsurl = $row["DISCOGS_URL"]; 
        $dbabout = $row["ABOUT"]; 
        $dbremarks = $row["REMARKS"]; 
        $dbgrading = $row["GRADING"]; 
        $dbprice = $row["PRICE"]; 
        $dbimgc = $row["FILENAME"];
		$dbimgv = $row["FILENAMEV"];
        


?>



    <div class="main-content">


        <form class="form-basic" method="post" action="#" enctype="multipart/form-data">

            <div class="form-title-row">
                <h1>Update Vinyl</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Artist</span>
                    <input type="text" name="artist" value= "<?php echo $dbartist; ?>">
					
                </label>
            </div>


			<div class="form-row">
                <label>
                    <span>Album</span>
                    <input type="text" name="album" value= "<?php echo $dbalbum; ?>">
                </label>
            </div>
	

            <div class="form-row">
                <label>
                    <span>Genre</span>
                    <input type="text" name="genre" value= "<?php echo $dbgenre; ?>">
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>Year</span>
                    <input type="text" name="year" value= "<?php echo $dbyear; ?>">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>About</span>
                    <input type="text" name="about" value= "<?php echo $dbabout; ?>">
                </label>
            </div>
						
            <div class="form-row">
                <label>
                    <span>Grading</span>
                    <input type="text" name="grading" value= "<?php echo $dbgrading; ?>">
                </label>
            </div>	


            <div class="form-row">
                <label>
                    <span>Discogs</span>
                    <input type="text" name="discogsurl" value= "<?php echo $dbdiscogsurl; ?>">
                </label>
            </div>			
			
            <div class="form-row">
                <label>
                    <span>Price</span>
                    <input type="text" name="price" value= "<?php echo $dbprice; ?>">
                </label>
            </div>

	
			
			
            <div class="form-row">
                <label>
                    <span>Remarks</span>
                    <textarea name="remarks" value= "<?php echo $dbremarks; ?>"></textarea>
                </label>
            </div>



           

            <div class="form-row">
                <button type="submit" name="submit">Submit Form</button>
            </div>

        </form>

    </div>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 $query = "UPDATE `VINYLTAG` SET 
       `ARTIST` = '".$_POST['artist']."', 
       `ALBUM` = '".$_POST['album']."', 
       `YEAR` = '".$_POST['year']."', 
       `GENRE` = '".$_POST['genre']."', 
       `ABOUT` = '".$_POST['about']."', 
	   `GRADING` = '".$_POST['grading']."', 
	   `DISCOGS_URL` = '".$_POST['discogsurl']."', 
	   `PRICE` = '".$_POST['price']."', 
	   `REMARKS` = '".$_POST['remarks']."'

  WHERE ID = '$gid'";
  
  
$mysqli->query($query);

$mysqli -> close();
$mysqli -> free_results();


    }

?>



</body>

</html>
