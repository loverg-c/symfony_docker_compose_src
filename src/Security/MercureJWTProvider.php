<?php

namespace App\Security;

final class MercureJWTProvider
{

    private $jwtPassphrase;

    /**
     * MercureJWTProvider constructor.
     * @param string $jwtPassphrase
     */
    public function __construct(string $jwtPassphrase)
    {
        $this->jwtPassphrase = $jwtPassphrase;
    }

    public function __invoke(): string
    {
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode(['mercure' => ['subscribe' => ['*'], 'publish' => ['*']]]);
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $this->jwtPassphrase, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        return $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
    }
}
