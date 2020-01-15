<?php
    $conn=mysqli_connect('localhost','root','','phpserver');
    $num=$_GET['num'];
    $cname=$_GET['cname'];
    $sql="select location from company where cname='$cname'";
    $stat=mysqli_query($conn,$sql);
    $res=mysqli_fetch_assoc($stat);
    $loc=$res['location'];

    $sql="delete from companydesc where cname='$cname'";
    mysqli_query($conn,$sql);
    for($i=0;$i<=$num;$i++)
    {
        $no="wd".$i;
        $word=$_POST[$no];
        if(strlen($word)>0)
        {
            $sql="insert into companydesc values('$cname','$loc','$word')";
            mysqli_query($conn,$sql);
        }
    }
    
    echo "
    <script>alert('操作成功');
        window.location.href='edit_company.php';</script>
    ";
?>