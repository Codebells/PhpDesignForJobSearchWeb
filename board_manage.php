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
                    <a href="#"><?php $name=$_SESSION['name']; echo $name;?></a>
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
                <h3 class="title">Set Board</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Manage Board</li>
                </ol>
            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
        <div class="job-list-wrap"> 
                
                <?php
                $sql='select name,title, word from board';
                $stat=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($stat))
                {
                    $bname=$row['name'];
                    $title=$row['title'];
                    $word=$row['word'];
                ?>
                <span class="job-list">
                    <div class="salary-type col-auto order-sm-3">
                    <span class="badge badge-danger"><a href="board_de.php?name=<?php echo "$bname" ;?>&title=<?php echo "$title" ;?>">Delete</a></span>
                    </div>
                    <div class="content col" style="max-width: 85%;">
                        <h6 class="title"><?php echo "$title" ;?></h6>
                        <ul class="meta">
                            <li><strong class="text-primary"><?php echo "$bname" ;?></strong></li>
                        </ul>
                        <span><?php echo "$word" ;?></span>
                    </div>
                    
                </span>
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