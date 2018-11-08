<?php

namespace App\Http\Controllers\Api\V1;

use App\Ftp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFtpsRequest;
use App\Http\Requests\Admin\UpdateFtpsRequest;
use Yajra\DataTables\DataTables;

class FtpsController extends Controller
{
    public function index()
    {
        return Ftp::all();
    }

    public function show($id)
    {
        return Ftp::findOrFail($id);
    }

    public function update(UpdateFtpsRequest $request, $id)
    {
        $ftp = Ftp::findOrFail($id);
        $ftp->update($request->all());
        

        return $ftp;
    }

    public function store(StoreFtpsRequest $request)
    {
        $ftp = Ftp::create($request->all());
        

        return $ftp;
    }

    public function destroy($id)
    {
        $ftp = Ftp::findOrFail($id);
        $ftp->delete();
        return '';
    }
}
