@extends('user.layouts.userLayout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('user.index') }}">Home</a>
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact
                Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    @if (session()->has('success'))
                        <div id="success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('contact.sendMessage') }}" method="POST">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control mb-3" name="name" placeholder="Your Name..."
                                data-validation-required-message="Please enter your name..." />
                            @error('name')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control mb-3 " name="email" placeholder="Your Email..."
                                required="required" data-validation-required-message="Please enter your email..." />
                            @error('email')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control mb-3 " name="subject" placeholder="Subject..."
                                required="required" data-validation-required-message="Please enter a subject..." />
                            @error('subject')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group">
                            <textarea class="form-control mb-3 " name="message" rows="8" placeholder="Message..." required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            @error('message')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    {{-- <iframe style="width: 100%; height: 250px;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
                    <iframe style="width: 100%; height: 250px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=New%20Bani%20Sewif%20City+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.gps.ie/"></a></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New Bani Sewif City</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>hossamgaber027@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+011 525 12799 </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
