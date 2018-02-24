<div class="form-group">
	
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$service['icon']) !!}
    {!!Form::hidden('old_images', $service['icon'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose icon']) !!}
    	
    
</div>

