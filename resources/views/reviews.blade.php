@extends('layouts.master2')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="testimonail-section mt-150 mb-200" style="margin-top: 200px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="testimonial-sliders">
    
                            @foreach ( $reviews as $item)
                                <div class="single-testimonial-slider">
                                   
                                    <div class="client-meta">
                                        <h3>{{ $item->name }} <span>{{ $item->subject }}</span></h3>
                                        <p class="testimonial-body">
                                            {{ $item->masseg }}
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 200px;">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Add</span>your comment</h3>
                        
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">

                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" action="/StoreReview" id="fruitkha-contact">
                            @csrf()
                            <p>
                                <input style="width: 550px" type="text" required placeholder="Name" name="name" id="name"
                                    value="{{ old('name') }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input style="width: 550px" type="email" required  placeholder="email" class="ml-1"
                                    name="email"value="{{ old('email') }}" id="email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </p>
                            <p style="display: flex">
                                <input style="width: 550px" type="text" style="width: 50%" required  placeholder="phone"
                                    name="phone"value="{{ old('phone') }}" id="phone">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input style="width: 550px" type="text" style="width: 50%" required placeholder="subject" class="ml-2"
                                    name="subject"value="{{ old('subject') }}" id="subject">
                                <span class="text-danger">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>


                            </p>
                            <p>
                                <textarea name="masseg" id="masseg" required cols="30" rows="10" placeholder="masseg">
                            
                            
                                {{ old('masseg') }}
                        
                            </textarea>

                            </p>
                            <span class="text-danger">
                                @error('masseg')
                                    {{ $message }}
                                @enderror
                            </span>

                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
@endsection
