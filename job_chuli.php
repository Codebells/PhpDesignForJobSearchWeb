<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$job=$_GET['job'];
$com=$_GET['com'];
$act=$_GET['act'];
$jtype=$_GET['jtype'];
if($act=='accept')
{
    $sql="select salary,experience,gender,education,description from jobinfo where jobname='$job' and company='$com'and jobtype='$jtype' ";
    $stat=mysqli_query($conn,$sql);
    $ans=mysqli_fetch_assoc($stat);
    $sal=$ans['salary'];
    $exp=$ans['experience'];
    $gender=$ans['gender'];
    $edu=$ans['education'];
    $desc=$ans['description'];
    $sql="insert into companyjobinfo values('$job','$jtype','$sal','$exp','$gender','$edu','$com','$desc')";
    $stat=mysqli_query($conn,$sql);
}
$sql="delete from jobinfo where jobname='$job' and company='$com'and jobtype='$jtype' ";
$stat=mysqli_query($conn,$sql);
echo "<script>alert('操作成功！');
        window.location.href='index_manager.php';</script>";
