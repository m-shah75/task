<?php

use App\Util;
use voku\helper\HtmlDomParser;
require_once '../vendor/autoload.php';

// send get request ta product endpoint
$util = new Util('https://www.digikala.com/product/dkp-90825','GET');
$html = $util->get_web_page();
$dom = HtmlDomParser::str_get_html($html);
$headerDom = $dom->findMulti('.c-product__title');

// extract h1 text of product header from html
$header_text = '';
foreach ($headerDom as $element){
   $header_text =  $element->innerhtml;
}

// extract price text of product from html

$priceDom = $dom->findMulti('.c-product__seller-price-raw');
$price_text = '';
foreach ($priceDom as $element){
    $price_text =  $element->innertext;
}

//find main image from product html slider
$imageText='';
$imageDom = $dom->findMulti('.js-gallery-img');
foreach ($imageDom as $element){
    $imageText =  $element->attr['data-src'];
}

?>



<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="Colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>test1</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500,600" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="view/css/linearicons.css">
    <link rel="stylesheet" href="view/css/owl.carousel.css">
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/nice-select.css">
    <link rel="stylesheet" href="view/css/magnific-popup.css">
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <link rel="stylesheet" href="view/css/main.css">


</head>
<body>

<div class="main-wrapper">
    <!-- Start Feature Area -->
    <section class="featured-area pt-100 pb-100">
        <div class="container" style="direction: rtl">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="feature-left" style="text-align: right">
                        <h3 style=" justify-content: center; text-align: right; direction: rtl">
                            <?php echo $header_text?>

                        </h3>

                        <button class="primary-btn hover d-inline-flex align-items-center" style="direction: rtl;margin-top: 10px"><span class="mr-10"><?php echo $price_text?>تومان</span><span class="lnr lnr-arrow-left"></span></button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-right ">
                        <div class="single-slider item col-sm-auto " style="margin-top:10px">
                            <img src=<?php echo $imageText?> alt="" width="200" height="200" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

</body>
</html>





















