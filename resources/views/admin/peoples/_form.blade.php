<div class="form-group">
	{!!Form::label('name', 'Name') !!}	
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::label('position', 'Position') !!}
    {!!Form::text('position', null, ['class' => 'form-control']) !!}
    {!!Form::label('text', 'Content') !!}
    {!!Form::textarea('text', null, ['class' => 'form-control class' ]) !!}
 
    {!!Form::label('images', 'Image') !!}
    {!!Form::file('images', null, ['class' => 'form-control', 'style' => 'height:50px']) !!}


