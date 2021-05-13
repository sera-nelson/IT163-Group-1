<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM AuthorList WHERE Name LIKE '" . $_POST["keyword"] . "%' ORDER BY Name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="name-list">
<?php
foreach($result as $name) {
?>
<li onClick="selectName('<?php echo $name["Name"]; ?>');nameID('<?php echo $name["AuthorID"]; ?>');"><?php echo $name["Name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>