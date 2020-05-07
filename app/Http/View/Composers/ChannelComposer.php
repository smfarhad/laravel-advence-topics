<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Channel;

class ChannelComposer
{
    public function compose(View $view)
    {
        $view->with('channels', Channel::orderBy('name')->get());
    }
}
