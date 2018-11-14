<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use App\Helpers\Normalize;
use App\Helpers\FFMPEG_helpers;
use FFMpeg;
use FFMpeg\FFProbe;
use File;

// use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\Conversion\Conversion;
use Spatie\MediaLibrary\ImageGenerators\BaseGenerator;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Media;
//use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
 
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

trait FileUploadTrait 
{
 


    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {

        if (! file_exists(public_path('uploads'))) { File::makeDirectory(public_path('uploads'),0777, true);}
        if (! file_exists(public_path('uploads/icons'))) { File::makeDirectory(public_path('uploads/icons'),0777, true);}
        if (! file_exists(public_path('uploads/cai'))) { File::makeDirectory(public_path('uploads/cai'),0777, true); }
        if (! file_exists(public_path('uploads/clips'))) { File::makeDirectory(public_path('uploads/clips'),0777, true); }
        if (! file_exists(public_path('uploads/images'))) { File::makeDirectory(public_path('uploads/images'),0777, true); }
        if (! file_exists(public_path('uploads/thumbs'))) { File::makeDirectory(public_path('uploads/thumbs'),0777, true); }

        // $clipPath = config('gui.upload_path');
        $uploadPath = env('UPLOAD_PATH', 'uploads');
        $clipPath = env('CLIP_PATH', 'uploads/clips');
        $imagePath = env('IMAGE_PATH','uploads/images');
        $thumbPath = env('THUMB_PATH','uploads/thumbs');
        $caiPath = env('CAI_PATH','uploads/cai');
        $iconpath = env('ICON_PATH','uploads/icons');

        $getcai = env('CAI_SERVER');
        $transcoder = "/TOCAI.php?";

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    Log::info("UPLOAD MAIN");
                    // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $file     = str_slug($file, '-');
                    $image    = Image::make($file)->usingConversion('icons');
                    if (! file_exists($thumbPath)) {
                        mkdir($thumbPath, 0775, true);
                    }
                    Image::make($file)->resize(50, 50)->save($thumbPath . '/' . $filename);
                    Image::make($file)->resize(100, 40)->save($iconPath . '/' . $filename);

                    $width  = $image->width();
                    $height = $image->height();

                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                    } elseif ($height > $request->{$key . '_max_height'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                    }

                    $image->save($imagePath . '/' . $filename);

                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
             Log::debug("TestingConversions... ");
                    $extension = $request->file($key)->getClientOriginalExtension();
                    Log::info("UPLOAD VIDEO");
                    $filename     = $request->file($key)->getClientOriginalName();
                    // $filename     = str_slug($filename, '-');

                        // $filename->addMediaConversion('thumb')
                        //     ->width(368)
                        //     ->height(232)
                        //     ->extractVideoFrameAtSecond(20)
                        //     ->performOnCollections('videos');       
                    
                        $basename = substr($filename, 0, strrpos($filename, "."));
                        $basename = Normalize::titleCase($basename);
                        $ad_duration = FFMPEG_helpers::getDuration($request->file($key));
                        Log::info("DURATION: " . $ad_duration);
                        // dd($ad_duration);
                        $filename = str_slug($basename) . '.' . $extension;

                        // $conversion = $request->addMedia($request->file($key))->toMediaCollection('images');
                        
                        Log::info("BASENAME: ". $basename);
                        Log::info("FILENAME: ".$filename);
                        //dd($filename);
                    $request->file($key)->move($clipPath, $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));

                    Log::info("UPLOADED ". $filename);
                    Log::debug("Conversions->isEmpty()");
                }
            }
        }

        return $finalRequest;
    }
}