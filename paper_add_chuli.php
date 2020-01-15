<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$cnt=$_GET['num'];
$sql="select max(num) as maxx from paper";
$stat=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($stat);
$maxx=$res['maxx'];
$maxx++;
for($i=1;$i<$cnt;$i++)
{
    $tem="ptype".$i;
    echo $tem."   ";
    $ptype=$_POST[$tem];
    echo $ptype."   ";
    $tem="p".$i;
    echo $tem."   ";
    $pname=$_POST[$tem];
    $wd=$pname;
    if(strlen($wd)>0)
    {
        $sql="insert into paper values('$maxx','$i','$ptype','$wd')";
        mysqli_query($conn,$sql);
    }
    echo $pname."   ";
    $tem="opt".$i;
    echo $tem."   ";
    $parr=$_POST[$tem];
    var_dump($parr);
    $len=count($parr);
    for($j=0;$j<$len;$j++)
    {
        $wd=$parr[$j];
        if(strlen($wd)>0)
        {
            $sql="insert into answer values('$maxx','$i','$wd')";
            mysqli_query($conn,$sql);
        }
    }
}
$sql="update showupper set now='$maxx'";
mysqli_query($conn,$sql);
echo "<script>alert('添加并设置成功！');
        window.location.href='faq_manager.php';</script>";
?>