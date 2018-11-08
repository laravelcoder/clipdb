<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandsRequest;
use App\Http\Requests\Admin\UpdateBrandsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class BrandsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('brand_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Brand::query();
            $query->with("clip");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'brands.id',
                'brands.name',
                'brands.image',
                'brands.brand_url',
                'brands.clip_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'brand_';
                $routeKey = 'admin.brands';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('image', function ($row) {
                if($row->image) { return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->image) .'" target="_blank"><img src="'. asset(env('UPLOAD_PATH').'/thumb/' . $row->image) .'"/>'; };
            });
            $table->editColumn('brand_url', function ($row) {
                return $row->brand_url ? $row->brand_url : '';
            });
            $table->editColumn('clip.title', function ($row) {
                return $row->clip ? $row->clip->title : '';
            });

            $table->rawColumns(['actions','massDelete','image']);

            return $table->make(true);
        }

        return view('admin.brands.index');
    }

    /**
     * Show the form for creating new Brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('brand_create')) {
            return abort(401);
        }
        
        $clips = \App\Clip::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.brands.create', compact('clips'));
    }

    /**
     * Store a newly created Brand in storage.
     *
     * @param  \App\Http\Requests\StoreBrandsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandsRequest $request)
    {
        if (! Gate::allows('brand_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $brand = Brand::create($request->all());



        return redirect()->route('admin.brands.index');
    }


    /**
     * Show the form for editing Brand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('brand_edit')) {
            return abort(401);
        }
        
        $clips = \App\Clip::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');

        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('brand', 'clips'));
    }

    /**
     * Update Brand in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandsRequest $request, $id)
    {
        if (! Gate::allows('brand_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());



        return redirect()->route('admin.brands.index');
    }


    /**
     * Display Brand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('brand_view')) {
            return abort(401);
        }
        
        $clips = \App\Clip::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');$clips = \App\Clip::where('brand_id', $id)->get();

        $brand = Brand::findOrFail($id);

        return view('admin.brands.show', compact('brand', 'clips'));
    }


    /**
     * Remove Brand from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index');
    }

    /**
     * Delete all selected Brand at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Brand::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Brand from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->restore();

        return redirect()->route('admin.brands.index');
    }

    /**
     * Permanently delete Brand from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->forceDelete();

        return redirect()->route('admin.brands.index');
    }
}
