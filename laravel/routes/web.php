<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;

use App\Http\Controllers\BackOffice\HomeController;
use App\Http\Controllers\BackOffice\SliderController;
use App\Http\Controllers\BackOffice\MainTopicController;
use App\Http\Controllers\BackOffice\BenefitController;
use App\Http\Controllers\BackOffice\AboutController;
use App\Http\Controllers\BackOffice\VideoController;
use App\Http\Controllers\BackOffice\ProductController;
use App\Http\Controllers\BackOffice\StaffController;
use App\Http\Controllers\BackOffice\MitraController;
use App\Http\Controllers\BackOffice\RapatController;
use App\Http\Controllers\BackOffice\GaleryController;
use App\Http\Controllers\BackOffice\DocumentController;
use App\Http\Controllers\BackOffice\LegalFaqController;
use App\Http\Controllers\BackOffice\BeritaController;
use App\Http\Controllers\BackOffice\FaqController;
use App\Http\Controllers\BackOffice\SettingController;
use App\Http\Controllers\BackOffice\ProductSettingController;
use App\Http\Controllers\BackOffice\MembershipController;
use App\Http\Controllers\BackOffice\SavingController;
use App\Http\Controllers\BackOffice\WithdrawController;
use App\Http\Controllers\BackOffice\FinancingController;
use App\Http\Controllers\BackOffice\UserController;
use App\Http\Controllers\BackOffice\LoginController;
use App\Http\Controllers\BackOffice\LevelController;


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

// ROUTE FOR BACKEND
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('upload_anggota', [MembershipController::class, 'uploadAnggota']);
    Route::post('import_data_anggota', [MembershipController::class, 'importDataAnggota'])->name('import.anggota');
    Route::get('upload_simpanan', [SavingController::class, 'uploadSimpanan']);
    Route::post('import_data_simpanan', [SavingController::class, 'importDataSimpanan'])->name('import.simpanan');
    Route::get('upload_financing', [FinancingController::class, 'uploadFinancing']);
    Route::post('import_data_financing', [FinancingController::class, 'importDataFinancing'])->name('import.financing');
    
    
    Route::get('/backoffice/', [HomeController::class, 'index']);
    Route::resource('slider', SliderController::class);
    Route::get('api_slider', [SliderController::class, 'apiSlider'])->name('api.slider');
    Route::resource('topic', MainTopicController::class);
    Route::resource('benefit', BenefitController::class);
    Route::resource('backabout', AboutController::class);
    Route::get('api_benefit', [BenefitController::class, 'apiBenefit'])->name('api.benefit');
    
    Route::resource('video', VideoController::class);
    Route::get('api_video', [VideoController::class, 'apiVideo'])->name('api.video');
    
    Route::resource('produk', ProductController::class);
    Route::get('api_produk', [ProductController::class, 'apiProduk'])->name('api.produk');
    
    Route::resource('staff', StaffController::class);
    Route::get('api_staff', [StaffController::class, 'apiStaff'])->name('api.staff');
    
    Route::resource('mitra', MitraController::class);
    Route::get('api_mitra', [MitraController::class, 'apiMitra'])->name('api.mitra');
    
    Route::resource('level', LevelController::class);
    Route::get('api_level', [LevelController::class, 'apiLevel'])->name('api.level');
    Route::get('get_access_setting/{id}', [LevelController::class, 'settingAkses']);
    Route::post('save_access', [LevelController::class, 'saveAccess']);
    Route::get('set_access_value/{id}', [LevelController::class, 'setAcessValue']);
    
    Route::resource('rapat', RapatController::class);
    Route::get('api_rapat', [RapatController::class, 'apiRapat'])->name('api.rapat');
    
    Route::resource('galery', GaleryController::class);
    Route::get('api_galery', [GaleryController::class, 'apiGalery'])->name('api.galery');
    
    Route::resource('document', DocumentController::class);
    Route::get('api_document', [DocumentController::class, 'apiDocument'])->name('api.document');
    
    Route::resource('legalfaq', LegalFaqController::class);
    Route::get('api_legalfaq', [LegalFaqController::class, 'apiLegalFaq'])->name('api.legalfaq');
    
    Route::resource('news', BeritaController::class);
    Route::get('api_berita', [BeritaController::class, 'apiBerita'])->name('api.berita');
    
    Route::resource('faqs', FaqController::class);
    Route::get('api_faq', [FaqController::class, 'apiFaq'])->name('api.faq');
    
    Route::resource('product_setting', ProductSettingController::class);
    Route::get('api_proset', [ProductSettingController::class, 'apiProset'])->name('api.proset');
    
    Route::resource('setting', SettingController::class);
    
    Route::post('update_rate', [ProductSettingController::class, 'updateProductRate']);
    Route::post('delete_product_item', [ProductSettingController::class, 'deleteProduct']);
    
    Route::resource('membership', MembershipController::class);
    Route::get('api_membership', [MembershipController::class, 'apiMembership'])->name('api.membership');
    
    Route::post('form_upload_delete', [MembershipController::class, 'form_upload_delete'])->name('form.upload.delete');
    Route::post('form_upload_update', [MembershipController::class, 'form_upload_update'])->name('form.upload.update');
    Route::post('upload_form_download', [MembershipController::class, 'upload_form_download'])->name('upload.form.download');
    Route::get('register_user_download', [MembershipController::class, 'register_user_download']);
    Route::get('register_user_upload', [MembershipController::class, 'register_user_upload']);
    
    Route::post('register_activate', [MembershipController::class, 'registerActivate']);
    Route::post('register_unactivate', [MembershipController::class, 'registerUnactivate']);
    
    Route::resource('saving', SavingController::class);
    Route::get('api_saving', [SavingController::class, 'apiSaving'])->name('api.saving');
    Route::post('saving_approve', [SavingController::class, 'saving_approve']);
    
    Route::resource('withdraw', WithdrawController::class);
    Route::get('api_withdraw', [WithdrawController::class, 'apiWithdraw'])->name('api.withdraw');
    
    Route::resource('financing', FinancingController::class);
    Route::get('api_financing', [FinancingController::class, 'apiFinancing'])->name('api.financing');
    Route::get('count_age/{id}', [FinancingController::class, 'countAge']);
    
    
    Route::resource('user', UserController::class);
    Route::get('api_user', [UserController::class, 'apiUser'])->name('api.user');
    
    
    Route::post('withdraw_process', [WithdrawController::class, 'withdraw_process']);
    Route::post('withdraw_approve', [WithdrawController::class, 'withdraw_approve']);
    
    Route::post('withdraw_reset', [WithdrawController::class, 'withdraw_reset']);
    Route::post('loan_process', [FinancingController::class, 'loanProcess']);
    Route::post('loan_reset', [FinancingController::class, 'loanReset']);
    Route::post('loan_approve', [FinancingController::class, 'loanApprove']);
    Route::get('payment_show/{id}', [FinancingController::class, 'paymentShow']);
    Route::post('bayar_cicilan', [FinancingController::class, 'bayarCicilan']);
    Route::get('profile', [UserController::class, 'myProfile']);
    
    Route::post('update_profile', [UserController::class, 'updateProfile']);
    
    
    
});    


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('process_login', [LoginController::class, 'processLogin'])->name('process.login');

