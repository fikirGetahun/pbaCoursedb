<?php
require_once('../dbSetup/connect.php');
// $mysql2 = new mysqli('localhost','root', ''); 

global $show;
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM `headoffice` WHERE `username` LIKE '$username' AND `password` LIKE '$username'";

    
    $result = $mysql->query($query); 
    
    
        if($result->num_rows == 0){
            $show = false;
        }else{
            
            while($row = $result->fetch_assoc()){
                $_SESSION['id'] = $row['id'];
                header('Location: officeLogin.php');
            
            } 
        }

    
    if($result->num_rows == 0){
        
    }

    }   


?>







<html> 
<head><title>Head Office Login</title> </head>

    <div id="container">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php $_SERVER['SCRIPT_NAME'] ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <?php 
                                if($show === false){
                                    echo '<h2>wrong user</h2>';
                                }
                            
                            
                            ?>
                            <div class="form-group">
                                <input type="submit" name="subit" class="btn btn-info btn-md" value="Login">
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    </div>





</html>