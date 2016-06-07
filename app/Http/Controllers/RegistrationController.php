<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RegistrationFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Sentinel;

class RegistrationController extends Controller
{

    /**
     * @var $user
     */
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
       
        $this->roles = Sentinel::getRoleRepository()->createModel();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->roles->paginate();
        
        return view('registration.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RegistrationFormRequest $request)
    {
        
        $input = $request->only('email', 'password', 'first_name', 'last_name');

        $user = Sentinel::registerAndActivate($input);
        $role = $request->roles;
        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName($role);

        // Assign the role to the users
        $usersRole->users()->attach($user);

        return redirect('admin/profiles')->withFlashMessage('User Successfully Created!');
    }
}
