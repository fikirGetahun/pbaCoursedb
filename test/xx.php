<?php

global $var;
if(isset($_POST['us'])){
    $var = $_POST['us'];
}

?>
<html> 
            <body>
                <h2>it worked winn</h2>
                <?php echo $var?>
            </body>
        </html>



