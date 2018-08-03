<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class CustomLoginAuthenticate extends BaseAuthenticate {

	public function algo(){
		die("entre aca cochino!");
	}

    public function authenticate(CakeRequest $request, CakeResponse $response) {
    	if(!empty($request->data['AccesoTrabajadores']['origen'])&&$request->data['AccesoTrabajadores']['origen'] == 'portalTrabajadores'){
    		App::import("Model", "Remuneraciones.RemFuncionario");
    		$RemFuncionario = new RemFuncionario();
    		$arr_rut = explode("-",$request->data['AccesoTrabajadores']['rut']);
    		$rut = str_replace(".","",$arr_rut[0]);
			$dv = $arr_rut[1];
		
			$data = $RemFuncionario->find("all",array(
				"recursive" => -1,
				"conditions"=>array(
					"RemFuncionario.rut" => $rut,
					"RemFuncionario.dv" => $dv,
					"RemFuncionario.estado !=" => 3
				),
				"contain"=> array('RemEmpresa'),
				));
			
			//agregamos los id del funcionario a las empresas para que sea mas facil el cambio de empresa luego
			foreach($data as $k => $v){
				$data[$k]['RemEmpresa']['rem_funcionario_id'] = $v['RemFuncionario']['id'];
			}	

			if(!empty($data)){
				$dataFuncionario = $data[0]['RemFuncionario'];
				$empresas = Hash::extract($data, "{n}.RemEmpresa");
				$dataFuncionario['empresas'] = $empresas;
				$dataFuncionario['sistemas']['portal_trabajadores'] = 'trabajador';
				return $dataFuncionario;
			}else{
				return false;				
			}
    	}else{
 			App::import("Model", "General.GeneralUser");
	    	$GeneralUser = new GeneralUser();
	    	$contraseñaEncriptada = AuthComponent::password($request->data['GeneralUser']['password']);
	    	// voy a buscar el usuario logueado si corresponde que traiga las empresas y los sistemas a casa empresaz
	    	$validacionLogin = $GeneralUser->datosLogin($request->data['GeneralUser']['username'], $contraseñaEncriptada);
	    	if(!$validacionLogin["autenticado"]){
	    		return false;
	    	}else{
	    		return $validacionLogin["datos"];
			}
    	}
 	}
}
