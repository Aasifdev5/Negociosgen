<?php

use Illuminate\Support\Facades\Facade;


return [

    'name' => env('APP_NAME', 'Negociosgen'), // Replace {auth} with "Negociosgen"'),

    'env' => env('APP_ENV', 'production'),

    'debug' => env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),


    'timezone' => 'UTC',

    'locale' => 'en',

    'fallback_locale' => 'en',

    'faker_locale' => 'en_US',

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'maintenance' => [
        'driver' => 'file',
    ],

    'providers' => [

        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        Laravel\Socialite\SocialiteServiceProvider::class,
        Berkayk\OneSignal\OneSignalServiceProvider::class,

        Collective\Html\HtmlServiceProvider::class,

        Yajra\DataTables\DataTablesServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        Lab404\Impersonate\ImpersonateServiceProvider::class,

        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\TelescopeServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        Spatie\Permission\PermissionServiceProvider::class,
        Mariuzzo\LaravelJsLocalization\LaravelJsLocalizationServiceProvider::class,
    ],

    'aliases' => Facade::defaultAliases()->merge([
        'DataTables' => Yajra\DataTables\Facades\DataTables::class,

        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        'OneSignal' => Berkayk\OneSignal\OneSignalFacade::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Socialite' => Laravel\Socialite\Facades\Socialite::class,
    ])->toArray(),

];

