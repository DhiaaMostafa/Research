<?php

	/*
	================================================
	== Manage Members Page
	== You Can Add | Edit | Delete Members From Here
	================================================
	*/

	ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'Members';

	if (isset($_SESSION['Username'])) {

		include 'init.php';

			// Select All Users Except Admin 

			$stmt = $con->prepare("SELECT * FROM users WHERE GroupID != 1 $query ORDER BY UserID DESC");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable 

			$rows = $stmt->fetchAll();

			if (! empty($rows)) {

			?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Data Tables</h1>
	 <nav>
		<ol class="breadcrumb">
		   <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item">Tables</li>
			<li class="breadcrumb-item active">Data</li>
		</ol>
	 </nav>
</div>
	  <!-- End Page Title -->
<section class="section">
  <div class="row">
	<div class="col-lg-12">

	  <div class="card">
		<div class="card-body">
			<h2 class="card-title text-center">file</25>
				
			<table class="table datatable text-center">
				<thead>
					<tr class='text-center'>
						<th scope="col">ID</th>
						<th scope="col">Username</th>
						<th scope="col">Email</th>
						<th scope="col">Full Name</th>
						<th scope="col">Registered Date</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						foreach($rows as $row) {
							echo "<tr>";
									echo "<td>" . $row['UserID'] . "</td>";
									echo "<td>" . $row['Username'] . "</td>";
									echo "<td>" . $row['Email'] . "</td>";
									echo "<td>" . $row['FullName'] . "</td>";
									echo "<td>" . $row['Date'] ."</td>";
							echo "</tr>";
						}
					?>
				  </tbody>
				</table>
			</div>
		</div>
	  </div>
  </div>
</section>
</main>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Members To Show</div>';
					echo '<a href="members.php?do=Add" class="btn btn-primary">
							<i class="fa fa-plus"></i> New Member
						</a>';
				echo '</div>';

			}  

		

		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>