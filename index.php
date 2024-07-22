<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="/style/logo2.png">
	
    <title>ABERTOOL</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

	<?php
echo '<link href="style/cover.css?c='.(rand(10,100).'" rel="stylesheet">');
?>
  </head>

  <body class="text-center">
<div class="snowflakes" aria-hidden="true">
<div class="snowflake">🐞</div>
<div class="snowflake">🌻</div>
<div class="snowflake">🐝</div>
<div class="snowflake">🦋</div>
<div class="snowflake">🔆️</div>
<div class="snowflake">🌻</div>
<div class="snowflake">🐝</div>
<div class="snowflake">🦋</div>
<div class="snowflake">🔆</div>
<div class="snowflake">🐝</div>
<div class="snowflake">🐞</div>
<div class="snowflake">🌻</div>
</div>

<style>
  @-webkit-keyframes snowflakes-fall {
    0% {top:-10%}
    100% {top:100%}
  }
  @-webkit-keyframes snowflakes-shake {
    0%,100% {-webkit-transform:translateX(0);transform:translateX(0)}
    50% {-webkit-transform:translateX(80px);transform:translateX(80px)}
  }
  @keyframes snowflakes-fall {
    0% {top:-10%}
    100% {top:100%}
  }
  @keyframes snowflakes-shake {
    0%,100%{ transform:translateX(0)}
    50% {transform:translateX(80px)}
  }
  .snowflake {
    color: #fff;
    font-size: 1em;
    font-family: Arial, sans-serif;
   
    position:fixed;
    top:-10%;
    z-index:9999;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
    cursor:default;
    -webkit-animation-name:snowflakes-fall,snowflakes-shake;
    -webkit-animation-duration:10s,3s;
    -webkit-animation-timing-function:linear,ease-in-out;
    -webkit-animation-iteration-count:infinite,infinite;
    -webkit-animation-play-state:running,running;
    animation-name:snowflakes-fall,snowflakes-shake;
    animation-duration:10s,3s;
    animation-timing-function:linear,ease-in-out;
    animation-iteration-count:infinite,infinite;
    animation-play-state:running,running;
  }
  .snowflake:nth-of-type(0){
    left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s
  }
  .snowflake:nth-of-type(1){
    left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s
  }
  .snowflake:nth-of-type(2){
    left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s
  }
  .snowflake:nth-of-type(3){
    left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s
  }
  .snowflake:nth-of-type(4){
    left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s
  }
  .snowflake:nth-of-type(5){
    left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s
  }
  .snowflake:nth-of-type(6){
    left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s
  }
  .snowflake:nth-of-type(7){
    left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s
  }
  .snowflake:nth-of-type(8){
    left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s
  }
  .snowflake:nth-of-type(9){
    left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s
  }
  .snowflake:nth-of-type(10){
    left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s
  }
  .snowflake:nth-of-type(11){
    left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s
  }
</style>
	  
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

      <main role="main" class="inner cover container1 ">
	  <img src="/style/logo.png" alt="CoolBrand">
<br><br>
        <div class="tip">"

		<?php
    $f_contents = file("style/random.txt"); 
    $line = $f_contents[rand(0, count($f_contents) - 1)];
	print $line;
?>"</div>

<div class="tip2">

<?php
function delete_directory($dirPath){
        $dir = $dirPath;   
        if(is_dir($dir)){
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach($files as $file){
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                }else{
                    unlink($file->getRealPath());
                }
            }
            rmdir($dir);
        }
    }
function tag_contents($string, $tag_open, $tag_close)
{
    foreach (explode($tag_open, $string) as $key => $value)
    {
        if (strpos($value, $tag_close) !== false)
        {
            $result[] = substr($value, 0, strpos($value, $tag_close));;
        }
    }
    return $result;
}
$url='https://github.com/tonquanganh/abertool/blob/main/version.html'; // tạo biến url cần lấy
$lines_array=file($url); // dùng hàm file() lấy dữ liệu theo url
$lines_string=implode('',$lines_array); // chuyển dữ liệu lấy được kiểu mảng thành một biến string
$newversion = tag_contents($lines_string, "@1@", "@2@"); $newversion = $newversion[0];
echo "Phiên bản mới nhất trên hệ thống là: <h3>".$newversion."</h3>";
$fp = @fopen('version.txt', "r");
if (!$fp) {echo 'File not found';}
else
{$nowversion = fread($fp, filesize('version.txt'));
if ($nowversion != $newversion)
{echo "Phiên bản trước đó là: <h3 style='color:red;'>".$nowversion."</h3>";;

$file = 'https://github.com/tonquanganh/abertool/raw/main/'.$newversion;
$newfile = $_SERVER['DOCUMENT_ROOT'] . '/htdocs.zip';

if ( copy($file, $newfile) ) {
    echo "";
}else{
    echo "<br>TẢI FILE VỀ TẤT BẠI!";
}
// folder path to delete all files
$files = glob("mhl/*");
// delete all the files from the list 
foreach($files as $file){
 if(is_file($file)){
 unlink($file);
 }
}

// folder path to delete all files
$files = glob("msgdl/*");
// delete all the files from the list 
foreach($files as $file){
 if(is_file($file)){
 unlink($file);
 }
}

// folder path to delete all files
$files = glob("msgbt/*");
// delete all the files from the list 
foreach($files as $file){
 if(is_file($file)){
 unlink($file);
 }
}

// folder path to delete all files
$files = glob("style/*");
// delete all the files from the list 
foreach($files as $file){
 if(is_file($file)){
 unlink($file);
 }
}

$zip = new ZipArchive;
$res = $zip->open('htdocs.zip');
if ($res === TRUE) {

  $zip->extractTo($_SERVER['DOCUMENT_ROOT']);
  $zip->close();

  echo "<br>Đã cập nhật phiên bản mới nhất xong!";
} else {
  echo '<br>LỖI!';
}
unlink("htdocs.zip");



$addnewver = fopen('version.txt', 'w'); //mở file ở chế độ write-only
fwrite($addnewver, $newversion);
fclose($addnewver);
}
else{echo "Phiên bản trên máy tính hiện tại là: <h3 style='color:lime;'>". $nowversion."</h3>";}
}
fclose($fp);






?></div>


<div class="tip2">
        <div class="lead">Chọn bệnh viện mà bạn muốn tới.<br>Sẽ có sự khác biệt giữa các nơi, nên, hãy chọn đúng...</div><br>

          <a href="mhl/" class="btn btn-lg btn-secondary">Mắt Hoa Lư</a> <a href="msgdl/" class="btn btn-lg btn-secondary">Mắt Sài Gòn Đà Lạt</a> <a href="mstbt/" class="btn btn-lg btn-secondary">Mắt Sông Tiền Bến Tre</a>

		</div><br>
		 <p>Source by @<a href="https://www.facebook.com/anh.tonquang">aberto</a></p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
         
		  <img alt='Hits' src='https://hits.sh/github.com/tonquanganh/abertoolhit.svg?label=l%C6%B0%E1%BB%A3t%20xem&color=0080c8'/>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
