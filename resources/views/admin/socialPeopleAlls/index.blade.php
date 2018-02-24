

@extends('layouts.app')

    @extends('admin.header_all')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                
                    <div class="panel-heading">Person <b>{{ $peopleAll->name }}</b></div>
                   
                    <div class="panel-heading">SocialPeoples</div>

                    <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-2 col-sm-2 col-xs-2" href="{{ route('portfolios.index') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back To PORTFOLIO
                    </a>
                       <hr>
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('peopleAlls.index', compact('portfolio')) }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |{{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                        {{ link_to_route('socialPeopleAlls.create', 'create', [$portfolio->id, $peopleAll->id], ['class' => 'btn btn-info btn-xs']) }}

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
                        
                        
                        @foreach ($peopleAll->socialPeopleAlls as $socialPeopleAll)
                            <tr>
                             
                                <td>{{$socialPeopleAll->id}}</td>
                                <td>{{$socialPeopleAll->name}}</td>    
                                <td>{{$socialPeopleAll->link}}</td>
                                <td>{{$socialPeopleAll->callBack}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                    
                                    {{Form::open(['route' => array_merge(['socialPeopleAlls.destroy',$socialPeopleAll->id], compact('portfolio', 'peopleAll')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                                    {{-- link_to_route('socialPeoples.show', 'info', ['portfolio' => $portfolio, 'peopleAll' => $peopleAll, 'socialPeopleAll' => $socialPeopleAll], ['class' => 'btn btn-success btn-xs']) --}}
                                    {{-- link_to_route('socialPeopleAlls.edit', 'edit', ['portfolio' => $portfolio, 'peopleAll' => $peopleAll,$socialPeopleAll->id], ['class' => 'btn btn-success btn-xs']) --}}
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $socialPeopleAlls->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
