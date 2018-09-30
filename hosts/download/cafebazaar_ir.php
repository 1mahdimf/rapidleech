<?php

if (!defined('RAPIDLEECH')) {
    require_once 'index.html';
    exit;
}
class cafebazaar_ir extends DownloadClass
{
    public function Download($link)
    {
        $page = $this->GetPage($link);
        if (!preg_match('/\?id=(.+)/', $link, $packagename) && !preg_match('/\/app\/(.+)\//', $link, $packagename)) {
            html_error('Url not valid!');
        }
        $packagename = $packagename[1];
        $ch = curl_init('http://ad.cafebazaar.ir/json/getAppDownloadInfo');
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"id":1,"hash":"'.sha1('{"7cc78271-e338-4edc-849c-b105c5d51ba5":["getAppDownloadInfo","'.$packagename.'"'.',19]}').'","packed":"xzrBQdWmJqg\/BQN+4Ll+XCuNIhYwIpWmFRH+I1wjEKfb2NwtXaU4OO6LmDY+dcNKPh6v1a2GdLYcCdZ6NliD0nbYjcglOT7OYB9fefCL5Ec=","iv":"UFDpSQCua3LwOKb8QWW4dS2PNSfMQ3ua1eWAuJY1G8xcaTS+Md+gbGMCSG3C5QJLmoiSFyOv\/QRFv6hWYsrA31ji0fGhWNGiqY9sWltqBst7YKoCqPLG0fCjoPKWPhvVhxKhjO8yT3RPalmDuPKpqGwW2fdHH+xPnuCDU51uUaE=","p2":"r7oshN8AYo64PZDDlJg8TmiEiXrrBjKlwPQITF94s\/3tKsyB1PJRJM5cD\/JZBEHK\/wWvGb\/jyj0GrOgbEMONHBoLCMR\/X6RWeC59LaItQaDk\/uY3+2cEisuBw3VCAkKL887SebW0xmB\/16rNl3LxLL5\/vgCZ4jaUvIb1dj0JEH4=","p1":"Kvn\/n9BLGkFAcpAWBQsAVbcF8SVnS6f3XGulLM\/J6a3SQOS5q8CagfCm2zbzQxHT0kRb9z90eCIBP9huKDth0Mu9JaAuNn9SiV7pBTs6C3hVlolY41W93hKPwhBfNyWCATymDnSjqcX\/KKNcKn3fvMU7zR0w9h\/WM\/sUkccX8pg=","enc_resp":false,"method":"getAppDownloadInfo","non_enc_params":"{\"device\":{\"mn\":260,\"abi\":\"x86\",\"sd\":19,\"bv\":\"7.12.2\",\"us\":{},\"cid\":0,\"lac\":0,\"ct\":\"\",\"id\":\"YGrrXv9TQkGyRwo6GaU0kw\",\"dd\":\"hlteatt\",\"co\":\"\",\"mc\":310,\"dm\":\"samsung\",\"do\":\"SAMSUNG-SM-N900A\",\"dpi\":160,\"abi2\":\"armeabi-v7a\",\"sz\":\"l\",\"dp\":\"hlteuc\",\"bc\":701202,\"pr\":\"\"},\"referer\":{\"name\":\"page_home|!EX!PaidRowTest|!VA!empty_key|referrer_slug=home|row-2-Best New Updates|3|test_group=A|not_initiated\"}}","params":[]}');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = json_decode(curl_exec($ch), true);
        curl_close($ch);

        preg_match('/<meta property="og:title".*?content="(.*?)"\/>/su', $page, $appname);
        $appname = str_replace('_', ' ', $appname[1]).'.apk';
        $appname = str_replace(['آ', 'ا', 'ب', 'پ', 'ت', 'ث', 'ج', 'چ', 'ح', 'خ', 'د', 'ذ', 'ر', 'ز', 'ژ', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و', 'ه', 'ی', 'ي', 'ئ', 'أ', 'ة', 'ك', 'ء', '؟', 'إ', ' ', '‌'], ['a', 'a', 'b', 'p', 't', 's', 'j', 'ch', 'h', 'kh', 'd', 'z', 'r', 'z', 'zh', 's', 'sh', 's', 'z', 't', 'z', 'a', 'gh', 'f', 'gh', 'k', 'g', 'l', 'm', 'n', 'v', 'h', 'y', 'i', 'e', 'a', 't', 'k', 'e', '?', 'e', '-', ''], $appname);

        if (isset($json['result']['error'])) {
            html_error('App not found, or it\'s paid!');
        }
        $dlink = $json['result']['cp'][0].'apks/'.$json['result']['t'].'.apk';
        $this->RedirectDownload($dlink, $appname, 0, 0, $link);
    }
}

// [26-09-2017] Written by NimaH79.
