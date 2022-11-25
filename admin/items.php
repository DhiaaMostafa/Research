<?php

	/*
	================================================
	== Items Page
	================================================
	*/

	ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'Items';

	if (isset($_SESSION['Username'])) {

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		if ($do == 'Manage') {


			$stmt = $con->prepare("SELECT *
									FROM 
									uploads 
									ORDER BY 
									  file_id DESC");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable 

			$items = $stmt->fetchAll();

			if (! empty($items)) {

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
			<div class="card-header">
		
			file
		
            </div>
			<div class="card-body">
				<table class="table datatable">
					<thead>
						<tr>
							<th scope="col">Item Name</th>
							<th scope="col">Description</th>
							<th scope="col">price</th>
							<th scope="col">Stutes</th>
							<th scope="col">loads</th>
							<th scope="col">Control</th>
						</tr>
					</thead>
					<tbody>
				
						<?php
							foreach($items as $item) {
								echo "<tr>";
									echo "<th scope='row'>" . $item['file_name'] . "</th>";
									echo "<td>" . $item['file_description'] . "</td>";
									echo "<td>" . $item['price'] ."</td>";
									echo "<td>";
									if($item['Approve']==0){
										echo "<span class='badge bg-warning'>Approved</span>";
									}else{
										echo "<span class='badge bg-success'>Exept</span>";
									}
									if($item['complet']==0){
										echo "<span class='badge bg-danger'>wait</span>";
									}else{
										echo "<span class='badge bg-primary'>Complet</span>";
									}
									
									echo "<td>	
										<a href='items.php?do=loads&itemid=" . $item['file_id'] . "&userid=" . $item['user_id'] . "' class='btn btn-primary'><i class='bi bi-collection'></i> Loads</a>";
									echo "</td>";
									echo "<td>";
								  echo'	<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li><a class="dropdown-item" href="items.php?do=Edit&itemid=' . $item['file_id'] . '" > Edit</a></li>
											<li><a class="dropdown-item" href="allfiles/'.$item['file'].'" >Veiw </a></li>
											<li><a class="dropdown-item" href="items.php?do=Delete&itemid=' . $item['file_id'] . '">Delete</a></li>
										</ul>
										</div>';
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
					echo '<div class="nice-message">There\'s No Items To Show</div>';
					echo '<a href="items.php?do=Add" class="btn btn-sm btn-primary">
							<i class="fa fa-plus"></i> New Item
						</a>';
				echo '</div>';

			} ?>

		<?php 

		}  elseif ($do == 'Edit') {

			// Check If Get Request item Is Numeric & Get Its Integer Value

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM uploads WHERE file_id = ?");

			// Execute Query

			$stmt->execute(array($itemid));

			// Fetch The Data

			$item = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>
        <main id="main" class="main">
        <div class="container">
		  <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item['file_name'] ?></h5>

              <!-- Horizontal Form -->
              <form action="?do=Update" method="POST">
			  <input type="hidden" name="itemid" value="<?php echo $itemid ?>" />
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input 
					   type="text" 
					   name="price"  
					   class="form-control" 
					   id="inputText" 
					>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->
            </div>
          </div>
		 </div>			
	    </main>		

			<?php

			// If There's No Such ID Show Error Message

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg);

				echo "</div>";

			}			

		} elseif ($do == 'Update') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Get Variables From The Form
				$id 		= $_POST['itemid'];
				$price 		= $_POST['price'];
				// Validate The Form

				$formErrors = array();

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}

			

				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}
				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {
					
					$stmt = $con->prepare("UPDATE uploads SET price =?,Approve=1 WHERE file_id = ?");

					$stmt->execute(array($price, $id));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		}elseif ($do == 'upload') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				echo "<h1 class='text-center'>Update Item</h1>";
				$fileid = $_POST['fileid'];
				$userid = $_POST['userid'];
				$file_title = $_POST['name'];
				$file_description = $_POST['Description'];
				$file_uploader = $_SESSION['user'];
				$file= $_FILES["file"]["name"];
			    $ext = pathinfo($file, PATHINFO_EXTENSION);
			    $validExt = array ('pdf', 'txt', 'doc', 'docx', 'ppt' , 'zip');
			 if (empty($file)) {
			echo "<script>alert('Attach a file');</script>";
			 }
			 else if ($_FILES['file']['size'] <= 0 || $_FILES['file']['size'] > 30720000 )
			 {
		 echo "<script>alert('file size is not proper');</script>";
			 }
			 else if (!in_array($ext, $validExt)){
				 echo "<script>alert('Not a valid file');</script>";
		 
			 } else {
				$folder  = 'allfiles/';
				$fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
				$notefile = rand(1000 , 1000000) .'.'.$fileext;
				echo "<script>alert('Not a valid file');</script>";
				if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$notefile)) {

		            $stmt = $con->prepare("INSERT INTO loads(file_name, file_description, file_type,file_uploaded_on, file,	user_id,id_file)
		
							VALUES(:zname, :zdesc, :ztype, now(), :zfile,:ziduser,:zidfile)");
		
						$stmt->execute(array(
		
							'zname' 	=> $file_title,
							'zdesc' 	=> $file_description,
							'ztype' 	=> $fileext,
							'zfile'		=> $notefile,
							'ziduser'   => $userid,
							'zidfile'   => $fileid
						));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				 }
			  }

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		} elseif ($do == 'Delete') {

			echo "<h1 class='text-center'>Delete Item</h1>";
			echo "<div class='container'>";

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('file_id', 'uploads', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM uploads WHERE file_id = :zid");

					$stmt->bindParam(":zid", $itemid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		}  elseif ($do == 'loads') {

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
				$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('file_id', 'uploads', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) { ?>
						
				<main id="main" class="main">
				  <div class="container">
				  <div class="card">
				   <div class="card-body">
					<h5 class="card-title">General Form Elements</h5>
					<!-- General Form Elements -->
					<form  action="?do=upload" method="POST" enctype="multipart/form-data">
					   <input type="hidden" name="fileid" value="<?php echo $itemid ?>" />
					   <input type="hidden" name="userid" value="<?php echo $userid ?>" />
						<div class="row mb-3">
						<label for="inputText" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name">
						</div>
						</div>
						<div class="row mb-3">
						<label for="inputText" class="col-sm-2 col-form-label">Description</label>
						 <div class="col-sm-10">
							<input type="text" class="form-control" name="Description">
						 </div>
						</div>
						
						
						<div class="row mb-3">
						<label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
						<div class="col-sm-10">
							<input class="form-control" type="file" id="formFile" name="file">
						</div>
						</div>


						

						<div class="row mb-3">
						<label class="col-sm-2 col-form-label"> Load</label>
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary"> Load file</button>
						</div>
						</div>

					</form><!-- End General Form Elements -->

					</div>
				</div>
			 </div>
		 </main>

	

			<?php	} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		}

		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output
?>