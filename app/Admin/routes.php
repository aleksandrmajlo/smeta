<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Общая  информация.';
	return AdminSection::view($content, 'Dashboard');
}]);

//Route::get('information', ['as' => 'admin.information', function () {
//	$content = 'Информация.';
//	return AdminSection::view($content, 'Дополнительные  услуги');
//}]);
