<?php
session_start();
$mysql_server_name = 'localhost'; //改成自己的mysql数据库服务器
$mysql_username = 'root'; //改成自己的mysql数据库用户名
$mysql_password = ''; //改成自己的mysql数据库密码
$mysql_database = 'phpserver'; //改成自己的mysql数据库名
$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database); //连接数据库
//连接数据库错误提示
if (mysqli_connect_errno($conn)) { 
    die("连接 MySQL 失败: " . mysqli_connect_error()); 
}
else 
{
    echo "ok";
}
mysqli_query($conn,"set names utf8"); //数据库编码格式
// mysqli_set_charset($conn,"utf8");//设置默认客户端字符集。
// mysqli_select_db($conn,$mysql_database); //更改连接的默认数据库
$name=$_POST["name"];
$_SESSION["name"]=$name;
$check=$_POST["me"];
$pass=$_POST["pass"];
if($check=="click")
{
    $sql = "select password from manager where mname='$name'";
    $query = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    if($row['password']==$pass)
    {
        echo "<script>alert('登录成功！');
        window.location.href='index_manager.php';</script>";
    }
    else
    {
        
        echo "<script>alert('密码错误！');
        window.location.href='index.php';</script>";
    }
}
else 
{
    $sql = "select password from company where Cname='$name'";
    $query = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    if($row['password']==$pass)
    {
        echo "<script>alert('登录成功！');
        window.location.href='index_company.php';</script>";
    }
    else
    {
        echo "<script>alert('密码错误！');
        window.location.href='index.php';</script>";
    }
}