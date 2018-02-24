<div class="form-group">
	   
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$portfolioAll['images']) !!}
    {!!Form::hidden('old_images', $portfolioAll['images'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose image']) !!}
    	
    
</div>

