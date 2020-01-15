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
                <h3 class="title">FAQ'S</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">FAQ'S</li>
                </ol>
            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                <form action="paper_chuli.php" method="POST">
                    <div class="faq-card card">
                        <?php 
                            $sql="select now from showupper";
                            $stat=mysqli_query($conn,$sql);
                            $res=mysqli_fetch_assoc($stat);
                            $now=$res['now'];
                            $sql="select pbnum,pbtype,pbword from paper where num='$now'";
                            $stat=mysqli_query($conn,$sql);
                            $cnt=0;
                            while($row=mysqli_fetch_array($stat))
                            {
                                $pb=$row['pbword'];
                                $pnum=$row['pbnum'];
                                $ptype=$row['pbtype'];
                        ?>
                        <div class="card-header">
                            <h6>Q. <?php 
                                echo "$pb";
                             ?></h6>
                        </div>
                        
                        <div class="card-body">
                            <?php 
                                if($ptype=="text")
                                {
                                    echo "<input type='text' name='p$pnum' placeholder='Write down your answer'>";
                                }
                                else if ($ptype=="radio")
                                {
                                    $sql1="select pword from answer where num='$now' and pbnum='$pnum'";
                                    $stat1=mysqli_query($conn,$sql1);
                                    while($res=mysqli_fetch_array($stat1))
                                    {
                                        $ans=$res['pword'];
                                        echo "<div class='custom-control custom-$ptype mb-1'>";
                                        echo "<input name=p$pnum type='$ptype' class='custom-control-input' value='$ans' " ;
                                        echo " id='jobtype$cnt'>";
                                        echo "<label class='custom-control-label' for='jobtype$cnt'>$ans</label>
                                        </div>";
                                        $cnt++;
                                    }
                                }
                                else 
                                {
                                    $sql1="select pword from answer where num='$now' and pbnum='$pnum'";
                                    $stat1=mysqli_query($conn,$sql1);
                                    while($res=mysqli_fetch_array($stat1))
                                    {
                                        $ans=$res['pword'];
                                        $ww=$pnum.'[]';
                                        echo "<div class='custom-control custom-check mb-1'>";
                                        echo "<input name=p$ww type='checkbox' class='custom-control-input' value='$ans' " ;
                                        echo " id='jobtype$cnt'>";
                                        echo "<label class='custom-control-label' for='jobtype$cnt'>$ans</label>
                                        </div>";
                                        $cnt++;
                                    }
                                }
                            ?>
                        </div>
                            <?php } ?>
                    </div>
                    <center>
                        <div class="col-12 mb-3"><input class="btn btn-primary px-5" type="submit" value="Submit"></div>
                    </center>
                </form>
                    

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