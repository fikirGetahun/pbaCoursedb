<?php 
require('../dbSetup/connect.php');

?>
<html>
    <head>
        <script src="../modules/jquery.js" ></script>
        <script>
            $(document).ready(function(){
                $('#test').click(function(){
                    $('#content').load('test.php')
                })
            })
            function editPage(id){
                $('#content').load('editPage.php', {id: id})
            }
            function deletePage(id){
                $('#content').load('deletePage.php', {id: id})
            }
            function fullView(id){
                $('#content').load('fullView.php', {id: id})
            }

        </script>
    </head>
</html>



<?php

    if(isset($_POST['class']) || !empty($_POST['class']) || isset($_POST['section']) || !empty($_POST['section']) || isset($_POST['searchData']) || !empty($_POST['searchData'])){
        $class = $_POST['class'];
        $section = $_POST['section'];
        $searchData = $_POST['searchData'];
        if($class == "All"){
            $query = "SELECT `id`, `firstName`, `middleName`, `lastName`, `sex`, `class`, `section` FROM `studentslist` WHERE `firstName` LIKE '%$searchData%'";
            $ask = $mysql->query($query);
            if($ask->num_rows > 0){
                $i = 1;
                ?> 
                <div id="content">
             <table class="table caption-top">
                <caption>List of users</caption>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = $ask->fetch_assoc()){
                    ?>
            
               
                    
                        <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];?></td>
                        <td><?php echo $row['class'].' '.$row['section']; ?></td>
                        <td><?php echo $row['sex']; ?> </td>
                        <td id="full" onclick="fullView(<?php echo $row['id']; ?>)">Full View</td>
                        <td id="edit" onclick="editPage(<?php echo $row['id'];?>);" >Edit</td>
                        <td id="delete" onclick="deletePage(<?php echo $row['id'];?>);" >Delete</td>
                        </tr>

         
            
                    <?php
                   $i = $i + 1;
                }
                ?>
                    </tbody>
                </table>

            </div>      
                <?php
            }else{
                echo 'no match bro';
            }
        }
    }

?>