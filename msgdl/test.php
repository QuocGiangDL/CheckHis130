<?php
// Load the XML file
$xmlFile = '130/130/240713DL050_130.xml';
$xmlContent = file_get_contents($xmlFile);
$xml = new SimpleXMLElement($xmlContent);

// Iterate through each <FILEHOSO> tag and find those with <LOAIHOSO>XML1</LOAIHOSO>
foreach ($xml->xpath('//FILEHOSO[LOAIHOSO="XML1"]') as $fileHoso) {
    $noidungfile = $fileHoso->NOIDUNGFILE;
    $decodedContent = base64_decode($noidungfile);
    echo $decodedContent . "\n";
}
?>