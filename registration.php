
<?php     //start php tag
//include connect.php page for database connection
Include('con_check.php');

//check if form is submitted

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
    $phno = mysqli_real_escape_string($con, $_POST['phone']);
    $skill = mysqli_real_escape_string($con, $_POST['skills']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
    $internet =mysqli_real_escape_string($con, $_POST['internet']);
	$contro =mysqli_real_escape_string($con, $_POST['contro']);
	$asp =mysqli_real_escape_string($con, $_POST['asp']);
	$interest1 =mysqli_real_escape_string($con, $_POST['interest1']);
	$interest2 =mysqli_real_escape_string($con, $_POST['interest2']);
	$wcap =mysqli_real_escape_string($con, $_POST['wcap']);
	
	
if (preg_match('/[CS]/', $rollno)) 
    {   
  	 $branch= 'CSE';
	}
	if (preg_match('/[EC]/', $rollno))
	{
		$branch='ECE';
	}
	if (preg_match('/[ME]/', $rollno))
	{
		$branch='ME';
	}
	if (preg_match('/[CE]/', $rollno))
	{
		$branch='CIVIL';
	}
	if (preg_match('/[EE]/', $rollno))
	{
		$branch='EE';
	}

	$interest= "$interest1,$interest2";
	//image upload 
$target_dir = "user-imgs/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
       echo " your image was  uploaded.";
		$image="/user-imgs/". basename( $_FILES["image"]["name"]) ;
		
    } else {
        echo "Sorry, your file was not uploaded.";
    }
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//image end


        if(mysqli_query($con, "INSERT INTO `student`(`name`, `rollno`, `phoneno`, `email`, `skills`, `gender`, `internet`, `contribution`, `aspectations`, `branch`, `image`, `interest`, `wcap`) VALUES('" . $name . "', '" . $rollno . "', '" . $phno ."','" . $email . "','" . $skill . "','" . $gender . "','" . $internet . "','" . $contro . "','" . $asp . "','" . $branch . "','" . $image . "','" . $interest. "','" . $wcap . "');")) {
            echo '<script>alert("Successfully Submitted!");</script>';
        } else {
            echo '<script>alert("Error in registering...Please try again !");</script>';
        }
    
}

?>
<html>
   <head>
      
      <script type="text/javascript">
         
            function Redirect() {
               
			 
     
               window.location="index.html";
     

            }
       window.setTimeout('window.location="index.html";',20000);
      </script>
      
   </head>
   
   <body>
      <p>Click the following button,If not automatically redirected to home page.</p>
      
      <form>
         <input type="button" value="Redirect Me" onclick="Redirect();" />
      </form>
     
   </body>
</html>
