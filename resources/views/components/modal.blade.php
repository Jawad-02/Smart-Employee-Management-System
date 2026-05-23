@props(['name', 'show' => false, 'maxWidth' => '2xl'])

@php
$maxWidthClasses = match ($maxWidth) {
    'sm' => 'modal-sm',
    'md' => '',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    default => 'modal-lg',
};

$showClass = $show ? 'show d-block' : '';
$displayStyle = $show ? 'display: block;' : 'display: none;';
@endphp

<div id="{{ $name }}"
     class="modal fade {{ $showClass }}"
     tabindex="-1"
     style="{{ $displayStyle }}"
     @if($show) data-bs-backdrop="static" @endif
     aria-modal="{{ $show ? 'true' : 'false' }}"
     role="dialog">
    <div class="modal-dialog {{ $maxWidthClasses }}">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>

@if($show)
    <div class="modal-backdrop fade show"></div>
@endif
