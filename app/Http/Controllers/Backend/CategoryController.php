<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categorires = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.product_category.index', compact('categorires'));
    }

    public function create()
    {
        return view('backend.pages.product_category.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50|unique:categories',

            ]);

            if ($validator->fails()) {
                throw new Exception('Validation failed'); // Throw an exception to trigger the catch block
            }


            Category::create([
                'name' => $request->input('name'),
            ]);
            return redirect()->route('category.index')->with('success', 'Category created successfully.');

        } catch (Exception $e) {

            return redirect()
            ->route('category.create')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Category creation failed. ' . $e->getMessage());


        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.pages.product_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {


            $category = Category::findOrFail($id);

            if ($category->name == $request->input('name')) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50',

                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:50|unique:categories',

                ]);
            }

            if ($validator->fails()) {
                throw new Exception('Validation failed'); // Throw an exception to trigger the catch block
            }
            $category->update([
                'name' => $request->input('name'),
            ]);
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');

        } catch (Exception $e) {
            return redirect()
            ->route('category.edit', $id)
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Category update failed. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');

        } catch (Exception $e) {
            return redirect()->route('category.index')->with('error', 'Category deleted failed.');
        }
    }
}
