<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChairController extends Controller
{
    public function index()
    {
        return Inertia::render('Chairs/Index', ['chairs' => Chair::all()]);
    }

    public function select(Request $request)
    {
        $order_id = $request->query('order_id');
        $coupons_count = Coupon::where('order_id', $order_id)->count();

        return Inertia::render('Chairs/Select', [
            'orderId' => intval($order_id),
            'couponsCount' => $coupons_count,
            'chairs' => Chair::all()
        ]);
    }

    public function occupy(Request $request)
    {
        $order_id = $request->query('order_id');
        $selected_chairs = $request->input('selectedChairs');

        Chair::whereIn('id', $selected_chairs)->update(['order_id' => $order_id]);

        return redirect(route('dashboard'))
            ->with('notice', 'Compra registrada exitosamente.');
    }
}
