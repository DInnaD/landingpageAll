<div class="form-group">
	{!!Form::label('name', 'Name') !!}	
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::label('text', 'Content') !!}
    {!!Form::textarea('text', null, ['class' => 'form-control class' ]) !!}

    {!!Form::label('icon', 'Icon') !!}
    {!!Form::file('icon', null, ['class' => 'form-control']) !!}
</div>

