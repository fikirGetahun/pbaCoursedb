<?php 
require('../dbSetup/connect.php');

if(isset($_POST['class'])){
    $no = $_POST['class'];
}

?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('form').on('submit', function(){
                
            })
        })
        function statusChanger(id){
            document.getElementById('id').innerHTML = "Class Assigned";
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
        <label>Class: </label>
        <select class="form-select" style="float:left;" name="class" aria-label="Default select example">
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
        <select class="form-select" style="float:left;" name="section" aria-label="Default select example">
        <option selected>Section :</option>
        <option value="a">A</option>
        <option value="b">B</option>
        </select>

        <input id="<?php echo 'in'.$i ?>" onclick="statusChanger(<?php echo 'in'.$i ?>")" type="submit" value="Add Class To Teacher"> 
        </div>
        
        </form>

        <?php
    }
    
    
    ?>
    </div>
</div>