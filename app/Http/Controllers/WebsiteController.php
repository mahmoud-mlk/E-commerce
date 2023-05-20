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
        return view('home', compact('array'));
    }

    public function show_cat_by_id($id)
    {
        $array = DB::select("SELECT * FROM products WHERE cat_id = ? order by `created_at` DESC limit 6",[$id]);

        return view('cat', compact('array'));
    }
    public function search(Request $request)
    {
        $searchKey = $request->searchKey;
        $array = Product::where('name', 'like', "%$searchKey%")->get();
        return view('search', compact('array', 'searchKey'));

}
}
