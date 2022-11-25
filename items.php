<?php
	ob_start();
	session_start();
	$pageTitle = 'Show Items';
	include 'init.php';

	// Check If Get Request item Is Numeric & Get Its Integer Value
	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

	// Select All Data Depend On This ID
	$stmt = $con->prepare("SELECT  * FROM uploads where file_id = ?");

	// Execute Query
	$stmt->execute(array($itemid));

	$count = $stmt->rowCount();

	if ($count > 0) {

	// Fetch The Data
	$item = $stmt->fetch();
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail center-block" src="img.png" alt="" />
		</div>
		<div class="col-md-9 item-info">
			<h2><?php echo $item['file_name'] ?></h2>
			<p><?php echo $item['file_description'] ?></p>
			<ul class="list-unstyled">
				<li>
					<i class="fa fa-calendar fa-fw"></i>
					<span>Added Date</span> : <?php echo $item['file_uploaded_on'] ?>
				</li>
				<li>
					<i class="fa fa-money fa-fw"></i>
					<span>Price</span> : <?php echo $item['price'] ?>
				</li>
				<li>
					<i class="fa fa-building fa-fw"></i>
					<span>Made In</span> : 
				</li>
				<li>
					<i class="fa fa-tags fa-fw"></i>
					<span>Category</span> : <a href="categories.php?pageid=<?php echo $item['status'] ?>"><?php echo $item['price'] ?></a>
				</li>
				<li>
					<i class="fa fa-user fa-fw"></i>
					<span>Added By</span> : <a href="#"><?php echo $item['file_uploaded_to'] ?></a>
				</li>
				
			</ul>
		</div>
	</div>
	
	<?php 
	if($item['Approve']==0){ ?>
	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">The file Download</div>
			<div class="panel-body">
			<div class="col-sm-6 col-md-3">
			  <div class="thumbnail item-box">
				<?php 	if ($item['Approve'] == 0) { 
						echo '<span class="approve-status">Waiting Approval</span>'; 
					} ?>
					<span class="price-tag">Exept </span>
					<img class="img-responsive" src="img.png" alt="" />
					<div class="caption">
					  <h3><a  href='allfiles/437056.pdf' target='_blank'class="btn btn-success btn-block " > Downlod </a></h3>
									<p style=" height: 0 px; ">more</p>
									<div class="date">2020 </div>
							
					</div>
			  </div>
		    </div>
			
			</div>
		</div>
	</div>
</div>



</div>
	<br>
<?php
  }
	} else {
		echo '<div class="container">';
			echo '<div class="alert alert-danger">There\'s no Such ID Or This Item Is Waiting Approval</div>';
		echo '</div>';
	}
	include $tpl . 'footer.php';
	ob_end_flush();
?>