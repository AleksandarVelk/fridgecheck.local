<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">{!! $recipes['name'] !!}</span>
                <div class="widget-buttons" id="widget-buttons{!! $recipes['id'] !!}">
                    <a href="#" data-toggle="maximize">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="#" data-toggle="collapse">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="#" data-toggle="dispose">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body no-padding">
                <div class="widget-main ">
                    <div class="panel-group accordion" id="accordion">
                        {!! Form::model($recipes, ['method' => 'PATCH','files' => true,'route' => ['recipes.update', $recipes->id], 'id'=>'form'.$recipes->id]) !!}


                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{!! $recipes['id'] !!}">
                                               Name
                                               </a>
                                </h4>
                            </div>
                            <div id="collapseOne{!! $recipes['id'] !!}" class="panel-collapse collapse in">
                                <div class="panel-body border-red">
                                    <div class="form-group">
                                        <div class="col-xs-4">


                                            {!! Form::label('name', 'Recipe Name:') !!}
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                        </div>
                                        <div class="col-xs-4">

                                            {!! Form::label('slug', 'Short Link:') !!} {!! Form::text('slug', null, ['class' => 'form-control']) !!}


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{!! $recipes['id'] !!}">
                                               Category/Ingredients
                                               </a>
                                </h4>
                            </div>
                            <div id="collapseTwo{!! $recipes['id'] !!}" class="panel-collapse collapse">
                                <div class="panel-body border-palegreen">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree{!! $recipes['id'] !!}">
                                               Preparation
                                               </a>
                                </h4>
                            </div>
                            <div id="collapseThree{!! $recipes['id'] !!}" class="panel-collapse collapse">
                                <div class="panel-body border-magenta">
                                    {!! Form::label('preparation', 'Preparation:') !!}
                                    <div class="summernote">
                                        {!! $recipes['preparation'] !!}
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourth{!! $recipes['id'] !!}">
                                               Images
                                               </a>
                                </h4>
                            </div>
                            <div id="collapseFourth{!! $recipes['id'] !!}" class="panel-collapse collapse">
                                <div class="panel-body border-magenta">
                                    @include('recipes.recipe_images')
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive{!! $recipes['id'] !!}">
                                               Other
                                               </a>
                                </h4>
                            </div>
                            <div id="collapseFive{!! $recipes['id'] !!}" class="panel-collapse collapse">
                                <div class="panel-body border-magenta">

                                    <div class="form-group">
                                        {!! Form::label('persons', 'Persons:') !!} @foreach ( $recipes->dishes as $dish )


                                        <div class="registerbox-textbox no-padding-bottom">
                                            <div class="checkbox">
                                                <label>
                                                {!! Form::checkbox('breakfast', $dish->breakfast, $dish->breakfast) !!}
                                                <span class="text darkgray">breakfast</span>
                                            </label>
                                            </div>
                                        </div>

                                        <div class="registerbox-textbox no-padding-bottom">
                                            <div class="checkbox">
                                                <label>
                                                {!! Form::checkbox('lunch', $dish->lunch, $dish->lunch) !!}
                                                <span class="text darkgray">lunch</span>
                                            </label>
                                            </div>
                                        </div>

                                        <div class="registerbox-textbox no-padding-bottom">
                                            <div class="checkbox">
                                                <label>
                                                {!! Form::checkbox('diner', $dish->diner, $dish->diner) !!}
                                                <span class="text darkgray">diner</span>
                                            </label>
                                            </div>
                                        </div>

                                    </div>

                                    @endforeach

                                    <div class="form-group">
                                        {!! Form::label('time_preparation', 'Time Preparation:') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-clock-o darkorange"></i></span>
                                            <div style="padding:0px;" class="col-xs-1">
                                                {!! Form::number('time_preparation', $recipes->time_preparation, ['class' => 'form-control col-xs-2']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('persons', 'Persons:') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user darkorange"></i></span>
                                            <div style="padding:0px;" class="col-xs-1">
                                                {!! Form::number('persons', $recipes->persons, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('demands', 'Demands:') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-warning darkorange"></i></span>
                                            <div style="padding:0px;" class="col-xs-1">

                                                {!! Form::select('demands', $demands, $recipes->demands, ['class' => 'selectpicker']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="registerbox-textbox no-padding-bottom">
                                        <div class="checkbox">
                                            <label>
                                            
                                                {!! Form::checkbox('status', $recipes->status, $recipes->status) !!}
                                                <span class="text darkgray">Status is active:</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="float:right;" class="form-group">

                        <a href="javascript:void(0);" onclick = "submit({!! $recipes->id !!})" id = "submit_btn" class="btn btn-success">Save Changes</a>
                        <a href="javascript:void(0);" class="btn btn-warning">Cancel</a>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>


<!--Summernote Scripts-->

<script>
    $('.summernote').summernote({
        height: 300
    });

    function submit(id) {
             
          
 $.ajax({
                type: 'POST',
                url: 'recipes/'+id,
                data: $('#form'+id).serialize(),
                success: function(data) {
                    alert(data);
                }
            });

            e.preventDefault();

   
    };

    


</script>