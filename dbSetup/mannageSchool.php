<!-- this api is all for managing the year, quarter, yearchange, etc -->
<?php

class mannageSchoolcls{

    function toStartYear(){
        include('connect.php');
        // HERE all the needed additional tables that are created when the year is added will be written

        //this is for selecting the current year then we will make it null so that its not the current year
        $query2 = "SELECT `year`, `choosenyear`, `currentyear`
         FROM `yearmanage` WHERE `choosenyear` = 1 ";

        $ask = $mysql-> query($query2);
        $row = $mysql->fetch_assoc();

        $cyear = $row['year'];
        $chyear = $row['choosenyear'];
 
        // this is to change the choosenyear to the new starting year so we must make the choosenyear of the previous one false or 0
        $query3 = "UPDATE `yearmanage` SET `choosenyear`= 0,`currentyear`= 0 WHERE `year` = '.$cyear.'";

        // inserting the year managing data
        $query = "INSERT INTO `yearmanage`(`choosenyear`, `currentyear`, `currentquarter`, `command`, `status`, `q1`, `q2`, `q3`, `q4`)
         VALUES (1, 1, 1, 0, 'LIVE','LIVE', 'NOT', 'NOT', 'NOT')";
        $mysql -> query($query);


    }

    function currentQuarterChecker(){

    }

}

?>