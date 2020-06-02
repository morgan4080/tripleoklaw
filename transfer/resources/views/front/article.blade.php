<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu Jul 18 2019 12:58:40 GMT+0000 (UTC)  -->
<html data-wf-page="5d24a0a2a07f786e4133d1e1" data-wf-site="5d12117a5cf1540428d8d090">
<head>
  <meta charset="utf-8">
  <title>Articles</title>
  <meta content="articles" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/tripleoklaw.webflow.css')}}" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="icons/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="icons/webclip.png" rel="apple-touch-icon">
  <style>
    .text-block-16 {
        background: #ffffff78;
    }
    .div-block-6-copy {
        -webkit-transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }
      .text-block-16 {
        -webkit-transform: scaleX(1);
        -moz-transform: scaleX(1);
        -o-transform: scaleX(1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
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
    <div class="div-block-6-copy">
      <div class="text-block-16">Publications</div>
    </div>
  </div>
  <div>
    <div class="w-row">
      <div class="column-19 w-col w-col-9">
        <div class="w-container">
          <div class="text-block-32">{{$article->article_title}}</div>
          <div class="columns-8 w-row">
            <div class="column-18 w-col w-col-1">
              <div class="social-icons"><a href="#" class="link-block-6 w-inline-block"><img src="{{asset('images/linkedin2_1linkedin2.png')}}" alt="" class="image-8"></a><a href="#" class="link-block-6 w-inline-block"><img src="{{asset('images/twitter2_1twitter2.png')}}" alt="" class="image-9"></a><a href="#" class="link-block-6-copy2 w-inline-block"><img src="{{asset('images/mail2_1mail2.png')}}" alt="" class="image-10"></a><a href="#" class="link-block-6-copy w-inline-block"><img src="{{asset('images/WA-Logo2_1WA Logo2.png')}}" alt="" class="image-11"></a></div>
            </div>
            <div class="w-col w-col-11">
              <div class="text-block-33">{!!html_entity_decode($article->article_body)!!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="column-20-copy w-col w-col-3">
        <div class="text-block-35">Practice Areas</div>
        @foreach($practices as $practice)
        <a href="/practice_detail/{{$practice->practice_slug}}" class="link-block-7 w-inline-block">
          <div class="text-block-43 text-block-44">{{$practice->practice_name}}</div>
        </a>
       @endforeach
      </div>
    </div>
  </div>
  @if($otherTeam)
   <div class="other-specialists">
      <div class="text-block-39">Key Contacts</div>
      <div class="columns-3 w-row">
        @foreach($otherTeam as $team)
        <div class="w-col w-col-3">
          <div><a href="/team_detail/{{$team->team_slug}}" class="link-block-3 w-inline-block"><img src="{{asset('uploads/'.$team->team_image)}}" alt=""></a>
            <a href="/team_detail/{{$team->team_slug}}" class="link-block-4 w-inline-block">
              <div class="div-block-7">
                <div class="text-block-17">{{$team->team_name}}</div>
                <div class="text-block-18">{{$team->team_title}}</div>
                <div class="text-block-18-copy">{{$team->practice_name}}<br>
                </div>
                <div class="div-block-8"><img src="{{asset('images/arrow_1arrow.png')}}" alt="" class="image-4"></div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
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
  <script src="js/webflow.js" type="text/javascript"></script> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript">
   $("#hide").click(function(){
  $("p").hide();
});

$("#show").click(function(){
  $("p").show();
});
 </script>
</body>
</html>