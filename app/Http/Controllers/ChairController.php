<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChairController extends Controller
{
    public function select(Request $request)
    {
        $order_id = $request->query('order_id');

        return Inertia::render('Chairs/Select', [
            'order_id' => $order_id,
            'chairs' => Chair::all()
        ]);
    }
}
