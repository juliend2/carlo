<?php

require 'vendor/autoload.php';

$filePath = __DIR__ . '/public' . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
echo $filePath;
var_dump($_GET);
if (is_file($filePath)) {
    return false;
}
exit;


#use Juliend2\Carlo;



/**
 * The outbox is discovered through the outbox property of an actor's profile.
 * The outbox MUST be an OrderedCollection.
 *
 * The outbox stream contains activities the user has published, subject to the
 * ability of the requestor to retrieve the activity (that is, the contents of
 * the outbox are filtered by the permissions of the person reading it). If a
 * user submits a request without Authorization the server should respond with
 * all of the Public posts. This could potentially be all relevant objects
 * published by the user, though the number of available items is left to the
 * discretion of those implementing and deploying the server.
 *
 * The outbox accepts HTTP POST requests, with behaviour described in Client to
 * Server Interactions.
 *
 * @param array $server
 * @param array $get
 * @return array<int,array,string>
 */
function get_outbox_response($server, $get): array {
  $status = 200;
  $headers = [];
  $body = json_encode([
    "@context" => "https://www.w3.org/ns/activitystreams",
    "summary" => "Julien's notes",
    "type" => "OrderedCollection",
    "totalItems" => 2,
    "orderedItems" => [
      [
        "type" => "Note",
        "name" => "A Simple Note"
      ],
      [
        "type" => "Note",
        "name" => "Another Simple Note"
      ]
    ]
  ]);
  return [$status, $headers, $body];    
}



function output_html_response($status_code, $headers, $body) {
  http_response_code($status_code);
  foreach ($headers as $key => $value) {
    header("$key: $value");
  }
  echo $body;
}


// Router:


/*
// GET request to the outbox collection:
if (($_GET['collection'] ?? '') == 'outbox' && empty($_POST)) {
  list($status, $headers, $body) = get_outbox_response($_SERVER, $_GET);
  output_html_response($status, $headers, $body);
}


 */
