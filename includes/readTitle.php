<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["bookkeyword"])) {
$query ="SELECT * FROM BookList WHERE Title LIKE '" . $_POST["bookkeyword"] . "%' ORDER BY Title LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="book-list">
<?php
foreach($result as $book) {
?>
<li onClick="selectBook('<?php echo $book["Title"]; ?>');bookID('<?php echo $book["BookID"]; ?>');"><?php echo $book["Title"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>