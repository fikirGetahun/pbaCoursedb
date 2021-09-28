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
    <script src="../modules/jquery.js"  ></script>
    <script>
     $(document).ready(function(){
            $('#ass').hide()

            $('#finish').click(function(){
            $('#nm').empty()
        })

        })

        $i = 1;
        function classadd(){
            $('#assg').submit(function(ex){
                ex.preventDefault()
                $.ajax({
                    url: '../classManage/assignClassForm.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(res, text){
                        
                        $('#ass').show()
                        setTimeout(function() {
                        $('#ass').hide();
                        }, 2000);
                        
                    }
                })
                $clss = $("#classts").val() 
            $sec = $("#sects").val() 

            //this will distroy the select tags to choose classes and become an info displayer to show sellected classes
            document.getElementById("clsx"+ $i).innerHTML = `
                <div id='assigned'>
                    <h5>Assigned To</h5>
                    <h6>Grade: `+ $clss +` `+ $sec +` </h6>
                </div>
            `;
            //x is for the next select tags so that after a class is assigned, then if we need another class to be added
            //so the next select tags will be appeneded but the ids must be one plus of the old ones. b/c
            // when a form is subitted from these new select tags, it will affect the new select divs.
            $x = $i + 1;


            // theses will be appended as a future select tags that are activated.
            // when the subit button is clicked, since i is updated to the new select tags, the classadd() function will only affect the newly active select tags
            document.getElementById("collect").innerHTML += `
            <div id="clsx`+ $x +`" class="block">
            <form id="assg" action="../classManage/assignClassForm.php" method="POST">
            <h5>Select Class & Section:</h5>
            <label>Class: </label><br>
            <select required id="classts" class="form-select" style="float:left;" name="class" aria-label="Default select example">
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
            <select required id="sects" class="form-select" style="float:left;" name="section" aria-label="Default select example">
            <option value="a">A</option>
            <option value="b">B</option>
            </select>
            <!-- // this is to pass the teachers id that need to be class assigned -->
            <input hidden id="tid" name="tid" value="<?php echo $id; ?>">
            <input id="addbutton"  type="submit"  onclick="classadd()" value="Assign Class To Teacher"> 
            </div>
            <div id="ass">Class Assigned</div>
            <div id="clsinfo">

            </div>
    
            </form>
        </div>
     
            
            `
            // this i++ is for the next loop of a class assignation...
            $i++
                return false;
            })
// on the above code block, all the action after submiting must be inside the submit code block unless otherwise it doesent work
        }


    </script>
</head>
<div>
    
        <h5>Name</h5><span><?php echo $name; ?></span>
        <h5>Department: </h5><span><?php echo $department; ?></span>
        <h4>Division: </h4><span><?php echo $division; ?></span>
        <div id="nm">
    <div id="collect">
        <div id="clsx1" class="block">
            <form id="assg" action="../classManage/assignClassForm.php"  method="POST">
            <h5>Select Class & Section:</h5>
            <label>Class: </label><br>
            <select required id="classts" class="form-select" style="float:left;" name="class" aria-label="Default select example">
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
            <select required id="sects" class="form-select" style="float:left;" name="section" aria-label="Default select example">
            <option value="a">A</option>
            <option value="b">B</option>
            </select>
            <!-- // this is to pass the teachers id that need to be class assigned -->
            <input hidden id="tid" name="tid" value="<?php echo $id; ?>">
            <input   type="submit" onclick="classadd()"   value="Assign Class To Teacher"> 
            </div>
            <div id="ass">Class Assigned</div>
            <div id="clsinfo">

            </div>
    
            </form> 
        </div>
    </div>
    </div>
    <h6 id="finish" >Finish</h6>

</div>
