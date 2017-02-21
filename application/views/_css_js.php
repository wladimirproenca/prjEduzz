<?php

$version = '1.1.5';
$css_file = 'assets/cache/style.' . $version . '.css';
$js_file = 'assets/cache/script.' . $version . '.js';

$CssGroup = array();
$CssGroup = assets_url(). "lib/perfect-scrollbar/css/perfect-scrollbar.min.css";
$CssGroup = assets_url(). "lib/material-design-icons/css/material-design-iconic-font.min.css";
$CssGroup = assets_url(). "css/style.css";

$JsGroup = array();
$JsGroup[] = assets_url(). "lib/jquery/jquery.min.js";
$JsGroup[] = assets_url(). "lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js";
$JsGroup[] = assets_url(). "js/main.js";
$JsGroup[] = assets_url(). "lib/bootstrap/dist/js/bootstrap.min.js";

/*
foreach($CssGroup as $name => $value)
	echo '<link rel="stylesheet" href="' . $value . '">' . "\n";

foreach($JsGroup as $name => $value)
	echo '<script src="' . $value . '"></script>' . "\n";
*/

function juntarArquivos($file, $arquivos, $separacao = '', $function = NULL) {
	// Verifica se o arquivo existe
	if(file_exists($file))
		return true;
	
	if(!is_dir(dirname($file)))
		mkdir(dirname($file), 0777, true);
	
	// Carregar todos os conteudos dos arquivos
	$f = fopen($file, 'w+');
	
	$file = '';
	foreach($arquivos as $name => $value) {
		$return = '';
		if(substr($value, 0, 2) == '//')
			$value = 'http:'. $value;
		
		// Carregar o conteudo
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $value);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$content = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		if($http_code == 200) {
			$file .= $content . $separacao;
		}
	}
	
	// Verificar se tem alguma função de compactação
	if(function_exists($function)) {
		$file = call_user_func($function, $file);
	}
	
	fwrite($f, $file);
	fclose($f);
}

function cssCompress($content) {
	$content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);
	$content = str_replace(': ', ':', $content);
	$content = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $content);
	return $content;
}

juntarArquivos(FCPATH . $css_file, $CssGroup); // , '', 'cssCompress'
juntarArquivos(FCPATH . $js_file, $JsGroup, ';');

if(isset($_ccs_js_only_load) && $_ccs_js_only_load == true) {
	echo '<script>$(document).ready(function(e) {$.get("' . base_url($css_file) . '");$.get("' . base_url($js_file) . '");});</script>';
} else {
	echo '<link rel="stylesheet" href="' . base_url($css_file) . '">' . "\n";
	echo '<script src="' . base_url($js_file) . '"></script>' . "\n";
}
