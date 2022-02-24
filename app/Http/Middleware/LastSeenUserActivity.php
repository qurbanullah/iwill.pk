<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;

class LastSeenUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            // Get the array of users from the cache
            $users = Cache::get('user-is-online-');
            $expireTime = Carbon::now()->addMinute(10); // keep online for 10 min

            // If it's empty create it with the user who triggered this middleware call
            if(empty($users)) {
                Cache::put('user-is-online-' . Auth::user()->id, true, $expireTime);
            } else {
                Cache::put('user-is-online-' . Auth::user()->id, true, $expireTime);
            }
            //Last Seen
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     // This works only if users are logged in
    //     if(Auth::check()) {
    //         // Get the array of users from the cache
    //         $users = Cache::get('online-users');
    //         // If it's empty create it with the user who triggered this middleware call
    //         if(empty($users)) {
    //             Cache::put('online-users', [['id' => Auth::user()->id, 'last_activity_at' => now()]], now()->addMinutes(10));
    //         } else {
    //             // Otherwise iterate over the users stored in the cache array
    //             foreach ($users as $key => $user) {

    //                 // If the current iteration matches the logged in user, unset it because it's old
    //                 // and we want only the last user interaction to be stored (and we'll store it below)
    //                 if($user['id'] === Auth::user()->id) {
    //                     unset($users[$key]);
    //                     continue;
    //                 }

    //                 // If the user's last activity was more than 10 minutes ago remove it
    //                 if ($user['last_activity_at'] < now()->subMinutes(10)) {
    //                     unset($users[$key]);
    //                     continue;
    //                 }
    //             }

    //             // Add this last activity to the cache array
    //             $users[] = ['id' => Auth::user()->id, 'last_activity_at' => now()];

    //             // Put this array in the cache
    //             Cache::put('online-users', $users, now()->addMinutes(10));
    //         }
    //         //Last Seen
    //         User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
    //     }
    //     return $next($request);
    // }
}
