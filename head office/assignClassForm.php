<?php 
require('../dbSetup/connect.php');
require('../dbSetup/mannage student.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT  `id`, `firstName`, `middleName`, `lastName`, `sex`, `assignedClass`, `department`, `section`,
    `profession`, `photoPath`, `username`, `password`, `phone`, `division`, `auth`
    FROM `teacherslist` WHERE `id` LIKE '$id'";
    $ask = $mysql->query($query);
    while($row = $ask->fetch_assoc()){
        $id = $row['id'];
        $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];
        $sex = $row['sex'];
        $department = $row['department'];
        $pro = $row['profession'];
        $photoP = $row['photoPath'];
        $phone = $row['phone'];
        $division = $row['division'];
        $auth = $row['auth'];
    }    
}
global $nob;
// to transform how many classes is to be assigned to a teacher
if(isset($_POST['classe'])){
    $nob = $_POST['classe'];
    echo "inn";
}

?>

<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $('#sel').on('submit', function(){
            $.ajax({
                url: 'assignClassForm.php',
                method: 'post',
                data: $('#sel').serialize(),
                success: function(index, text){
                    $cno = []
                    $('#sel').find('[name]').each(function(){
                         $cno.push(this.value)
                    })
                    $id = $('#idv').val()
                        $('#listter').load('classAssigner.php', {no: $cno[0], id: $id})
                    
                }
            })
            return false;
        })
    </script>
</head>
<div>
    <form id="sel" action="assignClassForm.php" method="POST">
        <h5>Name</h5><span><?php echo $name; ?></span>
        <h5>Department: </h5><span><?php echo $department; ?></span>
        <h4>Division: </h4><span><?php echo $division; ?></span>
        <h3>Select How Many Classes To Assign TO: </h3>
        <select class="form-select" style="float:left;" name="classe" aria-label="Default select example">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <input type="submit" value="List Teachers">
    </form>
   <input id="idv" hidden value="<?php echo $id; ?>">
    <div id="listter">

    </div>
</div>
