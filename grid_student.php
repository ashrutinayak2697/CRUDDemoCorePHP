<!DOCTYPE html>
<html>
<head>
	<title>Grid student</title>
</head>
<body>
	<?php
		include_once 'connection.php';
		$obj = new connection();
		$obj->connect();
		$obj->sql="select * from student";
		$obj->select($obj->sql);
		 if(isset($_REQUEST["id"]))
         {
            $obj->sql="delete from student where student_id='".$_REQUEST["id"]."'";
            $obj->insert($obj->sql);
            echo "<script>alert('Record Deleted');document.location='index.php'</script>";
         }
	?>
	<table align="center" border="1" cellspacing="0">
		<th>Sr no.</th>
		<th>Name</th>
		<th>Mail</th>
		<th>Contact</th>
		<th>Edit</th>
		<th>Delete</th>
		<?php
			$i=1;
			while ($row=mysqli_fetch_array($obj->res)) 
			{
		?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $row['student_name'];?></td>
			<td><?php echo $row['student_email'];?></td>
			<td><?php echo $row['student_contact'];?></td>
			<td><a href="student_edit.php?eid=<?php echo $row["student_id"];?>"> Edit </a></td>
			<td><a href="grid_student.php?id=<?php echo $row["student_id"];?>" onClick="return conformation()"> Delete </a></td>
		</tr>
		<?php
			} 
		?>
		 <script>
            function conformation()
            {
            	if(confirm("Are you sure you want to delete student details?"))
                {
                    return true;
                }
                else
                	 return false;
            }
         </script>
	</table>
</body>
</html>