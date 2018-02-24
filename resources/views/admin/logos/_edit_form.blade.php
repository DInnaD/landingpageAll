<div class="form-group">
	   
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$logo['images']) !!}
    {!!Form::hidden('old_images', $logo['images'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose Logo']) !!}
    {{--!!Form::label('old_favicons', 'Favicon') !!--}}	
    {{--!!Html::image('assets/img/'.$logo['favicons']) !!--}}
    {{--!!Form::hidden('old_favicons', $logo['favicons'], ['class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose Favicon']) !!--}}	
    
</div>

