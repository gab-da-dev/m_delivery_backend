<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductIngredient;
use Illuminate\Http\JsonResponse;

class ProductIngredientController extends Controller
{
    public function index() : JsonResponse
    {
        $productIngredients = ProductIngredient::where('active', 1)->get();

        return response()->json(['data' => $productIngredients]);
    }
}
