<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Http\Request;

use App\Http\Controllers\OrdresController;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
   if(!empty($request->category)){
    $produitas = App\Models\produit::where('category_id',$request->category)->get();
   }else{

    $produitas = App\Models\produit::all();
   }

    return view('welcome',compact('produitas'));
});

Route::get('/produit/{produit}',[ProduitsController::class, 'details'])->name('produit.show')->where('id', '[0-9]+');
Route::get('/commande',[ProduitsController::class, 'commande'])->name('produit.commande');

Route::post('/addcart', function (Request $request) {
    $order = new App\Models\ordre();
    $order->produit_id = $request->porduit;
    $order->quantity = $request->quantity;
    $order->size_id = $request->ssize;
    $order->color_id = $request->color;
    $order->save();
    $setting = App\Models\setting::latest()->first();

    $url = "https://api.whatsapp.com/send?phone=".$setting->whatsapp."&text=". urlencode(asset('commande').'?order='.$order->id."/");


return Redirect::intended($url);

        });



Auth::routes();
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/home', function() {
        return view('home');
    })->name('home');



Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', [CategoriesController::class, 'index'])
         ->name('categories.category.index');
    Route::get('/create', [CategoriesController::class, 'create'])
         ->name('categories.category.create');
    Route::get('/show/{category}',[CategoriesController::class, 'show'])
         ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit',[CategoriesController::class, 'edit'])
         ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', [CategoriesController::class, 'store'])
         ->name('categories.category.store');
    Route::put('category/{category}', [CategoriesController::class, 'update'])
         ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}',[CategoriesController::class, 'destroy'])
         ->name('categories.category.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'colors',
], function () {
    Route::get('/', [ColorsController::class, 'index'])
         ->name('colors.color.index');
    Route::get('/create', [ColorsController::class, 'create'])
         ->name('colors.color.create');
    Route::get('/show/{color}',[ColorsController::class, 'show'])
         ->name('colors.color.show')->where('id', '[0-9]+');
    Route::get('/{color}/edit',[ColorsController::class, 'edit'])
         ->name('colors.color.edit')->where('id', '[0-9]+');
    Route::post('/', [ColorsController::class, 'store'])
         ->name('colors.color.store');
    Route::put('color/{color}', [ColorsController::class, 'update'])
         ->name('colors.color.update')->where('id', '[0-9]+');
    Route::delete('/color/{color}',[ColorsController::class, 'destroy'])
         ->name('colors.color.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'sizes',
], function () {
    Route::get('/', [SizesController::class, 'index'])
         ->name('sizes.size.index');
    Route::get('/create', [SizesController::class, 'create'])
         ->name('sizes.size.create');
    Route::get('/show/{size}',[SizesController::class, 'show'])
         ->name('sizes.size.show')->where('id', '[0-9]+');
    Route::get('/{size}/edit',[SizesController::class, 'edit'])
         ->name('sizes.size.edit')->where('id', '[0-9]+');
    Route::post('/', [SizesController::class, 'store'])
         ->name('sizes.size.store');
    Route::put('size/{size}', [SizesController::class, 'update'])
         ->name('sizes.size.update')->where('id', '[0-9]+');
    Route::delete('/size/{size}',[SizesController::class, 'destroy'])
         ->name('sizes.size.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'produits',
], function () {
    Route::get('/', [ProduitsController::class, 'index'])
         ->name('produits.produit.index');
    Route::get('/create', [ProduitsController::class, 'create'])
         ->name('produits.produit.create');
    Route::get('/show/{produit}',[ProduitsController::class, 'show'])
         ->name('produits.produit.show')->where('id', '[0-9]+');
    Route::get('/{produit}/edit',[ProduitsController::class, 'edit'])
         ->name('produits.produit.edit')->where('id', '[0-9]+');
    Route::post('/', [ProduitsController::class, 'store'])
         ->name('produits.produit.store');
    Route::put('produit/{produit}', [ProduitsController::class, 'update'])
         ->name('produits.produit.update')->where('id', '[0-9]+');
    Route::delete('/produit/{produit}',[ProduitsController::class, 'destroy'])
         ->name('produits.produit.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'settings',
], function () {
    Route::get('/', [SettingsController::class, 'index'])
         ->name('settings.setting.index');
    Route::get('/create', [SettingsController::class, 'create'])
         ->name('settings.setting.create');
    Route::get('/show/{setting}',[SettingsController::class, 'show'])
         ->name('settings.setting.show')->where('id', '[0-9]+');
    Route::get('/{setting}/edit',[SettingsController::class, 'edit'])
         ->name('settings.setting.edit')->where('id', '[0-9]+');
    Route::post('/', [SettingsController::class, 'store'])
         ->name('settings.setting.store');
    Route::put('setting/{setting}', [SettingsController::class, 'update'])
         ->name('settings.setting.update')->where('id', '[0-9]+');
    Route::delete('/setting/{setting}',[SettingsController::class, 'destroy'])
         ->name('settings.setting.destroy')->where('id', '[0-9]+');
});



Route::group([
    'prefix' => 'ordres',
], function () {
    Route::get('/', [OrdresController::class, 'index'])
         ->name('ordres.ordre.index');
    Route::get('/create', [OrdresController::class, 'create'])
         ->name('ordres.ordre.create');
    Route::get('/show/{ordre}',[OrdresController::class, 'show'])
         ->name('ordres.ordre.show')->where('id', '[0-9]+');
    Route::get('/{ordre}/edit',[OrdresController::class, 'edit'])
         ->name('ordres.ordre.edit')->where('id', '[0-9]+');
    Route::post('/', [OrdresController::class, 'store'])
         ->name('ordres.ordre.store');
    Route::put('ordre/{ordre}', [OrdresController::class, 'update'])
         ->name('ordres.ordre.update')->where('id', '[0-9]+');
    Route::delete('/ordre/{ordre}',[OrdresController::class, 'destroy'])
         ->name('ordres.ordre.destroy')->where('id', '[0-9]+');
});

});




Route::get('test', function () {



    \Artisan::call('cache:clear');
    echo \Artisan::output();
    \Artisan::call('config:clear');
    echo \Artisan::output();
    \Artisan::call('route:clear');
    echo \Artisan::output();
    \Artisan::call('route:cache');
    echo \Artisan::output();
    \Artisan::call('config:cache');
    echo \Artisan::output();
    \Artisan::call('migrate');


    echo \Artisan::output();



});
