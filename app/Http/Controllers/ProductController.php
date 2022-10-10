<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // First
        $data = DB::select('SELECT * FROM products');
            // for($i=0; $i<count($data);$i++){
            //     echo "[$i] => Name :".$data[$i]->name .':: Price :'.$data[$i]->price .'<br>';
            // }
        foreach($data as $product){
            echo "Name :".$product->name ." :: Price :".$product->price.'<br>';
        }


        // Second
            // $data = DB::table('products')->get(['*']);
            // // $data = DB::table('products')->select(['*'])->get([]);
            // foreach($data as $product){
            //         echo "Name :".$product->name ." :: Price :".$product->price.'<br>';
            //     }


         // Third
        //  $data = Product::all(['*']);
        //  $data = Product::withoutTrashed()->get();
        //  foreach($data as $product){
        //         echo "Name :".$product->name ." :: Price :".$product->price.'<br>';
        //     }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // First : Native SQl
    //    $isSaved = DB::insert('INSERT INTO products(name,price) VALUES (?,?)',['chips','22']);
    //    $isSaved = DB::insert('INSERT INTO products(name,price,created_at,updated_at) VALUES (?,?,?,?)',['Tea','43',now(),now()]);
    //    echo $isSaved ? 'Saved Successfully' : 'Save fails';


    // Second : Query Builder
    //    $isSaved2 =  DB::table('products')->insert([
    //         'name' => 'chocolate',
    //         'price' => 15,
    //         'created_at' =>now(),
    //         'updated_At' => now(),
    //    ]);
    //    echo $isSaved ? 'Saved Successfully2' : 'Save fails2';

    // Thrid : Eloquent
        $product = new Product();
        $product->name = 'Cafe';
        $product->price = 4;
        $isSaved = $product->save();
        echo $isSaved ? "Saved Successfully Id : $product->id" : 'Save fails';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $p)
    {
        // ---------------Select-----------------
        //first
        // $item = DB::selectOne('SELECT * FROM products WHERE  id=?',[$id]);
        // echo "Name :$item->name";

        //Second
        // $item = DB::table('products')->where('id','=',$id)->first(['*']);
        // $item = DB::table('products')->find($id);
        // echo "Name :$item->name";

        //Third
        // $item = Product::where('id','=',$id)->first();
        // $item = Product::find($product->id);
        $item = Product::find($p->id);
        echo "Name :$item->name";

       // ---------------Delete-----------------
        // First
        // $countOfDeletesRow = DB::delete('DELETE FROM products WHERE id=?',[$id]);
        // echo $countOfDeletesRow == 1 ? 'Deleted Successfully':'Deleted Failed';

        // Second
        // $countOfDeletesRow = DB::table('products')->where('id','=',$id)->delete();
        // $countOfDeletesRow = DB::table('products')->delete($id);
        // echo $countOfDeletesRow == 1 ? 'Deleted Successfully':'Deleted Failed';

        // Third
        // Force Delete
        // $product = Product::findOrFail($id);
        // $deleted = $product->delete();
        // echo $deleted ?"Deleted Successfully":"Deleted Failed";

        // $countOfDeletesRow = Product::destroy([$id]);
        // echo $countOfDeletesRow == 1 ? 'Deleted Successfully':'Deleted Failed';

        //Soft Delete
        // $product = Product::findOrFail($id);
        // $deleted = $product->delete();
        // echo $deleted ?"Deleted Successfully":"Deleted Failed";

        // $product = Product::onlyTrashed()->findOrFail($id);
        // $restored = $product->restore();
        // echo $restored ?"Deleted Successfully":"Deleted Failed";

        // $product = Product::findOrFail($id);
        // $restored = $product->forceDelete();
        // echo $restored ?"Deleted Successfully":"Deleted Failed";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // First : Native SQL
        // $countOfUpdatesRow = DB::update('UPDATE products SET name=? WHERE id=? ',['New name updated',$id]);
        // echo $countOfUpdatesRow == 1 ? "Updated Successfully" : "Faild update";

        //Second : Query Builder
    //     $countOfUpdatesRow = DB::table('products')->where('id','=',$id)
    //     ->update([
    //         'name' => 'New Name Q builder',
    //         'price' => 55
    //     ]);
    //    echo $countOfUpdatesRow == 1 ? "Updated Successfully" : "Faild update";

    //Thrid : Eloquent
          $product = Product::findOrFail($id);
          $product->name = 'Updated Name EQ';
          $isSaved = $product->save( );
            echo $isSaved ? "Updated Successfully -> ID $product->id":"Updated Failed";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
