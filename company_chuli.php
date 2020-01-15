<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$com=$_GET['com'];
$loc=$_GET['loc'];
$sql = "delete from company where cname='$com' and location='$loc' ";
mysqli_query($conn,$sql);
echo "<script>alert('操作成功！');
        window.location.href='company-list_manager.php';</script>";