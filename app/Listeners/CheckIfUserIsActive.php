<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckIfUserIsActive
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
{
    $user = $event->user;

    if ($user->is_active == 0) {
        Auth::logout(); // Logout the user if the account is not active
        // Use redirect()->back() instead of Redirect::back() for proper response handling
        return redirect()->back()->withErrors([
            'email' => 'Akun belum dikonfirmasi.',
        ]);
    }
}
}
