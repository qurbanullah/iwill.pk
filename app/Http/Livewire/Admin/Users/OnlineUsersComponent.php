<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Shetabit\Visitor\Traits\Visitor;
use Illuminate\Support\Facades\Cache;


class OnlineUsersComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    // public $slug;
    // public $title;
    // public $content;
    // public $isSetToDefaultHomePage;
    // public $isSetToDefaultNotFoundPage;
    // public $isPageActive = true;
    // public $photo;
    // public $pageBannerPhotoPath;
    public $recordsToDisplay = 10;
    public $postStatus = 1;
    public $query = '';
    public $highlightIndex;
    /**
     * Put your custom public properties here!
     */
    public $role;
    public $name;
    public $activeStatus;
    public $isActive = 1;
    public $isOnline = 1;

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->resetVariables();
    }

    /**
     * get current logedin user id
     *
     * @return void
     */
    public function getAuthorId()
    {
        return auth()->user()->id;
    }

    public function resetVariables()
    {
        $this->query = '';
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('admin.edit-profession-sub-categories', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function readDatabaeForSearchQuery()
    {
        $users = User::where('is_active', $this->isActive)
                    ->where('name', 'like', '%' . $this->query . '%')
                    ->get();

        // Prepare the return array
        $displayUsers = [];

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)){
                $displayUsers[] = [
                                    'id' => $user->id,
                                    'name' => $user->name,
                                    'role' => $user->role,
                                    'email' => $user->email,
                                    'last_seen' => $user->last_seen,
                                    'away' => $user['last_seen'] < now()->subMinutes(5),
                ];
            }
        }
        return $this->paginate($displayUsers);
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'role' => 'required',
            'activeStatus' => 'required',
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        // $this->pageBannerPhotoPath = md5($this->photo . microtime()).'.'.$this->photo->extension();
        // // dd($this->photoPath);
        // $this->photo->storeAs('public/page-banner-images', $this->pageBannerPhotoPath);

        // $this->unassignDefaultHomePage();
        // $this->unassignDefaultNotFoundPage();
        User::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();

        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'New Page',
        //     'eventMessage' => 'Another page has been created!',
        // ]);
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return User::where('is_active', $this->isActive)
                        ->latest()
                        ->paginate($this->recordsToDisplay);
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        // $this->unassignDefaultHomePage();
        // $this->unassignDefaultNotFoundPage();
        User::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;

        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'Updated Page',
        //     'eventMessage' => 'There is a page (' . $this->modelId . ') that has been updated!',
        // ]);
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Deleted User',
            'eventMessage' => 'The user (' . $this->modelId . ') has been deleted!',
        ]);
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    // public function updatedTitle($value)
    // {
    //     $this->slug = Str::slug($value);
    // }

    /**
     * Runs everytime the isSetToDefaultHomePage
     * variable is updated.
     *
     * @return void
     */
    // public function updatedIsSetToDefaultHomePage()
    // {
    //     $this->isSetToDefaultNotFoundPage = null;
    // }

    /**
     * Runs everytime the isSetToDefaultNotFoundPage
     * variable is updated.
     *
     * @return void
     */
    // public function updatedIsSetToDefaultNotFoundPage()
    // {
    //     $this->isSetToDefaultHomePage = null;
    // }

    /**
    * Runs everytime the pageBannerPhotoPath
    * variable is updated.
    *
    * @return void
    */
    // public function updatedPhoto()
    // {
    //     $this->validate([
    //         'photo' => 'image|max:1024', // 1MB Max
    //     ]);
    // }

    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    // public function createShowModal()
    // {
    //     $this->resetValidation();
    //     $this->reset();
    //     $this->modalFormVisible = true;
    // }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = User::find($this->modelId);
        $this->name = $data->name;
        $this->role = $data->role;
        $this->activeStatus = $data->is_active;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'name' => $this->name,
            'role' => $this->role,
            'is_active' => $this->activeStatus,
        ];
    }

    /**
     * Unassigns the default home page in the database table
     *
     * @return void
     */
    // private function unassignDefaultHomePage()
    // {
    //     if ($this->isSetToDefaultHomePage != null) {
    //         Page::where('is_default_home', true)->update([
    //             'is_default_home' => false,
    //         ]);
    //     }
    // }

    /**
     * Unassigns the default 404 page in the database table
     *
     * @return void
     */
    // private function unassignDefaultNotFoundPage()
    // {
    //     if ($this->isSetToDefaultNotFoundPage != null) {
    //         Page::where('is_default_not_found', true)->update([
    //             'is_default_not_found' => false,
    //         ]);
    //     }
    // }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $this->recordsToDisplay), $items->count(), $this->recordsToDisplay, $page, $options);
    }

    /**
     * Dispatch event
     *
     * @return void
     */
    // public function dispatchEvent()
    // {
    //     $this->dispatchBrowserEvent('event-notification', [
    //         'eventName' => 'Sample Event',
    //         'eventMessage' => 'You have a sample event notification!',
    //     ]);
    // }

    public function onlineUsers() {
        $users = User::get();

        // Prepare the return array
        $displayUsers = [];

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)){
                $displayUsers[] = [
                                    'id' => $user->id,
                                    'name' => $user->name,
                                    'role' => $user->role,
                                    'email' => $user->email,
                                    'last_seen' => $user->last_seen,
                                    'away' => $user['last_seen'] < now()->subMinutes(5),
                ];
            }
        }
        return $this->paginate($displayUsers);
    }



    // public function onlineUsers() {
    //     // Get the array of users
    //     $users = Cache::get('is_online');
    //     // dd(Cache::get('$users'));
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
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.users.online-users-component', [
            'searchedData' => $this->readDatabaeForSearchQuery(),
            'onlineUsers' => $this->onlineUsers(),
        ]);
    }
}
