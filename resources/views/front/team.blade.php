<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jul 27 2019 11:16:16 GMT+0000 (UTC)  -->
<html data-wf-page="5d383105f1f7ed650678eef7" data-wf-site="5d383105f1f7ed456e78eec3">
<head>
  <meta charset="utf-8">
  <title>Our People</title>
  <meta content="Our People" property="og:title">
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
</head>
<body>
  <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
    <div class="w-row">
      <div class="column-26 w-col w-col-5 w-col-tiny-6"><a href="/" class="brand w-nav-brand w--current"><img src="{{asset('images/TripleOKlaw-Logo.png')}}" alt=""></a></div>
      <div class="column-25 w-col w-col-7 w-col-tiny-6">
        <nav role="navigation" class="nav-menu w-nav-menu"><a href="/about" class="nav-link w-nav-link">ABOUT US</a><a href="/team" class="w-nav-link">TEAM</a><a href="/practice" class="w-nav-link">PRACTICES</a><a href="/perspective" class="w-nav-link">PERSPECTIVE</a><a href="/join" class="w-nav-link">JOIN US</a><a href="/contact" class="w-nav-link">CONTACT US</a></nav>
        <div class="w-nav-button">
          <div class="icon-8 w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-image">
    <div class="div-block-6">
      <div class="text-block-16">TEAM</div>
    </div>
  </div>
  <div class="section-9">
    <div data-duration-in="300" data-duration-out="100" class="w-tabs">
      <div class="tabs-menu w-tab-menu">
        <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link w--current">

          <div>LEADERSHIP</div>
        </a>
        <a data-w-tab="Tab 2" class="tab-link-tab-2 w-inline-block w-tab-link">
          <div class="text-block-26">LAWYERS</div>
        </a>
        <a data-w-tab="Tab 3" class="tab-link-tab-3 w-inline-block w-tab-link">
          <div class="text-block-27">OPERATIONS</div>
        </a>
      </div>
        <div class="tabs-content w-tab-content">
            <div style="padding-bottom: 50px;" data-w-tab="Tab 1" class="leadership-tab w-tab-pane w--tab-active">
                @foreach ($leadership->chunk(4) as $chunk)
                    <div class="columns-3 w-row">
                        @foreach ($chunk as $manage)
                            <div class="w-col w-col-3">
                                <div><a href="/team_detail/{{$manage->team_slug}}" class="link-block-3 w-inline-block"><img src="{{asset('uploads/'.$manage->team_image)}}" alt=""></a>
                                    <a href="/team_detail/{{$manage->team_slug}}" class="link-block-4 w-inline-block">
                                        <div class="div-block-7">
                                            <div class="text-block-17">{{$manage->team_name}}</div>
                                            <div class="text-block-18">{{$manage->team_title}}<br></div>
                                            <div class="text-block-18-copy">{{$manage->practice_name}}<br></div>
                                            <div class="div-block-8"><img src="{{asset('images/arrow_1arrow.png')}}" alt="" class="image-4"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>

            <div data-w-tab="Tab 2" class="people-tab w-tab-pane">
                @foreach ($allPeople->chunk(4) as $chunk)
                    <div class="columns-3 w-row">
                        @foreach ($chunk as $people)
                            <div class="w-col w-col-3">
                                <div>
                                    <a href="/team_detail/{{$people->team_slug}}" class="link-block-3 w-inline-block">
                                        <img src="{{asset('uploads/'.$people->team_image)}}" alt="">
                                    </a>
                                    <a href="/team_detail/{{$people->team_slug}}" class="link-block-4 w-inline-block">
                                        <div class="div-block-7">
                                            <div class="text-block-17">{{$people->team_name}}</div>
                                            <div class="text-block-18">{{$people->team_title}}<br></div>
                                            <div class="div-block-8"><img src="{{asset('images/arrow_1arrow.png')}}" alt="" class="image-4"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div style="padding-bottom: 50px;" data-w-tab="Tab 3" class="management-tab w-tab-pane">
                @foreach ($management->chunk(4) as $chunk)
                    <div class="columns-3 w-row">
                        @foreach ($chunk as $manage)
                            <div class="w-col w-col-3">
                                <div>
                                    <a href="#" class="link-block-3 w-inline-block">
                                        <img src="{{asset('uploads/'.$manage->team_image)}}" alt="">
                                    </a>
                                    {{--/team_detail/{{$manage->team_slug}} /team_detail/{{$people->team_slug}}--}}
                                    <a href="#" class="link-block-4 w-inline-block">
                                        <div class="div-block-7">
                                            <div class="text-block-17">{{$manage->team_name}}</div>
                                            <div class="text-block-18">{{$manage->team_title}}<br></div>
                                            <div class="text-block-18-copy"> {{$manage->practice_name}}</div>
                                            <div class="div-block-8"><img src="{{asset('images/arrow_1arrow.png')}}" alt="" class="image-4"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
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
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
