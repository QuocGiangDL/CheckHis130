<?php include 'style/header.php';
$random_name = rand(1000000, 10000000) . "-QQ-so-xet-nghiem.csv";
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
if ($_GET['id'] == 2)
{
    $files = glob("xml/4210/4210/*.xml");
    $typecheck = "ZIP CONVERT MHL";
}
else
{
    $files = glob("4210/4210/*.xml");
    $typecheck = "ZIP GỐC MHL";
}
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
  if ($content4)
    {
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
	$MA_BENHKHAC = tag_contents($content1, "<MA_BENHKHAC>", "</MA_BENHKHAC>");
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
	$MA_BENHKHAC = $MA_BENHKHAC[0];
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

    $GLUCOSE ='';
	$CREATININE ='';
	$WBC ='';
	$LYM_tyle ='';
	$NEU_tyle ='';
	$NEU_sl ='';
	$RBC ='';
	$HGB ='';
	$HCT ='';
	$MCV ='';
	$MCH ='';
	$MCHC ='';
	$PLT ='';
	$PDW ='';
	$TS ='';
	$TC ='';
	$MOTA_SIEUAM='';
	$KL_SIEUAM='';
	$MOTA_DMM='';
	$KL_DMM='';
	$MOTA_OCT='';
	$KL_OCT='';
	$DO_IOL='';
 $chitiets = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
    foreach ($chitiets as $chitiet)
    {
        $TEN_DICH_VU = tag_contents($chitiet, "<TEN_DICH_VU><![CDATA[", "]]></TEN_DICH_VU>");
        $TEN_DICH_VU = $TEN_DICH_VU[0];
        $TEN_DICH_VU = preg_replace('~[\r\n]+~', '', $TEN_DICH_VU);

        if (strpos($TEN_DICH_VU, 'Khám Mắt') !== false)
        {
            $BS_CHI_DINH = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
            $BS_CHI_DINH = $BS_CHI_DINH[0];
            $GIO_KQ_THUOC = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
            $GIO_KQ_THUOC = $GIO_KQ_THUOC[0];
            $GIO_KQ_THUOC = strtotime($GIO_KQ_THUOC);
            $GIO_KQ_THUOC = date('H:i d/m/Y', $GIO_KQ_THUOC);
			
			$mabsis = explode (";", $BS_CHI_DINH); 
				$ma_cchn = include("doctor.php");
				foreach ($mabsis as $mabs)
				{
				$BS_CHI_DINH = str_replace($mabs, $ma_cchn[$mabs], $BS_CHI_DINH);
				}
				
			
        }
        if (strpos($TEN_DICH_VU, 'Định lượng Glucose [Máu]') !== false)
        {
            $GIO_YL_CLS = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $GIO_YL_CLS = $GIO_YL_CLS[0];
            $GIO_YL_CLS = strtotime($GIO_YL_CLS);
            $GIO_YL_CLS = date('H:i d/m/Y', $GIO_YL_CLS);
			$NGUOI_THUC_HIEN = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
			$NGUOI_THUC_HIEN = $NGUOI_THUC_HIEN[0];

			$mabsis = explode (";", $NGUOI_THUC_HIEN); 
			$ma_cchn = include("doctor.php");
			foreach ($mabsis as $mabs)
			{
			$NGUOI_THUC_HIEN = str_replace($mabs, $ma_cchn[$mabs], $NGUOI_THUC_HIEN);
			}
        }
		 if (strpos($TEN_DICH_VU, 'OCT') !== false)
        {
            $GIO_YL_CLS = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
            $GIO_YL_CLS = $GIO_YL_CLS[0];
            $GIO_YL_CLS = strtotime($GIO_YL_CLS);
            $GIO_YL_CLS = date('H:i d/m/Y', $GIO_YL_CLS);
			$NGUOI_THUC_HIEN = tag_contents($chitiet, "<MA_BAC_SI>", "</MA_BAC_SI>");
			$NGUOI_THUC_HIEN = $NGUOI_THUC_HIEN[0];
			$mabsis = explode (";", $NGUOI_THUC_HIEN); 
			$ma_cchn = include("doctor.php");
			foreach ($mabsis as $mabs)
			{
			$NGUOI_THUC_HIEN = str_replace($mabs, $ma_cchn[$mabs], $NGUOI_THUC_HIEN);
			}
				

        }


    }
    $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
    foreach ($chitiets as $chitiet)
    {
        $TEN_DICH_VU = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
        $TEN_DICH_VU = $TEN_DICH_VU[0];
		$GIATRI = tag_contents($chitiet, "<GIA_TRI><![CDATA[", "]]></GIA_TRI>");
        $GIATRI = $GIATRI[0];
		$MOTA = tag_contents($chitiet, "<MO_TA><![CDATA[", "]]></MO_TA>");
        $MOTA = $MOTA[0];
		$KLCLS = tag_contents($chitiet, "<KET_LUAN><![CDATA[", "]]></KET_LUAN>");
        $KLCLS = $KLCLS[0];
		
		$MA_MAY = tag_contents($chitiet, "<MA_MAY><![CDATA[", "]]></MA_MAY>");
        $MA_MAY = $MA_MAY[0];
		$GIO_KQ_CLS = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
        $GIO_KQ_CLS = $GIO_KQ_CLS[0];
		$GIO_KQ_CLS = strtotime($GIO_KQ_CLS);
            $GIO_KQ_CLS = date('H:i d/m/Y', $GIO_KQ_CLS);
        $TEN_DICH_VU = preg_replace('~[\r\n]+~', '', $TEN_DICH_VU);
		 if (strpos($TEN_DICH_VU, 'Glucose') !== false) {
         $GLUCOSE = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'Creatinine') !== false) {
         $CREATININE = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'WBC') !== false) {
         $WBC = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'Lympho(LYM)%') !== false) {
         $LYM_tyle = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'NEU%') !== false) {
         $NEU_tyle = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'NEU#') !== false) {
         $NEU_sl = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'RBC') !== false) {
         $RBC = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'HGB') !== false) {
         $HGB = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'HCT') !== false) {
         $HCT = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'MCV') !== false) {
         $MCV = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'MCH') !== false) {
         $MCH = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'MCHC') !== false) {
         $MCHC = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'PLT') !== false) {
         $PLT = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'PDW') !== false) {
         $PDW = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'TS') !== false) {
         $TS = $GIATRI;
        } if (strpos($TEN_DICH_VU, 'TC') !== false) {
         $TC = $GIATRI;
        }if (strpos($TEN_DICH_VU, 'Đo khúc xạ giác mạc Javal') !== false) {
         $DO_IOL = $GIATRI;
        }if (strpos($TEN_DICH_VU, 'Siêu âm mắt') !== false) {
         $MOTA_SIEUAM = $MOTA;
		 $KL_SIEUAM = $KLCLS;
        }if (strpos($TEN_DICH_VU, 'Chụp đáy mắt không huỳnh quang') !== false) {
         $MOTA_DMM = $MOTA;
		 $KL_DMM = $KLCLS;
        }if (strpos($TEN_DICH_VU, 'OCT') !== false) {
         $MOTA_OCT = $MOTA;
		 $KL_OCT = $KLCLS;
        }

    }
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
			'MA_BENHKHAC' => $MA_BENHKHAC,
            'MA_LYDO_VVIEN' => $MA_LYDO_VVIEN,
            'MA_TAI_NAN' => $MA_TAI_NAN,
            'NGAY_VAO' => $NGAY_VAO,
            'NGAY_RA' => $NGAY_RA,
			'BS_CHI_DINH' => $BS_CHI_DINH,
            'NGUOI_THUC_HIEN' => $NGUOI_THUC_HIEN,
			'GIO_YL_CLS' => $GIO_YL_CLS,
			'GIO_KQ_CLS' => $GIO_KQ_CLS,
			'GLUCOSE' => $GLUCOSE,
			'CREATININE' => $CREATININE,
			'WBC' => $WBC,
			'LYM%' => $LYM_tyle,
			'NEU%' => $NEU_tyle,
			'NEU#' => $NEU_sl,
			'RBC' => $RBC,
			'HGB' => $HGB,
			'HCT' => $HCT,
			'MCV' => $MCV,
			'MCH' => $MCH,
			'MCHC' => $MCHC,
			'PLT' => $PLT,
			'PDW' => $PDW,
			'TS' => $TS,
			'TC' => $TC,
			'DO_IOL' => $DO_IOL,
			'MOTA_SIEUAM' => $MOTA_SIEUAM,
			'KL_SIEUAM' => $KL_SIEUAM,
			'MOTA_DMM' => $MOTA_DMM,
			'KL_DMM' => $KL_DMM,
			'MOTA_OCT' => $MOTA_OCT,
			'KL_OCT' => $KL_OCT,
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
	'MA_BENHKHAC' => 'MA_BENHKHAC',
    'MA_LYDO_VVIEN' => 'MA_LYDO_VVIEN',
    'MA_TAI_NAN' => 'MA_TAI_NAN',
    'NGAY_VAO' => 'NGAY_VAO',
    'NGAY_RA' => 'NGAY_RA',
	'BS_CHI_DINH' => 'BS_CHI_DINH',
    'NGUOI_THUC_HIEN' => 'NGUOI_THUC_HIEN',
	'GIO_YL_CLS' => 'GIO_YL_CLS',
	'GIO_KQ_CLS' => 'GIO_KQ_CLS',
 	'GLUCOSE' => 'GLUCOSE',
	'CREATININE' => 'CREATININE',
	'WBC' => 'WBC',
	'LYM%' => 'LYM%',
	'NEU%' => 'NEU%',
	'NEU#' => 'NEU#',
	'RBC' => 'RBC',
	'HGB' => 'HGB',
	'HCT' => 'HCT',
	'MCV' => 'MCV',
	'MCH' => 'MCH',
	'MCHC' => 'MCHC',
	'PLT' => 'PLT',
	'PDW' => 'PDW',
	'TS' => 'TS',
	'TC' => 'TC',
	'DO_IOL' => 'DO_IOL',
	'MOTA_SIEUAM' => 'MOTA_SIEUAM',
	'KL_SIEUAM' => 'KL_SIEUAM',
	'MOTA_DMM' => 'MOTA_DMM',
	'KL_DMM' => 'KL_DMM',
	'MOTA_OCT' => 'MOTA_OCT',
	'KL_OCT' => 'KL_OCT',
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
