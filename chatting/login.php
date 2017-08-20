<br/><br/>
<?php 
if(isset($_POST['name']) && !isset($display_case)){
 $name=htmlspecialchars($_POST['name']);
 $sql=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
 $sql->execute(array($name));
 if($sql->rowCount()!=0 || $_POST['name'] == ""){
  $ermsg="<div class='error'>Name is already in use. Try using a different name.</div>";
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($name));
  $_SESSION['user']=$name;
 }
}elseif(isset($display_case)){
 if(!isset($ermsg)){
?>
 <form action="index.php" method="POST">
  <input name="name" class="feedback-input" placeholder="Your name" required/>
  <button id="button-blue">Sign in</button>
 </form>
<?php 
 }else{
?>
 <form action="index.php" method="POST">
  <input name="name" class="feedback-input" placeholder="Your name" required/>
  <button id="button-blue">Sign in</button>
 </form>
<?php 
  echo $ermsg;
 }
 echo '<p align="center">This is a chat room with people you do not know and others do not know who you are. ^ O ^</p>';
}
?>
<footer>Made by <a href="https://subinsb.com/group-chat-in-php-with-ajax-jquery-mysql" target="_BLANK">@SubinSiby</a> Developed by <a href="http://ibacor.com" target="_BLANK">@bachors</a></footer>
