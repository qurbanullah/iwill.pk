<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

        'products-images' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products-images'),
            'url' => env('APP_URL').'/products-images',
            'visibility' => 'public',
        ],

        'packages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/packages'),
            'url' => env('APP_URL').'/packages',
            'visibility' => 'public',
        ],

        'packages-images' => [
            'driver' => 'local',
            'root' => storage_path('app/public/packages-images'),
            'url' => env('APP_URL').'/packages-images',
            'visibility' => 'public',
        ],

        'packages-database' => [
            'driver' => 'local',
            'root' => storage_path('app/public/packages-database'),
            'url' => env('APP_URL').'/packages-database',
            'visibility' => 'public',
        ],

        'packages-info-files' => [
            'driver' => 'local',
            'root' => storage_path('app/public/packages-info-files'),
            'url' => env('APP_URL').'/packages-info-files',
            'visibility' => 'public',
        ],

        'package-xml-files' => [
            'driver' => 'local',
            'root' => storage_path('app/public/package-xml-files'),
            'url' => env('APP_URL').'/package-xml-files',
            'visibility' => 'public',
        ],

        'releases' => [
            'driver' => 'local',
            'root' => storage_path('app/public/releases'),
            'url' => env('APP_URL').'/releases',
            'visibility' => 'public',
        ],

        'pkginfo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pkginfo'),
            'url' => env('APP_URL').'/pkginfo',
            'visibility' => 'public',
        ],

        'downloads' => [
            'driver' => 'local',
            'root' => storage_path('app/public/downloads'),
            'url' => env('APP_URL').'/downloads',
            'visibility' => 'public',
        ],

        'posts-images' => [
            'driver' => 'local',
            'root' => storage_path('app/public/posts-images'),
            'url' => env('APP_URL').'/posts-images',
            'visibility' => 'public',
        ],

        'trix-attachment' => [
            'driver' => 'local',
            'root' => storage_path('app/public/trix-attachment'),
            'url' => env('APP_URL').'/trix-attachment',
            'visibility' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('profile-photos') => storage_path('app/public/profile-photos'),
        public_path('products-images') => storage_path('app/public/products-images'),
    ],

];
