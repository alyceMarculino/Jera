<?php

session_start();

function buscarFilmes($query){	
	$ch = curl_init();	
	curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/search/movie?api_key=74e5ed8a2b39f560b2f639c25594a51b&query=$query");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return json_decode($output, true);
}

function buscarId($id){	
	$ch = curl_init();	
	curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$id?api_key=74e5ed8a2b39f560b2f639c25594a51b");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return json_decode($output, true);
}
?>