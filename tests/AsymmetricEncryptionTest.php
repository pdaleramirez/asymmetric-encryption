<?php

namespace Tests\Unit;

use Tests\TestCase;
use pdaleramirez\asymmetric\encryption\AsymmetricEncryptionService;

class AsymmetricEncryptionTest extends TestCase
{
    public function testAsymmetric()
    {
        $service = new AsymmetricEncryptionService();


        $textToEncrypt = 'text to encrypt';
        $privateKey = file_get_contents('keys/private.key');
        $publicKey = file_get_contents('keys/public.pem');

        $encryptedData = $service->encrypt($textToEncrypt, $publicKey);

        $decryptedData = $service->decrypt($encryptedData, $privateKey);

        $this->assertEquals($textToEncrypt, $decryptedData);

        // Invalid private key
        $invalidKey = file_get_contents('keys/invalid-private.key');
        $decryptedData = $service->decrypt($encryptedData, $invalidKey);
        $this->assertNotEquals($textToEncrypt, $decryptedData);
    }
}
