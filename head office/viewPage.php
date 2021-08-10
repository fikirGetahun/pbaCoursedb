<?php 
require('../dbSetup/connect.php');

global $auth2;
//to filter out the edit and delete for teacher logs in b/c teachers dont have autherization
if(isset($_POST['auth2'])){
    $auth3 = $_POST['auth2'];
}


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
            function teacherEdit(id){
                $('#content').load('teacherEdit.php', {id: id})
            }
            function teacherFullView(id){
                $('#content').load('teacherFullView.php', {id: id})
            }
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
// students view if block for 'all selected'
    if(isset($_POST['class'], $_POST['section'], $_POST['searchData'])){
        $isStudent = $_POST['student'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        $searchData = $_POST['searchData'];
        if($class == "All" || $section == "All"){
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
                        <?php
                            if($auth3 == 'ADMIN'){
                                ?>
                                <td id="edit" onclick="editPage(<?php echo $row['id'];?>);" >Edit</td>
                                <td id="delete" onclick="deletePage(<?php echo $row['id'];?>);" >Delete</td>                                   
                                <?php
                            }
                        ?>

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

    // teachers viewing if block
    if(isset($_POST['division'], $_POST['searchData'], $_POST['student']) ){
        $division = $_POST['division'];
        $search = $_POST['searchData'];
        if($division == 'All'){ // when all division is selected 
            $query = "SELECT  `firstName`, `middleName`, `lastName`, `sex`,  `department`, `division` FROM `teacherslist` WHERE `firstName` LIKE '%$search%' ";
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
                    <th scope="col">Gender</th>
                    <th scope="col">Department</th>
                    <th scope="col">Division</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = $ask->fetch_assoc()){
                    ?>
            
                
                    
                        <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];?></td>
                        <td><?php echo $row['sex']; ?> </td>
                        <td><?php echo $row['department']; ?> </td>
                        <td><?php echo $row['division']; ?> </td>
                        <td id="full" onclick="teacherFullView(<?php echo $row['id']; ?>)">Full View</td>
                        <?php
                            if($auth3 == 'ADMIN'){
                                ?>
                                <td id="edit" onclick="teacherEdit(<?php echo $row['id'];?>);" >Edit</td>
                                <td id="delete" onclick="deletePage(<?php echo $row['id'];?>);" >Delete</td>                                   
                                <?php
                            }
                        ?>

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
        if($division != 'All' ){// whwn a division is selected
            $query = "SELECT  `firstName`, `middleName`, `lastName`, `sex`,  `department`, `division` FROM `teacherslist` WHERE `division` LIKE '$division' AND `firstName` LIKE '%$search%' ";
                
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
                        <th scope="col">Gender</th>
                        <th scope="col">Department</th>
                        <th scope="col">Division</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = $ask->fetch_assoc()){
                        ?>
                
                    
                        
                            <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];?></td>
                            <td><?php echo $row['sex']; ?> </td>
                            <td><?php echo $row['department']; ?> </td>
                            <td><?php echo $row['division']; ?> </td>
                            <td id="full" onclick="teacherFullView(<?php echo $row['id']; ?>)">Full View</td>
                            <?php
                                if($auth3 == 'ADMIN'){
                                    ?>
                                    <td id="edit" onclick="teacherEdit(<?php echo $row['id'];?>);" >Edit</td>
                                    <td id="delete" onclick="deletePage(<?php echo $row['id'];?>);" >Delete</td>                                   
                                    <?php
                                }
                            ?>
    
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
        
        
        
        
        
        if(isset($_POST['class'], $_POST['section'], $_POST['searchData'])){ //for searching class and section if 'all' is not selected
            $query = "SELECT `id`, `firstName`, `middleName`, `lastName`, `sex`, `class`, `section`
             FROM `studentslist` WHERE `firstName` LIKE '%$searchData%' AND `class` LIKE '$class' AND `section` LIKE '$section'  ";
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
                        <?php
                            if($auth3 == 'ADMIN'){
                                ?>
                                <td id="edit" onclick="editPage(<?php echo $row['id'];?>);" >Edit</td>
                                <td id="delete" onclick="deletePage(<?php echo $row['id'];?>);" >Delete</td>                                   
                                <?php
                            }
                        ?>

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
        
    

?>