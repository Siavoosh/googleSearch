<?php
if(isset($_GET['q']) && !empty($_GET['q'])){
	
	$page = isset($_GET['p']) && !empty($_GET['p']) && is_int((int)$_GET['p']) && (int)$_GET['p'] > 0 ? ((int)$_GET['p'] - 1) * 10 : 0; 
	$url = "https://google.com/search?q=" . urlencode($_GET['q']) . "&start=" . $page;
	$html = utf8_encode(file_get_contents($url));
	$pattern = '~[a-z]+://\S+~';
	$links = [];
	if($num_found = preg_match_all($pattern, $html, $out))
	{
	  foreach($out[0] as $l){
		  $l = str_replace("<","",$l);
		  $url_info = parse_url($l);
		  if(!strpos($l,"google") && !in_array($url_info['scheme'] . '://' . $url_info['host'],$links))
			  $links[] = $url_info['scheme'] . '://' . $url_info['host'];
	  }
	}
	echo "<pre>";
	print_r($links);
	echo "</pre>";
}
else
	echo 'missed q parameter';