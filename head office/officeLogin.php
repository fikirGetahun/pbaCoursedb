<?php
    ob_start();
    session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id']) ){
    include 'head office page.php'; 
}
    
else{
    include 'office login page.php';
}
    


?>