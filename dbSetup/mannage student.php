<?php 
require('connect.php');
//this class holds every api concerning in the head office about student
class studentManger{
    
    public function studentAdder($firstName, $middleName, $lastName, $sex, $class, $section, $fatherName, $motherName, $fatherPhone, $motherPhone, $address, $status, $photoPath, $note ){
        $host = 'localhost';
        $dbName = 'pbaCoursedb2014';
        $user = 'root';
        $pass = '';
        
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
    function studentEdit($editedFile, $colomun){
        $query = "INSERT INTO `studentlist`(`'$colomun'`) VALUES ('$editedFile')";
        $mysql = new mysqli();
        $ask = $mysql->query($query);
        if($ask){
            return true;
        }else{
            return false;
        }
    }


    //this function is for providing filtered students for searching and for edititng
    function searchResultProvider($class, $section, $searchData){
        $mysql = new mysqli();
        if($class == 'ALL'){
            $query = "SELECT  `firstName`, `middleName`, `lastName`, `class`, `section` FROM `studentslist` LIKE '%$searchData%'";
        }
    }
}

$manageStudent = new studentManger


?>