<?php

namespace App\Http\Controllers;

use App\Deputado;
use App\Deputado2017;
use App\Verba;
use App\Rede_Social;

class HomeController extends Controller
{

	public function loader(){
		return response()->view('home');
	}

	public function configurar(){
		return response()->view('configurar');
	}	

    public function config(){

        // Buscando dados dos deputados no webservice
        
		$deputado = new Deputado();

		set_time_limit(3000);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		    ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    $retorno = json_decode($response, true);
		    $deputados = $retorno['list'];

			foreach ($deputados as $dep) {
				
				// Inserindo os dados dos deputados na tabela
				try {
					
					Deputado::firstOrCreate([
					    'id' => $dep['id'],
					    'nome' => $dep['nome'],
                        'partido' => $dep['partido'],
                        'tag_localizacao' => $dep['tagLocalizacao']
					]);
		
				} catch (Exception $e) {
					return "Erro ao tentar cadastrar deputado.". $e;
				}
			}
		}

		// Buscando dados das redes sociais utilizadas pelos Deputados
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		    ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {

		    $retorno = json_decode($response, true);
			$rede_social = $retorno['list'];

			foreach ($rede_social as $rs) {

		    	$redes_sociais = $rs['redesSociais'];

			    foreach ($redes_sociais as $rede) {

			    	// Inserindo os dados das redes sociais na tabela
					try {
						
						Rede_Social::firstOrCreate([
						    'redeSocial' => $rede['redeSocial']['nome'],
						    'deputado_id' => $rs['id'],
						]);
			
					} catch (Exception $e) {
						return "Erro ao tentar cadastrar rede social.". $e;
					}		    
			    }
			}
		}

		// Buscando dados dos deputados de 2017 no webservice
        
		$deputado = new Deputado2017();

		set_time_limit(3000);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://dadosabertos.almg.gov.br/ws/legislaturas/18/deputados/em_exercicio?formato=json",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		    ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    $retorno = json_decode($response, true);
		    $deputados = $retorno['list'];

			foreach ($deputados as $dep) {
				
				// Inserindo os dados dos deputados na tabela
				try {
					
					Deputado2017::firstOrCreate([
					    'id' => $dep['id'],
					    'nome' => $dep['nome'],
                        'partido' => $dep['partido'],
                        'tag_localizacao' => $dep['tagLocalizacao']
					]);
		
				} catch (Exception $e) {
					return "Erro ao tentar cadastrar deputado.". $e;
				}
			}
		}

        // Buscando dados das verbas indenizatórias utilizadas pelos Deputados em 2017
        
		$deputados = Deputado2017::all();

		foreach ($deputados as $deputado) {

			for ($mes = 1; $mes < 13; $mes++) { 

				$url_verba = 'http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/'.$deputado->id.'/2017/'.$mes.'?formato=json';

				$urls[] = $url_verba;
			}			
		}	
		foreach ($urls as $link) {

			usleep(500000);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => trim($link),
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_TIMEOUT => 3000000,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				//CURLOPT_SSL_VERIFYPEER => false,
				//CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_HTTPHEADER => array(
				    'Content-Type: application/json',
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);

			if ($err) {
				echo "Erro:" . $err;
				return redirect()->route('deputados');
			} else {

				$retorno = json_decode($response, true);
				$verbas_indenizatorias = $retorno['list'];

				if (is_array($verbas_indenizatorias)) {
					foreach ($verbas_indenizatorias as $verbas) {
							
						$detalhes = $verbas['listaDetalheVerba'];

						foreach ($detalhes as $detalhe) {

							// Selecionando o mês da data de referência
							$mes_referencia = $detalhe['dataReferencia']['$']; 
							$mes_referencia = explode("-", $mes_referencia);								   
							list($day, $month, $year) = $mes_referencia;								   
							$mes_referencia = "$month";								

							// Inserindo os dados dos gastos na tabela
							try {							
									
								Verba::firstOrCreate([
									'deputado_id' => $detalhe['idDeputado'],
									'descTipoDespesa' => $detalhe['descTipoDespesa'],
									'mesReferencia' => $mes_referencia,
									'valorReembolsado' => $detalhe['valorReembolsado'],
									'dataEmissao' => $detalhe['dataReferencia']['$'],
									'cpfCnpj' => $detalhe['cpfCnpj'],
									'valorDespesa' => $detalhe['valorDespesa'],
									'nomeEmitente' => $detalhe['nomeEmitente'],
								]);
						
							} catch (Exception $e) {
								return "Erro ao tentar cadastrar verbas indenizatórias." . $e;
							}						
						}
					}
				}				    
			}
		}	
		return redirect()->route('deputados');
    }
}