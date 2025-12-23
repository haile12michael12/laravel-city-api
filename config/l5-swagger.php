<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'Laravel OpenApi',
            ],

            'routes' => [
                /*
                 * Route for accessing api documentation interface
                */
                'api' => 'api/documentation',
            ],
            'paths' => [
                /*
                 * File name of the generated json documentation file
                */
                'docs_json' => 'api-docs.json',

                /*
                 * File name of the generated YAML documentation file
                */
                'docs_yaml' => 'api-docs.yaml',

                /*
                * Set this to `json` or `yaml` to determine which documentation file to use in UI
                */
                'format_to_use_for_docs' => 'json',

                /*
                 * Absolute paths to directory containing the swagger annotations are stored.
                */
                'annotations' => [
                    'app',
                ],
            ],
        ],
    ],
    'generate_always' => false,
    'generate_yaml' => false,
    'proxy' => false,
    'additional_config_url' => null,
    'middleware' => [
        'api' => [],
        'asset' => [],
        'docs' => [],
        'oauth2_callback' => [],
    ],
    'security' => [
        /*
         * Examples of Security schemes
        */
        /*
        'oauth2_security_example' => [ // Unique name of security
            'type' => 'oauth2', // The type of the security scheme. Valid values are "basic", "apiKey" or "oauth2".
            'description' => 'A short description for security scheme',
            'flow' => 'implicit', // The flow used by the OAuth2 security scheme. Valid values are "implicit", "password", "application" or "accessCode".
            'authorizationUrl' => 'http://example.com/auth', // The authorization URL to be used for (implicit/accessCode)
            'tokenUrl' => 'http://example.com/token', // The token URL to be used for (password/application/accessCode)
            'scopes' => [
                'read:projects' => 'read your projects',
                'write:projects' => 'modify projects in your account',
            ]
        ],
        'apiKey' => [
            'type' => 'apiKey',
            'description' => 'A short description for api key',
            'name' => 'api_key',
            'in' => 'header', // The location of the API key. Valid values are "query" or "header".
        ],
        'basic' => [
            'type' => 'basic',
            'description' => 'A short description for basic auth',
        ],
        */
    ],
    'open_api_spec_version' => '3.0.0',
];