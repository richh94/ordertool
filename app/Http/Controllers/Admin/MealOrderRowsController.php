<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MealOrderRow;
use Illuminate\Http\Request;

class MealOrderRowsController extends Controller
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
            $mealorderrows = MealOrderRow::where('product_id', 'LIKE', "%$keyword%")
                ->orWhere('meal_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mealorderrows = MealOrderRow::latest()->paginate($perPage);
        }

        return view('admin.meal-order-rows.index', compact('mealorderrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.meal-order-rows.create');
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
			'product_id' => 'required',
			'meal_id' => 'required',
			'user_id' => 'required'
		]);
        $requestData = $request->all();

        MealOrderRow::create($requestData);

        return redirect('admin/meal-order-rows')->with('flash_message', 'MealOrderRow added!');
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
        $mealorderrow = MealOrderRow::findOrFail($id);

        return view('admin.meal-order-rows.show', compact('mealorderrow'));
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
        $mealorderrow = MealOrderRow::findOrFail($id);

        return view('admin.meal-order-rows.edit', compact('mealorderrow'));
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
			'product_id' => 'required',
			'meal_id' => 'required',
			'user_id' => 'required'
		]);
        $requestData = $request->all();

        $mealorderrow = MealOrderRow::findOrFail($id);
        $mealorderrow->update($requestData);

        return redirect('admin/meal-order-rows')->with('flash_message', 'MealOrderRow updated!');
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
        MealOrderRow::destroy($id);

        return redirect('admin/meal-order-rows')->with('flash_message', 'MealOrderRow deleted!');
    }
}
