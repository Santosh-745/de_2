<?php

    include "config.php";
    // $no_of_step = $_POST['stepcount'];
    // $title = $_POST['title'];
    // print_r($no_of_step);
    // print_r($title);
        
    if (isset($_POST['save'])){
        $step = $_POST['steps'];
        $title = $_POST['title'];
        $no_of_step = $_POST['stepcount'];
        $i = 1;
        $query = "INSERT INTO home_data(title,No_of_steps) VALUES ('$title','$no_of_step')";
        $iab = $conn->prepare($query);
        $iab->execute();
        foreach($step as $item)
        {
            $temp = "Step_".$i++;
            // echo $temp;
            if($item != '')
            {
               $query = "UPDATE home_data SET $temp = '$item' WHERE title = '$title'";
            //    echo $query;
                $iab = $conn->prepare($query);
                $iab->execute();
            }
        }
                       
    }
?>
<html>
    <head>
        <title>ADD REMOVE</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">
    </head>
		
	
	<script>
	$(document).ready(function() {
    var html = "<tr><td><input class='form-control' type='text' id='steps' name='steps[]'></td><td><input class='btn btn-danger' type='button' name='remove' id='remove' value='Remove'></td></tr>";
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = jQuery("#box_count").val();
    
   $("#add").click(function(e){ //on add input button click
        e.preventDefault();

        if(x < max_fields){ //max input box allowed
            //console.log('Step :- '+x);
		     //text box increment
            $("#table_field").append(html); //add input box
            x++;
            jQuery("#box_count").val(x); 
	  }
    });
   
    $("#table_field").on("click","#remove", function(e){ //user click on remove text
       
		e.preventDefault(); 
		$(this).closest('tr').remove(); 
		var x = jQuery("#box_count").val();
        x--;
        jQuery("#box_count").val(x);
    })
});
	
    </script>
    <style>
        .text{
            height: 20vh;
            width: 20vw;
            margin: 25px;
        }
        #btn{
           color: red;
           background-color: black;
           position: absolute;
           left: 23%;
           top: 17%;
           border:solid red;
           text-decoration: none;
           text-transform: uppercase;
           height: 7vh;
           width: 9vw;
           font-size: 20px;
           font-family: 'Castoro', serif;
           
        }
    </style>
	<body>
    <div class="container">
            <form method="post" >
            
                <hr>
                <h3 class="text-center"> Please Enter your Steps within max 10 feilds</h3>
                <hr>
                <div class="input_fields">
                        <h2>Title</h2>
                    <input class="form-control py-3" type="text" name="title" placeholder="Enter the Title"
                        style = "width:50%;">
                    <input type="hidden" name="stepcount" id="box_count" value="1" ><br><br>
                    <table class="table table-bordered" id="table_field">
                    <tr>
                        <th>Steps</th>
                        <th >Add or Remove</th>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="steps[]" id="steps"></td>
                        <td style="width:20%;"><input class="btn btn-warning" type="button"  id="add" value="Add"></td>
                    </tr>
                    </table>
                    
                    <input class="btn btn-success" type="submit" name="save" value="Save Data">
                    
                </div>
            </form>
    </div>
    

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
</body>
</html>