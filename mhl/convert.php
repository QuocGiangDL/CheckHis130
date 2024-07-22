<?php
include 'style/header.php';
?>

<?php
function str_replace_first($search, $replace, $subject)
{
    $search = '/' . preg_quote($search, '/') . '/';
    return preg_replace($search, $replace, $subject, 1);
}

function recursiveRemove($dir)
{
    $structure = glob(rtrim($dir, "/") . '/*');
    if (is_array($structure))
    {
        foreach ($structure as $file)
        {
            if (is_dir($file)) recursiveRemove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}

function convert_vi_to_en($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
    return $str;
}
$nhom_1 = array(
    "T",
    "D",
    "E",
    "L",
    "S",
    "Z"
);
$nhom_2 = array(
    "B",
    "G",
    "I",
    "M",
    "Y",
    "V"
);
$nhom_3 = array(
    "C",
    "N",
    "P",
    "Q",
    "X",
    "U"
);
$nhom_4 = array(
    "A",
    "O",
    "H",
    "K",
    "F",
    "R",
    "W"
);

recursiveRemove("xml/4210/4210");
mkdir("xml/4210/4210");
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
$i = 0;
$j = 0;
$ngaykq_btld = '';
$ngayyl_btld = '';
$check_bomthong = 0;
$files = glob("4210/4210/*.xml");
$output = "output.txt";
$tdo = 0;
$txanh = 0;
$tcam = 0;
$cvdo = 0;
$cvxanh = 0;
$cvcam = 0;
foreach ($files as $file)
{
    $check_pt_tannhuyen = 0;
    $da_lam = 0;
    $phoihop = 0;
    $content1 = '';
    $content2 = '';
    $content3 = '';
    $content4 = '';
    $content3mod = '';
    $content2mod = '';
    $content4mod = '';
    $ngaykqsa = '';
    $ngaykq_oct = '';
    $ngaykqiol = '';
    $ngaykq_chupdaymat = '';
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
    }
    $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
    $catbe = 0;
    $catdichkinh = 0;
    $mobaosaubangpt = 0;
    $tenbn = tag_contents($content1, "<HO_TEN><![CDATA[", "]]></HO_TEN>");
    $tenbn = $tenbn[0];
    $ma_loai_kcb = tag_contents($content1, "<MA_LOAI_KCB>", "</MA_LOAI_KCB>");
    $ma_loai_kcb = $ma_loai_kcb[0];
    $chucai_tenbn = trim(convert_vi_to_en($tenbn));
    $chucai_tenbn = explode(" ", $chucai_tenbn);
    $chucai_tenbn = end($chucai_tenbn);
	  foreach ($chitiets as $chitiet)
    {
	 if (strpos($chitiet, 'Cắt bè') !== false)
        {

            $catbe = 1;
            $da_lam = 1;
          
        }
	}
	 foreach ($chitiets as $chitiet)
    {
	 if (strpos($chitiet, 'Cắt dịch kính') !== false)
        {

            $catdichkinh = 1;
            $da_lam = 1;
          
        }
	}
	 foreach ($chitiets as $chitiet)
    {
	 if (strpos($chitiet, 'Phẫu thuật bong võng mạc, cắt dịch kính') !== false)
        {

            $bvm_catdichkinh = 1;
            $da_lam = 1;
          
        }
	}
	 foreach ($chitiets as $chitiet)
    {
	 if (strpos($chitiet, 'Mở bao sau bằng phẫu thuật') !== false)
        {

            $mobaosaubangpt = 1;
            $da_lam = 1;
          
        }
	}
    foreach ($chitiets as $chitiet)
    {
        if ((strpos($chitiet, 'Phẫu thuật mộng') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_mong = strtotime($ngayyl_pt[0]) + 900;
            $ngaykq_pt_mong = date('YmdHi', $ngaykq_pt_mong);
            $da_lam = 1;
        }
        if ((strpos($chitiet, 'Phẫu thuật đặt thể thủy tinh nhân tạo (IOL) thì 2') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_datiolthi2 = strtotime($ngayyl_pt[0]) + 900;
            $ngaykq_pt_datiolthi2 = date('YmdHi', $ngaykq_pt_datiolthi2);
            $da_lam = 1;
        }
        if ((strpos($chitiet, 'Đặt van dẫn lưu tiền phòng điều trị') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_istent = strtotime($ngayyl_pt[0]) + 1500;
            $ngaykq_pt_istent = date('YmdHi', $ngaykq_pt_istent);
            $da_lam = 1;
        }
		if ((strpos($chitiet, 'Khâu giác mạc') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_khau_giac_mac = strtotime($ngayyl_pt[0]) + 900;
            $ngaykq_pt_khau_giac_mac = date('YmdHi', $ngaykq_pt_khau_giac_mac);
            $da_lam = 1;
        }
		if ((strpos($chitiet, 'Ghép da hay vạt da') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_ghepdadieutrihomi = strtotime($ngayyl_pt[0]) + 1200;
            $ngaykq_pt_ghepdadieutrihomi = date('YmdHi', $ngaykq_pt_ghepdadieutrihomi);
            $da_lam = 1;
        }
        if ((strpos($chitiet, 'Cắt màng xuất tiết diện đồng tử, cắt màng đồng tử') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_mangtruocdiendongtu = strtotime($ngayyl_pt[0]) + 1200;
            $ngaykq_pt_mangtruocdiendongtu = date('YmdHi', $ngaykq_pt_mangtruocdiendongtu);
            $da_lam = 1;
        }
        if ((strpos($chitiet, 'Tháo đai độn củng mạc') !== false) or (strpos($chitiet, 'Tháo dầu') !== false) or (strpos($chitiet, 'Phẫu thuật quặm') !== false) or (strpos($chitiet, 'Cắt u da mi') !== false) or (strpos($chitiet, 'Cắt bỏ túi lệ') !== false) or (strpos($chitiet, 'Cắt u kết mạc') !== false))
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $ngaykq_pt_quam = strtotime($ngayyl_pt[0]) + 1200;
            $ngaykq_pt_quam = date('YmdHi', $ngaykq_pt_quam);
            $da_lam = 1;
        }

        if (strpos($chitiet, 'Nối thông lệ mũi') !== false)
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $da_lam = 1;
            $ngaykq_pt_noithonglemui = strtotime($ngayyl_pt[0]) + 1800;
            $ngaykq_pt_noithonglemui = date('YmdHi', $ngaykq_pt_noithonglemui);
        }
		if (strpos($chitiet, 'Phẫu thuật làm hẹp khe mi, rút ngắn') !== false)
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $da_lam = 1;
            $ngaykq_pt_lamhepkhemi = strtotime($ngayyl_pt[0]) + 1800;
            $ngaykq_pt_lamhepkhemi = date('YmdHi', $ngaykq_pt_lamhepkhemi);
        }
        if (strpos($chitiet, 'Cắt bè') !== false)
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $catbe = 1;
            $da_lam = 1;
            $ngaykq_pt_catbe = strtotime($ngayyl_pt[0]) + 900;
            $ngaykq_pt_catbe = date('YmdHi', $ngaykq_pt_catbe);
        }
        if (strpos($chitiet, 'Cắt dịch kính') !== false)
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $catdichkinh = 1;
            $da_lam = 1;
            if (in_array($chucai_tenbn[0], $nhom_1))
            {
                $random_catdk = 48;
            }
            if (in_array($chucai_tenbn[0], $nhom_2))
            {
                $random_catdk = 50;
            }
            if (in_array($chucai_tenbn[0], $nhom_3))
            {
                $random_catdk = 52;
            }
            if (in_array($chucai_tenbn[0], $nhom_4))
            {
                $random_catdk = 53;
            }
            $ngaykq_pt_catdichkinh = strtotime($ngayyl_pt[0]) + $random_catdk * 60;
            $ngaykq_pt_catdichkinh = date('YmdHi', $ngaykq_pt_catdichkinh);
        }
        if (strpos($chitiet, 'Phẫu thuật bong võng mạc, cắt dịch kính') !== false)
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $bvm_catdichkinh = 1;
            $da_lam = 1;
            if (in_array($chucai_tenbn[0], $nhom_1))
            {
                $random_catdk = 48;
            }
            if (in_array($chucai_tenbn[0], $nhom_2))
            {
                $random_catdk = 50;
            }
            if (in_array($chucai_tenbn[0], $nhom_3))
            {
                $random_catdk = 52;
            }
            if (in_array($chucai_tenbn[0], $nhom_4))
            {
                $random_catdk = 53;
            }
            $ngaykq_pt_bvm_cdk = strtotime($ngayyl_pt[0]) + $random_catdk * 60;
            $ngaykq_pt_bvm_cdk = date('YmdHi', $ngaykq_pt_bvm_cdk);
        }

        if (strpos($chitiet, 'Mở bao sau bằng phẫu thuật') !== false)
        {
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 5400;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt//
            $mobaosaubangpt = 1;
            $da_lam = 1;
            $ngaykq_pt_mobaosaubangpt = strtotime($ngayyl_pt[0]) + 1800;
            $ngaykq_pt_mobaosaubangpt = date('YmdHi', $ngaykq_pt_mobaosaubangpt);
        }
        if ((strpos($chitiet, 'Phẫu thuật tán nhuyễn') !== false))
        {
            $check_pt_tannhuyen = 1;
            $ngayyl_pt = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $ngayyl_thuoc_new = strtotime($ngayyl_pt[0]) + 3600;
            $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
            //kq pt ttt//
            if (in_array($chucai_tenbn[0], $nhom_1))
            {
                $time_pt_ttt = 7;
            }
            if (in_array($chucai_tenbn[0], $nhom_2))
            {
                $time_pt_ttt = 8;
            }
            if (in_array($chucai_tenbn[0], $nhom_3))
            {
                $time_pt_ttt = 9;
            }
            if (in_array($chucai_tenbn[0], $nhom_4))
            {
                $time_pt_ttt = 10;
            }
            $ngaykq_pt_ttt = strtotime($ngayyl_pt[0]) + $time_pt_ttt * 60;
            $ngaykq_pt_ttt = date('YmdHi', $ngaykq_pt_ttt);
            $da_lam = 1;
            if ($catbe == 1)
            {
                $ngayyl_pt_catbe = strtotime($ngaykq_pt_ttt) + 60;
                $ngayyl_pt_catbe = date('YmdHi', $ngayyl_pt_catbe);
                $ngaykq_pt_catbe = strtotime($ngayyl_pt_catbe) + 900;
                $ngaykq_pt_catbe = date('YmdHi', $ngaykq_pt_catbe);
                $phoihop = 1;
            }
            if ($catdichkinh == 1)
            {
                $ngayyl_pt_catdichkinh = strtotime($ngaykq_pt_ttt) + 60;
                $ngayyl_pt_catdichkinh = date('YmdHi', $ngayyl_pt_catdichkinh);
                $ngaykq_pt_catdichkinh = strtotime($ngaykq_pt_ttt) + 3300;
                $ngaykq_pt_catdichkinh = date('YmdHi', $ngaykq_pt_catdichkinh);
                $phoihop = 1;
            }
            if ($bvm_catdichkinh == 1)
            {
                $ngayyl_pt_bvm_cdk = strtotime($ngaykq_pt_ttt) + 60;
                $ngayyl_pt_bvm_cdk = date('YmdHi', $ngayyl_pt_bvm_cdk);
                $ngaykq_pt_bvm_cdk = strtotime($ngaykq_pt_ttt) + 3300;
                $ngaykq_pt_bvm_cdk = date('YmdHi', $ngaykq_pt_bvm_cdk);
                $phoihop = 1;
            }
            if ($mobaosaubangpt == 1)
            {
                $ngayyl_pt_mobaosaubangpt = strtotime($ngaykq_pt_ttt) + 60;
                $ngayyl_pt_mobaosaubangpt = date('YmdHi', $ngayyl_pt_mobaosaubangpt);
                $ngaykq_pt_mobaosaubangpt = strtotime($ngaykq_pt_ttt) + 1800;
                $ngaykq_pt_mobaosaubangpt = date('YmdHi', $ngaykq_pt_mobaosaubangpt);
                $phoihop = 1;
            }
        }
    }
    $ngayravien = tag_contents($content1, "<NGAY_RA>", "</NGAY_RA>");
    ///// BẮT ĐẦU CHỈNH XML4 /////
    if ($ma_loai_kcb == 3 or $ma_loai_kcb == 9)
    {
        ///// BẮT ĐẦU CHỈNH NỘI TRÚ TẠI ĐÂY /////
        $medrolcheck = 0;
        $tazandocheck = 0;
		$kq_glucose ="";
		$kq_creatinine ="";
		$kq_tsmauchay="";
		$kq_tongpt_tbmnv ="";
		$ngay_thanh_toan = tag_contents($content1, "<NGAY_TTOAN>", "</NGAY_TTOAN>");
		$content1mod = str_replace('<NGAY_TTOAN>' . $ngay_thanh_toan[0] . '</NGAY_TTOAN>', '<NGAY_TTOAN>' . $ngayravien[0] . '</NGAY_TTOAN>', $content1);
		
		$chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
        foreach ($chitiets as $chitiet)
        {$tenxetnghiem = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
		$ngaykqxn = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>"); $ngaykqxn = $ngaykqxn[0];

		if ((strpos($chitiet, 'Glucose') !== false))
		{
			$kq_glucose = $ngaykqxn;
		}
		if ((strpos($chitiet, 'Creatinine') !== false))
		{
			$kq_creatinine = $ngaykqxn;
		}
		if ((strpos($chitiet, 'TS(máu chảy)') !== false))
		{
			$kq_tsmauchay = $ngaykqxn;
		}
		if ((strpos($chitiet, 'NEU%') !== false))
		{
			$kq_tongpt_tbmnv = $ngaykqxn;
		}
		}
			
        ///// IN THUỐC /////
        $chitiets = tag_contents($content2, "<CHI_TIET_THUOC>", "</CHI_TIET_THUOC>");
        foreach ($chitiets as $chitiet)
        {
           
                $ngayyl_thuoc = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
                $ngayyl_thuoc = $ngayyl_thuoc[0];
                $ngayyl_thuoc_new = strtotime($ngayravien[0]) - 1200;
                $ngayyl_thuoc_new = date('YmdHi', $ngayyl_thuoc_new);
                $chitiet = str_replace('<NGAY_YL>' . $ngayyl_thuoc . '</NGAY_YL>', '<NGAY_YL>' . $ngayyl_thuoc_new . '</NGAY_YL>', $chitiet);
                $content2mod = $content2mod . '<CHI_TIET_THUOC>' . $chitiet . '</CHI_TIET_THUOC>';

        }

        ///// IN DỊCH VỤ KỸ THUẬT /////
        $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
        foreach ($chitiets as $chitiet)
        {
            $ngaykq = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
            $ngayyl = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
			
			//////// ĐỔI GIỜ XN TRONG DỊCH VỤ ///////
            if (strpos($chitiet, 'Thời gian máu chảy') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $kq_tsmauchay . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            elseif (strpos($chitiet, 'Tổng phân tích') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $kq_tongpt_tbmnv . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
             elseif (strpos($chitiet, 'Creatinin') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $kq_creatinine . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
             elseif (strpos($chitiet, 'Glucose') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $kq_glucose . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
			
           //////// ĐỔI GIỜ RỬA LỆ ĐẠO ///////
            elseif (strpos($chitiet, 'Bơm rửa') !== false)
            {
                if (in_array($chucai_tenbn[0], $nhom_1))
                {
                    $random_bomrua = 85;
                }
                if (in_array($chucai_tenbn[0], $nhom_2))
                {
                    $random_bomrua = 87;
                }
                if (in_array($chucai_tenbn[0], $nhom_3))
                {
                    $random_bomrua = 89;
                }
                if (in_array($chucai_tenbn[0], $nhom_4))
                {
                    $random_bomrua = 90;
                }
                $ngayylrld = strtotime($ngayyl[0]) + $random_bomrua * 60;
                $ngayylrld = date('YmdHi', $ngayylrld);
                $ngaykqrld = strtotime($ngayylrld) + 600;
                $ngaykqrld = date('YmdHi', $ngaykqrld);
                $kiem_tra_ngoai_gio_ylrld = strtotime($ngayylrld);
                $kiem_tra_ngoai_gio_ylrld = date('H', $kiem_tra_ngoai_gio_ylrld);
                $kiem_tra_ngoai_gio_kqrld = strtotime($ngaykqrld);
                $kiem_tra_ngoai_gio_kqrld = date('H', $kiem_tra_ngoai_gio_kqrld);
                if (($kiem_tra_ngoai_gio_ylrld >= 12 and $kiem_tra_ngoai_gio_ylrld <= 13) or ($kiem_tra_ngoai_gio_kqrld >= 12 and $kiem_tra_ngoai_gio_kqrld <= 13))
                {
                    $ngayylrld = strtotime($ngayylrld);
                    $ngayylrld = date('Ymd', $ngayylrld) . "1301";
                    $ngayylrld = strtotime($ngayylrld) + 300 * $i;
                    $i = $i + 1;
                    $ngayylrld = date('YmdHi', $ngayylrld);
                    $ngaykqrld = strtotime($ngayylrld) + 600;
                    $ngaykqrld = date('YmdHi', $ngaykqrld);
                }
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqrld . '</NGAY_KQ>', $chitiet);
                $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngayylrld . '</NGAY_YL>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
		
            //////// ĐỔI GIỜ RỬA CÙNG ĐỒ ///////
            elseif (strpos($chitiet, 'Rửa cùng đồ') !== false)
            {
                if (in_array($chucai_tenbn[0], $nhom_1))
                {
                    $random_rcd = 60;
                }
                if (in_array($chucai_tenbn[0], $nhom_2))
                {
                    $random_rcd = 63;
                }
                if (in_array($chucai_tenbn[0], $nhom_3))
                {
                    $random_rcd = 65;
                }
                if (in_array($chucai_tenbn[0], $nhom_4))
                {
                    $random_rcd = 69;
                }
                $ngayylrcd = strtotime($ngayyl[0]) + $random_rcd * 60;
                $ngayylrcd = date('YmdHi', $ngayylrcd);
                $ngaykqrcd = strtotime($ngayylrcd) + 480;
                $ngaykqrcd = date('YmdHi', $ngaykqrcd);
                $kiem_tra_ngoai_gio_ylrcd = strtotime($ngayylrcd);
                $kiem_tra_ngoai_gio_ylrcd = date('H', $kiem_tra_ngoai_gio_ylrcd);
                $kiem_tra_ngoai_gio_kqrcd = strtotime($ngaykqrcd);
                $kiem_tra_ngoai_gio_kqrcd = date('H', $kiem_tra_ngoai_gio_kqrcd);
                if (($kiem_tra_ngoai_gio_ylrcd >= 12 and $kiem_tra_ngoai_gio_ylrcd <= 13) or ($kiem_tra_ngoai_gio_kqrcd >= 12 and $kiem_tra_ngoai_gio_kqrcd <= 13))
                {
                    $ngayylrcd = strtotime($ngayylrcd);
                    $ngayylrcd = date('Ymd', $ngayylrcd) . "1301";
                    $ngayylrcd = strtotime($ngayylrcd) + 300 * $j;
                    $j = $j + 1;
                    $ngayylrcd = date('YmdHi', $ngayylrcd);
                    $ngaykqrcd = strtotime($ngayylrcd) + 600;
                    $ngaykqrcd = date('YmdHi', $ngaykqrcd);
                }
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqrcd . '</NGAY_KQ>', $chitiet);
                $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngayylrcd . '</NGAY_YL>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ GIƯỜNG ///////
            elseif (strpos($chitiet, 'Giường') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngayravien[0] . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ SIÊU ÂM MẮT ///////
            elseif ((strpos($chitiet, 'Siêu âm mắt') !== false))
            {
                if (in_array($chucai_tenbn[0], $nhom_1))
                {
                    $random_sieuam = 26;
                }
                if (in_array($chucai_tenbn[0], $nhom_2))
                {
                    $random_sieuam = 28;
                }
                if (in_array($chucai_tenbn[0], $nhom_3))
                {
                    $random_sieuam = 30;
                }
                if (in_array($chucai_tenbn[0], $nhom_4))
                {
                    $random_sieuam = 33;
                }
                $ngaykqsa = strtotime($ngayyl[0]) + $random_sieuam * 60;
                $ngaykqsa = date('YmdHi', $ngaykqsa);
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqsa . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ ĐO IOL ///////
            elseif ((strpos($chitiet, 'Đo khúc xạ giác mạc Javal') !== false) or (strpos($chitiet, 'Đo công suất thể thủy tinh nhân tạo bằng siêu âm') !== false))
            {
                if (in_array($chucai_tenbn[0], $nhom_1))
                {
                    $random_iol = 20;
                }
                if (in_array($chucai_tenbn[0], $nhom_2))
                {
                    $random_iol = 22;
                }
                if (in_array($chucai_tenbn[0], $nhom_3))
                {
                    $random_iol = 23;
                }
                if (in_array($chucai_tenbn[0], $nhom_4))
                {
                    $random_iol = 25;
                }
                $ngaykqiol = strtotime($ngayyl[0]) + $random_iol * 60;
                $ngaykqiol = date('YmdHi', $ngaykqiol);
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqiol . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ PT MỘNG ///////
            elseif (strpos($chitiet, 'Phẫu thuật mộng') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_mong . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ PT MÀNG TRƯỚC DIỆN ĐỒNG TỬ ///////
            elseif (strpos($chitiet, 'Cắt màng xuất tiết diện đồng tử, cắt màng đồng tử') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_mangtruocdiendongtu . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            elseif (strpos($chitiet, 'Đặt van dẫn lưu tiền phòng điều trị') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_istent . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
			elseif (strpos($chitiet, 'Khâu giác mạc') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_khau_giac_mac . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ PT QUẶM - THÁO ĐAI ĐỘN CỦNG MẠC - CẮT U DA MI - CẮT BỎ TÚI LỆ - THÁO DẦU///////
            elseif ((strpos($chitiet, 'Tháo đai độn củng mạc') !== false) or (strpos($chitiet, 'Tháo dầu') !== false) or strpos($chitiet, 'Phẫu thuật quặm') !== false or (strpos($chitiet, 'Cắt u da mi') !== false) or (strpos($chitiet, 'Cắt bỏ túi lệ') !== false) or (strpos($chitiet, 'Cắt u kết mạc') !== false))
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_quam . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ PT NỐI THÔNG LỆ MŨI///////
            elseif (strpos($chitiet, 'Nối thông lệ mũi') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_noithonglemui . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
			//////// ĐỔI GIỜ PT GHÉP DA HAY VẠT DA ĐIỀU TRỊ HỞ MI///////
            elseif (strpos($chitiet, 'Ghép da hay vạt da') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_ghepdadieutrihomi . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
			 //////// ĐỔI GIỜ PT LÀM HẸP KHE MI///////
            elseif (strpos($chitiet, 'Phẫu thuật làm hẹp khe mi, rút ngắn') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_lamhepkhemi . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ PT TTT ///////
            elseif (strpos($chitiet, 'Phẫu thuật tán nhuyễn') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_ttt . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            elseif (((strpos($chitiet, 'TTT ') !== false) or (strpos($chitiet, 'Thủy tinh thể nhân tạo') !== false) or (strpos($chitiet, 'tinh thể') !== false) or (strpos($chitiet, 'Thủy tinh thể đơn tiêu cự kéo dài') !== false) or (strpos($chitiet, 'Thủy tinh thể') !== false)) and $check_pt_tannhuyen == 1)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_ttt . '</NGAY_KQ>', $chitiet);
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ CẮT BÈ ///////
            elseif (strpos($chitiet, 'Cắt bè') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_catbe . '</NGAY_KQ>', $chitiet);
                if ($phoihop == 1)
                {
                    $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngayyl_pt_catbe . '</NGAY_YL>', $chitiet);
                }
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ CẮT DỊCH KÍNH ///////
            elseif (strpos($chitiet, 'Cắt dịch kính') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_catdichkinh . '</NGAY_KQ>', $chitiet);
                if ($phoihop == 1)
                {
                    $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngayyl_pt_catdichkinh . '</NGAY_YL>', $chitiet);
                }
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ PT BONG VÕNG MẠC CÓ CẮT DỊCH KÍNH ///////
            elseif (strpos($chitiet, 'Phẫu thuật bong võng mạc, cắt dịch kính') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_bvm_cdk . '</NGAY_KQ>', $chitiet);
                if ($phoihop == 1)
                {
                    $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngayyl_pt_bvm_cdk . '</NGAY_YL>', $chitiet);
                }
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ MỞ BAO SAU ///////
            elseif (strpos($chitiet, 'Mở bao sau bằng phẫu thuật') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_mobaosaubangpt . '</NGAY_KQ>', $chitiet);
                if ($phoihop == 1)
                {
                    $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngayyl_pt_mobaosaubangpt . '</NGAY_YL>', $chitiet);
                }
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// ĐỔI GIỜ DAT IOL THI 2 ///////
            elseif (strpos($chitiet, 'Phẫu thuật đặt thể thủy tinh nhân tạo (IOL) thì 2') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_pt_datiolthi2 . '</NGAY_KQ>', $chitiet);
                if ($phoihop == 1)
                {
                    $chitiet = str_replace('<NGAY_YL>' . $ngayyl[0] . '</NGAY_YL>', '<NGAY_YL>' . $ngaykq_pt_datiolthi2 . '</NGAY_YL>', $chitiet);
                }
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            elseif ((strpos($chitiet, 'OCT') !== false))
            {
                $ngaykq_oct = $ngaykq[0];$content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            elseif ((strpos($chitiet, 'Chụp đáy mắt') !== false))
            {
                $ngaykq_chupdaymat = $ngaykq[0]; $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
            //////// KHÔNG LÀM GÌ CẢ ///////
            else
            {
                $content3mod = $content3mod . '<CHI_TIET_DVKT>' . $chitiet . '</CHI_TIET_DVKT>';
            }
        }

        ///// IN CLS /////
        $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
        foreach ($chitiets as $chitiet)
        {
            $ngaykq = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
            $ten_chiso = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
            $ten_chiso = $ten_chiso[0];

            if (strpos($ten_chiso, 'Siêu âm mắt') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqsa . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';

            }
            elseif (strpos($ten_chiso, 'OCT') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_oct . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }
            elseif ((strpos($ten_chiso, 'Đo công suất thể thủy tinh nhân tạo') !== false) or (strpos($ten_chiso, 'Đo khúc xạ giác mạc Javal') !== false))
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqiol . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }
            elseif (strpos($ten_chiso, 'Chụp đáy mắt') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_chupdaymat . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }
            //////// KHÔNG LÀM GÌ CẢ ///////
            else
            {
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }

        }

        $content3mod = '<?xml version="1.0" encoding="utf-8"?>
<DSACH_CHI_TIET_DVKT>
' . $content3mod . '
</DSACH_CHI_TIET_DVKT>';
        $content2mod = '<?xml version="1.0" encoding="utf-8"?>
<DSACH_CHI_TIET_THUOC>
' . $content2mod . '
</DSACH_CHI_TIET_THUOC>';
        $content4mod = '<?xml version="1.0" encoding="utf-8"?>
<DSACH_CHI_TIET_CLS>
' . $content4mod . '
</DSACH_CHI_TIET_CLS>';
		$content = str_replace(base64_encode($content1) , base64_encode($content1mod) , $content);
        $content = str_replace(base64_encode($content3) , base64_encode($content3mod) , $content);
        $content = str_replace(base64_encode($content2) , base64_encode($content2mod) , $content);
        $content = str_replace(base64_encode($content4) , base64_encode($content4mod) , $content);
		
        file_put_contents('xml/' . $file, $content);
    }
    elseif ($ma_loai_kcb == 2 or $ma_loai_kcb == 1)
    {
        ////BẮT ĐẦU CHỈNH NGOẠI TRÚ TẠI ĐÂY - NHƯNG CHƯA LÀM GÌ CẢ///
		////LẤY GIỜ CỦA CÁC TỪ XML3 CLS ĐỂ LÀM GỐC///
        $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
        foreach ($chitiets as $chitiet)
        {
            $ngaykq = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
            $ngayyl = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            if ((strpos($chitiet, 'Siêu âm mắt') !== false))
            {
                $ngaykqsa = $ngaykq[0];
            }
            elseif ((strpos($chitiet, 'OCT') !== false))
            {
                $ngaykq_oct = $ngaykq[0];
            }
            elseif ((strpos($chitiet, 'Chụp đáy mắt') !== false))
            {
                $ngaykq_chupdaymat = $ngaykq[0];
            }

        }

        ///// ĐỔI GIỜ CLS /////
        $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
        foreach ($chitiets as $chitiet)
        {
            $ngaykq = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
            $ten_chiso = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
            $ten_chiso = $ten_chiso[0];

            if (strpos($ten_chiso, 'Siêu âm mắt') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykqsa . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }
            elseif (strpos($ten_chiso, 'OCT') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_oct . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }
            elseif (strpos($ten_chiso, 'Chụp đáy mắt') !== false)
            {
                $chitiet = str_replace('<NGAY_KQ>' . $ngaykq[0] . '</NGAY_KQ>', '<NGAY_KQ>' . $ngaykq_chupdaymat . '</NGAY_KQ>', $chitiet);
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }
            //////// KHÔNG LÀM GÌ CẢ ///////
            else
            {
                $content4mod = $content4mod . '<CHI_TIET_CLS>' . $chitiet . '</CHI_TIET_CLS>';
            }

        }
        $content4mod = '<?xml version="1.0" encoding="utf-8"?>
<DSACH_CHI_TIET_CLS>
' . $content4mod . '
</DSACH_CHI_TIET_CLS>';

        $content = str_replace(base64_encode($content4) , base64_encode($content4mod) , $content);

        file_put_contents('xml/' . $file, $content);
    }
}
$random_name = rand(1000000, 10000000) . "-convert-4210-ngay-" . date("d-m") . ".zip";
echo '<div class="p-2 m-md-3 rounded shadow-sm bg-white">
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">BẢN NÀY LÀ BẢN CONVERT CHUẨN, DÙNG ĐỂ ĐẨY CỔNG THÔNG THƯỜNG</h4>
</div>
<div class="alert alert-primary" role="alert">
Chuyển dữ liệu thành công!<br>
1. Chuyển giờ Xét nghiệm máu (giờ kết quả xn máu xml4 trùng với giờ kq trong xml3)<br>
2. Chuyển giờ các chỉ định (thể thủy tinh, mộng, quặm, cắt bè, ttt + cắt bè)<br>
3. Chuyển giờ thuốc phẫu thuật (chỉ các thuốc viga, tobradex, medrol, sanlein)<br>
4. RANDOM giờ SA, ĐO IOL <b>THEO CHỮ CÁI TÊN</b> MỚI<br>
5. Chuyển giờ kết quả siêu âm, OCT, đo IOL từ xml3 đồng nhất với xml4
</div>
<div class="alert alert-secondary" role="alert">
 <a target="_blank" rel="noopener noreferrer" href="zip/' . $random_name . '" >Tải file ZIP</a><br>
 <a target="_blank" rel="noopener noreferrer" href="check-mhl.php?id=2" >[MHL] Kiểm tra bản Convert MỚI</a><br>
</div>
'
?>

<?php
/***  PHP script to zip folder using RecursiveDirectoryIterator PHP function */
// Get real path for folder
$folder_to_zip = realpath("xml");
//saving zip
$zipname = "zip/" . $random_name;
// we are using try and catch
// you can run the script without the try..catch
try
{
    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    // Create recursive directory iterator
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder_to_zip) , RecursiveIteratorIterator::LEAVES_ONLY);
    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir())
        {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($folder_to_zip) + 1);
            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        } // if ends
        
    } // foreach ends
    echo '<div class="alert alert-success" role="alert">Đã tạo 4210.zip mới</div>';
}
catch(Exception $e)
{
    // catch message  for unable to generate zip
    
}
?>
<?php include 'style/footer.php'; ?>
