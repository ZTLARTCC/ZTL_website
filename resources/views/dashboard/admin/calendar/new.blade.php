@extends('layout')

@section('title')
New Calendar Event/News
@endsection

@section('content')

<br>
<div class="container">
        {!! Form::open(['action' => 'AdminDash@storeCalendarEvent']) !!}
        @csrf
        <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Required']) !!}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'MM/DD/YYYY (Required)']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('time', 'Time') !!}
                    {!! Form::text('time', null, ['class' => 'form-control', 'placeholder' => 'HH:MM (Optional)']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('body', 'Additional Information') !!}
            {!! Form::textArea('body', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Type of Post') !!}
            {!! Form::select('type', [
                1 => 'Calendar Event',
                2 => 'News'
            ], null, ['class' => 'form-control']) !!}
        </div>
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
    {!! Form::close() !!}
            <div class="col-sm-1">
                <a href="/dashboard/admin/calendar" class="btn btn-danger">Cancel</a>
            </div>
        </div>
</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection
