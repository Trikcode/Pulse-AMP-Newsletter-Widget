<?php
const SUCCESS_CODE = 200;
const SUCCESS_MESSAGE = 'Thank you! We have received your form successfully.';
const ERROR_CODE = 400;
const ERROR_MESSAGE = 'There are some missing values, please review your form.';

$host = isset($_SERVER['HTTP_X_FORWARDED_HOST'])
  ? $_SERVER['HTTP_X_FORWARDED_HOST']
  : $_SERVER['HTTP_HOST'];
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin');
header('AMP-Access-Control-Allow-Source-Origin: https://' . $host);

if (!isset($_POST['name']) || empty($_POST['name'])) {
  $error = [
    'message' => ERROR_MESSAGE,
  ];

  $json = json_encode($error);
  http_response_code(ERROR_CODE);
  die($json);
}

$success = [
    'message' => SUCCESS_MESSAGE,
];

$json = json_encode($success);
http_response_code(SUCCESS_CODE);
die($json);


