<?php

namespace App\Http\Controllers\Admin;

use App\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIndustriesRequest;
use App\Http\Requests\Admin\UpdateIndustriesRequest;
use Yajra\DataTables\DataTables;

class IndustriesController extends Controller
{
    /**
     * Display a listing of Industry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('industry_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Industry::query();
            $query->with("clip");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('industry_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'industries.id',
                'industries.name',
                'industries.slug',
                'industries.clip_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'industry_';
                $routeKey = 'admin.industries';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('clip.title', function ($row) {
                return $row->clip ? $row->clip->title : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.industries.index');
    }

    /**
     * Show the form for creating new Industry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('industry_create')) {
            return abort(401);
        }
        
        $clips = \App\Clip::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.industries.create', compact('clips'));
    }

    /**
     * Store a newly created Industry in storage.
     *
     * @param  \App\Http\Requests\StoreIndustriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndustriesRequest $request)
    {
        if (! Gate::allows('industry_create')) {
            return abort(401);
        }
        $industry = Industry::create($request->all());



        return redirect()->route('admin.industries.index');
    }


    /**
     * Show the form for editing Industry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('industry_edit')) {
            return abort(401);
        }
        
        $clips = \App\Clip::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');

        $industry = Industry::findOrFail($id);

        return view('admin.industries.edit', compact('industry', 'clips'));
    }

    /**
     * Update Industry in storage.
     *
     * @param  \App\Http\Requests\UpdateIndustriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndustriesRequest $request, $id)
    {
        if (! Gate::allows('industry_edit')) {
            return abort(401);
        }
        $industry = Industry::findOrFail($id);
        $industry->update($request->all());



        return redirect()->route('admin.industries.index');
    }


    /**
     * Display Industry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('industry_view')) {
            return abort(401);
        }
        
        $clips = \App\Clip::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');$clips = \App\Clip::where('industry_id', $id)->get();

        $industry = Industry::findOrFail($id);

        return view('admin.industries.show', compact('industry', 'clips'));
    }


    /**
     * Remove Industry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('industry_delete')) {
            return abort(401);
        }
        $industry = Industry::findOrFail($id);
        $industry->delete();

        return redirect()->route('admin.industries.index');
    }

    /**
     * Delete all selected Industry at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('industry_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Industry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Industry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('industry_delete')) {
            return abort(401);
        }
        $industry = Industry::onlyTrashed()->findOrFail($id);
        $industry->restore();

        return redirect()->route('admin.industries.index');
    }

    /**
     * Permanently delete Industry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('industry_delete')) {
            return abort(401);
        }
        $industry = Industry::onlyTrashed()->findOrFail($id);
        $industry->forceDelete();

        return redirect()->route('admin.industries.index');
    }
}
