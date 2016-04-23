<?php

function website_url($uri = '')
{
	$CI =& get_instance();
	if($CI->config->item('website_url'))
	{
		return rtrim($CI->config->item('website_url'), '/').'/'.$uri;
	}
	else
	{
		return rtrim($CI->config->item('base_url'), '/').'/'.$uri;
	}	
}