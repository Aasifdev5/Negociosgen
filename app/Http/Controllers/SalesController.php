<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function getSalesDetails($id)
    {

        try {
            // Fetch sales details with user data
            $sales = Sales::where('refer_id', $id)->with('user') // Load related user data (name)
                ->get(); // Include necessary fields only

            return response()->json($sales);
        } catch (\Exception $e) {
            \Log::error('Error fetching sales details for ID ' . $id . ': ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching sales details'], 500);
        }
    }
}
