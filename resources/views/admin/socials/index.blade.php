

@extends('layouts.app')

    @extends('admin.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
               
                    <div class="panel-heading">Socials</div>

                    <div class="panel-body">
                        {{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                        {{ link_to_route('socials.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            
                                <th width="5%">id</th>
                                <th width="25%">Name</th>
                                <th width="25%">Link</th>
                                <th width="25%">Icon</th>                                
                                <th width="25%">Actions</th>
                            </tr>
                            <tr>
                            
                                <td colspan="5" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                        
                        @foreach ($socials as $model)
                            <tr>
                             
                                <td>{{$model->id}}</td>
                                <td>{{$model->name}}</td>    
                                <td>{{$model->link}}</td>
                                <td>{{$model->callBack}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['socials.destroy', $model->id], 'method' => 'DELETE'])}}
                                    {{ link_to_route('socials.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
                                    {{ link_to_route('socials.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $socials->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
