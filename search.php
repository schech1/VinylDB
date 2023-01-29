<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Find Vinyl</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">

</head>

<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}

.results {
  margin-left: auto;
  margin-right: auto;
}

</style>
    <div class="main-content">


        <form class="form-basic" method="post" action="#" enctype="multipart/form-data">

            <div class="form-title-row">
                <h1>Find Vinyl</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Artist</span>
                    <input type="text" name="artist">
                </label>
            </div>


			<div class="form-row">
                <label>
                    <span>Album</span>
                    <input type="text" name="album">
                </label>
            </div>
	

            <div class="form-row">
                <label>
                    <span>Genre</span>
                    <input type="text" name="genre">
                </label>
            </div>


            <div class="form-row">
                <button type="submit" name="submit">Submit Form</button>
            </div>

        </form>
	</div>

    



<?php
error_reporting(0);

$username = "";
$password = "";
$database = "vinyltag";


$mysqli = new mysqli("sql151.main-hosting.eu", $username, $password, $database);

$artist = $mysqli->real_escape_string($_POST['artist']);
$album = $mysqli->real_escape_string($_POST['album']);
$genre = $mysqli->real_escape_string($_POST['genre']);



$sql = "SELECT * FROM VINYLTAG WHERE ARTIST LIKE '%$artist%' XOR ALBUM LIKE '%$album%' XOR GENRE LIKE '%$genre%'";


$squery = $mysqli -> query($sql);



?>






   <div class="results">          
      <table style="width: 100%;"  cellpadding="3" class="blueTable">
        <thead>
          <tr>
			<th>ID</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Genre</th>
          </tr>
        </thead>
        <tbody>
                <?php
				while ($row = mysqli_fetch_array($squery)) {
				?>
				
                    <tr>
						<td><?php echo '<a href="http://scherbeck.tech/vinyldb/view.php?id='.$row['ID'].'">'.$row['ID'].'</a>'; ?></td>
                        <td><?php echo $row['ARTIST'];?></td>
                        <td><?php echo $row['ALBUM'];?></td>
                        <td><?php echo $row['GENRE'];?></td>
                    </tr>
                         
                        <?php
                    }
                     $mysqli -> close();
					 $mysqli -> free_results();
				 
                ?>
             
         </tbody>
      </table>
    </div>





</body>

</html>
