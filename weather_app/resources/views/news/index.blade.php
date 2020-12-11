<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="{{asset('mycss/css.css')}}">
</head>
<body>
<div class="demo">
    <div class="container">
        <h3 class="h3">{{$news->title}}</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider2" class="owl-carousel">
                    @foreach($news->item as $item)
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i>{{$item->pubDate}}</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="{{$item->link}}" target="_blank" class="read-more">read more</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-2.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 7, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>

                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-3.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>

                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-4.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="{{asset('myjs/myjs.js')}}"></script>
</body>
</html>
