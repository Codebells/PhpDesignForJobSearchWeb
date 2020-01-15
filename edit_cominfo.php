<?php 
$conn = mysqli_connect('localhost', 'root', '', 'phpserver');
$cate=$_POST['Categories'];
$found=$_POST['Founded'];
$team=$_POST['Team'];
$web=$_POST['Website'];
$cname=$_GET['cname'];
$loc=$_POST['Location'];
echo $team."<br>";
$sql="update companyinfo set categories='$cate',founded='$found',teamsize='$team',website='$web' where cname='$cname'";
echo $sql;
mysqli_query($conn,$sql);
echo "
    <script>alert('操作成功');
        window.location.href='edit_company.php';</script>
    ";
?>