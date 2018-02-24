

@extends('layouts.app')

    @extends('admin.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
               
                    <div class="panel-heading">Services</div>

                    <div class="panel-body">
                    
                        {{ link_to_route('services.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            
                                <th width="5%">id</th>
                                <th width="15%">Name</th>
                                <th width="25%">Text</th>
                                <th width="25%">Icons</th>                                
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
                        
                        
                        @foreach ($services as $model)
                            <tr>
                             
                                <td>{{$model->id}}</td>
                                <td>{{$model->name}}</td>
                                <td>{{$model->text}}</td>                                
                                <td>{{$model->icon}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['services.destroy', $model->id], 'method' => 'DELETE'])}}
                                    {{ link_to_route('services.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }} |
                                    {{ link_to_route('services.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }} |
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $services->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
