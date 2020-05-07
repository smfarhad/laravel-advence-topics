<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CardPaymentGateway;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelComposer;
use App\Channel;
use App\Mixins\StrMixins;
use App\Postcard;
use App\PostcardSendingService;
use Carbon\Traits\Macro;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            if (request()->has('card')) {
                return new CardPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('partNumber', function ($part) {
            return 'Apps - ' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        Str::mixin(new StrMixins(), false);

        // ResponseFactory::macro('errorJson', function ($message = 'Default error message') {
        //     return [
        //         'message' => $message,
        //         'error_code' => 123
        //     ];
        // });

        $this->app->singleton('Postcard', function ($app) {
            return new PostcardSendingService('us', 4, 6);
        });
        //View::share('channels', Channel::orderBy('name')->get());
        View::composer(['post.create', 'channel.index'], function ($view) {
            $view->with('channels', Channel::orderBy('name')->get());
        });
        // View::composer(
        //     'channels',
        //     ChannelComposer::class
        // );View::composer(
        //     'channels',
        //     ChannelComposer::class
        // );
    }
}
