<?php require_once("../server/connect.php"); ?>
<?php include_once("../session.php"); ?>
<?php include_once("library.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leakers</title>
	<?php include_once("bootstrap.php"); ?>
</head>

<body class="dashboard_background">
	<?php include_once("menubar.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<table class='table table-bordered bg-white my-5'>
					<thead>
						<tr>
							<th>Sr No</th>
							<th>File Details</th>
							<th>Leaker</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM data_files ORDER BY id DESC";
						$result = mysqli_query($conn, $sql);
						if ($result) {
							if (mysqli_num_rows($result) > 0) {
								$n = 0;
								while ($rows = mysqli_fetch_array($result)) {
									$n++;
									$id = $rows['id'];
									$userid = $rows['sender_id'] - 1;
									$subject = $rows['subject'];
									$fileid = $rows['file_name'];
									$secretkey = $rows['secret_key'];
									$file_detail = getfiledetail($fileid);

									$sql1 = "SELECT * FROM users where id='$userid'";
									$result1 = mysqli_query($conn, $sql1);
									if ($result) {
										$user = $rows['id'];
									}
						?>
									<tr>
										<?php $u = "user";
										$y = $u . " " . $userid; ?>
										<td><?= $n ?></td>
										<td><?= $fileid ?></td>
										<td>
											<?= $y ?></td>
										</td>
									</tr>
						<?php }
							}
						} ?>

					</tbody>
				</table>

			</div>
			<!-- col -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>

</html>