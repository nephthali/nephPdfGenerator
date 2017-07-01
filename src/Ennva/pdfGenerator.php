<?php

use TCPDF;

/**
 * usefull class to generate PDF document from TCPDF Library.
 */
class PdfGenerator
{

    /**
    * @param $html (string) text to display
    * @param $template (constant) to switch bethreen different template
    * @param $infos (array) optionals options to set pdf doc behaviour
    */
    public static function generatePdf($html,$template = 1,$infos = array())
    {
        //Get template constant to configure TCPDF
        switch ($template) {
          case 1:
        # code...
          break;
          case 2:
        # code...
          break;

          default:
          self::setDefaultsConstant();
            //Call TCPDF
          $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          self::setDocInformation($pdf);
          self::setHeaders($pdf);
          self::setFooters($pdf);
          self::setHFFonts($pdf);
          self::setMonospacedFont($pdf);
          self::setMargins($pdf);
          self::setPageBreaks($pdf);
          self::setImgScaleFactor($pdf);
          self::setLangDependent($pdf);
          self::setBodyFonts($pdf);
          self::addPage($pdf);
          self::printTextHtmlCell($pdf,$html);
          self::applyWatermark($pdf);
            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
          $pdf->Output('example_001.pdf', 'I');
          break;
      }
    }

    private function setDefaultConstant()
    {
        define ('K_TCPDF_EXTERNAL_CONFIG', true);
        define ('PDF_PAGE_FORMAT', 'A4');
        define ('PDF_PAGE_ORIENTATION', 'P');
        define ('PDF_HEADER_TITLE', 'PDF');
        define ('PDF_HEADER_STRING', "by Nephthali Djabon - Cineca.it\nwww.cineca.it");
        define ('PDF_UNIT', 'mm');
        define ('PDF_FONT_NAME_MAIN', 'helvetica');
        define ('PDF_FONT_SIZE_MAIN', 10);
        define ('PDF_FONT_NAME_DATA', 'helvetica');
        define ('PDF_FONT_SIZE_DATA', 8);
        define ('PDF_FONT_MONOSPACED', 'courier');
        define ('PDF_IMAGE_SCALE_RATIO', 1.25);
        define('HEAD_MAGNIFICATION', 1.1);
        define('K_CELL_HEIGHT_RATIO', 1.25);
        define('K_TITLE_MAGNIFICATION', 1.3);
        define('K_SMALL_RATIO', 2/3);
        define('K_THAI_TOPCHARS', true);
        //define('K_TCPDF_THROW_EXCEPTION_ERROR', false);
        define('K_TIMEZONE', 'UTC');
    }

    private static function setDocInformation($pdf)
    {
        // set document information
        $pdf->SetCreator('CINECA');
        $pdf->SetAuthor('Nephthali Djabon');
        $pdf->SetTitle(PDF_HEADER_TITLE);
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    }

    // set default header data
    private static function setHeaders($pdf)
    {
        // set default header data
        //define('PDF_HEADER_LOGO', K_PATH_IMAGES.'CINECALOGO2008.jpg');
        //define('PDF_HEADER_STRING', K_PATH_IMAGES.'CINECALOGO2008.jpg');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE,PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    }

    // set default footer data
    private static function setFooters($pdf)
    {
        $pdf->setFooterData(array(0,64,0), array(0,64,128));
    }

      // set header and footer fonts
      private static function setHFFonts($pdf)
      {
        // set header and footer fonts
        //Array(family,style,size)
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      }

      // set default monospaced font
      private static function setMonospacedFont($pdf)
      {
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      }

      // set margins
      private static function setMargins($pdf)
      {
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      }

      // set auto page breaks
      private static function setPageBreaks($pdf)
      {
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
      }

      // set image scale factor
      private static function setImgScaleFactor($pdf)
      {
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
      }

      // set some language-dependent strings (optional)
      private static function setLangDependent($pdf)
      {
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
          require_once(dirname(__FILE__).'/lang/eng.php');
          $pdf->setLanguageArray($l);
        }
      }

      // set subset font
      private static function setBodyFonts($pdf)
      {
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);
      }

      private static function setTextShadow($pdf)
      {
         // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
      }


      private static function addPage($pdf)
      {
        // Add a page
        // This method has several options, check the source code documentation for more information.
        // See tcpdf for other option on tcpdf.php file
        $pdf->AddPage();

      }

      private static function printTextHtmlCell($pdf,$html)
      {
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        //$pdf->writeHTML($html, true, false, false, false, '');
      }

      private static function applyWatermark($pdf)
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
