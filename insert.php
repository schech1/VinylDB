<html>
<style>
a::after {
    content: attr(href);
}
</style>

<body>

<?php
require 'vendor/autoload.php';
$username = "";
$password = "";
$database = "vinyltag";



$mysqli = new mysqli("sql151.main-hosting.eu", $username, $password, $database);

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

// $discogsid = $mysqli->real_escape_string($_POST['discogsid']);
$artist = $mysqli->real_escape_string($_POST['artist']);
$album = $mysqli->real_escape_string($_POST['album']);
$year = $mysqli->real_escape_string($_POST['year']);
$genre = $mysqli->real_escape_string($_POST['genre']);
$discogsurl = $mysqli->real_escape_string($_POST['discogsurl']);
$about = $mysqli->real_escape_string($_POST['about']);
$remarks = $mysqli->real_escape_string($_POST['remarks']);
$grading = $mysqli->real_escape_string($_POST['grading']);
$price = $mysqli->real_escape_string($_POST['price']);

$query = "INSERT INTO VINYLTAG (ARTIST, ALBUM, YEAR, GENRE, DISCOGS_URL, ABOUT, REMARKS, GRADING, PRICE) VALUES ('{$artist}','{$album}','{$year}','{$genre}',
'{$discogsurl}','{$about}', '{$remarks}', '{$grading}', '{$price}' )";

$mysqli->query($query);
$last_id = $mysqli->insert_id;


// Move and Rename Cover Photo

$temp = explode(".", $_FILES["uploadfile"]["name"]);
$newfilename = $last_id . '.' . end($temp);
move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "image/" . $newfilename);



$query = "UPDATE VINYLTAG SET FILENAME = '$newfilename' WHERE ID = '$last_id'";

$mysqli->query($query);

// Move and Rename Vinyl Photo

$temp = explode(".", $_FILES["uploadfilev"]["name"]);
$newfilename = $last_id . 'v' . '.' . end($temp);
move_uploaded_file($_FILES["uploadfilev"]["tmp_name"], "image/" . $newfilename);

$query = "UPDATE VINYLTAG SET FILENAMEV = '$newfilename' WHERE ID = '$last_id'";
$mysqli->query($query);

$mysqli->close();


?>


<div id="url"> 
<?php echo '<a href="http://scherbeck.tech/vinyldb/view.php?id='.$last_id.'"></a>'; ?>
</div>

<div id="img">

<img src=<?php echo '"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://scherbeck.tech/vinyldb/view.php?id='.$last_id.'&choe=UTF-8" title="Link to release page"'; ?> />
</div>

<!-- 
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
 -->
     
 
</body>
</html>


