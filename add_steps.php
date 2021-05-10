<?php
    session_start();
    include "config.php";
    $user = $_SESSION['user'];
    $query = "select f_name from users where email = ?";
    $iab = $conn->prepare($query);
    $iab->bindParam(1, $user);
    $iab->execute();
    $name = $iab->fetch();
    // echo $name[0];
    if (isset($_POST['save'])){
        $no_of_step = $_POST['stepcount'];
        // print_r($no_of_step);
        $step = $_POST['steps'];
        $resource = $_POST['resource'];
        // echo $step[0];
        // echo $resource[0];
        $title = $_POST['title'];
        $cat = $_POST['category'];
        $no_of_step = $_POST['stepcount'];
        $i = 1;
        $query = "INSERT INTO home_data(title,category,Answered_by,No_of_steps) VALUES ('$title','$cat','$name[0]','$no_of_step')";
        $iab = $conn->prepare($query);
        $iab->execute();
        for($j = 0; $j < $no_of_step ; $j++ )
        {
            $col = "Step_".$i;
            $col_1 = "Reaource_".$i++;
            $val = $step[$j];
            $val_1 = $resource[$j];
            // echo $col;
            // echo $col_1;
            // echo $temp;
            // if($item != '')
            // {
               $query = "UPDATE home_data SET `$col` = '$val', `$col_1` = '$val_1'  WHERE title = '$title'";
            //    echo $query;
                $iab = $conn->prepare($query);
                $iab->execute();
            // }
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
    var html = '<tr><td><textarea class="form-control" name="steps[]" id="steps"></textarea></td><td><textarea class="form-control" name="resource[]" id="resource"></textarea></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="/de_2/faculty.php">Virtual Guidance</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="/de_2/faculty.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Contact Us</a>
				</li>
			  </ul>
			</div>
		 </div>
	</nav>
    <div class="container">
            <form method="post" >
            
                <hr>
                <h3 class="text-center"> Please Enter your Steps within max 10 feilds</h3>
                <hr>
                <div class="input_fields">
                    <h3>Title</h3>
                    <input class="form-control py-3" type="text" name="title" placeholder="Enter the Title"
                        style = "width:50%;">
                    <div class="form-group pt-4">
                    <h3>Category</h3>
                        <select style = "width:36vw" class="form-control inputs" id="category" name="category">
                        <?php	
                            $iab_data = $conn->prepare("SELECT * FROM categories ORDER BY id asc");
                            $iab_data->execute();
                            while ($rowdata = $iab_data->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                <option> <?php echo $rowdata['Category'];?> </option>
                    <?php	} 	?> 
                            <!-- <option>category 1</option>
                            <option>category 2</option>
                            <option>category 3</option>
                            <option>category 4</option> -->
                        </select>
                    </div>
                    <input type="hidden" name="stepcount" id="box_count" value="1" ><br><br>
                    <table class="table table-bordered" id="table_field">
                        <tr>
                            <th>Steps</th>
                            <th>Resources related step</th>
                            <th >Add or Remove</th>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" name="steps[]" id="steps"></textarea></td>
                            <td><textarea class="form-control" name="resource[]" id="resource"></textarea></td>
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