<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        return $this->save($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $record
     * @return \Illuminate\Http\Response
     */
    public function edit($record)
    {
        return view('categories.update', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category  $record
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $record)
    {
        return $this->save($request, $record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy($record)
    {
        if ($record->delete()) {
            flash()->success('Category has been deleted successfully!');
        } else {
            flash()->error('Unable to delete category. Please try again later!');
        }

        return redirect(route('categories.index'));
    }

    /**
     * Saves/Updates a category record.
     *
     * @param      \App\Http\Requests\CategoryRequest    $request  The request
     * @param      \App\Category  $model    The model
     *
     * @return     \Illuminate\Http\Response
     */
    private function save($request, $model = null) {

        if (!$model) {
            $model = new Category;
        }

        $model->name = $request->input('name');

        if ($model->save()) {
            flash()->success('Category saved successfully!');

            return redirect(route('categories.index'));
        }

        flash()->error('Unable to save category. Please try again later!');

        return back()->withInputs();
    }
}
