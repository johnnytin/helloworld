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
	public $port = 25;
	
	
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

}
