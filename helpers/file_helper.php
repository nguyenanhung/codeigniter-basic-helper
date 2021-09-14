<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:20
 */
if (!function_exists('formatSizeUnits')) {
    /**
     * Function formatSizeUnits
     *
     * @param $bytes
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 20:31
     */
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
if (!function_exists('genarateFileIndex')) {
    /**
     * Function genarateFileIndex
     *
     * @param string $file_path
     * @param string $file_name
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 55:13
     */
    function genarateFileIndex($file_path = '', $file_name = 'index.html')
    {
        if (function_exists('log_message') && function_exists('write_file')) {
            if ($file_path != '') {
                if (is_dir($file_path) === false) {
                    mkdir($file_path);
                    log_message('debug', 'Genarate new Folder: ' . $file_path);
                }
                // SET file location
                $file_location = $file_path . '/' . $file_name;
                // Tạo file index.html nếu chưa có
                if (file_exists($file_location) === false) {
                    $file_content = "<!DOCTYPE html>\n<html lang='vi'>\n<head>\n<title>403 Forbidden</title>\n</head>\n<body>\n<p>Directory access is forbidden.</p>\n</body>\n</html>";
                    write_file($file_location, $file_content);
                    // PUT Logs
                    log_message('debug', 'Genarate new file Index.html in Location ' . $file_location);

                    // Return
                    return true;
                } else {
                    // PUT Logs
                    log_message('debug', 'File Index.html Exists in Location ' . $file_location);

                    // Return
                    return false;
                }
            } else {
                log_message('debug', 'Genarate File Index.html failed');

                // Return
                return false;
            }
        }

        return false;
    }
}
if (!function_exists('genarateFileHtaccess')) {
    /**
     * Function genarateFileHtaccess
     *
     * @param string $file_path
     * @param string $file_name
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 55:51
     */
    function genarateFileHtaccess($file_path = '', $file_name = '.htaccess')
    {
        if (function_exists('log_message') && function_exists('write_file')) {
            if ($file_path != '') {
                // SET file Path
                if (is_dir($file_path) === false) {
                    mkdir($file_path);
                    // PUT Logs
                    log_message('debug', 'Genarate new Folder: ' . $file_path);
                }
                // SET file location
                $file_location = $file_path . '/' . $file_name;
                // Tạo file .htaccess nếu chưa có
                if (file_exists($file_location) === false) {
                    $file_content = "RewriteEngine On\nOptions -Indexes\nAddType text/plain php3 php4 php5 php cgi asp aspx html css js";
                    write_file($file_location, $file_content);
                    // PUT Logs
                    log_message('debug', 'Genarate new file .htaccess in Location ' . $file_location);

                    // Return
                    return true;
                } else {
                    // PUT Logs
                    log_message('debug', 'File .htaccess Exists in Location ' . $file_location);

                    // Return
                    return false;
                }
            } else // PUT Logs
            {
                log_message('debug', 'Genarate File .htaccess failed');

                // Return
                return false;
            }
        }

        return false;
    }
}
if (!function_exists('genarateFileReadme')) {
    /**
     * Function genarateFileReadme
     *
     * @param string $file_path
     * @param string $file_name
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 58:14
     */
    function genarateFileReadme($file_path = '', $file_name = 'README.md')
    {
        if (function_exists('log_message') && function_exists('write_file')) {
            if ($file_path != '') {
                if (is_dir($file_path) === false) {
                    mkdir($file_path);
                    log_message('debug', 'Genarate new Folder: ' . $file_path);
                }
                // SET file location
                $file_location = $file_path . '/' . $file_name;
                // Tạo file .htaccess nếu chưa có
                if (file_exists($file_location) === false) {
                    $file_content = "# README";
                    write_file($file_location, $file_content);
                    // PUT Logs
                    log_message('debug', 'Genarate new file ' . $file_name . ' in Location ' . $file_location);

                    // Return
                    return true;
                } else {
                    // PUT Logs
                    log_message('debug', 'File ' . $file_name . ' Exists in Location ' . $file_location);

                    // Return
                    return false;
                }
            } else {
                log_message('debug', 'Genarate File ' . $file_name . ' failed');

                // Return
                return false;
            }
        }

        return false;
    }
}
if (!function_exists('makeNewFolder')) {
    /**
     * Function makeNewFolder
     *
     * @param string $folderPath
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 57:33
     */
    function makeNewFolder($folderPath = '')
    {
        if (empty($folderPath)) {
            return false;
        }
        if (is_dir($folderPath) === false) {
            @mkdir($folderPath);
            genarateFileIndex($folderPath);
            genarateFileHtaccess($folderPath);
            genarateFileReadme($folderPath);

            return true;
        }

        return false;
    }
}
if (!function_exists('new_folder')) {
    /**
     * Function new_folder
     *
     * @param string $folder
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 58:13
     */
    function new_folder($folder = '')
    {
        return makeNewFolder($folder);
    }
}
