<?php

use Aws\Laravel\AwsServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | AWS SDK Configuration
    |--------------------------------------------------------------------------
    |
    | The configuration options set in this file will be passed directly to the
    | `Aws\Sdk` object, from which all client objects are created. This file
    | is published to the application config directory for modification by the
    | user. The full set of possible options are documented at:
    | http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/configuration.html
    |
    */
    'credentials' => [
        'key'    => 'AKIA5F3VJC3O47F7LH5C',
        'secret' => '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',
    ],
    'region' => 'us-east-1',
    'ua_append' => [
        'L5MOD/' . AwsServiceProvider::VERSION,
    ],
    's3' => [
        'region' => 'ap-south-1',
    ],
];
