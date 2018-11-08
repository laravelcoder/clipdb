<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class ImageMagicsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('image_magic_access')) {
            return abort(401);
        }
        return view('admin.image_magics.index');
    }
}
