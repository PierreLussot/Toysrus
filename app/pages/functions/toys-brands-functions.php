<?php

function toysListRender() {
	$html_title = 'jouet';
	$arr_toys = toysListDataGetAll();
	require_once PATH_ROOT .'app'. DS .'pages'. DS .'partials'. DS .'top.html.php';
	require_once PATH_ROOT .'app'. DS .'pages'. DS .'toys-list.php';
	require_once PATH_ROOT .'app'. DS .'pages'. DS .'partials'. DS .'bottom.html.php';
}