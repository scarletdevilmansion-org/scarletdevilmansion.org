<?php
error_reporting(0);

require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$source = 'auto';
$target = 'tr';

$trans = new GoogleTranslate();

//google translate api usage
/* $api_key = 'GOOGLE_CLOUD_API_KEY';
$text = '日本語のテキスト'; // Çevrilecek Japonca metin

$url = 'https://translation.googleapis.com/language/translate/v2?key=' . $api_key;
$data = array(
    'source' => 'ja', // Kaynak dili Japonca
    'target' => 'tr', // Hedef dili Türkçe
    'q' => $text,
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$decoded_response = json_decode($response, true);

$translated_text = $decoded_response['data']['translations'][0]['translatedText'];
 */

// HTML sayfasının URL'si
$url = "https://touhou-project.news/news/8892/index.html";

// HTML sayfasını dize olarak al
$html = file_get_contents($url);

// DOMDocument sınıfını kullanarak HTML sayfasını işle
$doc = new DOMDocument();
$doc->loadHTML($html);

//domdocument hata gizleme
libxml_use_internal_errors(true);


// istediğim verinin elementini seç
/* $element = $doc->getElementById('post-8892');

// istediğim verinin içeriğini al
$icerik = $element->nodeValue; */


//herhangi bir elementin class içeriğini çekmek için
$elements = $doc->getElementsByTagName("article");
foreach ($elements as $element) {
  if (strpos($element->getAttribute("class"), "") !== false) {
    $icerik = $element->nodeValue;
    break;
  }
}


$result = $trans->translate($source, $target, $icerik);

echo $result;

?>