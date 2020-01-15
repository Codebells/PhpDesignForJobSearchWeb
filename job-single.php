<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
$conn=mysqli_connect('localhost','root','','phpserver');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon.css">

    <link rel="stylesheet" href="assets/css/plugins/slick.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header class="header">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col">
                    <div class="header-logo">
                        <a href="index.php"> <span style="color: white; font-size: 30px; font-weight: 600;">CodeBells</span> </a>
                    </div>
                </div>

                <div class="header-links col-auto order-lg-3">
                    <a href="#" data-toggle="modal" data-target="#loginSignupModal" data-target-sub="#login">Login</a>
                    <span>or</span>
                    <a href="#" data-toggle="modal" data-target="#loginSignupModal" data-target-sub="#signup">Sign up</a>
                </div>

                <nav id="main-menu" class="main-menu col-lg-auto order-lg-2">
                    <ul>
                        <li class="has-children"><a href="index.php">Home</a>
                        </li>
                        <li class="has-children"><a href="job-list.php">Jobs</a>
                        </li>
                        <li><a href="company-list.php">Company</a>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="faq.php">FAQ'S</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </nav>

            </div>

        </div>
    </header>

    <div class="loginSignupModal modal fade" id="loginSignupModal" tabindex="-1" role="dialog" aria-labelledby="loginSignupModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <ul class="loginSignupNav nav">
                        <li><a class="nav-link active" data-toggle="tab" href="#login">Login</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#signup">Sign up</a></li>
                    </ul>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login">
                            <form action="login_check.php" method="POST">
                                <div class="row mb-n3">
                                    <div class="col-12 mb-3"><input type="text" placeholder="Username" name="name"></div>
                                    <div class="col-12 mb-3"><input type="password" placeholder="Password" name="pass"></div>
                                    <div class="col-12 mb-3">
                                        <div class="row justify-content-between mb-n2">
                                            <div class="col-auto mb-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="me" id="me" value="click" class="custom-control-input">
                                                    <label class="custom-control-label" for="me">Manager</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3"><input class="btn btn-primary w-100" type="submit" value="Login" name="sub"></div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="signup">
                            <form action="signin_check.php" method="POST">
                                <div class="row mb-n3">
                                    <div class="col-12 mb-3"><input type="text" placeholder="Your Name" name="name"></div>
                                    <div class="col-12 mb-3"><input type="password" placeholder="Choose a Password" name="pass"></div>
                                    <div class="col-12 mb-3"><input type="text" placeholder="Location" name="loc"></div>
                                    <div class="col-12 mb-3"><input class="btn btn-primary w-100" type="submit" value="Sign Up" name="sub"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-heading-section section bg-parallax" data-bg-image="assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title"><?php $job =$_GET['job']; echo "$job" ; ?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="job-list.php">Jobs</a></li>
                    <li class="breadcrumb-item active"><?php $job =$_GET['job']; echo "$job" ; ?></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">
                <div class="col-lg-8 col-12 mb-5 pr-lg-5">
                    <div class="job-list-details">
                        <div class="job-details-head row mx-0">
                                <?php 
                                    $job =$_GET['job'];
                                    $comp=$_GET['com']; 
                                    $sql="select salary,jobtype,gender,experience,description from companyjobinfo where jobname='$job' and company='$comp'";
                                    $res=mysqli_query($conn,$sql);
                                    $ans=mysqli_fetch_assoc($res);
                                    $sal=$ans['salary'];
                                    $jtype=$ans['jobtype'];
                                    $gen=$ans['gender'];
                                    $jyear=$ans['experience'];
                                    $desc=$ans['description'];
                                ?>
                            <div class="salary-type col-auto order-sm-3">
                                <span class="salary-range"><?php echo "$sal"; ?></span>
                                <span class="badge badge-success"><?php echo "$jtype"; ?></span>
                            </div>
                            <div class="content col">
                                <h5 class="title"><?php  echo "$job" ; ?></h5>
                                <ul class="meta">
                                    <?php 
                                        $sql="select location from company where cname='$comp'"; 
                                        $res=mysqli_query($conn,$sql);
                                        $ans=mysqli_fetch_assoc($res);
                                        $loc=$ans['location'];
                                    ?>
                                    <li><strong class="text-primary"><a href="company-single.php?cname=<?php echo "$comp"; ?>&&loc=<?php echo "$loc"; ?>"><?php echo "$comp" ;?></a></strong></li>
                                    <li><i class="fa fa-map-marker"></i> <?php echo "$loc"; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="job-details-body">
                            <h6 class="mb-3">Job Description</h6>
                            <p>
                                <?php echo "$desc"; ?>
                            </p>
                            <h6 class="mb-3 mt-4">Responsibilities</h6>
                            <ul>
                                <?php
                                 $sql="select word from responsable where jobname='$job' and company='$comp'";
                                 $res=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($res))
                                 {
                                     $word=$row['word'];
                                ?>
                                <li><?php echo "$word"; ?></li>
                                 <?php } ?>
                            </ul>
                            <h6 class="mb-3 mt-4">Education + Experience</h6>
                            <ul>
                            <?php
                                 $sql="select word from required where jobname='$job' and company='$comp'";
                                 $res=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($res))
                                 {
                                     $word=$row['word'];
                                ?>
                                <li><?php echo "$word"; ?></li>
                                 <?php } ?>
                            </ul>
                            <h6 class="mb-3 mt-4">Benefits</h6>
                            <ul>
                            <?php
                                 $sql="select word from benefit where jobname='$job' and company='$comp'";
                                 $res=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($res))
                                 {
                                     $word=$row['word'];
                                ?>
                                <li><?php echo "$word"; ?></li>
                                 <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget">
                            <div class="inner">
                                <div class="row m-n2">
                                    <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                                        <a href="like_job.php" class="d-block btn btn-outline-secondary"><i class="fa fa-heart-o mr-1"></i>Like Job</a>
                                    </div>
                                    <div class="col-xl-auto col-lg-12 col-sm-auto col-12 p-2">
                                        <a href="job_apply.php?job=<?php echo "$job" ?>&&com=<?php echo "$comp" ?>" class="d-block btn btn-primary">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Job Overview</h6>
                                <ul class="job-overview list-unstyled">
                                    <li><strong>Employment Status:</strong><?php  echo "$jtype"; ?> </li>
                                    <li><strong>Experience:</strong> <?php  echo "$jyear"; ?></li>
                                    <li><strong>Job Location:</strong> <?php  echo "$loc"; ?></li>
                                    <li><strong>Salary:</strong> <?php  echo "$sal"; ?></li>
                                    <li><strong>Gender:</strong> <?php  echo "$gen"; ?></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <p class="footer-copyright text-center">Copyright &copy; 2019.12.16 StudentJobFound Created by Codebells.</p>
                </div>

            </div>
        </div>
    </div>
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="assets/js/plugins/jquery.counterup.min.js"></script>
    <script src="assets/js/plugins/jquery.parallax.js"></script>
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="assets/js/plugins/jquery.scrollUp.min.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>