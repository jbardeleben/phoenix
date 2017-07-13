@extends('templates.pages')

@section('pagetitle')
- Viewing {{$comment->title}}
@stop
<a name="#top"></a>
@section('bannertitle')
Delete {{ $comment->title }}?
@stop

@section('content')
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Are You Sure You Want To Delete This Comment?</h1>
                    <hr>

                    <!-- comment details -->
                    <h2>Comment Details:</h2>
                    <p>
                        {{ $comment->name }}
                    </p>
                    <p>
                        {{ $comment->email }}
                    </p>
                    <p>
                        {{ $comment->comment }}
                    </p>

                    {!! Form::open([
                        'route'  => ['comments.destroy', $comment->id], 
                        'method' => 'DELETE'
                    ]) !!}
                        <p>
                        {{ Form::submit('YES, DELETE THIS COMMENT', [
                            'class' => 'btn btn-danger'
                        ]) }}
                        </p>
                    {!! Form::close() !!}
                </div><!-- col-md-8 col-md-offset-2 -->
            </div><!-- row -->

@endsection