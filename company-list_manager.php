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
                    <a href="#" ><?php $name=$_SESSION['name']; echo $name;?></a>
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


    <div class="page-heading-section section bg-parallax" data-bg-image="assets/images/bg/bg-1.jpg" data-overlay="50">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title">Manage company</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                </ol>
            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">
            
                <div class="col-lg-8 col-12 mb-5 pr-lg-5">
                    
                        
                        <div class="company-list-wrap row">
                        <?php
                            $sql = "select cname,location from company";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res)) {
                            $cname = $row['cname'];
                            $loc = $row['location'];
                        ?>
                            
                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                <span class="company-list">
                                    <h6 class="title"><?php echo "$cname"; ?></h6>
                                    <span class="open-job"><?php 
                                        $sql1="select count(jobname) as cnt from companyjobinfo where company='$cname'";
                                        $res1=mysqli_query($conn,$sql1);
                                        $row1=mysqli_fetch_assoc($res1);
                                        $ans1=$row1['cnt'];
                                        echo "$ans1";
                                        ?>open positions</span>
                                    <span class="location"><i class="fa fa-map-o"></i><?php echo "$loc"; ?></span>
                                    
                                </span>
                                <center><span class="badge badge-danger"><a href="company_chuli.php?com=<?php echo "$cname" ?>&loc=<?php echo "$loc" ?>">Delete</a></span></center>
                            </div>
                            <?php } ?>

                        </div>
                </div>
                

                
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        
                        <div class="sidebar-widget">
                            <div class="inner">
                                <h6 class="title">Search Company</h6>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12 mb-3"><input type="text" placeholder="Keyword"></div>
                                        <div class="col-12 mb-3">
                                            <label>Category</label>
                                            <select>
                                                <option value="1">Any category</option>
                                                <option value="2">Web Designer</option>
                                                <option value="3">Web Developer</option>
                                                <option value="4">Graphic Designer</option>
                                                <option value="5">App Developer</option>
                                                <option value="6">UI &amp; UX Expert</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>Location</label>
                                            <input type="text" placeholder="Location">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>Company Sizes</label>
                                            <select>
                                                <option>All Company Size</option>
                                                <option>&lt; 10 employees</option>
                                                <option>10 ~ 50 employees</option>
                                                <option>50 ~ 200 employees</option>
                                                <option>200 ~ 500 employees</option>
                                                <option>500 ~ 2000 employees</option>
                                                <option>&gt; 2000 employees</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input class="btn btn-primary w-100" type="submit" value="Search">
                                        </div>
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