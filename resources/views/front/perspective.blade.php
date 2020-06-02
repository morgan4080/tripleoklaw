<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu Jul 18 2019 12:58:40 GMT+0000 (UTC)  -->
<html data-wf-page="5d383105f1f7ed5b0e78eeeb" data-wf-site="5d383105f1f7ed456e78eec3">
<head>
  <meta charset="utf-8">
  <title>Perspective</title>
  <meta content="Perspective" property="og:title">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="Webflow" name="generator">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/tripleoklaw.webflow.css')}}" rel="stylesheet" type="text/css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="{{asset('icons/favicon.png')}}" rel="shortcut icon" type="image/x-icon">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
    <style>
        @media (max-width: 479px) {
            .column-12 {
                padding-bottom: 20px;
            }
        }
        .w-tab-content {
            padding-bottom: 90px;
        }
        div.column-11.w-col.w-col-4 > a > img {
            width: 461px;
            height: auto;
        }
        .pagination-sm{
            display: inline-block;
            margin-top: 3.75em;
        }
        .pagination-sm li{
            display: inline-block;
        }
        a {
            text-decoration: none !important;
        }
        .w-col-9 {
            margin-left: 20vw;
        }
        .page-item.active .page-link {
            background-color: #00aeef;
        }
        .page-link {
            color: #00aeef;
        }
        .column-11 {
            padding: 40px 20px 20px 20px;
        }
        .text-block-6-copy2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
 <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
   <div class="w-row">
      <div class="column-26 w-col w-col-5 w-col-tiny-6"><a href="/" class="brand w-nav-brand w--current"><img src="{{asset('images/TripleOKlaw-Logo.png')}}" alt=""></a></div>
      <div class="column-25 w-col w-col-7 w-col-tiny-6">
        <nav role="navigation" class="nav-menu w-nav-menu"><a href="/about" class="w-nav-link">about us</a><a href="/team" class="w-nav-link">TEAM</a><a href="/practice" class="w-nav-link">PRACTICEs</a><a href="/perspective" class="w-nav-link">PERSPECTIVE</a><a href="/join" class="w-nav-link">JOIN US</a><a href="/contact" class="w-nav-link">CONTACT US</a></nav>
        <div class="w-nav-button">
          <div class="icon-8 w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
 </div>
<div class="header-image">
<div class="div-block-6-copy-copy">
  <div class="text-block-16">PERSPECTIVE</div>
