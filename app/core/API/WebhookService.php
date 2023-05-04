<?php

namespace Core\API;

class WebhookService
{
public function webhookPost(){
    $url = "http://localhost:8080/webhookresponse";
    $data = array("name" => "Mustafa Oğuz", "Surname"=>"Baran");
    $options = array(
      "http" => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data),
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
}