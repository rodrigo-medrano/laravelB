<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginas = intval($request->input('paginas',10));
        $search = $request->input('search');
        $products = Product::query()->whereRaw(' LOWER(name) like ?', ['%' . strtolower($search) . '%'])->orWhereRaw('LOWER(description) like ?', ['%' . strtolower($search) . '%'])->paginate($paginas);
        return view('products.index', ['products' => $products]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product= new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        if($request->hasFile('image')){
            $product->image=$request->file('image')->store('products','public');
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->category_id = $request
            ->input('category_id');
        if($request->hasFile('image')){
            if($product->image){
                unlink(public_path('storage/'.$product->image));
            }
            $product->image=$request->file('image')->store('products','public');
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image){
            unlink(public_path('storage/'.$product->image));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }

    public function pdf(){
        $products = Product::all();
        $pdf = Pdf::loadView('products.pdf', compact('products'));
        return $pdf->download('productos.pdf');
    }
    public function excel(){
        return Excel::download(new ProductsExport,'productos.xlsx');
    }
}
