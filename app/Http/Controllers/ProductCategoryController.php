<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;

class ProductCategoryController extends Controller
{
    public function index() : JsonResponse
    {
        $productCategory = [];
        $productArray = [];
        $productCategories = ProductCategory::where('active', 1)->get();
        $products = Product::where('active', 1)->get();

        foreach ($productCategories as $key => $value) {
            array_push($productCategory, [$value->name => []]);
            
            foreach ($products as $prod) {
                if ($value->id === $prod->product_category_id) {
                    array_push($productCategory[$key][$value->name], $prod->toArray());
                }
            }

        }

        return response()->json(['data' => $productCategory]);
    }
}
