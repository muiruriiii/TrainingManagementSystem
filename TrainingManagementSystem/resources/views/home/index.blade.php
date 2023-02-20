@include('templates.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.feedback {
    position: relative;
    padding: 10px 10px;
    text-align: center;
    width: 100%;
    height: 85%;
    background-color:#222;
}
.feedback p{
    padding: 10px 0 172px;
}
.feedback h2{
    color: #FFFFFF;
}
.feedback h4{
    padding: 30px 10px;
}
</style>
<div>
    <img class="hrimage" src="{{ asset('images/training4.jpg') }}" alt="Hr Training">
    <h2>OUR COURSES </h2>
    <section id="courses" class="cards">
        @if(count($courses) > 0 )
        @foreach($courses as $course)
        <article class="card card--1">
            <div class="card__img">
                <img src = "{{asset($course->courseProfile)}}">
            </div>
            <a href="{{url ('/checkifPaid/'.$course->id)}}" class="card_link">
                <div class="card__img--hover">
                    <img src = "{{asset($course->courseProfile)}}">
                </div>
            </a>
            <div class="card__info">
            <span class="card__category"> Course</span>

                <h3 class="card__title">{{$course->courseName}}</h3>
                </h3>
                <span class="card__by">by <a href="{{url ('/checkifPaid/'.$course->id)}}" class="card__author" title="author">C.Muiruri</a></span>
            </div>
        </article>
        @endforeach
        @else
            <tr>
                <td colspan="12"class="text-center"><b>No Courses Found</b></td>
            </tr>
        @endif
    </section>
</div>

<section  id="about" class="fh5co-about-me">
    <div class="about-me-inner site-container">
        <article class="portfolio-wrapper">
            <div class="portfolio__img">
                <img src=" {{ asset('images/owner.jpg') }}" class="about-me__profile" alt="about me profile picture">
            </div>
        </article>

        <div class="about-me__text">
            <div class="about-me-slider">
                <div class="about-me-single-slide">
                    <h2 class="universal-h2 universal-h2-bckg">About Me</h2>
                    <p style="font-size: 15px;font-family: 'Nunito';"><span>L</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, officia, vel. Ad alias asperiores blanditiis in ipsa magnam nemo quam qui recusandae repellat! Accusamus aliquam dolores, exercitationem omnis placeat temporibus.  </p>
                    <h4>CEO</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="about-me-bckg"></div>
</section>

<section class="feedback">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($feedback as $key => $feedback)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <h2>Testimonials</h2>--}}
                    <p>{{$feedback->feedback}}</p>
                    <img src="{{asset('images/images/quotes.svg') }}" alt="quotes svg">
                    <h4 style="color: #FFFFFF;">{{$feedback->name}}</h4>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>

<section id="contact" class="fh5co-social">
    <div class="site-container">
        <div class="social">
            <h5>Follow me!!</h5>
            <div class="social-icons">

                <a href="#" target="_blank"> <img src="{{ asset('images/images/social-twitter.png') }}"alt="social icon"></a>
                <a href="#" target="_blank"><img src="{{ asset('images/images/social-pinterest.png') }}" alt="social icon"></a>
                <a href="#" target="_blank"><img src="{{ asset('images/images/social-youtube.png') }}" alt="social icon"></a>
                <a href="#" target="_blank"><img src="{{ asset('images/images/social-twitter.png') }}" alt="social icon"></a>
            </div>
            <h5>Share it!</h5>
        </div>
    </div>
</section>
<footer class="site-footer">
    <div class="site-container">
        <div class="footer-inner">
            <div class="footer-info">
                <div class="footer-info__right">
                    <h5>Get In Touch</h5>
                    <p class="footer-phone">Phone: +254702125597</p>
                    <p>Email : cmuiruri@gmail.com</p>
                    <div class="social-icons">
                        <a href="#" target="_blank"> <img src="{{ asset('images/images/social-twitter.png') }}"alt="social icon"></a>
                        <a href="#" target="_blank"><img src="{{ asset('images/images/social-pinterest.png') }}" alt="social icon"></a>
                        <a href="#" target="_blank"><img src="{{ asset('images/images/social-youtube.png') }}" alt="social icon"></a>
                        <a href="#" target="_blank"><img src="{{ asset('images/images/social-twitter.png') }}" alt="social icon"></a>
                    </div>
                </div>
            </div>
            <div class="footer-contact-form">
                <h5>Feedback Form</h5>

                <form action="{{route('feedback')}}" method="POST" class="contact-form">
                    @csrf
                    <div class="contact-form__input">
                        <input type="text" name="name" placeholder="Name">
                        @if($errors->has('name'))
                            <span style="color: red;" class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <input type="email" name="email" placeholder="Email">
                        @if($errors->has('email'))
                            <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <textarea name="feedback" placeholder="Feedback"></textarea>
                    @if($errors->has('feedback'))
                        <span style="color: red;" class="text-danger">{{ $errors->first('feedback') }}</span>
                    @endif
                    <input type="hidden" name="status" value="Poor">
                    <input type="submit" name="submit" value="Submit" class="submit-button">
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="site-container footer-bottom-inner">
            <p>© 2023 Bityarn | All rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

