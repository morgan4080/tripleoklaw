<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jul 27 2019 11:16:16 GMT+0000 (UTC)  -->
<html data-wf-page="5d383105f1f7ed7fdc78eef5" data-wf-site="5d383105f1f7ed456e78eec3">

<head>
  <meta charset="utf-8">
  <title>{{$personDetails->team_name}} | TripleOK</title>
  <meta content="Janet Othero" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/tripleoklaw.webflow.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="{{asset('icons/favicon.png')}}" type="image/x-icon">
  <link href="{{asset('icons/webclip.png')}}" rel="apple-touch-icon">
  <style>
      .chat-output {
            height: 72%;
            margin-top: 10px;
        }
      .modal-container {
        position: fixed;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 1001;
        display: block;
        width: 30vw;
        height: 100vh;
        margin-left: auto;
        padding: 0px;
        float: none;
        clear: none;
        background-color: transparent;
    }
    .w-input, .w-select {
        border: 1px solid #093c5a;
    }
    .text-block-3 {
        line-height: 2;
    }
    .text-block-46 {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .form-block {
        background-color: #fff;
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 1001;
        margin-right: auto;
        margin-left: auto;
        text-align: center;
        padding: 20px;
        overflow-y: scroll;
    }
    .image-7 {
        display: none;
    }
    @media screen and (max-width: 767px) {
        .form-block {
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 0;
            padding-right: 0;
        }
        .div-block-23 {
            width: 70vw;
        }
        .text-block-3 {
            padding-left: 20px;
            padding-right: 20px;
        }
        .text-block-25 {
            padding-top: 15px;
            margin-bottom: 10px;
            margin-right: 40px;
        }
        .column-30 {
            padding-right: 0px;
            width: 98vw;
        }
        textarea.w-input, textarea.w-select {
            height: auto;
            width: 95vw;
        }
        .w-input, .w-select {
            border: 1px solid #093c5a;
            width: 95vw;
        }
        .div-block-21 {
            margin-top: 125px;
        }
        .mask-8 {
            height: 55vh; 
        }
    }
    .form-block {
        padding: 0;
    }
    @media screen and (max-width: 479px) {
        .chat-output {
            height: 75%;
            margin-top: 10px;
        }
        .modal-container{
            width: 100%;
            margin-left: 0;
            margin-right: 0;
            height: 100%;
        }
        .form-block {
            padding-top: 0;
            padding-bottom: 20px;
            padding-left: 0;
            padding-right: 0;
        }
        .div-block-23 {
           width: 100%;
        }
        .text-block-3 {
            padding-left: 20px;
            padding-right: 20px;
        }
        .text-block-25 {
            padding-top: 15px;
            margin-bottom: 10px;
            margin-right: 40px;
        }
        .column-30 {
            padding-right: 0px;
            width: 98vw;
        }
        textarea.w-input, textarea.w-select {
            height: auto;
            width: 95vw;
        }
        .w-input, .w-select {
            border: 1px solid #093c5a;
            width: 95vw;
        }
        .div-block-21 {
            margin-top: 125px;
        }
        .mask-8 {
            height: 55vh; 
        }
    }
    .w-slider {
        background: #ebeced;
    }
    .mask-8 {
        height: 62vh; 
    }
  </style>
    <style>
        .text-block-16-copy {
            line-height: 1;
        }
        
        .text-block-37 {
            line-height: 1;
        }
        
        @media screen and (max-width: 767px) {
            .column-16 {
                height: 70vh;
                padding-left: 30px;
            }
            .related-articles {
                padding-left: 30px;
            }
            .column-21 {
                padding-left: 0;
            }
            .column-17 {
                height: 56vh;
            }
            .other-specialists {
                padding-left: 30px;
            }
            .column-20-copy {
                padding-bottom: 90px;
            }
            
            .user-input {
              border: 1px solid #80808085;
              float: left;
              width: 85%;
              margin-bottom: 0px;
              border: 1px none #093c5a;
              border-radius: 20px;
            }
        }
    </style>
      <style>
.modal {
	overflow-y: hidden;
	overflow-x: hidden;
}
.user-message {
  text-align: left;
  margin-bottom: 10px;
  position: relative;
  width: auto;
  padding-left: 20px;
  padding-right: 10px;
}
.user-message .message {
  background: #093c5a;
  margin-right: 50%;
  color: white;
  padding: 5px;
  border-radius: .4em;
}
.bot-message {
  text-align: right;
  margin-bottom: 10px;
  position: relative;
  width: auto;
  padding-left: 10px;
  padding-right: 20px;
}
.bot-message .message {
  background: #eee;
  margin-left: 50%;
  padding: 5px;
  border-radius: .4em;
}
.user-message:after {
  content: '';
  position: absolute;
  left: 0;
  top: 60%;
  width: 0;
  height: 0;
  border: 23px solid transparent;
  border-right-color: #093c5a;
  border-left: 0;
  border-bottom: 0;
  margin-top: -11.5px;
}
.bot-message:after {
  content: '';
  position: absolute;
  right: 0;
  top: 50%;
  width: 0;
  height: 0;
  border: 23px solid transparent;
  border-left-color: #eee;
  border-right: 0;
  border-bottom: 0;
  margin-top: -11.5px;
}
.user-input {
  border: 1px none #093c5a;
  float: left;
  border-radius: 20px;
  width: 85%;
}

.modal-bg {
  display: block;
  width: 100%;
  height: 100vh;
  background-color: transparent;
}

.form-block.whatsapp {
    top: 23%;
    overflow: hidden;
    height: 77%;
    padding-top: 0px;
    background-position: 0% 0%;
    background-size: cover;
    background-repeat: no-repeat;
}
.form-header {
    height: 10%;
    background-color: #093c5a;
}
.back {
    height: 100%;
    margin-left: 10px;
    float: left;
    background-color: transparent;
    background-position: 50% 50%;
    background-size: 20px;
    background-repeat: no-repeat;
}

.chat-output {
	overflow-y: scroll;
}
.chat-output::-webkit-scrollbar {
  width: 10px;
}

.chat-output::-webkit-scrollbar-thumb {
  background: -webkit-gradient(linear,left top,left bottom,from(#21e4c6),to(#030527));
  background: linear-gradient(to left, #21e4c6, #010326);
  border-radius: 5px;
  -webkit-box-shadow: inset 2px 2px 2px #161619, inset -2px -2px 2px rgba(0,0,0,.25);
  box-shadow: inset 2px 2px 2px #161619, inset -2px -2px 2px rgba(0,0,0,.25);
}
.chat-output::-webkit-scrollbar-track {
        background: linear-gradient(to right,#201c2917,#201c291f 1px,#100e1724 1px,#100e1700);
}

#btn {
    margin-left: 5px;
    border-radius: 20px;
    background-color: #093c5a;
    background-position: 50% 50%;
    background-size: 15px;
    background-repeat: no-repeat;
    margin-top: 5px;
    min-height: 30px;
}

.column-46 {
    width: 100%;
}
@media screen and (max-width: 767px) {
    .form-block.whatsapp {
        top: 0%;
        height: 100vh;
    }
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
        <nav role="navigation" class="nav-menu w-nav-menu"><a href="/about" class="nav-link w-nav-link">ABOUT US</a><a href="/team" class="w-nav-link">TEAM</a><a href="/practice" class="w-nav-link">PRACTICEs</a><a href="/perspective" class="w-nav-link">PERSPECTIVE</a><a href="/join" class="w-nav-link">JOIN US</a><a href="/contact" class="w-nav-link">CONTACT US</a></nav>
        <div class="w-nav-button">
          <div class="icon-8 w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-image">
    <div class="single-page-image modal-parent">
      <div class="columns-14 w-row">
        <div class="column-16 w-col w-col-5">
          <div>
            <div class="text-block-16-copy">{{$personDetails->team_name}}</div>
            <div class="text-block-28">{{$personDetails->team_title}}</div>
            <div class="text-block-29">
                {{$personDetails->team_email}}<br><br> {{$personDetails->phone_number}}
            </div>
            <a data-w-id="9fa7ba63-8d1b-554b-7920-a26da8d34605" class="modal-button button-3 w-button" href="#">BOOK APPOINTMENT</a>
            <div id="app" style="display:none" class="modal-container w-clearfix">
	            <a href="#" class="link-block-69 w-inline-block w-clearfix">
		            <img src="{{asset('images/Close_1Close.png')}}" data-w-id="9fa7ba63-8d1b-554b-7920-a26da8d3460b" alt="" class="image-7">
		        </a>
	            <div class="modal-bg"></div>
	            <div class="modal">
	                <div style="background-image: url({{asset('images/bg.png')}});" class="form-block whatsapp w-form">
                        <div class="form-header w-clearfix"><span style="background-image: url({{asset('images/back.png')}});" class="back w-button"></span></div>
                        <div id="chat-output" class="chat-output"></div>
    	                <form id="user-input-form" :model="form" @submit.prevent="makeSubmit">
                        <div class="div-block-23">
                          <div class="columns-18 w-row">
                        <div class="column-46 w-col w-col-11">
                          <input type="text" maxlength="256" required="" id="user-input" v-model="form.messa" class="user-input w-input">
                          <span id="btn" class="button-3 w-button"></span>
                        </div>
                        </div>
                        </div>
                      </form>
                    </div>
	            </div>
	        </div>
        </div>
    </div>
        <div class="column-17 w-col w-col-4" style="background: no-repeat url({{asset('/uploads/'.$personDetails->inner_team_image)}});background-size: cover;"></div>
        <div class="column-31 w-col w-col-3">
          <div class="text-block-30">PRACTICE AREAS</div>
          @foreach($practiceName as $name)
          <div class="text-block-31">{{$name}}</div>

          @endforeach
        </div>
      </div>
    </div>
  </div>
  
    <div class="lawyer-description">
      <div class="w-row">
        <div class="column-19 w-col w-col-9">
          <div class="w-container">
            <div class="text-block-32">{!!html_entity_decode($teamTitle)!!}</div>
            <div class="columns-8 w-row">
              <div style="display: block !important;" class="column-18 w-col w-col-1 exception">
            <div class="social-icons"><a href="https://www.linkedin.com/company/tripleoklaw-advocates/" class="link-block-6 w-inline-block"><img src="{{asset('images/linkedin2_1linkedin2.png')}}" alt="" class="image-8"></a><a href="https://twitter.com/TripleOKlawLLP" class="link-block-6 w-inline-block"><img src="{{asset('images/twitter2_1twitter2.png')}}" alt="" class="image-9"></a><a href="mailto:info@tripleoklaw.com" class="link-block-6-copy2 w-inline-block"><img src="{{asset('images/mail2_1mail2.png')}}" alt="" class="image-10"></a><a href="https://wa.me/254792722428?text=Welcome%20to%20TripleOKLaw%20LLP.%20Send%20this%20message%20to%20get%20in%20contact%20with%20us" class="link-block-6-copy w-inline-block"><img src="{{asset('images/WA-Logo2_1WA Logo2.png')}}" alt="" class="image-11"></a></div>
              </div>
              <div class="w-col w-col-11">
                <div class="text-block-49">{!!html_entity_decode($personDetails->team_introduction)!!}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="column-20-copy w-col w-col-3">
          <div class="text-block-35">QUALIFICATIONS</div>
          <div class="text-block-34">{!!html_entity_decode($personDetails->team_activities)!!}<br><br>‍<strong>EDUCATION</strong><br>{!!html_entity_decode($personDetails->education)!!}</div>
          <div class="text-block-35-copy">ASSOCIATIONS</div>
          <div class="text-block-34">{!!html_entity_decode($personDetails->team_law_school)!!}</div>
        </div>
      </div>
    </div>
    <div class="related-articles">
      <div class="text-block-36">RELATED ARTICLES</div>
      <div class="w-row">
        @foreach($articles as $article)
        <div class="column-21 w-col w-col-6">
          <div>
            <div class="text-block-37">{{$article->article_title}}</div>
            <div class="text-block-38">{!!html_entity_decode($article->article_body)!!}</div><a href="/articles/{{$article->article_slug}}" class="link-2">LEARN MORE</a></div>
        </div>
        @endforeach
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
               <div class="social-icons"><a href="https://www.linkedin.com/company/tripleoklaw-advocates/" target="_blank" class="link-block-6-copy13 w-inline-block"><img src="{{asset('images/linkedin3_1linkedin3.png')}}" alt="" class="image-8"></a><a href="https://twitter.com/TripleOKlawLLP" target="_blank" class="link-block-14 w-inline-block"><img src="{{asset('images/twitter3_1twitter3.png')}}" alt="" class="image-9"></a><a href="mailto:info@tripleoklaw.com" class="link-block-15 w-inline-block"><img src="{{asset('images/mail3_1mail3.png')}}" alt="" class="image-10"></a><a href="https://wa.me/254792722428?text=Welcome%20to%20TripleOKLaw%20LLP.%20Send%20this%20message%20to%20get%20in%20contact%20with%20us" class="link-block-16 w-inline-block"><img src="{{asset('images/WA-Logo3_1WA Logo3.png')}}" alt="" class="image-11"></a></div>
      </div>
    </div>
  </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('js/webflow.js')}}" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
    
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vuex@3.1.1/dist/vuex.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
      
    <script>
    const htp = axios.create({});
    function send(payload) {
    	let url = "https://zl1ifjuns6.execute-api.us-east-1.amazonaws.com/dev/reply";
    	const params = new URLSearchParams();
    	let text = payload.details.message;
    	let uid = payload.details.userId;
    	let who = payload.details.who;
        console.log('payload to server', payload);
        params.append('message', text.toString());
        params.append('uid', uid.toString());
        params.append('who', who.toString());

        return new Promise((resolve, reject) => {
            htp.defaults.headers.common['CSRF-Token'] = payload.sec;
            htp({
                method: 'POST',
                headers: {'content-type':'application/x-www-form-urlencoded'},
                data: params,
                url
            }).then((res) => {
                if(res.status === 200) {
                    resolve(res.data);
                } else{
                    reject("API error: " + res);
                }
            }).catch((err) => {
                if (!err.response) {
                    // network error
                    console.log('Error: Network Error');
                }
                reject("Axios issue: " + err)
            })
        });
    }
    function doGet() {
    	console.log('handler getting csrf token');
    	let url = "https://zl1ifjuns6.execute-api.us-east-1.amazonaws.com/dev/";
      return new Promise((resolve, reject) => {
      htp({
      	method: 'GET',
        url
      })
      .then((res) => {
        if(res.status === 200) {
        	console.log('resolving', res.data);
          resolve(res.data);
        } else {
          reject("API error: " + res);
        }
      }).catch((err) => {
        if (!err.response) {
          console.log('Error: Network Error');
        }
        reject("Axios issue: " + err)
      })
     })
    }
    let store = new Vuex.Store({
      state: () => ({
        botMessages: '',
        token: '',
        userId: ''
      }),
      actions: {
      	doChat({commit}, payload) {
      	    console.log('do chat payload', payload);
        	return new Promise((resolve, reject) => {
          	send(payload)
            .then(results => {
              console.log('got-response', results);
              let msg;
              if (typeof(results.message) === 'string') {
                  if(results.message.substring(0, 1) === '{') {
                      msg = JSON.parse(results.message);
                      console.log("JSON DATA parsed", msg)
                  } else {
                      msg = results.message;
                  }
              } else {
                  msg = results.message;
              }
              commit('setMsg', msg);
              resolve(msg);
            }).catch(error => reject(error))
          })
        },
        doSecurity({commit}) {
        	return new Promise((resolve, reject) => {
          	doGet()
            .then(results => {
            console.log('vuex getting csrf token', results);
            commit('setToken', results.security);
              resolve(results.security);
            }).catch(error => reject(error))
          })
        },
        doSetId({commit}, payload) {
      	  return new Promise((resolve => {
            if (payload) {
              let uid = 'uid-' + Math.random().toString(36).substr(2, 16);
              commit('setId', uid);
              resolve(uid)
            }
          }));
        }
      },
      mutations: {
        setId(state, payload = '') {
            state.userId = payload;
        },
        setMsg(state, payload = '') {
        	state.botMessages = payload;
        },
        setToken(state, payload = '') {
        	state.token = payload;
        }
      }
    });

    new Vue({
      el: "#app",
      data: {
        isActive: '',
        incoming: '',
        who: '',
        form: {
          messa: ''
        },
        chatting: true
      },
      mounted: function() {
      	$(document).ready (() => {
        	$('#btn').replaceWith( `<button style="background-image: url({{asset('images/send.png')}});" id="btn" type="btn submit" class="button-3 w-button" >` + $( this ).text() + `</div>` );
         	$('#btn').attr('type', 'submit');
      	});
      	let outputArea = $("#chat-output");
      	this.who = document.querySelector("body > div.header-image > div > div > div.column-16.w-col.w-col-5 > div > div.text-block-16-copy").innerText;
        this.getSec();
        this.sayHi("hello");
    
        $("#user-input-form").on("submit", () => {
          let msg = $("#user-input").val();
          outputArea.append(
            `<div class='bot-message'>
              <div class='message'>
                ${msg}
              </div>
            </div>`
          );
          let elem = document.getElementById('chat-output');
          elem.scrollTo(0, elem.scrollHeight);
          $("#user-input").val("");
        });
        let modal = $(".modal-container");
        $(".back").on("click", () => {
          modal.css("display", "none")
        });
      },
      methods: {
        getIncoming: function () {
          console.log('incoming text to append', this.incoming);
          return this.incoming
        },
        genUserId: function () {
      	  console.log('logging initial state', store.state);
      	  return new Promise(resolve => {
            if (store.state.userId === '') {
              store.dispatch('doSetId', true).then((result) => {
                resolve(result)
              }).catch((err) => {
                console.log(err)
              });
            } else {
              console.log('user id already exist', store.state.userId);
              resolve(store.state.userId)
            }
          })
        },
        makeSubmit: function () {
          this.genUserId().then(x => {
            store.dispatch('doChat',
                    {
                      details: {
                          userId: x,
                          message: this.form.messa,
                          who: this.who
                      },
                      sec: store.state.token
                    }
            )
            .then(results => {
              console.log('bot response', results);
              let outputArea = $("#chat-output");
              if(typeof(results) === 'object') {
                    console.log('resulting array values', results.messages)
                    let iterations = results.messages.length + 1;
                    results.messages.forEach((item) => {
                        outputArea.append(`
                          <div class='user-message'>
                              <div class='message'>
                                  ${item.value}
                              </div>
                          </div>
                        `)  
                    });
              } else {
                outputArea.append(`
                  <div class='user-message'>
                      <div class='message'>
                          ${store.state.botMessages}
                      </div>
                  </div>
                `);
              }
              let elem = document.getElementById('chat-output');
              elem.scrollTo(0, elem.scrollHeight);
            }).catch((err) => {
              console.log(err);
            });
          }).catch(err => console.log(err));
        },
        sayHi: function(salamu){
            this.genUserId().then(x => {
            store.dispatch('doChat',
                    {
                      details: {userId: x, message: salamu, who: this.who},
                      sec: store.state.token
                    }
            )
            .then(results => {
              console.log('bot response', results);
              let outputArea = $("#chat-output");
              outputArea.append(`
                  <div class='user-message'>
                      <div class='message'>
                          ${store.state.botMessages}
                      </div>
                  </div>
              `);
              let elem = document.getElementById('chat-output');
              elem.scrollTo(0, elem.scrollHeight);
            }).catch((err) => {
              console.log(err);
            });
          }).catch(err => console.log(err));
        },
        getSec: function () {
          return store.dispatch('doSecurity').then(results => {
            console.log('got security', results);
            this.token = results
          }).catch((err) => {
            console.log(err);
          });
        }
      }
    });
    </script>
    </body>
    </html>
