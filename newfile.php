<?php
	ob_start();
	session_start();
	$pageTitle = 'Create File';
	include 'init.php';
	if (isset($_SESSION['user'])) {

        $getUser = $con->prepare("SELECT * FROM users WHERE Username = ?");
		$getUser->execute(array($sessionUser));
		$info = $getUser->fetch();
		$userid = $info['UserID'];



	if ($_SERVER['REQUEST_METHOD'] == 'POST') {


       $file_title = $_POST['filename'];
       $file_description = $_POST['description'];
       $file_uploaded_to = $_POST['status'];
       $filePrice = $_POST['price'];
        $file_uploader = $_SESSION['user'];

    
		$file= $_FILES["file"]["name"];
    // = $_FILES['file']['tmp_name'];
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

    }
    else {
        $folder  = 'allfiles/';
        $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
        $notefile = rand(1000 , 1000000) .'.'.$fileext;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$notefile)) {
$stmt = $con->prepare("INSERT INTO uploads(file_name, file_description, file_type,file_uploaded_on,  file_uploaded_to, file, user_id,price)

					VALUES(:zname, :zdesc, :ztype,now(), :zsubject, :zfile,:zuser_id,:zprice)");

				$stmt->execute(array(

					'zname' 	=> $file_title,
					'zdesc' 	=> $file_description,
					'ztype' 	=> $fileext,
					'zsubject' 	=> $file_uploaded_to,
					'zfile'		=> $notefile,
					'zuser_id'  => $userid,
                    'zprice'    =>$filePrice

				));

           
        }
    }
  }

?>
<h1 class="text-center"><?php echo $pageTitle ?></h1>
<div class="create-ad block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $pageTitle ?></div>
			<div class="panel-body">
            <form class="form-horizontal main-form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="Admin/assets/img/profile-img.jpg" alt="Profile">
                  </div>
                </div>



                <div class="form-group form-group-lg">
                    <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">File Upload</label>
                    <div class="col-md-8 col-lg-9">
                        <input 
                            class="form-control" 
                            type="file" 
                            id="formFile"
                            name="file">
                    </div>
				</div>
                <div class="form-group form-group-lg">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">file Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input 
                       name="filename" 
                       type="text" 
                       class="form-control" 
                       id="fullName" 
                       value="Kevin Anderson">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">description</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea 
                       name="description" 
                       class="form-control" 
                       id="about" 
                       style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                  </div>
                </div>

                <div class="form-group form-group-lg">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">subject</label>
                    <div class="col-md-8 col-lg-9">
                        <select name="status" required  >
                            <option value="">...</option>
                            <option value="1">New</option>
                            <option value="2">Like New</option>
                            <option value="3">Used</option>
                            <option value="4">Very Old</option>
                        </select>
                    </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">price</label>
                  <div class="col-md-8 col-lg-9">
                    <input 
                        name="price" 
                        type="text" 
                        class="form-control" 
                        id="Job" 
                        value="Web Designer">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label"></label>
                  <div class="col-md-8 col-lg-9">
                  <button 
                      type="submit" 
                      class="btn btn-primary form-control">Save Changes</button>
                  </div>
                </div>


              
        </form>
      <!-- End Profile Edit Form -->


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