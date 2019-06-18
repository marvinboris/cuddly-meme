@if(Request::is('/'))
       <!-- Main navigation -->
        <header>
          <div class="view" style="background-image: url('../img/wall/wall1.JPG'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-gradient align-items-center">
              <!-- Content -->
              <div class="container">
                  <div class="row pt-5">
                    <div class="col-md-12 offset-md-1 white-text text-center text-md-left mt-xl-5 wow fadeInLeft" data-wow-delay="0.3s">
                        <h2 class="head-title" style="color:white !important">THE HIRING PLATFORM OF THE NEW WORLD</h2>
                    </div>
                  </div>

                <!--Grid row-->
                <div class="row pt-5">
                  <!--Grid column-->
                  <div class="col-md-6 white-text offset-md-1 text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="jobseeker item-box">
                        <div class="content-inner">
                            <h3 style="color:white !important">I'm Jobseeker </h3>
                            <p  style="color:white !important">Register and get your CV professionaly exposed.</p>
                            <a href="#pricing" class="btn btn-border-filled">Get started</a>
                        </div>
                        <div class="img-thumb">
                            <i class="lni-leaf"></i>
                        </div>
			        </div>
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-md-6 col-xl-5 white-text text-center text-md-left mt-xl-5 wow fadeInRight">
                     <div class="recruiter item-box">
                        <div class="content-inner">
                            <h3  style="color:white !important">I'm Recruiter</h3>
                            <p  style="color:white !important">Browse talents and find the right one for your needs.</p>
                            <a href="#browse-workers" class="btn btn-border-filled">Browse</a>
                        </div>
                        <div class="img-thumb">
                            <i class="lni-users"></i>
                        </div>
                    </div>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
          <!-- Full Page Intro -->
        </header>
 
<style>
    .view,.mask {
  height: 100%;
}

@media (max-width: 740px) {
  header,
  .view, .mask {
    height: 600px;
  }
}
@media (min-width: 800px) and (max-width: 850px) {
  header, .mask
  .view {
    height: 600px;
  }
}

.btn .fa {
  margin-left: 3px;
}

 
.navbar:not(.top-nav-collapse) {
  background: transparent !important;
}

@media (max-width: 991px) {
  .navbar:not(.top-nav-collapse) {
    background: transparent !important;
  }
}

.btn-white {
  color: black !important;
}

h6 {
  line-height: 1.7;
}

.rgba-gradient {
  background: -moz-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
  background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
  background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.7)), to(rgba(29, 210, 177, 0.7)));
  background: -o-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
  background: linear-gradient(to 45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
}
    </style>
@endif