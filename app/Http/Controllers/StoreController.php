<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store; 
use Session;
use Validator;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $stores = Store::all();
        return view('store.index')->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'amount' => 'required|max:1000',
            'price' => 'required|max:1000'
        ]);
        // Create Product
        $store = new Store;
        $store->name = $request->name;
        $store->type = $request->type;
        $store->amount = $request->amount;
        $store->price = $request->price;
        $store->save();
        Session::flash('store_create', 'New Product is added');
        return redirect('store/create');

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
        $stores = Store::find($id);
        return view('store.edit')->with('stores', $stores);
   
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|min:1',
            'type' => 'required|max:255|min:1',
            'amount' => 'required|max:1000|min:1',
            'price' => 'required|max:1000|min:1'
        ]);

        if($validator->fails()){
            return redirect('store/' .$store->id. '/edit')
            ->withInput()
            ->withErrors($validator);
        }

        $store = Store::find($id);
        $store->name = $request->Input('name');
        $store->type = $request->Input('type');
        $store->amount = $request->Input('amount');
        $store->price = $request->Input('price');

        $store->save();

        Session::flash('store_update', ' Product is updated');

        return redirect('store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
