<?php

/*
 * @version 0.0.20170622
 */

/**
 * 處理信件發送 支援SMTP SENDMAIL
 *
 * @author Johnny
 */
class Mailer {
	const EOL = "\r\n";
	
	/** @var boolean 是否使用SMTP */
	public $isSmtp = false;
	
	/** @var string SMTP伺服器位置 */
	public $smtpServer = 'localhost';
	
	/** @var integer SMTP Port */
	public $smtpPort = 25;
	
	
	/** @var boolean 是否使用帳號登入SMTP */
	public $auth = false;
	
	/** @var string SMTP5帳號 */
	public $username;

	/** @var string SMTP5密碼 */
	public $password;
	
	/** @var integer SMTP連線時間 */
	public $timeout = 20;
	
	/** @var string 寄件人 */
	protected $from = '';
	
	
	/** @var string 回覆信箱 */
	protected $replyTo = '';
	
	
	/**
	 * @var array 收件人 
	 * @example [
	 *    [信箱],[信箱 <someone@somewhere.where>]
	 * ]
	 */
	protected $to = array();
	
	/** @var array 副本 */
	protected $cc = array();
	
	/** @var array 密件副本 */
	protected $bcc = array();
	
	/** @var string 語言編碼 */
	public $charset = 'UTF-8';
	
	/** @var boolean 是否為html格式內容 */
	public $isHTML = true;
	
	/** @var string 信件標題 */
	protected $subject = 'No subject';
	
	/** @var string 內容 */
	public $message = '';
	
	/** @var string 純文字替代內容 */
	public $altBody = '';
	
	/**
	 * @var array 檔案附件
	 * @example [
	 *    [檔案路徑 , optional 檔案名稱],[檔案路徑 , optional 檔案名稱]
	 * ]
	 */
	public $attachments = array();
	
	/** @var string 錯誤訊息 */
	public $errMsg = '';
	
	private $mixBoundaryId;
	private	$mixBoundary ;
	private	$mixBoundaryEnd;
	private	$altBoundaryId;
	private	$altBoundary;
	private	$altBoundaryEnd ;
	
	function __construct() {
		$this -> mixBoundaryId = 'mix_'.md5(microtime());
		$this -> mixBoundary =  '--'.$this -> mixBoundaryId.$this -> EOL ;
		$this -> mixBoundaryEnd =  '--'.$this -> mixBoundaryId.'--'.$this -> EOL ;

		$this -> altBoundaryId = 'alt_'.md5(microtime(true));
		$this -> altBoundary =  '--'.$this -> altBoundaryId.$this -> eol ;
		$this -> altBoundaryEnd =  '--'.$this -> altBoundaryId.'--' .$this -> EOL ;
	}
	
	/**
	 * 使用SMTP送信並設定SMPT連線資料
	 * @param string  $server  SMTP位置
	 * @param integer $port  optional SMTP PORT
	 * @param string  $username  optional SMTP帳號
	 * @param string  $password  optional SMTP密碼
	 * @access public
	 */ 
	function smtp($server , $port = 25 , $username = '' , $password = ''){
		$this -> isSmtp = true;
		$this -> smtpServer = $server;
		$this -> smtpPort = $port;

		if(!empty($username) && !empty($password) ){
			$this -> auth = true;
			$this -> username = $username;
			$this -> password = $password;
		}
	}
}
