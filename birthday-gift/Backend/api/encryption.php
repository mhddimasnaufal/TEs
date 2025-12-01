<?php
require_once '../config.php';

class SimpleEncryption {
    private static $key = ENCRYPTION_KEY;
    private static $method = ENCRYPTION_METHOD;
    
    public static function encrypt($data) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$method));
        $encrypted = openssl_encrypt(
            json_encode($data),
            self::$method,
            self::$key,
            0,
            $iv
        );
        
        return base64_encode($encrypted . '::' . base64_encode($iv));
    }
    
    public static function decrypt($token) {
        list($encrypted_data, $iv) = explode('::', base64_decode($token), 2);
        $iv = base64_decode($iv);
        
        $decrypted = openssl_decrypt(
            $encrypted_data,
            self::$method,
            self::$key,
            0,
            $iv
        );
        
        return json_decode($decrypted, true);
    }
    
    public static function generateAPIToken() {
        $data = [
            'user' => 'birthday_site',
            'timestamp' => time(),
            'expires' => time() + (24 * 60 * 60) // 24 jam
        ];
        
        return self::encrypt($data);
    }
    
    public static function validateAPIToken($token) {
        try {
            $data = self::decrypt($token);
            
            if (!$data || !isset($data['expires']) || $data['expires'] < time()) {
                return false;
            }
            
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>