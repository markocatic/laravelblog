@extends('layouts.front')
@section('content')
    <!-- technology -->
    <div class="technology-1">
        <div class="container">
            <div class="col-md-9 technology-left">
                <div class="business">
                    <div id="contact" class="contact">
                        <h3>Contact</h3>
                        <div class="contact-grids">
                            <div class="contact-icons">
                                <div class="contact-grid">
                                    <div class="contact-fig">
                                        <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                                    </div>
                                    <p>555-222-333</p>
                                </div>
                                <div class="contact-grid">
                                    <div class="contact-fig1">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    </div>
                                    <p>T317 Timber Oak Drive
                                        <span>Sundown,TX 79372</span></p>
                                </div>
                                <div class="contact-grid">
                                    <div class="contact-fig2">
                                        <span class="glyphicon glyphicon-envelope2" aria-hidden="true"></span>
                                    </div>
                                    <p><a href="mailto:info@example.com">example@mail.com</a></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <form>
                                <input type="text" placeholder="Name">
                                <input type="text" placeholder="Email">
                                <input type="text" placeholder="Website">
                                <textarea placeholder="Message..."></textarea>
                                <input type="submit" value="SEND">
                            </form>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12386182.960956775!2d-74.08302114251626!3d40.71866701702417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1436524193425"  style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.sidebar')
        </div>
    </div>
    <!-- technology -->
    @endsection