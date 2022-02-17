<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Data Sanitiser',
	'description' => 'Sanitise, minify and randomise data in your database',
	'category' => 'plugin',
	'author' => 'Mike Street',
	'author_email' => 'mike@liquidlight.co.uk',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.1.0',
	'constraints' => [
		'depends' => [
			'typo3' => '9.5.0-11.5.99',
		],
		'suggests' => [],
	],
];
