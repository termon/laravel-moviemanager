@props([
    'colour' => 'blue'
])

@php
 $classes = 'inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out';

 $blue   = 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800';
 $red    = 'bg-red-600 hover:bg-red-700 focus:bg-red-700 active:bg-red-800';
 $gray   = 'bg-gray-600 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800';
 $green  = 'bg-green-600 hover:bg-green-700 focus:bg-green-700 active:bg-green-800';
 $orange = 'bg-orange-600 hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-800';

 if ($colour == 'blue') {
    $classes = $classes . ' ' . $blue;
 } elseif ($colour == 'red') {
    $classes = $classes . ' ' . $red;
 } elseif ($colour == 'green') {
    $classes = $classes . ' ' . $green;
 } elseif ($colour == 'orange') {
    $classes =  $classes . ' ' . $orange;
 } else {
    $classes = $classes . ' ' . $gray;
 }
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
