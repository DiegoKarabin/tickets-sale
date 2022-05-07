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
            'orderId' => intval($order_id),
            'chairs' => Chair::all()
        ]);
    }

    public function occupy(Request $request)
    {
        $order_id = $request->query('order_id');
        $selected_chairs = $request->input('selectedChairs');

        Chair::whereIn('id', $selected_chairs)->update(['order_id' => $order_id]);
    }
}