</div>
</div>
<div>
<div data-duration-in="1000" data-duration-out="500" class="w-tabs">
  <div class="tabs-menu-2 w-tab-menu">
      <a data-w-tab="Tab 1" class="tab-link-tab-1-2 w-inline-block w-tab-link w--current">
          <img src="{{asset('images/newspaper_1newspaper.png')}}" alt="" class="image-5">
          <div class="text-block-19">ALL NEWS</div>
      </a>
      <a data-w-tab="Tab 2" class="tab-link-tab-2-2 w-inline-block w-tab-link">
          <img src="{{asset('images/publication_1publication.png')}}" alt="" class="image-5">
          <div class="text-block-19">PUBLICATIONS</div>
      </a>
      <a data-w-tab="Tab 3" class="tab-link-tab-3-2 w-inline-block w-tab-link">
          <img src="{{asset('images/press_1press.png')}}" alt="" class="image-5">
          <div class="text-block-19">PRESS RELEASE</div>
      </a>
      <a data-w-tab="Tab 4" class="tab-link-tab-4 w-inline-block w-tab-link">
          <img src="{{asset('images/video_1video.png')}}" alt="" class="image-5">
          <div class="text-block-19">VIDEOS</div>
      </a>
      <a data-w-tab="Tab 5" class="tab-link-tab-5 w-inline-block w-tab-link">
          <img src="{{asset('images/out_1out.png')}}" alt="" class="image-5-copy">
          <div class="text-block-19">OUT &amp; ABOUT</div>
      </a>
      <a data-w-tab="Tab 6" class="tab-link-tab-5 w-inline-block w-tab-link">
          <img src="{{asset('images/legalalerts.png')}}" alt="" class="image-5">
          <div class="text-block-19">LEGAL ALERTS</div>
      </a>
  </div>
  <div class="w-tab-content">
    <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
       @foreach($articles->chunk(3) as $articleChunk)
        <div class="w-row">
            @foreach($articleChunk as $article)
            @if($article->category_name =="Out and About")
                <div class="column-11 w-col w-col-4">
                    <a style="width: 100%;" href="/out_about/{{$article->article_slug}}" class="w-inline-block">
                        <div class="dosmaller" >
                            <img style="width: 100%;max-width: 420px;" src="{{asset('uploads/'.$article->article_image)}}" srcset="{{asset('uploads/'.$article->article_image)}} 800w, {{asset('uploads/'.$article->article_image)}} 1080w, {{asset('uploads/'.$article->article_image)}} 1366w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 29vw, (max-width: 4553px) 30vw, 1366px" alt="">
                        </div>
                    </a>
                    <a style="width: 100%;" href="/out_about/{{$article->article_slug}}" class="link-block w-inline-block">
                        <div class="text-block-6-copy2">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
                        <div class="text-block-7 text-block-11-copy">{{$article->article_title}}</div>
                        <div class="text-block-8-copy">{!!substr(strip_tags($article->article_body), 0, 220)!!}...</div>
                    </a>
                    <a href="/out_about/{{$article->article_slug}}" class="link-copy">Learn More</a>
                </div>
            @else
                <div class="column-11 w-col w-col-4">
                    <a style="width: 100%;" href="/articles/{{$article->article_slug}}" class="w-inline-block">
                        <img style="width: 100%;max-width: 420px;" src="{{asset('uploads/'.$article->article_image)}}" srcset="{{asset('uploads/'.$article->article_image)}} 800w, {{asset('uploads/'.$article->article_image)}} 1080w, {{asset('uploads/'.$article->article_image)}} 1366w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 29vw, (max-width: 4553px) 30vw, 1366px" alt="">
                    </a>
                    <a style="width: 100%;" href="/articles/{{$article->article_slug}}" class="link-block w-inline-block">
                        <div class="text-block-6-copy2">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
                        <div class="text-block-7 text-block-11-copy">{{$article->article_title}}</div>
                        <div class="text-block-8-copy">{!!substr(strip_tags($article->article_body), 0, 220)!!}...</div>
                    </a>
                    <a href="/articles/{{$article->article_slug}}" class="link-copy">Learn More</a>
                </div>
            @endif
            @endforeach
        </div>
      @endforeach
    </div>
    <div data-w-tab="Tab 2" class="w-tab-pane">
     @foreach($publications->chunk(3) as $articleChunk)
        <div class="w-row">
            @foreach($articleChunk as $article)
                <div class="column-11 w-col w-col-4">
                    <a style="width: 100%;" href="/articles/{{$article->article_slug}}" class="w-inline-block">
                        <img style="width: 100%;max-width: 420px;" src="{{asset('uploads/'.$article->article_image)}}" srcset="{{asset('uploads/'.$article->article_image)}} 800w, {{asset('uploads/'.$article->article_image)}} 1080w, {{asset('uploads/'.$article->article_image)}} 1366w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 29vw, (max-width: 4553px) 30vw, 1366px" alt="">
                    </a>
                    <a style="width: 100%;" href="/articles/{{$article->article_slug}}" class="link-block w-inline-block">
                        <div class="text-block-6-copy2">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
                        <div class="text-block-7 text-block-11-copy">{{$article->article_title}}</div>
                        <div class="text-block-8-copy">{!!html_entity_decode(substr(strip_tags($article->article_body), 0, 350))!!}...</div>
                    </a>
                    <a href="/articles/{{$article->article_slug}}" class="link-copy">Learn More</a>
                </div>
            @endforeach
        </div>
     @endforeach
    </div>
    <div data-w-tab="Tab 3" class="w-tab-pane">
    @foreach($pressRelease->chunk(3) as $articleChunk)
        <div class="w-row">
            @foreach($articleChunk as $article)
                <div class="column-11 w-col w-col-4">
                    <a style="width: 100%;max-width: 420px;" href="/articles/{{$article->article_slug}}" class="w-inline-block">
                        <img style="width: 100%;" src="{{asset('uploads/'.$article->article_image)}}" srcset="{{asset('uploads/'.$article->article_image)}} 800w, {{asset('uploads/'.$article->article_image)}} 1080w, {{asset('uploads/'.$article->article_image)}} 1366w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 29vw, (max-width: 4553px) 30vw, 1366px" alt="">
                    </a>
                    <a style="width: 100%;max-width: 420px;" href="/articles/{{$article->article_slug}}" class="link-block w-inline-block">
                        <div class="text-block-6-copy2">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
                        <div class="text-block-7 text-block-11-copy">{{$article->article_title}}</div>
                        <div class="text-block-8-copy">{!!html_entity_decode(substr(strip_tags($article->article_body), 0, 350))!!}...</div>
                    </a>
                    <a href="/articles/{{$article->article_slug}}" class="link-copy">Learn More</a>
                </div>
            @endforeach
        </div>
    @endforeach
    </div>
    <div data-w-tab="Tab 4" class="w-tab-pane">
      @foreach($videos as $video)
      <div class="columns-12-copy-copy w-row">
        <div class="column-11-copy w-col w-col-3">
          <a href="/articles/{{$video->article_slug}}" class="link-block w-inline-block">
    <div class="text-block-6-copy2-copy">{{\Carbon\Carbon::parse($video->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
            <div class="text-block-7 text-block-11-copy">{{$video->article_title}}</div>
            <div class="text-block-8-copy">{!!html_entity_decode(substr(strip_tags($video->article_body), 0, 250))!!}...</div>
          </a>
        </div>
        <div style="margin-left: unset;" class="column-12 w-col w-col-9">
          <div style="padding-top:56.17021276595745%" id="w-node-2f5a301a470c-5133d1cb" class="w-embed-youtubevideo"><iframe src="{{$video->article_video_url}}?rel=0&amp;controls=1&amp;autoplay=0&amp;mute=0&amp;start=0" frameborder="0" style="position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:auto" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></div>
        </div>
      </div>
        @endforeach
    </div>
    <div data-w-tab="Tab 5" class="w-tab-pane">
         @foreach($outAndAbout->chunk(3) as $articleChunk)
         <div class="w-row">
            @foreach($articleChunk as $article)
                <div class="column-11 w-col w-col-4">
                    <a style="width: 100%;" href="/out_about/{{$article->article_slug}}" class="w-inline-block">
                        <img style="width: 100%;max-width: 420px;" src="{{asset('uploads/'.$article->article_image)}}" srcset="{{asset('uploads/'.$article->article_image)}} 800w, {{asset('uploads/'.$article->article_image)}} 1080w, {{asset('uploads/'.$article->article_image)}} 1366w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 29vw, (max-width: 4553px) 30vw, 1366px" alt="">
                    </a>
                    <a style="width: 100%;max-width: 420px;" href="/out_about/{{$article->article_slug}}" class="link-block w-inline-block">
                        <div class="text-block-6-copy2">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
                        <div class="text-block-7 text-block-11-copy">{{$article->article_title}}</div>
                        <div class="text-block-8-copy">{!!html_entity_decode(substr(strip_tags($article->article_body), 0, 350))!!}...</div>
                    </a>
                    <a href="/out_about/{{$article->article_slug}}" class="link-copy">Learn More</a>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <div data-w-tab="Tab 6" class="w-tab-pane">
      @foreach($legalAlerts->chunk(3) as $articleChunk)
         <div class="w-row">
            @foreach($articleChunk as $article)
                <div class="column-11 w-col w-col-4">
                    <a style="width: 100%;" href="/articles/{{$article->article_slug}}" class="w-inline-block">
                        <img style="width: 100%;max-width: 420px;" src="{{asset('uploads/'.$article->article_image)}}" srcset="{{asset('uploads/'.$article->article_image)}} 800w, {{asset('uploads/'.$article->article_image)}} 1080w, {{asset('uploads/'.$article->article_image)}} 1366w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 95vw, (max-width: 991px) 29vw, (max-width: 4553px) 30vw, 1366px" alt="">
                    </a>
                    <a style="width: 100%;max-width: 420px;" href="/articles/{{$article->article_slug}}" class="link-block w-inline-block">
                        <div class="text-block-6-copy2">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}<span> - {{$article->article_excerpt ?? ''}}</span></div>
                        <div class="text-block-7 text-block-11-copy">{{$article->article_title}}</div>
                        <div class="text-block-8-copy">{!!html_entity_decode(substr(strip_tags($article->article_body), 0, 350))!!}...</div>
                    </a>
                    <a href="/articles/{{$article->article_slug}}" class="link-copy">Learn More</a>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
    <div>
        <div class="wrapper">
            <div style="position: unset;" class="container">
                <ul id="pagination-demo" class="pagination-sm"></ul>
            </div>
        </div>
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
  <script src="{{asset('js/webflow.js')}}" type="text/javascript"></script>
  <script src="https://pagination.js.org/dist/2.1.4/pagination.min.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js" type="text/javascript"></script>
  <script>
  var content = document.querySelector("body > div:nth-child(3) > div > div.w-tab-content > div.w-tab-pane.w--tab-active");
  var arrChunks = _.chunk(content.children, 2);
  _.forEach(content.children, (x) => {
    x.style.display = "none";
  });
  
  _.forEach(document.querySelector("body > div:nth-child(3) > div > div.tabs-menu-2.w-tab-menu").children, (x) => {x.addEventListener("click", (y)=>{
      // $(".container").html("");
      let counter = 0;
      var smInt = setInterval(function(){
         console.log(y.srcElement.innerText);
         $("#pagination-demo").css('display', 'none');
         let cnt = $("body > div:nth-child(3) > div > div.w-tab-content > div.w-tab-pane.w--tab-active");
         let arr = _.chunk(cnt.children(), 2);
         $(".container").html(`<ul id="pagination-demo2" class="pagination-sm"></ul>`);
         console.log(arr.length);
         if(arr.length !== 0) {
             $('#pagination-demo2').twbsPagination({
            totalPages: arr.length,
            visiblePages: arr.length,
            next: 'Next',
            prev: 'Prev',
            onPageClick: function (event, page) {
                _.forEach($("body > div:nth-child(3) > div > div.w-tab-content > div.w-tab-pane.w--tab-active").children(), (x) => {
                    x.style.display = "none";
                });
                
                let newPG = page-=1;
                
                console.log("paginationg", newPG);
                
                _.forEach(arr[newPG], (x) => {
                    x.style.display = "block";
                });
            }
          });
          counter = counter + 1
          console.log("counters", counter);
          console.log(this);
          (counter == 2) ? clearInterval(smInt) : console.log("not yet");
        
        } else {
             clearInterval(smInt)
        }
      }, 1000);
  });});
  
  $( document ).ready(function() {
      $('#pagination-demo').twbsPagination({
        totalPages: arrChunks.length,
        visiblePages: arrChunks.length,
        next: 'Next',
        prev: 'Prev',
        onPageClick: function (event, page) {
            _.forEach(content.children, (x) => {
                x.style.display = "none";
            });
            let newPG = page-=1;
            
            console.log("paginationg", newPG);
            
            _.forEach(arrChunks[newPG], (x) => {
                x.style.display = "block";
            });
        }
      });
  });
  </script>
</body>
</html>
