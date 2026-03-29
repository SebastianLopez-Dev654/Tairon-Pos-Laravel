<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

# 🛒 SALES (VENTAS)

Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);
Route::post('/sales/add-product', [SaleController::class, 'addProduct']);
Route::post('/sales/remove-product', [SaleController::class, 'removeProduct']);
Route::post('/sales/cancel', [SaleController::class, 'cancel']);
Route::get('/sales/{sale}', [SaleController::class, 'show']);

# 📦 PRODUCTS

Route::resource('products', ProductController::class);

# 👤 CUSTOMERS

Route::get('/customers/search', [CustomerController::class, 'search']);
Route::resource('customers', CustomerController::class);

# 💳 CREDITS

Route::get('/credits', [CreditController::class, 'index']);
Route::get('/credits/{customer}', [CreditController::class, 'show']);
Route::post('/credits', [CreditController::class, 'store']);
Route::post('/credits/{credit}/pay', [CreditController::class, 'pay']);

# 💸 PAYMENTS (ABONOS)

Route::post('/payments', [PaymentController::class, 'store']);

# 📦 INVENTORY

Route::get('/inventory', [InventoryController::class, 'index']);
Route::post('/inventory/adjust', [InventoryController::class, 'adjust']);
Route::get('/inventory/movements', [InventoryController::class, 'movements']);

# 🚚 SUPPLIERS

Route::resource('suppliers', SupplierController::class);

# 🧾 PURCHASES

Route::get('/purchases', [PurchaseController::class, 'index']);
Route::get('/purchases/create', [PurchaseController::class, 'create']);
Route::post('/purchases', [PurchaseController::class, 'store']);
Route::get('/purchases/{purchase}', [PurchaseController::class, 'show']);

# 💰 CASH

Route::get('/cash', [CashController::class, 'index']);
Route::post('/cash/open', [CashController::class, 'open']);
Route::post('/cash/close', [CashController::class, 'close']);
Route::get('/cash/movements', [CashController::class, 'movements']);
Route::post('/cash/movement', [CashController::class, 'movement']);

# 🧾 INVOICES

Route::get('/invoices/{sale}', [InvoiceController::class, 'show']);
Route::get('/invoices/{sale}/pdf', [InvoiceController::class, 'pdf']);

# 📊 REPORTS

Route::get('/reports/sales', [ReportController::class, 'sales']);
Route::get('/reports/products', [ReportController::class, 'products']);
Route::get('/reports/cash', [ReportController::class, 'cash']);

# 🔐 USERS

Route::resource('users', UserController::class);

# ⚙️ SETTINGS

Route::get('/settings', [SettingController::class, 'index']);
Route::post('/settings', [SettingController::class, 'update']);

# 🔐 HISTORY

Route::get('/history', [HistoryController::class, 'index']);

# 🏠 HOME

Route::get('/', function () {
    return view('welcome');
});