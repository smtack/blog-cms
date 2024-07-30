@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full h-100 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
