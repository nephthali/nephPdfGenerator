<?php

namespace Cineca\NephPdfBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use TCPDF;

class NephTCPDF
{
  private $container;

  public function __construct(ContainerInterface $container)
  {
    $this->container = $container;
  }

  public function generatePdf($html,$template = 1,$infos = array())
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
        DefaultTemplate::setDefaultsConstant();
        //Call TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        DefaultTemplate::setDocInformation($pdf);
        DefaultTemplate::setHeaders($pdf);
        DefaultTemplate::setFooters($pdf);
        DefaultTemplate::setHFFonts($pdf);
        DefaultTemplate::setMonospacedFont($pdf);
        DefaultTemplate::setMargins($pdf);
        DefaultTemplate::setPageBreaks($pdf);
        DefaultTemplate::setImgScaleFactor($pdf);
        DefaultTemplate::setLangDependent($pdf);
        DefaultTemplate::setBodyFonts($pdf);
        DefaultTemplate::addPage($pdf);
        DefaultTemplate::printTextHtmlCell($pdf,$html);
        DefaultTemplate::applyWatermark($pdf);
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('example_001.pdf', 'I');
      break;
    }

  }


}
