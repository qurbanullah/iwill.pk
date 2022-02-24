<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Post;

class AdminDashboardComponent extends Component
{
    public $recordsToDisplay = 10;
    public $query = '';
    public $highlightIndex;
    public $role;
    public $name;
    public $activeStatus;
    public $isActive = 1;


    /**
    * The totalUsers function.
    *
    * @return void
    */
    public function totalUsers()
    {
        return User::all()->count();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function activeUsers()
    {
        return User::where('is_active', true)->count();
    }

    /**
    * The totalProfessionals function.
    *
    * @return void
    */
    public function totalProfessionals()
    {
        return User::select('*')
                    ->join('roles', 'roles.user_id', 'users.id')
                    ->where('roles.role', 'professional')->count();
    }

    /**
    * The totalVendors function.
    *
    * @return void
    */
    public function totalVendors()
    {
        return User::select('*')
                    ->join('roles', 'roles.user_id', 'users.id')
                    ->where('roles.role', 'vendor')->count();
    }

    public function onlineUsers() {
        $users = User::get();

        // Prepare the return array
        $displayUsers = [];

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)){
                $displayUsers[] = [
                                    'id' => $user->id,
                                    'name' => $user->name,
                                    'email' => $user->email,
                                ];
            }
        }
        return collect($displayUsers);
    }

    // public function onlineUsers() {
    //     // Get the array of users
    //     $users = Cache::get('online-users');
    //     if(!$users) return null;

    //     // Add the array to a collection so you can pluck the IDs
    //     $onlineUsers = collect($users);
    //     // Get all users by ID from the DB (1 very quick query)
    //     $dbUsers = User::find($onlineUsers->pluck('id')->toArray());

    //     // Prepare the return array
    //     $displayUsers = [];

    //     // Iterate over the retrieved DB users
    //     foreach ($dbUsers as $user){
    //         // Get the same user as this iteration from the cache
    //         // so that we can check the last activity.
    //         // firstWhere() is a Laravel collection method.
    //         $onlineUser = $onlineUsers->firstWhere('id', $user['id']) ;
    //         // Append the data to the return array
    //         $displayUsers[] = [
    //             'id' => $user->id,
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             // This Bool operation below, checks if the last activity
    //             // is older than 3 minutes and returns true or false,
    //             // so that if it's true you can change the status color to orange.
    //             'away' => $onlineUser['last_activity_at'] < now()->subMinutes(5),
    //         ];
    //     }
    //     return collect($displayUsers);
    // }

    /**
    * The totalPosts function.
    *
    * @return void
    */
    public function totalPosts()
    {
        return Post::all()->count();
    }

    /**
    * The activePosts function.
    *
    * @return void
    */
    public function activePosts()
    {
        return Post::where('is_active', true)->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.admin-dashboard-component', [
            'totalUsers' => $this->totalUsers(),
            'activeUsers' => $this->activeUsers(),
            'onlineUsers' => $this->onlineUsers(),

        ]);
    }
}
