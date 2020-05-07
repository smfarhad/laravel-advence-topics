<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CardPaymentGateway;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelComposer;
use App\Channel;
use App\Postcard;
use App\PostcardSendingService;

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
