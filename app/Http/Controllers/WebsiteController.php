<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class WebsiteController extends Controller
{
   
    public function index()
    {
        $array = DB::select("select * from products");
        $cats = DB::select("select * from category");
        return view('home', compact('array','cats'));
    }

    public function show_cat_by_id($id) 
    {
        $array = DB::select("SELECT * FROM products WHERE cat_id = ? order by `time` DESC limit 6",[$id]);
        $cats = DB::select("select * from category");
        return view('cat', compact('array','cats'));
    }
    public function search(Request $request)
    {
        $searchKey = $request->searchKey;
        $array = Product::where('name', 'like', "%$searchKey%")->get();
        $cats = DB::select("select * from category");
        return view('search', compact('array', 'cats', 'searchKey'));

}
}
