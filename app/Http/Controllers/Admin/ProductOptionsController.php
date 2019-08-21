<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductOption;
use Illuminate\Http\Request;

class ProductOptionsController extends Controller
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
            $productoptions = ProductOption::where('product_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('required', 'LIKE', "%$keyword%")
                ->orWhere('can_select_multiple', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productoptions = ProductOption::latest()->paginate($perPage);
        }

        return view('admin.product-options.index', compact('productoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.product-options.create', ['products' => $products]);
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
			'name' => 'required|max:64',
			'required' => 'required',
			'can_select_multiple' => 'required'
		]);
        $requestData = $request->all();

        ProductOption::create($requestData);

        return redirect('admin/product-options')->with('flash_message', 'ProductOption added!');
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
        $productoption = ProductOption::findOrFail($id);

        return view('admin.product-options.show', compact('productoption'));
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
        $productoption = ProductOption::findOrFail($id);
        $products = Product::all();

        return view('admin.product-options.edit', ['productoption' => $productoption, 'products' => $products]);
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
			'name' => 'required|max:64',
			'required' => 'required',
			'can_select_multiple' => 'required'
		]);
        $requestData = $request->all();

        $productoption = ProductOption::findOrFail($id);
        $productoption->update($requestData);

        return redirect('admin/product-options')->with('flash_message', 'ProductOption updated!');
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
        ProductOption::destroy($id);

        return redirect('admin/product-options')->with('flash_message', 'ProductOption deleted!');
    }
}
