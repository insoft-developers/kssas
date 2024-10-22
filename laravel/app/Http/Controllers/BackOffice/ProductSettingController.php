<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ProductSettingController extends Controller
{
    public function apiProset() {
        $data = Product::where('product_category', 2)->get();
        return Datatables::of($data)
            ->addColumn('description', function($data){
                $detail = ProductDetail::where('product_id', $data->id)->get();
                $HTML = '';
                $HTML .= '<table class="table table-bordered table-striped table-cantik">';
                $HTML .= '<tr><th>No</th><th><span id="term_text_'.$data->id.'">Term</span><input placeholder="hanya angka" style="display:none;" type="number" id="term_product_'.$data->id.'" class="form-control"></th><th><span id="rate_text_'.$data->id.'">Rate</span><input placeholder="tanpa tanda persen" style="display:none;" type="number" id="rate_product_'.$data->id.'" class="form-control"></th><th><a id="btn_add_product_item_'.$data->id.'" onclick="add_product_rate('.$data->id.')" class="btn-me bg-green"><i class="fa fa-plus"></i></a><a id="btn_save_product_item_'.$data->id.'" onclick="save_setting('.$data->id.')" style="display:none;" class="btn-me bg-blue"><i class="fa fa-save"></i></a> <a id="btn_cancel_product_item_'.$data->id.'" onclick="cancel_setting('.$data->id.')" style="display:none;" class="btn-me bg-red"><i class="fa fa-remove"></i></a></th></tr>'; 
                $nomor =0;
                foreach($detail as $d) {
                    $nomor++;
                    $HTML .= '<tr><td>'.$nomor.'</td><td>'.$d->product_term.' bulan </td><td>'.$d->product_rate.'%</td><td><a onclick="delete_product_item('.$d->id.')" class="bg-red btn-me"><i class="fa fa-trash"></i></a></td></tr>';
                }
                $HTML .= '</table>';
                
                
                return $HTML;
           })->rawColumns(['description'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->setting_pembiayaan != 1) {
            return Redirect('/backoffice');
        }
        $view = 'backoffice-product-setting';
        $setting = Setting::findorFail(1);
        return view('backend.product_setting', compact('view','setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Benefit::create($input);

        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Benefit::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Benefit::findorFail($id);
        $input = $request->all();
        
        $data->update($input);
        
        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Benefit::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    public function updateProductRate(Request $request) {
        $input = $request->all();
        $data = new ProductDetail;
        $data->product_id = $input['productId'];
        $data->product_term = $input['productTerm'];
        $data->product_rate = $input['productRate'];
        $data->save();
        return response()->json([
            'success'=>true
        ]); 
    }
    
    
    public function deleteProduct(Request $request) {
        $input = $request->all();
        $query = ProductDetail::destroy($input['id']);
        return $query;
    }
}
