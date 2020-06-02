<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu Jul 18 2019 12:58:40 GMT+0000 (UTC)  -->
<html data-wf-page="5d383105f1f7ed613878ef31" data-wf-site="5d383105f1f7ed456e78eec3">
<head>
  <meta charset="utf-8">
  <title>{{$practice->practice_name}}</title>
  <meta content="Practice" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
 <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/tripleoklaw.webflow.css')}}" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="icons/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="icons/webclip.png" rel="apple-touch-icon">
  <style>
    @media (max-width: 479px){
        .mask-4 {
            height: 350vh;
        }
        .slider-3 {
            height: 350vh;
            overflow-y: scroll;
        }
    }
    .column-20-copy {
        padding-top: 90px;
        padding-left: 30px;
        background-color: transparent;
        height: 90vh;
        overflow: hidden;
        overflow-y: scroll;
    }
    .column-19 {
        background-color: #ebeced;
        height: 90vh;
        overflow: hidden;
        overflow-y: scroll;
    }
    
    .other-specialists {
        padding-top: 90px;
        padding-bottom: 90px;
        padding-left: 0px;
    }
    
    .slider-3 {
        height: 62vh;
    }
    
    .mask-4 {
        background-color: #fff;
    }
    
    .text-block-39 {
        margin-left: 5%;
    }
    
  </style>
