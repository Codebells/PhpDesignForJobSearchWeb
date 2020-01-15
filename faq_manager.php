<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
session_start();
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
                        <a href="index_manager.php"> <span style="color: white; font-size: 30px; font-weight: 600;">CodeBells</span> </a>
                    </div>
                </div>

                <div class="header-links col-auto order-lg-3">
                    <a href="#" ><?php $name=$_SESSION['name']; echo $name;?></a>
                    <span>or</span>
                    <a href="index.php" >LogOut</a>
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
                <h3 class="title">FAQ'S</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index_manager.php">Home</a></li>
                    <li class="breadcrumb-item active">New FAQ'S</li>
                </ol>
            </div>
            
        </div>
    </div>
    

    
    <div class="section section-padding">
        <div class="container">
        <center>
            <div class="job-search-form-2" style="max-width: 60% ;" >
            <div class="row no-gutters mb-n2 mb-sm-n0">
				<div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-2 mb-sm-0">
                    <script>
                        c1=1;
                        c2=1;
                        c3=1;
                    </script>
					<select id="addquerstions" class="btn btn-primary px-5" style="font-weight:500;" onchange="change(this)">
						<option value="-1">添加问题</option>
						<option value="0" >单选</option>
						<option value="1" >多选</option>
						<option value="2" >填空</option>
					</select>
				</div>
            </div>
            </div></center> 
            <br>
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                <form method="POST" id="Thisismyform">

                <div class="yd_box"></div>

                    <div class="faq-card card" id="add_function">
                        
                    </div>
                    
                    <center>
                        <div class="col-12 mb-3"><input class="btn btn-primary px-5" type="submit" value="Submit" onclick="setact();"></div>
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
    <script>
                        // <div class="card-header">
                        //     <h6>Q.<input type='text' name='p' placeholder='Write down your answer'> </h6>
                        // </div>
                        // <div class="card-body">
                        //     <div class='custom-control custom-radio mb-1'>
                        //     <input name="p" type='radio' class='custom-control-input' value='$ans' id='jobtype'>
                        //     <label class='custom-control-label' for='jobtype'></label>
                        //     </div>
                        // </div>
        function setact()
        {
            var form =document.getElementById("Thisismyform");
            form.setAttribute("action","paper_add_chuli.php?num="+c1);
        }
        function change(e)
        {
            if(e.options[e.selectedIndex].value=="0")
                add_radio();
            else if(e.options[e.selectedIndex].value=="1")
            add_checkbox();
            else add_text();
        }
        function add_option(e)
        {
            var fa=e.parentNode.parentNode;
            var now =fa.nextSibling;
            now=now.firstChild;
            console.log(now.firstChild);
            var ncname=now.firstChild.firstChild.getAttribute("name");
            var li=document.createElement("li");
            inp1=document.createElement("input");
            inp1.setAttribute("name",ncname);
            li.appendChild(inp1);
            now.appendChild(li);
        }
        function add_radio()
        {
            console.log("radio");
            var doc=document.getElementById("add_function");
            var div1=document.createElement("div");
            div1.setAttribute("class","card-header");
            var h6=document.createElement("h6");
            h6.innerText="Q.";
            var inp2=document.createElement("input");
            inp2.setAttribute("type","text")
            inp2.setAttribute("name","ptype"+c1);
            inp2.setAttribute("value","radio");
            inp2.setAttribute("style","max-width:40%;");
            inp2.setAttribute("readonly","readonly");
            var inp1=document.createElement("input");
            inp1.setAttribute("type","text");
            inp1.setAttribute("name","p"+c1);
            inp1.setAttribute("placeholder","Write down your answer");
            h6.appendChild(inp2);
            var but=document.createElement("button");
            but.setAttribute("type","button");
            but.setAttribute("style","float:right");
            but.innerText="Add opt";
            but.setAttribute("onclick","add_option(this)");
            h6.appendChild(but);
            h6.appendChild(inp1);
            
            div1.appendChild(h6);            
            doc.appendChild(div1);

            div1=document.createElement("div");
            div1.setAttribute("class","card-body"+c1);
            var ul=document.createElement("ul");
            li=document.createElement("li");
            inp1=document.createElement("input");
            inp1.setAttribute("name","opt"+c1+"[]");
            li.appendChild(inp1);
            ul.appendChild(li);
            div1.appendChild(ul);
            doc.appendChild(div1);
            c1++;
        }
        function add_checkbox()
        {
            console.log("checkbox");
            var doc=document.getElementById("add_function");
            var div1=document.createElement("div");
            div1.setAttribute("class","card-header");
            var h6=document.createElement("h6");
            h6.innerText="Q.";
            var inp2=document.createElement("input");
            inp2.setAttribute("type","text")
            inp2.setAttribute("name","ptype"+c1);
            inp2.setAttribute("value","checkbox");
            inp2.setAttribute("style","max-width:40%;");
            inp2.setAttribute("readonly","readonly");
            var inp1=document.createElement("input");
            inp1.setAttribute("type","text");
            inp1.setAttribute("name","p"+c1);
            inp1.setAttribute("placeholder","Write down your answer");
            h6.appendChild(inp2);
            var but=document.createElement("button");
            but.setAttribute("type","button");
            but.setAttribute("style","float:right");
            but.innerText="Add opt";
            but.setAttribute("onclick","add_option(this)");
            h6.appendChild(but);
            h6.appendChild(inp1);
            
            div1.appendChild(h6);            
            doc.appendChild(div1);

            div1=document.createElement("div");
            div1.setAttribute("class","card-body"+c1);
            var ul=document.createElement("ul");
            li=document.createElement("li");
            inp1=document.createElement("input");
            inp1.setAttribute("name","opt"+c1+"[]");
            li.appendChild(inp1);
            ul.appendChild(li);
            div1.appendChild(ul);
            doc.appendChild(div1);
            c1++;
        }
        function add_text()
        {
            console.log("text");
            var doc=document.getElementById("add_function");
            var div1=document.createElement("div");
            div1.setAttribute("class","card-header");
            var h6=document.createElement("h6");
            h6.innerText="Q.";
            var inp2=document.createElement("input");
            inp2.setAttribute("type","text")
            inp2.setAttribute("name","ptype"+c1);
            inp2.setAttribute("value","text");
            inp2.setAttribute("style","max-width:40%;");
            inp2.setAttribute("readonly","readonly");
            var inp1=document.createElement("input");
            inp1.setAttribute("type","text");
            inp1.setAttribute("name","p"+c1);
            inp1.setAttribute("placeholder","Write down your answer");
            h6.appendChild(inp2);
            h6.appendChild(inp1);
            
            div1.appendChild(h6);            
            doc.appendChild(div1);
            c1++;
        }
    </script>
</body>

</html>