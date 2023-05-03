<?php
/* 
Author: AliceKarns 
Version: 1.0
Description: Encrypt.
*/

if((isset($_POST["tokenKey"])&&isset($_POST["stringData"]))&&(!empty($_POST["tokenKey"])&&!empty($_POST["stringData"]))){

	// Encrypt the data
	$iv_size = openssl_cipher_iv_length('AES-256-CBC');
	$iv = openssl_random_pseudo_bytes($iv_size);
	$ciphertext = openssl_encrypt($_POST["stringData"], 'AES-256-CBC', $_POST["tokenKey"], OPENSSL_RAW_DATA, $iv);
	$encrypted_data = base64_encode($iv . $ciphertext);

	// Output decrytped key
	echo $encrypted_data;
}
?>