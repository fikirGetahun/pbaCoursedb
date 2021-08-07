<?php

global $var;
if(isset($_POST['us'])){
    $var = $_POST['us'];
}

?>
<html> 
            <body>
                <h2>NEW PAGE</h2>
                <?php echo $var?>
            </body>
        </html>



