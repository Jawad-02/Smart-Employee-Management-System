@props(['align' => 'right', 'width' => '48', 'contentClasses' => ''])

<div class="dropdown" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" data-bs-toggle="dropdown">
        {{ $trigger }}
    </div>

    <div x-show="open"
            class="dropdown-menu {{ $align === 'right' ? 'dropdown-menu-end' : '' }}"
            style="display: none;"
            @click="open = false">
        {{ $content }}
    </div>
</div>
