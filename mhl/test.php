<?php
    // Load the XML file
    $xml = simplexml_load_file("4210/4210/240420NB030_QD4210.xml");

     // Get patient information
    $patientInfo = $xml->THONGTINHOSO->DANHSACHHOSO->HOSO;

    // Create an empty array to hold patient data
    $patients = array();

    // Loop through each patient in the file
    foreach ($patientInfo as $patient) {
        $patientData = array();

        // Extract data for each patient
        $patientData['LOAIHOSO'] = (string)$patient->FILEHOSO->LOAIHOSO;
        $patientData['NOIDUNGFILE'] = (string)$patient->FILEHOSO->NOIDUNGFILE;
        $patientData['HO_TEN'] = base64_decode((string)$patient->FILEHOSO->NOIDUNGFILE); // Assuming the patient's name is encoded in base64

        // Add patient data to patients array
        $patients[] = $patientData;
    }

    // Now you can do whatever you want with the $patients array,
    // such as converting it to JSON, or inserting it into a database, etc.
    print_r($patients);
?>