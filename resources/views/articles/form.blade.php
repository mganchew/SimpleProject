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
    {!! Form::input('date','published_at',date('m-d-Y'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list','Tags:') !!}
    {!! Form::select('tag_list[]',$tags,$article->tags->lists('id'),['class'=>'form-control','multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>