<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function assets_url()
	{
		$CI = & get_instance();
		return $CI->config->item('assets_url');  
	}
	function base_url()
	{
		$CI = & get_instance();
		return $CI->config->item('base_url');  
	}		
	function Autenticado()
	{


		// Construir Função de Login
		// Abaixo é provisório (dados fictícios)

		$CI = & get_instance();

        $CI->load->library('session');
        $CI->session->set_userdata('cli_cod', 1234);
        $CI->session->set_userdata('cli_rsocial', 'Diego Rego');
	}
