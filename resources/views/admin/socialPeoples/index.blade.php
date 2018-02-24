

@extends('layouts.app')

    @extends('admin.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Pages for <b>{{ $people->name }}</b></div>
                    <div class="panel-heading">SocialPeoples</div>

                    <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('peoples.index') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |{{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                        {{ link_to_route('socialPeoples.create', 'create', [$people->id], ['class' => 'btn btn-info btn-xs']) }}

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
                        
                        
                        @foreach ($people->socialPeoples as $socialPeople)
                            <tr>
                             
                                <td>{{$socialPeople->id}}</td>
                                <td>{{$socialPeople->name}}</td>    
                                <td>{{$socialPeople->link}}</td>
                                <td>{{$socialPeople->callBack}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    {{Form::open(['route' => array_merge(['socialPeoples.destroy'], compact('people', 'socialPeople')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                                    {{ link_to_route('socialPeoples.show', 'info', ['people' => $people, 'socialPeople' => $socialPeople], ['class' => 'btn btn-success btn-xs']) }}
                                    {{-- link_to_route('socialPeoples.edit', 'edit', ['people' => $people, 'socialPeople' => $socialPeople], ['class' => 'btn btn-success btn-xs']) --}}
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $socialPeoples->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
