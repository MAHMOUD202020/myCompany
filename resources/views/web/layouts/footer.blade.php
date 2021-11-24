<!-- Start Footer Area -->
<section class="footer-section pt-100 pb-70 mt-5">
    <div class="container">
        <div class="subscribe-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="subscribe-content">
                        <h2>@lang('form.label.newsletter title')</h2>
                        <p>@lang('form.label.newsletter description')</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <form class="newsletter-form" method="post" action="{{route('web.saveNewsletter')}}">
                        <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required autocomplete="off">
                        <button type="submit">
                            @lang('form.label.Subscribe Now')
                        </button>

                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>@lang('layout.about us')</h3>
                    </div>
                    <p>@lang('form.label.about us content')</p>
                    <ul class="footer-social">
                        @foreach($contacts->where('type' , 'social') as $social)
                            <li>
                                <a href="{{$social->value}}">
                                    <i class="{{$social->icon}}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>@lang('form.label.links footer')</h3>
                    </div>

                    <ul class="footer-quick-links">
                        @foreach($sections->take(5) as $section)
                            <li>
                                <a href="{{$section->url}}">{{$section->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>@lang('form.label.service footer')</h3>
                    </div>
                    <ul class="footer-quick-links">
                        @foreach($services as $service)
                            <li>
                            <a href="{{route('web.services.show' , $service->id)}}">{{$service->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>@lang('form.label.contact')</h3>
                    </div>

                    @foreach($contacts->where('type' , 'contact') as $social)
                        <div class="footer-info-contact">
                            <i class="{{$social->icon}}"></i>
                            <h3>{{$social->title}}</h3>
                            <span><a href="tel:+882-569-756">{{$social->value}}</a></span>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Footer Area -->

<!-- Start Copy Right Area -->
<div class="copyright-area">
    <div class="container">
        <div class="copyright-area-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>
                        Copyright © 2021 Fria All Rights Reserved by
                        <a href="" target="_blank">
                            El Prof
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Copy Right Area -->

<!-- Start Go Top Section -->
<div class="go-top">
    <i class="bx bx-chevron-up"></i>
    <i class="bx bx-chevron-up"></i>
</div>
<!-- End Go Top Section -->
