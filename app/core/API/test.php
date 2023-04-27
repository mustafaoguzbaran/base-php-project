<?php

use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Token\Builder;

$algorithm = new Sha256();
$signInKey = InMemory::plainText(random_bytes(32));
$now = new DateTimeImmutable();
$builder = new Builder(new JoseEncoder(), ChainedFormatter::default());
$token = $builder->issuedBy("localhost")
    ->permittedFor("localhost")
    ->identifiedBy("4f1g23a12aa")
    ->issuedAt($now)
    ->expiresAt($now->modify("+1 hour"))
    ->withClaim('uid', $_POST['uid'])
    ->getToken($algorithm, $signInKey);

define('TOKEN', $token->toString());
if (isset($_POST['requesttoken'])) {
    return $this->view("backoffice.token", ["token" => $token->toString()]);
} else {
    return $this->view("backoffice.token", ["token" => "Lütfen bir USER ID değeri giriniz!"]);
}