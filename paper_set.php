<?php
    $conn=mysqli_connect('localhost','root','','phpserver');
    $act=$_GET['sub'];
    $now=$_GET['num'];
    if($act=='set')
    {
        $sql="update showupper set now='$now'";
        mysqli_query($conn,$sql);
    }
    else 
    {
        $sql="select now from showupper";
        $stat=mysqli_query($conn,$sql);
        $res=mysqli_fetch_assoc($stat);
        $sql="delete from paper where num='$now'";
        mysqli_query($conn,$sql);
        if($now==$res['now'])
        {
            $sql="select num from paper";
            $stat=mysqli_query($conn,$sql);
            $res=mysqli_fetch_assoc($stat);
            $nn=$res['num'];
            $sql="update showupper set now='$nn'";
            mysqli_query($conn,$sql);
        }
        
    }
    echo "
    <script>alert('操作成功');
        window.location.href='faq_manager_set.php';</script>
    ";
?>