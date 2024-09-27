<?php

namespace App\Repositories;

use App\Models\Products;

class ProductRepository
{
    public function all()
    {
        return Products::all();
    }

    public function find(int $id)
    {
        return Products::findOrFail($id);
    }

    public function create(array $data)
    {
        return Products::create($data);
    }

    public function update(int $id, array $data)
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        $product = $this->find($id);
        $product->delete();
    }
}
