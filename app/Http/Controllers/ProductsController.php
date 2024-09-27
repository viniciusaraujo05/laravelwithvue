<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Repositories\ProductRepository;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class ProductsController extends Controller
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(): \Inertia\Response
    {
        $products = $this->productRepository->all();
        return Inertia::render('Products/index', compact('products'));
    }

    public function store(ProductsRequest $request): RedirectResponse
    {
        $this->productRepository->create($request->validated());

        return redirect()->route('products')->with('status', 'Product created successfully.');
    }

    public function update(ProductsRequest $request, int $id): RedirectResponse
    {
        $this->productRepository->update($id, $request->validated());

        return redirect()->route('products')->with('status', 'Product updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->productRepository->delete($id);

        return redirect()->route('products')->with('status', 'Product deleted successfully.');
    }
}
