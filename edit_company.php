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
                <h3 class="title">Edit <?php echo "$cname"; ?> Infomation</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index_company.php">Home</a></li>
                    <li class="breadcrumb-item active">edit <?php echo "$cname"; ?> info</li>
                </ol>
            </div>
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n5">

                <div class="col-lg-8 col-12 mb-5 pr-lg-5">

                    
                    <?php $cc=0; ?>
                    <form  method="POST" id="edit_company_form">
                    <div class="company-details">
                        <h5 class="mb-3">About <?php echo "$cname"; ?></h5>
                        <p>
                            <textarea name="word" cols="30" rows="10"><?php
                                $word="select location from company where cname='$cname'";
                                $now=mysqli_query($conn,$word);
                                $ans=mysqli_fetch_assoc($now);
                                $loc=$ans['location'];
                                $sql="select categories,founded,teamsize,website,word from companyinfo where cname='$cname' ";
                                $stat=mysqli_query($conn,$sql);
                                $res=mysqli_fetch_assoc($stat);
                                $word = $res['word'];
                                echo "$word";
                            ?></textarea>
                        </p>
                        <ul id="informationlist">
                            <?php
                                $sql1="select word from companydesc where cname='$cname'";
                                $stat1=mysqli_query($conn,$sql1);
                                
                                while($row=mysqli_fetch_array($stat1))
                                {
                            ?>
                            <li>
                                <input type="text" name="wd<?php echo"$cc"; $cc++; ?>" value="<?php $now = $row['word']; echo "$now"; ?>">
                            </li>
                                <?php }?>
                        </ul>
                        <?php echo "<script>cnt=$cc; cname='$cname';</script>"; ?>
                        <center>
                            <button type="button" class="btn btn-primary w-100" style="max-width: 35%" onclick="add_element();" >Add info</button>
                            <button type="submit" class="btn btn-primary w-100" style="max-width: 35%" onclick="save_element()">Save Edit</button>
                    </center>
                        </div>
                    </form>
                    
                </div>

                
                <div class="col-lg-4 col-12 mb-5">
                    <div class="sidebar-wrap">
                        
                        <div class="sidebar-widget">
                            <div class="inner">
                                <div class="sidebar-company">
                                    <h6 class="title"><?php echo "$cname"; ?></h6>
                                    <form action="edit_cominfo.php?cname=<?php echo "$cname"; ?>" method="POST">
                                    <ul>
                                        <li><strong>Categories:</strong><input type="text" name="Categories" value="<?php $cate=$res['categories']; echo "$cate"; ?>"> </li>
                                        <li><strong>Founded:</strong> <input type="text" name="Founded" value="<?php $cate=$res['founded']; echo "$cate"; ?>"> </li>
                                        <li><strong>Team Size:</strong><input type="text" name="Team" value="<?php $cate=$res['teamsize']; echo "$cate"; ?>"></li>
                                        <li><strong>Website:</strong> <input type="text" name="Website" value="<?php $cate=$res['website']; echo "$cate"; ?>"></li>
                                        <li><strong>Location:</strong> <input type="text" name="Location" value="<?php echo "$loc"; ?>"></li>
                                    </ul>
                                    <center>
                                        <br>    
                                    <button type="submit" class="btn btn-primary w-100" style="max-width: 55%">Save Edit</button>
                                    </center>
                                    </form>
                                </div>
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
    
    <script>
        
        function add_element()
        {
            
            console.log(cnt);
            // <li><input type="text" name="wd$cnt" "></li>
            li=document.createElement("li");
            input=document.createElement("input");
            input.setAttribute("type","text");
            input.setAttribute("name","wd"+cnt);
            li.appendChild(input);
            doc=document.getElementById("informationlist");
            doc.appendChild(li);
            cnt++;
        }
        function save_element()
        {
            doc=document.getElementById("edit_company_form");
            doc.setAttribute("action","edit_company_chuli.php?num="+cnt+"&cname="+cname);
        }
    </script>
    
    <script src="assets/js/main.js"></script>

</body>

</html>