Route::get('exit', [LoginController::class, 'logout']);


// ROUTE FOR FRONTEND

Route::get('/', [DashboardController::class, 'index']);
Route::get('/about', [DashboardController::class, 'about']);
Route::get('/rat', [DashboardController::class, 'rat']);
Route::get('/legal', [DashboardController::class, 'legal']);
Route::get('/term', [DashboardController::class, 'term']);
Route::get('/privacy', [DashboardController::class, 'privacy']);
Route::get('/ribadansolusinya', [DashboardController::class, 'riba']);
Route::get('/berita', [DashboardController::class, 'berita']);
Route::get('/berita-detail/{tag}', [DashboardController::class, 'detail']);
Route::get('/faq', [DashboardController::class, 'faq']);
Route::get('/contact', [DashboardController::class, 'contact']);
Route::get('/product', [DashboardController::class, 'product']);
Route::get('/kalkulator', [DashboardController::class, 'kalkulator']);
Route::get('/videolist', [DashboardController::class, 'video_list']);
Route::post('/simulation_process', [DashboardController::class, 'simulation']);
Route::get('/daftar', [CustomerController::class, 'daftar']);
Route::post('/register', [CustomerController::class, 'register']);
Route::post('/frontend-login', [CustomerController::class, 'login'])->name('frontend.login');
Route::get('/frontend_upload_anggota', [CustomerController::class, 'upload_anggota_baru']);

Route::post('/upload_pendaftaran', [CustomerController::class, 'upload_pendaftaran'])->name('upload.pendaftaran');

Route::get('/periode_by_product/{id}', [CustomerController::class, 'periode_by_product']);

Route::post('/update_profile_image', [CustomerController::class, 'update_profile_image']);
Route::get('/profil', [CustomerController::class, 'profil']);
Route::get('/logout', [CustomerController::class, 'logout']);
Route::get('/change_password', [CustomerController::class, 'change_password']);
Route::post('/update_password', [CustomerController::class, 'update_password']);
Route::get('/keanggotaan', [CustomerController::class, 'keanggotaan']);
Route::get('/table_pembayaran', [CustomerController::class, 'table_pembayaran'])->name('table.pembayaran');
Route::post('/payment_with_type', [CustomerController::class, 'payment_with_type'])->name('payment.with.type');
Route::post('pembayaran_delete', [CustomerController::class, 'pembayaran_delete']);
Route::get('/table_simpanan', [CustomerController::class, 'table_simpanan'])->name('table.simpanan');
Route::post('/tambah_penarikan', [CustomerController::class, 'tambah_penarikan'])->name('tambah.penarikan.simpanan');
Route::post('/tambah_pembuatan', [CustomerController::class, 'tambah_pembuatan'])->name('tambah.pembuatan.simpanan');
Route::get('/table_pinjaman', [CustomerController::class, 'table_pinjaman'])->name('table.pinjaman');
Route::post('/kalkulasi_pinjaman', [CustomerController::class, 'kalkulasi_pinjaman']);
Route::get('/get_transaction_list/{id}', [CustomerController::class, 'get_transaction_list']);
Route::post('/submit_pinjaman', [CustomerController::class, 'submit_pinjaman']);
Route::get('/pinjaman_edit/{id}', [CustomerController::class, 'pinjaman_edit']);
Route::post('/update_pinjaman', [CustomerController::class, 'update_pinjaman']);
Route::post('/delete_pinjaman', [CustomerController::class, 'delete_pinjaman']);
Route::get('/lihat_pinjaman/{id}', [CustomerController::class, 'lihat_pinjaman']);

Route::get('/table_saldo_pinjaman', [CustomerController::class, 'table_saldo_pinjaman'])->name('table.saldo.pinjaman');
Route::get('/cek_saldo_pinjaman/{id}', [CustomerController::class, 'cek_saldo_pinjaman']);
Route::post('/send_contact', [DashboardController::class, 'send_contact']);
Route::get('/lupa_password', [CustomerController::class, 'lupaPassword']);
Route::post('/reset_password', [CustomerController::class, 'resetPassword']);

// END ROUTE FOR FRONTEND

Route::get('check', function(){
    return public_path();
});


