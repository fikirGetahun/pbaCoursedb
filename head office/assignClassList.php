<?php
require('../dbSetup/connect.php');



?>

<head>
    <script src="../modules/jquery.js"></script>
    <script>

        function idGiver(id){
            $('#listed').load('assignClassForm.php', {id: id})
        }

    </script>
</head>
<div id="listed">
<?php
// collecting the division and departments of teachers
if(isset($_POST['dep'], $_POST['search'], $_POST['div'])){
    $division = $_POST['div'];
    $search = $_POST['search'];
    $department = $_POST['dep'];
    $query = "SELECT `id`, `firstName`, `middleName`, `lastName`, `sex`,  `department`, `division` 
    FROM `teacherslist` WHERE `division` LIKE '$division' AND `firstName` LIKE '%$search%' AND
     `department` LIKE '$department' ";
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
                        <td id="edit" onclick="idGiver(<?php echo $row['id'];?>, true);" ><button>Assign Class</button></td>
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

</div>