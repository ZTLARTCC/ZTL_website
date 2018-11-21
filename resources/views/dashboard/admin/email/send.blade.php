@extends('layouts.dashboard')

@section('title')
    Send New Email
@endsection

@section('content')
<div class="container-fluid" style="background-color:#F0F0F0;">
    &nbsp;
    <h2>Send New Email</h2>
    &nbsp;
</div>
<br>
<div class="container">
    {!! Form::open(['action' => 'AdminDash@sendEmail']) !!}
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('from', 'From') !!}
                    {!! Form::text('from', 'info@ztlartcc.org', ['disabled', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['placeholder' => 'Name (Required)', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('to', 'To (Single Person)') !!}
                    {!! Form::select('to', $controllers, null, ['placeholder' => 'Select Controller', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('bulk', 'Bulk Email') !!}
                    {!! Form::select('bulk', [
                        0 => 'All Controllers',
                        1 => 'Home Controllers',
                        2 => 'Visiting Controllers',
                        3 => 'Mentors',
                        4 => 'Instructors',
                        5 => 'All Training Staff'
                    ], null, ['placeholder' => 'N/A', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'Subject') !!}
            {!! Form::text('subject', null, ['placeholder' => 'Subject (Required)', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('message', 'Message') !!}
            {!! Form::textarea('message', null, ['id' => 'article-ckeditor', 'placeholder' => 'Message (Required)', 'class' => 'form-control']) !!}
        </div>
        <button class="btn btn-success" type="submit">Send</button>
    {!! Form::close() !!}
</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

@endsection
