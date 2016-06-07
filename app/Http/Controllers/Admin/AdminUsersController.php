<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AdminUsersEditFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Sentinel;
use App\Models\Users as Users;
use App\Models\RoleUsers as RoleUsers;
use Illuminate\Support\Facades\Storage;
use Toastr;
class AdminUsersController extends Controller
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
        $users = $this->user->getAll();
        $admin = Sentinel::findRoleByName('Admins');
        $destination_prof_img = env('PATH_PROF_THUMB_IMG');
        return view('protected.admin.list_users')->withUsers($users)->withAdmin($admin)->with('destination_prof_img', $destination_prof_img);
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

        return view('protected.admin.show_user')->withUser($user)->withUserRole($user_role)->with('imgDest',$imgDest);
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

        $roles = Sentinel::getRoleRepository()->all();

        $user_role = $user->roles->first()->id;

        $array_roles = [];

        foreach ($roles as $role) {
            $array_roles = array_add($array_roles, $role->id, $role->name);
        }
        $destinationPath = env('PATH_PROF_THUMB_IMG');
        return view('protected.admin.edit_user', ['user' => $user, 'roles' => $array_roles, 'user_role' =>$user_role, 'destinationPath' => $destinationPath]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, AdminUsersEditFormRequest $request)
    {
        $user = $this->user->find($id);
        
        if (! $request->has("password")) {
            $input = $request->only('email', 'first_name', 'last_name', 'image');

            $user->fill($input)->save();

            $this->user->updateRole($id, $request->input('account_type'));

            return redirect()->route('admin.profiles.edit', $user->id)
                             ->withFlashMessage('User has been updated successfully!');

        } else {
            $input = $request->only('email', 'first_name', 'last_name', 'image', 'password');

            $user->fill($input);
            $user->password = \Hash::make($request->input('password'));
            $user->save();

            $this->user->updateRole($id, $request->input('account_type'));

            return redirect()->route('admin.profiles.edit', $user->id)
                             ->withFlashMessage('User (and password) has been updated successfully!');
        }
    }

    public function destroy($id)
    {
       
        
        $userid = RoleUsers::where('user_id', $id)->first();                    
        $user = Sentinel::findById($id);
       
        if ($user->image)
        {
            if (Storage::exists(public_path(env('PATH_PROFILE_IMG').$user->image)))
            {            
                Storage::delete(
                public_path(env('PATH_PROFILE_IMG').$user->image),
                public_path(env('PATH_PROF_THUMB_IMG').$user->image),
                public_path(env('PATH_PROF_MEDIUM_IMG').$user->image)
                );
            }
        }
       
        $role = Sentinel::findRoleById($userid->role_id);
        
        $role->users()->detach($user);
        $user->delete();
      
        
        Toastr::info('The user '.$user->first_name.' '.$user->last_name.' was successfully removed!')->push();
        return redirect('/admin/profiles')->with('first_name', $user->first_name);
   
    }

}
