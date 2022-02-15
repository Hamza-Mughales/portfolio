<!DOCTYPE html>
<html>

<head>
            <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>Hamza-Mughales</title>
    
    <link rel="stylesheet" media="all" href="{{ asset ('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset ('css/bootstrap.min.css.map') }}" />
    <link rel="stylesheet" media="all" href="{{ asset ('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/animate.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/circle.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/main.css') }}" />
    
    <style>
    
    .home{
    width: 100%;
    background-image: url('{{ asset ('img/home04.jpg')  }} ')
    }
    .skills{
    background-image: url('{{ asset ('img/skills_bg.jpg')  }} ')
    }
    .quotaion{
    background-image: url('{{ asset ('img/quote_bg.jpg')  }} ')
    }
    
    .error{background-color: #FF6600;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
    .success{background-color: #12CC1A;border:#0FA015 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
    
    </style>

</head>

<body>
    <div class="">

        <!--Navbar-->
        <nav class="navbar navbar-expand-md navbar-dark ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach($navbar as $nav)
                    <li class="nav-item ">
                        <a class="nav-link" href="#{{$nav->name}}">{{$nav->name}} <span class="sr-only">(current)</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>


        <!-- HOME -->
        <section id="Home">
            <div class="home">
                <div class=" overlay">
                    <div class=" row ">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="animated fadeInUp name-text wow " data-wow-delay=".5s" data-wow-iteration="1"><span>{{ $about->name }}</span></h2>
                                <p class="animated fadeInUp name-line"></p>
                                <h3 class="animated fadeInUp wowweb-text">Web Designer &<span class="animated fadeInUp "></span> Web Developer</h3>
                                <a href="#Contact" class="animated fadeInUp btn-contact">Contact Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- ABOUT -->
        <section id="About">
            <div class="about">
                <div class="row">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="section-header ">
                                <div class=" text-center">
                                    <h2 class="animated fadeInUp wow" data-wow-delay=".5s"><span>About me</span></h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-4">
                                <?php
                                if ($about->img)
                                    $about_img = asset('storage/' . $about->img );
                                else
                                    $about_img = asset('img/avatar.jpg');
                                ?>
                                <img class="animated fadeInLeft responsive wow" data-wow-delay=".5s" src="{{ $about_img }}">
                            </div>
                            <div class=" col-xs-12  col-lg-7 pt-4">
                                <div class="animated fadeInRight wow" data-wow-delay=".5s">
                                    <h4>{{$about->title}}</h4>
                                    <p class="about-p">{{$about->description}}</p>
                                    <a class="cv-btn" target="_blank" href="{{ asset('storage/' .$about->cv )}}"><i class="fa fa-download"></i>Download CV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES -->
        <section id="Services">
            <div class="services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header text-center">
                                <h2 class="animated fadeInUp wow" data-wow-delay=".5s"><span>Services</span></h2 class="animated fadeInDown wow" data-wow-delay="1s">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="srevice animated fadeInUp wow">
                                <i class="fa fa-html5"></i>
                                <h3>HTML5</h3>
                                <p>Designing all types of websites with html5 and CSS3.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="srevice  animated fadeInUp wow">
                                <i class="fa fa-pencil"></i>
                                <h3>Maintenance</h3>
                                <p>Good handling with editing and updating an existing projects.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 animated fadeInUp wow">
                            <div class="srevice">
                                <i class="fa fa-code"></i>
                                <h3>Coding</h3>
                                <p>Writing programing codes using several programming languages.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 animated fadeInUp wow">
                            <div class="srevice">
                                <i class="fa fa-tachometer"></i>
                                <h3>FAST</h3>
                                <p>Fast delivery of my customer orders with best quality</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 animated fadeInUp wow">
                            <div class="srevice">
                                <i class="fa fa-wordpress"></i>
                                <h3>WordPress</h3>
                                <p>Good at managing WordPress sites contents.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 animated fadeInUp wow">
                            <div class="srevice">
                                <i class="fa  fa-tablet"></i>
                                <h3>Responsive</h3>
                                <p>Make responsive sites working on different devices.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SKILLS -->
        <section id="Skills">
            <div class="skills">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header text-center">
                                <h2 class="animated fadeInUp wow" data-wow-delay=".5s"><span>My skills</span></h2>
                            </div>
                        </div>
                        <div class="col-md-6 pl-5">
                            <div class="skills-text ">
                                <p> Web Developer specializing in front end and back end development.
                                    Experienced with all stages of the development cycle for dynamic web projects.
                                    Well-versed in numerous programming languages including HTML5, PHP, JavaScript,
                                    CSS, MySQL. Strong background in project management and customer relations.</p>
                            </div>
                        </div>
                        <div class="col-md-6 pl-5">
                            <div class="language-skills">
                                <div class="">
                                    @foreach($skills as $skill)
                                    <div class="animated skillbar wow fadeInRight ">
                                        <div class="skillbar-title">{{ $skill->name }}</div>
                                        <div class="progress skill-bar-percent">
                                            <div class="progress-bar progress-bar-animated" style="width: {{ $skill->percentage }}%">
                                                {{ $skill->percentage }}%</div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- LATEST PROJECT -->
        <section id="Latest">
            <div class="latest-projects">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header text-center">
                                <h2 class="animated fadeInUp wow" data-wow-delay=".5s"><span>latest projects</span></h2 class="animated fadeInDown wow" data-wow-delay="1s">
                            </div>
                        </div>

                        @foreach($projects as $project)
                        <div class="col-md-6 col-lg-4">
                            <a class="animated wow fadeInUp project" href="{{ route('show_detil', ['project_id'=> $project->id] ) }}">
                                <div class="mask">
                                    <div class="info">
                                        <h3>{{$project->name}}</h3>
                                        <p>{{$project->short_desc}}</p>
                                    </div>
                                    <div class="btn btn-see-project">See project</div>
                                </div>
                                <img  class="project-pic" src="{{ asset( 'storage/'. $project->main_img )}}" alt="project">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- QUOTATION --->
        <section>
            <div class="quotaion">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2 ">
                                <div class="qutation-content text-center">
                                    <h2>"It's not whether you get knocked down, it's whether you get up"</h2>
                                    <p>Vince Lombardi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="Contact">
            <div class="contact animated bounceIn wow">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header text-center">
                                <h2 class="wow" data-wow-delay=".6s"><span>contact me</span></h2 class="" data-wow-delay="1s">
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-10 contact-me-content">
                            <div class="form-content">
                                <div id="mail-status"></div>
                                @if($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong> {{ $message }} </strong>
                                </div>
                                @endif
                                <form action="{{ url('sendemail/send') }}" method="post" class="row" id="emailForm">
                                    <!--{{ csrf_field() }}-->
                                    <div class="form-group wow col-md-6 ">
                                        <input class="form-control" type="text" name="name" id="name" placeholder="Your Name*" required>
                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                    </div>
                                    <div class="form-group wow col-md-6">
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Your Email*" required>
                                        <small class="text-danger">{{$errors->first('email')}}</small>
                                    </div>
                                    <div class="form-group wow col-12">
                                        <textarea class="form-control textarea" name="message" id="message" placeholder="Message for me*" required></textarea>
                                        <small class="text-danger">{{$errors->first('message')}}</small>
                                    </div>
                                    <div class="form-group wow col-12">
                                        <button type="submit" name="send" id="btn_send" class="btn btn-primary btn-sm btn-send" >Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <div class="footer">
            <div class="container">
                <div class="">
                    <div class="footer-content row">
                        <div class="col-md-6 ">
                            <p class="">Phone No : +967{{ $about->phone }}</p>
                            <p class="">Email : {{ $about->email }}</p>
                        </div>
                        <p class="col-md-6 text-right pt-4"> © 2021 {{ $about->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Go up btn -->
        <a class="scrollToTop " href="#"><i class="fa fa-angle-up"></i></a>

    </div>

    <script src="{{ asset ( 'js/jquery-3.2.1.min.js') }} "></script>
    <script src="{{ asset ( 'js/popper.min.js') }} "></script>
    <script src="{{ asset ( 'js/bootstrap.min.js') }} "></script>
    <script src="{{ asset ( 'js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset ( 'js/fontawesome.min.js') }} "></script>
    <script src="{{ asset ( 'js/wow.min.js') }} "></script>
    <script src="{{ asset ( 'js/circle.js') }} "></script>
    <script src="{{ asset ( 'js/my.js') }} "></script>
    <script>
        new WOW().init();
        
        $(document).ready(function(){
        
            $("#emailForm").submit(function(event){
               event.preventDefault();
               
               $('#btn_send').html('sending ...');
               $('#btn_send').prop('disabled',true);
               
               var e_name = $("#name").val();
               var e_email = $("#email").val();
               var e_message = $("#message").val();
                                  
                $.ajax({
                dataType:'html',
		url: "{{ route('sendmail') }}",
		data:{name:e_name, email:e_email, message:e_message},
		type: "POST",

                success:function(data){
                        $("#mail-status").html(data);
                        $('#btn_send').html('Send Message');
                        $('#btn_send').prop('disabled',false);
                        $("#name").val("");
                        $("#email").val("");
                        $("#message").val("");
		},
                
		error:function (){
                
                        $('#btn_send').html('Send Message');
                        $('#btn_send').prop('disabled',false);
                
                }
                
		});
            
            
            });
        
        
        
        });
        
       
        
    </script>

</body>

</html>