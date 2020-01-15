<?php
session_start();
?>
<?php
$conn=mysqli_connect('localhost','root','','phpserver');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

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

    <div class="slider-section section">
        <div class="slide-item-2 bg-parallax" data-bg-image="assets/images/slider/slider-1.jpg" data-overlay="50">
            <div class="container">
                <div class="slider-content-2">
                    <center><h2 class="title">Welcome <?php echo "$cname"; ?></h2></center>
                </div>
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
                                $sql="select location from company where cname='$cname' ";
                                $stat=mysqli_query($conn,$sql);
                                $ans=mysqli_fetch_assoc($stat);
                                $loc=$ans['location'];
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
                    <h5 class="mb-3">Already set these jobs</h5>
                    <?php 
                            $sql3="select salary,jobtype,jobname from companyjobinfo where company='$cname'";
                            $res3=mysqli_query($conn,$sql3);
                            while($row=mysqli_fetch_array($res3)){
                            $job=$row['jobname'];
                        ?>
                        <a href="job-edit.php?job=<?php echo "$job" ?>&&com=<?php echo "$cname" ?>" class="job-list">
                            <div class="salary-type col-auto order-sm-3">
                                <span class="salary-range"><?php $sal=$row['salary'];echo "$sal"; ?></span>
                                <span class="badge badge-success"><?php $sal=$row['jobtype'];echo "$sal"; ?></span>
                            </div>
                            <div class="content col">
                                <h6 class="title"><?php $sal=$row['jobname'];echo "$sal"; ?></h6>
                                <ul class="meta">
                                    <li><strong class="text-primary"><?php echo "$cname"; ?></strong></li>
                                    <li><i class="fa fa-map-marker"></i> <?php 
                                        $word="select location from company where cname='$cname'";
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
                    <div class="job-list-wrap mt-5">
                    <h5 class="mb-3">Already apply these jobs</h5>
                    <?php 
                            $sql3="select salary,jobtype,jobname from jobinfo where company='$cname'";
                            $res3=mysqli_query($conn,$sql3);
                            while($row=mysqli_fetch_array($res3)){
                            $job=$row['jobname'];
                        ?>
                        <a href="job-edit.php?job=<?php echo "$job" ?>&&com=<?php echo "$cname" ?>" class="job-list">
                            <div class="salary-type col-auto order-sm-3">
                                <span class="salary-range"><?php $sal=$row['salary'];echo "$sal"; ?></span>
                                <span class="badge badge-success"><?php $sal=$row['jobtype'];echo "$sal"; ?></span>
                            </div>
                            <div class="content col">
                                <h6 class="title"><?php $sal=$row['jobname'];echo "$sal"; ?></h6>
                                <ul class="meta">
                                    <li><strong class="text-primary"><?php echo "$cname"; ?></strong></li>
                                    <li><i class="fa fa-map-marker"></i> <?php 
                                        $word="select location from company where cname='$cname'";
                                        $now=mysqli_query($conn,$word);
                                        $ans=mysqli_fetch_assoc($now);
                                        $pt=$ans['location'];
                                        echo "$pt";
                                    ?></li>
                                </ul>
                            </div>
                        </a>
                
                    <?php }?>
                    <center><a href="company_apply.php" class="btn btn-primary w-100" style="max-width: 35%">Apply Another Job</a></center>
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
                            <center><a href="edit_company.php" class="btn btn-primary w-100" style="max-width: 60%">Edit Company Info</a></center>
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