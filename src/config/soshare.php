<?php

/**
 * @Author: anwar
 * @Date:   2018-01-04 15:43:21
 * @Last Modified by:   anwar
 * @Last Modified time: 2018-01-04 17:11:45
 */
return[
	'facebook' => [
		'url' => 'https://www.facebook.com/sharer/sharer.php?u='
	],
    'twitter' => [
        'uri'         => 'https://twitter.com/intent/tweet?',
        'text'        => 'This link is shared by Soshare Laravel plugin',
        'hashtags'    => '#bdaliens',
        'via'         => 'bdaliens',
        'related'     => 'bdaliens', //related account multiple using comma separated;
        'inreplyto'   => 'bdaliens' //repaly whom. in reply to;
    ],
    'linkedin' => [
        'uri'         => 'https://www.linkedin.com/shareArticle?',
        'summary'     => 'This link is shared by Soshare Laravel plugin',//The url-encoded description that you wish you use.
        'mini'        => 'true', //A required argument who's value must always be:  true
        'title'       => 'bdaliens',//The url-encoded title value that you wish you use.200 No
        'source'      => 'bdaliens', //The url-encoded source of the content (e.g. your website or application name);
    ],
];
