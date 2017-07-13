@extends('templates.pages')

@section('pagetitle')
- Viewing {{$comment->title}}
@stop
<a name="#top"></a>
@section('bannertitle')
{{ $comment->title }}
@stop

@section('content')
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Edit Comment</h1>
                    <hr>

                    <!-- edit form -->
                    {!! Form::model($comment, [
                        'route'  => ['comments.update', $comment->id], 
                        'method' => 'PUT'
                    ]) !!}
                        <p>
                        {{ Form::label('name', 'Name: ') }}
                        {{ Form::text('name', null, [
                            'class' => 'form-comtrol',
                            'disabled' => 'disabled'
                        ]) }}
                        </p>
                        <p>
                        {{ Form::label('email', 'Email: ') }}
                        {{ Form::text('email', null, [
                            'class' => 'form-comtrol',
                            'disabled' => 'disabled'
                        ]) }}
                        </p>
                        <p>
                        {{ Form::label('comment', 'Comments:') }}<br>
                        {{ Form::textarea('comment', null, [
                            'class' => 'form-control',
                            'rows'  => '5'
                        ]) }}
                        </p>
                        <p>
                        {{ Form::submit('Update Comment', [
                            'class' => 'btn btn-primary'
                        ]) }}
                        </p>
                        <p>
                            <a href="{{ route('posts.show', $comment->post->id) }}">
                                Back to Post
                            </a>
                        </p>
                    {!! Form::close() !!}
                </div><!-- col-md-8 col-md-offset-2 -->
            </div><!-- row -->

@endsection