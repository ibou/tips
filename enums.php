<?php

use App\Http\HttpStatusCode;
use App\Http\Response;

require_once __DIR__ . '/vendor/autoload.php';

$response = new Response(
    content: 'Hello World',
    statusCode: HttpStatusCode::Ok,
    headers: []
);

dump($response->getStatusCodeValue(), $response->getMessageValue());
$serializResponse = serialize($response);
dump($serializResponse, unserialize($serializResponse));