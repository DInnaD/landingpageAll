@extends('layouts.app')

    @extends('admin.header')
    @extends('layouts.panel')
<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Page $page */
?>
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
                <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('pages.index', compact('portfolio')) }}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
                    
            <!--a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="">
                <i class="fa fa-backward" aria-hidden="true"></i>back
            </a-->
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Pages: <b>{{$page->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['route' => array_merge(['pages.destroy'], compact('portfolio', 'page')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                    {{-- link_to_route('pages.edit', 'edit', ['portfolio' => $portfolio, 'page' => $page], ['class' => 'btn btn-success btn-xs']) --}}
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">

        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
            @foreach ($page->getAttributes() as $attribute => $value)
                <tr>
                    <td>{{$attribute}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
