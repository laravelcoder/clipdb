<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class GoogleCloudVisionsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('google_cloud_vision_access')) {
            return abort(401);
        }
        return view('admin.google_cloud_visions.index');
    }
}
