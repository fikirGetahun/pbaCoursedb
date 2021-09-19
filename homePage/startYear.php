<?php
require('../dbSetup/mannageSchool.php');
?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#addD').click(function(){
                $('#load').load('../homePage/addDivision.php')
            })
        })
    </script>
</head>

<?php

$obj = $manageSchool-> toStartYear();
if($obj == 'yes'){
   ?>
   <h5>Now you have to enter New or Additional Division, Class and subject.</h5>
   <button id="addD" >Add Division</button>
   <div id="load">

   </div>

   <?php

    

}else{
    echo 'DATA BASE ERROR';
}

?>