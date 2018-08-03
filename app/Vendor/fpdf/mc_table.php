<?php
define('FPDF_FONTPATH',ROOT . DS . APP_DIR . DS.'Vendor/fpdf/font/');

require('fpdf.php');

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;
var $padding_top=0;
var $padding_bottom=0;
var $SetRowX=0;
var $SetRowY=0;
var $Border='L';
var $Align='L';
var $IsHeader=true;
var $inicialHeightRow=4;


function SetWidths($w)
{
	$this->widths=$w;
}

function SetPaddingTop($v)
{
	$this->padding_top=$v;
}

function SetPaddingBottom($v)
{
	$this->padding_bottom=$v;
}

function SetRowX($v)
{
	$this->SetRowX=$v;
}

function SetRowY($v)
{
	$this->SetRowY=$v;
}

function SetBorder($v)
{
	$this->Border=$v;
}

function SetAlign($v)
{
	$this->Align=$v;
}

function SetIsHeader($v)
{
	$this->IsHeader=$v;
}

function SetinicialHeightRow($v)
{
	$this->inicialHeightRow=$v;
}


function Row($data, $column_initial=0, $height_inicial=3)
{
	//Calculate the height of the row
	$nb=0;
	$ci=$column_initial;
	$height_inicial=$this->inicialHeightRow;

// debug($data);
	for($i=$ci;$i<count($data);$i++){
		if(isset($data[$i]['width']))
			$nb=max($nb,$this->NbLines($data[$i]['width'],$data[$i]['text']));
		else
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]['text']));
	}

	$h=$height_inicial*$nb;
	
	$this->CheckPageBreak($h);

 	if(($this->padding_top>0))
		$this->Ln($this->padding_top);
	
	if($this->SetRowX>0)
		$this->SetX($this->SetRowX);
	

	if($this->SetRowY>0){
		$this->SetY($this->SetRowY);
		
	}

	
	$ci=$column_initial;
	$a=$this->Align;
	//Draw the cells of the row
	for($i=$ci;$i<count($data);$i++)
	{	
		if(isset($data[$i]['width']))
			$w=$data[$i]['width'];
		else
			$w=$this->widths[$ci];

		
		$a=isset($data[$i]['align']) ? $data[$i]['align'] : 'L';
		//Save the current position
		$x=$this->GetX();	
		$y=$this->GetY();
		

		if(isset($data[$i]['positionLineTop'])){
		  $yRect= $this->GetY()-$data[$i]['positionLineTop'];
		  $hRect=$h+$this->padding_top+$data[$i]['positionLineTop']+$this->padding_bottom;
		}else{
		  $yRect= $this->GetY();
		  $hRect=$h+$this->padding_top+$this->padding_bottom;
		}
		
		//Draw the border
		$this->Rect($x,$yRect-$this->padding_top,$w,$hRect);
		//Print the text
		$this->SetFillColor(234,234,234);
		$this->MultiCell($w,$height_inicial,utf8_decode($data[$i]['text']),0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
		$ci++;
	}

	// if($this->IsHeader)
		// echo "<br>".$h;
		$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	// var_dump($this->FontSize);die();
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
}
?>
