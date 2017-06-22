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
}
