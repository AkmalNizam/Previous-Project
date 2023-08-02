<?php
include ('action.php');

	
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$sql = "select * from user where id=$id";
		$rec = mysqli_query($db,$sql);
		$record = mysqli_fetch_array($rec);
		$stud_name = $record['stud_name'];
		$stud_id = $record['stud_id'];
		$stud_ic = $record['stud_ic'];
		$id = $record['id'];

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Setting</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#table1 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 95;
}

#table1 td, #table1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table1 tr:nth-child(even){background-color: #f2f2f2;}

#table1 tr:hover {background-color: #ddd;}

#table1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #27ae60;
  color: white;
}
#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 550px;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 2.5px solid #ddd;
  margin-bottom: 12px;
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

</style>
<body>
	<h1 style="text-align:center">Add/Remove/Edit User Setting</h1>
	<nav> 
		<ul style="text-align:right">
			<a href="../index.html">
            <button class="btn"><i class="fa fa-home"></i></button>
			</a>
        </ul>
	</nav>
	
	<div style="text-align:center;">
		<input type="text" id="myInput" onkeyup="Search" placeholder="Search for names.." title="Type in a name">
		
	</div>
	<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
	<?php endif ?>
	
	<table id="table1">
		<thead>
			<tr>
				<th>Name</th>
				<th>Student Id</th>
				<th>IC Number</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['stud_name']; ?></td>
				<td><?php echo $row['stud_id']; ?></td>
				<td><?php echo $row['stud_ic']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
				</td>
				<td>
					<a href="action.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="action.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="stud_name" value="<?php echo $stud_name; ?>">
		</div>
		<div class="input-group">
			<label>Student Id</label>
			<input type="text" name="stud_id" value="<?php echo $stud_id; ?>">
		</div>
		<div class="input-group">
			<label>Student IC</label>
			<input type="text" name="stud_ic" value="<?php echo $stud_ic; ?>">
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php else:?>
			<button class="btn" type="submit" name="update" >Update</button>
		<?php endif ?>
			
		</div>
	</form>
</body>
</html>