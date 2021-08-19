<?php 


?>
<head>
    <script src="../modules/jquery.js"></script>
    <script>
        $(document).ready(function(){
            document.getElementById('division').addEventListener('change', function(){
                $('.mddleS').show()
                $('.primery').show()
                if(this.value == 'PM'){
                    $('.mddleS').hide()
                }if(this.value == 'MD'){
                    $('.primery').hide()
                }
            })

            $('form').on('submit', function(){
                return false;
            })

            $('input').keyup(function(){
                $.ajax({
                    url: 'assignClassList.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(res, text){
                        if(text == 'success'){
                            $reqq=[]
                            $('form').find('[name]').each(function(){
                                $reqq.push(this.value)
                            })
                            $('#list').load('assignClassList.php', {search: $reqq[0], div: $reqq[1], dep: $reqq[2]})
                        }else{
                            alert('DATABASE CONNECTION ERROR')
                        }
                    }
                })

            $('form').on('submit', function(){
                $.ajax({
                    url: 'assignClassList.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(res, text){
                        if(text == 'success'){
                            $reqq=[]
                            $('form').find('[name]').each(function(){
                                $reqq.push(this.value)
                            })
                            $('#list').load('assignClassList.php', {search: $reqq[0], div: $reqq[1], dep: $reqq[2]})
                        }else{
                            alert('DATABASE CONNECTION ERROR')
                        }
                    }
                })
                return false;
            })
            })

        })
    </script>
</head>


<div>
    <form action="assignClassSearch.php" method="POST">
        <label>Search</label>
        <input type="text" id="inputPassword5" name="searchData" class="form-control" aria-describedby="passwordHelpBlock">

        <label>Division:</label><br>
        <select class="form-select" style="float:left;" id="division"  name="division" aria-label="Default select example">
        <option value="All" selected>ALL</option>
        <option value="kg">KG</option>
        <option value="PM">PRIMERY SCHOOL</option>
        <option value="MD" >MIDDLE SCHOOL</option>
        </select>
        
        <label>Department:</label><br>
        <select require class="form-select" style="float:left;" name="department" aria-label="Default select example">
            <option value="All" selected>ALL</option>
            <option class="mddleS" value="biology">BIOLOGY</option>
            <option class="mddleS" value="chemistriy">CHEMISTRY</option>
            <option class="mddleS" value="physics">PHYSICS</option>
            <option class="primery" value="scinceInEnglish">SCINCE IN ENGLISH</option>
            <option class="primery" value="scinceInAmharic">SCINCE IN AMHARIC</option>
            <option value="maths">MATHS</option>
            <option value="english">ENGLISH</option>
            <option value="amharic">AMHARIC</option>
            <option value="civics">CIVICS</option>
            <option value="socialStudies">SOCIAL STUDIES</option>
        </select>

        <input type="submit" value="List Teachers">
        

    </form>
    <div id="list"></div>

</div>