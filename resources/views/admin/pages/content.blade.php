
<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Portfolio $portfolio */
?>

@section('content')
    
                       
@foreach ($portfolio->pages as $page)
@if($page->id%2 == 0) 
     <!--Header_section--> 
<!--Hero_Section id=home-->

<section id="{{ $page->alias }}"><!--Aboutus-->
<div class="inner_wrapper">
<div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-xs-12" >
                <div class="panel panel-default">
               
                    <div class="panel-heading">Pages for <b>{{ $portfolio->name }}</b></div>

                </div>
            </div>
        </div>
    </div>
  <div class="container">
    <h2>{{ $page->name }}</h2>
      
    <div class="inner_section">
     <div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
        
       {!! Html::image('assets/img/'.$page->images,'',['class' => 'img-circle delay-03s zoomIn wow animated']) !!}
           
      </div>
        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
            <div class=" delay-01s animated fadeInDown wow animated">
           

    
                <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('home') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |
                       {{ link_to_route('pages.create', 'create', [$portfolio->id], ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                  </div>              
            </div>
            {!! $page->text !!} 
          <a href="{{ route('portfolio', array('alias' => $page->alias)) }}" class="contact_btn">My LandingPage...</a>    
          
       </div>
      </div>
    </div>
  </div> 
  </div>
</section>
<!--Aboutus--> 
@else
<section id="{{ $page->alias }}" class="top_cont_outer">
  <div class="hero_wrapper">
  
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-xs-12" >
                <div class="panel panel-default">
               
                    <div class="panel-heading">Pages for <b>{{ $portfolio->name }}</b></div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
      <h2>{{ $page->name }}</h2>
      
      <div class="inner_section">
        <div class="row">

          <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
      
       {!! Html::image('assets/img/'.$page->images,'',['class' => ' delay-03s zoomIn wow animated']) !!}
              
      </div>
        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
            <div class=" delay-01s animated fadeInDown wow animated">
              <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('home') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |
                       {{ link_to_route('pages.create', 'create', [$portfolio->id], ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                  </div>
               </div>
          {!! $page->text !!}     
          <a href="{{ route('page', array('alias' => $page->alias)) }}" class="read_more2">My LandingPage...</a>
          

          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!--Hero_Section--> 

@endif
@endforeach
@endsection
