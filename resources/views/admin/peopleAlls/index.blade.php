

@extends('layouts.app')

    @extends('admin.header_all')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
               <div class="form-group">
             
                    <div class="panel-heading">Peoples</div>

                    <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('portfolios.index') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |{{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                        {{ link_to_route('peopleAlls.create', 'create', [$portfolio->id], ['class' => 'btn btn-info btn-xs']) }}

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
                        
                        
                        @foreach ($portfolio->peopleAlls as $peopleAll)
                            <tr>
                             
                                <td>{{$peopleAll->id}}</td>
                                <td>{{$peopleAll->name}}</td>
                                <td>{{$peopleAll->position}}</td> 
                                <td>{{$peopleAll->text}}</td> 
                                <td>{{$peopleAll->images}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    {{Form::open(['route' => array_merge(['peopleAlls.destroy'], compact('portfolio', 'peopleAll')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                                    {{ link_to_route('socialPeopleAlls.index', 'SOCIALS', ['portfolio' => $portfolio,$peopleAll->id], ['class' => 'btn btn-success btn-xs']) }}
                                {{ link_to_route('peopleAlls.show', 'info', ['portfolio' => $portfolio, 'peopleAll' => $peopleAll], ['class' => 'btn btn-success btn-xs']) }}
                                {{-- link_to_route('peopleAlls.edit', 'edit', ['portfolio' => $portfolio, 'peopleAll' => $peopleAll], ['class' => 'btn btn-success btn-xs']) --}}
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
