<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$c1=$_GET['c1'];
$c2=$_GET['c2'];
$c3=$_GET['c3'];
$cname=$_GET['cname'];
$jtype=$_POST['jobtype'];
$jobTitle=$_POST['jobTitle'];
$Category=$_POST['Category'];
$Salary=$_POST['Salary'];
$Gender=$_POST['Gender'];
$Experience=$_POST['jobExperience'];
$Education=$_POST['Education'];
$desc=$_POST['desc'];
$sql ="insert into jobinfo values('$jobTitle','$jtype','$Salary','$Experience','$Gender','$Education','$cname','$desc')";
mysqli_query($conn,$sql);
for($i=1;$i<$c1;$i++)
{
    $now="req"+$i;
    $wd=$_POST[$now];
    if(strlen($wd)>0)
    {
        $sql="insert into required values('$jobTitle','$cname','$wd')";
        mysqli_query($conn,$sql);
    }
}
for($i=1;$i<$c2;$i++)
{
    $now="res"+$i;
    $wd=$_POST[$now];
    if(strlen($wd)>0)
    {
        $sql="insert into required values('$jobTitle','$cname','$wd')";
        mysqli_query($conn,$sql);
    }
}
for($i=1;$i<$c3;$i++)
{
    $now="bene"+$i;
    $wd=$_POST[$now];
    if(strlen($wd)>0)
    {
        $sql="insert into required values('$jobTitle','$cname','$wd')";
        mysqli_query($conn,$sql);
    }
}
echo "<script>alert('操作成功！');
        window.location.href='company-list_manager.php';</script>
        ";