@if(!empty(session('patch_error')))
<div class="alert alert-danger">
        <li>{{ session('patch_error') }}.</li>
</div>
@elseif(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}.</li>
        @endforeach
    </div>
@endif
