<!DOCTYPE html>
<html>
<head>
	<title>Edit Details</title>
</head>
<body>
	<?php
		include_once 'connection.php';
		$obj = new connection;
		$obj->connect();
		$obj->sql="select * from student where student_id='".$_REQUEST['eid']."'";
		$obj->select($obj->sql);
		$row=mysqli_fetch_array($obj->res);
	?>
	<form method="post">
	    <table align="center" border="1" cellspacing="0">
	       <tr><td>Student Name:</td><td><input type="text" name="name" value="<?php echo $row['student_name']?>"></td></tr>
	       <tr><td>Student Email:</td><td><input type="text" name="email" value="<?php echo $row['student_email']?>"></td></tr>
	       <tr><td>Student Contact:</td><td><input type="text" name="contact" value="<?php echo $row['student_contact']?>"></td></tr>
	       <tr><td align="center" colspan="2"><input type="submit" name="submit" value="Update"></td></tr>
	    </table>
	    <?php
	    if (isset($_REQUEST['submit'])) 
	    {
	    	$obj->sql="update student set student_name='".$_REQUEST['name']."',student_email='".$_REQUEST['email']."',student_contact='".$_REQUEST['contact']."' where student_id='".$_REQUEST['eid']."' ";
	    	$obj->insert($obj->sql);
	    	 echo "<script>alert('Student Details updated');document.location='index.php';</script>";
	    }
	    ?>
	</form>
</body>
</html>