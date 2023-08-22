<?php
function generate_template($content): object|string
{
	$CI = &get_instance();

	$header 	= $CI->load->view('partials/header', '', true);
	$navbar		= $CI->load->view('partials/navbar', '', true);
	$sidebar	= $CI->load->view('partials/sidebar', '', true);
	$footer		= $CI->load->view('partials/footer','', true);

	$data = array(
		'header'	=> $header,
		'navbar'	=> $navbar,
		'sidebar'	=> $sidebar,
		'content'	=> $content,
		'footer'	=> $footer
	);

	return $CI->load->view('layouts/master', $data, true);
}
