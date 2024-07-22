<?php include 'style/header.php';
$random_name = rand(1000000, 10000000) . "-QQ-so-cls2.csv";
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
    $files = glob("xml/130/130/*.xml");
    $typecheck = "ZIP CONVERT MHL";
}
else
{
    $files = glob("130/130/*.xml");
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
	$MA_LK = tag_contents($content1, "<MA_LK>", "</MA_LK>");
    $MA_BN = tag_contents($content1, "<MA_BN>", "</MA_BN>");
    $HO_TEN = tag_contents($content1, "<HO_TEN>", "</HO_TEN>");
    $NGAY_SINH = tag_contents($content1, "<NGAY_SINH>", "</NGAY_SINH>");
    $GIOI_TINH = tag_contents($content1, "<GIOI_TINH>", "</GIOI_TINH>");
    $DIA_CHI = tag_contents($content1, "<DIA_CHI><![CDATA[", "]]></DIA_CHI>");
	$CHAN_DOAN_VAO = tag_contents($content1, "<CHAN_DOAN_VAO>", "</CHAN_DOAN_VAO>");
	$CHAN_DOAN_RV = tag_contents($content1, "<CHAN_DOAN_RV>", "</CHAN_DOAN_RV>");
    $MA_THE = tag_contents($content1, "<MA_THE_BHYT>", "</MA_THE_BHYT>");
    $MA_DKBD = tag_contents($content1, "<MA_DKBD>", "</MA_DKBD>");
    $GT_THE_TU = tag_contents($content1, "<GT_THE_TU>", "</GT_THE_TU>");
    $GT_THE_DEN = tag_contents($content1, "<GT_THE_DEN>", "</GT_THE_DEN>");
    $MA_BENH = tag_contents($content1, "<MA_BENH_CHINH>", "</MA_BENH_CHINH>");
	$MA_BENHKHAC = tag_contents($content1, "<MA_BENH_KT>", "</MA_BENH_KT>");
    $MA_LYDO_VVIEN = tag_contents($content1, "<MA_LYDO_VVIEN>", "</MA_LYDO_VVIEN>");
    $MA_TAI_NAN = tag_contents($content1, "<MA_TAI_NAN>", "</MA_TAI_NAN>");
    $NGAY_VAO = tag_contents($content1, "<NGAY_VAO>", "</NGAY_VAO>");
    $NGAY_RA = tag_contents($content1, "<NGAY_RA>", "</NGAY_RA>");
    $SO_NGAY_DTRI = tag_contents($content1, "<SO_NGAY_DTRI>", "</SO_NGAY_DTRI>");
    $KET_QUA_DTRI = tag_contents($content1, "<KET_QUA_DTRI>", "</KET_QUA_DTRI>");
    $TINH_TRANG_RV = tag_contents($content1, "<TINH_TRANG_RV>", "</TINH_TRANG_RV>");
    $NGAY_TTOAN = tag_contents($content1, "<NGAY_TTOAN>", "</NGAY_TTOAN>");
    $T_THUOC = tag_contents($content1, "<T_THUOC>", "</T_THUOC>");
    $T_TONGCHI_BV = tag_contents($content1, "<T_TONGCHI_BV>", "</T_TONGCHI_BV>");
	$T_TONGCHI_BH = tag_contents($content1, "<T_TONGCHI_BH>", "</T_TONGCHI_BH>");
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
    $CHAN_DOAN_VAO = $CHAN_DOAN_VAO[0];
	$CHAN_DOAN_RV = $CHAN_DOAN_RV[0];
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
    $T_TONGCHI_BV = $T_TONGCHI_BV[0];
	$T_TONGCHI_BH = $T_TONGCHI_BH[0];

    $account = [];

    $chitiets = tag_contents($content4, "<CHI_TIET_CLS>", "</CHI_TIET_CLS>");
    foreach ($chitiets as $chitiet)
    {
        $TEN_CAN_LAM_SANG = tag_contents($chitiet, "<TEN_CHI_SO><![CDATA[", "]]></TEN_CHI_SO>");
        $TEN_CAN_LAM_SANG2 = $TEN_CAN_LAM_SANG[0];
		$TEN_CAN_LAM_SANG = $TEN_CAN_LAM_SANG[0];
        $TEN_CAN_LAM_SANG = preg_replace('~[\r\n]+~', '', $TEN_CAN_LAM_SANG);
		$GIA_TRI = tag_contents($chitiet, "<GIA_TRI><![CDATA[", "]]></GIA_TRI>");
        $GIA_TRI = $GIA_TRI[0];
        $GIA_TRI = preg_replace('~[\r\n]+~', '', $GIA_TRI);
		$MO_TA = tag_contents($chitiet, "<MO_TA><![CDATA[", "]]></MO_TA>");
        $MO_TA = $MO_TA[0];
        $MO_TA = preg_replace('~[\r\n]+~', '', $MO_TA);
		$KET_LUAN = tag_contents($chitiet, "<KET_LUAN><![CDATA[", "]]></KET_LUAN>");
        $KET_LUAN = $KET_LUAN[0];
        $KET_LUAN = preg_replace('~[\r\n]+~', '', $KET_LUAN);
		
        $NGAY_KQ = tag_contents($chitiet, "<NGAY_KQ>", "</NGAY_KQ>");
        $NGAY_KQ = $NGAY_KQ[0];
        $NGAY_KQ = strtotime($NGAY_KQ);
        $NGAY_KQ = date('H:i d/m/Y', $NGAY_KQ);
		
		$NGAY_YL_OCT = '';
		$NGAY_YL_DONHANAP = '';
		$NGAY_YL_SIEUAMMAT = '';
		$NGAY_YL_JAVAL = '';
		$NGAY_YL_XN_MAU = '';
		
		$NGAY_KQ_OCT = '';
		$NGAY_KQ_DONHANAP = '';
		$NGAY_KQ_SIEUAMMAT = '';
		$NGAY_KQ_JAVAL = '';
		$NGAY_KQ_XN_MAU = '';
		
		$MA_MAY ='';
		$NTH_OCT = '';
		$NTH_DONHANAP = '';
		$NTH_SIEUAMMAT = '';
		$NTH_JAVAL = '';
		$NTH_XN_MAU = ''; 
		
		$BS_CHI_DINH = '';
		$NGUOI_THUC_HIEN = '';
        $chitiets2 = tag_contents($content3, "<CHI_TIET_DVKT>", "</CHI_TIET_DVKT>");
    foreach ($chitiets2 as $chitiet2)
	{ 	$TEN_DICH_VU = tag_contents($chitiet2, "<TEN_DICH_VU>", "</TEN_DICH_VU>");
        $TEN_DICH_VU = $TEN_DICH_VU[0];
        $TEN_DICH_VU = preg_replace('~[\r\n]+~', '', $TEN_DICH_VU);
		 if ((strpos($TEN_DICH_VU, 'Khám Mắt') !== false) or (strpos($TEN_DICH_VU, 'Khám mắt') !== false))
        {
            $BS_CHI_DINH = tag_contents($chitiet2, "<MA_BAC_SI>", "</MA_BAC_SI>");
            $BS_CHI_DINH = $BS_CHI_DINH[0];
			$mabsis = explode (";", $BS_CHI_DINH); 
			$ma_cchn = include("doctor.php");
			foreach ($mabsis as $mabs)
			{
			$BS_CHI_DINH = str_replace($mabs, $ma_cchn[$mabs], $BS_CHI_DINH);
			}
      
        }
		if (strpos($TEN_DICH_VU, 'Đo khúc xạ giác mạc Javal') !== false)
        {
			$MA_MAYJAVAL = tag_contents($chitiet2, "<MA_MAY>", "</MA_MAY>");
			$MA_MAYJAVAL = $MA_MAYJAVAL[0];
			$MA_MAYJAVAL = preg_replace('~[\r\n]+~', '', $MA_MAYJAVAL);
            $NGAY_YL_JAVAL = tag_contents($chitiet2, "<NGAY_YL>", "</NGAY_YL>");
            $NGAY_YL_JAVAL = $NGAY_YL_JAVAL[0];
            $NGAY_YL_JAVAL = strtotime($NGAY_YL_JAVAL);
            $NGAY_YL_JAVAL = date('H:i d/m/Y', $NGAY_YL_JAVAL);
			$NGAY_TH_YL_JAVAL = tag_contents($chitiet2, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $NGAY_TH_YL_JAVAL = $NGAY_TH_YL_JAVAL[0];
            $NGAY_TH_YL_JAVAL = strtotime($NGAY_TH_YL_JAVAL);
            $NGAY_TH_YL_JAVAL = date('H:i d/m/Y', $NGAY_TH_YL_JAVAL);
			$NGAY_KQ_JAVAL = tag_contents($chitiet2, "<NGAY_KQ>", "</NGAY_KQ>");
            $NGAY_KQ_JAVAL = $NGAY_KQ_JAVAL[0];
            $NGAY_KQ_JAVAL = strtotime($NGAY_KQ_JAVAL);
            $NGAY_KQ_JAVAL = date('H:i d/m/Y', $NGAY_KQ_JAVAL);
			$NTH_JAVAL = tag_contents($chitiet2, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");$NTH_JAVAL = $NTH_JAVAL[0];
		
        }
			if (strpos($TEN_DICH_VU, 'Đo nhãn áp') !== false)
        {
			$MA_MAYNA = tag_contents($chitiet2, "<MA_MAY>", "</MA_MAY>");
			$MA_MAYNA = $MA_MAYNA[0];
			$MA_MAYNA = preg_replace('~[\r\n]+~', '', $MA_MAYNA);
            $NGAY_YL_DONHANAP = tag_contents($chitiet2, "<NGAY_YL>", "</NGAY_YL>");
            $NGAY_YL_DONHANAP = $NGAY_YL_DONHANAP[0];
            $NGAY_YL_DONHANAP = strtotime($NGAY_YL_DONHANAP);
            $NGAY_YL_DONHANAP = date('H:i d/m/Y', $NGAY_YL_DONHANAP);
			$NGAY_TH_YL_DONHANAP = tag_contents($chitiet2, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $NGAY_TH_YL_DONHANAP = $NGAY_TH_YL_DONHANAP[0];
            $NGAY_TH_YL_DONHANAP = strtotime($NGAY_TH_YL_DONHANAP);
            $NGAY_TH_YL_DONHANAP = date('H:i d/m/Y', $NGAY_TH_YL_DONHANAP);
			$NGAY_KQ_DONHANAP = tag_contents($chitiet2, "<NGAY_KQ>", "</NGAY_KQ>");
            $NGAY_KQ_DONHANAP = $NGAY_KQ_DONHANAP[0];
            $NGAY_KQ_DONHANAP = strtotime($NGAY_KQ_DONHANAP);
            $NGAY_KQ_DONHANAP = date('H:i d/m/Y', $NGAY_KQ_DONHANAP);
			$NTH_DONHANAP = tag_contents($chitiet2, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");$NTH_DONHANAP = $NTH_DONHANAP[0];
        }
		if (strpos($TEN_DICH_VU, 'Soi đáy mắt trực tiếp') !== false)
        {
			$MA_MAYSDM = tag_contents($chitiet2, "<MA_MAY>", "</MA_MAY>");
			$MA_MAYSDM = $MA_MAYSDM[0];
			$MA_MAYSDM = preg_replace('~[\r\n]+~', '', $MA_MAYSDM);
            $NGAY_YL_SDM = tag_contents($chitiet2, "<NGAY_YL>", "</NGAY_YL>");
            $NGAY_YL_SDM = $NGAY_YL_SDM[0];
            $NGAY_YL_SDM = strtotime($NGAY_YL_SDM);
            $NGAY_YL_SDM = date('H:i d/m/Y', $NGAY_YL_SDM);
			$NGAY_TH_YL_SDM = tag_contents($chitiet2, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $NGAY_TH_YL_SDM = $NGAY_TH_YL_SDM[0];
            $NGAY_TH_YL_SDM = strtotime($NGAY_TH_YL_SDM);
            $NGAY_TH_YL_SDM = date('H:i d/m/Y', $NGAY_TH_YL_SDM);
			$NGAY_KQ_SDM = tag_contents($chitiet2, "<NGAY_KQ>", "</NGAY_KQ>");
            $NGAY_KQ_SDM = $NGAY_KQ_SDM[0];
            $NGAY_KQ_SDM = strtotime($NGAY_KQ_SDM);
            $NGAY_KQ_SDM = date('H:i d/m/Y', $NGAY_KQ_SDM);
			$NTH_SDM = tag_contents($chitiet2, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");$NTH_SDM = $NTH_SDM[0];
        }
		if (strpos($TEN_DICH_VU, 'Siêu âm mắt') !== false)
        {
			$MA_MAYSAM = tag_contents($chitiet2, "<MA_MAY>", "</MA_MAY>");
			$MA_MAYSAM = $MA_MAYSAM[0];
			$MA_MAYSAM = preg_replace('~[\r\n]+~', '', $MA_MAYSAM);
            $NGAY_YL_SIEUAMMAT = tag_contents($chitiet2, "<NGAY_YL>", "</NGAY_YL>");
            $NGAY_YL_SIEUAMMAT = $NGAY_YL_SIEUAMMAT[0];
            $NGAY_YL_SIEUAMMAT = strtotime($NGAY_YL_SIEUAMMAT);
            $NGAY_YL_SIEUAMMAT = date('H:i d/m/Y', $NGAY_YL_SIEUAMMAT);
			$NGAY_TH_YL_SIEUAMMAT = tag_contents($chitiet2, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $NGAY_TH_YL_SIEUAMMAT = $NGAY_TH_YL_SIEUAMMAT[0];
            $NGAY_TH_YL_SIEUAMMAT = strtotime($NGAY_TH_YL_SIEUAMMAT);
            $NGAY_TH_YL_SIEUAMMAT = date('H:i d/m/Y', $NGAY_TH_YL_SIEUAMMAT);
			$NGAY_KQ_SIEUAMMAT = tag_contents($chitiet2, "<NGAY_KQ>", "</NGAY_KQ>");
            $NGAY_KQ_SIEUAMMAT = $NGAY_KQ_SIEUAMMAT[0];
            $NGAY_KQ_SIEUAMMAT = strtotime($NGAY_KQ_SIEUAMMAT);
            $NGAY_KQ_SIEUAMMAT = date('H:i d/m/Y', $NGAY_KQ_SIEUAMMAT);
			$NTH_SIEUAMMAT = tag_contents($chitiet2, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");$NTH_SIEUAMMAT = $NTH_SIEUAMMAT[0];
        }
		if (strpos($TEN_DICH_VU, 'Định lượng Glucose') !== false)
        {
			$MA_MAYXN = tag_contents($chitiet2, "<MA_MAY>", "</MA_MAY>");
			$MA_MAYXN = $MA_MAYXN[0];
			$MA_MAYXN = preg_replace('~[\r\n]+~', '', $MA_MAYXN);
            $NGAY_YL_XN_MAU = tag_contents($chitiet2, "<NGAY_YL>", "</NGAY_YL>");
            $NGAY_YL_XN_MAU = $NGAY_YL_XN_MAU[0];
            $NGAY_YL_XN_MAU = strtotime($NGAY_YL_XN_MAU);
            $NGAY_YL_XN_MAU = date('H:i d/m/Y', $NGAY_YL_XN_MAU);
			$NGAY_TH_YL_XN_MAU = tag_contents($chitiet2, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $NGAY_TH_YL_XN_MAU = $NGAY_TH_YL_XN_MAU[0];
            $NGAY_TH_YL_XN_MAU = strtotime($NGAY_TH_YL_XN_MAU);
            $NGAY_TH_YL_XN_MAU = date('H:i d/m/Y', $NGAY_TH_YL_XN_MAU);
			$NGAY_KQ_XN_MAU = tag_contents($chitiet2, "<NGAY_KQ>", "</NGAY_KQ>");
            $NGAY_KQ_XN_MAU = $NGAY_KQ_XN_MAU[0];
            $NGAY_KQ_XN_MAU = strtotime($NGAY_KQ_XN_MAU);
            $NGAY_KQ_XN_MAU = date('H:i d/m/Y', $NGAY_KQ_XN_MAU);
			$NTH_XN_MAU = tag_contents($chitiet2, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");$NTH_XN_MAU = $NTH_XN_MAU[0];
        }
		if ((strpos($TEN_DICH_VU, 'OCT') !== false) or (strpos($TEN_DICH_VU, 'Chụp đáy mắt') !== false))
        {
			$MA_MAYOCT = tag_contents($chitiet2, "<MA_MAY>", "</MA_MAY>");
			$MA_MAYOCT = $MA_MAYOCT[0];
			$MA_MAYOCT = preg_replace('~[\r\n]+~', '', $MA_MAYOCT);
            $NGAY_YL_OCT = tag_contents($chitiet2, "<NGAY_YL>", "</NGAY_YL>");
            $NGAY_YL_OCT = $NGAY_YL_OCT[0];
            $NGAY_YL_OCT = strtotime($NGAY_YL_OCT);
            $NGAY_YL_OCT = date('H:i d/m/Y', $NGAY_YL_OCT);
			$NGAY_TH_YL_OCT = tag_contents($chitiet2, "<NGAY_TH_YL>", "</NGAY_TH_YL>");
            $NGAY_TH_YL_OCT = $NGAY_TH_YL_OCT[0];
            $NGAY_TH_YL_OCT = strtotime($NGAY_TH_YL_OCT);
            $NGAY_TH_YL_OCT = date('H:i d/m/Y', $NGAY_TH_YL_OCT);
			$NGAY_KQ_OCT = tag_contents($chitiet2, "<NGAY_KQ>", "</NGAY_KQ>");
            $NGAY_KQ_OCT = $NGAY_KQ_OCT[0];
            $NGAY_KQ_OCT = strtotime($NGAY_KQ_OCT);
            $NGAY_KQ_OCT = date('H:i d/m/Y', $NGAY_KQ_OCT);
			$NTH_OCT = tag_contents($chitiet2, "<NGUOI_THUC_HIEN>", "</NGUOI_THUC_HIEN>");
			$NTH_OCT = $NTH_OCT[0];
        }
	}
	if (strpos($TEN_CAN_LAM_SANG2, 'Đo khúc xạ giác mạc Javal') !== false)
	{$NGAY_YL = $NGAY_YL_JAVAL;$NGAY_TH_YL=$NGAY_TH_YL_JAVAL;$NGAY_KQ = $NGAY_KQ_JAVAL;$NGUOI_THUC_HIEN = $NTH_JAVAL;$MA_MAY = $MA_MAYJAVAL;}
	elseif (strpos($TEN_CAN_LAM_SANG2, 'Đo nhãn áp') !== false)
	{$NGAY_YL = $NGAY_YL_DONHANAP;$NGAY_TH_YL=$NGAY_TH_YL_JAVAL;$NGAY_KQ = $NGAY_KQ_DONHANAP;$NGUOI_THUC_HIEN = $NTH_DONHANAP;$MA_MAY = $MA_MAYNA;}
	elseif (strpos($TEN_CAN_LAM_SANG2, 'Siêu âm mắt') !== false)
	{$NGAY_YL = $NGAY_YL_SIEUAMMAT;$NGAY_TH_YL=$NGAY_TH_YL_SIEUAMMAT;$NGAY_KQ = $NGAY_KQ_SIEUAMMAT;$NGUOI_THUC_HIEN = $NTH_SIEUAMMAT;$MA_MAY = $MA_MAYSAM;}
	elseif (strpos($TEN_CAN_LAM_SANG2, 'Soi đáy mắt trực tiếp') !== false)
	{$NGAY_YL = $NGAY_YL_SDM;$NGAY_TH_YL=$NGAY_TH_YL_SDM;$NGAY_KQ = $NGAY_KQ_SDM;$NGUOI_THUC_HIEN = $NTH_SDM;$MA_MAY = $MA_MAYSDM;}
	elseif ((strpos($TEN_CAN_LAM_SANG2, 'OCT') !== false) or (strpos($TEN_CAN_LAM_SANG2, 'Chụp đáy mắt') !== false))
	{$NGAY_YL = $NGAY_YL_OCT;$NGAY_TH_YL=$NGAY_TH_YL_OCT;$NGAY_KQ = $NGAY_KQ_OCT;$NGUOI_THUC_HIEN = $NTH_OCT;$MA_MAY = $MA_MAYOCT;}
	else
	{$NGAY_YL = $NGAY_YL_XN_MAU;$NGAY_KQ = $NGAY_KQ_XN_MAU;$NGUOI_THUC_HIEN = $NTH_XN_MAU;$MA_MAY = $MA_MAYXN;}
			$mabsis = explode (";", $NGUOI_THUC_HIEN); 
			$ma_cchn = include("doctor.php");
			foreach ($mabsis as $mabs)
			{
			$NGUOI_THUC_HIEN = str_replace($mabs, $ma_cchn[$mabs], $NGUOI_THUC_HIEN);
			}
		
        $account = array(
			'MA_LK' => $MA_LK,
            'MA_BN' => $MA_BN,
            'HO_TEN' => $HO_TEN,
            'NGAY_SINH' => $NGAY_SINH,
            'GIOI_TINH' => $GIOI_TINH,
            'DIA_CHI' => $DIA_CHI,
            'CHAN_DOAN_VAO' => $CHAN_DOAN_VAO,
			'CHAN_DOAN_RV' => $CHAN_DOAN_RV,
			'MA_BENH' => $MA_BENH,
			'MA_BENHKT' => $MA_BENHKHAC,
            'MA_THE' => $MA_THE,
            'MA_DKBD' => $MA_DKBD,
            'GT_THE_TU' => $GT_THE_TU,
            'GT_THE_DEN' => $GT_THE_DEN,
			'MA_LOAI_KCB' => $MA_LOAI_KCB,
            'MA_LYDO_VVIEN' => $MA_LYDO_VVIEN,
            'MA_TAI_NAN' => $MA_TAI_NAN,
            'NGAY_VAO' => $NGAY_VAO,
            'NGAY_RA' => $NGAY_RA,
            'TEN_CAN_LAM_SANG' => $TEN_CAN_LAM_SANG,
			'GIA_TRI' => $GIA_TRI,
			'MO_TA' => $MO_TA,
			'KET_LUAN' => $KET_LUAN,
            'BS_CHI_DINH' => $BS_CHI_DINH,
            'NGUOI_THUC_HIEN' => $NGUOI_THUC_HIEN,
            'NGAY_YL' => $NGAY_YL,
			'NGAY_TH_YL' => $NGAY_TH_YL,
            'NGAY_KQ' => $NGAY_KQ,
			'MA_MAY' => $MA_MAY,
            'SO_NGAY_DTRI' => $SO_NGAY_DTRI,
            'TINH_TRANG_RV' => $TINH_TRANG_RV,
            'NGAY_TTOAN' => $NGAY_TTOAN,
            'T_THUOC' => $T_THUOC,
            'T_TONGCHI_BV' => $T_TONGCHI_BV,
			'T_TONGCHI_BH' => $T_TONGCHI_BH
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
    'CHAN_DOAN_VAO' => 'CHAN_DOAN_VAO',
	'CHAN_DOAN_RV' => 'CHAN_DOAN_RV',
	'MA_BENH' => 'MA_BENH',
	'MA_BENH_KT' => 'MA_BENH_KT',
    'MA_THE' => 'MA_THE',
    'MA_DKBD' => 'MA_DKBD',
    'GT_THE_TU' => 'GT_THE_TU',
    'GT_THE_DEN' => 'GT_THE_DEN',
	'MA_LOAI_KCB' => 'MA_LOAI_KCB',
    'MA_LYDO_VVIEN' => 'MA_LYDO_VVIEN',
    'MA_TAI_NAN' => 'MA_TAI_NAN',
    'NGAY_VAO' => 'NGAY_VAO',
    'NGAY_RA' => 'NGAY_RA',
    'TEN_CAN_LAM_SANG' => 'TEN_CAN_LAM_SANG',
	'GIA_TRI' => 'GIA_TRI',
	'MO_TA' => 'MO_TA',
	'KET_LUAN' => 'KET_LUAN',
    'BS_CHI_DINH' => 'BS_CHI_DINH',
    'NGUOI_THUC_HIEN' => 'NGUOI_THUC_HIEN',
    'NGAY_YL' => 'NGAY_YL',
	'NGAY_TH_YL' => 'NGAY_TH_YL',
    'NGAY_KQ' => 'NGAY_KQ',
	'MA_MAY' => 'MA_MAY',
    'SO_NGAY_DTRI' => 'SO_NGAY_DTRI',
    'TINH_TRANG_RV' => 'TINH_TRANG_RV',
    'NGAY_TTOAN' => 'NGAY_TTOAN',
    'T_THUOC' => 'T_THUOC',
    'T_TONGCHI_BV' => 'T_TONGCHI_BV',
	'T_TONGCHI_BH' => 'T_TONGCHI_BH'
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
