<?php
	ob_start();
	session_start();
	$pageTitle = 'Create File';
	include 'init.php';
	if (isset($_SESSION['user'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$comment 	= filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
			$userid 	= $_SESSION['uid'];

			if (! empty($comment)) {

				$stmt = $con->prepare("INSERT INTO 
					comments(comment, status, comment_date, user_id)
					VALUES(:zcomment, 0, NOW(),  :zuserid)");

				$stmt->execute(array(

					'zcomment' => $comment,			
					'zuserid' => $userid
				));

				if ($stmt) {

				//	echo '<div class="alert alert-success">Comment Added</div>';

				}

			} else {

			//	echo '<div class="alert alert-danger">You Must Add Comment</div>';

			}

		}

?>
<h1 class="text-center"><?php echo $pageTitle ?></h1>
<div class="create-ad block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $pageTitle ?></div>
			<div class="panel-body">
<?php


		$stmt = $con->prepare("SELECT * 
							FROM 
							comments
							WHERE 
							user_id = ?
							ORDER BY 
							c_id DESC");

		$stmt->execute(array( $_SESSION['uid']));					

// Execute The Statement

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable 

			$comments = $stmt->fetchAll();

			if (! empty($comments)) {
				
				foreach($comments as $comment) {
					echo "<div class='mesage'>";
					echo "<p class='user-msg'>".$_SESSION['Username']."  ".$comment['comment_date']."</p>";
					echo "<p class='com-msg'>".$comment['comment']."</p>";
					echo "</div>";
				}
			} ?>
			</div>
			<div class="panel-footer">
			    <form class="form-horizontal main-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				 <!-- Start Name Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-11 col-md-11">
							<input 
								pattern=".{4,}"
								title="This Field Require At Least 4 Characters"
								type="text" 
								name="comment" 
								class="form-control live"  
								placeholder="Name of The Item"
								 />
						</div>
						<input  type="submit" class="col-sm-1  form-control btn btn-primaryl" value="send">
					</div>	
			    </form>
		
			</div>
		</div>
	</div>
</div>
<?php
	} else {
		header('Location: login.php');
		exit();
	}
	include $tpl . 'footer.php';
	ob_end_flush();
?>