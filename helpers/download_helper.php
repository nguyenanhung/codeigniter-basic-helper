<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 17/05/2023
 * Time: 11:02
 */
if (!function_exists('download_file_chunked')) {
    function download_file_chunked($path)
    {
        $file_name = basename($path);

        // get the file's mime type to send the correct content type header
        //$finfo = finfo_open(FILEINFO_MIME_TYPE); //For remote file, it may not work
        //$mime_type = finfo_file($finfo, $path); //For remote file, it may not work
        $mime_type = mime_type($file_name);

        $attachment = (mb_strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) ? "" : " attachment"; // IE 5.5 fix.

        // send the headers
        header("Content-Type: $mime_type");
        header('Content-Transfer-Encoding: binary');
        //header('Content-Length: ' . filesize($path)); //PHP Warning: filesize(): stat failed for remote file
        //header("Content-Disposition: attachment; filename=$file_name;");
        header("Content-Disposition: $attachment; filename=$file_name;");

        $options = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        $context = stream_context_create($options);

        //$handle = fopen($path, 'rb');
        $handle = fopen($path, 'rb', false, $context);

        ob_end_clean();//output buffering is disabled, so you won't hit your memory limit

        $buffer = '';
        $chunkSize = 1024 * 1024;

        //$newfname = basename($path);
        //$newf = fopen ($newfname, "wb");

        ob_start();
        while (!feof($handle)) {
            $buffer = fread($handle, $chunkSize);
            echo $buffer;
            ob_flush();
            flush();
            //fwrite($newf, $buffer, $chunkSize);
        }

        fclose($handle);

        //fclose($newf);

        exit;
    }
}
if (!function_exists('download_large_file')) {
    function download_large_file($path)
    {
        // the file name of the download, change this if needed
        $file_name = basename($path);

        // get the file's mime type to send the correct content type header
        //$finfo = finfo_open(FILEINFO_MIME_TYPE); //For remote file, it may not work
        //$mime_type = finfo_file($finfo, $path); //For remote file, it may not work
        $mime_type = mime_type($file_name);

        $attachment = (mb_strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) ? "" : " attachment"; // IE 5.5 fix.

        // send the headers
        header("Content-Type: $mime_type");
        //header('Content-Length: ' . filesize($path)); //PHP Warning: filesize(): stat failed for remote file
        //header("Content-Disposition: attachment; filename=$file_name;");
        header("Content-Disposition: $attachment; filename=$file_name;");

        //Disable SSL verification
        $options = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );

        $context = stream_context_create($options);

        // stream the file
        //$fp = fopen($path, 'rb');
        $fp = fopen($path, 'rb', false, $context);

        ob_end_clean();//output buffering is disabled, so you won't hit your memory limit

        fpassthru($fp);

        fclose($fp);

        exit;
    }
}
