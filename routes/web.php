<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Products\AdminProductOrderDetail;
use App\Http\Livewire\Products\ProductCartComponent;
use App\Http\Livewire\Products\ProductsByCategory;
use App\Http\Livewire\Products\ProductDetailComponent;
use App\Http\Livewire\Products\ProductEditComponent;
use App\Http\Livewire\Products\ProductWishlistComponent;
use App\Http\Livewire\Users\UserProductComponent;
use App\Http\Livewire\Users\UserProductOrderComponent;
use App\Http\Livewire\Users\UserProductOrderDetailComponent;


use App\Http\Livewire\Pages\PageShow;
use App\Http\Livewire\Posts\PostShow;
use App\Http\Livewire\Posts\PostEdit;
use App\Http\Livewire\Admin\Businesses\EditBusinessComponent;
use App\Http\Livewire\Admin\Categories\MainCategoriesComponent;




use App\Http\Livewire\Users\Professional;
use App\Http\Livewire\Users\ProfessionalsSearchResult;

use App\Http\Livewire\Admin\EditProfessionSubCategories;
use App\Http\Livewire\Admin\Services\EditService;
use App\Http\Livewire\Admin\Services\EditServiceComponent;
use App\Http\Livewire\Businesses\BusinessDetailComponent;
use App\Http\Livewire\Businesses\BusinessEditComponent;
use App\Http\Livewire\Pages\PageDetailComponent;

use App\Http\Livewire\SearchProfessionals;
use App\Http\Livewire\Services\ServiceCheckoutComponent;
use App\Http\Livewire\Services\ServiceDetailComponent;
use App\Http\Livewire\Services\ServiceEditComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
// Start of routes those; require snctum authentication
// and with middleware 'ensure.user.is.admin'

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
    'ensure.user.is.admin'
]], function () {

    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.admin-dashboard');
    })->name('admin.dashboard.admin-dashboard');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Manage Users
    Route::get('/admin/users', function () {
        return view('admin.users.all-users');
    })->name('admin.users.all-users');

    Route::get('/admin/online-users', function () {
        return view('admin.users.online-users');
    })->name('admin.users.online-users');

    // Manage Users
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Manage Products

    Route::get('/admin/products/all-products', function () {
        return view('admin.products.all-products');
    })->name('admin.products.all-products');

    // Display product orders
    Route::get('/admin/products-orders', function () {
        return view('admin.products.product-orders');
    })->name('admin.products.products-orders');

    // Display Product order detail
    Route::get('/admin/admin-product-order-detail/{order_id}', AdminProductOrderDetail::class)->name('admin.admin-product-order-detail');

    // Manage Coupons
    Route::get('/admin/coupons', function () {
        return view('admin.coupons');
    })->name('admin.coupons');

    Route::get('/admin/user-products', function () {
        return view('admin.products.user-products');
    })->name('admin.products.user-products');

    Route::get('/admin/products/product-categories', function () {
        return view('admin.products.products-categories');
    })->name('admin.products.products-categories');

    Route::get('/admin/products/products-sub-categories', function () {
        return view('admin.products.products-sub-categories');
    })->name('admin.products.products-sub-categories');

    Route::get('/admin/products/products-sub-sub-categories', function () {
        return view('admin.products.products-sub-sub-categories');
    })->name('admin.products.products-sub-sub-categories');

    Route::get('/admin/products/add-products-categories', function () {
        return view('admin.products.add-products-categories');
    })->name('admin.products.add-products-categories');

    Route::get('/admin/products/product-vendors', function () {
        return view('admin.products.products-vendors');
    })->name('admin.products.products-vendors');

    // End Products
    /////////////////////////////////////////////////////////////////////////////////////////////////////////


    // Main Categories
    // Route::get('/admin/categories/add-main-categories', function () {
    //     return view('admin.categories.add-main-categories');
    // })->name('admin.categories.add-main-categories');

    // Route::get('/admin/categories/main-categories', function () {
    //     return view('admin.categories.main-categories');
    // })->name('admin.categories.main-categories');

    // // Route::get('/admin/categories/main-categories', MainCategoriesComponent::class)->name('admin.categories.main-categories-component');


    // Route::get('/admin/categories/main-category-detail', function () {
    //     return view('admin.categories.main-category-detail');
    // })->name('admin.categories.main-category-detail');
    // // End Main Categories


    // // Manage Pages
    // Route::get('/admin/pages', function () {
    //     return view('admin.pages.all-pages');
    // })->name('admin.pages.all-pages');
    // // End manage Pages

    // // Manage Posts
    // Route::get('/admin/posts', function () {
    //     return view('admin.posts');
    // })->name('admin.posts');

    // Route::get('/admin/user-posts', function () {
    //     return view('admin.user-posts');
    // })->name('admin.user-posts');

    // // Manage Professions
    // Route::get('/admin/professions', function () {
    //     return view('admin.professions');
    // })->name('admin.professions');

    // Route::get('/admin/user-professions', function () {
    //     return view('admin.user-professions');
    // })->name('admin.user-professions');

    // Route::get('/admin/professions/profession-categories', function () {
    //     return view('admin.professions.profession-categories');
    // })->name('admin.professions.profession-categories');

    // Route::get('/admin/professions/profession-sub-categories', function () {
    //     return view('admin.professions.profession-sub-categories');
    // })->name('admin.professions.profession-sub-categories');

    // Route::get('/admin/professions/profession-sub-sub-categories', function () {
    //     return view('admin.professions.profession-sub-sub-categories');
    // })->name('admin.professions.profession-sub-sub-categories');
    // // End Professions


    // // Services
    // Route::get('/admin/services/service-categories', function () {
    //     return view('admin.services.service-categories');
    // })->name('admin.services.service-categories');

    // Route::get('/admin/services/service-sub-categories', function () {
    //     return view('admin.services.service-sub-categories');
    // })->name('admin.services.service-sub-categories');

    // Route::get('/admin/services/service-sub-sub-categories', function () {
    //     return view('admin.services.service-sub-sub-categories');
    // })->name('admin.services.service-sub-sub-categories');

    // Route::get('/admin/services/add-service-categories', function () {
    //     return view('admin.services.add-service-categories');
    // })->name('admin.services.add-service-categories');

    // Route::get('/admin/services/services-all', function () {
    //     return view('admin.services.services-all');
    // })->name('admin.services.services-all');

    // Route::get('/admin/services/create-new-service', function () {
    //     return view('admin.services.create-new-service');
    // })->name('admin.services.create-new-service');

    // Route::get('/admin/services/edit-service/{service_id}', EditServiceComponent::class)->name('admin.services.edit-service');

    // // end Services

    // // businesses
    // Route::get('/admin/businesses/add-business-categories', function () {
    //     return view('admin.businesses.add-business-categories');
    // })->name('admin.businesses.add-business-categories');

    // Route::get('/admin/businesses/business-categories', function () {
    //     return view('admin.businesses.business-categories');
    // })->name('admin.businesses.business-categories');

    // Route::get('/admin/businesses/business-sub-categories', function () {
    //     return view('admin.businesses.business-sub-categories');
    // })->name('admin.businesses.business-sub-categories');

    // Route::get('/admin/businesses/business-sub-sub-categories', function () {
    //     return view('admin.businesses.business-sub-sub-categories');
    // })->name('admin.businesses.business-sub-sub-categories');

    // Route::get('/admin/businesses/all-businesses', function () {
    //     return view('admin.businesses.all-businesses');
    // })->name('admin.businesses.all-businesses');

    // Route::get('/admin/businesses/create-new-business', function () {
    //     return view('admin.businesses.create-new-business');
    // })->name('admin.businesses.create-new-business');

    // Route::get('/admin/businesses/edit-business/{business_id}', EditBusinessComponent::class)->name('admin.businesses.edit-business-component');

    // // End businesses


    // // Add profession categories
    // Route::get('/admin/professions/add-profession-categories', function () {
    //     return view('admin.professions.add-profession-categories');
    // })->name('admin.professions.add-profession-categories');

    // // Edit profession categories
    // Route::get('/admin/edit-profession-sub-categories/{id}', EditProfessionSubCategories::class)->name('admin.edit-profession-sub-categories');

    // // Edit profession categories
    // Route::get('/admin/search-profession-sub-categories', function () {
    //     return view('admin.search-profession-sub-categories');
    // })->name('admin.search-profession-sub-categories');

    // // Add products categories
    // Route::get('/admin/add-product-categories', function () {
    //     return view('admin.add-product-categories');
    // })->name('admin.add-product-categories');
});

