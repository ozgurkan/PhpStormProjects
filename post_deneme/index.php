<form action="index.php" method="post" enctype="multipart/form-data">
    First name: <input type="text" name="firstname"><br>

    <input type="submit" value="Submit">
</form>
<?php
if(isset($_POST['Submit'])){
$firstname=isset($_POST['firstname'])?$_post['firstname']:"";
echo $firstname;

}
?>