<?php
	ob_start();
	session_start();
	$pageTitle = 'Homepage';
	include 'init.php';
?>





<style>
  .services{
    padding: 100px 0 60px;
  }
  .services h2 {
    font-size: 50px;
    font-weight: bold;
    margin-bottom: 20px;
}

.services p {
    line-height: 1.6;
    font-size: 20px;
    width: 80%;
    margin: 0 auto 85px;
    color: #6a6a6a;
}
  .services .icon-box {
  text-align: center;
  border: 1px solid #e2eefd;
  padding: 80px 20px;
  transition: all ease-in-out 0.3s;
  background: #fff;
}
.services .icon-box .icon {
  margin: 0 auto;
  width: 64px;
  height: 64px;
  background: #f1f6fe;
  border-radius: 4px;
  border: 1px solid #deebfd;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  transition: ease-in-out 0.3s;
}
.services .icon-box .icon i {
  color: #3b8af2;
  font-size: 28px;
  transition: ease-in-out 0.3s;
}
.services .icon-box h4 {
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 24px;
}
.services .icon-box h4 a {
  color: #222222;
  transition: ease-in-out 0.3s;
}
.services .icon-box p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}
.services .icon-box:hover {
  border-color: #fff;
  box-shadow: 0px 0 25px 0 rgba(16, 110, 234, 0.1);
}
.services .icon-box:hover h4 a, .services .icon-box:hover .icon i {
  color: #106eea;
}
.services .icon-box:hover .icon {
  border-color: #106eea;
}

  
  </style>




    <!-- Start Slider -->
    <div class="slider">
      <div id="main-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <h1>We’re an Independent <br>Design and <span>Development</span> <br>Agency.</h1>
          <div class="overlay"></div>
          <div class="carousel-item carousel-one active">
          </div>
          <div class="carousel-item carousel-two">
          </div>
          <div class="carousel-item carousel-three">
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#main-slider" data-slide-to="0" class="active"></li>
          <li data-target="#main-slider" data-slide-to="1"></li>
          <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
      </div>
    </div>
    <!-- End Slider -->
    <!-- Start Features -->
    <div class="features text-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <i class="fa fa-heart fa-2x rounded-circle"></i>
            <h3>Great Idea</h3>
            <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit,  eiusmod tempor incididunalquis nostrud exercitation</p>
          </div>
          <div class="col-sm-6 col-lg-3">
            <i class="fa fa-cogs fa-2x rounded-circle"></i>
            <h3>Quick Settings</h3>
            <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit,  eiusmod tempor incididunalquis nostrud exercitation</p>
          </div>
          <div class="col-sm-6 col-lg-3">
            <i class="fa fa-cloud fa-2x rounded-circle"></i>
            <h3>Cloud Services</h3>
            <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit,  eiusmod tempor incididunalquis nostrud exercitation</p>
          </div>
          <div class="col-sm-6 col-lg-3">
            <i class="fa fa-bookmark fa-2x rounded-circle"></i>
            <h3>Cross Dev</h3>
            <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit,  eiusmod tempor incididunalquis nostrud exercitation</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Features -->
    
    <!-- Start Overview -->
    <div class="overview text-center">
      <div class="container">
        <h2 class="h1">Company Overview</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
        <h4>Lets Start Today</h4>
        <button>View More</button>
      </div>
    </div>
    <!-- End Overview -->
   
    <!-- Start Latest Posts -->
    <div class="latest-posts">
      <div class="container">
        <h2 class="text-center">Latest Posts</h2>
        <p class="section-description text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
        <div class="row">
          <!-- Start Grid Column -->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img class="card-img-top" src="img/post01.jpg" alt="" />
              <div class="card-body">
                <h4 class="card-title">Lorem Ipsum is simply dummy text ofthe printing and</h4>
                <h6 class="card-subtitle mb-2 text-muted">March 24 2017</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
                <a href="#" class="card-link">Read More</a>
              </div>
            </div>
          </div>
          <!-- End Grid Column -->
          <!-- Start Grid Column -->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img class="card-img-top" src="img/post02.jpg" alt="" />
              <div class="card-body">
                <h4 class="card-title">Lorem Ipsum is simply dummy text ofthe printing and</h4>
                <h6 class="card-subtitle mb-2 text-muted">March 24 2017</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
                <a href="#" class="card-link">Read More</a>
              </div>
            </div>
          </div>
          <!-- End Grid Column -->
          <!-- Start Grid Column -->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img class="card-img-top" src="img/post03.jpg" alt="" />
              <div class="card-body">
                <h4 class="card-title">Lorem Ipsum is simply dummy text ofthe printing and</h4>
                <h6 class="card-subtitle mb-2 text-muted">March 24 2017</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
                <a href="#" class="card-link">Read More</a>
              </div>
            </div>
          </div>
          <!-- End Grid Column -->
        </div>
      </div>
    </div>
    <!-- End Latest Posts -->
   
    <!-- Start Pricing Table -->
    <div class="pricing-table text-center">
      <div class="container">
        <h2>Pricing Table</h2>
        <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
        <div class="row">
          <!-- Start Grid Column -->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Small Business</h4>
                <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                <p class="card-text">$99/<span>Year</span></p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                </ul>
                <a href="#" class="card-link">Read More</a>
              </div>
            </div>
          </div>
          <!-- End Grid Column -->
          <!-- Start Grid Column -->
          <div class="col-md-6 col-lg-4">
            <div class="card corporate">
              <div class="card-body">
                <h4 class="card-title">Corporate</h4>
                <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                <p class="card-text">$199/<span>Year</span></p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                </ul>
                <a href="#" class="card-link">Read More</a>
              </div>
            </div>
          </div>
          <!-- End Grid Column -->
          <!-- Start Grid Column -->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Enterprise</h4>
                <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                <p class="card-text">$299/<span>Year</span></p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                  <li class="list-group-item">Lorem Ipsum</li>
                </ul>
                <a href="#" class="card-link">Read More</a>
              </div>
            </div>
          </div>
          <!-- End Grid Column -->
        </div>
      </div>
    </div>
    <!-- End Pricing Table -->
    <section id="services" class="services text-center ">
      <div class="container" data-aos="fade-up">
        <h2>Pricing Table</h2>
        <p class="section-description">Lorem ipsum dolor sit amet,
            consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
            ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.
        </p>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-file"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Services Section -->

	
<?php
	include $tpl . 'footer.php'; 
	ob_end_flush();
?>