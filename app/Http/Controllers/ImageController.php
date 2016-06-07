<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AdminUsersEditFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Sentinel;
use Input;
use Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use Image; 

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxUploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path_profile_img = public_path() . env('PATH_PROFILE_IMG');
            $pathThumb = public_path() . env('PATH_PROF_THUMB_IMG');

            $pathMedium = public_path() . env('PATH_PROF_MEDIUM_IMG');

            $ext = strtolower($image->getClientOriginalExtension());

            $imageName = rand(11111,99999). '.' . $ext;

            $image->move($path_profile_img, $imageName);

            $findimage = public_path() . env('PATH_PROFILE_IMG') . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($pathThumb . $imageName);
            $imagemedium->save($pathMedium . $imageName);

            $image = $request->imagethumb = $imageName;
            $imagethumb = $request->image = $imageName;
            $imagemedium = $request->image = $imageName;

            return Response::json(['success' => true, 'file' => asset(env('PATH_PROF_THUMB_IMG'). $imagethumb),'filename' =>   $imagethumb, 'success' => 'Upload successfully']);


    }
    
}
}