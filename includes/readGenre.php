<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["genrekeyword"])) {
$query ="SELECT * FROM GenreList WHERE Genre LIKE '" . $_POST["genrekeyword"] . "%' ORDER BY Genre LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="genre-list">
<?php
foreach($result as $genre) {
?>
<li onClick="selectGenre('<?php echo $genre["Genre"]; ?>');genreID('<?php echo $genre["GenreID"]; ?>');"><?php echo $genre["Genre"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>