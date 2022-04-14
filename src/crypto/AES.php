<?php

namespace thank\crypto;

class  AES
{
    // 加密 KEY
    protected $key = '654mca0l38b489d9f306a5b8e105334b';
    // 偏移量
    protected $iv = 'c5defg0045222c52';

    public function __construct($config)
    {
        $this->key = $config['key'] ?? $this->key;
        $this->iv  = $config['iv'] ?? $this->iv;
    }

    /**
     * AES加密
     *
     * @param array  $data   待转换报文
     * @param string $method 方法
     *
     * @return string
     */
    public function encrypt(
        array  $data,
        string $method = 'AES-256-CBC'
    ): string
    {
        $plaintext = json_encode($data);
        $str = openssl_encrypt($plaintext, $method, $this->key, 0, $this->iv);

        $search = ['+', '/'];
        $replace = ['-', '_'];
        return str_replace($search, $replace, $str);
    }

    /**
     * AES解密
     *
     * @param string $encrypt 待转换密文
     * @param string $method  方法
     *
     * @return array
     */
    public function decrypt(
        string $encrypt,
        string $method = 'AES-256-CBC'
    ): array
    {
        $replace = ['+', '/'];
        $search = ['-', '_'];
        $str = openssl_decrypt(str_replace($search, $replace, $encrypt), $method, $this->key, OPENSSL_ZERO_PADDING, $this->iv);
        $plaintext = substr($str, 0, strrpos($str, "}") + 1);

        return json_decode($plaintext, true);
    }
}
