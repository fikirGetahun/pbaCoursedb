<?php 
require('../dbSetup/connect.php');
require('../dbSetup/mannage teacher.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $roww = $teacher->teacherInfo($id);
    while($row = $roww->fetch_assoc() ){
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

/// to send the class, section and teachers id to the api to be inserted to db
if(isset($_POST['class'], $_POST['section'], $_POST['tid'])){
    $ask = $teacher->classAssigner($_POST['class'],$_POST['section'], $_POST['tid']);
}


global $nob;

?>

<head>
    <script src="../modules/jquery.js"></script>
    <script>
     $(document).ready(function(){
            $('#ass').hide()

            $('#assg').on('submit', function(e){
                e.preventDefault()
                $.ajax({
                    url: '../classManage/assignClassForm.php',
                    method: 'post',
                    data: $('form').serialize(),
                    success: function(res, text){
                        $('#ass').show()
                        setTimeout(function() {
                        $('#ass').hide();
                        }, 2000);
                    }
                })
                return false;
            })

        })
        $('#finish').click(function(){
            $('#nm').empty()
        })


    </script>
</head>
<div>
    
        <h5>Name</h5><span><?php echo $name; ?></span>
        <h5>Department: </h5><span><?php echo $department; ?></span>
        <h4>Division: </h4><span><?php echo $division; ?></span>
        <div id="nm">
    <div>
 
    <form id="assg" action="../classManage/assignClassForm.php" method="POST">


            <div id="<?php echo $i; ?>" class="block">
            
            <h5>Select Class & Section:</h5>
            <label>Class: </label><br>
            <select required class="form-select" style="float:left;" name="class" aria-label="Default select example">
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
            <label>Section:</label><br>
            <select required class="form-select" style="float:left;" name="section" aria-label="Default select example">
            <option value="a">A</option>
            <option value="b">B</option>
            </select>
            <!-- // this is to pass the teachers id that need to be class assigned -->
            <input hidden id="tid" name="tid" value="<?php echo $id; ?>">
            <input  type="submit" value="Assign Class To Teacher"> 
            </div>
            <div id="ass">Class Assigned</div>
    
            
    

    </form>
    <h6 id="finish" >Finish</h6>
    </div>
</div>
</div>
