<html>
    <head>
    <title>Demo</title>
    </head>
    <body>
    	<?php
    	include_once 'connection.php';
    	$obj= new connection;
    	$obj->connect();
    	?>
    	<form method="post">
	        <table align="center" border="1" cellspacing="0">
	            <tr><td>Student Name:</td><td><input type="text" name="name"></td></tr>
	            <tr><td>Student Email:</td><td><input type="text" name="email"></td></tr>
	            <tr><td>Student Contact:</td><td><input type="text" name="contact"></td></tr>
	            <tr><td align="center"><input type="submit" name="submit" value="Save"></td><td align="center"><input type="submit" name="view" value="View"></td></tr>
	        </table>
	        <?php
	        	if (isset($_REQUEST['submit']))
	        	{
	        		$obj->sql="insert into student(`student_name`,`student_email`,`student_contact`) value('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['contact']."')";
	        		$obj->insert($obj->sql);
	        		echo "data inserted successfully";
	        	}
	        	if (isset($_REQUEST['view'])) 
	        	{
	        		include 'grid_student.php';
	        	}
	        ?>
	    </form>
    </body>
</html>