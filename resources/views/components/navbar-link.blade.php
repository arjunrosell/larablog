@props(['active' => false])
<li>
    <a {{ $attributes }} @class([
        'text-black font-semibold hover:text-red-600 hover:underline',
        'text-red-600 underline' => $active,
        'text-black font-semibold hover:text-red-600 hover:underline' => !$active,
    ])>{{ $slot }}</a>
</li>
