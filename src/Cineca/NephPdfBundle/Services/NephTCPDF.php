<?php

namespace Cineca\NephPdfBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use TCPDF;

class NephTCPDF
{
  private $container;

  public function __construct()
  {

  }

  public function setContainer(ContainerInterface $container)
  {
    $this->container = $container;
  }

  public function generatePdf($html,$template = 1,$infos = array())
  {
    //Get template constant to configure TCPDF
    switch ($template) {
      case 1:
        #######################################################################################
        ###################  TEMPLATE WITH HEADER NO FOOTER ###########################
        #######################################################################################
        DefaultTemplate::setDefaultsConstant();
        //Call TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        AddHeaderTemplate::setDocInformation($pdf);
        AddHeaderTemplate::setHeaders($pdf);
        //AddHeaderTemplate::setFooters($pdf);
        AddHeaderTemplate::setHFFonts($pdf);
        AddHeaderTemplate::setMonospacedFont($pdf);
        AddHeaderTemplate::setMargins($pdf);
        AddHeaderTemplate::setPageBreaks($pdf);
        AddHeaderTemplate::setImgScaleFactor($pdf);
        AddHeaderTemplate::setLangDependent($pdf);
        AddHeaderTemplate::setBodyFonts($pdf);
        AddHeaderTemplate::addPage($pdf);
        AddHeaderTemplate::printTextHtmlCell($pdf,$html);
        AddHeaderTemplate::applyWatermark($pdf);
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if(isset($infos['filename']))
        {
          $pdf->Output($infos['filename'], 'I');
        }
        $pdf->Output('cineca.pdf', 'I');
      break;
      case 2:
        #######################################################################################
        ###################  TEMPLATE WITH HEADER AND FOOTER ###########################
        #######################################################################################
        AddHeaderFooterTemplate::setDefaultsConstant();
        //Call TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        AddHeaderFooterTemplate::setDocInformation($pdf);
        AddHeaderFooterTemplate::setHeaders($pdf);
        //AddHeaderTemplate::setFooters($pdf);
        AddHeaderFooterTemplate::setHFFonts($pdf);
        AddHeaderFooterTemplate::setMonospacedFont($pdf);
        AddHeaderFooterTemplate::setMargins($pdf);
        AddHeaderFooterTemplate::setPageBreaks($pdf);
        AddHeaderFooterTemplate::setImgScaleFactor($pdf);
        AddHeaderFooterTemplate::setLangDependent($pdf);
        AddHeaderFooterTemplate::setBodyFonts($pdf);
        AddHeaderFooterTemplate::addPage($pdf);
        AddHeaderFooterTemplate::printTextHtmlCell($pdf,$html);
        AddHeaderFooterTemplate::applyWatermark($pdf);
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if(isset($infos['filename']))
        {
          $pdf->Output($infos['filename'], 'I');
        }
        $pdf->Output('cineca.pdf', 'I');
      break;

      default:
        #######################################################################################
        ###################  TEMPLATE WITHOUT HEADER NEITHER FOOTER ###########################
        #######################################################################################
        DefaultTemplate::setDefaultsConstant();
        //Call TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        DefaultTemplate::setDocInformation($pdf);
        //DefaultTemplate::setHeaders($pdf);
        //DefaultTemplate::setFooters($pdf);
        //DefaultTemplate::setHFFonts($pdf);
        DefaultTemplate::setMonospacedFont($pdf);
        DefaultTemplate::setMargins($pdf);
        DefaultTemplate::setPageBreaks($pdf);
        DefaultTemplate::setImgScaleFactor($pdf);
        DefaultTemplate::setLangDependent($pdf);
        DefaultTemplate::setBodyFonts($pdf);
        DefaultTemplate::addPage($pdf);
        DefaultTemplate::printTextHtmlCell($pdf,$html);
        for($page = 1; $page < DefaultTemplate::getNumPages($pdf); $page++){
            $pdf->setPage($page);
            DefaultTemplate::applyWatermark($pdf);
        }
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if(isset($infos['filename']))
        {
          $pdf->Output($infos['filename'], 'I');
        }
        $pdf->Output('cineca.pdf', 'I');
      break;
    }

  }


}
