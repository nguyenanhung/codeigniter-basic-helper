<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 30/07/2022
 * Time: 15:25
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

/**
 * Class BaseHelper
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseHelper
{
    const VERSION = '1.5.9.1';
    const LAST_MODIFIED = '2023-09-24';
    const PROJECT_NAME = 'CodeIgniter - Basic Helper';
    const AUTHOR_NAME = 'Hung Nguyen';
    const AUTHOR_FULL_NAME = 'Hung Nguyen';
    const AUTHOR_EMAIL = 'dev@nguyenanhung.com';
    const AUTHOR_WEB = 'https://nguyenanhung.com';
    const AUTHOR_BLOG = 'https://blog.nguyenanhung.com';
    const GITHUB_URL = 'https://github.com/nguyenanhung/codeigniter-basic-helper';
    const GITHUB_ISSUES_URL = 'https://github.com/nguyenanhung/codeigniter-basic-helper/issues';
    const PACKAGES_URL = 'https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper';

    public function getVersion()
    {
        return self::VERSION;
    }

    public static function version()
    {
        return self::VERSION;
    }

    public function getAuthor()
    {
        return array(
            'name' => self::AUTHOR_NAME,
            'full_name' => self::AUTHOR_FULL_NAME,
            'email' => self::AUTHOR_EMAIL,
            'web' => self::AUTHOR_WEB,
            'blog' => self::AUTHOR_BLOG
        );
    }

    public function getPackageInfo()
    {
        return array(
            'project_name' => self::PROJECT_NAME,
            'project_version' => self::VERSION,
            'version_updated' => self::LAST_MODIFIED,
            'project_github' => self::GITHUB_URL,
            'project_packages' => self::PACKAGES_URL,
            'project_maintainer' => $this->getAuthor()
        );
    }

    public static function writeLn($message, $newLine = "\n")
    {
        if (function_exists('json_encode') && (is_array($message) || is_object($message))) {
            $message = json_encode($message);
        }
        echo $message . $newLine;
    }
}
