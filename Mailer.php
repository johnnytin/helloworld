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
	/**
	 * 
	 *@var boolean 是否使用SMTP
	 * 
	 */
	public $isSmtp = false;
	
	/**
	 *
	 * @var string SMTP伺服器位置
	 * 
	 */
	public $smtpServer = 'localhost';
	
	/**
	 *
	 * @var integer SMTP Port
	 * 
	 */
	public $port = 25;
	
	
	/**
	 *
	 * @var 是否使用帳號登入SMTP
	 */
	public $auth = false;
	
	/**
	 *
	 * @var SMTP5帳號
	 */
	public $username;

	/** 
	 * 
	 * @var SMTP5密碼
	 */
	public $password;
	
	/** 
	 * 
	 * @var SMTP連線時間
	 */
	public $timeout = 20;
	
	
	
}
