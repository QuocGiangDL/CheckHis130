<?php include 'style/header.php';
$random_name = rand(1000000, 10000000) . "-QQ-so-dien-bien.csv";
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
    $content5 = '';
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
    $MA_LK_XML1 = tag_contents($content1, "<MA_LK>", "</MA_LK>");
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
	$MA_BENHKHAC = tag_contents($content1, "<MA_BENHKHAC>", "</MA_BENHKHAC>");$MA_BENHKHAC = $MA_BENHKHAC[0];
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

    $MA_LK_XML1 = $MA_LK_XML1[0];
    $MA_BN = $MA_BN[0];
    $HO_TEN = $HO_TEN[0];
    $NGAY_SINH = $NGAY_SINH[0];
    $NGAY_SINH = preg_replace('/\s+/', '', $NGAY_SINH);
    if (strlen($NGAY_SINH) == 4)
    {
        $NGAY_SINH = $NGAY_SINH . '0101';
    };
    $NGAY_SINH_1 = substr($NGAY_SINH, 0, 4);
    $NGAY_SINH_2 = substr($NGAY_SINH, 4, 2);
    $NGAY_SINH_3 = substr($NGAY_SINH, 6, 2);
    $NGAY_SINH = $NGAY_SINH_1 . '/' . $NGAY_SINH_2 . '/' . $NGAY_SINH_3;
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

    $chitiets = tag_contents($content5, "<CHI_TIET_DIEN_BIEN_BENH>", "</CHI_TIET_DIEN_BIEN_BENH>");
    foreach ($chitiets as $chitiet)
    {
        $MA_LK_XML5 = tag_contents($chitiet, "<MA_LK>", "</MA_LK>");
        $MA_LK_XML5 = $MA_LK_XML5[0];
        $STT = tag_contents($chitiet, "<STT>", "</STT>");
        $STT = $STT[0];
        $DIEN_BIEN = tag_contents($chitiet, "<DIEN_BIEN><![CDATA[", "]]></DIEN_BIEN>");
        $DIEN_BIEN = $DIEN_BIEN[0];
        $HOI_CHAN = tag_contents($chitiet, "<HOI_CHAN><![CDATA[", "]]></HOI_CHAN>");
        $HOI_CHAN = $HOI_CHAN[0];
        $PHAU_THUAT = tag_contents($chitiet, "<PHAU_THUAT><![CDATA[", "]]></PHAU_THUAT>");
        $PHAU_THUAT = $PHAU_THUAT[0];
        $NGAY_YL = tag_contents($chitiet, "<NGAY_YL>", "</NGAY_YL>");
        $NGAY_YL = $NGAY_YL[0];
        $NGAY_YL = strtotime($NGAY_YL);
        $NGAY_YL = date('H:i d/m/Y', $NGAY_YL);

        $account = array(
            'MA_LK_XML1' => $MA_LK_XML1,
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
            'SO_NGAY_DTRI' => $SO_NGAY_DTRI,
            'TINH_TRANG_RV' => $TINH_TRANG_RV,
            'NGAY_TTOAN' => $NGAY_TTOAN,
            'T_THUOC' => $T_THUOC,
            'T_TONGCHI' => $T_TONGCHI,
            'MA_LK_XML5' => $MA_LK_XML5,
            'STT' => $STT,
            'DIEN_BIEN' => $DIEN_BIEN,
            'HOI_CHAN' => $HOI_CHAN,
            'PHAU_THUAT' => $PHAU_THUAT,
            'NGAY_YL' => $NGAY_YL
        );

        $customers_data = array_merge($customers_data, array(
            $account
        ));
    }

}

$title = array(
    'MA_LK_XML1' => 'MA_LK_XML1',
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
    'SO_NGAY_DTRI' => 'SO_NGAY_DTRI',
    'TINH_TRANG_RV' => 'TINH_TRANG_RV',
    'NGAY_TTOAN' => 'NGAY_TTOAN',
    'T_THUOC' => 'T_THUOC',
    'T_TONGCHI' => 'T_TONGCHI',
    'MA_LK_XML5' => 'MA_LK_XML5',
    'STT' => 'STT',
    'DIEN_BIEN' => 'DIEN_BIEN',
    'HOI_CHAN' => 'HOI_CHAN',
    'PHAU_THUAT' => 'PHAU_THUAT',
    'NGAY_YL' => 'NGAY_YL'

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