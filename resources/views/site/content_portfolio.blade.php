@section('content')

<section><!--Aboutus-->
<div class="inner_wrapper">
 
  <div class="container">
   </div> 
</div>
</section>
<div class=" delay-01s animated fadeInDown wow animated">

 <a href="{{ url ('/') }}">{!! Html::image('assets/img/'.$page->images,'',['class' => 'zoomIn wow animated']) !!}</a>
 </div>
    
<!-- Portfolio -->
<section id="Portfolio" class="content"> 
  
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
          @foreach($tagMores as $tagMore)

          <li><a class="" href="" data-filter=".{{ $tagMore }}">
          <h5>{{ $tagMore }}</h5>
          </a></li>
          @endforeach
          
        
        
      </ul>
    </div>
    <!--/Portfolio Filters --> 
 
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
       @foreach($portfolioAlls as $item) 
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
 
  
</section>
 
<!--/Portfolio --> 
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>TEAM</h2>
    @foreach($peopleAlls as $peopleAll)
    <div class="team_section clearfix">
      <div class="team_area">
        
        <div class="team_box wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">
        
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          {!! Html::image('assets/img/'.$peopleAll->images,$peopleAll->name) !!}
          <ul>
            @foreach($peopleAll->socialPeopleAlls as $socialPeopleAll)
            <li class="twitter animated bounceIn wow delay-02s"><a href="{{ $socialPeopleAll->link }}" target="_blank"><i class="fa {{$socialPeopleAll->callBack}}"></i></a></li>
            @endforeach
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">{{$peopleAll->name}}</h3>
        <span class="wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">{{$peopleAll->position}}</span>
        <p class="wow fadeInDown delay-0{{ ($peopleAll->id*3 + 3) }}s">{{$peopleAll->text}}</p>
      </div>
 
     @endforeach
    </div>      
  </div>
</section>
<!--Footer-->
<footer class="footer_wrapper" id="contact">
  
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2018,    Create by <a href="https://www.facebook.com/ITvolunteerInnaDanylevska">ITvolunteersFIRST</a>. </span> </div>


  </div>
</footer>

@endsection





        
          
        

