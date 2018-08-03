<?php
App::uses('Component', 'Controller');

class JqxgridComponent extends Component{
	protected $controller;
	protected $dataFields   = [];
	protected $datos        = [];
	protected $totalRecords = null;
	protected $virtual      = [];

	public function initialize(Controller $controller){
		$this->controller = $controller;
	}

	public function setDataFields($filtros=array()){
		if(!empty($filtros["dataFields"]))
			$this->dataFields = $filtros["dataFields"];

		$this->setVirtualFields();
	}

	public function setVirtualFields(){
		if(Hash::check($this->dataFields, "{n}.virtual")){
			$virtuales = Hash::extract($this->dataFields, "{n}[virtual=/([a-z]*)/]");
			foreach ($virtuales as $field){
				$this->controller->{$field["model"]}->virtualFields[$field["name"]] = $field["virtual"];
			}
		}
	}

	public function setData($data=array()){
		if(isset($data["totalRecords"])){
			$this->totalRecords = $data["totalRecords"];
			unset($data["totalRecords"]);
		}
		$this->datos = $data;
	}

	public function getFindOptions(){
		$filtros = array();
		$options = array();

		if($this->controller->request->is("post")){
			$filtros = $this->controller->request->data;
		}else{
			$filtros = $this->controller->request->query;
		}

		if(isset($filtros["filterscount"])){}
		if(isset($filtros["groupscount"])){}

		if(isset($filtros["sortdatafield"]) && $filtros["sortorder"]){
			$campoBD = Hash::extract($this->dataFields, "{n}[name=".$filtros["sortdatafield"]."]");
			$campoBD = reset($campoBD);
			$campo = "";
			$direccion = $filtros["sortorder"];
			if(isset($campoBD["map"])){
				$campo = explode(".", str_replace(">", ".", $campoBD["map"]));
				if(count($campo) > 2){
					$tmp[] = $campo[count($campo)-2];
					$tmp[] = $campo[count($campo)-1];
					$campo = implode(".", $tmp);
				}else{
					$campo = implode(".", $campo);
				}
			}else{
				$campo = $campoBD["name"];
			}
			$options["order"] = array($campo => $direccion);
		}

		if(isset($filtros["pagenum"]))
			$options["page"] = $filtros["pagenum"];

		if(isset($filtros["pagesize"]))
			$options["limit"] = $filtros["pagesize"];

		if(isset($filtros["recordstartindex"]))
			$options["offset"] = $filtros["recordstartindex"];

		return $options;
	}

	public function retornarJson(){
		$retorno = array();
		$retorno["data"] = $this->datos;
		$retorno["datafields"] = $this->dataFields;
		if(!is_null($this->totalRecords))
			$retorno["totalRecords"] = $this->totalRecords;
		
		return json_encode($retorno, JSON_UNESCAPED_UNICODE);
	}

	public function retornarMapJson(){
		$retorno = array();
		foreach ($this->datos as $key => $datos) {
			$data = [];
			foreach ($this->dataFields as $k => $dataField){
				$fieldName = $dataField["name"];
				$value = "";
				if(isset($dataField["formato"]["valor"])){
					$value = $dataField["formato"]["valor"];
				}elseif(isset($dataField["formato"]["campo"])){
					$campo = $dataField["formato"]["campo"];
					$valor = Hash::extract($datos,$campo);
					$value = (isset($valor[0]))?$valor[0]:null;
				}else{
					$campoContat = (isset($dataField["formato"]["concatField"]))?$dataField["formato"]["concatField"]:" ";
					$campos = [];
					foreach ($dataField["formato"]["concat"] as $campo){
						$valor = Hash::extract($datos,$campo);
						$campos[] = (isset($valor[0]))?$valor[0]:null;
					}
					$value = implode($campoContat, $campos);
				}
				$data[$fieldName] = $value;
			}
			$retorno[] = $data;
		}
		return json_encode($retorno, JSON_UNESCAPED_UNICODE);
	}
}