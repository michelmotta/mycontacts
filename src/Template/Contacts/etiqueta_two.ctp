<?php

/**
 * init TCPDF
 */
$this->layout = null;
header('Content-Type: application/pdf');
require_once(ROOT . DS . 'vendor' . DS . 'tecnick.com' . DS . 'tcpdf' . DS . 'tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('RI SISTEMAS');
$pdf->SetTitle('Ficha de Cadastro');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('Helvetica', '', 8);

// add a page
$pdf->AddPage();

// set some text to print
/*
$html = '<table width="100%">';

	foreach ($data as $etiqueta){
		$html .= '<tr><td>' . $etiqueta->name . '</td></tr>';
		$html .= '<tr><td>' . $etiqueta->address . '</td></tr>';
		$html .= '<tr><td>' . $etiqueta->neighborhood . ' - ' . $etiqueta->city . ' - ' . $etiqueta->state . '</td></tr>';
		$html .= '<tr><td>' . $etiqueta->cep . '</td></tr>';
		$html .= '<tr><td></td></tr>';
		$html .= '<tr><td></td></tr>';
		$html .= '<tr><td></td></tr>';
	}
    	 
$html .= '</table></br></br>';
*/


$post_counter = 0;
$per_row = 3;
$html = '<table width="100%">';

$html .= '<tr>';
foreach ($data as $etiqueta) {
	if ( $post_counter % $per_row == 0 && $post_counter !== 0 ) 
        $html .= '</tr><tr>';

        $html .= '<td>' . $etiqueta->name . '<br>'. $etiqueta->address . '<br>' . $etiqueta->neighborhood . ' - ' . $etiqueta->city . ' - ' . $etiqueta->state . '<br>' . $etiqueta->cep . '<br>'. '</td>';


	$post_counter++;
} 
$html .= '</tr>';

$html .= '</table>';

// print a block of text using Write()
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('ficha_cadastro.pdf', 'D');