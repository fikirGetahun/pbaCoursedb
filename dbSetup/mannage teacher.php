<?php

class teacherManage{
//class assigner
function classAssigner($class, $section, $id){
    include("connect.php");
    // this is to add the department(subjuct) of the class that the teacher teaches. this helps me letter on to query the list of teachers theat teaches in a specific grade
    $depq = "SELECT  `department` FROM `teacherslist` WHERE `id` LIKE '$id'";
    $give = $mysql->query($depq);
    $ans = $give->fetch_assoc();
    $department = $ans['department'];


    $query= "INSERT INTO `classtable`( `teacherid`, `class`, `section`, `department`) 
    VALUES ('$id', '$class', '$section', '$department')";
    // this is to update teachers status that the teacher has assigned a class
    $query2 = "UPDATE `teacherslist` SET `assignedClass` =  1  WHERE `teacherslist`.`id` = '$id'";
    $tell = $mysql->query($query);
    $ask = $mysql->query($query2);

}

//class editor
function classEditor($class, $section, $id){ //id here is the assigned class prymery key
    include('../dbSetup/connect.php');
    $query = "UPDATE `classtable` SET `class` = '$class', `section` = '$section' WHERE `classtable`.`id`= '$id'";
    $ask = $mysql->query($query);
}

// to check if the teacher has assigned a class to him. so that the 'edit assiged class' button will only come to the teacher that only has no class assigned to him
function assignedChecker($id){ // the id is the teachers id that is given from the caller
    include('../dbSetup/connect.php');
    $query = "SELECT `assignedClass` FROM `teacherslist` WHERE `id` = '$id' ";
    $ask = $mysql->query($query);
    $row = $ask->fetch_assoc();

    if($row['assignedClass'] == 1){
        return 'yes';
    }else{
        return 'no';
    }
}
}

$teacher = new teacherManage;

?>