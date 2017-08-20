<?php 
include("config.php");
$sql=$dbh->prepare("SELECT name FROM chatters");
$sql->execute();
		$active = "";
while($r=$sql->fetch()){
     if(isset($_SESSION['user'])){
	if($_SESSION['user'] == $r['name']){
		$active = "<a href='logout.php' class='exit'>Exit</a>";
	}
	 }
 echo "<div class='user'>{$r['name']} $active</div>";
}
?>
