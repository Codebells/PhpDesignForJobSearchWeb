
<?php
$conn=mysqli_connect('localhost','root','','phpserver');
$name=$_GET['name'];
$title=$_GET['title'];
$sql="delete from board where name='$name' and title='$title'";
mysqli_query($conn,$sql);
echo"<script>alert('删除成功！');
window.location.href='board_manage.php';</script>";