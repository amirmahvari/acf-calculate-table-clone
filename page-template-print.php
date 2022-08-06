<?php
/**
 * Template Name: Print
 */
$submission = fea_instance()->submissions_handler->get_submission( $_GET['submission'] );
$form = json_decode( acf_decrypt( $submission->fields ), true );
$url=plugins_url('/acf-calculate-studio9/asset');
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" media="all" href="main.css" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css"
    />

    <style>
        * {
            margin: 0;
            padding: 0;
            color-adjust: exact;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        @font-face {
            font-family: Vazir;
            src: url("<?=$url?>/font/Vazir.ttf");
            src: url("<?=$url?>/font/Vazir.ttf") format("Vazir-opentype"),
            url("<?=$url?>/font/Vazir.woff") format("woff"),
            url("<?=$url?>/font/Vazir.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: Vazir;
            src: url("<?=$url?>/font/Farsi-Digits/Vazir-FD.ttf");
            src: url("<?=$url?>/font/Farsi-Digits/Vazir-FD.ttf") format("Vazir-opentype"),
            url("<?=$url?>/font/Farsi-Digits/Vazir-FD.woff") format("woff"),
            url("<?=$url?>/font/Farsi-Digits/Vazir-FD.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        body {
            direction: rtl;
            font-family: Vazir;
            background-color: white !important;
        }
        .pdf {
            margin-inline: 1rem;
            margin-block: 1.5rem;
        }
        .no-wrap {
            white-space: nowrap;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .w-full {
            width: 100%;
        }
        /* Margin */
        .my-4 {
            margin-block: 1rem;
        }
        .ml-2 {
            margin-left: 0.5rem;
        }
        .ml-4 {
            margin-left: 1rem;
        }
        .ml-10 {
            margin-left: 40px;
        }
        .ml-20 {
            margin-left: 80px;
        }
        .mb-10 {
            margin-bottom: 80px;
        }
        .mb-1 {
            margin-bottom: 4px;
        }
        .mb-2 {
            margin-bottom: 0.5rem;
        }
        .mb-3 {
            margin-bottom: 12px;
        }
        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        /* padding */
        .px-1 {
            padding-inline: 4px;
        }
        .px-2 {
            padding-inline: 8px;
        }
        .pr-8 {
            padding-right: 32px;
        }
        .py-1 {
            padding-block: 4px;
        }
        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }

        .text-8 {
            font-size: 8px;
        }
        .text-10 {
            font-size: 10px;
        }
        .text-11 {
            font-size: 11px;
        }
        .text-12 {
            font-size: 12px;
        }
        .text-13 {
            font-size: 13px;
        }
        .text-14 {
            font-size: 14px;
        }

        .font-medium {
            font-weight: 600;
        }
        .font-semibold {
            font-weight: 500;
        }

        .hr {
            height: 2px;
            width: 100%;
            background-color: black;
        }

        .label {
            background-color: black !important;
            color: white;
            padding-inline: 8px;
            padding-block: 4px;
            width: fit-content;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            position: relative;
            margin-inline: auto;
            top: -13px;
        }

        @media print {
            .label {
                background-color: black !important;
                color: white;
                padding-inline: 8px;
                padding-block: 4px;
                width: fit-content;
                border-radius: 8px;
                font-size: 13px;
                font-weight: 500;
                position: relative;
                margin-inline: auto;
                top: -13px;
            }
        }

        .br {
            border-right: 1px solid black;
        }
        .br-2 {
            border-right: 2px solid black;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }
        .justify-end {
            justify-content: end;
        }

        table,
        th,
        td {
            border: 1px solid;
            font-size: 11px;
        }
        th,
        td {
            padding-block: 2px;
        }
        table {
            border-collapse: collapse;
        }
        tfoot tr,
        thead tr {
            background-color: rgb(232, 235, 236);
        }
        td {
            text-align: center;
        }

        .table-caption {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .small-hr {
            background-color: black;
            color: black;
            width: 7rem;
            height: 1px;
        }
        .long-hr {
            background-color: black;
            color: black;
            height: 1px;
            width: 100%;
        }
        ul {
            list-style-type: none;
        }
        .footer {
            /* position: relative;
            bottom: -46px; */
            font-size: 11px;
            font-weight: 500;
        }
        .headerImg {
            width: 170px;
            margin-inline: auto;
            display: block;
        }

        @page {
            size: A5;
        }
    </style>
</head>
<body class="A5">
<div class="pdf">
    <header class="header mb-3">
        <div class="">
            <h5 class="mb-1">استودیو عکسبرداری و فیلمبرداری تخصصی ناین</h5>
            <p class="text-left text-10 font-medium mb-8">
                عضو انجمن رسمی بنیاد ملی نخبگان کشور
            </p>
            <p class="font-medium text-14">لیست قیمت خدمات استودیو</p>
        </div>
        <div class="text-12 font-medium">
            <img class="headerImg" src="<?=$url?>/images/Header.jpg" alt="" />
            <div class="flex items-center justify-end">
                <div class="px-2">
                    <p class="">
                        تاریح فاکتور:
                        <span><?=jdate($submission->created_at)->format('Y/m/d')?></span>
                    </p>

                    <p class="text-center">صفحه 1 از 1</p>
                </div>
                <div class="br px-2">
                    <p>شماره پیش فاکتور</p>
                    <p class="text-center"><?=$submission->id?></p>
                </div>
            </div>
        </div>
    </header>
    <div class="hr"></div>
    <div class="label">مشخصات کارفرما</div>
    <main>
        <div class="flex items-center">
            <div class="ml-2">
                <h4>
                    عنوان:
                    <span><?=$form['record']['fields']['post']['post_title']['value']?> </span>
                </h4>

                <p class="mb-4 text-11">
                    آدرس:
                    <span><?=$form['record']['fields']['post']['address']['value']?></span
                    >
                </p>
            </div>
            <div class="br-2 py-1 pr-8 text-11">
                <p>
                    تلفن های تماس :
                    <span><?=$form['record']['fields']['post']['mobile']['value']?></span>
                </p>
            </div>
        </div>

        <table class="w-full">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>کد</th>
                <th>شرح خدمات</th>
                <th>تعداد</th>
                <th>واحد</th>
                <th>فی</th>
                <th>جمع کل</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $i=0;
            foreach($form['record']['fields']['post']['table']['value'] as $row)
            {
                $i++;
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$i?></td>
                    <td><?=$row['service'].':'.$row['sub_service'].' '.$row['description']?></td>
                    <td><?=$row['qty']?></td>
                    <td><?=$row['unit']?></td>
                    <td><?=number_format($row['amout'])?></td>
                    <td><?=number_format($row['total'])?></td>
                </tr>
            <?php
            }
            ?>

            </tbody>

            <tfoot>
            <tr>
                <td colspan="4" class="text-right">
                    تعداد:
                    <span><?=count($form['record']['fields']['post']['table']['value'])?></span>
                </td>
                <td></td>
                <td></td>
                <td><?=number_format($form['record']['fields']['post']['total']['value'])?></td>
            </tr>
            </tfoot>
        </table>
        <div class="table-caption text-10 font-semibold">
            <p>توضیحات :</p>
            <p>-اعتبار این پیش قاکتور از تاریخ صدور آن به مدت یک ماه میباشد .</p>
            <p class="mb-2">
                -پرداخت وجه از طریق شماره کارت 1764-7700-2910-5022 ویا شماره شبا
                IR02-0570-3906-8000-0997-9660-01 بانک پاسارگاد بنام محمد امین
                ابوالقاسمی امکانپذیر میباشد .
            </p>
        </div>

        <div class="flex items-center my-4">
            <hr class="small-hr" />
            <p class="font-medium text-14 no-wrap px-2">توضیحات کلی فاکتور :</p>
            <hr class="long-hr" />
        </div>
    </main>

    <div class="text-8 font-semibold mb-4">
        <ul>
            <li>
                -کلیه قیمت های اعلام شده به ریال و بدون احتساب کسورات قانونی میباشد
                (در صورت درخواست، مبلغ کسورات به جمع نهایی فاکتور اضافه میگردد)
            </li>

            <li>
                - پرداخت 50 ٪ از مبلغ کل پیش فاکتور در زمان سفارش والباقی به صورت
                نقدی در زمان تحویل نهایی سفارش الزامیست .(تحویل پروژه منوط به تسویه
                کامل میباشد )
            </li>
            <li>
                - سفارشاتی که بنا به درخواست کارفرما میبایست خارج از روال زمانی
                استودیو انجام گردد شامل افزایش قیمت خواهند بود.
            </li>
            <li>
                - زمان شروع پروژه پس از واریز مبلغ پیش پرداخت با توجه به ترافیک
                موجود در استودیو بین 2 تا 7 روز کاری خواهد بود.
            </li>
            <li>
                - تمامی فایل ها قبل از تایید نهایی وقبل از تسویه حساب همراه با
                واترمارک به نمایش گذاشته می شود.
            </li>
            <li>
                - هزینه های ایاب ذهاب گروه، حمل تجهیزات از آتلیه تا محل پروژه و داخل
                پروژه و برگشت آن و نیز تهیه اقلام کاربردی در عکاسی
                دکوراتیو(اکسسوری،میوه وشیرینی و...) به عهده کارفرما خواهد بود.
            </li>
            <li>
                - انجام سفارش سه روز کاری پس از اتمام کامل پروژه آغاز شده و با توجه
                به حجم پروژه آماده سازی به صورت متوالی انجام گردیده و تا پایان پروژه
                ادامه خواهد داشت.
            </li>

            <li>
                - هزینه اسکان وتامین وعده های غذایی گروه در پروژه های خارج از
                استودیو به عهده کارفرما می باشد.
            </li>
            <li>
                - مشکلات احتمالی در پروژه که از طرف کارفرما صورت پذیرد این مجموعه
                هیچ مسئولیتی در قبال آن نخواهد داشت و انجام مجدد پروژه شامل هزینه
                های اولیه خواهد بود.
            </li>
            <li>
                - ارتباط مستقیم یک فرد تام الاختیار با گروه از ابتدا تا انتهای پروژه
                الزامیست.
            </li>
        </ul>
    </div>

    <hr class="long-hr mb-8" />

    <footer class="footer">
        <p>نشانی دفتر مرکزی:</p>
        <div class="flex items-center">
            <p class="ml-4">تهران، ولنجک، خیابان شانزدهم، بوستان یک ،شماره 298</p>
            <p>
                تلفن:
                <span>021-22424153</span>
            </p>
        </div>
    </footer>
    <img src="<?=$url?>/images/Footer.svg" alt="" />
</div>
</body>
</html>
