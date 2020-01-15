<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
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

    <div class="slider-section section">
        <div class="slide-item-2 bg-parallax" data-bg-image="assets/images/slider/slider-1.jpg" data-overlay="50">
            <div class="container">
                <div class="slider-content-2 text-left">
                    <h2 class="title">Find Your Next Job</h2>
                    <p>More then <span><?php 
                    $sql="select count(jobname) as cnt from companyjobinfo";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $ans=$row['cnt'];
                    echo "$ans";
                    ?></span> job listed here.</p>
                </div>

                
                <div class="job-search-form-2">
                    <form action="#">
                        <div class="row no-gutters mb-n2 mb-sm-n0">

                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-2 mb-sm-0">
                                <input type="text" placeholder="e.g. web design">
                            </div>

                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-2 mb-sm-0">
                                <input type="text" placeholder="Location">
                            </div>

                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-2 mb-sm-0">
                                <select>
                                    <option value="1">Any category</option>
                                    <option value="2">Web Designer</option>
                                    <option value="3">Web Developer</option>
                                    <option value="4">Graphic Designer</option>
                                    <option value="5">App Developer</option>
                                    <option value="6">UI &amp; UX Expert</option>
                                </select>
                            </div>

                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-2 mb-sm-0">
                                <button class="btn btn-primary">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>

    
    <div class="section section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Latest Jobs</h2>
                <p>Here's the most recent job listed on the website.</p>
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
            

            <div class="text-center mt-4 mt-lg-5">
                <a href="job-list.php" class="btn btn-primary">View All Jobs</a>
            </div>

        </div>
    </div>
    

    
    <div class="section section-padding bg-parallax" data-bg-image="assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="funfact-wrap row">

                
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter"><?php 
                    $sql="select count(jobname) as cnt from companyjobinfo";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $ans=$row['cnt'];
                    echo "$ans";
                    ?></span>
                    <span class="title">Job Post</span>
                </div>
                

                
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter"><?php 
                    $sql="select (select count(cname) from company)+(select count(mname) from manager) as cnt;";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $ans=$row['cnt'];
                    echo "$ans";
                    ?></span>
                    <span class="title">Members</span>
                </div>
                

                
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter"><?php 
                    $sql="select count(*) as cnt from userapply";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $ans=$row['cnt'];
                    echo "$ans";
                    ?></span>
                    <span class="title">Resume</span>
                </div>
                

                
                <div class="funfact col-md-3 col-sm-6 col-12">
                    <span class="counter"><?php 
                    $sql="select count(cname) as cnt from company";
                    $res=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $ans=$row['cnt'];
                    echo "$ans";
                    ?></span>
                    <span class="title">Company</span>
                </div>
                

            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Featured Companies</h2>
                <p>Here has the most job listed by those companies.</p>
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