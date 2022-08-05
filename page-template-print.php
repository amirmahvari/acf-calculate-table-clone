<?php
/**
 * Template Name: Print
 */
$submission = fea_instance()->submissions_handler->get_submission( 1 );
$form = json_decode( acf_decrypt( $submission->fields ), true );

?>

<html lang="fa" dir="rtl">
<head>
    <title>فاکتور خروجی</title>
    <style>
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
            border: 1px solid #000;
            text-align: center;
        }
        tr:nth-child(even) {
            border: 1px solid #000;
        }
        .bg-gray{
            background-color: #ececec;
        }
    </style>
</head>
<body>
<div class="row">
    <div style="float: right;width: 65%">
        <p class="text-lg" style="margin: 0;font-size: 18px">استودیو عکسبرداری و فیلمبرداری تخصصی ناین</p>
        <p class="text-left" style="margin: 0;font-size: 8px">عضو انجمن رسمی بنیاد ملی نخبگان کشور</p>
    </div>
    <div style="float: right;width: 35%">
        <img src="asset/images/Header.jpg" height="238" width="715" />
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
    <div style="float: right;width: 30%;font-size:8px;margin-top:0.6cm">
         <span style="float: right;font-size:10px;margin-left: 2px;">
         تلفن های تماس : 0213335588
        </span>
    </div>
</div>

<div>
    <table border="1" cellspacing="0" width="100%" style="font-size: 10px">
        <tr class="bg-gray">
            <td width="5%">ردیف</td>
            <td width="5%">کد</td>
            <td width="40%">شرح خدمات</td>
            <td>تعداد</td>
            <td>واحد</td>
            <td>فی</td>
            <td>جمع کل</td>
        </tr>
        <tr>
            <td>1</td>
            <td>5059</td>
            <td>طراحی وب سایت شرکتی تک زبانه شرکی</td>
            <td>۱</td>
            <td>عدد</td>
            <td>75.000.000</td>
            <td>75.000.000</td>
        </tr>
        <tr class="bg-gray">
            <td colspan="4" style="text-align: right">تعداد</td>
            <td>واحد</td>
            <td>فی</td>
            <td>جمع کل</td>
        </tr>
        <tr>
            <td colspan="7" style="text-align: right;font-size: 10px">
                توضیحات‌ :
                <ul >
                    <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
                    <li>پرداخت وجه از طریق شماره کارت 5022-2910-7700-1764 و یا شماره شبا IR02-0570-3906-8000-0997-9660-01 بانک پاسارگاد بنام محمد امین ابوالقاسمی امکانپذیر می باشد.</li>
                </ul>
            </td>
    </table>
    <hr>
    <p class="text-lg" style="margin: 0;font-size: 15px;font-weight: 800">توضیحات کلی فاکتور</p>
    <ul style="font-size: 10px">
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
        <li>اعتبار این پیش فاکتور از تاریخ صدور آن به مدت یک ماه می باشد.</li>
    </ul>
    <hr>
</div>

</body>
</html>

