<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'phpserver');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header class="header">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col">
                    <div class="header-logo">
                        <a href="index_manager.php"> <span style="color: white; font-size: 30px; font-weight: 600;">CodeBells</span> </a>
                    </div>
                </div>

                <div class="header-links col-auto order-lg-3">
                    <a href="#" data-toggle="modal" data-target="#loginSignupModal" data-target-sub="#login"><?php $cname=$_SESSION['name']; echo $cname;?></a>
                    <span>or</span>
                    <a href="index.php">LogOut</a>
                </div>

                <nav id="main-menu" class="main-menu col-lg-auto order-lg-2">
                    <ul>
                        <li class="has-children"><a href="index_company.php">Home</a>
                        </li>
                        <li><a href="edit_company.php">Edit Com</a>
                        </li>
                        <li><a href="company_apply.php">Set Job</a>
                            <ul class="sub-menu">
                                <li><a href="company_apply.php">Set Job</a></li>
                                <li><a href="show_resume.php">Show resume</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="page-heading-section section bg-parallax" data-bg-image="assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title">All Resume </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index_company.php">Home</a></li>
                    <li class="breadcrumb-item active">Resume</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Contact Section Start -->
    <div class="section section-padding">
        <div class="container">
        <div class="job-list-wrap"> 
                <!-- Job List Start -->
                <?php
                $sql="select username,phone, jobname,prefertype,expectmoney,gender,education from userapply where company='$cname'";
                $stat=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($stat))
                {
                    $bname=$row['username'];
                    $title=$row['jobname'];
                    $word=$row['phone'];
                ?>
                <a class="job-list">
                            <div class="salary-type col-auto order-sm-3">
                                <span class="salary-range"><?php $sal=$row['expectmoney'];echo "expect:$sal"; ?></span>
                                prefertype:<span class="badge badge-warning"><?php $sal=$row['prefertype'];echo "$sal"; ?></span>
                            </div>
                            <div class="content col">
                                <h6 class="title"><?php $sal=$row['jobname'];echo "$sal"; ?></h6>
                                <ul class="meta">
                                    <li><strong class="text-primary"><?php echo "$bname"; ?></strong></li>
                                    <li><?php 
                                        $sal=$row['gender'];echo "$sal education:";
                                        $sal=$row['education'];echo "$sal phone:";
                                        $sal=$row['phone'];echo "$sal";
                                    ?></li>
                                </ul>
                            </div>
                        </a>
                <?php } ?>
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