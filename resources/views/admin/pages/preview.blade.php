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
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">My Topic: <b>{{$portfolio->name}}</b></div>
            

    </div>
     <div class="panel-body">

        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">$portfolio->name</th>
                <th width="75%">Date</th>
            </tr>
               <tr>
                    <td>$portfolio->text</td>
                    <td>innassik@yahoo.com</td>
                </tr>
            
                 
        </table>

    </div>
        
 @endsection   



           
