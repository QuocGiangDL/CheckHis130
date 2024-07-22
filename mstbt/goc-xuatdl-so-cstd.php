<?php include 'style/header.php';
$random_name = rand(1000000, 10000000) . "-QQ-so-cham-soc-toan-dien.csv";
echo '<div class="p-2 m-md-3 rounded shadow-sm bg-white"><a href="csv/' . $random_name . '">Download CSV</a></div>';
?>
 <?php include 'style/footer.php'; ?>


<?php
$myfile = fopen("csv/" . $random_name, "w") or die("Unable to open file!");
fclose($myfile);

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

$files = glob("4210/4210/*.xml");
$output = "output.txt";
$customers_data = array();
foreach ($files as $file)
{
    $content1 = '';
    $content2 = '';
    $content3 = '';
    $content4 = '';
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
	$MA_LK = tag_contents($content1, "<MA_LK>", "</MA_LK>");
    $MA_BN = tag_contents($content1, "<MA_BN>", "</MA_BN>");
    $HO_TEN = tag_contents($content1, "<HO_TEN><![CDATA[", "]]></HO_TEN>");
    $NGAY_SINH = tag_contents($content1, "<NGAY_SINH>", "</NGAY_SINH>");
    $GIOI_TINH = tag_contents($content1, "<GIOI_TINH>", "</GIOI_TINH>");
    $DIA_CHI = tag_contents($content1, "<DIA_CHI><![CDATA[", "]]></DIA_CHI>");
    $TEN_BENH = tag_contents($content1, "<TEN_BENH><![CDATA[", "]]></TEN_BENH>");
    $MA_THE = tag_contents($content1, "<MA_THE>", "</MA_THE>");
    $MA_DKBD = tag_contents($content1, "<MA_DKBD>", "</MA_DKBD>");
    $GT_THE_TU = tag_contents($content1, "<GT_THE_TU>", "</GT_THE_TU>");
    $GT_THE_DEN = tag_contents($content1, "<GT_THE_DEN>", "</GT_THE_DEN>");
    $MA_BENH = tag_contents($content1, "<MA_BENH>", "</MA_BENH>");
    $MA_LYDO_VVIEN = tag_contents($content1, "<MA_LYDO_VVIEN>", "</MA_LYDO_VVIEN>");
    $MA_TAI_NAN = tag_contents($content1, "<MA_TAI_NAN>", "</MA_TAI_NAN>");
    $NGAY_VAO = tag_contents($content1, "<NGAY_VAO>", "</NGAY_VAO>");
    $NGAY_RA = tag_contents($content1, "<NGAY_RA>", "</NGAY_RA>");
    $SO_NGAY_DTRI = tag_contents($content1, "<SO_NGAY_DTRI>", "</SO_NGAY_DTRI>");
    $KET_QUA_DTRI = tag_contents($content1, "<KET_QUA_DTRI>", "</KET_QUA_DTRI>");
    $TINH_TRANG_RV = tag_contents($content1, "<TINH_TRANG_RV>", "</TINH_TRANG_RV>");
    $NGAY_TTOAN = tag_contents($content1, "<NGAY_TTOAN>", "</NGAY_TTOAN>");
    $T_THUOC = tag_contents($content1, "<T_THUOC>", "</T_THUOC>");
    $T_TONGCHI = tag_contents($content1, "<T_TONGCHI>", "</T_TONGCHI>");
	$MA_LOAI_KCB = tag_contents($content1, "<MA_LOAI_KCB>", "</MA_LOAI_KCB>");
    $MA_LOAI_KCB = $MA_LOAI_KCB[0];
	$MA_LK = $MA_LK[0];
    $MA_BN = $MA_BN[0];
    $HO_TEN = $HO_TEN[0];
    $NGAY_SINH = $NGAY_SINH[0];
	$NGAY_SINH = preg_replace('/\s+/', '', $NGAY_SINH);
	if (strlen($NGAY_SINH)== 4){$NGAY_SINH=$NGAY_SINH.'0101';};
	$NGAY_SINH_1 = substr($NGAY_SINH, 0, 4);
	$NGAY_SINH_2 = substr($NGAY_SINH, 4, 2);
	$NGAY_SINH_3 = substr($NGAY_SINH, 6, 2);
	$NGAY_SINH = $NGAY_SINH_1.'/'.$NGAY_SINH_2.'/'.$NGAY_SINH_3;
	
    $GIOI_TINH = $GIOI_TINH[0];
    $DIA_CHI = $DIA_CHI[0];
    $TEN_BENH = $TEN_BENH[0];
    $MA_THE = $MA_THE[0];
    $MA_DKBD = $MA_DKBD[0];
    $GT_THE_TU = $GT_THE_TU[0];
    $GT_THE_TU = strtotime($GT_THE_TU);
    $GT_THE_TU = date('d/m/Y', $GT_THE_TU);
    $GT_THE_DEN = $GT_THE_DEN[0];
    $GT_THE_DEN = strtotime($GT_THE_DEN);
    $GT_THE_DEN = date('d/m/Y', $GT_THE_DEN);
    $MA_BENH = $MA_BENH[0];
    $MA_LYDO_VVIEN = $MA_LYDO_VVIEN[0];
    $MA_TAI_NAN = $MA_TAI_NAN[0];
    $NGAY_VAO = $NGAY_VAO[0];
    $NGAY_VAO = strtotime($NGAY_VAO);
    $NGAY_VAO = date('H:i d/m/Y', $NGAY_VAO);
    $NGAY_RA = $NGAY_RA[0];
    $NGAY_RA = strtotime($NGAY_RA);
    $NGAY_RA = date('H:i d/m/Y', $NGAY_RA);
    $SO_NGAY_DTRI = $SO_NGAY_DTRI[0];
    $KET_QUA_DTRI = $KET_QUA_DTRI[0];
    $TINH_TRANG_RV = $TINH_TRANG_RV[0];
    $NGAY_TTOAN = $NGAY_TTOAN[0];
    $NGAY_TTOAN = strtotime($NGAY_TTOAN);
    $NGAY_TTOAN = date('H:i d/m/Y', $NGAY_TTOAN);
    $T_THUOC = $T_THUOC[0];
    $T_TONGCHI = $T_TONGCHI[0];

    $account = [];

    $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
    foreach ($chitiets as $chitiet)
    {
        $TEN_DICH_VU = tag_contents($chitiet, "<TEN_DICH_VU><![CDATA[", "]]></TEN_DICH_VU>");
        $TEN_DICH_VU = $TEN_DICH_VU[0];
        $TEN_DICH_VU = preg_replace('~[\r\n]+~', '', $TEN_DICH_VU);
        $NGAY_YL = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
        $NGAY_YL = $NGAY_YL[0];
        $NGAY_YL = strtotime($NGAY_YL);
        $NGAY_YL = date('H:i d/m/Y', $NGAY_YL);
        $NGAY_KQ = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
        $NGAY_KQ = $NGAY_KQ[0];
        $NGAY_KQ = strtotime($NGAY_KQ);
        $NGAY_KQ = date('H:i d/m/Y', $NGAY_KQ);
        if ((strpos($TEN_DICH_VU, 'Khám mắt') !== false) or (strpos($TEN_DICH_VU, 'Khám Mắt') !== false))
        {
            $BS_CHI_DINH = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
            $BS_CHI_DINH = $BS_CHI_DINH[0];
            $GIO_KQ_THUOC = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
            $GIO_KQ_THUOC = $GIO_KQ_THUOC[0];
            $GIO_KQ_THUOC = strtotime($GIO_KQ_THUOC);
            $GIO_KQ_THUOC = date('H:i d/m/Y', $GIO_KQ_THUOC);
			
					$BS_CHI_DINH = str_replace('000932/NB-CCHN', 'Bs Thanh', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('000099/TB-CCHN', 'Bs Vinh', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('010459/NA-CCHN', 'Bs Mai', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('000932/NB-CCHN', 'Bs Thanh', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('000087/NB-CCHN', 'Bs Quế', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('003917/NB-CCHN', 'Bs Đông', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('0000528/HT-CCHN', 'Bs Kiền', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('004828/NB - CCHN', 'DD Xuân', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('010440/NA-CCHN', 'DD Hằng', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('004875/NB-CCHN', 'Bs Sơn', $BS_CHI_DINH);
            $BS_CHI_DINH = str_replace('000291/NB-CCHN', 'Bs Hoa', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('003742/PY-CCHN', 'Bs Thảo', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('0005430/TTH-CCHN', 'Bs Linh', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('0003580/HNA-CCHN', 'DD Như', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('006290/NĐ-CCHN', 'DD Bích', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('014735/NA-CCHN', 'Bs Lộc', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('014736/NA-CCHN', 'Bs Quang Anh', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('002056/ĐNA-CCHN', 'Bs Nhân', $BS_CHI_DINH);
			$BS_CHI_DINH = str_replace('0035526/HMC-CCHN', 'KTV Đài', $BS_CHI_DINH);
        }
        if (strpos($TEN_DICH_VU, 'Định lượng Glucose [Máu]') !== false)
        {
            $GIO_YL_CLS = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $GIO_YL_CLS = $GIO_YL_CLS[0];
            $GIO_YL_CLS = strtotime($GIO_YL_CLS);
            $GIO_YL_CLS = date('H:i d/m/Y', $GIO_YL_CLS);

        }
        $NGUOI_THUC_HIEN = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
        $NGUOI_THUC_HIEN = $NGUOI_THUC_HIEN[0];
		$NGUOI_THUC_HIEN = str_replace('000932/NB-CCHN', 'Bs Thanh', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('000099/TB-CCHN', 'Bs Vinh', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('010459/NA-CCHN', 'Bs Mai', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('000932/NB-CCHN', 'Bs Thanh', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('000087/NB-CCHN', 'Bs Quế', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('003917/NB-CCHN', 'Bs Đông', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('0000528/HT-CCHN', 'Bs Kiền', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('004828/NB - CCHN', 'DD Xuân', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('010440/NA-CCHN', 'DD Hằng', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('004875/NB-CCHN', 'Bs Sơn', $NGUOI_THUC_HIEN);
            $NGUOI_THUC_HIEN = str_replace('000291/NB-CCHN', 'Bs Hoa', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('003742/PY-CCHN', 'Bs Thảo', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('0005430/TTH-CCHN', 'Bs Linh', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('0003580/HNA-CCHN', 'DD Như', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('006290/NĐ-CCHN', 'DD Bích', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('014735/NA-CCHN', 'Bs Lộc', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('014736/NA-CCHN', 'Bs Quang Anh', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('053781/HCM-CCHN', 'Bs Việt', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('002056/ĐNA-CCHN', 'Bs Nhân', $NGUOI_THUC_HIEN);
			$NGUOI_THUC_HIEN = str_replace('0035526/HMC-CCHN', 'KTV Đài', $NGUOI_THUC_HIEN);
			
		
        $account = array(
			'MA_LK' => $MA_LK,
            'MA_BN' => $MA_BN,
            'HO_TEN' => $HO_TEN,
            'NGAY_SINH' => $NGAY_SINH,
            'GIOI_TINH' => $GIOI_TINH,
            'DIA_CHI' => $DIA_CHI,
            'TEN_BENH' => $TEN_BENH,
            'MA_THE' => $MA_THE,
            'MA_DKBD' => $MA_DKBD,
            'GT_THE_TU' => $GT_THE_TU,
            'GT_THE_DEN' => $GT_THE_DEN,
            'MA_BENH' => $MA_BENH,
			'MA_LOAI_KCB' => $MA_LOAI_KCB,
            'MA_LYDO_VVIEN' => $MA_LYDO_VVIEN,
            'MA_TAI_NAN' => $MA_TAI_NAN,
            'NGAY_VAO' => $NGAY_VAO,
            'NGAY_RA' => $NGAY_RA,
            'TEN_DICH_VU' => $TEN_DICH_VU,
            'BS_CHI_DINH' => $BS_CHI_DINH,
            'NGUOI_THUC_HIEN' => $NGUOI_THUC_HIEN,
            'NGAY_YL' => $NGAY_YL,
            'NGAY_KQ' => $NGAY_KQ,
            'SO_NGAY_DTRI' => $SO_NGAY_DTRI,
            'TINH_TRANG_RV' => $TINH_TRANG_RV,
            'NGAY_TTOAN' => $NGAY_TTOAN,
            'T_THUOC' => $T_THUOC,
            'T_TONGCHI' => $T_TONGCHI

        );

        $customers_data = array_merge($customers_data, array(
            $account
        ));
    }

   

}

$title = array(
	'MA_LK' => 'MA_LK',
    'MA_BN' => 'MA_BN',
    'HO_TEN' => 'HO_TEN',
    'NGAY_SINH' => 'NGAY_SINH',
    'GIOI_TINH' => 'GIOI_TINH',
    'DIA_CHI' => 'DIA_CHI',
    'TEN_BENH' => 'TEN_BENH',
    'MA_THE' => 'MA_THE',
    'MA_DKBD' => 'MA_DKBD',
    'GT_THE_TU' => 'GT_THE_TU',
    'GT_THE_DEN' => 'GT_THE_DEN',
    'MA_BENH' => 'MA_BENH',
	'MA_LOAI_KCB' => 'MA_LOAI_KCB',
    'MA_LYDO_VVIEN' => 'MA_LYDO_VVIEN',
    'MA_TAI_NAN' => 'MA_TAI_NAN',
    'NGAY_VAO' => 'NGAY_VAO',
    'NGAY_RA' => 'NGAY_RA',
    'TEN_DICH_VU' => 'TEN_DICH_VU',
    'BS_CHI_DINH' => 'BS_CHI_DINH',
    'NGUOI_THUC_HIEN' => 'NGUOI_THUC_HIEN',
    'NGAY_YL' => 'NGAY_YL',
    'NGAY_KQ' => 'NGAY_KQ',
    'SO_NGAY_DTRI' => 'SO_NGAY_DTRI',
    'TINH_TRANG_RV' => 'TINH_TRANG_RV',
    'NGAY_TTOAN' => 'NGAY_TTOAN',
    'T_THUOC' => 'T_THUOC',
    'T_TONGCHI' => 'T_TONGCHI'
);

$customers_data = array_merge(array(
    $title
) , $customers_data);
// Create an array of elements
// Open a file in write mode ('w')
$fp = fopen('csv/' . $random_name, 'w');
//add BOM to fix UTF-8 in Excel
fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));

// Loop through file pointer and a line
foreach ($customers_data as $fields)
{
    fputcsv($fp, $fields);
}

fclose($fp);
?>
