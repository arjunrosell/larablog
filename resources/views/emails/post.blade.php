<x-mail::message>

Thank you for your post! {{ $data['name'] }}

Your post title: {{ $data['title']}}

{{-- <x-mail::button :url="$url">
View Order
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
