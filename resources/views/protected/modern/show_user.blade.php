@extends('layout.index')
@section('content')


<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-container">
                <div class="profile-header row">
                    <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                        @if($user->image)
                           <img src="{!! getenv('PATH_PROF_THUMB_IMG').$user->image !!}" class="header-avatar">
                        @else
                            <img src="{!! getenv('PATH_PROF_THUMB_IMG').'noprofimg.png' !!}" class="header-avatar">
                        @endif
                        </div>
                        <div class="col-lg-5 col-md-8 col-sm-12 profile-info"></div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats possbtn">
                            <div class="header-information">
                                <a href="{{url("moder/profile/{$user['id']}/edit")}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                              
                            </div>
                        </div>
                    </div>
                    <div class="profile-body">
                        <div class="col-lg-12">
                            <div class="tabbable">
                                <div id="settings" class="tab-pane">
                                    <div class="form-title">
                                                            Personal Information
                                                        </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                                    User Role:
                                                                   
                                                <span class="info_usr"> {!! $user_role !!}</span>
                                            </div>
                                            <div class="form-group">
                                                                    First Name:
                                                                   
                                                <span class="info_usr"> {!! $user->first_name !!}</span>
                                            </div>
                                            <div class="form-group">
                                                                    Last Name:
                                                                   
                                                <span class="info_usr"> {!! $user->last_name !!}</span>
                                            </div>
                                           
                                           
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layout.toastr')
@endsection