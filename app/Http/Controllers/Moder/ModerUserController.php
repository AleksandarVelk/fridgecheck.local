<?php

namespace App\Http\Controllers\Moder;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ModerUserEditFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Sentinel;
use App\Models\Users as Users;
use App\Models\RoleUsers as RoleUsers;
use Illuminate\Support\Facades\Storage;
use Toastr;

class ModerUserController extends Controller
{
    /**
     * @var $user
     */
    protected $user;


    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        $user_role = $user->roles->first()->name;
        $imgDest = env('PATH_PROF_THUMB_IMG');

        return view('protected.modern.show_user')->withUser($user)->withUserRole($user_role)->with('imgDest',$imgDest);
        // $user = $this->user->find($id);
        // $this->roles = Sentinel::getRoleRepository()->createModel();
        // $user_role = $user->roles->first()->name;
        // $roles = $this->roles->paginate();
        // $destinationPath = '/assets/img/avatars/thumbnails/';
        // return view('protected.admin.show_user')->withUser($user)->withUserRole($user_role)->withRoles($roles)->with('destinationPath',$destinationPath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);   
        $destinationPath = env('PATH_PROF_THUMB_IMG');
        return view('protected.modern.edit_user', ['user' => $user, 'destinationPath' => $destinationPath]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ModerUserEditFormRequest $request)
    {
        $user = $this->user->find($id);
        
        if (! $request->has("password")) {
            $input = $request->only('first_name', 'last_name', 'image');

            $user->fill($input)->save();
            
            Toastr::success('The user '.$user->first_name.' '.$user->last_name.' was successfully update!')->push();

            return redirect('moder/profile/'.$user->id);


        } else {
            $input = $request->only('first_name', 'last_name', 'image', 'password');

            $user->fill($input);
            $user->password = \Hash::make($request->input('password'));
            $user->save();
            

            Toastr::success('The user '.$user->first_name.' '.$user->last_name.' was successfully update!')->push();

            return redirect('moder/profile/'.$user->id);
        }
    }

    public function destroy($id)
    {
       
        
 
        
   
    }

}
