<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Setting;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index() {
        
        $view = 'dashboard';
        $product = \App\Models\Product::all();
        $slider = \App\Models\Slider::where('is_active', 1)->get(); 
        $topik = \App\Models\MainTopic::findorFail(1);
        $benefit = \App\Models\Benefit::all();
        $about = \App\Models\About::findorFail(1);
        $video = \App\Models\Video::where('is_active', 1)->where('is_home', 1)->take(3)->get();
        $staff = \App\Models\Staff::all();
        $partner = \App\Models\Partner::all();
        $setting = Setting::findorFail(1);
        return view('frontend.dashboard', compact('view', 'product', 'slider', 'topik', 'benefit', 'about', 'video', 'staff', 'partner','setting'));   
    }
    
    public function about() {
        $view = 'about';
        $setting = Setting::findorFail(1);
        $about = \App\Models\About::findorFail(1);
        $video = \App\Models\Video::where('is_active', 1)->where('is_home', 1)->take(3)->get();
        $staff = \App\Models\Staff::all();
        $partner = \App\Models\Partner::all();
        return view('frontend.about', compact('view', 'setting', 'about', 'video', 'staff', 'partner'));
    }
    
    public function rat() {
        $view = 'rat';
        $setting = Setting::findorFail(1);
        $rat = \App\Models\Rat::all();
        $gal = \App\Models\RatGallery::all();
        return view('frontend.rat', compact('view','setting','rat','gal'));
    }
    
    public function legal() {
        $view = 'legal';
        $setting = Setting::findorFail(1);
        $legal = \App\Models\Legal::all();
        $faq = \App\Models\LegalFaq::all();
        return view('frontend.legal', compact('view','setting','legal','faq'));
    }
    
    public function term() {
        $setting = Setting::findorFail(1);
        $view = 'term';
        return view('frontend.term', compact('view','setting'));
    }
    
    public function privacy() {
        $setting = Setting::findorFail(1);
        $view = 'privacy';
        return view('frontend.privacy', compact('view','setting'));
    }
    
    
    public function riba() {
        $setting = Setting::findorFail(1);
        $view = 'riba';
        return view('frontend.riba', compact('view','setting'));
    } 
    
    public function berita() {
        $setting = Setting::findorFail(1);
        $view = 'berita';
        $berita = \App\Models\Berita::all();
        $popular = \App\Models\Berita::where('is_popular', 1)->get();
        return view('frontend.berita', compact('view','setting','berita','popular'));
    }
    
    public function detail($tag) {
        $setting = Setting::findorFail(1);
        $view = 'berita-detail';
        $berita = \App\Models\Berita::where('tag', $tag)->first();
        return view('frontend.detail', compact('view','setting','berita'));
    }
    
    public function faq() {
        $view = 'faq';
        $faq = \App\Models\Faq::all();
        $setting = Setting::findorFail(1);
        return view('frontend.faq',compact('view','setting','faq'));
    }
    
    public function contact() {
        $setting = Setting::findorFail(1);
        $view = 'contact';
        return view('frontend.contact', compact('view','setting'));
    }
    
    public function product() {
        $view = 'product';
        $simpanan = \App\Models\Product::where('product_category', 1)->get();
        $pembiayaan = \App\Models\Product::where('product_category', 2)->get();
        $setting = Setting::findorFail(1);
        return view('frontend.product', compact('simpanan', 'pembiayaan', 'view','setting'));    
    }
    
    
    public function kalkulator() {
        $view = 'kalkulator';
        $setting = Setting::findorFail(1);
        $product = \App\Models\Product::where('product_category', 2)->get();
        $periode = \App\Models\Periode::all();
        return view('frontend.kalkulator', compact('product', 'view', 'periode','setting'));
    }
    
    
    public function simulation(Request $request) {
        $input = $request->all();
        
        
        $product = ProductDetail::where('product_id', $input['product'])
            ->where('product_term', $input['lama'])
            ->first();
        
        $rate = $product->product_rate;
        $total_rate = $rate * $input['lama'];
        $rate_price = $total_rate * $input['harga'] / 100;
        $total_price = $input['harga'] + $rate_price;
        $pay_price = $total_price - $input['dp'];
        $pay_amount = $pay_price / $input['lama'];
        
        
        $alt_product = ProductDetail::where('product_id', $input['product'])->get();
        
        $rows = [];
        foreach($alt_product as $key) {
            
            $rate_ = $key->product_rate;
            $total_rate_ = $rate_ * $key->product_term;
            $rate_price_ = $total_rate_ * $input['harga'] / 100;
            $total_price_ = $input['harga'] + $rate_price_;
            $pay_price_ = $total_price_ - $input['dp'];
            $pay_amount_ = $pay_price_ / $key->product_term;
            
            $row['lama'] = $key->product_term.' Bulan';
            $row['angsuran'] = 'Rp. '.number_format($pay_amount_);
            $row['harga_jual'] = 'Rp. '.number_format($total_price_);
            
            array_push($rows, $row);
        }
        
        
        return response()->json([
           "product" => $input['product'],    
           "harga" => "Rp. ".number_format($input['harga']),
           "dp" => "Rp. ".number_format($input['dp']),
           "selling_price" => "Rp. ".number_format($total_price),
           "pay_price" => "Rp. ".number_format($pay_price),
           "pay_amount" => "Rp. ".number_format($pay_amount),
           "lama" => $input['lama'],
           "data" => $rows
        ]);
    }
    
    public function video_list() {
        $setting = Setting::findorFail(1);
        $view = 'video';
        $video = \App\Models\Video::where('is_active', 1)->get();
        return view('frontend.videolist', compact('view', 'video','setting'));
    }
    
    public function send_contact(Request $request) {
        $setting = Setting::findorFail(1);
        $input = $request->all();
        $details = [
            'title' => $input['subject'],
            'body' => 'Nama Saya: '.$input['name'].' email Saya: '.$input['email']. ' Pesan Saya : '.$input['message'],
            'pengirim' => $input['email']
        ];
    
        \Mail::to($setting->email)->send(new ContactMail($details));
        return response()->json(true);
    }
}
