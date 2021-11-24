@extends('web.master' , ['title_seo' => $page->name])

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg-4" style='background-image: url("{{asset("assets/web/images/pages/$page->cover")}}")'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{$page->name}}</h2>
                        <ul>
                            <li><a href="{{route('web.home')}}">@lang('layout.page-home')</a></li>
                            <li>{{$page->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <label class="d-block"> {{ $error }} </label>
            @endforeach
        </div>
    @endif

    <!-- Start Contact Box Area -->
    <section class="contact-box pt-100 pb-70">
        <div class="container">
            <div class="row">
                @foreach($contacts->where('type' , 'contact') as $contact)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-box">
                            <i class="{{$contact->icon}}"></i>
                            <div class="content-title">
                                <h3>{{$contact->title}}</h3>
                                <p>{{$contact->value}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Contact Box Area -->

    <!-- Start Contact Area -->
    <section class="contact-section pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-text">
                        <h3>@lang('form.label.Questions About')</h3>
                        <p>@lang('form.label.Questions description')</p>
                    </div>

                    <div class="contact-form">
                        <form id="contactForm" method="post" action="{{route('web.contact.save')}}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" name="phone" id="phone" value="{{old('phone')}}" class="form-control" required data-error="Please enter your Phone" placeholder="Your Phone">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" value="{{old('subject')}}" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message">{{old('message')}}"</textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="send-btn">
                                <button type="submit" class="default-btn">
                                    Send Message
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-image">
                        <img src="{{asset('assets/web/images/contact.png')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->


    {!! $page->content !!}

@endsection
