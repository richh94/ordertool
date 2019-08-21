<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Meal;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $meals = Meal::where('restaurant_id', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('is_open', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $meals = Meal::latest()->paginate($perPage);
        }

        return view('admin.meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'restaurant_id' => 'required',
			'date' => 'required',
			'is_open' => 'required'
		]);
        $requestData = $request->all();

        Meal::create($requestData);

        return redirect('admin/meals')->with('flash_message', 'Meal added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $meal = Meal::findOrFail($id);

        return view('admin.meals.show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $meal = Meal::findOrFail($id);

        return view('admin.meals.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'restaurant_id' => 'required',
			'date' => 'required',
			'is_open' => 'required'
		]);
        $requestData = $request->all();

        $meal = Meal::findOrFail($id);
        $meal->update($requestData);

        return redirect('admin/meals')->with('flash_message', 'Meal updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Meal::destroy($id);

        return redirect('admin/meals')->with('flash_message', 'Meal deleted!');
    }
}
