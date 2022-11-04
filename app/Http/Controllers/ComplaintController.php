<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Complaint;
use App\Models\Product;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::query();

        if (!empty($request->color)) {
            $complaints->where('color_id', $request->color);
        }

        if (!empty($request->product)) {
            $complaints->where('product_id', $request->product);
        }

        $complaints = $complaints->paginate(20);

        $colors             = Color::all();
        $products           = Product::all();

        return view('complaints.index', compact('complaints', 'colors', 'products'));
    }
}
