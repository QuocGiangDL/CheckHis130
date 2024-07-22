
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="style/font.js"></script><script src="style/js.js"></script>
  </body>
  <?php
  function tag_contents2($string, $tag_open, $tag_close)
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
$newversion = tag_contents2($lines_string, "@1@", "@2@"); $newversion = $newversion[0];

$fp = @fopen('../version.txt', "r");
if (!$fp) {echo 'File not found';}
else
{$nowversion = fread($fp, filesize('../version.txt'));}

if ($nowversion != $newversion)
{echo '
<div id="myModal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">CẤP BÁO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
       Đã có bản cập nhật mới <b>'.$newversion . '</b>.
      </div>
 <div class="modal-footer">
        <script type="text/javascript">
         <!--
            function Redirect() {
               window.location="/index.php";
            }
            
            document.write("... Hệ thống bắt buộc tự động cập nhật sau 2s.");
            setTimeout("Redirect()", 2000);
         //-->
      </script>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $("#myModal").modal("show").modal("handleUpdate");
    });
</script>


';}
echo "<div class='float-right'>";
echo "<img alt='Hits' src='https://hits.sh/github.com/tonquanganh/abertoolhit.svg?label=l%C6%B0%E1%BB%A3t%20xem&color=0080c8'/>";
echo '</div>';
?>
</html>
<div id="scroll-container">
  <div id="scroll-text">Một công cụ nhỏ dành tặng cho những con người làm việc muộn nhất công ty. :D<div>
</div>
</div>

