<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\User;
use App\Models\Page;
use App\Models\ProductOrder;


use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Shetabit\Visitor\Traits\Visitor;
use Illuminate\Support\Facades\Cache;

class AdminProductOrdersComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $userId;
    public $slug;
    public $title;
    public $content;
    public $introduction;
    public $isSetToActive;
    public $photo;
    public $photoPath;
    public $pageBannerPhotoPath;
    public $recordsPerPage;
    public $query = '';
    public $highlightIndex;
    public $professionCategoryId;
    public $professionSubCategoryId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $isActive;
    // public $professionCategory;
    // public $professionSubCategory;

    /**
     * Put your custom public properties here!
     */


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
        $this->recordsPerPage = 10;
        $this->isActive = "default";
        $this->isSetToActive = true;

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
        return ProductOrder::select('*')
                    ->join('users', 'product_orders.user_id', 'users.id')
                    ->where('product_orders.is_shipping_different', $this->isActive)
                    ->where('product_orders.id', 'like', '%' . $this->query . '%')
                    ->orWhere('users.name', 'like', '%' . $this->query . '%')
                    ->paginate($this->recordsPerPage);
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        if ($this->isActive == "different"){
            return ProductOrder::where('is_shipping_different', true)
                        ->paginate($this->recordsPerPage);
        }
        else if ($this->isActive == "same"){
            return ProductOrder::where('is_shipping_different', false)
                        ->paginate($this->recordsPerPage);
        }
        else{
            return ProductOrder::paginate($this->recordsPerPage);
        }
    }

    /**
    * update product order status
    *
    * @return void
    */
    public function updateProductOrderStatus($order_id, $status)
    {
        $order = ProductOrder::find($order_id);
        $order->status = $status;
        if($status == "delivered") {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled") {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message', 'Order status has been updated sccesfully!');
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
            'content' => 'required',
            'introduction' => 'required',
            'isSetToActive' => 'required',
            'photo' => 'image|max:1024', // 1MB Max
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
        $this->pageBannerPhotoPath = md5($this->photo . microtime()).'.'.$this->photo->extension();
        // dd($this->photoPath);
        $this->photo->storeAs('public/page-banner-images', $this->pageBannerPhotoPath);

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();

        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'New Page',
        //     'eventMessage' => 'Another page has been created!',
        // ]);
    }

    /**
    * Runs everytime the pageBannerPhotoPath
    * variable is updated.
    *
    * @return void
    */
    public function updatedPhoto()
    {
        // $this->pageBannerPhotoPath->reset;
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }

        /**
    * Runs everytime the isSetToActivePage
    * variable is updated.
    *
    * @return void
    */
    // public function updatedIsSetToActive()
    // {
    //     $this->isSetToActive = null;
    // }

    /**
     * Runs everytime the isSetToDefaultHomePage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultHomePage()
    {
        $this->isSetToDefaultNotFoundPage = null;
    }

    /**
     * Runs everytime the isSetToDefaultNotFoundPage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultNotFoundPage()
    {
        $this->isSetToDefaultHomePage = null;
    }

    /**
     * Unassigns the default home page in the database table
     *
     * @return void
     */
    private function unassignSetToActive()
    {
        if ($this->isSetToActive != null) {
            Page::where('is_active', true)->update([
                'is_active' => false,
            ]);
        }
    }

    /**
     * Unassigns the default home page in the database table
     *
     * @return void
     */
    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Page::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    /**
     * Unassigns the default 404 page in the database table
     *
     * @return void
     */
    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Page::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

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
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        $this->pageBannerPhotoPath = md5($this->photo . microtime()).'.'.$this->photo->extension();
        // dd($this->photoPath);
        $this->photo->storeAs('public/page-banner-images', $this->pageBannerPhotoPath);

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::find($this->modelId)->update($this->modelData());
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
        Page::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Deleted User',
            'eventMessage' => 'The user (' . $this->modelId . ') has been deleted!',
        ]);
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = ProductOrder::find($this->modelId);
        $this->userId = $data->user_id;
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->introduction = $data->introduction;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
        $this->isSetToActive = !$data->is_active ? null : true;
        $this->pageBannerPhotoPath = $data->page_banner_photo_path;
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
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'introduction' => $this->introduction,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            'is_active' => $this->isSetToActive,
            'page_banner_photo_path' => $this->pageBannerPhotoPath,
        ];
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


    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        // dd($this->read());
        return view('livewire.admin.admin-product-orders-component', [
            'data' => $this->read(),
            'searchedData' => $this->readDatabaeForSearchQuery(),
        ]);
    }
}
