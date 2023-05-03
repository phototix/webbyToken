<?php
/* 
Author: AliceKarns 
Version: 1.0
Description: Decrypt.
*/
if((isset($_POST["secretKey"])&&isset($_POST["encryptedKey"]))&&(!empty($_POST["secretKey"])&&!empty($_POST["encryptedKey"]))){
	
	// Decrypt the data
	$iv_size = openssl_cipher_iv_length('AES-256-CBC');
	$encrypted_data = base64_decode($_POST["encryptedKey"]);
	$iv = substr($encrypted_data, 0, $iv_size);
	$ciphertext = substr($encrypted_data, $iv_size);
	$decrypted_data = openssl_decrypt($ciphertext, 'AES-256-CBC', $_POST["secretKey"], OPENSSL_RAW_DATA, $iv);

	// Display data
	echo $decrypted_data;
}
?>