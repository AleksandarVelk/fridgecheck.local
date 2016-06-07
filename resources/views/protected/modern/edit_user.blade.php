@extends('layout.index')
@section('content')

<div class="page-body">
                  
                    {!! Form::model($user, ['method' => 'PATCH','files' => true,'route' => ['moder.profile.update', $user->id]]) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-container">
                                <div class="profile-header row">
                                    <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                                    
                                        <figure id="picture-preview">
                                            
                                        </figure>
                                        <div class="form-group">
                                            <span class="btn btn-palegreen btn-sm  btn-follow btn-file">Upload image
                                             <input name="pictureupload" type="file" id="pictureupload" data-url="{{route("uploadImage")}}" data-target="#picture-preview">
                                             </span>
                                        </div>
                                         @if($user->image)
                                           {!! Form::hidden('picture', asset($destinationPath.$user->image), ['class'=>'form-control','id'=>'picture'])
                                                !!} 
                                                {!! Form::hidden('image', $user->image,  ['class'=>'form-control','id'=>'image'])
                                        !!}                                          
                                        @else
                                            {!! Form::hidden('picture', asset($destinationPath.'noprofimg.png'), ['class'=>'form-control','id'=>'picture'])

                                                !!}   
                                                {!! Form::hidden('image', 'noprofimg.png',  ['class'=>'form-control','id'=>'image'])
                                        !!}                                  
                                        @endif

                                       
                                    {!! Form::hidden('image_old', $user->image) !!}   
                                    </div>
                                    <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                                        <div class="header-fullname">{!! $user->first_name !!}  {!! $user->last_name !!}</div>                                       
                                        <div class="form-group">                                            
                                             ({!! $user->email !!} )
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                                        
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
                                                                    {!! Form::label('first_name', 'First Name:') !!}
                                                                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                                                    {!! errors_for('first_name', $errors) !!}
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('last_name', 'Last Name:') !!}
                                                                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                                                    {!! errors_for('last_name', $errors) !!}

                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    {!! Form::label('password', 'Password:') !!}
                                                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                                                    <p class="help-block">Leave password blank to NOT edit the password.</p>
                                                                    {!! errors_for('password', $errors) !!}
                                                                </div>   
                                                                <div class="form-group">
                                                                    {!! Form::label('password_confirmation', 'Repeat Password:') !!}
                                                                    {!! Form::password('password_confirmation', ['class' => 'form-control'] )!!}
                                                                </div>  
                                                               
                                                                <div class="form-title"></div>
                                                                   <div class="form-group">
                                                                    {!! Form::submit('Save Profile', ['class' => 'btn btn-primary']) !!}
                                                                    {!! Form::close() !!}  
                                                                    </div>
                                                     
                                                             
                                                            <div class="col-sm-6">
                                                                
                                                            </div>
                                                        </div>        
                                                        
                                                        
                                                        
                                                        
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>

@endsection