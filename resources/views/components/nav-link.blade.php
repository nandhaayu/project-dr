@props(['active' => false])
<a {{ $attributes }} 
class="{{ $active ? ' text-white bg-green-600' : 'text-black hover:bg-green-600'}} rounded-md px-3 py-2 text-m font-semibold" 
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
