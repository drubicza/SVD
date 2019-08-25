<?php
function fn_curl($xreff, $xproxy)
{
    $domains[0]  = "gmail.com";
    $domains[1]  = "yandex.com";
    $domains[2]  = "yahoo.com";
    $domains[3]  = "yahoo.co.id";
    $domains[4]  = "getnada.com";
    $domains[5]  = "facebook.com";
    $domains[6]  = "instagram.com";

    $randomain = $domains[rand(0, 6)];
    $randuser  = file_get_contents("https://api.randomuser.me");
    $json_res  = json_decode($randuser, true);
    $name_frst = $json_res["results"][0]["name"]["first"];
    $name_last = $json_res["results"][0]["name"]["last"];
    $rand_numb = "404".rand(0, 9999);
    $alphanum  = "0123456789ABCDEFGHIJKLMOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $user_name = "";

    for ($i = 0; $i < 8; $i++) {
        $user_name.= $alphanum[mt_rand(0, strlen($alphanum) - 1)];

    }

    $meh  = rand(0, 99999999);
    $wtf  = base64_encode('{"sign":"63be750253cc8ff0627852d0d3ee9b0b","salt":"532","method_name":"user_register","name":"'.$name_last.'","email":"'.$name_last."".$rand_numb."@".$randomain.'","password":"'.$user_name.'","phone":"62858'.$meh.'","user_refrence_code":"'.$xreff.'"}');
    $body = "data=".$wtf."";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://skyhunt.me:80/app/video-status/api.php");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $xproxy);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);

    $headers   = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded;";
    $headers[] = "Host: skyhunt.me";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

echo "SVIDEO Downloader -Video Status & Video Downloader\n";
echo "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";
echo "Socks5 : ";
$xfile = trim(fgets(STDIN));

echo "Reff : ";
$xreff = trim(fgets(STDIN));

echo "Selamat Datang di Nabila Tools\n\n\n";
$xproxy = explode("\n", str_replace("\n", "", file_get_contents($xfile)));

$i = 0;

while ($i < count($xproxy)) {
    $sock_lst = $xproxy[$i];
    $json_res = json_decode(fn_curl($xreff,$sock_lst));
    $xcepu = $json_res->_29->_30;
    echo"[$i] Jangan ada cepu di antara kita $xcepu\n";
}
?>
