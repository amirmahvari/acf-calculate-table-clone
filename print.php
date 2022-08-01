<?php

require_once __DIR__ . '/vendor/autoload.php';
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'format'       => 'A5' ,
    'fontDir'      => array_merge($fontDirs , [
        __DIR__ . '/asset' ,
    ]) ,
    'fontdata'     => $fontData + [
            'vazir' => [
                'R'          => 'font/Vazir.ttf' ,
                'B'          => 'font/Vazir.ttf' ,
                'I'          => 'font/Vazir.ttf' ,
                'BI'         => 'font/Vazir.ttf' ,
                'useOTL'     => 0xFF ,    // required for complicated langs like Persian, Arabic and Chinese
                'useKashida' => 75 ,  // required for complicated langs like Persian, Arabic and Chinese
            ] ,
        ] ,
    'default_font' => 'vazir' ,
]);
$mpdf->WriteHTML('
        
        <!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور خروجی</title>
    <style>
    @page {
            margin-top: 1cm;
            margin-bottom: 0cm;
            margin-left: 0.3cm;
            margin-right: 0.3cm;
            margin-header: 0.3cm;
            margin-footer: 0.3cm;
            header: page-header;
            footer: page-footer;
        }
        body {
            font-family: vazir;
            direction: rtl;
        }

        .header-title {
    font-size: .8cm;
        }

        .text-left {
    text-align: left;
        }

        .text-lg {
    font-size: 1cm;
        }

        .text-lg {
    font-size: 0.8cm;
        }

        .text-md {
    font-size: 0.6cm;
        }

        .text-sm {
    font-size: .3cm;
        }
        td, th {
          border: 2px solid #000;
          text-align: center;
        }
        tr:nth-child(even) {
          border: 2px solid #000;
        }
    </style>
</head>
<body>
<div class="row">
    <div style="float: right;width: 65%">
        <h1 class="text-lg" style="margin: 0;font-size: 18px">استودیو عکسبرداری و فیلمبرداری تخصصی ناین</h1>
        <p class="text-left" style="margin: 0;font-size: 8px">عضو انجمن رسمی بنیاد ملی نخبگان کشور</p>
    </div>
    <div style="float: right;width: 35%">
        <img src="asset/images/Header.jpg" width="500" alt="">
    </div>

</div>
<div class="row">
    <div style="float: right;width: 70%">
        <h1 class="header-title " style="margin: 0;font-size: 14px;font-weight: 800;">لیست قیمت خدمات استودیو</h1>
    </div>
    <div style="float: right;width: 30%;font-size:8px;">
        <span style="float: right;font-size:8px;margin-left: 2px">
        تاریخ فاکتور :1400/04/10
        <br>
        </span>
        <span style="text-align: left">صفحه ۱ از ۱</span>
        <br>
        <span style="float: right">
            شماره پیش فاکتور 500
        </span>
    </div>
<img src="asset/images/middle.jpg" width="900" height="39" alt="">

</div>

<div class="row">
    <div style="float: right;width: 70%">
        <h1 class="header-title " style="margin: 0;font-size: 14px;font-weight: 800;">عنوان : مجموعه گلدیش</h1>
        <span style="float: right;font-size:10px;margin-left: 2px">
            آدرس : تهران - میدان شوش - خیابان صابونیان - پاساژ قصر بلور - طبقه هفتم
        </span>
    </div>
    <div style="float: right;width: 30%;font-size:8px;">
         <span style="float: right;font-size:10px;margin-left: 2px">
         تلفن های : 0213335588
        </span>
    </div>
</div>

<div>
<table border="1" cellspacing="0" width="100%">
<tr>
<td>ردیف</td>
<td>کد</td>
<td>شرح خدمات</td>
<td>تعداد</td>
<td>واحد</td>
<td>فی</td>
<td>جمع کل</td>
</tr>
<tr>
<td>ردیف</td>
<td>کد</td>
<td>شرح خدمات</td>
<td>تعداد</td>
<td>واحد</td>
<td>فی</td>
<td>جمع کل</td>
</tr>
<tr>
<td>ردیف</td>
<td>کد</td>
<td>شرح خدمات</td>
<td>تعداد</td>
<td>واحد</td>
<td>فی</td>
<td>جمع کل</td>
</tr>
</table>
</div>

</body>
</html>

');
$mpdf->SetFooter('
<img src="asset/images/Footer.jpg" width="900" height="39" alt="">
');
$mpdf->Output();
?>
