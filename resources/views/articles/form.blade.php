<div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at','Published:') !!}
    {!! Form::input('date','published_at',$article->published_at->format('m-d-Y'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list','Tags:') !!}
    {!! Form::select('tag_list[]',$tags,$article->tags->lists('id'),['id'=>'tag_list','class'=>'form-control','multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>

@section('footer')

    <script>
        $('#tag_list').select2();
    </script>

@endsection