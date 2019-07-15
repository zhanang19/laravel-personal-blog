<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        } else {
            $slug = \Str::slug(strtolower($request->name), '-');
            $result = Category::create([
                'slug' => $slug,
                'name' => $request->name,
            ]);
            if ($result) {
                return response()->json([
                    'status' => true,
                    'message' => 'Success',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed.',
                ], 500);
            }
        }
    }
}
