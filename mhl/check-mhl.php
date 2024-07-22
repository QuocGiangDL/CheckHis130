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
    $files = glob("xml/4210/4210/*.xml");
    $typecheck = "ZIP CONVERT MẮT HOA LƯ";
}
else
{
    $files = glob("4210/4210/*.xml");
    $typecheck = "ZIP GỐC MẮT HOA LƯ";
}

echo '<style>.gradient-custom {
    background: #f6d365;
background: linear-gradient(to bottom right, #ffcccc 8%, #99ccff 100%);
}</style> <div class="p-2 m-md-3 rounded shadow-sm bg-white"><div class="alert alert-primary mb-0">
    <h4>Bạn đang kiểm tra <b>' . $typecheck . '</b>. Chúc bạn:
      <!-- Scroller Start -->  
      <div class="scroller">
        <span>
          <div class="textcontainer"><span class="particletext hearts">Đẩy cồng chỉ 1 lần</span></div>
          <div class="textcontainer"><span class="particletext bubbles">Về đúng giờ</span></div>
          <div class="textcontainer"><span class="particletext sunbeams">Đá bóng trời ko mưa</span></div>
          <div class="textcontainer"><span class="particletext confetti">Không bị virus</span></div>
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
    $gio_phau_thuat = '';
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
    $tenbn = tag_contents($content1, "<HO_TEN><![CDATA[", "]]></HO_TEN>");
    $tenbn = $tenbn[0];
    $tenbenh = tag_contents($content1, "<TEN_BENH><![CDATA[", "]]></TEN_BENH>");
    $tenbenh = $tenbenh[0];
    $namsinh = tag_contents($content1, "<NGAY_SINH>", "</NGAY_SINH>");
    $namsinh = $namsinh[0];
    $namsinh = substr($namsinh, 0, 4);
    $namsinh = (int)$namsinh;
    $namnow = date("Y");
    $tuoibn = $namnow - $namsinh;
    $mabenh = tag_contents($content1, "<MA_BENH>", "</MA_BENH>");
    $mabenh = $mabenh[0];
    $mabenhkhac = tag_contents($content1, "<MA_BENHKHAC>", "</MA_BENHKHAC>");
    $mabenhkhac = $mabenhkhac[0];
    $DIA_CHI = tag_contents($content1, "<DIA_CHI><![CDATA[", "]]></DIA_CHI>");
    $DIA_CHI = $DIA_CHI[0];
    $MA_THE = tag_contents($content1, "<MA_THE>", "</MA_THE>");
    $MA_THE = $MA_THE[0];
    $MA_LK = tag_contents($content1, "<MA_LK>", "</MA_LK>");
    $MA_BN = tag_contents($content1, "<MA_BN>", "</MA_BN>");
    $MA_LK = $MA_LK[0];
    $MA_BN = $MA_BN[0];
    $ngay_thanh_toan = tag_contents($content1, "<NGAY_TTOAN>", "</NGAY_TTOAN>");
    $ngay_thanh_toan = $ngay_thanh_toan[0];
    $ngay_thanh_toan_view = strtotime($ngay_thanh_toan);
    $ngay_thanh_toan_view = date('d/m/Y H:i', $ngay_thanh_toan_view);
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

    echo '<div class="h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0 rounded ">
            <div style="height: 150px;" class=" rounded col-md-1 gradient-custom text-center text-white "
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="style/ava.png"
                alt="Avatar" class="rounded img-fluid my-2" style="width: 150px;" />
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-11">
              <div class="  ">

			   <div class="row pt-1 ">
                  <div class="col-4">
                    <span class="text-primary bg-light"><b>' . $tenbn . '</b></span>
                  </div>
                  <div class="col-4">
                    <span class="text-dark">' . $namsinh . '</span>
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
				  <div class="col-12"><span class="text-dark">' . $file . '</span> </div></div>
                <div class="row pt-1">
                  <div class="col-4">

                    <span class="text-dark">Ngày vào: ' . $ngayvao_view . '</span>
                  </div>
                  <div class="col-4 ">

                    <span class="text-dark">Ngày ra: ' . $ngayra_view . '</span>';

    if ($ngayvao_limit4 < $ngayvao)
    {
        echo "<span style='color:red'> <b>LỖI GIỜ VÀO SAU 16h30</b></span><br>";
        $cvdo = $cvdo + 1;
    }
    if (($ngayvao_limit2 < $ngayvao) and ($ngayvao_limit3 > $ngayvao))
    {
        echo "<span style='color:red'> <b>LỖI GIỜ VÀO TRONG 12-13h</b></span><br>";
        $cvdo = $cvdo + 1;
    }
	 if ($ngayvao > $ngayra)
    {
        echo "<span style='color:red'> <b>LỖI GIỜ VÀO > RA </b></span><br>";
        $cvdo = $cvdo + 1;
    }

    echo '
                  </div>
				   <div class="col-4">

                    <span class="text-dark">Ngày TT: ' . $ngay_thanh_toan_view . '</span>
                  </div>
                </div>
				
                <div class="row pt-1">
                  <div class="col-4 ">

                    <span class="text-dark">Mã BN: ' . $MA_BN . '</span>
                  </div>
                  <div class="col-4 ">

                    <span class="text-dark">Mã KL: ' . $MA_LK . '</span>
                  </div>

                </div>
				
				<div class="row pt-1">
                  <div class="col-4">

                    <span class="text-primary bg-light">' . $tenbenh . '</span>
                  </div>
                  <div class="col-4">

                    <span class="text-primary bg-light">' . $mabenh . ';' . $mabenhkhac . '</span>';
    if (($tuoibn < 60) and (strpos($mabenh, 'H25') !== false) and (strpos($tenbenh, 'Đục th') !== false))
    {
        echo "<span style='color:red'><b>LỖI SAI MÃ ICD</b></span><br>";
        $cvdo = $cvdo + 1;
    }
    if (($tuoibn >= 60) and (strpos($mabenh, 'H26') !== false) and (strpos($tenbenh, 'Đục th') !== false))
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
  </div>';

    echo '<div class="col-sm-12 col-md-12 col-lg-12">';
    if ($content3)
    {
        $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
        $chitiets = is_array($chitiets) ? $chitiets : array();
        foreach ($chitiets as $chitiet)
        {
            $tendv = tag_contents($chitiet, "<TEN_DICH_VU><![CDATA[", "]]></TEN_DICH_VU>");
            $tendv = $tendv[0];
            $ngayyl_dv = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_dv = $ngayyl_dv[0];

            if ((strpos($tendv, 'Phẫu thuật') !== false) or (strpos($tendv, 'PT') !== false) or (strpos($tendv, 'Rửa chất') !== false) or (strpos($tendv, 'hẫu thuật mộng') !== false) or (strpos($tendv, 'ắt u ') !== false) or (strpos($tendv, 'chỉnh, xoay, lấy') !== false) or (strpos($tendv, 'háo dầu') !== false) or (strpos($tendv, 'Cắt dịch kính') !== false) or (strpos($tendv, 'Cắt bè ') !== false) or (strpos($tendv, 'Nối thông lệ') !== false) or (strpos($tendv, 'Ghép da hay vạt da') !== false))
            {
                $gio_phau_thuat = $ngayyl_dv;
            }
        }
    }
    if ($content5)
    {
        $matpt1 = substr($tenbenh, 0, 2);
        $matpt1 = strtolower($matpt1);
        echo '<table style="width:100%" class="table table-hover "><thead class="table-info"><tr>
			<th scope="col" >#</th>
			<th scope="col">Mã LK</th>
			<th scope="col">Diễn biến</th>
			<th scope="col" >Giờ YL</th>
			<th scope="col" width="50%">Phẫu thuật</th>
			</tr></thead><tbody>';

        $chitiets = tag_contents($content5, "<CHI_TIET_DIEN_BIEN_BENH>", "</CHI_TIET_DIEN_BIEN_BENH>");
        $chitiets = is_array($chitiets) ? $chitiets : array();
        $demso = 0;
        foreach ($chitiets as $chitiet)
        {

            $ma_lk = tag_contents($chitiet, "<MA_LK>", "</MA_LK>");
            $ma_lk = $ma_lk[0];
            $dien_bien = tag_contents($chitiet, "<DIEN_BIEN><![CDATA[", "]]></DIEN_BIEN>");
            $dien_bien = $dien_bien[0];
            $matpt2 = substr($dien_bien, 0, 2);
            $matpt2 = strtolower($matpt2);
            $ngay_yl_xml5 = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngay_yl_xml5 = $ngay_yl_xml5[0];
            $ngay_yl_xml5_view = strtotime($ngay_yl_xml5);
            $ngay_yl_xml5_view = date('d/m/Y H:i', $ngay_yl_xml5_view);
            $phau_thuat = tag_contents($chitiet, "<PHAU_THUAT><![CDATA[", "]]></PHAU_THUAT>");
            $phau_thuat = $phau_thuat[0];
            $demso = $demso + 1;
            $loi = "";

            if ($phau_thuat)

            {
                if ($gio_phau_thuat != $ngay_yl_xml5)
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI</span>";
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
                $loi = "<span style='color:orange'>LỖI</span>";
            }
            elseif ($ngayra == $ngay_yl_xml5)
            {
                $color = 'orange';
                $tcam = $tcam + 1;
                $loi = "<span style='color:orange'>LỖI</span>";
            }

            else
            {
                $color = 'red';
                $tdo = $tdo + 1;
                $loi = "<span style='color:red'>LỖI</span>";
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
                if ($matpt2 == "2m")
                {
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI SAI MẮT</span>";
                }
            }

            echo '<tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th> <td >' . $ma_lk . '</td><td>' . $dien_bien . '</td><td>' . $ngay_yl_xml5_view . '</td><td style="white-space: pre-line;">' . $phau_thuat . '</td></tr>';

        }

        echo '</tbody></table>';
    }
    echo '</div>';

    if ($ma_loai_kcb == 3)
    { ////// CHỈNH SỬA NỘI TRÚ TẠI ĐÂY /////
        ########################      Thuốc     ##########################
        if ($content3)
        {
            echo '<div class="row"><div class="col-sm-6 col-md-6 col-lg-6">';
        }

        if ($content2)
        {
            echo '<table class="table table-hover">
		<thead class="table-info">
		<tr>
		<th class="col-1" scope="col">#</th>
		<th class="col-3" scope="col">Thuốc</th>
		<th class="col-6" scope="col">Liều dùng</th>
		<th class="col-2" scope="col">Giờ chỉ định</th></tr></thead><tbody>';
            $chitiets = tag_contents($content2, "<CHI_TIET_THUOC>", "</CHI_TIET_THUOC>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $tenthuoc = tag_contents($chitiet, "<TEN_THUOC><![CDATA[", "]]></TEN_THUOC>");
                $lieudung = tag_contents($chitiet, "<LIEU_DUNG><![CDATA[", "]]></LIEU_DUNG>");
                $ngayyl_thuoc = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_thuoc = $ngayyl_thuoc[0];
                $ngayyl_thuoc_view = strtotime($ngayyl_thuoc);
                $ngayyl_thuoc_view = date('d/m/Y H:i', $ngayyl_thuoc_view);
                if ($ngayvao < $ngayyl_thuoc and $ngayra > $ngayyl_thuoc)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI</span>";
                }
                elseif ($ngayra == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI</span>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI</span>";
                }
                echo '<tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th> <td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $tenthuoc[0] . '</td><td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $lieudung[0] . '</td><td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $ngayyl_thuoc_view . '</td></tr>';
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
            echo '<table class="table table-hover ">
  <thead class="table-info" >
    <tr>
      <th class="col-1" scope="col">#</th>
      <th class="col-5" scope="col" width="50%">Công việc</th>
      <th class="col-2" scope="col">Giờ YL</th>
      <th class="col-2" scope="col">Giờ KQ</th>
      <th class="col-2" scope="col">BS</th>
    </tr>
  </thead>
  <tbody>';
            $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $loi = "";
                $demso = $demso + 1;
                $tendv = tag_contents($chitiet, "<TEN_DICH_VU><![CDATA[", "]]></TEN_DICH_VU>");
                $tendv = $tendv[0];
                $mabsi = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
                $mabsi = $mabsi[0];

				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}
			
                $ngayyl_dv = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_dv = $ngayyl_dv[0];
                $ngaykq_dv = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngaykq_dv = $ngaykq_dv[0];
                $ngayyl_dv_view = strtotime($ngayyl_dv);
                $ngayyl_dv_view = date('d/m/Y H:i', $ngayyl_dv_view);
                $ngaykq_dv_view = strtotime($ngaykq_dv);
                $ngaykq_dv_view = date('d/m/Y H:i', $ngaykq_dv_view);
         
                if ($ngaykq_dv == $ngayyl_dv)
                {
                    $color = 'orange';
                    $cvcam = $cvcam + 1;
                    $loi = " <span style='color:orange'>LỖI TRÙNG</span>";
                }
				elseif ((($ngaykq_dv) - ($ngayyl_dv)) <= 3)
                {
                    $color = 'DarkViolet';
                    $cvcam = $cvcam + 1;
                    $loi = " <span style='color:DarkViolet '><= 3P</span>";
                }
				elseif ($ngaykq_dv > $ngayyl_dv and $ngaykq_dv >= $ngayvao and $ngaykq_dv <= $ngayra and $ngayyl_dv >= $ngayvao and $ngayyl_dv <= $ngayra)
                {
                    $color = 'green';
                    $cvxanh = $cvxanh + 1;
                }
                else
                {
                    $color = 'red';
                    $cvdo = $cvdo + 1;
                    $loi = " <span style='color:red'>LỖI VÀO RA X</span>";
                }
                if ((strpos($tendv, 'Phẫu thuật tán nhuyễn') !== false) or (strpos($tendv, 'Thủy tinh thể') !== false) or (strpos($tendv, 'TTT') !== false) or (strpos($tendv, 'Nối thông lệ mũi') !== false))
                {
                    if ($ngayyl_dv < $ngaykq_rualedao)
                    {
                        $color = 'red';
                        $cvdo = $cvdo + 1;
                        $loi = " <span style='color:red'>LỖI RLĐ</span>";
                    }
                    if (!((strpos($mabsi, 'Bs Mai') !== false) or (strpos($mabsi, 'Bs Đông') !== false) or (strpos($mabsi, 'Bs Hoa') !== false) or (strpos($mabsi, 'Bs Sơn') !== false) or (strpos($mabsi, 'Bs Kiền') !== false) or (strpos($mabsi, 'Bs Thảo') !== false) or (strpos($mabsi, 'Bs Linh') !== false) or (strpos($mabsi, 'Bs Tiên') !== false)))
                    {
                        $color = 'red';
                        $cvdo = $cvdo + 1;
                        $loi = " <span style='color:red'>LỖI BS MỔ</span>";
                    }

                }
				 if ((strpos($tendv, 'Phẫu thuật mộng') !== false) or (strpos($tendv, 'Cắt u') !== false) or (strpos($tendv, 'Phẫu thuật quặm') !== false))
                {
                    if ($ngayyl_dv < $ngaykq_ruacungdo)
                    {
                        $color = 'red';
                        $cvdo = $cvdo + 1;
                        $loi = " <span style='color:red'>LỖI RCĐ</span>";
                    }
                   

                }
                echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th> <td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $tendv . '</td><td>' . $ngayyl_dv_view . '</td><td>' . $ngaykq_dv_view . '</td><td>' . $mabsi . '</td></tr>';
            }
            echo '</tbody></table></div>';
        }
        ########################      Cận lâm sàng     ##########################
        if ($content4)
        {
            echo '<div class="col-sm-6 col-md-6 col-lg-6"><table class="table table-hover">
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
                $ngayyl_xn_view = date('d/m/Y H:i', $ngayyl_xn_view);

                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn and $gio_phau_thuat > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI KHÔNG TRONG GIỜ VÀO RA</BR>HOẶC MỔ RỒI MỚI XN<span>";
                }
                if ((strpos($ten_chiso, 'Glucose') !== false) or (strpos($ten_chiso, 'Creatinine') !== false) or (strpos($ten_chiso, 'Số lượng bạch cầu(WBC)') !== false) or (strpos($ten_chiso, 'Lympho(LYM)%)') !== false) or (strpos($ten_chiso, 'NEU%') !== false) or (strpos($ten_chiso, 'NEU#') !== false) or (strpos($ten_chiso, 'Số lượng hồng cầu (RBC)') !== false) or (strpos($ten_chiso, 'Huyết sắc tố(HGB)') !== false) or (strpos($ten_chiso, 'Hematocrit(HCT)') !== false) or (strpos($ten_chiso, 'Thể tích trung bình hồng cầu(MCV)') !== false) or (strpos($ten_chiso, 'Lượng HST trung bình hồng cầu(MCH)') !== false) or (strpos($ten_chiso, 'Nồng độ  HST trung bình HC(MCHC)') !== false) or (strpos($ten_chiso, 'Số lượng tiểu cầu(PLT)') !== false) or (strpos($ten_chiso, 'Dải phân bố kích thước tiểu cầu ( PDW)') !== false) or (strpos($ten_chiso, 'TS(máu chảy)') !== false) or (strpos($ten_chiso, 'TC(máu đông)') !== false) or (strpos($ten_chiso, 'Đo khúc xạ giác mạc Javal') !== false) or (strpos($ten_chiso, 'Đo nhãn áp') !== false) or (strpos($ten_chiso, 'Soi đáy mắt trực tiếp') !== false) or (strpos($ten_chiso, 'Đo công suất thể thủy tinh nhân tạo bằng siêu âm') !== false))
                {
                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th> <td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $ten_chiso . '</td><td>' . $kq_xn . '</td><td>' . $ngayyl_xn_view . '</td></tr>';
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
                $ngayyl_xn_view = date('d/m/Y H:i', $ngayyl_xn_view);

                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI C<span>";
                }
                if ((strpos($ten_chiso, 'Siêu âm mắt') !== false) or (strpos($ten_chiso, 'OCT') !== false) or (strpos($ten_chiso, 'Chụp đáy mắt') !== false) or (strpos($ten_chiso, 'Soi đáy mắt') !== false))
                {

                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th><td>' . $ten_chiso . '</td><td style=" text-overflow:ellipsis; overflow: hidden;">' . $mota_sa . '</td><td>' . $kl_sa . '</td><td>' . $ngayyl_xn_view . '</td></tr>';
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
            echo '<div class="row"><div class="col-sm-6 col-md-6 col-lg-6">';
        }

        if ($content2)
        {
            echo '<table class="table table-hover">
		<thead class="table-info">
		<tr><th scope="col">#</th><th scope="col">Thuốc</th>
		<th scope="col">Liều dùng</th>
		<th scope="col">Giờ chỉ định</th></tr></thead><tbody>';
            $chitiets = tag_contents($content2, "<CHI_TIET_THUOC>", "</CHI_TIET_THUOC>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            $ngayyl_thuoc = "";
            foreach ($chitiets as $chitiet)
            {
                $demso = $demso + 1;
                $loi = "";
                $tenthuoc = tag_contents($chitiet, "<TEN_THUOC><![CDATA[", "]]></TEN_THUOC>");
                $lieudung = tag_contents($chitiet, "<LIEU_DUNG><![CDATA[", "]]></LIEU_DUNG>");
                $ngayyl_thuoc = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_thuoc = $ngayyl_thuoc[0];
                $ngayyl_thuoc_view = strtotime($ngayyl_thuoc);
                $ngayyl_thuoc_view = date('d/m/Y H:i', $ngayyl_thuoc_view);
                if ($ngayvao < $ngayyl_thuoc and $ngayra > $ngayyl_thuoc)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI</span>";
                }
                elseif ($ngayra == $ngayyl_thuoc)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI</span>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI D</span>";
                }
                echo '<tr style="color:' . $color . '" ><td scope="row">' . $demso . $loi . '</th> <td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $tenthuoc[0] . '</td><td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $lieudung[0] . '</td><td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $ngayyl_thuoc_view . '</td></tr>';
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
      <th class="col-2" scope="col">Giờ YL</th>
      <th class="col-2" scope="col">Giờ KQ</th>
      <th class="col-2" scope="col">BS</th>
		</tr></thead><tbody>';
            $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
            $chitiets = is_array($chitiets) ? $chitiets : array();
            $demso = 0;
            foreach ($chitiets as $chitiet)
            {
                $loi = "";
                $demso = $demso + 1;
                $tendv = tag_contents($chitiet, "<TEN_DICH_VU><![CDATA[", "]]></TEN_DICH_VU>");
                $tendv = $tendv[0];
                $mabsi = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
                $mabsi = $mabsi[0];
				$mabsis = explode (";", $mabsi); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$mabsi = str_replace($mabs, $ma_cchn[$mabs], $mabsi);
				}

                $ngayyl_dv = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_dv = $ngayyl_dv[0];
                $ngaykq_dv = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
                $ngaykq_dv = $ngaykq_dv[0];
                $ngayyl_dv_view = strtotime($ngayyl_dv);
                $ngayyl_dv_view = date('d/m/Y H:i', $ngayyl_dv_view);
                $ngaykq_dv_view = strtotime($ngaykq_dv);
                $ngaykq_dv_view = date('d/m/Y H:i', $ngaykq_dv_view);

				if ($ngaykq_dv == $ngayyl_dv)
                {
                    $color = 'orange';
                    $cvcam = $cvcam + 1;
                    $loi = " <span style='color:orange'>LỖI TRÙNG</span>";
                }
				elseif (($ngaykq_dv - $ngayyl_dv) <= 3)
                {
                    $color = 'DarkViolet';
                    $cvcam = $cvcam + 1;
                    $loi = " <span style='color:#9400D3'>NHANH <= 3P</span>";
                }
                elseif ($ngaykq_dv > $ngayyl_dv and $ngaykq_dv >= $ngayvao and $ngaykq_dv <= $ngayra and $ngayyl_dv >= $ngayvao and $ngayyl_dv <= $ngayra)
                {
                    $color = 'green';
                    $cvxanh = $cvxanh + 1;
                }
                else
                {
                    $color = 'red';
                    $cvdo = $cvdo + 1;
                    $loi = " <span style='color:red'>LỖI VÀO RA HOẶC LỖI ĐƠN THUỐC TRƯỚC GIỜ TT</span>";
                }

                echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th> <td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $tendv . '</td><td>' . $ngayyl_dv_view . '</td><td>' . $ngaykq_dv_view . '</td><td>' . $mabsi . '</td></tr>';
            }
            echo '</tbody></table></div>';
        }
        ########################      Cận lâm sàng     ##########################
        

        if ($content4)
        {
            echo '<div class="col-sm-6 col-md-6 col-lg-6"><table class="table table-hover">
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
                $ngayyl_xn_view = date('d/m/Y H:i', $ngayyl_xn_view);

                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI KHÔNG TRONG GIỜ VÀO RA<<span>";
                }
                if ((strpos($ten_chiso, 'Glucose') !== false) or (strpos($ten_chiso, 'Creatinine') !== false) or (strpos($ten_chiso, 'Số lượng bạch cầu(WBC)') !== false) or (strpos($ten_chiso, 'Lympho(LYM)%)') !== false) or (strpos($ten_chiso, 'NEU%') !== false) or (strpos($ten_chiso, 'NEU#') !== false) or (strpos($ten_chiso, 'Số lượng hồng cầu (RBC)') !== false) or (strpos($ten_chiso, 'Huyết sắc tố(HGB)') !== false) or (strpos($ten_chiso, 'Hematocrit(HCT)') !== false) or (strpos($ten_chiso, 'Thể tích trung bình hồng cầu(MCV)') !== false) or (strpos($ten_chiso, 'Lượng HST trung bình hồng cầu(MCH)') !== false) or (strpos($ten_chiso, 'Nồng độ  HST trung bình HC(MCHC)') !== false) or (strpos($ten_chiso, 'Số lượng tiểu cầu(PLT)') !== false) or (strpos($ten_chiso, 'Dải phân bố kích thước tiểu cầu ( PDW)') !== false) or (strpos($ten_chiso, 'TS(máu chảy)') !== false) or (strpos($ten_chiso, 'TC(máu đông)') !== false) or (strpos($ten_chiso, 'Đo khúc xạ giác mạc Javal') !== false) or (strpos($ten_chiso, 'Đo nhãn áp') !== false) or (strpos($ten_chiso, 'Soi đáy mắt trực tiếp') !== false) or (strpos($ten_chiso, 'Đo công suất thể thủy tinh nhân tạo bằng siêu âm') !== false))
                {
                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th> <td style=" text-overflow:ellipsis; overflow: hidden;max-width:1px;">' . $ten_chiso . '</td><td>' . $kq_xn . '</td><td>' . $ngayyl_xn_view . '</td></tr>';
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
                $ngayyl_xn_view = date('d/m/Y H:i', $ngayyl_xn_view);

                if ($ngayvao < $ngayyl_xn and $ngayra > $ngayyl_xn)
                {
                    $color = 'green';
                    $txanh = $txanh + 1;
                }
                elseif ($ngayvao == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                elseif ($ngayra == $ngayyl_xn)
                {
                    $color = 'orange';
                    $tcam = $tcam + 1;
                    $loi = "<span style='color:orange'>LỖI<span>";
                }
                else
                {
                    $color = 'red';
                    $tdo = $tdo + 1;
                    $loi = "<span style='color:red'>LỖI C<span>";
                }
                if ((strpos($ten_chiso, 'Siêu âm mắt') !== false) or (strpos($ten_chiso, 'OCT') !== false) or (strpos($ten_chiso, 'Chụp đáy mắt') !== false) or (strpos($ten_chiso, 'Soi đáy mắt') !== false))
                {

                    echo ' <tr style="color:' . $color . '" ><th scope="row">' . $demso . $loi . '</th><td>' . $ten_chiso . '</td><td style=" text-overflow:ellipsis; overflow: hidden;">' . $mota_sa . '</td><td>' . $kl_sa . '</td><td>' . $ngayyl_xn_view . '</td></tr>';
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
