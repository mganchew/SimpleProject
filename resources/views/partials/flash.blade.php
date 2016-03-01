@if(session()->has('flash_message'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session()->get('flash_message')}}
    </div>

@endif