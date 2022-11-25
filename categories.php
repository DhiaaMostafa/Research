<?php
	ob_start();
	session_start();
	$pageTitle = 'Items';
	include 'init.php';
	if (isset($_SESSION['user'])) {
		$getUser = $con->prepare("SELECT * FROM users WHERE Username = ?");
		$getUser->execute(array($sessionUser));
		$info = $getUser->fetch();
		$userid = $info['UserID'];
?>
	<div class="container">
		<div class="panel-body">
			<?php
				$myItems = getAllFrom("*", "uploads", "where user_id = $userid", "", "file_id");
				if (! empty($myItems)) {
					echo '<div class="row">';
					foreach ($myItems as $item) {
						echo '<div class="col-sm-6 col-md-3">';
							echo '<div class="thumbnail item-box">';
								if ($item['Approve'] == 1) { 
									echo '<span class="approve-status">Exept</span>'; 
								}else{
									echo '<span class="approve-status">wait </span>'; 
								}
								
								if ($item['complet'] == 1) { 
									echo '<span class="price-tag">complet</span>';
								}
								
								echo '<img class="img-responsive" src="img.png" alt="" />';
								echo '<div class="caption">';
									echo '<h3><a href="items.php?itemid='.$item['file_id'].'">' . $item['file_name'] .'</a></h3>';
									echo '<br>';
									echo '<div class="date">' . $item['file_uploaded_on'] . '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				} else {
					echo 'Sorry There\' No Ads To Show, Create <a href="newad.php">New Ad</a>';
				}
			?>
			
		</div>
	</div>

<?php
	} else {
		echo '<div class="container">';
			echo '<div class="alert alert-danger">There\'s no Such ID Or This Item Is Waiting Approval</div>';
		echo '</div>';
	}
	include $tpl . 'footer.php';
	ob_end_flush();
?>