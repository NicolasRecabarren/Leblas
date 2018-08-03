<?php

App::uses('HttpSocket', 'Network/Http');

class NodeComponent extends Component{

	// Metodo que envía la solicitud para la creación de liquidaciones en pdf y permite subir al ftp y asociarlas en base base datos
	// parametros periodoId int, funcionarioId  array()
	function GeneraLiquidaciones($periodoId, $funcionarioIds ){
		
		if(!is_array($funcionarioIds)){
			die('El parametro funcionarioId no es un array');
		}

		$urlApiLiquidacion = SERVIDOR_NODE."RemLiquidaciones/GeneraLiquidacionesPdf";
		$HttpSocket = new HttpSocket();
		$datoAEnviar = [
			'rem_periodo_id'     => $periodoId,
			'rem_funcionario_id' => $funcionarioIds
		];

		$response = $HttpSocket->post($urlApiLiquidacion, $datoAEnviar );
		return $response;
	}


	//Envia las liquidaciones por email a los funcionarios 
	function EnviaLiquidacionEmail($periodoId, $funcionarioIds ){

		$urlApiLiquidacion = SERVIDOR_NODE."EnviaEmailLiquidacion";
		$HttpSocket = new HttpSocket();
		$datoAEnviar = [
			'rem_periodo_id'     => $periodoId,
			'rem_funcionario_id' => $funcionarioIds
		];

		$response = $HttpSocket->post($urlApiLiquidacion, $datoAEnviar );
		return $response;

	}



 }