<?php include('server.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$address = $record['address'];
		$id = $record['id'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>How to create, update, delete using PHP and Mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['msg']; 
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Email</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td> <?php echo $row['name']; ?> </td>
					<td> <?php echo $row['address']; ?> </td>
					<td> <?php echo $row['email']?> </td>
					<td>
						<a class="edit_btn" href="index.php?edit=<?php echo $row['id'] ?>">Edit</a>
					</td>
					<td>
						<a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
			
		</tbody>
	</table>

	<form method="post" action="server.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<?php if ($edit_state == false): ?>
				<button class="btn" type="submit" name="save" style="background: #556B2F;" >Save</button>
			<?php else: ?>
				<button class="btn" type="submit" name="update" >Update</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>