@if(session('status'))
    <p id="flash-message" class="bg-{{ session('status') == 'success' ? 'success' : 'danger' }}">{{ session('message') }}</p>
@endif