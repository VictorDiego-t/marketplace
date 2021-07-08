<?php
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [HomeController::class, 'single'])->name('product.single');



//Route Group only autenticaded
//Middleware auth
Route::group(['middleware' => ['auth']], function(){
    
    // Acess URL /admin
    //
    Route::prefix('admin')->name('admin.')->group(function(){  

        Route::post('photos/remove', [ProductPhotoController::class, 'removePhoto'])->name('photo.remove');
        Route::prefix('categories')->name('categories.')->group(function(){ 
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');  
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit'); 
            Route::delete('/destroy/{category}',  [CategoryController::class, 'destroy'])->name('destroy');  
        });
        // 


        // Acess  /admin/products
        Route::prefix('products')->name('products.')->group(function(){ 
            Route::get('/', [ProductsController::class, 'index'])->name('index');
            Route::post('/store', [ProductsController::class, 'store'])->name('store');  
            Route::get('/create', [ProductsController::class, 'create'])->name('create');
            Route::get('/{product}/edit', [ProductsController::class, 'edit'])->name('edit'); 
            Route::post('/update/{product}', [ProductsController::class, 'update'])->name('update');
            Route::get('/destroy/{product}',  [ProductsController::class, 'destroy'])->name('destroy');  
        });
        // Acess /admin/stores
        Route::prefix('stores')->name('stores.')->group(function(){ 
            Route::get('/', [StoreController::class, 'index'])->name('index');
            Route::post('/store', [StoreController::class, 'store'])->name('store');  
            Route::get('/create', [StoreController::class, 'create'])->name('create');
            Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('edit'); 
            Route::post('/update/{store}', [StoreController::class, 'update'])->name('update');
            Route::get('/destroy/{store}',  [StoreController::class, 'destroy'])->name('destroy');  
        }); 

    
    });
});

    




// auth routes 
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
