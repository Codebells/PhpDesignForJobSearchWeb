<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
session_start();
$conn=mysqli_connect('localhost','root','','phpserver');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
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
                        <a href="index_manager.php"> <span style="color: white; font-size: 30px; font-weight: 600;">CodeBells</span> </a>
                    </div>
                </div>

                <div class="header-links col-auto order-lg-3">
                    <a href="#" data-toggle="modal" data-target="#loginSignupModal" data-target-sub="#login"><?php $name=$_SESSION['name']; echo $name;?></a>
                    <span>or</span>
                    <a href="index.php">LogOut</a>
                </div>

                <nav id="main-menu" class="main-menu col-lg-auto order-lg-2">
                    <ul>
                        <li class="has-children"><a href="index_manager.php">Home</a>
                        </li>
                        <li><a href="company-list_manager.php">Company</a>
                        </li>
                        <li><a href="faq_manager.php">FAQ'S</a>
                        <ul class="sub-menu">
                                <li><a href="faq_manager.php">New FAQ'S</a></li>
                                <li><a href="faq_manager_set.php">Manage FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="board.php">Board</a>
                        <ul class="sub-menu">
                                <li><a href="board.php">Set Board</a></li>
                                <li><a href="board_manage.php">Manage Board</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="slider-section section">
        <div class="slide-item-2 bg-parallax" data-bg-image="assets/images/slider/slider-1.jpg" data-overlay="50">
            <div class="container">
                <div class="slider-content-2">
                    <center><h2 class="title">Job Fair</h2></center>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Latest Jobs Not Deal</h2>
                <p>Here's the most recent job listed on the website.</p>
            </div>

            <div class="job-list-wrap"> 
                
                
                    <?php 
                    $sql="select salary,jobtype,jobname,company from jobinfo";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($res)){
                    $com=$row['company'];
                    $job=$row['jobname'];
                ?>
                <span  class="job-list">
                    <div class="salary-type col-auto order-sm-3">
                        <span class="salary-range"><?php $sal=$row['salary'];echo "$sal"; ?></span>
                        <span class="badge badge-success"><?php $sal=$row['jobtype'];echo "$sal"; ?></span>
                    </div>
                    <div class="salary-type col-auto order-sm-3">
                    <span class="badge badge-danger"><a href="job_chuli.php?job=<?php echo "$job" ?>&jtype=<?php echo "$sal" ?>&com=<?php echo "$com" ?>&act=reject">Rejection</a></span>
                    <span class="badge badge-success"><a href="job_chuli.php?job=<?php echo "$job" ?>&jtype=<?php echo "$sal" ?>&com=<?php echo "$com" ?>&act=accept">Acception</a></span>
                    </div>
                    <div class="content col" style="max-width: 75%;">
                        <h6 class="title"><?php echo "$job"; ?></h6>
                        <ul class="meta">
                            <li><strong class="text-primary"><?php echo "$com"; ?></strong></li>
                            <li><i class="fa fa-map-marker"></i> <?php 
                                $word="select location from company where cname='$com'";
                                $now=mysqli_query($conn,$word);
                                $ans=mysqli_fetch_assoc($now);
                                $pt=$ans['location'];
                                echo "$pt";
                            ?></li>
                        </ul>
                    </div>
                    
                </span>
                
                    <?php }?>
            </div>

        </div>
    </div>
    

    
    <div class="section section-padding bg-parallax" data-bg-image="assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <center> <span class="title"> <h3 style="color: white"> Already dealed job fair requirement </h3> </span></center>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Featured Companies</h2>
                <p>Here has the most job listed by those companies.</p>
            </div>
            <div class="job-list-wrap"> 
                
                <?php 
                    $sql="select salary,jobtype,jobname,company from companyjobinfo";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($res)){
                    $com=$row['company'];
                    $job=$row['jobname'];
                ?>
                <a href="job-single.php?job=<?php echo "$job" ?>&&com=<?php echo "$com" ?>" class="job-list">
                    <div class="salary-type col-auto order-sm-3">
                        <span class="salary-range"><?php $sal=$row['salary'];echo "$sal"; ?></span>
                        <span class="badge badge-success"><?php $sal=$row['jobtype'];echo "$sal"; ?></span>
                    </div>
                    <div class="content col">
                        <h6 class="title"><?php echo "$job"; ?></h6>
                        <ul class="meta">
                            <li><strong class="text-primary"><?php echo "$com"; ?></strong></li>
                            <li><i class="fa fa-map-marker"></i> <?php 
                                $word="select location from company where cname='$com'";
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