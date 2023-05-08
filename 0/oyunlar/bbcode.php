<?php

function bbCode($text) {

$imgUrl = './img/';

$bul = array(

  // Standart HTML tagları için

  '~\[b\](.*?)\[/b\]~s',
  '~\[i\](.*?)\[/i\]~s',
  '~\[u\](.*?)\[/u\]~s',
  '~\[code=(.*?)\](.*?)\[/code\]~s',
  '~\[size=(.*?)\](.*?)\[/size\]~s',
  '~\[color=(.*?)\](.*?)\[/color\]~s',
  '~\[url=((?:ftp|https?)://.*?)\](.*?)\[/url\]~s',
  '~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'

  // Smiles :) için

  //'~(O\:\)|O\:-\))~s',
  //'~(\:-\)|\:\)|\:\]|\=\))~s',
  //'~(\:-P|\:P|\:-p|\:p|\=P)~s'

);

$degistir = array(

  // Standart HTML tagları için

  '<strong>$1</strong>',
  '<em>$1</em>',
  '<u>$1</u>',
  '<pre><code class="$1">$2</code></pre>',
  '<span style="font-size: $1px;">$2</span>', 
  '<span style="color: $1;">$2</span>', 
  '<a href="$1" target="_blank">$2</a>', 
  '<img src="$1" width="256px"/>'

  // Smiles :) image dosyaları 

  //'<img src="' . $imgUrl . 'angel.png" alt="angel" />', 
  //'<img src="' . $imgUrl . 'smile.png" alt="smile" />', 
  //'<img src="' . $imgUrl . 'tongue.png" alt="tongue" />' 

);

return preg_replace($bul,$degistir,$text); 

} 