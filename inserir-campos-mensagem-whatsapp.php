$redirecionar = 'contato/whatsapp-flutuante-enviado';
if ($whatsapp = \RGB\Core\Config::get('api_key', 'whatsapp_button')) {
    
  $whatsapp = str_replace(['(', ')', '-', ' '], '', $whatsapp);
  
  $whatsapp_texto = '';

  if ($whatsapp_texto = \RGB\Core\Config::get('api_key', 'whatsapp_button_texto')) {
    $pattern = '/\{([a-z0-9_]+)\}/';
    $whatsapp_texto = preg_replace_callback($pattern, function ($matches) use ($request) {
      $campo = $matches[1];
      $valor = $request->getParsedBodyParam($campo);
      return $valor !== null ? $valor : $matches[0];
    }, $whatsapp_texto);
    $whatsapp_texto = '&text=' . urlencode($whatsapp_texto);
  }
  $redirecionar = 'https://api.whatsapp.com/send?phone=55' . $whatsapp . $whatsapp_texto;
}
