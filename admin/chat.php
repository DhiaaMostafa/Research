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
    $user = isset($_GET['user']) && is_numeric($_GET['user']) ? intval($_GET['user']) : 0;

    	$stmt = $con->prepare("SELECT  Username  FROM users WHERE UserID = ? ");

			$stmt->execute(array($user));

			$get = $stmt->fetch();




    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$comment 	= filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
			$userid 	= $user;

			if (! empty($comment)) {

				$stmt = $con->prepare("INSERT INTO 
					comments(comment, status, comment_date, user_id)
					VALUES(:zcomment, 1, NOW(),  :zuserid)");

				$stmt->execute(array(

					'zcomment' => $comment,			
					'zuserid' => $userid
				));

				if ($stmt) {

      
          echo '<main id="main" class="main"> ';
          $theMsg = '<div class="alert alert-success">Comment Added</div>';
          redirectHome($theMsg,'back');
          echo "</div>";

				}

			} else {

        echo '<main id="main" class="main"> ';
          $theMsg = '<div class="alert alert-danger">You Must Add Comment</div>';
          redirectHome($theMsg,'back');
          echo "</div>";
			}

		}





  ?>




    <main id="main" class="main"> 
      <div class="container">
         <!-- Card with header and footer -->
         <div class="card ">
            <div class="card-header ">
               <div class="row">
                  <img src="assets/img/messages-3.jpg" alt="" style="width: 75px;" class="rounded-circle">
                    <div class='col-sm-11 '>
                      <h4><?php echo $_SESSION['Username'];?></h4>
                      <p>8 hrs. ago</p>
                    </div>
               </div>
            </div>
            <div class="card-body body-msg scroll">
             <?php 
             $stmt = $con->prepare("SELECT * FROM   comments where 	user_id =? ");
              $stmt->execute(array($user));
              $comments = $stmt->fetchAll();
               if (! empty($comments)) { 
                $stmt = $con->prepare("UPDATE comments SET watch = 1 WHERE 	user_id = ?");
                $stmt->execute(array($user));
                
                 foreach($comments as $comment) {
                   echo "<div class='mesage'>";
                   if($comment['status']==0)
                   echo "<p class='user-msg'>".  $get['Username']."  ".$comment['comment_date']."</p>";
                   else
                   echo "<p class='user-msg'>System   ".$comment['comment_date']."</p>";
                   echo "<p class='com-msg'>".$comment['comment']."</p>";
                   echo "</div>";
                 }
               }
             ?>
            </div>
            <div class="card-footer">
            <form action= <?php echo "?user=".$user; ?> method="POST">
               <div class="input-group mb-3">
                    <input type="text" name="comment" autofocus  class="form-control" placeholder="write your message" >
                    <input type="submit" class="input-group-text" id="basic-addon1"/>
                </div>
              </form>
            </div>
          </div>
          <!-- End Card with header and footer -->
      </div>
    </main>
        <?php
		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>