@extends('templates.pages')

@section('pagetitle', '- Contact Us')
@section('bannertitle', 'Reaching Out')
@section('leader', 'Is easier than an email. Your voice helps make this platform better and we want to hear (read) it!')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-2">
      <h3 style="margin-top: 30px;">Contact Form</h3>
      <hr>
      <!-- USE THE FORM-HELPERS CLASS INSTEAD OF HARD-CODING THIS FORM -->
      <form action="{{ url('contact') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="email">Email:</label>
          @if (Auth::check())
          <input type="email" name="email" class="form-control" id="emaili" value="{{Auth::user()->email}}" required="required">
          @else
          <input type="email" name="email" class="form-control" id="emaili" placeholder="Your Email Address" required="required">
          @endif
        </div><!-- form-group -->
        <div class="form-group">
          <label for="subject">Subject:</label>
          <input type="text" name="subject" class="form-control" id="subjecti" placeholder="Subject" required="required">
        </div><!-- form-group -->
        <div class="form-group">
          <label for="message">Your Message:</label>
          <textarea rows="5" id="message" name="message" class="form-control" placeholder="Share your thoughts here!" required="required"></textarea>
        </div><!-- form-group -->
        <input type="submit" name="submit" class="btn btn-success btn-block btn-lg" value="Share Your Message">
      </form>
      <hr>
      <p style="font-size: 1.3em">We greatly appreciate your time and sharing your thoughts with us!</p>
    </div><!-- col-md-6 -->
    
    <!-- SIDEBAR -->
@include('templates.partials._static-sidebar')

  </div><!-- row (parent row) -->
@stop