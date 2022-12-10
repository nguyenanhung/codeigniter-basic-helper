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
    const VERSION       = '1.1.6.1';
    const LAST_MODIFIED = '2022-12-11';
    const AUTHOR_NAME   = 'Hung Nguyen';
    const AUTHOR_EMAIL  = 'dev@nguyenanhung.com';
    const PROJECT_NAME  = 'CodeIgniter - Basic Helper';

    /**
     * Function getVersion
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 30/07/2022 26:13
     */
    public function getVersion()
    {
        return self::VERSION;
    }
}
