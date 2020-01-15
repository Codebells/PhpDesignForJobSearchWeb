<?php
    $conn=mysqli_connect('localhost','root','','phpserver');
    $sql="select now from showupper";
    $stat=mysqli_query($conn,$sql);
    $res=mysqli_fetch_assoc($stat);
    $now=$res['now'];
    $sql="select max(pbnum) as maxn from paper where num='$now'";
    $stat=mysqli_query($conn,$sql);
    $res=mysqli_fetch_assoc($stat);
    $cnt=$res['maxn'];
    echo $cnt;
    for($i=1;$i<=$cnt;$i++)
    {
        $sqli="select pbtype from paper where num='$now' and pbnum='$i' ";
        $stat=mysqli_query($conn,$sqli);
        $res=mysqli_fetch_assoc($stat);
        $ptype=$res['pbtype'];
        $tem='p'.$i;
        $p=$_POST[$tem];
        if($ptype=='check'||$ptype=="checkbox")
        {
            echo "check <br>";
            $len =count($p);
            for($j=0;$j<$len;$j++)
            {
                $wd=$p[$j];
                $sql="insert into userresult values('$now','$i','$wd')";
                echo "$sql  <br>";
                $stat=mysqli_query($conn,$sql);
            }
        }
        else 
        {
            $sql="insert into userresult values('$now','$i','$p')";
            mysqli_query($conn,$sql);
            echo "$sql  <br>";
        }
    }
    
    echo "
    <script>alert('提交成功');
        window.location.href='faq.php';</script>
    ";
?>