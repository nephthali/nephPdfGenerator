<?php

namespace Ennva\NephPdfBundle\Services;

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
        if(isset($infos['watermark']) AND $infos['watermark'] )
            self::applyWatermark($pdf);
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if(isset($infos['filename']))
        {
          $pdf->Output($infos['filename'], 'I');
        }
        $pdf->Output('Ennva.pdf', 'I');
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
        if(isset($infos['watermark']) AND $infos['watermark'] )
            self::applyWatermark($pdf);
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if(isset($infos['filename']))
        {
          $pdf->Output($infos['filename'], 'I');
        }
        $pdf->Output('Ennva.pdf', 'I');
      break;

      default:
        #######################################################################################
        ###################  TEMPLATE WITHOUT HEADER NEITHER FOOTER ###########################
        #######################################################################################
        DefaultTemplate::setDefaultsConstant();
        //Call TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        DefaultTemplate::setDocInformation($pdf);
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        //DefaultTemplate::setHeaders($pdf);
        //DefaultTemplate::setFooters($pdf);
        //DefaultTemplate::setHFFonts($pdf);
        DefaultTemplate::setMonospacedFont($pdf);
        //SetLeftMargin(), SetTopMargin(), SetRightMargin(), SetAutoPageBreak()
        $pdf->SetLeftMargin(10);
        $pdf->SetTopMargin(10);
        $pdf->SetRightMargin(5);
        //DefaultTemplate::setMargins($pdf,true,[]);
        DefaultTemplate::setPageBreaks($pdf);
        DefaultTemplate::setImgScaleFactor($pdf);
        DefaultTemplate::setLangDependent($pdf);
        DefaultTemplate::setBodyFonts($pdf);
        DefaultTemplate::addPage($pdf);
        DefaultTemplate::printTextHtmlCell($pdf,$html);
        if(isset($infos['watermark']) AND $infos['watermark'] )
            self::applyWatermark($pdf);
        // Apply watermark if requested


        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        if(isset($infos['filename']))
        {
          $pdf->Output($infos['filename'], 'I');
        }
        $pdf->Output('Ennva.pdf', 'I');
      break;
    }

  }

  private static function applyWatermark($pdf)
  {
    for($page = 1; $page < DefaultTemplate::getNumPages($pdf); $page++)
    {
        DefaultTemplate::ResetPointerToLastDocumentPage($pdf);
        $pdf->setPage($page);
        DefaultTemplate::applyWatermark($pdf);
    }
  }

}
