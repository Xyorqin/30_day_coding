<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\WarehouseProduct;
use App\Http\Requests\StoreWarehouseProductRequest;
use App\Http\Requests\UpdateWarehouseProductRequest;

class WarehouseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWarehouseProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarehouseProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseProduct  $warehouseProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseProduct $warehouseProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseProduct  $warehouseProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseProduct $warehouseProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWarehouseProductRequest  $request
     * @param  \App\Models\WarehouseProduct  $warehouseProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWarehouseProductRequest $request, WarehouseProduct $warehouseProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseProduct  $warehouseProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseProduct $warehouseProduct)
    {
        //
    }
}
