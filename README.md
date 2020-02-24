# Laravel 5.5+ Asymmetric Encryption Package

A laravel package that encrypts your data with private public key pairs using asymmetric encryption. 

The way it works is that
it encrypts the data with a symmetric key, then asymmetrically encrypt the key and attach it to the data. Useful
for encrypting large data. More details here: https://www.sitepoint.com/encrypt-large-messages-asymmetric-keys-phpseclib/

## Installation

### Step 1: Composer

Via Composer command line:

```bash
$ composer require pdaleramirez/asymmetric-encryption
```

Or add the package to your `composer.json`:

```json
{
    "require": {
        " pdaleramirez/asymmetric-encryption": "^1.0.0"
    }
}
```
### Step 2: Enable the package
```php
'providers' => [
    pdaleramirez\asymmetric\encryption\AsymmetricEncryptionProvider::class
];
```

And then add the alias to your `config/app.php` file:

```php
'aliases' => [
    'AsymmetricEncryption' => pdaleramirez\asymmetric\encryption\AsymmetricEncryptionFacade::class
];
```

### Usage:
Generate the key pairs:
```
$keys = \AsymmetricEncryption::createKeys();
```
Encrypting and Decrypting
```
$textToEncrypt = 'text to encrypt';
$privateKey = file_get_contents('keys/private.key');
$publicKey = file_get_contents('keys/public.pem');

$encryptedData = \AsymmetricEncryption::encrypt($textToEncrypt, $publicKey);

$decryptedData = \AsymmetricEncryption::>decrypt($encryptedData, $privateKey);

```

