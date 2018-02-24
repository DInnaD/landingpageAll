@section('content')


<section><!--Aboutus-->
<div class="inner_wrapper">


    
<!-- Portfolio -->
<div id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
   
    <h2>{{ $page->name }}</h2>
    
    </div>

    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters tags  -->
  <div class="portfolio"> 
  
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
          @foreach($tagMores as $tag)

          <li><a class="" href="" data-filter=".{{ $tag }}">
          <h5>{{ $tag }}</h5>
          </a></li>
          @endforeach
          
        
        
      </ul>
    </div>
    <!--/Portfolio Filters --> 
 
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
       @foreach($portfolioMores as $item) 
            <!-- Portfolio Item -->
      <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{ $item->filter }} isotope-item">
        <div class="portfolio_img"> 
        {!! Html::image('assets/img/'.$item->images,$item->name) !!}
        </div>        
        <div class="item_overlay">
          <div class="item_info">
             
            <a class="" href="{{ $item->link }}" target="_blank"><i class="fa fa-facebook" style = "font-size: 40px; padding-bottom: 0px; "></i></a>
            <h4 class="project_name" style = "padding-top: 0px;">{{ $item->name }}</h4>


          </div>
        </div>
        </div>
  
      @endforeach 

      <!--/Portfolio Item  -->
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>

   
  </div>
 
  
</div>
 
<!--/Portfolio --> 
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    
    @foreach($peoples as $people)  
      <h2>{{ link_to_route('peoples.index', 'TEAM', [$people->id]) }}</h2>
      
      
    <h6></h6>
    <div class="team_section clearfix">

    
      

      <div class="team_area">
        <div class="team_box wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">
        
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          {!! Html::image('assets/img/'.$people->images,$people->name) !!}
          <ul>
            @foreach($socialPeoples as $socialPeople)
            <li class="twitter animated bounceIn wow delay-02s"><a href="{{ $socialPeople->link }}" target="_blank"><i class="fa {{$socialPeople->callBack}}"></i></a></li>
            @endforeach
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">{{$people->name}}</h3>
        <span class="wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">{{$people->position}}</span>
        <p class="wow fadeInDown delay-0{{ ($people->id*3 + 3) }}s">{{$people->text}}</p>
      </div>

  @endforeach



      
      
    </div>
  </div>
</section>





 
  <div class="container">
    <h2>{{ $page->nameSecond }}</h2>
    <div class="inner_section">
    <div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
      
            <div class=" delay-01s animated fadeInDown wow animated">
            
            <ul>
            <li>
              <li>
              {!! Html::image('assets/video/'.$page->videos,'',['class' => 'zoomIn wow animated']) !!}
              </li>
              

              
            
          </ul>
              
        </div>
      </div>

        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
            <div class=" delay-01s animated fadeInDown wow animated">
            <div class="panel-body">
                    
                    <a href="{{ $page->link }}" class="contact_btn"><i class="fa {{ $page->icon }}" aria-hidden="true"></i> {{ $page->linkName }}</a>
                       
                       
                  </div>
            
              
          </div>
       
            </div>
        
              </div>
                <div class="panel-body">
                    
                       

                       
                  </div>
                </div>
            </div> 
        </div>
</section>
@endsection





        
          
        

