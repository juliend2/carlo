<?php

require 'vendor/autoload.php';

#use Juliend2\Carlo;

/**
 * @param array $server
 * @param array $get
 * @return array<int,array,string>
 */
function get_outbox($server, $get): array {
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


// GET request to the outbox collection:
if (($_GET['collection'] ?? '') == 'outbox' && empty($_POST)) {
  list($status, $headers, $body) = get_outbox($_SERVER, $_GET);
  output_html_response($status, $headers, $body);
}



