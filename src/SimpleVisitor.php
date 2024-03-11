<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 07/08/2023
 * Time: 10:46
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

/**
 * Class SimpleVisitor
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 *
 * @property \CI_Session $sessClass
 * @property \CI_Output $outputClass
 */
class SimpleVisitor extends BaseHelper
{
	const CCU_SESSION_ID = 'session_id_visitor_onload_ccu_';
	const CCU_SESSION_VALUE = 'YES';

	protected $filename;
	protected $sessClass;
	protected $sessId;
	protected $outputClass;

	public function setFilename($filename)
	{
		$this->filename = $filename;

		return $this;
	}

	public function setSessClass($sessClass)
	{
		$this->sessClass = $sessClass;

		return $this;
	}

	public function setSessId($sessId)
	{
		$this->sessId = $sessId;

		return $this;
	}


	public function setOutputClass($outputClass)
	{
		$this->outputClass = $outputClass;

		return $this;
	}

	public function totalVisitor()
	{
		$CountFile = $this->filename;
		if (!file_exists($CountFile)) {
			return 0;
		}
		$CF = fopen($CountFile, 'rb');
		$Views = fread($CF, filesize($CountFile));
		fclose($CF);
		$Views++;
		$CF = fopen($CountFile, 'wb');
		fwrite($CF, $Views);
		fclose($CF);

		return $Views;
	}

	public function ccuOnload()
	{
		$CountFile = $this->filename;
		if (!file_exists($CountFile)) {
			return 0;
		}
		$myfile = fopen($CountFile, "r") or die("Unable to open file!");
		$before = fread($myfile, filesize($CountFile));
		fclose($myfile);

		if (empty($this->sessId)) {
			$this->sessId = self::CCU_SESSION_ID;
		}

		if ($this->sessClass->userdata($this->sessId . date('Y_m_d')) === self::CCU_SESSION_VALUE) {
			$this->outputClass->set_content_type('application/json')->set_output($before)->_display();
			exit();
		}

		$this->sessClass->set_userdata($this->sessId . date('Y_m_d'), self::CCU_SESSION_VALUE);
		$myfile = fopen($CountFile, "w") or die("Unable to open file!");
		$after = $before + 1;
		fwrite($myfile, $after);
		fclose($myfile);

		$this->outputClass->set_content_type('application/json')->set_output($after)->_display();
		exit();
	}

	public function ccuOnclose()
	{
		if (empty($this->sessId)) {
			$this->sessId = self::CCU_SESSION_ID;
		}

		$this->sessClass->unset_userdata($this->sessId . date('Y_m_d'));
		$CountFile = $this->filename;
		if (!file_exists($CountFile)) {
			return 0;
		}
		$myfile = fopen($CountFile, "r") or die("Unable to open file!");
		$before = fread($myfile, filesize($CountFile));
		fclose($myfile);
		$myfile = fopen($CountFile, "w") or die("Unable to open file!");
		$after = $before - 1;
		fwrite($myfile, $after);
		fclose($myfile);
		$this->outputClass->set_content_type('application/json')->set_output($after)->_display();
		exit();
	}

	public function ccuTruncate()
	{
		if (!is_cli()) {
			show_404();
			exit();
		}
		$CountFile = $this->filename;
		if (!file_exists($CountFile)) {
			return 0;
		}
		$myfile = fopen($CountFile, "w") or die("Unable to open file!");
		$truncateNumber = 5;
		fwrite($myfile, $truncateNumber);
		fclose($myfile);
		self::writeLn("Update CCU count: " . $truncateNumber);
		exit();
	}
}
