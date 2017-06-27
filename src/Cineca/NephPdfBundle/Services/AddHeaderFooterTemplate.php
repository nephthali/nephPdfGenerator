<?php

namespace Cineca\NephPdfBundle\Services;

class AddHeaderFooterTemplate extends DefaultTemplate
{
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

  // set margins
  public static function setMargins($pdf)
  {
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  }
}
