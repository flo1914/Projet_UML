<?php

$data = load_mdbsearch($_GET['language'], $_GET['name']);

$answers = find_mdbname($data);
for($i=0; $i<count($answers); $i++)
	echo $answers[$i]."<br>";
echo "<br><br>";

$answers = find_mdburl($data);
for($i=0; $i<count($answers); $i++)
	echo $answers[$i]."<br>";
echo "<br><br>";

$data = load_mdbdata($answers[0], $_GET['language']);
$answers = find_mdbdata($data);
if(isset($answers['overview']))
	echo $answers['overview']."<br><br>";
if(isset($answers['director']))
	echo "Dirigé par ".$answers['director']."<br>";
echo "<br>créé par : <br>";
for($i=0; $i<count($answers['created_by']); $i++)
	echo $answers['created_by'][$i]."<br>";
echo "<br>acteurs principaux : <br>";
for($i=0; $i<count($answers['starring']); $i++)
	echo $answers['starring'][$i]."<br>";
	
	
function load_mdbsearch($lang, $name){
	$ch = curl_init();
	
	curl_setopt ($ch, CURLOPT_URL, 'http://www.themoviedb.org/search?query='.preg_replace('#( )#', '+', $name).'&language='.$lang); 
	// curl_setopt ($ch, CURLOPT_URL, 'file:///C:/wamp/www/the%20imdb%20film%20search/page2.html'); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	$data = curl_exec($ch); 
	curl_close($ch); 

	return $data;
}

function load_mdbdata($url, $lang){
	$ch = curl_init();
	
	curl_setopt ($ch, CURLOPT_URL, 'http://www.themoviedb.org'.$url.$lang); 
	// curl_setopt ($ch, CURLOPT_URL, 'file:///C:/wamp/www/the%20imdb%20film%20search/find2.html'); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	$data = curl_exec($ch); 
	curl_close($ch); 

	return $data;
}

function html_uncapse($doc, $key){
	$tab = explode($key, $doc);
	$ans = array();
	
	for($i=1; $i<count($tab); $i++){
		$find = explode(">", $tab[$i]);
		$j = 0;
		$result = null;
		while($result == null && $j<count($find)){
			if(!preg_match("#^<#", trim($find[$j]))){
				$result = explode("<", $find[$j]);
				$ans[] = $result[0];
			}
			$j++;
		}
	}
	
	return $ans;
}

function find_mdbname($html){
	$tab = explode('<h3><a href="', trim($html));
	$results = null;
	
	for($i=1; $i<count($tab); $i++){
		$tab2 = explode('" title="', trim($tab[$i]));
		$tab3 = explode('">', trim($tab2[1]));
		$results[] = $tab3[0];
	}
	
	return $results;
}

function find_mdburl($html){
	$tab = explode('<h3><a href="', trim($html));
	$results = null;
	
	for($i=1; $i<count($tab); $i++){
		$tab2 = explode('" title="', trim($tab[$i]));
		$tab3 = explode('=', trim($tab2[0]));
		$results[] = $tab3[0].'=';
	}
	
	return $results;
}

function find_mdbdata($html){
	$overview = html_uncapse($html, 'Overview');
	
	if($overview != null )
		$result['overview'] = $overview[0];
	
	$director = html_uncapse($html, '<span itemprop="director" itemscope itemtype="http://schema.org/Person">');
	if($director != null)
		$result['director'] = $director[0];
	
	
	$result['created_by'] = html_uncapse($html, '<span itemprop="creator" itemscope itemtype="http://schema.org/Person">');
	$result['starring'] = html_uncapse($html, '<span itemprop="actor" itemscope itemtype="http://schema.org/Person">');
	
	return $result;
}
?>