<?php error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE); 

  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  { $url = "https://";   }
    else  
	{ $url = "http://";  } 
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
if (strpos($url, 'check-msgdl.php?id=2') !== false)
{    $title =  "MSGĐL - KIỂM TRA CONVERT - ABERTO TOOL"; }
elseif (strpos($url, 'check-msgdl.php?id=1') !== false)
{    $title =  "MSGĐL - KIỂM TRA ZIP GỐC - ABERTO TOOL"; }
elseif (strpos($url, 'check-msgdl.php?id=2') !== false)
{    $title =  "MSGĐL - KIỂM TRA ZIP CONVERT - ABERTO TOOL"; }
elseif (strpos($url, 'check-mhl.php?id=2') !== false)
{    $title =  "KIỂM TRA CONVERT - ABERTO TOOL"; }
elseif (strpos($url, 'check-mhl.php?id=1') !== false)
{    $title =  "KIỂM TRA ZIP GỐC - ABERTO TOOL"; }
elseif (strpos($url, 'convert.php') !== false)
{    $title =  "CONVERT - ABERTO TOOL"; }
elseif (strpos($url, 'upload.php') !== false)
{    $title =  "UPLOAD - ABERTO TOOL"; }
elseif (strpos($url, 'clear.php') !== false)
{    $title =  "CLEAR - ABERTO TOOL"; }
elseif (strpos($url, 'index.php') !== false)
{    $title =  "TRANG CHỦ ABERTO TOOL"; }
else 
{    $title =  "ABERTOOL FOR MSGDL"; }

$ver = '../version.txt';
if (file_exists($ver)) {
$fp = @fopen('../version.txt', "r");
$version = fread($fp, filesize('../version.txt'));
$note = 'Phiên bản:<b>'.$version."</b><br>Date: " . date ("d/m/Y", filemtime($ver));
}else{
echo 'none';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="/style/logo2.png">
    <title><?php echo $title ?></title>

    <meta name="description" content="MHL tool">
    <meta name="author" content="Aberto">
<style>.table td, .table th {
    padding: 0px !important;
    border: 1px solid #dee2e6 !important;
} .bground_mhl {
    background-color: #f8f9fc;
}
.table-info td, .table-info th {
    border: 1px solid #86cfda !important;
}
div {
  word-wrap: break-word;
}
.w-70 {
    width: 50%!important;
}
.h-90 {height: 90%!important;}
.row {
margin-right: 0px !important;
margin-left: 0px !important;
}.col {

 padding-right: 0px !important;
padding-left: 0px !important;
}

.bt5px {
  border-top: 5px solid #007bff;
}
.bt5px2 {
  border-top: 5px solid #20c997;
}

</style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!--> <link rel="stylesheet" media="all" href="style/style.css" /> <!-->

  </head>
  <body class="bground_mhl">
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand btn btn-secondary" href="/index.php " data-toggle="tooltip" data-placement="top" title="ABERTOOL for MSGĐL"><img class='pb-1' src="/style/logo2.png" height="30" alt="CoolBrand"> @MSGĐL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          KIỂM TRA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="check-msgdl.php?id=1" data-toggle="tooltip" data-placement="right" title="ZIP GỐC là ZIP bạn vừa mới UPLOAD xong, không sửa đổi. Nếu muốn kiểm tra tính đúng đắn của 1 zip, đơn giản là UPLOAD lên">[MSGĐL] 1. Kiểm tra Zip Gốc</a>
          <a class="dropdown-item" href="check-msgdl.php?id=2" data-toggle="tooltip" data-placement="right" title="KIỂM TRA ZIP CONVERT sẽ không bị nút XOÁ DỮ LIỆU ảnh hưởng, mà sẽ bị xoá rồi ghi đè nếu convert zip vừa upload">[MSGĐL] 2. Kiểm tra Zip Convert Gần đây nhất</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CHUYỂN ĐỔI
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="convert.php">[MSGĐL] 1. Convert [24.2.2023]</a>
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TẠO BẢNG .CSV
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="xuatdl-so-cstd.php">1. GỐC Xuất dữ liệu - CÔNG VIỆC</a>
		<a class="dropdown-item" href="xuatdl-so-cls.php">2.1. GỐC Xuất dữ liệu - CẬN LÂM SÀNG</a>
		<a class="dropdown-item" href="xuatdl-so-cls2.php">2.2. GỐC Xuất dữ liệu - CẬN LÂM SÀNG 2</a>
		<a class="dropdown-item" href="xuatdl-so-thuoc.php">3. GỐC Xuất dữ liệu - THUỐC</a>
		<a class="dropdown-item" href="xuatdl-so-dien-bien.php">4. GỐC Xuất dữ liệu - SỔ DIỄN BIẾN</a>
		<hr>
		<a class="dropdown-item" href="xuatdl-so-cstd.php?id=2">5. Xuất dữ liệu - CÔNG VIỆC</a>
		<a class="dropdown-item" href="xuatdl-so-cls.php?id=2">6.1. Xuất dữ liệu - CẬN LÂM SÀNG</a>
		<a class="dropdown-item" href="xuatdl-so-cls2.php?id=2">6.2. Xuất dữ liệu - CẬN LÂM SÀNG 2</a>
		<a class="dropdown-item" href="xuatdl-so-thuoc.php?id=2">7. Xuất dữ liệu - THUỐC</a>
		<a class="dropdown-item" href="xuatdl-so-dien-bien.php?id=2">8. Xuất dữ liệu - SỔ DIỄN BIẾN</a>
         </div>
      </li>
  <li class="nav-item">
        <a class="nav-link text-light btn btn-primary" href="upload.php">UPLOAD file .ZIP</a>
      </li>
    </ul>
	<span class="p-1 mr-5 nav-link small bg-success text-white" href="#" tabindex="-1" aria-disabled="true"><?php echo $note;?></li></span>
   <a class="btn btn-danger" href="clear.php" role="button">XÓA DỮ LIỆU</a>
  </div>
</nav>

<div >
<?php

include("count.php");

?>