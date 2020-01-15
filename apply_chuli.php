<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$job=$_GET['job'];
$comp=$_GET['com'];
$name=$_POST['username'];
$phone=$_POST['phone'];
$type=$_POST['jobtype'];
$sal=$_POST['expectmoney'];
$gender=$_POST['gender'];
$educate=$_POST['education'];
$dir="./company/$comp";
if(is_dir($dir))
{
    echo "yes";
}
else 
{
    echo "no";
    $make=mkdir("./company/$comp",0777);
}
$dir=$dir.'/';
if(is_dir($dir))
{
    
    $file=$_FILES["file"]["name"];
    $tem=$_FILES["file"]["tmp_name"];
    echo"$dir.$file";
    var_dump($_FILES);
    move_uploaded_file($tem,$dir.$file);
    echo "ok";
}

$sql="insert into userapply values('$name','$comp','$phone','$job','$type','$sal','$gender','$educate' )";
echo $sql;
$stat=mysqli_query($conn,$sql);
echo "
    <script>alert('提交成功');
        window.location.href='job_apply.php?job=$job&com=$comp';</script>
    ";
