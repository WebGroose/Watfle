<?php
require_once 'config.php';

$searchType = 'movie';// movie or tv
$query = $_GET['query'];

// GET 방식
$url = 'https://api.themoviedb.org/4/search/'.$searchType.'?api_key='.$api_key.'&language=ko&query='.$query;

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

echo $response;

/*$decode = json_decode($response);
$result = [];
for ($i = 0; $i < $response->total_results; $i++) { 
	if ($i >= 5) break;
	array_push($result[], $response->results[$i]);
}

var_dump($result);
echo json_encode($result);*/