<?php

class encryption {

    public static function encrypt($data, $secret)
    {
        //Generate a key from a hash
        $key = md5(utf8_encode($secret), true);
        
        //Take first 8 bytes of $key and append them to the end of $key.
        $key .= substr($key, 0, 8);
        
        //Pad for PKCS7
        $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
        $len = strlen($data);
        $pad = $blockSize - ($len % $blockSize);
        $data .= str_repeat(chr($pad), $pad);
        
        //Encrypt data
        $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');
        
        return base64_encode($encData);
    }
    
    
    public static function encryptPwd($data)
    {
        //Generate a key from a hash
        $key = md5(utf8_encode($secret), true);
        
        //Take first 8 bytes of $key and append them to the end of $key.
        $key .= substr($key, 0, 8);
        
        //Pad for PKCS7
        $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
        $len = strlen($data);
        $pad = $blockSize - ($len % $blockSize);
        $data .= str_repeat(chr($pad), $pad);
        
        //Encrypt data
        $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');
        
        return base64_encode($encData);
    }
    
    public static function pkcs5_pad ($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
        
    public static function decrypt($data, $secret)
    {
        //Generate a key from a hash
        $key = md5(utf8_encode($secret), true);
        
        //Take first 8 bytes of $key and append them to the end of $key.
        $key .= substr($key, 0, 8);
        
        $data = base64_decode($data);
        
        $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');
        
        $block = mcrypt_get_block_size('tripledes', 'ecb');
        $len = strlen($data);
        $pad = ord($data[$len-1]);
        
        return substr($data, 0, strlen($data) - $pad);
    }
    
    public static function generateSalt(){
        
        $key = "l2348esiujka2T9!@#$%&*?/\\][{}\';:.>,<()-_=+|'"; 
        $max = 15;
        // Key generator

        $i = 0;
        $salt = "";
        
        while ($i < $max) {
            $salt .= $key{mt_rand(0, (strlen($key) - 1))};
            $i++;
        }
      //  $salt = base64_encode(openssl_random_pseudo_bytes(128, $secure));
        //The variable $secure is given by openssl_random_ps... and it will give a true or false if its tru then it means that the salt is secure for cryptologic.
       // while(!$secure){
        //    $salt = base64_encode(openssl_random_pseudo_bytes(128, $secure));
       // }
        //Encrypt data
        // $encData = base64_encode(mcrypt_create_iv(9, MCRYPT_DEV_URANDOM));
       // $encData = base64_encode(mcrypt_encrypt('tripledes', $key, $salt, 'ecb'));
        $encData = base64_encode(hash("sha256",mb_convert_encoding($salt,"UTF-16LE"),true));
     
     
        return $encData;
        
    }
    
    
    public static function hashPwd($password){

        $pwdHash = base64_encode(hash("sha256",mb_convert_encoding($password,"UTF-16LE"),true));
      //  $hash = hash("sha256", $salt.".".$password);
        return $pwdHash;
    }
}