

@extends('layouts.app')

    @extends('admin.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
               <div class="form-group">
             
                    <div class="panel-heading">Peoples</div>

                    <div class="panel-body">
                    
                        {{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                        {{ link_to_route('peoples.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            
                                <th width="5%">id</th>
                                <th width="15%">Name</th>
                                <th width="15%">Position</th>
                                <th width="20%">Text</th>
                                <th width="15%">Images</th>                                
                                <th width="25%">Actions</th>
                            </tr>
                            <tr>
                            
                                <td colspan="6" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                        
                        @foreach ($peoples as $model)
                            <tr>
                             
                                <td>{{$model->id}}</td>
                                <td>{{$model->name}}</td>
                                <td>{{$model->position}}</td> 
                                <td>{{$model->text}}</td> 
                                <td>{{$model->images}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['peoples.destroy', $model->id], 'method' => 'DELETE'])}}
                                    {{ link_to_route('socialPeoples.index', 'SOCIAL', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
                                    {{ link_to_route('peoples.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }} |
                                    {{ link_to_route('peoples.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }} |
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $peoples->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
