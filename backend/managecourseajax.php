<?php
//Include database configuration file
include('mysqli_plug.php');


if(!isset($_POST['course'])&& empty($_POST['course']) && !isset($_POST["trade"]) && empty($_POST["trade"]) && !isset($_POST["syllabus"]) && empty($_POST["syllabus"]) )
  {
    $query = $db->query("SELECT * FROM course;");
    
    $rowCount = $query->num_rows;
    
	echo ('<option disabled selected value> -- Select Course -- </option>');
    if($rowCount > 0)
	{
		while($row = $query->fetch_assoc())
		{ 
            echo ('<option value="'.$row['course'].'">'.$row['course'].'</option>');
        }
    }
	else
	{
        echo '<option value="">No Course available</option>';
    }
	//echo '<option value="addtrade">Add new trade</option>';
}



if(isset($_POST['course'])&& !empty($_POST['course']) && !isset($_POST["trade"]) && empty($_POST["trade"]) && !isset($_POST["syllabus"]) && empty($_POST["syllabus"]) )
  {
    $query = $db->query("SELECT * FROM trade WHERE course = '".$_POST['course']."';");

    $rowCount = $query->num_rows;
    
	echo ('<option disabled selected value> -- Select Trade -- </option>');
    if($rowCount > 0)
	{
		while($row = $query->fetch_assoc())
		{ 
            echo ('<option value="'.$row['trade'].'">'.$row['trade'].'</option>');
        }
    }
	else
	{
        echo '<option value="">Trade not available</option>';
    }
	//echo '<option value="addtrade">Add new trade</option>';
}


if(isset($_POST["trade"]) && !empty($_POST["trade"]) && isset($_POST["course"]) && !empty($_POST["course"]) && !isset($_POST["syllabus"]) && empty($_POST["syllabus"])  )
  {
    $query = $db->query("SELECT * FROM syllabus WHERE course = '".$_POST['course']."' AND trade = '".$_POST['trade']."' ORDER BY syllabus ASC;");
    
    $rowCount = $query->num_rows;
    
	echo '<option disabled selected value> -- Select Syllabus -- </option>';
    if($rowCount > 0)
	{        
        while($row = $query->fetch_assoc())
		{ 
            echo '<option value="'.$row['syllabus'].'">'.$row['syllabus'].'</option>';
        }
    }
	else
	{
        echo '<option value="nope">Syllabus not available</option>';
    }
	//echo '<option value="addsyl">Add new sylabus</option>';
}


if(isset($_POST["syllabus"]) && !empty($_POST["syllabus"]) && isset($_POST["trade"]) && !empty($_POST["trade"]) && isset($_POST["course"]) && !empty($_POST["course"]) )
  {
    $query = $db->query("SELECT * FROM subject WHERE course = '".$_POST['course']."' AND trade = '".$_POST['trade']."' AND syllabus = '".$_POST['syllabus']."';");
    
    $rowCount = $query->num_rows;
    
	echo '<option disabled selected value> -- Select Subject -- </option>';
    if($rowCount > 0)
	{        
        while($row = $query->fetch_assoc())
		{ 
            echo '<option value="'.$row['subject'].'">'.$row['subject'].'</option>';
        }
    }
	else
	{
        echo '<option value="nope">Subjects not available</option>';
    }
	//echo '<option value="addsyl">Add new subject</option>';
}

?>