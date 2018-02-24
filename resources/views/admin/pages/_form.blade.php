<div class="form-group">
	{!!Form::label('name', 'Name') !!}	
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::label('alias', 'Alias') !!}
    {!!Form::text('alias', null, ['class' => 'form-control']) !!}
    {!!Form::label('text', 'Content') !!}
    {!!Form::textarea('text', null, ['class' => 'form-control class' ]) !!}
 
    {!!Form::label('images', 'Words') !!}
    {!!Form::file('images', null, ['class' => 'form-control', 'style' => 'height:50px']) !!}
    

    {{--!!Form::label('audios', 'Audio') !!--}}
    {{--!!Form::file('audios', null, ['class' => 'form-control']) !!--}}
    {{--!!Form::label('images', 'Idioms') !!--}}
    {{--!!Form::file('videos', null, ['class' => 'form-control']) !!--}}
</div>

