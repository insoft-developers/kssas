<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Saving;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Simpanan;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class WithdrawController extends Controller
{
    public function apiWithdraw() {
        $data = Simpanan::all();
        return Datatables::of($data)
            ->addColumn('status', function($data){
                if($data->status == 1) {
                    return '<center><a class="btn-action bg-red"><i class="fa fa-cart-arrow-down"></i> diajukan</a></center>';
                }
                else if($data->status == 2) {
                    return '<center><a class="btn-action bg-yellow"><i class="fa fa-recycle"></i> diproses</a></center>';
                }
                else if($data->status == 3) {
                    return '<center><a class="btn-action bg-green"><i class="fa fa-check"></i> selesai</a></center>';
                }
            })
            ->addColumn('created_at', function($data){
                return '<div style="text-align:center;">'.date('d-m-Y', strtotime($data->created_at)).'</div>';
            })
            ->addColumn('amount', function($data){
                return '<div style="text-align:right;">'.number_format($data->amount).'</div>';
            })
            ->addColumn('customer_id', function($data){
                $cust = \App\Models\Customer::findorFail($data->customer_id);
                return $cust->nama;
            })
            ->addColumn('type', function($data){
                $prod = \App\Models\Product::findorFail($data->type);
                return $prod->product_name;
            })
            ->addColumn('action', function($data){
                if($data->status == 3) {
                    return '';
                } else if($data->status == 1) {
                    return '<center><a title="Proses Data" onclick="processData('. $data->id.')" style="width:25px;margin-right:5px;" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-repeat"></i></a></center>';
                } else if($data->status == 2) {
                    return '<center><a title="Approve Data" onclick="approveData('. $data->id.')" style="width:25px;margin-right:5px;" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></a>'.
                    '<a title="Tolak Data" onclick="rejectData('. $data->id.')" style="width:25px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a></center>';
                }
                
            })->rawColumns(['action','customer_id','type','amount','created_at','status'])->make(true); 
    }
    
    
    public function index()
    {
        
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->penarikan != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-withdraw';
        $setting = Setting::findorFail(1);
        $customer = Customer::where('is_active', 1)->get();
        $product = Product::where('product_category', 1)->get();
        return view('backend.withdraw', compact('view','setting','customer','product'));
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
        Saving::create($input);

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
        $data = Saving::findorFail($id);
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
        $data = Saving::findorFail($id);
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
        Saving::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    public function withdraw_process(Request $request) {
        $input = $request->all();
       
        $simp = Simpanan::findorFail($input['id']);
        $cust = \App\Models\Customer::findorFail($simp->customer_id);
        $penarikan = $simp->amount;
        $pokok = $cust->simpanan_pokok;
        $wajib = $cust->simpanan_wajib;
        $sukarela = $cust->simpanan_sukarela;
        if($simp->type == 1) {
                if($penarikan > $pokok) {
                    return response()->json([
                        'success'=>false,
                        'message'=> 'Maaf, Simpanan Pokok Tidak Cukup' 
                    ]);
                }
        }
        else if($simp->type == 2) {
                if($penarikan > $wajib) {
                    return response()->json([
                        'success'=>false,
                        'message'=> 'Maaf, Simpanan Wajib Tidak Cukup' 
                    ]);
                }
        }
        else if($simp->type == 3) {
                if($penarikan > $sukarela) {
                    return response()->json([
                        'success'=>false,
                        'message'=> 'Maaf, Simpanan Sukarela Tidak Cukup' 
                    ]);
                }
        }
        
        
        $simp->status = 2;
        $simp->save();
        
        return response()->json([
            'success'=>true,
            'message' => 'Penarikan Berhasil'
        ]);
    }
    
    
    public function withdraw_approve(Request $request) {
        $input = $request->all();
        $simp = Simpanan::findorFail($input['id']);
        
        $cust = \App\Models\Customer::findorFail($simp->customer_id);
        $penarikan = $simp->amount;
        $pokok = $cust->simpanan_pokok;
        $wajib = $cust->simpanan_wajib;
        $sukarela = $cust->simpanan_sukarela;
        if($simp->type == 1) {
                if($penarikan > $pokok) {
                    return response()->json([
                        'success'=>false,
                        'message'=> 'Maaf, Simpanan Pokok Tidak Cukup' 
                    ]);
                }
        }
        else if($simp->type == 2) {
                if($penarikan > $wajib) {
                    return response()->json([
                        'success'=>false,
                        'message'=> 'Maaf, Simpanan Wajib Tidak Cukup' 
                    ]);
                }
        }
        else if($simp->type == 3) {
                if($penarikan > $sukarela) {
                    return response()->json([
                        'success'=>false,
                        'message'=> 'Maaf, Simpanan Sukarela Tidak Cukup' 
                    ]);
                }
        }
        
        
        
        $simp->status = 3;
        $simp->save();
        
        $save = new Saving();
        $save->customer_id = $simp->customer_id;
        $save->product_id = $simp->type;
        $save->amount_in = 0;
        $save->amount_out = $simp->amount;
        $save->description = $simp->reason;
        $save->created_at = $simp->created_at;
        
        $save->save();
        
        return response()->json([
            'success'=>true,
            'message' => 'Penarikan Berhasil Disetujui'
        ]);
    }   
    
    
    public function withdraw_reset(Request $request) {
        $input = $request->all();
        $simp = Simpanan::findorFail($input['id']);
        $simp->status = 1;
        $simp->save();
        
        return response()->json([
            'success'=>true
        ]);
    }
    
}
