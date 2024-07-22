<?php
///// BẮT ĐẦU KHAI BÁO BIẾN VÀ FUNCION //////
include 'style/header.php';

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

if ($_GET['id'] == 2)
{
    $files = glob("xml/130/130/*.xml");
    $typecheck = "ZIP CONVERT MẮT SÀI GÒN ĐÀ LẠT";
}
else
{
    $files = glob("130/130/*.xml");
    $typecheck = "ZIP GỐC MẮT SÀI GÒN ĐÀ LẠT";
}

echo ' <style>

.gradient-custom {
    background: #f6d365;

background: linear-gradient(to bottom, #000000 0%, #33ccff 100%);
}</style><div class="p-2 m-md-3 rounded shadow-sm bg-white"><div class="alert alert-primary mb-0">
    <h4>Bạn đang kiểm tra <b>' . $typecheck . '</b>. Chúc bạn:
      <!-- Scroller Start -->  
      <div class="scroller">
        <span>
          <div class="textcontainer"><span class="particletext hearts">Đẩy cồng chỉ 1 lần</span></div>
          <div class="textcontainer"><span class="particletext bubbles">Về đúng giờ</span></div>
          <div class="textcontainer"><span class="particletext sunbeams">Nhanh chóng có bồ</span></div>
          <div class="textcontainer"><span class="particletext confetti">Không bị virus</span></div>
		  <div class="textcontainer"><span class="particletext confetti">Được tăng lương</span></div>
        </span>
      </div>
    </h4>
  </div></div>'
?>

<?php
$output = "output.txt";
$tdo = 0;
$txanh = 0;
$tcam = 0;
$cvdo = 0;
$cvxanh = 0;
$cvcam = 0;
foreach ($files as $file)
{
    $content1 = '';
    $content2 = '';
    $content3 = '';
    $content4 = '';
    $content5 = '';
    echo '<div class="p-2 mb-md-4 mb-4 m-md-3 rounded shadow bg-white each">';
    $content = file_get_contents($file);
    $filehosotext = tag_contents($content, "<FILEHOSO>", "</FILEHOSO>");
    foreach ($filehosotext as $filehoso)
    {
        $loaihs = tag_contents($filehoso, "<LOAIHOSO>", "</LOAIHOSO>");
        $loaihs = $loaihs[0];
        $noidungfile = tag_contents($filehoso, "<NOIDUNGFILE>", "</NOIDUNGFILE>");
        $noidungfile = $noidungfile[0];
        if ($loaihs == 'XML1')
        {
            $content1 = base64_decode($noidungfile);
        }
        if ($loaihs == 'XML2')
        {
            $content2 = base64_decode($noidungfile);
        }
        if ($loaihs == 'XML3')
        {
            $content3 = base64_decode($noidungfile);
        }
        if ($loaihs == 'XML4')
        {
            $content4 = base64_decode($noidungfile);
        }
        if ($loaihs == 'XML5')
        {
            $content5 = base64_decode($noidungfile);
        }
    }
	$loi_thieu_tt ='';
	$MA_DANTOC ='';
	$CAN_NANG ='';
	$LY_DO_VV ='';
	$DIA_CHI ='';
	$CHAN_DOAN_VAO ='';
	$CHAN_DOAN_RV ='';
    $tenbn = tag_contents($content1, "<HO_TEN>", "</HO_TEN>");
    $tenbn = $tenbn[0];
    $CHAN_DOAN_VAO = tag_contents($content1, "<CHAN_DOAN_VAO>", "</CHAN_DOAN_VAO>");
    $CHAN_DOAN_VAO = $CHAN_DOAN_VAO[0];
	$CHAN_DOAN_RV = tag_contents($content1, "<CHAN_DOAN_RV>", "</CHAN_DOAN_RV>");
    $CHAN_DOAN_RV = $CHAN_DOAN_RV[0];
	
    $namsinh = tag_contents($content1, "<NGAY_SINH>", "</NGAY_SINH>");
    $namsinh = $namsinh[0];
	
	$MA_DANTOC = tag_contents($content1, "<MA_DANTOC>", "</MA_DANTOC>");
    $MA_DANTOC = $MA_DANTOC[0];
	$CAN_NANG = tag_contents($content1, "<CAN_NANG>", "</CAN_NANG>");
    $CAN_NANG = $CAN_NANG[0];
	$LY_DO_VV = tag_contents($content1, "<LY_DO_VV>", "</LY_DO_VV>");
    $LY_DO_VV = $LY_DO_VV[0];
	$SO_CCCD = tag_contents($content1, "<SO_CCCD>", "</SO_CCCD>");
    $SO_CCCD = $SO_CCCD[0];
	$MA_NGHE_NGHIEP = tag_contents($content1, "<MA_NGHE_NGHIEP>", "</MA_NGHE_NGHIEP");
	$MA_NGHE_NGHIEP = $MA_NGHE_NGHIEP[0];
	
	
    $ngay_thanh_toan = tag_contents($content1, "<NGAY_TTOAN>", "</NGAY_TTOAN>");
    $ngay_thanh_toan = $ngay_thanh_toan[0];
    $ngay_thanh_toan_view = strtotime($ngay_thanh_toan);
    $ngay_thanh_toan_view = date('d/m/Y H:i', $ngay_thanh_toan_view);
    $DIA_CHI = tag_contents($content1, "<DIA_CHI><![CDATA[", "]]></DIA_CHI>");
    $DIA_CHI = $DIA_CHI[0];
    $MA_THE = tag_contents($content1, "<MA_THE_BHYT>", "</MA_THE_BHYT>");
    $MA_THE = $MA_THE[0];
    $MA_LK = tag_contents($content1, "<MA_LK>", "</MA_LK>");
    $MA_BN = tag_contents($content1, "<MA_BN>", "</MA_BN>");
    $MA_LK = $MA_LK[0];
    $MA_BN = $MA_BN[0];
    $namsinh = substr($namsinh, 0, 4);
    $namsinh = (int)$namsinh;
    $namnow = date("Y");
    $tuoibn = $namnow - $namsinh;
    $mabenh = tag_contents($content1, "<MA_BENH_CHINH>", "</MA_BENH_CHINH>");
    $mabenh = $mabenh[0];
    $mabenhkhac = tag_contents($content1, "<MA_BENH_KT>", "</MA_BENH_KT>");
    $mabenhkhac = $mabenhkhac[0];
    $ngayvao = tag_contents($content1, "<NGAY_VAO>", "</NGAY_VAO>");
    $ngayvao = $ngayvao[0];
    $ngayra = tag_contents($content1, "<NGAY_RA>", "</NGAY_RA>");
    $ngayra = $ngayra[0];
    $ngayvao_view = strtotime($ngayvao);
    $ngayvao_limit1 = date('Ymd', $ngayvao_view) . "0730";
    $ngayvao_limit2 = date('Ymd', $ngayvao_view) . "1200";
    $ngayvao_limit3 = date('Ymd', $ngayvao_view) . "1300";
    $ngayvao_limit4 = date('Ymd', $ngayvao_view) . "1630";
    $ngayvao_view = date('d/m/Y H:i', $ngayvao_view);
    $ngayra_view = strtotime($ngayra);
    $ngayra_view = date('d/m/Y H:i', $ngayra_view);
    $ma_loai_kcb = tag_contents($content1, "<MA_LOAI_KCB>", "</MA_LOAI_KCB>");
    $ma_loai_kcb = $ma_loai_kcb[0];
	if ($MA_DANTOC=='') {$loi_thieu_tt = "<span style='color:red' class='text-truncate'>THIẾU MÃ DÂN TỘC </span></br>";}
	if ($CAN_NANG=='') {$loi_thieu_tt = "<span style='color:red' class='text-truncate'>THIẾU CÂN NẶNG </span>";}
	
    echo '<div class="h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0 rounded">
            <div style="height: 150px;" class="rounded col-md-1 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="style/logoMSGDL.png"
                alt="Avatar" class="rounded img-fluid my-2" style="width: 150px;" />
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-11">
              <div class="  ">
				'.$loi_thieu_tt.'
			   <div class="row pt-1 ">
                  <div class="col-4">
                    <span class="text-primary bg-light"><b>' . $tenbn . '</b></span>
                  </div>
                  <div class="col-4">
                    <span class="text-dark">' . $namsinh.' | Mã dân tộc: ' .$MA_DANTOC.' | Cân nặng: ' .$CAN_NANG .'KG</span>
                  </div>
				   <div class="col-4">
                    <span class="text-dark">Lý do vào viện: ' . $LY_DO_VV  . '</span>
                  </div>
                </div> 
                <div class="row pt-1 ">
                  <div class="col-8">
                    <span class="text-dark">' . $DIA_CHI . '</span>
                  </div>
                  <div class="col-4">
                    <span class="text-dark">Mã BHYT: ' . $MA_THE . '</span>
                  </div>
                </div>
				 <div class="row pt-1">
				  <div class="col-4"><span class="text-dark">' . $file . '</span> </div>
				  <div class="col-4"><span class="text-dark"> Mã nghề nghiệp: ' . $MA_NGHE_NGHIEP . '</span> </div>
				  <div class="col-4"><span class="text-dark"> Số CCCD: ' . $SO_CCCD . '</span> </div>
				  </div>
                <div class="row pt-1">
                  <div class="col-4">

                    <span class="text-dark">Ngày vào: ' . $ngayvao_view . '</span>
                  </div>
                  <div class="col-4 ">

                    <span class="text-dark">Ngày ra: ' . $ngayra_view . '</span>';
    if ($ngayvao_limit1 > $ngayvao)
    {
        echo "<span style='color:red;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'> <b>LỖI GIỜ VÀO 1 </b></span><br>";
        $cvdo = $cvdo + 1;
    }
    if ($ngayvao_limit4 < $ngayvao)
    {
        echo "<span style='color:red;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'> <b>LỖI GIỜ VÀO 2</b></span><br>";
        $cvdo = $cvdo + 1;
    }
    if (($ngayvao_limit2 < $ngayvao) and ($ngayvao_limit3 > $ngayvao))
    {
        echo "<span style='color:red;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'> <b>LỖI GIỜ VÀO</b></span><br>";
        $cvdo = $cvdo + 1;
    }
	 if ($ngayvao > $ngayra)
    {
        echo "<span style='color:red;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'> <b>LỖI GIỜ VÀO</b></span><br>";
        $cvdo = $cvdo + 1;
    }

    echo '</div>
				   <div class="col-4">

                    <span class="text-dark">Ngày TT: ' . $ngay_thanh_toan_view . '</span>
                  </div>
                </div>
				
                <div class="row pt-1">
                  <div class="col-4 ">

                    <span class="text-dark">Mã BN: ' . $MA_BN . '</span>
                  </div>
                  <div class="col-4 ">

                    <span class="text-dark">Mã LK: ' . $MA_LK . '</span>
                  </div>

                </div>
				
				<div class="row pt-1">
                  <div class="col-4">
                    <span class="text-primary bg-light">CDVV: ' . $CHAN_DOAN_VAO . ' </span></br>
					<span class="text-primary bg-light">CDRV: '.$CHAN_DOAN_RV.'</span>
                  </div>
                  <div class="col-4">

                    <span class="text-primary bg-light">' . $mabenh . ';' . $mabenhkhac . '</span>';
    if (($tuoibn < 60) and (strpos($mabenh, 'H25') !== false) and (strpos($CHAN_DOAN_VAO, 'Đục th') !== false))
    {
        echo "<span style='color:red'><b>LỖI SAI MÃ ICD</b></span><br>";
        $cvdo = $cvdo + 1;
    }
    if (($tuoibn >= 60) and (strpos($mabenh, 'H26') !== false) and (strpos($CHAN_DOAN_VAO, 'Đục th') !== false))
    {
        echo "<span style='color:red'><b>LỖI SAI MÃ ICD</b></span><br>";
        $cvdo = $cvdo + 1;
    }
    echo '
                  </div>
				   <div class="col-4">

                    <span class="text-dark">Mã KCB: ' . $ma_loai_kcb . '</span>
                  </div>
                </div>
				
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 ';

    echo '<div class="col-sm-12 col-md-12 col-lg-12">';
    if ($content3)
    {
        $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
        $chitiets = is_array($chitiets) ? $chitiets : array();
        foreach ($chitiets as $chitiet)
        {
            $tendv = tag_contents($chitiet, "<TEN_DICH_VU>", "</TEN_DICH_VU>");
			if (empty($tendv)) {$tendv = tag_contents($chitiet, "<TEN_VAT_TU>", "</TEN_VAT_TU>");}
			$tendv = $tendv[0];
            $ngayyl_dv = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_dv = $ngayyl_dv[0];
			$ngaythyl_dv = tag_contents($chitiet, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $ngaythyl_dv = $ngaythyl_dv[0];

            if ((strpos($tendv, 'Phẫu thuật') !== false) or (strpos($tendv, 'PT') !== false) or (strpos($tendv, 'hẫu thuật mộng') !== false) or (strpos($tendv, 'ắt u ') !== false) or (strpos($tendv, 'Cắt bè ') !== false) or (strpos($tendv, 'Nối thông lệ') !== false))
            {
                $gio_chi_dinhpt = $ngayyl_dv;
				$gio_thuc_hienpt = $ngaythyl_dv;
            }
        }
    }
    if ($content5)
    {
		if (mb_substr($CHAN_DOAN_VAO, 0, 8, 'UTF-8') == 'MẮT PHẢI')
		{
			$matpt1 = 'mp';
		}
		elseif (mb_substr($CHAN_DOAN_VAO, 0, 8, 'UTF-8') == 'MẮT TRÁI')
		{
			$matpt1 = 'mt';
		}
		else
		{
			$matpt1 = '2m';
		}
        echo '<table style="width:100%" class="table table-hover"><thead class="table-info"><tr>
			<th class="col-1" scope="col" >#</th>
			<th class="col-1" scope="col">Mã LK</th>
			<th class="col-3" scope="col">Diễn biến</th>
			<th class="col-1" scope="col" >Giờ YL</th>
			<th class="col-1" scope="col" >Người T.H</th>
			<th class="col-5" scope="col" width="50%">Phẫu thuật</th>
			</tr></thead><tbody>';

        $chitiets = tag_contents($content5, "<CHI_TIET_DIEN_BIEN_BENH>", "</CHI_TIET_DIEN_BIEN_BENH>");
        $chitiets = is_array($chitiets) ? $chitiets : array();
        $demso = 0;
		
        foreach ($chitiets as $chitiet)
        {	$mabsi='';
			$loi = "";
			$loi2 = "";
            $ma_lk = tag_contents($chitiet, "<MA_LK>", "</MA_LK>");
            $ma_lk = $ma_lk[0];
            $dien_bien = tag_contents($chitiet, "<DIEN_BIEN_LS>", "</DIEN_BIEN_LS>");
            $dien_bien = $dien_bien[0];
            $matpt2 = substr($dien_bien, 0, 2);
            $matpt2 = strtolower($matpt2);
            $ngay_yl_xml5 = tag_contents($chitiet, "<THOI_DIEM_DBLS>", "</THOI_DIEM_DBLS>");
            $ngay_yl_xml5 = $ngay_yl_xml5[0];
            $ngay_yl_xml5_view = strtotime($ngay_yl_xml5);
            $ngay_yl_xml5_view_ngay = date('d/m/Y', $ngay_yl_xml5_view);
			$ngay_yl_xml5_view_gio = date('H:i', $ngay_yl_xml5_view);
            $phau_thuat = tag_contents($chitiet, "<PHAU_THUAT><![CDATA[", "]]></PHAU_THUAT>");
            $phau_thuat = $phau_thuat[0];
			$mabsi = tag_contents($chitiet, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");
                $mabsi = $mabsi[0];
			
				if ( $mabsi =='' ) {$loi2 = "<td style='color:red' class='text-truncate'>LỖI KHÔNG CÓ MÃ BS".$mabsi."</td>";}
				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}
				
			
            $demso = $demso + 1;
            
            if ($phau_thuat)

            {
                if ($gio_thuc_hienpt != $ngay_yl_xml5)
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red'>LỖI </td>";
                }
            }
            if ($ngayvao < $ngay_yl_xml5 and $ngayra > $ngay_yl_xml5)
            {
                $color = 'green';
                $txanh = $txanh + 1;
            }
            elseif ($ngayvao == $ngay_yl_xml5)
            {
                $color = 'orange';
                $tcam = $tcam + 1;
                $loi = "<td style='color:orange'>LỖI</td>";
            }
            elseif ($ngayra == $ngay_yl_xml5)
            {
                $color = 'orange';
                $tcam = $tcam + 1;
                $loi = "<td style='color:orange'>LỖI</td>";
            }

            else
            {
                $color = 'red';
                $tdo = $tdo + 1;
                $loi = "<td style='color:red'>LỖI ZZ</td>";
            }
            if (end($chitiets) == $chitiet and ($ngayra == $ngay_yl_xml5))
            {
                $color = 'green';
                $txanh = $txanh + 1;
                $tcam = $tcam - 1;
                $loi = "";
            }
            if (($content4) and ($matpt1 != $matpt2))
            {
                $color = 'red';
                $tdo = $tdo + 1;
                $loi = "<td style='color:red'>LỖI SAI MẮT</td>";
            }
            echo '<tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td >' . $ma_lk . '</td><td>' . $dien_bien . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngay_yl_xml5_view_ngay.'">' . $ngay_yl_xml5_view_gio . '</td><td>' . $mabsi . '</td><td style="white-space: pre-line;">' . $phau_thuat . '</td>'. $loi.$loi2 .'</tr>';

        }
        echo '</tbody></table>';
    }
    echo '</div></div>';

    if ($ma_loai_kcb == 3)
    { ////// CHỈNH SỬA NỘI TRÚ TẠI ĐÂY /////
        ########################      Thuốc     ##########################
        if ($content3)
        {
            echo '<div class="row"><div class="col-sm-8 col-md-8 col-xl-8">';
        }

        if ($content2)
        {
            echo '<table class="table table-hover">
		<thead class="table-info">
		<tr>
		<th class="col-1" scope="col">#</th>
		<th class="col-3" scope="col">Thuốc</th>
		<th class="col-4" scope="col">Liều dùng</th>
		<th class="col-2" scope="col">Giờ chỉ định</th>
		<th class="col-2" scope="col">BS ra toa</th></tr></thead><tbody>';
            $chitiets = tag_contents($content2, "<CHI_TIET_THUOC>", "</CHI_TIET_THUOC>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $tenthuoc = tag_contents($chitiet, "<TEN_THUOC>", "</TEN_THUOC>");
                $lieudung = tag_contents($chitiet, "<LIEU_DUNG>", "</LIEU_DUNG>");
                $ngayyl_thuoc = tag_contents($chitiet, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
                $ngayyl_thuoc = $ngayyl_thuoc[0];
                $ngayyl_thuoc_view = strtotime($ngayyl_thuoc);
				$ngayyl_thuoc_view_gio = date('H:i', $ngayyl_thuoc_view);
				$ngayyl_thuoc_view_ngay = date('d/m/Y', $ngayyl_thuoc_view);
				$mabsi = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
                $mabsi = $mabsi[0];
				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}
                if ($ngayvao < $ngayyl_thuoc and $ngayra > $ngayyl_thuoc)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange'>LỖI</td>";
                }
                elseif ($ngayra == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange'>LỖI</td>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red'>LỖI</td>";
                }
                echo '<tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td class="text-truncate">' . $tenthuoc[0] . '</td><td class="text-truncate" style="max-width: 50px;" data-toggle="tooltip" data-placement="top" data-original-title="'.$lieudung[0].'">' . $lieudung[0] . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_thuoc_view_ngay.'" >' . $ngayyl_thuoc_view_gio . '</td><td >' . $mabsi . '</td>'. $loi .'</tr>';
            }
            echo '</tbody></table>';
        }
        ########################      Công việc     ##########################
        if ($content3)
        {
            $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            foreach ($chitiets as $chitiet)
            {
                if ((strpos($chitiet, 'Bơm rửa lệ') !== false))
                {
                    $ngaykq_rualedao = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                    $ngaykq_rualedao = $ngaykq_rualedao[0];
                }
				 if ((strpos($chitiet, 'Rửa cùng đồ') !== false))
                {
                    $ngaykq_ruacungdo = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                    $ngaykq_ruacungdo = $ngaykq_ruacungdo[0];
                }
            }
        }

        if ($content3)
        {
            echo '<table class="table table-hover">
  <thead class="table-info" >
    <tr>
      <th class="col-1" scope="col">#</th>
      <th class="col-5" scope="col">Công việc</th>
      <th class="col-1" scope="col">Giờ YL</th>
	  <th class="col-1" scope="col">Giờ TH</th>
      <th class="col-1" scope="col">Giờ KQ</th>
      <th class="col-2" scope="col">BS TH</th>
    </tr>
  </thead>
  <tbody>';
            $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {	$mabsi='';
                $loi = "";
				$loi2 = "";
                $demso = $demso + 1;
                $tendv = tag_contents($chitiet, "<TEN_DICH_VU>", "</TEN_DICH_VU>");
				if (empty($tendv)) {$tendv = tag_contents($chitiet, "<TEN_VAT_TU>", "</TEN_VAT_TU>");}
				$tendv = $tendv[0];
                $mabsi = tag_contents($chitiet, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");
                $mabsi = $mabsi[0];
				if ( $mabsi =='' ) {$loi2 = "<td style='color:red' class='text-truncate'>LỖI KHÔNG CÓ MÃ BS</td>";}
				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}
				
                $ngayyl_dv = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_dv = $ngayyl_dv[0];
				$ngaythyl_dv = tag_contents($chitiet, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
                $ngaythyl_dv = $ngaythyl_dv[0];
                $ngaykq_dv = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngaykq_dv = $ngaykq_dv[0];
                $ngayyl_dv_view = strtotime($ngayyl_dv);
                $ngayyl_dv_view_gio = date('H:i', $ngayyl_dv_view);
				$ngayyl_dv_view_ngay = date('d/m/Y', $ngayyl_dv_view);
				
				$ngaythyl_dv_view = strtotime($ngaythyl_dv);
                $ngaythyl_dv_view_gio = date('H:i', $ngaythyl_dv_view);
				$ngaythyl_dv_view_ngay = date('d/m/Y', $ngaythyl_dv_view);
				
                $ngaykq_dv_view = strtotime($ngaykq_dv);
                $ngaykq_dv_view_gio = date('H:i', $ngaykq_dv_view);
				$ngaykq_dv_view_ngay = date('d/m/Y', $ngaykq_dv_view);
                
				if ($ngaykq_dv == $ngayyl_dv)
                {
                    $color = 'orange';
                    $cvcam = $cvcam + 1;
                    $loi = " <td style='color:orange' class='text-truncate'>LỖI TRÙNG</td>";
                }
				elseif (($ngaykq_dv - $ngayyl_dv) <= 3)
                {
                    $color = 'DarkViolet';
                    $cvcam = $cvcam + 1;
                    $loi = " <td style='color:#9400D3;' class='text-truncate' data-toggle='tooltip' data-placement='top' data-original-title='Làm quá nhanh ≤ 3P' >NHANH</td>";
                }

				elseif ($ngayvao <= $ngayyl_dv && $ngayyl_dv <= $ngaythyl_dv && $ngaythyl_dv < $ngaykq_dv && $ngaykq_dv <= $ngayra)
				
                {
                    $color = 'green';
                    $cvxanh = $cvxanh + 1;
                }
                else
                {
                    $color = 'red';
                    $cvdo = $cvdo + 1;
                    $loi = " <td style='color:red' class='text-truncate'>LỖI GIỜ NỘI TRÚ</td>";
                }
                if ((strpos($tendv, 'Phẫu thuật tán nhuyễn') !== false) or (strpos($tendv, 'Thủy tinh thể') !== false) or (strpos($tendv, 'TTT') !== false) or (strpos($tendv, 'Nối thông lệ mũi') !== false))
                {
                    if ($ngayyl_dv < $ngaykq_rualedao)
                    {
                        $color = 'red';
                        $cvdo = $cvdo + 1;
                        $loi = " <td style='color:red' class='text-truncate'>LỖI RLĐ</td>";
                    }
                    if (!((strpos($mabsi, 'Bs Mai') !== false) or (strpos($mabsi, 'Bs Đông') !== false) or (strpos($mabsi, 'Bs Hoa') !== false) or (strpos($mabsi, 'Bs Sơn') !== false) or (strpos($mabsi, 'Bs Kiền') !== false) or (strpos($mabsi, 'Bs Thảo') !== false) or (strpos($mabsi, 'Bs Linh') !== false) or (strpos($mabsi, 'Bs Long') !== false)))
                    {
                        $color = 'red';
                        $cvdo = $cvdo + 1;
                        $loi = " <td style='color:red' class='text-truncate'>LỖI BS MỔ</td>";
                    }

                }
				 if ((strpos($tendv, 'Phẫu thuật mộng') !== false) or (strpos($tendv, 'Cắt u') !== false) or (strpos($tendv, 'Phẫu thuật quặm') !== false))
                {
                    if ($ngayyl_dv < $ngaykq_ruacungdo)
                    {
                        $color = 'red';
                        $cvdo = $cvdo + 1;
                        $loi = " <td style='color:red' class='text-truncate'>LỖI RCĐ</td>";
                    }
                   

                }
		
				
                echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td class="text-truncate" style="max-width: 150px;" data-toggle="tooltip" data-placement="top" data-original-title="'.$tendv.'">' . $tendv . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_dv_view_ngay.'" >' . $ngayyl_dv_view_gio . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngaythyl_dv_view_ngay.'">'. $ngaythyl_dv_view_gio .'</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngaykq_dv_view_ngay.'">' . $ngaykq_dv_view_gio . '</td><td>' . $mabsi . '</td>'. $loi .$loi2.'</tr>';
            }
            echo '</tbody></table></div>';
        }
        ########################      Cận lâm sàng     ##########################
        if ($content4)
        {
            echo '<div class="col-sm-4 col-md-4 col-lg-4">
			<table class="table table-hover">
  <thead class="table-info">
    <tr>
      <th class="col-1" scope="col">#</th>
      <th class="col-5" scope="col">Xét nghiệm</th>
      <th class="col-3" scope="col">KQ</th>
      <th class="col-3" scope="col">Giờ KQ</th>
    </tr>
  </thead>
  <tbody>';
            $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $ten_chiso = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
                $ten_chiso = $ten_chiso[0];
                $kq_xn = tag_contents($chitiet, "<GIA_TRI><![CDATA[", "]]></GIA_TRI>");
                $kq_xn = $kq_xn[0];
                $ngayyl_xn = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngayyl_xn = $ngayyl_xn[0];
                $ngayyl_xn_view = strtotime($ngayyl_xn);
				$ngayyl_xn_view_gio = date('H:i', $ngayyl_xn_view);
				$ngayyl_xn_view_ngay = date('d/m/Y', $ngayyl_xn_view);
                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn and $gio_chi_dinhpt > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
					$loi = "<td style='color:orange' class='text-truncate'>LỖI</td>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI</td>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red;' class='text-truncate'>LỖI KHÔNG TRONG GIỜ VÀO RA</BR>HOẶC MỔ RỒI MỚI XN</td>";
                }
                if ((strpos($ten_chiso, 'Glucose') !== false) or (strpos($ten_chiso, 'Creatinine') !== false) or (strpos($ten_chiso, 'Số lượng bạch cầu(WBC)') !== false) or (strpos($ten_chiso, 'Lympho(LYM)%)') !== false) or (strpos($ten_chiso, 'NEU%') !== false) or (strpos($ten_chiso, 'NEU#') !== false) or (strpos($ten_chiso, 'Số lượng hồng cầu (RBC)') !== false) or (strpos($ten_chiso, 'Huyết sắc tố(HGB)') !== false) or (strpos($ten_chiso, 'Hematocrit(HCT)') !== false) or (strpos($ten_chiso, 'Thể tích trung bình hồng cầu(MCV)') !== false) or (strpos($ten_chiso, 'Lượng HST trung bình hồng cầu(MCH)') !== false) or (strpos($ten_chiso, 'Nồng độ  HST trung bình HC(MCHC)') !== false) or (strpos($ten_chiso, 'Số lượng tiểu cầu(PLT)') !== false) or (strpos($ten_chiso, 'Dải phân bố kích thước tiểu cầu ( PDW)') !== false) or (strpos($ten_chiso, 'TS(máu chảy)') !== false) or (strpos($ten_chiso, 'TC(máu đông)') !== false) or (strpos($ten_chiso, 'Đo khúc xạ giác mạc Javal') !== false) or (strpos($ten_chiso, 'Đo nhãn áp') !== false) or (strpos($ten_chiso, 'Đo công suất thể thủy tinh nhân tạo bằng siêu âm') !== false))
                {
                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td class="text-truncate" style="max-width: 50px;">' . $ten_chiso . '</td><td>' . $kq_xn . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_xn_view_ngay.'">' . $ngayyl_xn_view_gio . '</td>'. $loi .'</tr>';
                }
            }
            echo '</tbody></table></div>';
        }

        if ($content4)
        {
            echo '<table class="table table-hover" >
  <thead class="table-info">
    <tr>
      <th class="col-1" scope="col">#</th>
	  <th class="col-2" scope="col">Tên chỉ số</th>
      <th class="col-4" scope="col">Mô tả</th>
      <th class="col-4" scope="col">KL</th>
      <th class="col-1" scope="col">Giờ KQ</th>
    </tr>
  </thead>
  <tbody>';
            $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $ten_chiso = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
                $ten_chiso = $ten_chiso[0];
                $mota_sa = tag_contents($chitiet, "<MO_TA><![CDATA[", "]]></MO_TA>");
                $mota_sa = $mota_sa[0];
                $kl_sa = tag_contents($chitiet, "<KET_LUAN><![CDATA[", "]]></KET_LUAN>");
                $kl_sa = $kl_sa[0];
                $ngayyl_xn = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngayyl_xn = $ngayyl_xn[0];
                $ngayyl_xn_view = strtotime($ngayyl_xn);
                $ngayyl_xn_view_gio = date('H:i', $ngayyl_xn_view);
				$ngayyl_xn_view_ngay = date('d/m/Y', $ngayyl_xn_view);
                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI</td>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI</td>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red' class='text-truncate'>LỖI GIỜ XN<td>";
                }
                if ((strpos($ten_chiso, 'Siêu âm mắt') !== false) or (strpos($ten_chiso, 'OCT') !== false) or (strpos($ten_chiso, 'Chụp đáy mắt') !== false) or (strpos($ten_chiso, 'Soi đáy mắt') !== false))
                {

                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th><td>' . $ten_chiso . '</td><td class="text-truncate">' . $mota_sa . '</td><td>' . $kl_sa . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_xn_view_ngay.'">' . $ngayyl_xn_view_gio . '</td>'. $loi .'</tr>';
                }
            }
            echo '</tbody></table>';

        }
        echo '';
    }
    else
    {
        ////// CHỈNH SỬA NGOẠI TRÚ TẠI ĐÂY /////
        ########################      Thuốc     ##########################
        if ($content3)
        {
            echo '<div class="row"><div class="col-sm-8 col-md-8 col-xl-8">';
        }

        if ($content2)
        {
            echo '<table class="table table-hover">
		<thead class="table-info">
		<tr><th class="col-1" scope="col">#</th><th scope="col-3">Thuốc</th>
		<th class="col-4" scope="col">Liều dùng</th>
		<th class="col-2" scope="col">Giờ chỉ định</th>
		<th class="col-2" scope="col">BS ra toa</th></tr></thead><tbody>';
            $chitiets = tag_contents($content2, "<CHI_TIET_THUOC>", "</CHI_TIET_THUOC>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            $ngayyl_thuoc = "";
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $tenthuoc = tag_contents($chitiet, "<TEN_THUOC>", "</TEN_THUOC>");
                $lieudung = tag_contents($chitiet, "<LIEU_DUNG>", "</LIEU_DUNG>");
                $ngayyl_thuoc = tag_contents($chitiet, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
                $ngayyl_thuoc = $ngayyl_thuoc[0];
                $ngayyl_thuoc_view = strtotime($ngayyl_thuoc);
                $ngayyl_thuoc_view_gio = date('H:i', $ngayyl_thuoc_view);
				$ngayyl_thuoc_view_ngay = date('d/m/Y', $ngayyl_thuoc_view);
				$mabsi = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
                $mabsi = $mabsi[0];
				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}
                if ($ngayvao < $ngayyl_thuoc and $ngayra > $ngayyl_thuoc)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI</td>";
                }
                elseif ($ngayra == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI</td>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red' class='text-truncate'>LỖI GIỜ THUỐC</td>";
                }
                 echo '<tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td class="text-truncate">' . $tenthuoc[0] . '</td><td class="text-truncate" style="max-width: 50px;" data-toggle="tooltip" data-placement="top" data-original-title="'.$lieudung[0].'">' . $lieudung[0] . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_thuoc_view_ngay.'" >' . $ngayyl_thuoc_view_gio . '</td><td >' . $mabsi . '</td>'. $loi .'</tr>';
            }
            echo '</tbody></table>';
            if ($ngayyl_thuoc)
            {
                $ngayra = $ngayyl_thuoc;
            }
        }
        ########################      Công việc     ##########################
        if ($content3)
        {
            echo '<table class="table table-hover ">
		<thead class="table-info"><tr>
      <th class="col-1" scope="col">#</th>
      <th class="col-5" scope="col" width="50%">Công việc</th>
      <th class="col-1" scope="col">Giờ YL</th>
	  <th class="col-1" scope="col">Giờ TH</th>
      <th class="col-1" scope="col">Giờ KQ</th>
      <th class="col-2" scope="col">BS TH</th>
		</tr></thead><tbody>';
            $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {	$mabsi='';
                $loi = "";
				$loi2 = "";
                $demso = $demso + 1;
                $tendv = tag_contents($chitiet, "<TEN_DICH_VU>", "</TEN_DICH_VU>");
				if (empty($tendv)) {$tendv = tag_contents($chitiet, "<TEN_VAT_TU>", "</TEN_VAT_TU>");}
				$tendv = $tendv[0];
                $mabsi = tag_contents($chitiet, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");
                $mabsi = $mabsi[0];
				if ( $mabsi =='' ) {$loi2 = "<td style='color:red' class='text-truncate'>LỖI KHÔNG CÓ MÃ BS".$mabsi."</td>";}
				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}
				
                $ngayyl_dv = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_dv = $ngayyl_dv[0];
				$ngaythyl_dv = tag_contents($chitiet, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
                $ngaythyl_dv = $ngaythyl_dv[0];
                $ngaykq_dv = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngaykq_dv = $ngaykq_dv[0];
                $ngayyl_dv_view = strtotime($ngayyl_dv);
                $ngayyl_dv_view_gio = date('H:i', $ngayyl_dv_view);
				$ngayyl_dv_view_ngay = date('d/m/Y', $ngayyl_dv_view);
				
				$ngaythyl_dv_view = strtotime($ngaythyl_dv);
                $ngaythyl_dv_view_gio = date('H:i', $ngaythyl_dv_view);
				$ngaythyl_dv_view_ngay = date('d/m/Y', $ngaythyl_dv_view);
				
                $ngaykq_dv_view = strtotime($ngaykq_dv);
                $ngaykq_dv_view_gio = date('H:i', $ngaykq_dv_view);
				$ngaykq_dv_view_ngay = date('d/m/Y', $ngaykq_dv_view);

               
                if ($ngaykq_dv == $ngayyl_dv)
                {
                    $color = 'orange';
                    $cvcam = $cvcam + 1;
                    $loi = " <td style='color:orange' class='text-truncate'>LỖI TRÙNG</td>";
                }
				elseif (($ngaykq_dv - $ngayyl_dv) <= 3)
                {
                    $color = 'DarkViolet';
                    $cvcam = $cvcam + 1;
                    $loi = " <td style='color:#9400D3' class='text-truncate' data-toggle='tooltip' data-placement='top' data-original-title='Làm quá nhanh ≤ 3P' >NHANH</td>";
                }
				
				elseif ($ngayvao <= $ngayyl_dv && $ngayyl_dv <= $ngaythyl_dv && $ngaythyl_dv < $ngaykq_dv && $ngaykq_dv <= $ngayra)
				
                {	
                    $color = 'green';
                    $cvxanh = $cvxanh + 1;
                }
                else
                {
                    $color = 'red';
                    $cvdo = $cvdo + 1;
                    $loi = " <td style='color:red;' class='text-truncate'  data-toggle='tooltip' data-placement='top' data-original-title='Giờ TT: VÀO ≤ YL ≤ THYL < KQ ≤ RA = THUỐC' >LỖI GIỜ NGOẠI TRÚ</td>";
                }
	
			
               echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td class="text-truncate" style="max-width: 150px;" data-toggle="tooltip" data-placement="top" data-original-title="'.$tendv.'">' . $tendv . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_dv_view_ngay.'" >' . $ngayyl_dv_view_gio . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngaythyl_dv_view_ngay.'">'. $ngaythyl_dv_view_gio .'</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngaykq_dv_view_ngay.'">' . $ngaykq_dv_view_gio . '</td><td>' . $mabsi . '</td>'. $loi .$loi2.'</tr>';
            }
            echo '</tbody></table></div>';
        }
        ########################      Cận lâm sàng     ##########################
        

        if ($content4)
        {
            echo '<div class="col-sm-4 col-md-4 col-lg-4"><table class="table table-hover">
  <thead class="table-info">
    <tr>
      <th class="col-1" scope="col">#</th>
      <th class="col-5" scope="col">Xét nghiệm</th>
      <th class="col-3" scope="col">KQ</th>
      <th class="col-3" scope="col">Giờ KQ</th>
    </tr>
  </thead>
  <tbody>';
            $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $ten_chiso = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
                $ten_chiso = $ten_chiso[0];
                $kq_xn = tag_contents($chitiet, "<GIA_TRI><![CDATA[", "]]></GIA_TRI>");
                $kq_xn = $kq_xn[0];
                $ngayyl_xn = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngayyl_xn = $ngayyl_xn[0];
                $ngayyl_xn_view = strtotime($ngayyl_xn);
                $ngayyl_xn_view_gio = date('H:i', $ngayyl_xn_view);
				$ngayyl_xn_view_ngay = date('d/m/Y', $ngayyl_xn_view);
                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI<td>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI<td>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red' class='text-truncate'>LỖI KHÔNG TRONG GIỜ VÀO RA<td>";
                }
                if ((strpos($ten_chiso, 'Glucose') !== false) or (strpos($ten_chiso, 'Creatinine') !== false) or (strpos($ten_chiso, 'Số lượng bạch cầu(WBC)') !== false) or (strpos($ten_chiso, 'Lympho(LYM)%)') !== false) or (strpos($ten_chiso, 'NEU%') !== false) or (strpos($ten_chiso, 'NEU#') !== false) or (strpos($ten_chiso, 'Số lượng hồng cầu (RBC)') !== false) or (strpos($ten_chiso, 'Huyết sắc tố(HGB)') !== false) or (strpos($ten_chiso, 'Hematocrit(HCT)') !== false) or (strpos($ten_chiso, 'Thể tích trung bình hồng cầu(MCV)') !== false) or (strpos($ten_chiso, 'Lượng HST trung bình hồng cầu(MCH)') !== false) or (strpos($ten_chiso, 'Nồng độ  HST trung bình HC(MCHC)') !== false) or (strpos($ten_chiso, 'Số lượng tiểu cầu(PLT)') !== false) or (strpos($ten_chiso, 'Dải phân bố kích thước tiểu cầu ( PDW)') !== false) or (strpos($ten_chiso, 'TS(máu chảy)') !== false) or (strpos($ten_chiso, 'TC(máu đông)') !== false) or (strpos($ten_chiso, 'Đo khúc xạ giác mạc Javal') !== false) or (strpos($ten_chiso, 'Đo nhãn áp') !== false) or (strpos($ten_chiso, 'Đo công suất thể thủy tinh nhân tạo bằng siêu âm') !== false))
                {
                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th> <td class="text-truncate" style="max-width: 50px;">' . $ten_chiso . '</td><td>' . $kq_xn . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_xn_view_ngay.'">' . $ngayyl_xn_view_gio . '</td>'. $loi .'</tr>';
                }
            }
            echo '</tbody></table></div>';
        }

        if ($content4)
        {
            echo '<table class="table table-hover m-3" >
  <thead class="table-info">
    <tr>
      <th class="col-1" scope="col">#</th>
	  <th class="col-2" scope="col">Tên chỉ số</th>
      <th class="col-4" scope="col">Mô tả</th>
      <th class="col-4" scope="col">KL</th>
      <th class="col-1" scope="col">Giờ KQ</th>
    </tr>
  </thead>
  <tbody>';
            $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $ten_chiso = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
                $ten_chiso = $ten_chiso[0];
                $mota_sa = tag_contents($chitiet, "<MO_TA><![CDATA[", "]]></MO_TA>");
                $mota_sa = $mota_sa[0];
                $kl_sa = tag_contents($chitiet, "<KET_LUAN><![CDATA[", "]]></KET_LUAN>");
                $kl_sa = $kl_sa[0];
                $ngayyl_xn = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngayyl_xn = $ngayyl_xn[0];
                $ngayyl_xn_view = strtotime($ngayyl_xn);
                               $ngayyl_xn_view_gio = date('H:i', $ngayyl_xn_view);
				$ngayyl_xn_view_ngay = date('d/m/Y', $ngayyl_xn_view);
                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI<td>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<td style='color:orange' class='text-truncate'>LỖI<td>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<td style='color:red' class='text-truncate'>LỖI C<td>";
                }
                if ((strpos($ten_chiso, 'Siêu âm mắt') !== false) or (strpos($ten_chiso, 'OCT') !== false) or (strpos($ten_chiso, 'Chụp đáy mắt') !== false) or (strpos($ten_chiso, 'Soi đáy mắt') !== false))
                {

                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . '</th><td>' . $ten_chiso . '</td><td class="text-truncate" >' . $mota_sa . '</td><td>' . $kl_sa . '</td><td data-toggle="tooltip" data-placement="top" data-original-title="'.$ngayyl_xn_view_ngay.'">' . $ngayyl_xn_view_gio . '</td>'. $loi .'</tr>';
                }
            }
            echo '</tbody></table>';

        }
    }

    echo '</div></div>';

}
echo '<div class="p-2 m-md-3 rounded shadow-sm bg-white"><div class="alert alert-success mb-0" role="alert">
  <div class="row">
    <div class="col">
     <b>Thuốc + CLS</b>
     <div class="font-weight-bold" style="color:green">' . $txanh . '</div>
     <div class="font-weight-bold" style="color:red">' . $tdo . '</div>
     <div class="font-weight-bold" style="color:orange">' . $tcam . '</div>
    </div>
    <div class="col">
     <b>Công việc:</b>
     <div class="font-weight-bold" style="color:green">' . $cvxanh . '</div>
     <div class="font-weight-bold" style="color:red">' . $cvdo . '</div>
     <div class="font-weight-bold" style="color:orange">' . $cvcam . '</div>
    </div>
  </div>
  </div></div>';
?>

<?php
include 'style/footer.php';
?>
