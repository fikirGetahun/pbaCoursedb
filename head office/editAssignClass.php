<?php 
require('../dbSetup/connect.php');

// getting the teachers id
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query="SELECT `class`, `section` FROM `classtable` WHERE `teacherid` LIKE '$id'";
    $query2 = "SELECT  `firstName`, `middleName`, `lastName`, `sex`,  `department`, `division`
     FROM `teacherslist` WHERE `id` LIKE '$id' ";
    $ask = $mysql->query($query);
    $ask = $mysql->query($query2);

    while($row = $ask->fetch_assoc()){
        ?>
        <div>

        </div>
        
        
        <?php
    }
    
    $class = $row['class'];
    $sec = $row['section'];
}

$('#id option[value="0"]').attr('selected', 'selected')

?>