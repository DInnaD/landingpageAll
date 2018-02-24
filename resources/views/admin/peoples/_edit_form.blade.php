<div class="form-group">
	
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$people['images']) !!}
    {!!Form::hidden('old_images', $people['images'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose image']) !!}
    	
    
</div>

