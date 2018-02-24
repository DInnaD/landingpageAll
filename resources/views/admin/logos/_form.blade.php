<div class="form-group">
	{!!Form::label('name', 'Name') !!}	
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {{--!!Form::label('favicons', 'Favicon') !!--}}
    {{--!!Form::file('favicons', null, ['class' => 'form-control']) !!--}}    
    
    {!!Form::label('images', 'Image') !!}
    {!!Form::file('images', null, ['class' => 'form-control']) !!}
</div>

