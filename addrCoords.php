<?php
    function getAddress($query){
        $REST_API_KEY = '821d4c617e82ea2e44101e3803b859b5';
        $callUrl = "https://dapi.kakao.com/v2/local/search/address.json?query=".urlencode($query);
        $headers = array();
        $headers[] = "Authorization: KakaoAK ".$REST_API_KEY;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $callUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
?>