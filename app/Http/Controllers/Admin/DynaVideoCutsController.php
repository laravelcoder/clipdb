<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class DynaVideoCutsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('dyna_video_cut_access')) {
            return abort(401);
        }
        return view('admin.dyna_video_cuts.index');
    }
}
