<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:20
 */
if (!function_exists('write_file')) {
    /**
     * Write File
     *
     * Writes data to the file specified in the path.
     * Creates a new file if non-existent.
     *
     * @param string $path File path
     * @param string $data Data to write
     * @param string $mode fopen() mode (default: 'wb')
     *
     * @return    bool
     */
    function write_file($path, $data, $mode = 'wb')
    {
        if (!$fp = @fopen($path, $mode)) {
            return false;
        }

        flock($fp, LOCK_EX);

        for ($result = $written = 0, $length = strlen($data); $written < $length; $written += $result) {
            if (($result = fwrite($fp, substr($data, $written))) === false) {
                break;
            }
        }

        flock($fp, LOCK_UN);
        fclose($fp);

        return is_int($result);
    }
}
if (!function_exists('delete_files')) {
    /**
     * Delete Files
     *
     * Deletes all files contained in the supplied directory path.
     * Files must be writable or owned by the system in order to be deleted.
     * If the second parameter is set to TRUE, any directories contained
     * within the supplied base directory will be nuked as well.
     *
     * @param string $path    File path
     * @param bool   $del_dir Whether to delete any directories found in the path
     * @param bool   $htdocs  Whether to skip deleting .htaccess and index page files
     * @param int    $_level  Current directory depth level (default: 0; internal use only)
     *
     * @return    bool
     */
    function delete_files($path, $del_dir = false, $htdocs = false, $_level = 0)
    {
        // Trim the trailing slash
        $path = rtrim($path, '/\\');

        if (!$current_dir = @opendir($path)) {
            return false;
        }

        while (false !== ($filename = @readdir($current_dir))) {
            if ($filename !== '.' && $filename !== '..') {
                $filepath = $path . DIRECTORY_SEPARATOR . $filename;

                if (is_dir($filepath) && !is_link($filepath)) {
                    delete_files($filepath, $del_dir, $htdocs, $_level + 1);
                } elseif ($htdocs !== true || !preg_match('/^(\.htaccess|index\.(html|htm|php)|web\.config)$/i', $filename)) {
                    @unlink($filepath);
                }
            }
        }

        closedir($current_dir);

        if (($del_dir === true && $_level > 0)) {
            return @rmdir($path);
        }

        return true;
    }
}
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
            $bytes .= ' bytes';
        } elseif ($bytes === 1) {
            $bytes .= ' byte';
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
            if ($file_path !== '') {
                if (is_dir($file_path) === false) {
                    if (!mkdir($file_path) && !is_dir($file_path)) {
                        throw new RuntimeException(sprintf('Directory "%s" was not created', $file_path));
                    }
                    log_message('debug', 'Genarate new Folder: ' . $file_path);
                }
                // SET file location
                $file_location = $file_path . '/' . $file_name;
                // Tạo file index.html nếu chưa có
                if (file_exists($file_location) === false) {
                    $file_content = "<!DOCTYPE html>\n<html lang='vi'>\n<head>\n<title>403 Forbidden</title>\n</head>\n<body>\n<p>Directory access is forbidden.</p>\n</body>\n</html>";
                    write_file($file_location, $file_content);
                    log_message('debug', 'Genarate new file Index.html in Location ' . $file_location);

                    return true;
                }
                log_message('debug', 'File Index.html Exists in Location ' . $file_location);

                return false;
            }
            log_message('debug', 'Genarate File Index.html failed');

            return false;
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
            if ($file_path !== '') {
                // SET file Path
                if (is_dir($file_path) === false) {
                    if (!mkdir($file_path) && !is_dir($file_path)) {
                        throw new RuntimeException(sprintf('Directory "%s" was not created', $file_path));
                    }
                    log_message('debug', 'Genarate new Folder: ' . $file_path);
                }
                $file_location = $file_path . '/' . $file_name;
                // Tạo file .htaccess nếu chưa có
                if (file_exists($file_location) === false) {
                    $file_content = "RewriteEngine On\nOptions -Indexes\nAddType text/plain php3 php4 php5 php cgi asp aspx html css js";
                    write_file($file_location, $file_content);
                    log_message('debug', 'Genarate new file .htaccess in Location ' . $file_location);

                    return true;
                }
                log_message('debug', 'File .htaccess Exists in Location ' . $file_location);

                return false;
            }
            log_message('debug', 'Genarate File .htaccess failed');

            return false;
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
            if ($file_path !== '') {
                if (is_dir($file_path) === false) {
                    if (!mkdir($file_path) && !is_dir($file_path)) {
                        throw new RuntimeException(sprintf('Directory "%s" was not created', $file_path));
                    }
                    log_message('debug', 'Genarate new Folder: ' . $file_path);
                }
                $file_location = $file_path . '/' . $file_name;
                // Tạo file .htaccess nếu chưa có
                if (file_exists($file_location) === false) {
                    $file_content = "# README";
                    write_file($file_location, $file_content);
                    log_message('debug', 'Genarate new file ' . $file_name . ' in Location ' . $file_location);

                    return true;
                }
                log_message('debug', 'File ' . $file_name . ' Exists in Location ' . $file_location);

                return false;
            }
            log_message('debug', 'Genarate File ' . $file_name . ' failed');

            return false;
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
            if (!mkdir($folderPath) && !is_dir($folderPath)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
            }
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
if (!function_exists('scan_folder')) {
    /**
     * Function scan_folder - Quét và lấy ra danh sách các thông tin dữ liệu trong folder
     *
     * @param $path
     * @param $ignoreFiles
     *
     * @return array|false
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/12/2022 26:58
     */
    function scan_folder($path, $ignoreFiles = array())
    {
        try {
            if (is_dir($path)) {
                $data = array_diff(scandir($path), array_merge(array('.', '..', '.DS_Store'), $ignoreFiles));
                natsort($data);

                return $data;
            }

            return array();
        } catch (Exception $ex) {
            if (function_exists('log_message')) {
                log_message('error', __get_error_message__($ex));
                log_message('error', __get_error_trace__($ex));
            }
            return array();
        }
    }
}
if (!function_exists('getAllFileSizeInFolder')) {
    /**
     * Function getAllFileSizeInFolder - Get all File size in Folder
     *
     * @param $path
     *
     * @return float
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/12/2022 24:09
     */
    function getAllFileSizeInFolder($path)
    {
        $size = 0;
        // Kiểm tra thư mục có tồn tại hay không
        if (file_exists($path) && is_dir($path)) {
            // Quét tất cả các file trong thư mục
            $result = scandir($path);

            // Lọc ra các thư mục hiện tại (.) và các thư mục cha (..)
            $files = array_diff($result, array('.', '..'));

            if (count($files) > 0) {
                // Lặp qua mảng đã trả lại
                foreach ($files as $file) {
                    if (is_file("$path/$file")) {
                        // tính tổng size
                        $size += filesize($path . '/' . $file);
                    } elseif (is_dir("$path/$file")) {
                        // Gọi đệ quy hàm nếu tìm thấy thư mục
                        getAllFileInFolder("$path/$file");
                    }
                }
            }
        }

        return round($size / 1024 / 1024, 2);
    }
}
if (!function_exists('getAllFileInFolder')) {
    /**
     * Function getAllFileInFolder - Get all File in Folder
     *
     * @param $path
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/12/2022 23:53
     */
    function getAllFileInFolder($path)
    {
        // Kiểm tra thư mục có tồn tại hay không
        if (file_exists($path) && is_dir($path)) {
            // Quét tất cả các file trong thư mục
            $result = scandir($path);

            // Lọc ra các thư mục hiện tại (.) và các thư mục cha (..)
            $files = array_diff($result, array('.', '..'));

            if (count($files) > 0) {
                // Lặp qua mảng đã trả lại
                foreach ($files as $file) {
                    if (is_file("$path/$file")) {
                        // Hiển thị tên File
                        echo $file . "<br>";
                    } elseif (is_dir("$path/$file")) {
                        // Gọi đệ quy hàm nếu tìm thấy thư mục
                        getAllFileInFolder("$path/$file");
                    }
                }
            } else {
                echo "ERROR: File not Found.";
            }
        } else {
            echo "ERROR: Folder not Found.";
        }
    }
}