</head>
<body>
   <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
     <div class="w-row">
      <div class="column-26 w-col w-col-5 w-col-tiny-6"><a href="/" class="brand w-nav-brand w--current"><img src="{{asset('images/TripleOKlaw-Logo.png')}}" alt=""></a></div>
      <div class="column-25 w-col w-col-7 w-col-tiny-6">
        <nav role="navigation" class="nav-menu w-nav-menu"><a href="/about" class="nav-link w-nav-link">about us</a><a href="/team" class="w-nav-link">TEAM</a><a href="/practice" class="w-nav-link">PRACTICEs</a><a href="/perspective" class="w-nav-link">PERSPECTIVE</a><a href="/join" class="w-nav-link">JOIN US</a><a href="/contact" class="w-nav-link">CONTACT US</a></nav>
        <div class="w-nav-button">
          <div class="icon-8 w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
  </div>
    <div class="header-image">
    <div class="div-block-6-dispute"style="background-image: url({{asset('uploads/'.$practice->practice_banner_image)}})">
      <div class="text-block-16">{{$practice->practice_name}}</div>
    </div>
  </div>
  <div>
    <div class="w-row">
      <div class="column-19 w-col w-col-9">
        <div class="w-container">
          <div class="text-block-32">{!!$pracTitle!!}</div>
          <div class="columns-8 w-row">
            <div style="display: none;" class="column-18 w-col w-col-1 w-col-tiny-tiny-stack">
                <div class="social-icons">
                <a href="https://www.linkedin.com/company/tripleoklaw-advocates/" target="_blank" class="link-block-6 w-inline-block">
                    <img src="{{asset('images/linkedin2_1linkedin2.png')}}" alt="" class="image-8">
                </a>
                <a href="https://twitter.com/TripleOKlawLLP" target="_blank" class="link-block-6 w-inline-block">
                    <img src="{{asset('images/twitter2_1twitter2.png')}}" alt="" class="image-9">
                </a>
                <a href="mailto:info@tripleoklaw.com" class="link-block-6-copy2 w-inline-block">
                    <img src="{{asset('images/mail2_1mail2.png')}}" alt="" class="image-10">
                </a>
                <a href="http://bit.ly/2pdmaFJ" target="_blank" class="link-block-6-copy w-inline-block">
                    <img src="{{asset('images/WA-Logo2_1WA Logo2.png')}}" alt="" class="image-11">
                </a>
            </div>
            </div>
            <div class="w-col w-col-11">
              <div class="text-block-33">{!!html_entity_decode($practice->practice_introduction)!!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="column-20-copy w-col w-col-3">
        <div class="text-block-35">Sub Practice Areas</div>
         @foreach($allPractices as $all)
        <a href="/pracategory_detail/{{$all->pracategory_slug}}" class="link-block-7 w-inline-block">
          <div class="text-block-43 text-block-44">{{$all->pracategory_name}}</div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
    
@if($otherTeam)
	<div class="other-specialists">
		<div class="text-block-39">Contacts</div>
		<div data-delay="4000" data-animation="slide" data-autoplay="1" data-duration="500" data-infinite="1" class="slider-3 w-slider">
		  <div class="mask-4 w-slider-mask">
		    @foreach($otherTeam->chunk(4) as $teams)
    			<div class="w-slide">
    				  <div class="columns-6 w-row">
    				    @foreach($teams as $teamChunk)  
    					<div class="column-7 w-col w-col-3">
    						<div>
    						    <a href="/team_detail/{{ $teamChunk->team_slug }}" class="link-block-3 w-inline-block"><img src="{{asset('uploads/'.$teamChunk->team_image)}}" alt=""></a>
    							<a href="/team_detail/{{ $teamChunk->team_slug }}" class="link-block-4 w-inline-block">
    								<div class="div-block-7">
    									<div class="text-block-17">{{$teamChunk->team_name}}</div>
    									<div class="text-block-18">{{$teamChunk->team_title}}</div>
    									<div class="text-block-18-copy">{{$teamChunk->practice_name}}<br></div>
    									<div class="div-block-8"><img src="{{asset('images/arrow_1arrow.png')}}" alt="" class="image-4"></div>
    								</div>
    							</a>
    						</div>
    					</div>
    					@endforeach
    				  </div>
    			</div>
			@endforeach
		  </div>
		  <div class="w-slider-arrow-left">
			<div class="icon-6 w-icon-slider-left"></div>
		  </div>
		  <div class="w-slider-arrow-right">
			<div class="icon-5 w-icon-slider-right"></div>
		  </div>
		  <div class="slide-nav-2 w-slider-nav w-round"></div>
		</div>
	</div>
@endif
    
<div class="footer">
    <div class="columns-9 w-row">
      <div class="w-col w-col-3"><a href="/" class="w-inline-block"><img src="{{asset('images/TripleOKlaw-Logo-copy3.png')}}" alt=""></a></div>
      <div class="w-col w-col-2">
        <div>
          <div class="div-block-13"><a href="/about" class="link-3">ABOUT US</a></div>
          <div class="div-block-13"><a href="/team" class="link-3">TEAM</a></div>
          <div class="div-block-13"><a href="/practice" class="link-3">PRACTICES</a></div>
          <div class="div-block-13"><a href="/perspective" class="link-3">PERSPECTIVE</a></div>
        </div>
      </div>
      <div class="w-col w-col-2">
        <div>
          <div class="div-block-13"><a href="/join" class="link-3">JOIN US</a></div>
          <div class="div-block-13"><a href="/contact" class="link-3">CONTACT US</a></div>
          <div class="div-block-13"><a href="/rankings" class="link-3">RANKINGS</a></div>
          <div class="div-block-13"></div>
        </div>
      </div>
      <div class="w-col w-col-2">
        <div class="text-block-40">5th Floor, Block C, ACK Garden House, 1st Ngong’ Avenue, off Bishops Road<br>Nairobi, Kenya</div>
      </div>
      <div class="w-col w-col-3">
        <div class="text-block-41">T - +254 (20) 272 7171, 272 7164</div>
        <div class="text-block-41">F - +254 (0) 709 830 100</div>
        <div class="text-block-41-copy">info@tripleoklaw.com</div>
      <div class="social-icons"><a href="https://www.linkedin.com/company/tripleoklaw-advocates/" target="_blank" class="link-block-6-copy13 w-inline-block"><img src="{{asset('images/linkedin3_1linkedin3.png')}}" alt="" class="image-8"></a><a href="https://twitter.com/TripleOKlawLLP" target="_blank" class="link-block-14 w-inline-block"><img src="{{asset('images/twitter3_1twitter3.png')}}" alt="" class="image-9"></a><a href="mailto:info@tripleoklaw.com" class="link-block-15 w-inline-block"><img src="{{asset('images/mail3_1mail3.png')}}" alt="" class="image-10"></a><a href="#" class="link-block-16 w-inline-block"><img src="{{asset('images/WA-Logo3_1WA Logo3.png')}}" alt="" class="image-11"></a></div>
      </div>
    </div>
</div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="{{asset('js/webflow.js')}}" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>