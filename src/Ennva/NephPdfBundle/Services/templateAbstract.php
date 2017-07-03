<?php

namespace Ennva\NephPdfBundle\Services;

abstract class templateAbstract
{
  // set document information
  public static function setDefaultsConstant(){}

  // set document information
  public static function setDocInformation($pdf){}

  // set default header data
  public static function setHeaders($pdf){}

  // set default footer data
  public static function setFooters($pdf){}

  // set header and footer fonts
  public static function setHFFonts($pdf){}

  // set default monospaced font
  public static function setMonospacedFont($pdf){}

  // set margins
  public static function setMargins($pdf){}

  // set auto page breaks
  public static function setPageBreaks($pdf){}

  // set image scale factor
  public static function setImgScaleFactor($pdf){}

  // set some language-dependent strings (optional)
  public static function setLangDependent($pdf){}

  // set subset font
  public static function setBodyFonts($pdf){}

  // set text shadow
  public static function setTextShadow($pdf){}

  // Add page to pdf
  public static function addPage($pdf){}

  // Current Page page to pdf
  public static function getCurrentPage($pdf){}

  // Total Pages to pdf
  public static function getNumPages($pdf){}

  // Last Pages to pdf
  public static function getLastPage($pdf){}

  // print html element
  public static function printTextHtmlCell($pdf,$html){}

  // apply watermark
  public static function applyWatermark($pdf){}
}
