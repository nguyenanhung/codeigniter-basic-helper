<?php

if ( ! function_exists('genarateFileIndex')) {
    function genarateFileIndex($file_path = '', $file_name = 'index.html')
    {
        return generateFileIndex($file_path, $file_name);
    }
}
if ( ! function_exists('genarateFileHtaccess')) {
    function genarateFileHtaccess($file_path = '', $file_name = '.htaccess')
    {
        return generateFileHtaccess($file_path, $file_name);
    }
}
if ( ! function_exists('genarateFileReadme')) {
    function genarateFileReadme($file_path = '', $file_name = 'README.md')
    {
        return generateFileReadme($file_path, $file_name);
    }
}
