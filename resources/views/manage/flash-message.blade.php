@if(session('status'))
    <p id="flash-message" class="bg-{{ session('status') == 'success' ? 'success' : 'danger' }}">{{ session('message') }}</p>
@endif

@if(isset($errors))
    @foreach($errors->all() as $error)
        <p id="flash-message" class="bg-danger">{{ $error }}</p>
    @endforeach
@endif