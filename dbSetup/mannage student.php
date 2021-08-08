<?php 
require('connect.php');
//this class holds every api concerning in the head office about student
class studentManger{
    
    public function studentAdder($firstName, $middleName, $lastName, $sex, $class, $section, $fatherName, $motherName, $fatherPhone, $motherPhone, $address, $photoPath, $note ){
        // $host = 'localhost';
        // $dbName = 'pbaCoursedb2014';
        // $user = 'root';
        // $pass = '';
        include('connect.php');
        $status = 'REGISTERD';
        
        $mysql1 = new mysqli($host, $user, $pass, $dbName);
        $query1 = "INSERT INTO `studentslist` (`firstName`, `middleName`, `lastName`, `sex` , `class`, `section`, `fatherName`, `motherName`, `fatherPhone`, `motherPhone`, `address`, `status`, `photoPath`, `note`)
         VALUES('$firstName','$middleName','$lastName', '$sex','$class','$section','$fatherName','$motherName','$fatherPhone','$motherPhone',
         '$address','$status','$photoPath','$note')";

        $ask = $mysql1->query($query1);
        // if($ask){
        //     return 'yes';
        // }
        // else{
        //     return 'no';
        // }

    }

// this function is for adding the edited row when request is requested
    function studentEdit($editedFile, $colomun, $sid){
        echo $editedFile;
        echo $colomun;
        echo $sid;
        
        $query = "UPDATE `studentslist` SET `$colomun` =  '$editedFile'  WHERE `studentslist`.`id` = '$sid'";
        
        include('connect.php');
        $ask = $mysql->query($query);
        if($ask){
            echo 'yes';
            return true;
        }else{
            echo 'no';
            return false;
        }
    }

    //check admin or not function to filter out unwanted things that the teacher can access



}

$manageStudent = new studentManger


?>