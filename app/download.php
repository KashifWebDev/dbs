<?php
if(isset($_GET["file"])){
    // Get parameters
    $file = $_GET["file"]; // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */

        $filepath = "assets/manuals/" . $file;

        // Process download

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            die();

}
//if(!empty($name) || $name!=""){
//
//    $file = "assets/manuals/".$name;
//
//
//    header("Content-Type: application/octet-stream");
//    header("Content-Disposition: attachment; filename=$file");
//    readfile("$file");
//}
?>