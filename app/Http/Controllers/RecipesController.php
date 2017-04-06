<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index() {
        return response()->json(Recipe::limit(9)->get());
    }

    public function show($id) {
        $recipe = Recipe::find($id);
        if(count($recipe) > 0) {
            return response()->json($recipe);
        }
        return response()->json(['error' => 'Recipe not found.'], 404);
    }

    public function search(Request $request, $query) {
        $recipes = Recipe::where('name', 'like', '%' . $query . '%')->get();
        if(count($recipes) > 0) {
            return response()->json($recipes);
        }
        return response()->json(['error' => 'No recipes found for this query.'], 404);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'img' => 'required',
            'ingredients' => 'required|array|min:1',
            'ingredients.*.name' => 'required',
            'ingredients.*.qty' => 'required',
            'ingredients.*.unit' => 'required',
            'steps' => 'required|array|min:1'
        ]);

        $recipe = Recipe::create($request->all());
        
        return response()->json($recipe);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'img' => 'required',
            'ingredients' => 'required|array|min:1',
            'ingredients.*.name' => 'required',
            'ingredients.*.qty' => 'required',
            'ingredients.*.unit' => 'required',
            'steps' => 'required|array|min:1'
        ]);
        
        $recipe = Recipe::find($id);
        $recipe->update($request->all());

        return response()->json($recipe);
    }

    public function destroy($id) {
        try {
            Recipe::destroy($id);

            return response([], 204);
        } catch (\Exception $e) {
            return response(['Problem deleting the recipe'], 500);
        }
    }
}
