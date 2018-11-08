<?php

namespace App\Http\Controllers\Api\V1;

use App\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIndustriesRequest;
use App\Http\Requests\Admin\UpdateIndustriesRequest;
use Yajra\DataTables\DataTables;

class IndustriesController extends Controller
{
    public function index()
    {
        return Industry::all();
    }

    public function show($id)
    {
        return Industry::findOrFail($id);
    }

    public function update(UpdateIndustriesRequest $request, $id)
    {
        $industry = Industry::findOrFail($id);
        $industry->update($request->all());
        

        return $industry;
    }

    public function store(StoreIndustriesRequest $request)
    {
        $industry = Industry::create($request->all());
        

        return $industry;
    }

    public function destroy($id)
    {
        $industry = Industry::findOrFail($id);
        $industry->delete();
        return '';
    }
}
