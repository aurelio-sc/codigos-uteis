$query = \RGB\Contato\Contato::query();
$query->where('assunto', 'LIKE', 'Trabalhe%');
$lista = $query->orderBy('id', 'desc')->get();

$contatos = [];

foreach ($lista as $contato) {
    $contato_campos_iniciais = [
        'nome' => $contato->nome,
        'assunto' => $contato->assunto,
    ];

    $contato_campos_tratados = [];

    $contato_demais_campos = $contato->campos()->get()->toArray();

    foreach ($contato_demais_campos as $contato_campo) {
        $contato_campos_tratados[$contato_campo['campo']] = $contato_campo['valor'];
    }

    $contato_arquivo = $contato->arquivos()->get()->toArray();
    $base_url = \RGB\Core\Config::get('site', 'url');
    $contato_diretorio = $contato->getDiretorioCaminho();
    $contato_arquivo = ['arquivo' => $base_url . $contato_diretorio . $contato_arquivo[0]['arquivo']];

    $contato_data = ['data' => date('d/m/Y', strtotime($contato->insert_data))];
    
    $contato_campos_tratados = array_merge($contato_campos_iniciais, $contato_data,$contato_campos_tratados, $contato_arquivo);    

    $contatos[] = $contato_campos_tratados;
    
    print_r($contato_campos_tratados);
    echo "<br>";
}

// Nome do arquivo CSV
$arquivo_csv = 'contatos.csv';

// Abrir o arquivo em modo de escrita
$fp = fopen($arquivo_csv, 'w');

if ($fp && !empty($contatos)) {
    // Escreve o cabeçalho do CSV com as chaves do primeiro contato
    fputcsv($fp, array_keys($contatos[0]));

    // Escreve cada contato como uma linha no CSV
    foreach ($contatos as $contato) {
        fputcsv($fp, $contato);
    }

    // Fecha o arquivo após a escrita
    fclose($fp);
    
    echo "Arquivo CSV criado com sucesso: $arquivo_csv";
} else {
    echo "Erro ao abrir o arquivo CSV para escrita.";
}