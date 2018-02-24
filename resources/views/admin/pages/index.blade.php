

@extends('layouts.app')

    @extends('admin.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
               
                    <div class="panel-heading">Pages for <b>{{ $portfolio->name }}</b></div>

                    <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('portfolios.index') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |{{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                       {{ link_to_route('pages.create', 'create', [$portfolio->id], ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            
                                <th width="5%">id</th>
                                <th width="15%">Name</th>
                                <th width="10%">Alias</th>
                                <th width="10%">Text</th>
                                <th width="10%">Images</th>
                                <th width="10%">Audois</th>
                                <th width="10%">Videos</th>                                
                                <th width="25%">Actions</th>
                            </tr>
                            <tr>
                            
                                <td colspan="8" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                        
                        @foreach ($portfolio->pages as $page)
                            <tr>
                             
                                <td>{{$page->id}}</td>
                                <td>{{$page->name}}</td>
                                <td>{{$page->alias}}</td> 
                                <td>{{$page->text}}</td> 
                                <td>{{$page->images}}</td>
                                <td>{{$page->audios}}</td> 
                                <td>{{$page->videos}}</td>
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                
                                    
                                {{Form::open(['route' => array_merge(['pages.destroy'], compact('portfolio', 'page')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                                {{ link_to_route('pages.show', 'info', ['portfolio' => $portfolio, 'page' => $page], ['class' => 'btn btn-success btn-xs']) }}
                                {{-- link_to_route('pages.edit', 'edit', ['portfolio' => $portfolio, 'page' => $page], ['class' => 'btn btn-success btn-xs']) --}}
                                {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">
                            { !! $pages->render() !!}

                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
