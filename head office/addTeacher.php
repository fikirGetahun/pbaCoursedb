<?php 




?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>

    </script>
</head>
<form  action="addStudent.php" method="POST" enctype="multipart/form-data">
        <label for="inputPassword5" class="form-label">First Name</label>
        <input type="text" id="inputPassword5" name="firstName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Middle Name</label>
        <input type="text" id="inputPassword5" name="middleName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Last Name</label>
        <input type="text" id="inputPassword5" name="lastName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        
        <label>Gender:</label><br>
        <select class="form-select" style="float:left;" name="sex" aria-label="Default select example">
        <option selected>Section :</option>
        <option value="m">M</option>
        <option value="f">F</option>
        </select>


        <input type="file" name="photo"> <br>
        

        <label for="inputPassword5" class="form-label">Father's Name</label>
        <input type="text" id="inputPassword5" name="fathersName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Mother's Name</label>
        <input type="text" id="inputPassword5" name="mothersName" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Father's Phone</label>
        <input type="number" id="inputPassword5" name="fathersPhone" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Mother's Phone</label>
        <input type="number" id="inputPassword5" name="mothersPhone" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div>
        <label for="inputPassword5" class="form-label">Address</label><br>
        <textarea class="form-text" id="address" name="address"></textarea> 
        <div id="passwordHelpBlock" class="form-text"> 
        </div>
        <!-- <label for="inputPassword5" class="form-label">Status</label>
        <input type="text" id="inputPassword5" name="status" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
        </div> -->
        <label for="inputPassword5" class="form-label">Note about student</label><br>
        <textarea class="form-text" id="address" name="note"></textarea> 
        <div id="passwordHelpBlock" class="form-text"> 
        </div>       
        <input type="submit" value="Add Student"> 