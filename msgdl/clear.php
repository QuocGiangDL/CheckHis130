<?php
function recursiveRemove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
            if (is_dir($file)) recursiveRemove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}
recursiveRemove("130");
?>


<?php include 'style/header.php';?>
<div class="p-2 m-md-3 rounded shadow-sm bg-white">
Đã xoá files /4210/4210/*.xml<br>Đã xoá file xuất dữ liệu *.csv<br>Đã xoá file xuất dữ liệu *.zip
</div>
<?php include 'style/footer.php';?>
<?php
// folder path to delete all files
$files = glob("csv/*.csv");
// delete all the files from the list 
foreach($files as $file){
 if(is_file($file)){
 unlink($file);
 }
}
$files = glob("zip/*.zip");
// delete all the files from the list 
foreach($files as $file){
 if(is_file($file)){
 unlink($file);
 }
}
exit;
?>
