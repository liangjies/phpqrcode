<?php
$file =$_FILES['file']['tmp_name'];
//echo $file;
date_default_timezone_set("PRC");
$showapi_appid = '7445';  //替换此值
$showapi_sign = 'bdba0c946d8345718c4b64a0c284d3fe';  //替换此值。
$showapi_timestamp = date('YmdHis');
if (empty($_POST["text"])) {
        $url2 = 'http://route.showapi.com/59-2?showapi_appid=7445&showapi_sign=bdba0c946d8345718c4b64a0c284d3fe&showapi_timestamp='.$showapi_timestamp.'';
        unset($_POST["text"]);
        $post = array(
        "f1"=>"@$file",//这里是要上传的文件，key与后台处理文件对应
        );

//访问页面1
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = curl_exec($ch);
curl_close($ch);
    } else {
        $url2 = 'http://route.showapi.com/59-1?showapi_appid=7445&showapi_sign=bdba0c946d8345718c4b64a0c284d3fe&&showapi_timestamp='.$showapi_timestamp.'&IMG='.$_POST["text"].'';

//访问页面2
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = curl_exec($ch);
curl_close($ch);
}
$s=json_decode($output, true);
$t =$s[showapi_res_body];
$body =$t[MSG];
//print_r($body);

//$name = urlencode($name);

//echo $output;

?>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>二维码识别工具</title> 
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
     <a class="navbar-brand" href="#">二维码识别</a> 
    </div> 
    <div class="navbar-collapse collapse"> 
     <ul class="nav navbar-nav"> 
      <li class="active"><a href="">首页</a></li> 
      <li><a href="index.php">二维码生成</a></li> 
      <li><a href="#contact">About</a></li> 
     </ul>   
    </div>
    <!--/.nav-collapse --> 
   </div> 
  </nav> 
  <div class="div"> 
   <div class="div"> 
    <form method="post" action="" enctype="multipart/form-data"> 
     <div>
       文件： 
      <input type="file" name="file" /> 
      <br /> 
     </div> 
     <p> <input type="submit" class="btn btn-primary btn-lg value=" 上传"="" /> </p> 
    </form> 
   </div> 
   <form action="" method="post"> 
    <div class="padding"> 
     <label for="inputEmail" class="sr-only">请输入网址</label> 
     <input type="text" id="url" class="form-control" name="text" placeholder="输入二维码图片网址" required="" autofocus="" /> 
    </div> 
    <div class="padding"> 
     <input class="button button-block button-positive" type="submit" value="开始扫描" />  
    </div>
   </form>  
  </div>
 </body>
</html>
<?php
if (isset($body)) {

    echo ' <div class="deqr_result" id="deqr_result">
                <div class="result_title">该二维码详细解析：</div>
                <ul>
                    <li>
                        <div class="result_list_tilte title1">扫描结果：</div>'.$body.'
                        
                    </li>
            </ul>
        </div>
    </body>
</html>';

    unset($body);

    

} else {

    //echo $content2; 

    echo $c;

}
?>