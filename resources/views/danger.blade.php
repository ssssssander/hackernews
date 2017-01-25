@if (session()->has('danger'))
    <div class="bg-danger">{{ session('danger') }}</div>
@endif
