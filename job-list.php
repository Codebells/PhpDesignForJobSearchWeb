<?php
$conn=mysqli_connect('localhost','root','','phpserver');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

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
                <h3 class="title">Browse Jobs</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Jobs</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">

                <div class="col-lg-8 col-12 mb-5 pr-lg-5">

                    <div class="job-list-toolbar">
                        <p>Showing <?php 
                    $sql="select count(jobname) as cnt from companyjobinfo";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $ans=$row['cnt'];
                    echo "$ans";
                    ?> results</p>
                    </div>

                    <div class="job-list-wrap">
                        <?php 
                            $sql="select salary,jobtype,jobname,company from companyjobinfo";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($res)){
                            $job=$row['jobname'];
                            $comp=$row['company'];
                        ?>
                        <a href="job-single.php?job=<?php echo "$job" ?>&&com=<?php echo "$comp" ?>" class="job-list">
                            <div class="salary-type col-auto order-sm-3">
                                <span class="salary-range"><?php $sal=$row['salary'];echo "$sal"; ?></span>
                                <span class="badge badge-success"><?php $sal=$row['jobtype'];echo "$sal"; ?></span>
                            </div>
                            
                            <div class="content col">
                                <h6 class="title"><?php $sal=$row['jobname'];echo "$sal"; ?></h6>
                                <ul class="meta">
                                    <li><strong class="text-primary"><?php $sal=$row['company'];echo "$sal"; ?></strong></li>
                                    <li><i class="fa fa-map-marker"></i> <?php 
                                        $word="select location from company where cname='$sal'";
                                        $now=mysqli_query($conn,$word);
                                        $ans=mysqli_fetch_assoc($now);
                                        $pt=$ans['location'];
                                        echo "$pt";
                                    ?></li>
                                </ul>
                            </div>
                        </a>
                    <?php }?>
                    </div>

                </div>

                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Search Keywords</h6>
                                <form action="#">
                                    <input type="text" placeholder="e.g. web design">
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Category</h6>
                                <form action="#">
                                    <select>
                                        <option value="1">Any category</option>
                                        <option value="2">Web Designer</option>
                                        <option value="3">Web Developer</option>
                                        <option value="4">Graphic Designer</option>
                                        <option value="5">App Developer</option>
                                        <option value="6">UI &amp; UX Expert</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Location</h6>
                                <form action="#">
                                    <input type="text" placeholder="Location">
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Job Type</h6>
                                <form action="#" class="mb-n1">
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="jobtype0">
                                        <label class="custom-control-label" for="jobtype0">All type</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="jobtype1">
                                        <label class="custom-control-label" for="jobtype1">Full Time</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="jobtype2">
                                        <label class="custom-control-label" for="jobtype2">Part Time</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="jobtype3">
                                        <label class="custom-control-label" for="jobtype3">Freelance</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="jobtype4">
                                        <label class="custom-control-label" for="jobtype4">Internship</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="jobtype5">
                                        <label class="custom-control-label" for="jobtype5">Temporary</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Salary Range</h6>
                                <form action="#">
                                    <input type="text" id="salary-range" name="salary-range" class="range-slider" value="" />
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Experince</h6>
                                <form action="#" class="mb-n1">
                                    
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobExperince" id="jobExperince0">
                                        <label class="custom-control-label" for="jobExperince0">Any Experince</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobExperince" id="jobExperince1">
                                        <label class="custom-control-label" for="jobExperince1">1 Year to 2 Year</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobExperince" id="jobExperince2">
                                        <label class="custom-control-label" for="jobExperince2">2 Year to 3 Year</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobExperince" id="jobExperince3">
                                        <label class="custom-control-label" for="jobExperince3">3 Year to 4 Year</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobExperince" id="jobExperince4">
                                        <label class="custom-control-label" for="jobExperince4">4 Year to 5 Year</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Qualification</h6>
                                <form action="#" class="mb-n1">
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobQualification" id="jobQualification0">
                                        <label class="custom-control-label" for="jobQualification0">Matriculation</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobQualification" id="jobQualification1">
                                        <label class="custom-control-label" for="jobQualification1">Intermidiate</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" name="jobQualification" id="jobQualification2">
                                        <label class="custom-control-label" for="jobQualification2">Gradute</label>
                                    </div>
                                </form>
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
    <script src='https://ditu.google.cn/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>

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