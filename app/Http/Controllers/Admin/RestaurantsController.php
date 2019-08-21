<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantsController extends Controller
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
            $restaurants = Restaurant::where('id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $restaurants = Restaurant::latest()->paginate($perPage);
        }

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.restaurants.create');
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
			'name' => 'required|max:64'
		]);
        $requestData = $request->all();

        Restaurant::create($requestData);

        return redirect('admin/restaurants')->with('flash_message', 'Restaurant added!');
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
        $restaurant = Restaurant::findOrFail($id);

        return view('admin.restaurants.show', compact('restaurant'));
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
        $restaurant = Restaurant::findOrFail($id);

        return view('admin.restaurants.edit', compact('restaurant'));
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
			'name' => 'required|max:64'
		]);
        $requestData = $request->all();

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($requestData);

        return redirect('admin/restaurants')->with('flash_message', 'Restaurant updated!');
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
        Restaurant::destroy($id);

        return redirect('admin/restaurants')->with('flash_message', 'Restaurant deleted!');
    }
}
