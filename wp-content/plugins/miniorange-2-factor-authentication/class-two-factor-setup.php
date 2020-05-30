<?php
/** miniOrange enables user to log in through mobile authentication as an additional layer of security over password.
 * Copyright (C) 2015  miniOrange
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 * @package        miniOrange OAuth
 * @license        http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

/**
 * This library is miniOrange Authentication Service.
 * Contains Request Calls to Customer service.
 **/
class Two_Factor_Setup {

	public $email;
	private $auth_mode = 2;	//  miniorange test or not
	private $https_mode = false; // website http or https
	function check_mobile_status( $tId ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url    = get_option( 'mo2f_host_name' ) . '/moas/api/auth/auth-status';
		$fields = array(
			'txId' => $tId
		);

		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $fields, $http_header_array );
	}

	function get_curl_error_message() {
		$message = mo2f_lt( 'Please enable curl extension.' ) .
		           ' <a href="admin.php?page=miniOrange_2_factor_settings&amp;mo2f_tab=mo2f_help">' .
		           mo2f_lt( 'Click here' ) .
		           ' </a> ' .
		           mo2f_lt( 'for the steps to enable curl or check Help & Troubleshooting.' );

		return json_encode( array( "status" => 'ERROR', "message" => $message ) );
	}

	function get_http_header_array() {

		$customerKey = get_option( 'mo2f_customerKey' );
		$apiKey      = get_option( 'mo2f_api_key' );

		/* Current time in milliseconds since midnight, January 1, 1970 UTC. */
		$currentTimeInMillis = self::get_timestamp();

		/* Creating the Hash using SHA-512 algorithm */
		$stringToHash = $customerKey . $currentTimeInMillis . $apiKey;;
		$hashValue = hash( "sha512", $stringToHash );

		$customerKeyHeader   = "Customer-Key: " . $customerKey;
		$timestampHeader     = "Timestamp: " . $currentTimeInMillis;
		$authorizationHeader = "Authorization: " . $hashValue;

		return array( "Content-Type: application/json", $customerKeyHeader, $timestampHeader, $authorizationHeader );
	}

	function get_timestamp() {
		$url = get_option( 'mo2f_host_name' ) . '/moas/rest/mobile/get-timestamp';
		$ch  = curl_init( $url );

		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt( $ch, CURLOPT_ENCODING, "" );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, $this->https_mode );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, $this->auth_mode ); // required for https urls

		curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );

		curl_setopt( $ch, CURLOPT_POST, true );
	$proxy_host = get_option( 'mo2f_proxy_host' );
		if (! empty(  $proxy_host ) ){
			curl_setopt( $ch, CURLOPT_PROXY, get_option( 'mo2f_proxy_host' ) );
			curl_setopt( $ch, CURLOPT_PROXYPORT, get_option( 'mo2f_port_number' ) );
			curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
			curl_setopt( $ch, CURLOPT_PROXYUSERPWD, get_option( "mo2f_proxy_username" ) . ':' . get_option( "mo2f_proxy_password" ) );

		}else if ( defined( 'WP_PROXY_HOST' ) && defined( 'WP_PROXY_PORT' ) && defined( 'WP_PROXY_USERNAME' ) && defined( 'WP_PROXY_PASSWORD' ) ) {
			curl_setopt( $ch, CURLOPT_PROXY, WP_PROXY_HOST );
			curl_setopt( $ch, CURLOPT_PROXYPORT, WP_PROXY_PORT );
			curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
			curl_setopt( $ch, CURLOPT_PROXYUSERPWD, WP_PROXY_USERNAME . ':' . WP_PROXY_PASSWORD );
		}

		$content = curl_exec( $ch );

		if ( curl_errno( $ch ) ) {
			echo 'Error in sending curl Request';
			exit ();
		}
		curl_close( $ch );
		
		
		if(empty( $content )){
			$currentTimeInMillis = round( microtime( true ) * 1000 );
			$currentTimeInMillis = number_format( $currentTimeInMillis, 0, '', '' );
		}
		return empty( $content ) ? $currentTimeInMillis : $content;
	}

	function make_curl_call( $url, $fields, $http_header_array ) {

		// do not apply this for call from register_kba_details function - have to find out why
		if ( gettype( $fields ) !== 'string' ) {
			$fields = json_encode( $fields );
		}

		$ch = curl_init( $url );
		
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, false );
		curl_setopt( $ch, CURLOPT_ENCODING, "" );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, $this->auth_mode );

		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, $this->https_mode );    # required for https urls

		curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $http_header_array );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 20 );
		$proxy_host = get_option( 'mo2f_proxy_host' );
		if (! empty(  $proxy_host ) ){
			curl_setopt( $ch, CURLOPT_PROXY, get_option( 'mo2f_proxy_host' ) );
			curl_setopt( $ch, CURLOPT_PROXYPORT, get_option( 'mo2f_port_number' ) );
			curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
			curl_setopt( $ch, CURLOPT_PROXYUSERPWD, get_option( "mo2f_proxy_username" ) . ':' . get_option( "mo2f_proxy_password" ) );

		}
		$content = curl_exec( $ch );

		if ( curl_errno( $ch ) ) {
			return null;
		}

		curl_close( $ch );

		return $content;
	}

	function register_mobile( $useremail ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url         = get_option( 'mo2f_host_name' ) . '/moas/api/auth/register-mobile';
		$customerKey = get_option( 'mo2f_customerKey' );
		$fields      = array(
			'customerId' => $customerKey,
			'username'   => $useremail
		);

		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $fields, $http_header_array );
	}

	function mo_check_user_already_exist( $email ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url         = get_option( 'mo2f_host_name' ) . '/moas/api/admin/users/search';
		$customerKey = get_option( 'mo2f_customerKey' );
		$fields      = array(
			'customerKey' => $customerKey,
			'username'    => $email,
		);

		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $fields, $http_header_array );
	}

	function mo_create_user( $currentuser, $email ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url         = get_option( 'mo2f_host_name' ) . '/moas/api/admin/users/create';
		$customerKey = get_option( 'mo2f_customerKey' );
		$fields      = array(
			'customerKey' => $customerKey,
			'username'    => $email,
			'firstName'   => $currentuser->user_firstname,
			'lastName'    => $currentuser->user_lastname
		);

		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $fields, $http_header_array );
	}

	function mo2f_get_userinfo( $email ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url         = get_option( 'mo2f_host_name' ) . '/moas/api/admin/users/get';
		$customerKey = get_option( 'mo2f_customerKey' );
		$fields      = array(
			'customerKey' => $customerKey,
			'username'    => $email,
		);

		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $fields, $http_header_array );
	}

	function mo2f_update_userinfo( $email, $authType, $phone, $tname, $enableAdminSecondFactor ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url               = get_option( 'mo2f_host_name' ) . '/moas/api/admin/users/update';
		$customerKey       = get_option( 'mo2f_customerKey' );
		$fields            = array(
			'customerKey'            => $customerKey,
			'username'               => $email,
			'phone'                  => $phone,
			'authType'               => $authType,
			'transactionName'        => $tname,
			'adminLoginSecondFactor' => $enableAdminSecondFactor
		);
		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $fields, $http_header_array );
	}

	function register_kba_details( $email, $question1, $answer1, $question2, $answer2, $question3, $answer3 ) {

		if ( ! MO2f_Utility::is_curl_installed() ) {
			return $this->get_curl_error_message();
		}

		$url          = get_option( 'mo2f_host_name' ) . '/moas/api/auth/register';
		$customerKey  = get_option( 'mo2f_customerKey' );
		$q_and_a_list = "[{\"question\":\"" . $question1 . "\",\"answer\":\"" . $answer1 . "\" },{\"question\":\"" . $question2 . "\",\"answer\":\"" . $answer2 . "\" },{\"question\":\"" . $question3 . "\",\"answer\":\"" . $answer3 . "\" }]";
		$field_string = "{\"customerKey\":\"" . $customerKey . "\",\"username\":\"" . $email . "\",\"questionAnswerList\":" . $q_and_a_list . "}";

		$http_header_array = $this->get_http_header_array();

		return $this->make_curl_call( $url, $field_string, $http_header_array );

	}
}

?>