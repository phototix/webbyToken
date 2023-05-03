<?php
// Set the data and secret key
$data = 'url:sample-data';
// First Key
$secret_key = '9da8a223d0d41955d71c0a40af2c4ca8';

// Encrypt the data
$iv_size = openssl_cipher_iv_length('AES-256-CBC');
$iv = openssl_random_pseudo_bytes($iv_size);
$ciphertext = openssl_encrypt($data, 'AES-256-CBC', $secret_key, OPENSSL_RAW_DATA, $iv);
$encrypted_data = base64_encode($iv . $ciphertext);

// Print the encrypted data
echo "Encrypted data: " . $encrypted_data . "\n";

// Decrypt the data
$encrypted_data = base64_decode($encrypted_data);
$iv = substr($encrypted_data, 0, $iv_size);
$ciphertext = substr($encrypted_data, $iv_size);
$decrypted_data = openssl_decrypt($ciphertext, 'AES-256-CBC', $secret_key, OPENSSL_RAW_DATA, $iv);

// Print the decrypted data
echo "Decrypted data: " . $decrypted_data . "\n";
?>