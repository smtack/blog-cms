<select {!! $attributes->merge(['class' => "w-full h-10 p-2 border border-gray-300 outline-none focus:ring focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-xs"]) !!}>
    {{ $slot }}
</select>
