@php
    $flashTypes = [
        'success' => 'success',
        'error' => 'danger',
        'warning' => 'warning',
        'info' => 'info',
    ];
@endphp

@foreach ($flashTypes as $type => $class)
    @if (session()->has($type))
        <div class="alert alert-{{ $class }} alert-dismissible fade show" role="alert">
            {{ session()->get($type) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach