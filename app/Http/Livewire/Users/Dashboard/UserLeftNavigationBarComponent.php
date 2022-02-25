<?php

namespace App\Http\Livewire\Users\Dashboard;

use Livewire\Component;
use Cart;

class UserLeftNavigationBarComponent extends Component
{
    public function render()
    {
        // restore cart items
        if (auth()->check()){
            Cart::instance('cart')->restore(auth()->user()->email);
        }

        return view('livewire.users.dashboard.user-left-navigation-bar-component');
    }
}
