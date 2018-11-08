<?php

namespace App\Http\Controllers\Api\V1;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandsRequest;
use App\Http\Requests\Admin\UpdateBrandsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class BrandsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Brand::all();
    }

    public function show($id)
    {
        return Brand::findOrFail($id);
    }

    public function update(UpdateBrandsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        

        return $brand;
    }

    public function store(StoreBrandsRequest $request)
    {
        $request = $this->saveFiles($request);
        $brand = Brand::create($request->all());
        

        return $brand;
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return '';
    }
}
