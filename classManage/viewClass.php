<?php 


?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('form').on('submit', function(){
                $.ajax({
                    url: '../classManage/viewClass.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(){
                        $valls = []
                        $('form').find('[name]').each(function(){
                            $valls.push(this.value)
                        })
                        $('#tlist').load('../classManage/viewClassList.php', {class: $valls[0], sec: $valls[1]})
                    }
                    
                })
                return false;
            })
        })
    </script>
</head>

<div>
    <h5>Select Class and Section to View all the teachers assigned.</h5>
<div id="br2">
<form action='viewClass.php' method="POST">
    <label>Class: </label><br>
    <select  class="form-select" style="float:left;" name="class5r" aria-label="Default select example">
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
    <select class="form-select" style="float:left;" name="section5r" aria-label="Default select example">
    <option value="a">A</option>
    <option value="b">B</option>
    </select>
    <input type="submit" value="List All Teachers">

</form>
        <div id="tlist">

        </div>
</div>
</div>