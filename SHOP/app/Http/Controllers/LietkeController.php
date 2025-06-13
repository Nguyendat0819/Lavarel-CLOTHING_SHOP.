<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product; // Import the Product model



class LietkeController extends Controller
{
    public function listProducts(Request $request, $type = null)
    {
        $itemPerPage = $request->input('per_page', 15);

        $query = DB::table('products');
        if (!empty($type)) {
            $query->where('type', $type);
        }

        $products = $query->paginate($itemPerPage);

        return view('lietke', compact('products', 'type'));
    }
}   