// Start of routes those; require snctum authentication
// and with middleware 'ensure.user.is.seller'
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
// Start of routes those; require snctum authentication
// and with middleware 'ensure.user.is.seller'

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
    'ensure.user.is.seller'
]], function () {

    Route::get('/products/my-products', function () {
        return view('products.my-products');
    })->name('products.my-products');

    // // Display product orders
    Route::get('/products/my-products-orders', function () {
        return view('products.my-product-orders');
    })->name('products.my-products-orders');

});

// Start of routes those; require snctum authentication
// and with middleware 'ensure.user.is.seller'
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


// Start of routes those; require snctum authentication
Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function () {



    Route::get('dashboard', function () {
        return view('users.dashboard.user-dashboard');
    })->name('users.dashboard.user-dashboard');

    // // user's all posts
    // Route::get('/posts/my-posts', function () {
    //     return view('posts.my-posts');
    // })->name('posts.my-posts');

    // // create new post
    // Route::get('/posts/post-create', function () {
    //     return view('posts.post-create');
    // })->name('posts.post-create');

    // // edit post
    // Route::get('/posts/post-edit/{urlslug}', PostEdit::class)->name('posts.post-edit');

    // // create users pages
    // Route::get('/my-pages', function () {
    //     return view('users.my-pages');
    // })->name('users.my-pages');

    // Route::get('/my-products', function () {
    //     return view('users.my-products');
    // })->name('users.my-products');

    // // Start of business route
    // Route::get('/businesses/my-businesses', function () {
    //     return view('businesses.my-businesses');
    // })->name('businesses.my-businesses');

    // Route::get('/businesses/create-new-business', function () {
    //     return view('businesses.create-new-business');
    // })->name('businesses.create-new-business');

    // Route::get('/bussiness/edit-business/{business_id}', BusinessEditComponent::class)->name('businesses.business-edit');

    // // End of business route

    // // Start of services route
    // Route::get('/services/my-services', function () {
    //     return view('services.my-services');
    // })->name('services.my-services');

    // Route::get('/services/create-new-service', function () {
    //     return view('services.create-new-service');
    // })->name('services.create-new-service');

    // // Route::get('/services/service-checkout', function () {
    // //     return view('services.service-checkout');
    // // })->name('services.service-checkout');


    // Route::get('/services/edit-service/{service_id}', ServiceEditComponent::class)->name('services.service-edit');
    // Route::get('/services/edit-checkout/{service_id}', ServiceCheckoutComponent::class)->name('services.service-checkout');

    // // End of services route

    // // Start of products routs
    // Route::get('/products/create-new-product', function () {
    //     return view('products.create-new-product');
    // })->name('products.create-new-product');

    Route::get('/products/product-checkout', function () {
        return view('products.product-checkout');
    })->name('products.product-checkout');

    // Route::get('/products/my-products', function () {
    //     return view('products.my-products');
    // })->name('products.my-products');

    // Route::get('/users/user-product-order', function () {
    //     return view('users.user-product-order');
    // })->name('users.user-product-order');

    // Route::get('/products/edit-product/{product_id}', ProductEditComponent::class)->name('products.product-edit');
    // // Route::get('/users/user-product', UserProductComponent::class)->name('users.user-product');
    // // Route::get('/users/user-product-order', UserProductOrderComponent::class)->name('users.user-product-order');
    // Route::get('/users/user-product-order-detail/{order_id}', UserProductOrderDetailComponent::class)->name('users.user-product-order-detail');

});
// End of routes those; require snctum authentication

