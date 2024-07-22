<?php
/**
 *  PHP script to zip folder using RecursiveDirectoryIterator PHP function
 */ 

  // Get real path for folder
  $folder_to_zip = realpath("xml/130");
  
  //saving zip  
  $zipname = "xml/130.zip";
  // we are using try and catch
 // you can run the script without the try..catch 
  try{
  // Initialize archive object
  $zip = new ZipArchive();
  $zip->open( $zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);

  // Create recursive directory iterator
  $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder_to_zip), RecursiveIteratorIterator::LEAVES_ONLY );

  foreach ($files as $name => $file) {
   	 // Skip directories (they would be added automatically)
  	  if (!$file->isDir()) {
     	    // Get real and relative path for current file
	      $filePath = $file->getRealPath();
              $relativePath = substr($filePath, strlen($folder_to_zip) + 1);
        
             // Add current file to archive
       	      $zip->addFile($filePath, $relativePath);
   	  } // if ends
     } // foreach ends
   echo "zip is generated";

 } catch( Exception $e ){
	// catch message  for unable to generate zip
 }
?>