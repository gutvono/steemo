<?php
$handler = __DIR__ . '/../src/handle_register.php';
if (!file_exists($handler)) {
  http_response_code(404);
  echo 'Erro: recurso de cadastro não encontrado.';
  exit;
}
require_once $handler;
