<?php
$conn = mysqli_connect('localhost', 'root', '', 'phpserver');
$job = $_GET['job'];
$comp = $_GET['com'];
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
    <style>
        .upload-wrap {
            position: relative;
            display: inline-block;
            overflow: hidden;
            border: 1px solid #2d78f4;
            border-radius: 3px;
        }

        .upload-wrap .file-ele {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
        }

        .upload-wrap .file-open {
            width: 90px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            color: #fff;
            background: #3385ff;
        }
    </style>
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
                <h3 class="title">Apply a job</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="job-list.php">Jobs</a></li>
                    <li class="breadcrumb-item"><a href="job-single.php?job=<?php echo "$job" ?>&&com=<?php echo "$comp" ?>"><?php echo "$job"; ?></a></li>
                    <li class="breadcrumb-item active">Apply Job</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="create-job-form col-lg-10 mx-auto">
                    <form action="apply_chuli.php?job=<?php echo "$job"?>&com=<?php echo "$comp"?>" method="POST" enctype="multipart/form-data">
                        <div class="row mb-n3">
                            <div class="col-md-6 col-12 mb-3">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="Codebells">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" placeholder="13312341234">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobType">Job Type</label>
                                <select id="jobType" name="jobtype">
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="salaryRange">Salary Range</label>
                                <input type="text" id="salaryRange" name="expectmoney" placeholder="5k-8k">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobGender">Gender</label>
                                <select id="jobGender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobEducation">Education</label>
                                <select id="jobEducation" name="education">
                                    <option value="Postdoc">Postdoc</option>
                                    <option value="Ph.D.">Ph.D.</option>
                                    <option value="Master">Master</option>
                                    <option value="Bachelor">Bachelor</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                        </div>
                        <p></p>
                        <center>
                            <div class="upload-wrap anticon" nv-file-drop="" uploader="uploader">
                                <input class="file-ele" type="file"  name="file" />
                                <div class="file-open"><em class="icon icon-upload"></em>&nbsp;upload</div>
                            </div>
                        </center>
                        <div class="row"></div>
                        <center>
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-primary px-5">Post Job</button>
                            </div>
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

    <!-- JS
============================================ -->
    <!-- Vendors JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
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