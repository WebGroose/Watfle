<?php
require_once 'config.php';

function curlGET($url) {
	// GET 방식
	$ch = curl_init();                                 //curl 초기화
	curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함

	$headers = [
		'Content-Type: application/json;charset=utf-8'
	];

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);
	curl_close($ch);

	return json_decode($response);
};

$num = $_GET['num'];
$query = $_GET['query'];

$searchResult = curlGET('https://api.themoviedb.org/3/search/multi?api_key='.$api_key.'&language=ko&region=410&query='.urlencode($query));

$result = [];
for ($i = 0; $i < $searchResult->total_pages; $i++) {
	if ($i > 0) $searchResult = curlGET('https://api.themoviedb.org/3/search/multi?api_key='.$api_key.'&language=ko&region=410&query='.$query.'&page='.($i + 1));
	for ($j = 0; $j < count($searchResult->results); $j++) {
		if (count($result) >= 5) break 2;// 가공할 최대 데이터 개수 5개

		$id = $searchResult->results[$j]->id;
		$media_type = $searchResult->results[$j]->media_type;
		$title = '';
		$provider = [];

		if ($media_type == 'movie') $title = $searchResult->results[$j]->title;
		else if ($media_type == 'tv') $title = $searchResult->results[$j]->name;
		else continue;

		$providerResult = curlGET('https://api.themoviedb.org/3/'.$media_type.'/'.$id.'/watch/providers?api_key='.$api_key);// lan ko?

		if (isset($providerResult->results->KR->flatrate)) {
			$count = 0;
			foreach ($providerResult->results->KR->flatrate as $value) {
				if ($value->provider_name == 'Netflix' || $value->provider_name == 'Watcha') {
					$provider[] = $value->provider_name;
					$count++;
				}
			}
			if ($count == 0) continue;
		}
		else continue;

		$result[] = [
			'id' => $id,
			'title' => $title,
			'provider' => $provider,
			'mediaType' => $media_type
		];
	}
}

echo json_encode([
	'num' => $num,
	'result' => $result
]);