## 说明
- 前端crypto.js + PHP的加解密方案

## 环境
- PHP >= 7.0.7
- openssl >= 1.1.0

## 安装
- composer require thank/crypto

## 使用
```php
    use thank\cryto
    
    $config = [
        'key' => 'xxxx', // 加密key
        'iv'  => 'yyyy', // 偏移量
    ];
    
    // 新建实例
    $aes = new AES($config);
    
    // 加密 参数$data为数组 $method 的默认值是：AES-256-CBC 返回值是 string
    $aes->encrypt($data, $method);
    
    // 解密 参数$string为encode后的加密串 $method 的默认值是：AES-256-CBC 返回值是 array
    $aes->eecrypt($string, $method);
```