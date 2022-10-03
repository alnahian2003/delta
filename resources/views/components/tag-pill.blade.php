@props(['tagCsv'])

@php
$tags = explode(',', $tagCsv);
@endphp

@foreach ($tags as $tag)
    <span class="px-2 py-1 text-blue-800 font-bold rounded ">#{{ $tag }}</a>
@endforeach
