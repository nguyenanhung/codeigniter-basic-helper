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
    const VERSION = '1.2.5';
    const LAST_MODIFIED = '2023-02-23';
    const PROJECT_NAME = 'CodeIgniter - Basic Helper';
    const AUTHOR_NAME = 'Hung Nguyen';
    const AUTHOR_FULL_NAME = 'Hung Nguyen';
    const AUTHOR_EMAIL = 'dev@nguyenanhung.com';
    const AUTHOR_WEB = 'https://nguyenanhung.com';
    const AUTHOR_BLOG = 'https://blog.nguyenanhung.com';

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
            'name'            => self::AUTHOR_NAME,
            'full_name'       => self::AUTHOR_FULL_NAME,
            'email'           => self::AUTHOR_EMAIL,
            'web'             => self::AUTHOR_WEB,
            'blog'            => self::AUTHOR_BLOG,
            'project_name'    => self::PROJECT_NAME,
            'project_version' => self::VERSION,
            'version_updated' => self::LAST_MODIFIED
        );
    }
}
