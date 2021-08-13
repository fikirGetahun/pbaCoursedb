<?php 
require('../dbSetup/connect.php');
require('../dbSetup/mannage teacher.php');
global $no;
if(isset($_POST['no'], $_POST['id'])){
    $no = $_POST['no'];
    $tid = $_POST['id'];
}


if(isset($_POST['class'], $_POST['section'], $_POST['tid'])){
    $ask = $teacher->classAssigner($_POST['class'],$_POST['section'], $_POST['tid']);
}



?>




<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('form').on('submit', function(){
                $.ajax({
                    url: 'classAssigner.php',
                    method: 'post',
                    data: $('form').serialize(),
                    success: function(res, text){

                    }
                })
                return false;
            })
        })
        function statusChanger(id){
            document.getElementById(id).value = "Class Assigned";
            return true;

        }
    </script>
</head>
<div>
    <div>
    <?php 
    $i = 1;
    while( $i <= $no){
        ?>
        <div id="block">
        <form action="classAssigner.php" method="POST">
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
        <input hidden id="tid" name="tid" value="<?php echo $tid; ?>">
        <input id="<?php echo $i; ?>" onclick="statusChanger(<?php echo $i; ?>)" type="submit" value="Assign Class To Teacher"> 
        </div>
        
        </form>

        <?php
        $i = $i + 1;
    }
    
    
    ?>
    </div>
</div>