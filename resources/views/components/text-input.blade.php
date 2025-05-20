@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-10 mt-1 p-2 block w-full border border-gray-300 outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 rounded-md shadow-xs']) !!}>
