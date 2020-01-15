<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'phpserver');
session_start();
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
                <h3 class="title"><?php $cname = $_GET['cname']; echo "$cname"; ?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="company-list.php">Companies</a></li>
                    <li class="breadcrumb-item active"><?php echo "$cname"; ?></li>
                </ol>
            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">

                <div class="col-lg-8 col-12 mb-5 pr-lg-5">

                    
                    <div class="company-details">
                        <h5 class="mb-3">About <?php echo "$cname"; ?></h5>
                        <p>
                            <?php
                                $loc=$_GET['loc'];
                                $sql="select categories,founded,teamsize,website,word from companyinfo where cname='$cname' and location='$loc'";
                                $stat=mysqli_query($conn,$sql);
                                $res=mysqli_fetch_assoc($stat);
                                $word = $res['word'];
                                echo "$word";
                                
                            ?>
                        </p>
                        <ul>
                            <?php
                                $sql1="select word from companydesc where cname='$cname' and location='$loc'";
                                $stat1=mysqli_query($conn,$sql1);
                                while($row=mysqli_fetch_array($stat1))
                                {
                            ?>
                            <li><?php $now = $row['word']; echo "$now"; ?></li>
                                <?php }?>
                        </ul>
                    </div>
                    

                    
                    <div class="job-list-wrap mt-5">

                    <?php 
                            $sql3="select salary,jobtype,jobname from companyjobinfo where company='$cname'";
                            $res3=mysqli_query($conn,$sql3);
                            while($row=mysqli_fetch_array($res3)){
                            $job=$row['jobname'];
                        ?>
                        <a href="job-single.php?job=<?php echo "$job" ?>&&com=<?php echo "$cname" ?>" class="job-list">
                            <div class="salary-type col-auto order-sm-3">
                                <span class="salary-range"><?php $sal=$row['salary'];echo "$sal"; ?></span>
                                <span class="badge badge-success"><?php $sal=$row['jobtype'];echo "$sal"; ?></span>
                            </div>
                            
                            <div class="content col">
                                <h6 class="title"><?php $sal=$row['jobname'];echo "$sal"; ?></h6>
                                <ul class="meta">
                                    <li><strong class="text-primary"><?php echo "$cname"; ?></strong></li>
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
                                <div class="sidebar-company">
                                    <h6 class="title"><?php echo "$cname"; ?></h6>
                                    <ul>
                                        <li><strong>Categories:</strong> <?php $cate=$res['categories']; echo "$cate"; ?></li>
                                        <li><strong>Founded:</strong> <?php $cate=$res['founded']; echo "$cate"; ?></li>
                                        <li><strong>Team Size:</strong><?php $cate=$res['teamsize']; echo "$cate"; ?></li>
                                        <li><strong>Job Open:</strong><?php 
                                        $sql2="select count(jobname) as cnt from companyjobinfo where company='$cname'";
                                        $res2=mysqli_query($conn,$sql2);
                                        $row2=mysqli_fetch_assoc($res2);
                                        $ans2=$row2['cnt'];
                                        echo "$ans2";
                                        ?> </li>
                                        <li><strong>Website:</strong> <a href="<?php $cate=$res['website']; echo"$cate"; ?>"><?php  echo "$cate"; ?></a></li>
                                        <li><strong>Location:</strong> <?php echo "$loc"; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                

            </div>
        </div>
    </div>
    

<div class="section section-padding bg-parallax" data-bg-image="assets/images/bg/bg-2.jpg" data-overlay="65">
        <div class="container">

            
            <div class="testimonial-slider row">

                
                <?php
                
                $sql="select name,title,word from board";
                $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($res))
                {
                ?>

                <div class="col">
                    <div class="testimonial text-center text-white">
                        <p><?php $word = $row['word']; echo "$word" ?></p>
                        <h6 class="name"><?php $name = $row['name']; echo "$name" ?></h6>
                        <span class="title"><?php $title = $row['title']; echo "$title" ?></span>
                    </div>
                </div>
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