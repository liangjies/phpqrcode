<?php
if (isset($_POST["url"])) {
    if (empty($_POST["url"])) {
        unset($_POST["url"]);
    } else {
        $url = $_POST["url"];
        $img = '<img src="http://qr.liantu.com/api.php?text=' . "$url" . '"/>';
    }
}
?>
<!DOCTYPE html>
<html lang="zh">
 <head> 
  <meta charset="UTF-8" /> 
  <title>二维码生成工具</title> 
  <!-- 新 Bootstrap 核心 CSS 文件 --> 
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" /> 
  <!-- 可选的Bootstrap主题文件（一般不用引入） --> 
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" /> 
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 --> 
  <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script> 
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 --> 
  <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
 </head> 
 <body> 
  <nav class="navbar navbar-default"> 
   <div class="container"> 
    <div class="navbar-header"> 
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">更多</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> 
     <a class="navbar-brand" href="#">二维码生成</a> 
    </div> 
    <div class="navbar-collapse collapse"> 
     <ul class="nav navbar-nav"> 
      <li class="active"><a href="">首页</a></li> 
      <li><a href="qrcode.php">二维码识别</a></li> 
      <li><a href="#contact">About</a></li> 
     </ul>   
    </div>
    <!--/.nav-collapse --> 
   </div> 
  </nav> 
  <div class="container"> 
   <form action="" method="post"> 
    <div class="list"> 
     <label for="inputEmail" class="sr-only">请输入网址</label> 
     <input type="text" id="url" class="form-control" name="url" placeholder="请输入网址" required="" autofocus="" /> 
    </div> 
    <div class="padding"> 
     <input class="btn btn-lg btn-success" type="submit" value="生成" /> 
    </div> 
   </form> 
  </div> 
  <center></center>
 <?php
if (isset($_POST["url"])) {
    echo '<div class="card"><div class="item item-text-wrap">' . $img . '</div></div>';
    unset($_POST["url"]);
    
} else {
    
    echo $c;
}
?>
</body>
</html>