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
                <h3 class="title">Apply job </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index_company.php">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo "$cname"; ?> Apply job</li>
                </ol>
            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="create-job-form col-lg-10 mx-auto">
                    <?php echo "<script>c1=2;c2=2;c3=2; cname='$cname'</script>"; ?>
                    <form method="POST" id="edit_company_form">
                        <div class="row mb-n3">
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobTitle">Job Title</label>
                                <input type="text" id="jobTitle" name="jobTitle" placeholder="e.g. web design">
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
                                <label for="jobCategory" >Job Category</label>
                                <input type="text" id="jobCategory" placeholder="5k-8k" name="Category">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="salaryRange">Salary Range</label>
                                <input type="text" id="salaryRange" name="Salary" placeholder="5k-8k">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobGender">Gender</label>
                                <select id="jobGender" name="Gender">
                                    <option value="type1">Any</option>
                                    <option value="type2">Male</option>
                                    <option value="type3">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobExperience">Experience</label>
                                <select id="jobExperience" name="jobExperience">
                                    <option value="1 Year to 2 Year">1 Year to 2 Year</option>
                                    <option value="2 Year to 3 Year">2 Year to 3 Year</option>
                                    <option value="3 Year to 4 Year">3 Year to 4 Year</option>
                                    <option value="4 Year to 5 Year">4 Year to 5 Year</option>
                                    <option value="Longer than 5 Year">Longer than 5 Year</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="jobEducation">Education</label>
                                <select id="jobEducation" name="Education">
                                    <option value="Postdoc">Postdoc</option>
                                    <option value="Ph.D.">Ph.D.</option>
                                    <option value="Master">Master</option>
                                    <option value="Bachelor">Bachelor</option>
                                    <option value="others">others</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="jobDescription">Description</label>
                                <textarea id="jobDescription" rows="5" name="desc"></textarea>
                            </div>
                            <h4>Required</h4>
                            <div class=" col-12 mb-3" id="informationlist1">
                                 <input type="text" name="req1" placeholder="Good at English">
                            </div>
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-primary px-5"  onclick="add_element(1)">Add</button>
                            </div>
                            <h4>Responsable</h4>
                            <div class=" col-12 mb-3" id="informationlist2">
                                 <input type="text" name="res1" placeholder="Manage all databases">
                            </div>
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-primary px-5"  onclick="add_element(2)">Add</button>
                            </div>
                            <h4>Benefits</h4>
                            <div class=" col-12 mb-3" id="informationlist3">
                                 <input type="text" name="bene1" placeholder="Medical insurance">
                            </div>
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-primary px-5"  onclick="add_element(3)">Add</button>
                            </div>
                        </div>
                        <div class="row"></div>
                        <center><button type="submit" class="btn btn-primary px-5" onclick="save_element()">Post Job</button></center>
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
    
    <script>
        
        function add_element(now)
        {
            var tex="";
            if(now==1)
            {
                tex="req";
                tex=tex+c1;
                c1++;
            }
            else if(now==2) 
            {
                tex="res";
                tex=tex+c2;
                c2++;
            }
            else 
            {
                tex="bene";
                tex=tex+c3;
                c3++;
            }
            // <li><input type="text" name="wd$cnt" "></li>
            input=document.createElement("input");
            input.setAttribute("type","text");
            input.setAttribute("name",tex);
            input.setAttribute("placeholder","Write something");
            doc=document.getElementById("informationlist"+now);
            doc.appendChild(input);
            
        }
        function save_element()
        {
            doc=document.getElementById("edit_company_form");
            doc.setAttribute("action","edit_job_chuli.php?c1="+c1+"&c2="+c2+"&c3="+c3+"&cname="+cname);
        }
    </script>
    
    <script src="assets/js/main.js"></script>

</body>

</html>