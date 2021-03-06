<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title'        => "GenBI SULTRA", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Website genbi sultra', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ["genbi sultra", "genbi", "sosoito", "genbi sulawesi tenggara"],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => "nonindex", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => "genbisultra", // set false to total remove
            'description' => 'Website genbi sultra', // set false to total remove
            'url'         => "https://genbisultra.com", // Set null for using Url::current(), set false to total remove
            'type'        => false,
            "locale" => "id",
            "locale:alternate" => ['id_ID'],
            'site_name'   => "genbisultra",
            'images'      => [config("app.url") . "/img/welcome/genbi-sultra.png"],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'genbisultra',
            'url' => 'https://genbisultra.com',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [config("app.url") . "/img/welcome/genbi-sultra.png"],
        ],
    ],
];
