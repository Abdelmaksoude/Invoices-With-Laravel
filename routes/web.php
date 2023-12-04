<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoicesDetailController;
use App\Http\Controllers\InvoicesAttachmentController;
use App\Http\Controllers\InvoicesArchiveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoicesReport;
use App\Http\Controllers\CustomizeReport;

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionController::class);
Route::resource('products', ProductController::class);
Route::get('/section/{id}', [InvoicesController::class,'getproducts']);
Route::resource('InvoiceAttachments', InvoicesAttachmentController::class);
Route::get('/InvoicesDetails/{id}', [InvoicesDetailController::class,'edit']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailController::class,'get_file']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailController::class,'open_file']);
Route::post('delete_file', [InvoicesDetailController::class,'destroy'])->name('delete_file');
Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);
Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');
Route::get('Invoice_Paid',[InvoicesController::class,'Invoice_Paid']);
Route::get('Invoice_UnPaid',[InvoicesController::class,'Invoice_UnPaid']);
Route::get('Invoice_Partial',[InvoicesController::class,'Invoice_Partial']);
Route::resource('Archive', InvoicesArchiveController::class);
Route::get('Print_invoice/{id}',[InvoicesController::class,'Print_invoice']);
Route::get('export_invoices', [InvoicesController::class, 'export']);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    });
Route::get('Invoices_Report', [InvoicesReport::class, 'index']);
Route::post('Search_invoices', [InvoicesReport::class, 'Search_invoices']);
Route::get('Customize_Report', [CustomizeReport::class, 'index']);
Route::post('Search_customers', [CustomizeReport::class, 'Search_customers']);
Route::get('markAsRead', [InvoicesController::class,'markAsRead'])->name('markAsRead');


Route::resource('/{page}', AdminController::class);
