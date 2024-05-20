<?php

class CliCurl {

    public function processWebRequest($url, $userAgent='Mozilla/5.0', $httpMethod = 'GET') {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $httpMethod);
 
        $webRequestResult = curl_exec($ch);

	if ($webRequestResult === false) {
		throw new Exception(curl_error($ch));
	}

	$returnHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	if ($returnHttpCode >= 400) {
		throw new Exception("HTTP Request Failed with status code: {$returnHttpCode} !!!");
	}

	if (curl_close($ch) === false) {
		throw new Exception("Error closing Curl session!");
	}

        return $webRequestResult;
    }
}
