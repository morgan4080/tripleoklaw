<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Tue Aug 06 2019 11:03:47 GMT+0000 (UTC)  -->
<html data-wf-page="5d3adaf1454551607edb4625" data-wf-site="5d383105f1f7ed456e78eec3">
<head>
  <meta charset="utf-8">
  <title>Out And About</title>
  <meta content="Outandabout" property="og:title">
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
    .div-block-6-copy {
        -webkit-transform: scaleX(1);
        -moz-transform: scaleX(1);
        -o-transform: scaleX(1);
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
    <div class="div-block-6-copy"style="background-image: url({{asset('images/PERSPECTIVEIM.jpg')}})">
      <div class="text-block-16">Out and About</div>
    </div>
  </div>
  <div>
    <div class="columns-10 w-row">
      <div class="column-19 w-col w-col-9">
        <div class="w-container">
          <div class="text-block-32">{{$outAbout->article_title}}</div>
          <div class="div-block-14">
            <div class="text-block-33">{!!html_entity_decode(strip_tags($outAbout->article_body))!!}</div>
          </div>
        </div>
      </div>
      <div class="column-20 w-col w-col-3">
        <div class="text-block-35-copy3">Exceed Expectations… this is what we aim to achieve in all our undertakings. Delivering great legal services to clients is something we pursue passionately.</div>
      </div>
    </div>
  </div>
  <div class="w-row">
    <div class="column-23 w-col w-col-8">
      <div data-delay="4000" data-animation="slide" data-autoplay="1" data-duration="500" data-infinite="1" class="slider-4 w-slider">
        <div class="w-slider-mask">
          <div style="background-image: url({{asset('images/img1.jpg')}});" class="slide-4 w-slide"></div>
          <div style="background-image: url({{asset('images/img1.jpg')}});" class="slide-6 w-slide"></div>
        </div>
        <div class="left-arrow-3 w-slider-arrow-left">
          <div class="w-icon-slider-left"></div>
        </div>
        <div class="right-arrow-3 w-slider-arrow-right">
          <div class="w-icon-slider-right"></div>
        </div>
        <div class="slide-nav-4 w-slider-nav w-round"></div>
      </div>
    </div>
    <div class="column-24 w-col w-col-4">
      <div data-delay="4000" data-animation="slide" data-autoplay="1" data-duration="500" data-infinite="1" class="w-slider">
        <div class="w-slider-mask">
          <div style="background-image: url({{asset('images/IMG3.png')}});"class="slide-5 w-slide"></div>
          <div style="background-image: url({{asset('images/IMG3.png')}});"class="slide-7 w-slide"></div>
        </div>
        <div class="left-arrow-2 w-slider-arrow-left">
          <div class="w-icon-slider-left"></div>
        </div>
        <div class="right-arrow-2 w-slider-arrow-right">
          <div class="w-icon-slider-right"></div>
        </div>
        <div class="slide-nav-3 w-slider-nav w-round"></div>
      </div>
    </div>
  </div>
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