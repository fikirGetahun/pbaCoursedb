<?php
require('../dbSetup/connect.php');
require('../dbSetup/mannage student.php');
global $id;
if(isset( $_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'])){
    $ask = $manageStudent->studentEdit($_POST['firstName'], 'firstName', $id );
}

if(isset($_POST['type'])){
    if($_POST['type'] == 'name' ){
        ?>
        <div id="name">
            <form action="editForm.php" method="POST">
            <label>First Name:</label>
                <input type="text" id="inputPassword5" name="firstName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <label>Middle Name:</label>
                <input type="text" id="inputPassword5" name="middleName" class="form-control" aria-describedby="passwordHelpBlock"> 
                <label>Last Name:</label>
                <input type="text" id="inputPassword5" name="lastName" class="form-control" aria-describedby="passwordHelpBlock">  
                <input type="submit" value="Edit">
            </form>
        </div>
        
        <?php
    }
}




?>