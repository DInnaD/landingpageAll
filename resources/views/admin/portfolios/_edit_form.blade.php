<div class="form-group">
	   
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$portfolio['images']) !!}
    {!!Form::hidden('old_images', $portfolio['images'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose image']) !!}
    	
    
</div>

