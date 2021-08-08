<?php 
require('connect.php');
//this class holds every api concerning in the head office about student
class studentManger{
    
    public function studentAdder($firstName, $middleName, $lastName, $sex, $class, $section, $fatherName, $motherName, $fatherPhone, $motherPhone, $address, $photoPath, $note ){
        $host = 'localhost';
        $dbName = 'pbaCoursedb2014';
        $user = 'root';
        $pass = '';
        $status = 'REGISTERD';
        
        $mysql = new mysqli($host, $user, $pass, $dbName);
        $query = "INSERT INTO `studentslist` (`firstName`, `middleName`, `lastName`, `sex` , `class`, `section`, `fatherName`, `motherName`, `fatherPhone`, `motherPhone`, `address`, `status`, `photoPath`, `note`)
         VALUES('$firstName','$middleName','$lastName', '$sex','$class','$section','$fatherName','$motherName','$fatherPhone','$motherPhone',
         '$address','$status','$photoPath','$note')";

        $ask = $mysql->query($query);
        // if($ask){
        //     return 'yes';
        // }
        // else{
        //     return 'no';
        // }

    }

// this function is for adding the edited row when request is requested
    function studentEdit($editedFile, $colomun, $sid){
        $query = "UPDATE `studentlist` SET '$colomun' =  '$editedFile'  WHERE `id` = '$sid'";
        $mysql = new mysqli();
        $ask = $mysql->query($query);
        if($ask){
            return true;
        }else{
            return false;
        }
    }



}

$manageStudent = new studentManger


?>