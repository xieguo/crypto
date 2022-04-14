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
    
    // 加密
    $aes->Encrypt($data, $method);
    
    // 解密
    $aes->Decrypt($data, $method);
```