<?php

namespace Cineca\NephPdfBundle\Services;

class DefaultTemplate extends templateInterface
{
  /*
  const K_BLANK_IMAGE = '_blank.png';
  const PDF_PAGE_FORMAT = 'A4';
  const PDF_PAGE_ORIENTATION = 'P';
  const PDF_CREATOR =  'TCPDF';
  const PDF_AUTHOR = 'TCPDF';
  const PDF_HEADER_TITLE = 'TCPDF Example';
  const PDF_HEADER_STRING =  "by Nephthali Djabon - Ennva.com\nwww.ennva.org";
  const PDF_UNIT = 'mm';
  const PDF_MARGIN_HEADER = 5;
  const PDF_MARGIN_FOOTER = 10;
  const PDF_MARGIN_TOP = 27;
  const PDF_MARGIN_BOTTOM = 25;
  const PDF_MARGIN_LEFT = 15;
  const PDF_MARGIN_RIGHT = 15;
  const PDF_FONT_NAME_MAIN =  'helvetica';
  const PDF_FONT_SIZE_MAIN = 10;
  const PDF_FONT_NAME_DATA = 'helvetica';
  const PDF_FONT_SIZE_DATA =  8;
  const PDF_FONT_MONOSPACED ='courier';
  const PDF_IMAGE_SCALE_RATIO = 1.25;
  const HEAD_MAGNIFICATION =  1.1;
  const K_CELL_HEIGHT_RATIO = 1.25;
  const K_TITLE_MAGNIFICATION = 1.3;
  const K_SMALL_RATIO = 2/3;
  const K_THAI_TOPCHARS = true;
  const K_TCPDF_CALLS_IN_HTML = false;
  const K_TCPDF_THROW_EXCEPTION_ERROR = false;
  const K_TIMEZONE = 'UTC';
  */

