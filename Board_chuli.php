<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$name=$_GET['name'];
$title=$_POST['title'];
$mess=$_POST['message'];
$sql="insert into board values('$name','$title','$mess' )";
mysqli_query($conn,$sql);
echo"<script>alert('发送成功！');
window.location.href='board.php';</script>";
