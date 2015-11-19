<?php

return [
	'meta' => [
		/*
			         * The default configurations to be used by the meta generator.
		*/
		'defaults' => [
			'title' => "Laramap.com",
			'description' => 'List of artisans.',
			'separator' => ' - ',
			'keywords' => ['laravel', 'php', 'framework', 'web', 'artisans', 'laramap', 'artisanmap', 'florian wartner', 'fwartner'],
		],

		/*
			         * Webmaster tags are always added.
		*/
		'webmaster_tags' => [
			'google' => '',
			'bing' => '',
			'alexa' => null,
			'pinterest' => '',
			'yandex' => '',
		],
	],
	'opengraph' => [
		/*
			         * The default configurations to be used by the opengraph generator.
		*/
		'defaults' => [
			'title' => 'Laramap.com',
			'description' => 'List of artisans.',
			'url' => 'https://laramap.com',
			'type' => 'article',
			'site_name' => 'Laramap',
			'images' => [],
		],
	],
	'twitter' => [
		/*
			         * The default values to be used by the twitter cards generator.
		*/
		'defaults' => [
			'card' => 'summary',
			'site' => '@laramapcom',
		],
	],
];
