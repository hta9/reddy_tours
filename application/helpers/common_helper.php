<?php

/**
 * [_post In Place of $this->input->post]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function _post($str)
{
	$ci     = &get_instance();
	$result = $ci->input->post($str);

	return $result;

}

/**
 * [set_session In Place of $this->session->set_userdata]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function set_session($str1, $str2)
{
	$ci     = &get_instance();
	$result = $ci->session->set_userdata($str1, $str2);

	return $result;

}

/**
 * [fetch_session In Place of $this->session->userdata]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function fetch_session($string)
{
	$ci     = &get_instance();
	$result = $ci->session->userdata($string);

	return $result;

}

/**
 * [unset_session In Place of $this->session->unset_userdata]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */

function unset_session($string)
{
	$ci     = &get_instance();
	$result = $ci->session->unset_userdata($string);

	return $result;

}

?>