// start of livewire routes; those do not require authentication
// Route::get('/users/professionals/{term}', ProfessionalsSearchResult::class)->name('users.professionals-search-result');
// Route::get('/users/professional/{id}', Professional::class)->name('users.professional');
// // Route::get('/search-professionals/{query}', SearchProfessionals::class)->name('search-professionals');
// Route::get('/posts/{urlslug}', PostShow::class)->where('urlslug', '[A-Za-z0-9-_]+')->name('posts.post-show');
// // post show page
// Route::get('/pages/page-detail/{page_id}', PageDetailComponent::class)->name('pages.page-detail-component');

// // product detail page
Route::get('/products/product-detail/{product_id}', ProductDetailComponent::class)->name('products.product-detail');
// // product cart page
Route::get('/products/product-cart', ProductCartComponent::class)->name('products.product-cart');
// // product wishlist page
Route::get('/products/product-wishlist', ProductWishlistComponent::class)->name('products.product-wishlist');
// // product detail page
Route::get('/products/products-by-category/{product_category_slug}', ProductsByCategory::class)->where('product_category_slug', '[A-Za-z0-9-_]+')->name('products.products-by-category');

// //start of services livewire routes
// // service detail page
// Route::get('/services/service-detail/{service_id}', ServiceDetailComponent::class)->name('services.service-detail-component');

// end of livewire routes


// Route::get('/posts/post-show/{urlslug}', function () {
//     return view('posts.post-show');
// })->name('posts.post-show');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/products', function () {
    return view('products');
})->name('products');

// Products
Route::get('/products/product-shop', function () {
    return view('products.product-shop');
})->name('products.product-shop');

Route::get('/products/product-cart', function () {
    return view('products.product-cart');
})->name('products.product-cart');

Route::get('/products/product-wishlist', function () {
    return view('products.product-wishlist');
})->name('products.product-wishlist');


// Services
Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/services/service-book', function () {
    return view('services.service-book');
})->name('services.service-book');

Route::get('/services/service-home', function () {
    return view('services.service-home');
})->name('services.service-home');
//End Services

// Professionals
Route::get('/professionals/professionals-hire', function () {
    return view('professionals.professionals-hire');
})->name('professionals.professionals-hire');
//End Services

//Start of business livewire routes
Route::get('/businesses/business-pages', function () {
    return view('businesses.business-pages');
})->name('businesses.business-pages');

// Route::get('/businesses/{urlSlug}', BusinessDetailComponent::class)->name('businesses.business-detail-component');
//End of business livewire routes

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/policy', function () {
    return view('policy.show');
})->name('policy.show');


Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/cookies-policy', function () {
    return view('cookies-policy');
})->name('cookies-policy');

Route::get('/terms', function () {
    return view('terms.show');
})->name('terms.show');

Route::get('/terms-of-service', function () {
    return view('terms-of-service');
})->name('terms-of-service');

Route::get('/search-professionals', function () {
    return view('search-professionals');
})->name('search-professionals');

Route::get('/test', function () {
    return view('test');
})->name('test');


Route::get('/products/product-cart', function () {
    return view('products.product-cart');
})->name('products.product-cart');

Route::get('/', function () {
    return view('home');
})->name('home');
