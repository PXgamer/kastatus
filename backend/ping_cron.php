<?php

include './funcs.php';
$db_conn = \funcs\Functions::conn();
$sql = 'SELECT * FROM `domains`';
$res = \funcs\Functions::query($db_conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $urls[] = $row['url'];
}

foreach ($urls as $url) {
    $cu = curl_init();
    CURL_SETOPT($cu, CURLOPT_URL, $url);
    CURL_SETOPT($cu, CURLOPT_HEADER, 0);
    CURL_SETOPT($cu, CURLOPT_FOLLOWLOCATION, 1);
    CURL_SETOPT($cu, CURLOPT_NOBODY, 1);
    CURL_SETOPT($cu, CURLOPT_FRESH_CONNECT, 1);
    CURL_SETOPT($cu, CURLOPT_SSL_VERIFYPEER, 0);

    curl_exec($cu);
    $http_status = curl_getinfo($cu, CURLINFO_HTTP_CODE);
    $sql = "UPDATE `domains` SET status=$http_status WHERE url=$url";
    $res = \funcs\Functions::query($db_conn, $sql);
    curl_close($cu);
}
echo 'Success';
