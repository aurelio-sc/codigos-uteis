    <?php 
    //Run composer require league/csv:^9.0 to install the package
    //Doc: https://csv.thephpleague.com/9.0/


    use League\Csv\Reader;
	use League\Csv\Writer;
	require 'vendor/league/csv/autoload.php';

	$csv = Writer::createFromPath('contatos.csv');	

    //Fields from ALL tables will be exported
	$campos = [
		'remetente_nome',
		'remetente_email',
		'empresa',
		'telefone',
		'celular',
		'cidade',
		'estado',
		'mensagem',
		'nome',
		'vaga',		
		'email',
		'vaga',
		'link',		
		'pagina_nome',
		'pagina_link',		
		'assunto',
		'receiver',
		'insert_data'
	];

	$csv->insertOne($campos);

	$contatos = \RGB\Contato\Contato::where('insert_data','>','1710460800')->get();
	foreach ($contatos as $contato) {
		$entradas = [];
		foreach ($campos as $campo) {
			if ($contato->$campo) {
				$entradas[$campo] = $contato->$campo;
			}
		}

		$contato_campos = \RGB\Contato\Campo::where('contato', $contato->id)->get();
		foreach ($contato_campos as $contato_campo) {			
			foreach ($campos as $campo) {
				//echo '<p>' . $contato_campo->$campo . ' - ' . $contato->valor . '</p>';
				if ($contato_campo->campo == $campo) {
					$entradas[$campo] = $contato_campo->valor;
				}
			}
		}

		$entradas_ordenadas = [];

		foreach($campos as $campo) {
			if ($entradas[$campo]) {
				$entradas_ordenadas[] = $entradas[$campo];
			} else {
				$entradas_ordenadas[] = '';
			}
		}

		$csv->insertOne($entradas_ordenadas);
	}