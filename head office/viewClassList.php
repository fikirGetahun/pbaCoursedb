<?php
require('../dbSetup/mannage teacher.php');

if(isset($_POST['class'], $_POST['sec'])){
    $class = $_POST['class'];
    $sec = $_POST['sec'];
}

?>
<div>
<table class="table caption-top">
    <caption>List of users</caption>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Department</th>
        <th scope="col">Grade</th>
        </tr>
    </thead>
<tbody>
    <?php
    $rowq = $teacher->assignedLister($class, $sec);
    $i = 1;
    while($row = $rowq->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <?php
        //here class assingations teachers are separtatly queryied to view the teachers name per the subject
        $rowt = $teacher->teacherInfo($row['teacherid']);
        $trow = $rowt->fetch_assoc();
        $name = $trow['firstName'].' '.$trow['middleName'].' '.$trow['lastName'];
        ?>
        <td><?php echo $name; ?></td>
        <td><?php echo $row['department']; ?></td>
        <?php
        $i = $i + 1;
    }
    ?>
    </tr>
</tbody>

</div>