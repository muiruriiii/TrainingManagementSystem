@include('templates.header')
<div>

    <img class="hrimage" src="{{ asset('images/training4.jpg') }}" alt="Hr Training">
    <h2>OUR COURSES </h2>
    <section class="cards">
        @foreach($courses as $course)
        <article class="card card--1">
            <div class="card__img">

                <img src="{{url('storage/app/public/uploads/'.$course->courseProfile)}}">
            </div>
            <a href="{{url ('/checkifPaid/'.$course->id)}}" class="card_link">
                <div class="card__img--hover">
                    <img src="{{url('storage/app/public/uploads/'.$course->courseProfile)}}">
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

    </section>

</div>

<section class="fh5co-about-me">
    <div class="about-me-inner site-container">
        <article class="portfolio-wrapper">
            <div class="portfolio__img">
                <img src=" {{ asset('images/owner.jpg') }}" class="about-me__profile" alt="about me profile picture">
            </div>
            <div class="portfolio__bottom">
                <div class="portfolio__name">

                    <h2 class="universal-h2">Cynthia Muiruri</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, officia, vel. Ad alias asperiores blanditiis in ipsa magnam nemo quam qui recusandae repellat! Accusamus aliquam dolores, exercitationem omnis placeat temporibus.  </p>
            </div>
        </article>

        <div class="about-me__text">
            <div class="about-me-slider">
                <div class="about-me-single-slide">
                    <h2 class="universal-h2 universal-h2-bckg">About Me</h2>
                    <p><span>L</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, officia, vel. Ad alias asperiores blanditiis in ipsa magnam nemo quam qui recusandae repellat! Accusamus aliquam dolores, exercitationem omnis placeat temporibus.  </p>
                    <h4>CEO</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="about-me-bckg"></div>
</section>

<section class="fh5co-quotes">
    <div class="site-container">
        <div class="about-me-slider">
            <div>
                <h2 class="universal-h2 universal-h2-bckg">What People Are Saying</h2>
                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, amet, animi aperiam corporis cumque delectus dignissimos dolorem error maiores minima nobis obcaecati perferendis porro provident quasi, quibusdam tempore ullam vitae?”</p>

                <img src="   {{asset('images/images/quotes.svg') }}" alt="quotes svg">
                <h4>Joy Nkatha</h4>
                <p>Client</p>
            </div>

        </div>
    </div>
</section>

<section class="fh5co-social">
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
                <h5>Contact Form</h5>
                <form class="contact-form">
                    <div class="contact-form__input">
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <textarea></textarea>
                    <input type="submit" name="submit" value="Submit" class="submit-button">
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="site-container footer-bottom-inner">
            <p>© 2023 Author | All rights Reserved.</p>
            {{--            <div class="footer-bottom__img">--}}
            {{--                <img src="{{ URL::asset('images/images/footer-mastercard.png') }}" alt="footer image">--}}
            {{--                <img src="{{ URL::asset('images/images/footer-paypal.png') }}" alt="footer image">--}}
            {{--                <img src="{{ URL::asset('images/images/footer-visa.png') }}" alt="footer image">--}}
            {{--                <img src="{{ URL::asset('images/images/footer-fedex.png') }}" alt="footer image">--}}
            {{--                <img src="{{ URL::asset('images/images/footer-dhl.png') }}" alt="footer image">--}}
            {{--            </div>--}}
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


</body>
</html>
