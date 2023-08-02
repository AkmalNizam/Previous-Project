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
	<title>Approval Page</title>
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
	<h1 style="text-align:center">ONLINE CLASS BOOKING SUMMARY REPORT</h1>
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
				<th>No.</th>
				<th>Student Name</th>
                <th>ID NO.</th>
				<th>Class Name</th>
				<th>Date Use</th>
				<th colspan="2">Approval</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<tr>
                    <td>1</td>
                    <td>FIRDAUS NASRI</td>
                    <td>2018111111</td>
                    <td>B10</td>
                    <td>10/4/2020</td>
					<td>
						<a class="edit_btn">Yes</a>
					</td>
					<td>
						<a class="del_btn">No</a>
					</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>AKMAL NIZAM </td>
                    <td>2018000000</td>
                    <td>B13</td>
                    <td>10/3/2020</td>
					<td>
						<a class="edit_btn">Yes</a>
					</td>
					<td>
						<a class="del_btn">No</a>
					</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>FIRDAUS AZHAR</td>
                    <td>2018999999</td>
                    <td>B12</td>
                    <td>10/5/2020</td>
					<td>
						<a class="edit_btn">Yes</a>
					</td>
					<td>
						<a class="del_btn">No</a>
					</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>HAZIQ AIMAN</td>
                    <td>2018222222</td>
                    <td>B08</td>
                    <td>3/5/2020</td>
					<td>
						<a class="edit_btn">Yes</a>
					</td>
					<td>
						<a class="del_btn">No</a>
					</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>ANAS</td>
                    <td>2018777777</td>
                    <td>B09</td>
                    <td>20/4/2020</td>
					<td>
						<a class="edit_btn">Yes</a>
					</td>
					<td>
						<a class="del_btn">No</a>
					</td>
                </tr>
			</tr>

		</tbody>
	</table>
</body>
</html>