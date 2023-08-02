<?php
include ('action.php');

	
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$sql = "select * from user where id=$id";
		$rec = mysqli_query($db,$sql);
		$record = mysqli_fetch_array($rec);
		$User_Id = $record['User_Id'];
		$Name = $record['Name'];
		$Email = $record['Email'];
		$Phone = $record['Phone'];
		$Room_Name = $record['Room_Name'];
		$Purpose = $record['Purpose'];
		$Date = $record['Date'];
		$Hour_Start = $record['Hour_Start'];
		$Min_Start = $record['Min_Start'];
		$AmPm_Start = $record['AmPm_Start'];
		$Hour_End = $record['Hour_End'];
		$Min_End = $record['Min_End'];
		$AmPm_End = $record['AmPm_End'];
		$id = $record['id'];
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Reports of Booked Room</title>
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
  background-color: #8e44ad;
  color: white;
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

	<h1 style="text-align:center"> Detail Reports of Booked Room</h1>
	<nav> 
		<ul style="text-align:right">
			<a href="../index.html">
            <button class="btn"><i class="fa fa-home"></i></button>
			</a>
        </ul>
	</nav>
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
				<th>Student Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Room Name</th>
				<th>Purpose</th>
				<th>Date</th>
				<th>Start Hour</th>
				<th>Min</th>
				<th>AM/PM</th>
				<th>End Hour</th>
				<th>Min</th>
				<th>AM/PM</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['User_Id']; ?></td>
				<td><?php echo $row['Name']; ?></td>
				<td><?php echo $row['Email']; ?></td>
				<td><?php echo $row['Phone']; ?></td>
				<td><?php echo $row['Room_Name']; ?></td>
				<td><?php echo $row['Purpose']; ?></td>
				<td><?php echo $row['Date']; ?></td>
				<td><?php echo $row['Hour_Start']; ?></td>
				<td><?php echo $row['Min_Start']; ?></td>
				<td><?php echo $row['AmPm_Start']; ?></td>
				<td><?php echo $row['Hour_End']; ?></td>
				<td><?php echo $row['Min_End']; ?></td>
				<td><?php echo $row['AmPm_End']; ?></td>
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
			<label>Id</label>
			<input type="text" name="User_Id" value="<?php echo $User_Id; ?>">
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="Name" value="<?php echo $Name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="Email" value="<?php echo $Email; ?>">
		</div>
		<div class="input-group">
			<label>Phone No</label>
			<input type="text" name="Phone" value="<?php echo $Phone; ?>">
		</div>
		<div class="input-group">
			<label>Room Name</label>
			<input type="text" name="Room_Name" value="<?php echo $Room_Name; ?>">
		</div>
		<div class="input-group">
			<label>Purpose</label>
			<input type="text" name="Purpose" value="<?php echo $Purpose; ?>">
		</div>
		<div class="input-group">
			<label>Date</label>
			<input type="text" name="Date" value="<?php echo $Date; ?>">
		</div>
		<div class="input-group">
			<label>Hour Start</label>
			<input type="text" name="Hour_Start" value="<?php echo $Hour_Start; ?>">
		</div>
		<div class="input-group">
			<label>Min</label>
			<input type="text" name="Min_Start" value="<?php echo $Min_Start; ?>">
		</div>
		<div class="input-group">
			<label>Am/Pm</label>
			<input type="text" name="AmPm_Start" value="<?php echo $AmPm_Start; ?>">
		</div>
		<div class="input-group">
			<label>Hour End</label>
			<input type="text" name="Hour_End" value="<?php echo $Hour_End; ?>">
		</div>
		<div class="input-group">
			<label>Min</label>
			<input type="text" name="Min_End" value="<?php echo $Min_End; ?>">
		</div>
		<div class="input-group">
			<label>Am/Pm</label>
			<input type="text" name="AmPm_End" value="<?php echo $AmPm_End; ?>">
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