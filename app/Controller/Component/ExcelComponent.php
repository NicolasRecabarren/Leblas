<?php
App::uses('Component', 'Controller');
App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel/PHPExcel.php'));

class ExcelComponent extends Component{
	public $excel;
	public $fila = 1;
	private $columna = 0;
	private $nombreHoja = "Hoja 1";
	public $columnas_disponibles = [];


	private $styles = array(
		'headerDeafault' => array(
			'font' => array(
				// 'name' => 'Verdana',
		        'bold' => true,
		    ),
		    'alignment' => array(
		        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
		    ),
		    'borders' => array(
		        'allborders' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN,
		            'color' => array('rgb' => '6B6B6B')
		        ),
		    ),
		    'fill' => array(
		        'type' => PHPExcel_Style_Fill::FILL_SOLID,
		        'color' => array('rgb' => 'F2F0F7')
		    ),

		),
		'contentDefault' => array(
			'borders' => array(
		        'allborders' => array(
		            'style' => PHPExcel_Style_Border::BORDER_THIN,
		            'color' => array('rgb' => '6B6B6B')
		        ),
		    ),
		    'alignment' => array(
		        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
		    ),
		),
		'titleDefault' => array(
			'head' => array(
				'font' => array(
			        'bold' => true,
			    ),
				'borders' => array(
			        'allborders' => array(
			            'style' => PHPExcel_Style_Border::BORDER_THIN,
			            'color' => array('rgb' => '6B6B6B')
			        ),
			    ),
			),
			'body' => array(
				'borders' => array(
			        'allborders' => array(
			            'style' => PHPExcel_Style_Border::BORDER_THIN,
			            'color' => array('rgb' => '6B6B6B')
			        ),
			    ),
			)
		)
	);

	public function __construct(){
		$this->creaArrayLetras();

		$this->excel = new PHPExcel();
		$this->excel->getActiveSheet()->setTitle($this->nombreHoja);

	}

	public function creaArrayLetras($numeroConbinacion = 1000){
		$this->columnas_disponibles = $this->getLetra($numeroConbinacion,true);
	}

	public function setTitle($nombre){
		$this->nombreHoja = $nombre;
		$this->excel->getActiveSheet()->setTitle($nombre);
	}

	public function addImage($file = null, $isFullPath = false){
		if(!$isFullPath){
			$file = WWW_ROOT.$file;
			$file = str_replace("/", DS, $file);
		}

		if(is_file($file)){
			/*$size = getimagesize($file);
			$width = $size[0];
			$height = $size[1];*/

			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName('Logo');
			$objDrawing->setDescription('Logo');
			$objDrawing->setPath($file);
			$objDrawing->setOffsetX(8);    // setOffsetX works properly -> 8
			$objDrawing->setOffsetY(300);  //setOffsetY has no effect -> 300
			$objDrawing->setCoordinates('A1');
			$objDrawing->setHeight(45); // logo height -> 45
			$objDrawing->setWorksheet($this->excel->getActiveSheet()); 

			$this->excel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
			$this->excel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
			$this->fila = 3;
		}
	}

	public function addImageBase64($base64 = null, $extras=null){
	
		$data= str_replace("data:image/png;base64,", "", $base64);
		$data = base64_decode($data);
		$formImage = imagecreatefromstring($data);

		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setImageResource($formImage);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		
		if(isset($extras['setHeight']))
			$objDrawing->setHeight($extras['setHeight']);

		if(isset($extras['setWidth']))
			$objDrawing->setWidth($extras['setWidth']);

		if(isset($extras['setOffsetX']))
			$objDrawing->setOffsetX($extras['setOffsetX']);

		if(isset($extras['setOffsetY']))
			$objDrawing->setOffsetY($extras['setOffsetY']);

		$objDrawing->setWorksheet($this->excel->getActiveSheet());
	}


	public function setTitles($titles = array(), $offset = 2){
		#$columna = $this->columna;
		$columna = 0;
		$this->fila++;
		$agrupados = array_chunk($titles, $offset, true);
		foreach ($agrupados as $grupo){
			$fila = $this->fila;
			foreach ($grupo as $title => $valor){
					$letra = $this->letraPorNumero($columna);
					$this->excel->getActiveSheet()->setCellValue($letra.$fila, $title);
					$this->excel->getActiveSheet()->getStyle($letra.$fila)->applyFromArray($this->styles['titleDefault']['head']);
					$letra = $this->letraPorNumero($columna+1);
					$this->excel->getActiveSheet()->getStyle($letra.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$this->excel->getActiveSheet()->setCellValueExplicit($letra.$fila, $valor,PHPExcel_Cell_DataType::TYPE_STRING);
					$this->excel->getActiveSheet()->getStyle($letra.$fila)->applyFromArray($this->styles['titleDefault']['body']);
					$fila++;
			}
			$columna = $columna + 2;
		}
		$this->fila = ($this->fila + $offset) + 1;
	}

	public function setHeaders($headers = array()){
		$this->columna = 0;
		$this->excel->getActiveSheet()->getRowDimension($this->fila)->setRowHeight(25);
		
		foreach ($headers as $header){
			$setStyle = null;
			#Si el contenido es ":break_line:" agregamos una fila vacía
			if($header == ':break_line:'){
				$this->fila++;
				continue;
			}
			if(is_array($header)){
				foreach($header as $td => $content){
					$setStyle = null;
					$letra = $this->letraPorNumero($td);
					
					#Si es array es porque quiere cambiar las propiedades de la celda
					if(is_array($content)){
						if($content[0] == ':both:' || $content[0] == ':style:') $setStyle = true;
						$this->setCellProperty($content,$letra,1);
						$content = $content[1];
					}
					$this->excel->getActiveSheet()->setCellValue($letra.$this->fila, $content);
					if(!isset($setStyle))
						$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->applyFromArray($this->styles['headerDeafault']);
				}
				$this->fila++;
				$is_array = true;
			} else {
				$letra = $this->letraPorNumero($this->columna);
				$this->excel->getActiveSheet()->setCellValue($letra.$this->fila, $header);
				$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->applyFromArray($this->styles['headerDeafault']);
				$this->columna++;
			}
		}
		if(!isset($is_array)) $this->fila++;
	}

	public function setContents($contents = array(), $decimalComa = false){
		foreach ($contents as $kc => $content) {
			$setStyle = null;
			#Si el contenido es ":break_line:" agregamos una fila vacía
			if(count($content) == 1 && $content[0] == ':break_line:'){
				$this->fila++;
				continue;
			}
			
			foreach ($content as $kf => $data){
				$setStyle = null;
				$letra = $this->letraPorNumero($kf);
				
				#Si es array es porque quiere cambiar las propiedades de la celda
				if(is_array($data)){
					if($data[0] == ':both:' || $data[0] == ':style:') $setStyle = true;
					$this->setCellProperty($data,$letra,2);
					$data = $data[1];
				}


				if($decimalComa){


					if( is_float($data)){
						$data = str_replace(".", "", $data);
						$this->excel->getActiveSheet()->setCellValueExplicit($letra.$this->fila, $data,PHPExcel_Cell_DataType::TYPE_NUMERIC);
						$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2);
					}else{
					
						// valida si es numero
						$variable = str_replace(".", "", $data);
						if(is_numeric($variable)){
							$this->excel->getActiveSheet()->setCellValueExplicit($letra.$this->fila, $variable,PHPExcel_Cell_DataType::TYPE_NUMERIC);
							$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
						}else{
							$variable = str_replace(",", ".", $data);
							if(is_float($variable) || is_numeric($variable)){
								$this->excel->getActiveSheet()->setCellValueExplicit($letra.$this->fila, $variable,PHPExcel_Cell_DataType::TYPE_NUMERIC);
								$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
								
							}else{
								$this->excel->getActiveSheet()->setCellValueExplicit($letra.$this->fila, $variable,PHPExcel_Cell_DataType::TYPE_STRING);
							}
						}
						
					
					}

				}else{

					if(is_float($data)){
						$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2);
					}
					$this->excel->getActiveSheet()->setCellValue($letra.$this->fila, $data);
				
				}
					
			


				$this->excel->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
				if(!isset($setStyle))
					$this->excel->getActiveSheet()->getStyle($letra.$this->fila)->applyFromArray($this->styles['contentDefault']);
			}

			$this->fila++;
		}
	}
	
	private function setCellProperty($data,$letra,$cellType){
		# Lo que quiere hacer/modificar: data[0]
		# El contenido de la celda: data[1]
		# Opciones/Parámetros: data[2]
		switch($data[0]):
			case ":merge:":
				$range = $this->getMergeCellsRange($data,$letra);
				$this->excel->getActiveSheet()->mergeCells($range);
				break;
			case ":style:":
				$this->setStyle($letra.$this->fila,$data[2],$cellType);
				break;
			case ":both:":
				$range = $this->getMergeCellsRange($data,$letra);
				$this->excel->getActiveSheet()->mergeCells($range);
				$this->setStyle($range,$data[2],$cellType);
				break;
		endswitch;
	}
	
	/**
	 * Seteamos el estilo de la celda
	 */
	private function setStyle($range,$options,$cellType){
		if($cellType == 1){ # Si es celda de header
			$style['font'] = $this->styles['headerDeafault']['font'];
			$style['borders'] = $this->styles['headerDeafault']['borders'];
			$style['fill'] = $this->styles['headerDeafault']['fill'];
		} else { # Es celda de contenido
			$style['borders'] = $this->styles['contentDefault']['borders'];
		}
		foreach($options as $property => $value):
			switch($property){
				case "align":
					if($value == 'left'){
						$style['alignment'] = array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					} elseif($value == 'right'){
						$style['alignment'] = array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					} else {
						$style['alignment'] = array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					}
					break;
				case "borders":
					
					break;
				case "font":
					$style['font'] = $value;
					break;
				case "fill":
					$style['fill'] = $value;
					break;
				//Agregar aquí otros posibles casos para cambiar estilos.
			}
		endforeach;
		$this->excel->getActiveSheet()->getStyle($range)->applyFromArray($style);
	}
	
	/**
	 * Obtenemos el rango de las celdas que se quiere combinar
	 */
	private function getMergeCellsRange($data,$letra){
		$cantColumns = $data[2]['columns']-1; //le restamos la celda que le corresponde por defecto
		$cantRows = $data[2]['rows']-1; //le restamos la celda que le corresponde por defecto
		$letraFinal = $this->columnas_disponibles[array_search($letra,$this->columnas_disponibles)+$cantColumns];
		$filaFinal = ($this->fila+$cantRows);
		return $range = $letra.$this->fila. ":" .$letraFinal.$filaFinal;
	}
	
	public function download($filename = "excel_file.xls"){
		$extension = pathinfo( $filename, PATHINFO_EXTENSION );
		$filename = str_replace('.','',pathinfo($filename, PATHINFO_FILENAME)).".".$extension;
		
		$xlsx = $extension == 'xlsx' ? true : false;
		$class = $xlsx ? 'Excel2007' : 'Excel5'; #seteamos la clase correspondiente a la extensión
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel,$class);
		$objWriter->save(APP . 'webroot' . DS . 'files' . DS . $filename);
	}
	
	
	public function download2($filename = "excel_file.xls"){
		$ext = explode('.',$filename); #obtenemos la extensión del archivo
		$xlsx = $ext[1] == 'xlsx' ? true : false; #vemos si es XLSX
		$class = $xlsx ? 'Excel2007' : 'Excel5'; #seteamos la clase correspondiente a la extensión
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel,$class);
		ob_end_clean();
		
		#Seteamos los headers
		header($xlsx ? "Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" : "application/vnd.ms-excel");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Pragma: no-cache");
		header("Expires: 0");
		
		$objWriter->save('php://output');
		exit;
	}

	private function letraPorNumero($n){
	    $r = '';
	    for ($i = 1; $n >= 0 && $i < 10; $i++) {
	        $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
	        $n -= pow(26, $i);
	    }
	    return $r;
	}


	public function getLetra($a, $returnArray =  false){
		$letra='A';
		$arrLetra = [];

		for ($i=1; $i <= $a ; $i++) { 
			$arrLetra[] = $letra;
			$letra++;
		}
		if($returnArray==false)
			return $letra;
		else
			return $arrLetra;
	}

	
	/**
	 * Obtenemos la columna(letra) anterior a la que se envía por parámetro
	 */
	private function obtenerLetraAnterior($letra){
		if($letra == 'A') return $letra;
		$index = array_search($letra,$this->columnas_disponibles);
		return $this->columnas_disponibles[$index-1];
	}
	
	private function obtenerLetraDespues($letra){
		$index = array_search($letra,$this->columnas_disponibles);
		return $this->columnas_disponibles[$index+1];
	}
}