@extends('layout.index')
@section('content')
<div class="page-body">
<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-themesecondary">
                <i class="widget-icon fa fa-tags themesecondary"></i>
                <span class="widget-caption themesecondary">Users Board</span>
            </div><!--Widget Header-->
            <div class="widget-body  no-padding">
                <div class="tickets-container">
                    <ul class="tickets-list">
              
                    @foreach($users as $user)
                        <li class="ticket-item">
                            <div class="row">
                                <div class="ticket-user col-lg-5 col-sm-12">
                                @if($user->image)
                                   <img src="{!! $destination_prof_img.$user->image !!}" class="user-avatar">
                                @else
                                    <img src="{!! $destination_prof_img.'noprofimg.png' !!}" class="user-avatar">
                                @endif
                                  
                                    <span class="user-name">{{ $user['email'] }}</span>                         
                                </div>
                                <div class="ticket-type col-lg-1 col-sm-12">
                                    @foreach($user['roles'] as $role)
                                        <span class="type">{{ $role['name'] }}</span>
                                    @endforeach
                                </div>
                                <div class="ticket-time  col-lg-4 col-sm-6 col-xs-12">
                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                    <i class="fa fa-clock-o"></i>
                                    <span class="time">{{ $user->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                    <span class="divider hidden-xs"></span>
                                    
                                    <a href="{{url("admin/profiles/{$user['id']}")}}" class="btn btn-info btn-xs edit"><i class="fa fa-info-circle"></i> View</a>
                                </div>
                                <div class="ticket-state bg-palegreen">
                                    <i class="fa fa-check"></i>
                                </div>
                                
                            </div>
                        </li>
                    @endforeach                        
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@include('layout.toastr')
@endsection
