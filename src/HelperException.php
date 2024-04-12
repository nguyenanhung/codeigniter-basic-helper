<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 27/03/2023
 * Time: 15:12
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

class HelperException extends \Exception
{
    /**
     * @throws \nguyenanhung\CodeIgniter\BasicHelper\HelperException
     */
    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown ' . get_class($this));
        }
        $error_message = $message . ' - If you believe this is a codebase or framework bug, please report it and let us know here: ' . BaseHelper::GITHUB_ISSUES_URL . ' - Codebase will be improved by your contributions. Thank you!';
        parent::__construct($error_message, $code);
    }
}
