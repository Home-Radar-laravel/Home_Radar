<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StatisticsController;

use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;


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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


Route::get('/accont-error-Page', [\App\Http\Controllers\Auth\errorPageController::class, 'acconterrorPage'])->name('error-page');


Auth::routes(['verify'=>true]);
Route::get('/sweet',[\App\Http\Controllers\SweetController::class,'index'])->name('sweet-index');
Route::get('/Roles-Mangment', [RoleController::class, 'index'])->name('roles-mangment');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class,'registerView'])->name('register');
Route::get('/register-create',[\App\Http\Controllers\Auth\RegisterController::class,'create']);
Route::get('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout-page');

Route::get('dark-mode-switcher', [\App\Http\Controllers\DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');




Route::group(['middleware' => ['auth']], function() {

    // عرض قائمة العقارات
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// عرض نموذج إنشاء عقار جديد
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

// تخزين عقار جديد
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

// عرض تفاصيل عقار معين
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');

// عرض نموذج تعديل عقار معين
Route::get('/properties/{id}/edit', [PropertyController::class, 'edit'])->name('properties.edit');

// تحديث عقار معين
Route::put('properties/{id}', [PropertyController::class, 'update'])->name('properties.update');

// حذف عقار معين
Route::delete('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

Route::put('/property/{id}/availability', [PropertyController::class, 'updateAvailability'])->name('property.updateAvailability');


// Display a listing of bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

// Show the form to create a new booking
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');

// Store a newly created booking in storage
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

// Display the specified booking
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

// Show the form to edit the specified booking
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');

// Update the specified booking in storage
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');

// Remove the specified booking from storage
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

Route::get('/', [StatisticsController::class, 'index'])->name('dashboard-overview-1');



    Route::get('/Roles-Mangment', [RoleController::class, 'index'])->name('roles-mangment');
    Route::get('/Roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/Roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');

    Route::delete('/Roles-destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/Roles-show//{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/Roles-index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/Roles-create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/Roles-store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/Users-List-to-Approve', [UserController::class,'indextow'])->name('users.index');
    Route::get('/User-Mangment', [UserController::class, 'index'])->name('users.index');
    Route::get('/User-Mangment', [UserController::class, 'index'])->name('user-mangment');
    Route::get('/User-create', [UserController::class, 'create'])->name('users.create');
    Route::post('/User-store', [UserController::class, 'store'])->name('users.store');
    Route::get('/User-show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/edit/{id}',[UserController::class, 'update'])->name('users.edit');
    Route::patch('/User-update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::resource('users', UserController::class);
  
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::controller(PageController::class)->group(function() {
        Route::get('/approval',[ \App\Http\Controllers\HomeController::class,'approval'])->name('approval');
            Route::get('/home', [ \App\Http\Controllers\HomeController::class,'index'])->name('home');
        
        Route::middleware(['admin'])->group(function () {
            Route::get('/userstow', [UserController::class,'indextow'])->name('admin.users.index');
            Route::get('/users/{user_id}/approve', [UserController::class,'approve'])->name('admin.users.approve');
            Route::get('/users/{user_id}/des-approve', [UserController::class,'desApprove'])->name('admin.users.des-approve');
        });
        // Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
        Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
        Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
        Route::get('categories-page', 'categories')->name('categories');
        Route::get('add-product-page', 'addProduct')->name('add-product');
        Route::get('product-list-page', 'productList')->name('product-list');
        Route::get('product-grid-page', 'productGrid')->name('product-grid');
        Route::get('transaction-list-page', 'transactionList')->name('transaction-list');
        Route::get('transaction-detail-page', 'transactionDetail')->name('transaction-detail');
        Route::get('seller-list-page', 'sellerList')->name('seller-list');
        Route::get('seller-detail-page', 'sellerDetail')->name('seller-detail');
        Route::get('reviews-page', 'reviews')->name('reviews');
        Route::get('inbox-page', 'inbox')->name('inbox');
        Route::get('file-manager-page', 'fileManager')->name('file-manager');
        Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
        Route::get('chat-page', 'chat')->name('chat');
        Route::get('post-page', 'post')->name('post');
        Route::get('calendar-page', 'calendar')->name('calendar');
        Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        Route::get('crud-form-page', 'crudForm')->name('crud-form');
        Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
        Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
        Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
        Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
        Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
        Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
        Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
        Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
        Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
        Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
        Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');


        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('regular-table-page', 'regularTable')->name('regular-table');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('modal-page', 'modal')->name('modal');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');

    });
});

