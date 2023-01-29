<html>
<body>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Find Vinyl</title>



</head>
<style>
*
{

margin: auto !important;
}

img 
{
border: 3px solid #000;
filter: drop-shadow(10px 3px 16px #000);
}



/* Style the button that is used to open and close the collapsible content */
.collapsible {
  background-color: #887E7E;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  
}

.collapsible:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .collapsible:hover {
  background-color: #887E7E;
}

.collapsible.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}


/* Style the collapsible content. Note: hidden by default */
.content {

  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  font-size: 15px;
}


/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #DCD3D3;

  
}

/* Style the buttons inside the tab */
.tab button {
	
  float: left;
  width: 50%;
  margin: auto;
  padding: 20px;
  color: black;
  background-color: #DCD3D3;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #887E7E;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

html{
    background-color: #f3f3f3;
}

.form-basic{
    max-width: 640px;
    margin: 0 auto;
    padding: 55px;
    box-sizing: border-box;

    background-color:  #ffffff;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);

    font: bold 14px sans-serif;
    text-align: center;
}
.form-basic button
{
  background-color: #DCD3D3;
}

@media (max-width: 600px) {

    .form-basic{
        padding: 30px;
        max-width: 480px;
    }

    .form-basic .form-row{
        max-width: 300px;
        margin: 25px auto;
        text-align: left;
    }

    .form-basic .form-title-row{
        margin-bottom: 50px;
    }

    .form-basic .form-row > label span{
        display: block;
        text-align: left;
        padding: 0 0 15px;
    }

    .form-basic select{
        width: 240px;
    }

    .form-basic input[type=checkbox]{
        margin-top:0;
    }

    .form-basic .form-radio-buttons > div{
        margin: 0 0 10px;
    }

    .form-basic button{
        margin: 0;
    }

}


</style>



<?php
$username = "";
$password = "";
$database = "vinyltag";

$mysqli = new mysqli("sql151.main-hosting.eu", $username, $password, $database);


$gid = filter_var($_GET["id"], FILTER_SANITIZE_STRING);

$query = "SELECT * FROM VINYLTAG WHERE ID='$gid'";
$mysqli->query($query);

/* 
$client = Discogs\ClientFactory::factory([
    'defaults' => [
        'headers' => ['User-Agent' => 'vinyltag/0.1 +https://www.scherbeck.tech'],
        	'query' => [
           		 'key' => 'xDtaoaXpXfbARajmsshU',
            		'secret' => 'pwfmVTCPoqNERpmDFNucfhFtlyOWxipS',
        ],
    ]
]);

$release = $client->getRelease([
    'id' => 7097051
]);



$release = $client->getRelease([
    'id' => 7097051
]);
foreach ($release['images'] as $image) {
     $response = $client->getHttpClient()->get($image['uri']);
     echo $response->getStatusCode();
    };
 





echo $release['title']."\n";
*/



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

 <div class="form-basic">
  <div class="tab">
    <button class="tablinks" id="defaultOpen" onclick="clickHandle(event, 'cover')">Cover</button>
    <button class="tablinks" onclick="clickHandle(event, 'vinyl')">Vinyl</button>

  </div>

  <div id="cover" class="tabcontent" >
    <img src=<?php echo'"image/'.$dbimgc.'" width="250">'; ?>
  </div>


  <div id="vinyl" class="tabcontent">
  
    <img src=<?php echo'"image/'.$dbimgv.'" width="250">'; ?>
  </div>
 

<script>
function clickHandle(evt, animalName) {
  let i, tabcontent, tablinks;

  // This is to clear the previous clicked content.
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Set the tab to be "active".
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Display the clicked tab and set it to active.
  document.getElementById(animalName).style.display = "block";
  evt.currentTarget.className += " active";
  }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>





<table border="0" cellspacing="2" cellpadding="2" align="center"> 
<tbody>
<tr>
<td style="width: 50%;" "text-align:left"><strong>ID</strong></td>
<td style="width: 50%;"><?php echo $dbid; ?></td>
</tr>
<tr>
<td style="width: 50%;" "text-align:left"><strong>Artist</strong></td>
<td style="width: 50%;"><?php echo $dbartist; ?></td>
</tr>
<tr>
<td style="width: 50%;" "text-align:left"><strong>Album</strong></td>
<td style="width: 50%;"><?php echo $dbalbum; ?></td>
</tr>
<tr>
<td style="width: 50%;" "text-align:left"><strong>Genre</strong></td>
<td style="width: 50%;"><?php echo $dbgenre; ?></td>
</tr>
<tr>
</tbody>
</table>






<button type="button" class="collapsible">Storage Location</button>
<div class="content">
  <p> <?php echo $dbremarks; ?>  </p>
</div>

<button type="button" class="collapsible">Grading Cover / Vinyl</button>
<div class="content">
  <p> <?php echo $dbgrading; ?>  </p>
</div>

<button type="button" class="collapsible">Remarks</button>
<div class="content">
  <p> <?php echo $dbremarks; ?>  </p>
</div>

<button type="button" class="collapsible">Price</button>
<div class="content">
  <p> <?php echo $dbprice; ?> </p>
</div>

<button type="button" class="collapsible">View release on Discogs</button>
<div class="content">
  <p> <?php echo '<a href="'.$dbdiscogsurl.'">Link to Discogs</a>'; ?> </p>
</div>
<div>
<p><?php echo '<a href="http://scherbeck.tech/vinyldb/update.php?id='.$gid.'"';?> >edit</a></p>
</div>

 </div>

<script>

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}


</script>






</body>
</html>


