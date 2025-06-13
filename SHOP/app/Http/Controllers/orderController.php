<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class orderController extends Controller{
    public function store(Request $request){
        try {
            $validatedData = $request->validate([
                'productCode' => 'required|string',
                'quantity' => 'required|integer|min:1',
            ]);
    
            // Process the checkout logic here
            return response()->json(['message' => 'Checkout successful']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}