<?php

	
	class WooCommerceCutomerNoteNotification extends SMSNotification
	{
		public static $instance;

		function __construct()
		{
			parent::__construct();
			$this->title 			= 'Customer Note';
			$this->page 			= 'wc_customer_note_notif';
			$this->isEnabled 		= FALSE;
			$this->tooltipHeader 	= 'CUSTOMER_NOTE_NOTIF_HEADER';
			$this->tooltipBody 		= 'CUSTOMER_NOTE_NOTIF_BODY';
			$this->recipient 		= 'customer';
			$this->smsBody 			=  MoWcAddOnMessages::showMessage('CUSTOMER_NOTE_SMS');
			$this->defaultSmsBody 	=  MoWcAddOnMessages::showMessage('CUSTOMER_NOTE_SMS');
			$this->availableTags 	= '{order-date},{order-number},{username},{site-name}';
			$this->pageHeader 		= mo_("CUSTOMER NOTE NOTIFICATION SETTINGS");
			$this->pageDescription	= mo_("SMS notifications settings for Customer Note SMS sent to the users");
			self::$instance 		= $this;
		}


		
		public static function getInstance()
		{
			return self::$instance === null ? new self() : self::$instance;
		}


		
		function sendSMS(array $args)
		{
			if(!$this->isEnabled) return;
			$orderDetails 	= $args['orderDetails'];
			if(MoUtility::isBlank($orderDetails)) return;
			$userdetails 	= get_userdata($orderDetails->get_customer_id());
			$siteName 		= get_bloginfo();
			$username 		= MoUtility::isBlank($userdetails) ? "" : $userdetails->user_login;
			$phoneNumber 	= $orderDetails->get_billing_phone();
			$dateCreated 	= $orderDetails->get_date_created()->date_i18n();
			$orderNo 		= $orderDetails->get_order_number();
			$smsBody 		= MoUtility::replaceString(array( 'site-name'    =>$siteName, 'username' =>$username, 'order-date' =>$dateCreated,
			                                                         'order-number' =>$orderNo), $this->smsBody);
			if(MoUtility::isBlank($phoneNumber)) return;
			MoUtility::send_phone_notif($phoneNumber, $smsBody);
		}
	}