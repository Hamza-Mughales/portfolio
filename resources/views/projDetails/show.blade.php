<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>protfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <link rel="stylesheet" media="all" href="{{ asset ('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset ('css/bootstrap.min.css.map') }}" />
    <link rel="stylesheet" media="all" href="{{ asset ('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/animate.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/circle.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset ('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/showp.css') }}" />

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-header">
                    <h2>{{$project_name}}</h2>
                </div>
            </div>
            <div class="col-12">
                <img class="main-img" src="{{ asset( 'storage/'. $main_img )}} " />
                <div class="img-desc">
                    <p>{{ $p_description }} <a href="{{ $p_url }}" target="_blank">{{ $p_url }}</a></p>
                </div>

                <div class="row">
                    @foreach( $project_details as $detail)
                    <div class="col-sm-6">
                        <div class="p-imgs  fadeInUp wow animated ">
                            <img class="img-thumbnail" src="{{ asset( 'storage/'. $detail->img )}} " alt="no image" />
                            <p>{{$detail->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>



    <script src="{{ asset ( 'js/jquery-3.2.1.min.js') }} "></script>
    <script src="{{ asset ( 'js/popper.min.js') }} "></script>
    <script src="{{ asset ( 'js/bootstrap.min.js') }} "></script>
    <script src="{{ asset ( 'js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset ( 'js/fontawesome.min.js') }} "></script>
    <script src="{{ asset ( 'js/wow.min.js') }} "></script>
    <script src="{{ asset ( 'js/circle.js') }} "></script>
    <script src="{{ asset ( 'js/main.js') }} "></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>