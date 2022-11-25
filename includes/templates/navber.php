
<div class="upper-bar">
		<div class="container">
			<?php 
				if (isset($_SESSION['user'])) { ?>

				<img class="my-image img-thumbnail img-circle" src="man.png" alt="" />
				<div class="btn-group my-info">
					<span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $sessionUser ?>
						<span class="caret"></span>
					</span>
					<ul class="dropdown-menu">
						<li><a href="profile.php">My Profile</a></li>
						<li><a href="newfile.php">New Item</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>

				<?php

				} else {
			?>
			
				    <a href="" class="nav-link" data-toggle="modal" data-target="#Modal_login" aria-hidden="true">
					<span class="pull-right">Login/Signup</span>
				</a>
				
		
			<?php } ?>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand nav_name" href="#">
          <span>Elite</span><span>Corp</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>

			<?php if (isset($_SESSION['user'])) { ?>
			<li class="nav-item">
              <a class="nav-link" href="categories.php">My Items</a>
            </li>
			<?php }?>

            <li class="nav-item active">
               
              <a class="nav-link" href="login.php">About <span class="sr-only">(current)</span></a>
            </li>
			<?php if (isset($_SESSION['user'])) { ?>
				<li class="nav-item ">
                <a class="nav-link" href="newfile.php">Upload </a>
            </li>
			<?php }?>
			<?php if (isset($_SESSION['user'])) { ?>
				<li class="nav-item ">
                <a class="nav-link" href="detail.php">chat </a>
            </li>
			<?php }?>


            
          </ul>
        </div>
      </div>
    </nav>


	<div class="modal fade" id="Modal_login" role="dialog">
        <div class="modal-dialog mode-dialogL" style=" margin: 100px auto; background: #eae9ec; border-radius: 15px;" >
                                    
	
		<div class="container login-page">
	<h1 class="text-center">
		<span class="selected" data-class="login">Login</span> | 
		<span data-class="signup">Signup</span>
	</h1>
	<!-- Start Login Form -->
	<form class="login" action="login.php" method="POST">
		<div class="input-container">
			<input 
				class="form-control" 
				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type your username" 
				required />
		</div>
		<div class="input-container">
			<input 
				class="form-control" 
				type="password" 
				name="password" 
				autocomplete="new-password"
				placeholder="Type your password" 
				required />
		</div>
		<input class="btn btn-primary btn-block" name="login" type="submit" value="Login" />
	</form>
	<!-- End Login Form -->
	<!-- Start Signup Form -->
	<form class="signup" action="login.php" method="POST">
		<div class="input-container">
			<input 
				pattern=".{4,}"
				title="Username Must Be Between 4 Chars"
				class="form-control" 
				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type your username" 
				required />
		</div>
		<div class="input-container">
			<input 
				minlength="4"
				class="form-control" 
				type="password" 
				name="password" 
				autocomplete="new-password"
				placeholder="Type a Complex password" 
				required />
		</div>
		<div class="input-container">
			<input 
				minlength="4"
				class="form-control" 
				type="password" 
				name="password2" 
				autocomplete="new-password"
				placeholder="Type a password again" 
				required />
		</div>
		<div class="input-container">
			<input 
				class="form-control" 
				type="email" 
				name="email" 
				placeholder="Type a Valid email" />
		</div>
		<input class="btn btn-success btn-block" name="signup" type="submit" value="Signup" />
	</form>
	<!-- End Signup Form -->
	<div class="the-errors text-center">
		<?php 

			if (!empty($formErrors)) {

				foreach ($formErrors as $error) {

					echo '<div class="msg error">' . $error . '</div>';

				}

			}

			if (isset($succesMsg)) {

				echo '<div class="msg success">' . $succesMsg . '</div>';

			}

		?>
	</div>
</div>
            </div>
          </div>