  public static function setDefaultsConstant()
  {
    if (!defined('K_TCPDF_EXTERNAL_CONFIG')
      define ('K_TCPDF_EXTERNAL_CONFIG', true);
    //var_dump(K_PATH_MAIN); die;
    //define ('K_PATH_IMAGES', K_PATH_MAIN.'images/');
    //define ('K_BLANK_IMAGE', '_blank.png');
    if (!defined('PDF_PAGE_FORMAT')
      define ('PDF_PAGE_FORMAT', 'A4');
    if (!defined('PDF_PAGE_ORIENTATION')
      define ('PDF_PAGE_ORIENTATION', 'P');
    //define ('PDF_CREATOR', 'TCPDF');
    //define ('PDF_AUTHOR', 'TCPDF');
    if (!defined('PDF_HEADER_TITLE')
      define ('PDF_HEADER_TITLE', 'PDF');
    if (!defined('PDF_HEADER_STRING')
      define ('PDF_HEADER_STRING', "by Nephthali Djabon - Cineca.it\nwww.cineca.it");
    if (!defined('PDF_UNIT')
      define ('PDF_UNIT', 'mm');
    //define ('PDF_MARGIN_HEADER', 5);
    //define ('PDF_MARGIN_FOOTER', 10);
    //define ('PDF_MARGIN_TOP', 27);
    //define ('PDF_MARGIN_BOTTOM', 25);
    //define ('PDF_MARGIN_LEFT', 15);
    //define ('PDF_MARGIN_RIGHT', 15);
    if (!defined('PDF_FONT_NAME_MAIN')
      define ('PDF_FONT_NAME_MAIN', 'helvetica');
    if (!defined('PDF_FONT_SIZE_MAIN')
      define ('PDF_FONT_SIZE_MAIN', 10);
    if (!defined('PDF_FONT_NAME_DATA')
      define ('PDF_FONT_NAME_DATA', 'helvetica');
    if (!defined('PDF_FONT_SIZE_DATA')
      define ('PDF_FONT_SIZE_DATA', 8);
    if (!defined('PDF_FONT_MONOSPACED')
      define ('PDF_FONT_MONOSPACED', 'courier');
    if (!defined('PDF_IMAGE_SCALE_RATIO')
      define ('PDF_IMAGE_SCALE_RATIO', 1.25);
    if (!defined('HEAD_MAGNIFICATION')
      define('HEAD_MAGNIFICATION', 1.1);
    if (!defined('K_CELL_HEIGHT_RATIO')
      define('K_CELL_HEIGHT_RATIO', 1.25);
    if (!defined('K_TITLE_MAGNIFICATION')
      define('K_TITLE_MAGNIFICATION', 1.3);
    if (!defined('K_SMALL_RATIO')
      define('K_SMALL_RATIO', 2/3);
    if (!defined('K_THAI_TOPCHARS')
      define('K_THAI_TOPCHARS', true);
    //define('K_TCPDF_CALLS_IN_HTML', false);
    //define('K_TCPDF_THROW_EXCEPTION_ERROR', false);
    if (!defined('K_TIMEZONE')
      define('K_TIMEZONE', 'UTC');
  }

  public static function setDocInformation($pdf)
  {
    // set document information
    $pdf->SetCreator('CINECA');
    $pdf->SetAuthor('Nephthali Djabon');
    $pdf->SetTitle(PDF_HEADER_TITLE);
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
  }

  // set default header data
  public static function setHeaders($pdf)
  {
    // set default header data
    //define('PDF_HEADER_LOGO', K_PATH_IMAGES.'CINECALOGO2008.jpg');
    //define('PDF_HEADER_STRING', K_PATH_IMAGES.'CINECALOGO2008.jpg');
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE,PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
  }

  // set default footer data
  public static function setFooters($pdf)
  {
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
  }

  // set header and footer fonts
  public static function setHFFonts($pdf)
  {
    // set header and footer fonts
    //Array(family,style,size)
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

  }

  // set default monospaced font
  public static function setMonospacedFont($pdf)
  {
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
  }

  // set margins
  public static function setMargins($pdf)
  {
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  }

  // set auto page breaks
  public static function setPageBreaks($pdf)
  {
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  }

  // set image scale factor
  public static function setImgScaleFactor($pdf)
  {
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  }

  // set some language-dependent strings (optional)
  public static function setLangDependent($pdf)
  {
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }
  }

  // set subset font
  public static function setBodyFonts($pdf)
  {
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);
  }

  public static function setTextShadow($pdf)
  {
     // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
  }


  public static function addPage($pdf)
  {
    // Add a page
    // This method has several options, check the source code documentation for more information.
    // See tcpdf for other option on tcpdf.php file
    $pdf->AddPage();

  }

  public static function printTextHtmlCell($pdf,$html)
  {
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    //$pdf->writeHTML($html, true, false, false, false, '');
  }

  public static function applyWatermark($pdf)
  {
    $tipoLetra = "Helvetica";
    $tamanoLetra = 35;
    $estiloLetra = "B";
    // Calcular ancho de la cadena
    $widthCadena = $pdf->GetStringWidth(trim("FAC SIMILE FAC SIMILE FAC SIMILE"), $tipoLetra, $estiloLetra, $tamanoLetra, false );
    $factorCentrado = round(($widthCadena * sin(deg2rad(45))) / 2 ,0);
    // Get the page width/height
    $myPageWidth = $pdf->getPageWidth();
    $myPageHeight = $pdf->getPageHeight();
    // Find the middle of the page and adjust.
    $myX = ( $myPageWidth / 2 ) - $factorCentrado;
    $myY = ( $myPageHeight / 2 ) + $factorCentrado;
    // Set the transparency of the text to really light
    $pdf->SetAlpha(0.09);
    // Rotate 45 degrees and write the watermarking text
    $pdf->StartTransform();
    $pdf->Rotate(45, $myX, $myY);
    $pdf->SetFont($tipoLetra, $estiloLetra, $tamanoLetra);
    $pdf->Text($myX, $myY ,trim("FAC SIMILE FAC SIMILE FAC SIMILE"));
    $pdf->StopTransform();
    // Reset the transparency to default
    $pdf->SetAlpha(1);
  }

}
