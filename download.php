<?php
$url = $_POST['url'];

$video_id = parse_url($url, PHP_URL_QUERY);
$video_id = explode('=', $video_id)[1];

$filename = 'video.mp4';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/watch?v=' . $video_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36');
$data = curl_exec($ch);
curl_close($ch);

$fp = fopen($filename, 'wb');
fwrite($fp, $data);
fclose($fp);

echo '<p>The video has been downloaded to your computer.</p>';