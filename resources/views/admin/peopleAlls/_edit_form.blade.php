<div class="form-group">
	
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$peopleAll['images']) !!}
    {!!Form::hidden('old_images', $peopleAll['images'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose image']) !!}
    	
    
</div>

