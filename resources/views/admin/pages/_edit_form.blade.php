<div class="form-group">
	
    
    {!!Form::label('old_images', 'Words') !!}	
    {!!Html::image('assets/img/'.$page['images']) !!}
    {!!Form::hidden('old_images', $page['images'], ['file'=>'true','class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose Immage', 'enctype'=>'multipart/form-data']) !!}
    
    {{--!!Form::label('old_videos', 'Idioms') !!--}}	
    {{--!!Html::image('assets/video/'.$page['videos']) !!--}}
    {{--!!Form::hidden('old_videos', $page['videos'], ['file'=>'true','class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose Immage', 'enctype'=>'multipart/form-data']) !!--}}	
    
</div>

