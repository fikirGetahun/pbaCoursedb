<?php 
require('../dbSetup/connect.php');

if($_POST['id'] && !empty($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT `firstName`, `middleName`, `lastName`, `sex`, `class`, `section`,
     `fatherName`, `motherName`, `fatherPhone`, `motherPhone`, `address`, `status`, `photoPath`,
      `note` FROM `studentslist` WHERE `id` LIKE '.$id.'";

    $ask = $mysql->query($query);
    if($ask->num_rows > 0){
        while($row = $ask->fetch_assoc()){
            ?>
            <div id="container">
                <span id="photo"></span>
                <span id="name"></span>
                <div id="gender">Gender: </div>
                <div id="fatherName"> Father's Name: </div>
                <div id="motherName"> Mother's Name: </div>
                <span id="class"> Class: </span>
                <span id="section"> Section: </span>
                <div id="fatherPhone"> Father's Phone: </div>
                <div id="motherPhone"> Mother's Phone: </div>
                <div id="address"> Address: </div>
                <div id="status"> Status: </div>
            </div>
            
<?php   }
    }
}

?>