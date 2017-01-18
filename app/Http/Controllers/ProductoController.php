<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productos = Producto::orderBy('id', 'desc')->paginate(10);

		return view('productos.index', compact('productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$producto = new Producto();

		$producto->description = $request->input("description");
        $producto->stock = $request->input("stock");

		$producto->save();

		return redirect()->route('productos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$producto = Producto::findOrFail($id);

		return view('productos.show', compact('producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$producto = Producto::findOrFail($id);

		return view('productos.edit', compact('producto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$producto = Producto::findOrFail($id);

		$producto->description = $request->input("description");
        $producto->stock = $request->input("stock");

		$producto->save();

		return redirect()->route('productos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$producto = Producto::findOrFail($id);
		$producto->delete();

		return redirect()->route('productos.index')->with('message', 'Item deleted successfully.');
	}

}
