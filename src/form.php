<?php
$isvalid = false;
$nameerror = '';
$filename = '';
if (isset($_POST['name1']) && $_POST['name1'] != '' && isset($_POST['name2']) && $_POST['name2'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['gender']) && $_POST['gender'] != '') {

    //Сheck that we have a file
    if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
     //Check if the file is JPEG image and it's size is less than 350Kb
      $filename = basename($_FILES['uploaded_file']['name']);
      $ext = substr($filename, strrpos($filename, '.') + 1);
    if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
    ($_FILES["uploaded_file"]["size"] < 350000)) {
    //Determine the path to save this file
      $newname = dirname(__FILE__).'/uploads/'.$filename;
      //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
           //echo "It's done! The file has been saved as: ".$newname;
        } else {
           echo "Error: A problem occurred during file upload!";
        }
      } else {
         echo "File ".$_FILES["uploaded_file"]["name"]." already exists, the file available to download is already existing file in the directory.";
      }
  } else {
     echo "File uploaded is not in .jpg format, thus file available  to download is corrupted.";
  }
} else {
 //echo "No file uploaded";
} 
        
                                                                   


	$name1 = htmlspecialchars($_POST['name1']);
	$name2 = htmlspecialchars($_POST['name2']);
	$email = htmlspecialchars($_POST['email']);
	$upload = htmlspecialchars($_FILES['uploaded_file']['name']);
	$gender = htmlspecialchars($_POST['gender']);
	$education = htmlspecialchars($_POST['edu']);
	$comments = htmlspecialchars($_POST['tc']);
	$isvalid = true;
} 
else {
	$nameerror = '</br><font color="red"> * Required field</font>';
       }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Project 1</title>
	<link rel="stylesheet" type="text/css" href="form.php">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="form-body"><center>

<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($isvalid) {
				echo '<center><h1>FORM DETAILS</h1></center>
	  <table class="result-table" align="center" border="2" width="500" height="400">
	  <tr align="center">
	  <td>First Name:</td><td>'.$name1.'</td>
	  </tr>

	  <tr align="center">
	  <td>Last Name:</td><td>'.$name2.'</td>
	  </tr>
	  
	  <tr align="center">
	  <td>Email address:</td><td>'.$email.'</td>
	  </tr>

	  <tr align="center">
	  <td>File uploaded:</td><td><a id="download" href="/rbanjara_A20361827_P1/src/uploads/'.$filename.'" download="'.$upload.'">'.$upload.'</td></a>
	  </tr>
	  
	  <tr align="center">
	  <td>Gender:</td><td>'.$gender.'</td>
	  </tr>
	  
	  <tr align="center">
	  <td>Level of Education:</td><td>'.$education.'</td>
	  </tr>
	  
	  <tr align="center">
	  <td>Comments:</td><td>'.$comments.'</td>
	  </tr></table>';

	      date_default_timezone_set('America/Chicago');
	      echo '</br></br></br><font size="5">Submitted: ';
	      echo date('j D Y - g:i:s a');
	      echo '</font>';
	      echo '</br></br><a href="index.php" target="_blank">BACK</a>';
   
			} else {
				?>
				</br></br></br></br>
				<div class="div">
                <table class="table">
				<form name="f3" action="" method="post" enctype="multipart/form-data">
				<tr><th colspan="2">STUDENT DETAIL FORM</th></tr>
	      <tr><td>First Name</td><td><input type="text" name="name1" size="20" maxlength="45" placeholder="First name"><?php echo $nameerror; ?></td></tr>
	      <tr><td>Last Name</td><td><input type="text" name="name2" size="20" maxlength="45" placeholder="Last name"><?php echo $nameerror; ?></td></tr>
	       <tr><td>Email Address</td><td><input  name="email" type="email" placeholder="abc@hawk.iit.edu"><?php echo $nameerror; ?></td></tr>
	       <tr><td><input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> upload File</td><td><input type="file" name="uploaded_file"></td></tr>
	       <tr><td><input type="radio" name="gender" value="male">male</td>
	           <td><input type="radio" name="gender" value="female">female</td></tr>
	           <tr><td>&nbsp;</td><td><?php echo $nameerror; ?></td></tr>
	        <tr><td>Level of Education</td><td>
	      <select name="edu" value="edu">
	         <option>
	         Graduate (default)
	         </option>
	         <option>
	         Under Graduate
	         </option>
	         <option>
	         Other
	         </option>
	         </select>
	         </td></tr>
	         <tr><td>Comments</td><td> <textarea name="tc" rows="4" cols="30" placeholder="Write your comments here...">
	        </textarea></td></tr>
	       <tr><td><input type="submit" value="SUBMIT" name="submit" class="button"></td><td><input type="reset" value="RESET" class="reset"></td></tr>
				</form>
				</table>
                </div>
				<?php
			}
		} 

		else {
			?>
			</br></br></br></br>
			<div class="div">
            <table class="table">
			<form name="f3" action="" method="post" enctype="multipart/form-data">
				<tr><th colspan="2"><font size="5" >IIT CHICAGO STUDENT FORM</font></th></tr>
	      <tr><td>First Name</td><td><input type="text" name="name1" size="20" maxlength="45" placeholder="First name"></td></tr>
	      <tr><td>Last Name</td><td><input type="text" name="name2" size="20" maxlength="45" placeholder="Last name"></td></tr>
	       <tr><td>Email Address</td><td><input  name="email" type="email" placeholder="abc@hawk.iit.edu"></td></tr>
	       <tr><td><input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> Upload File</td><td><input type="file" name="uploaded_file"></td></tr>
	       <tr><td><input type="radio" name="gender" value="male">male</td>
	           <td><input type="radio" name="gender" value="female">female</td></tr>
	        <tr><td>Level of Education</td><td>
	      <select name="edu" value="edu">
	         <option>
	         Graduate (default)
	         </option>
	         <option>
	         Under Graduate
	         </option>
	         <option>
	         Other
	         </option>
	         </select>
	         </td></tr>
	         <tr><td>Comments</td><td> <textarea name="tc" rows="4" cols="30" placeholder="Write your comments here...">
	        </textarea></td></tr>
	       <tr><td><input type="submit" value="SUBMIT" name="submit" class="button"></td><td><input type="reset" value="RESET" class="reset"></td></tr>
			</form>
			</table>
           </div>
			<?php

			date_default_timezone_set('America/Chicago');
	      echo '</br></br></br><font size="7">';
	      echo date('j D Y - g:i:s a');
	      echo '</font>';

		}
	?>
</center>
</body>
</html>

    

	  