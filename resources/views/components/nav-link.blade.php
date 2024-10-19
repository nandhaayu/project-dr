@props(['active' => false])
<a {{ $attributes }} 
class="{{ $active ? ' text-green-800' : 'text-black hover:text-green-600'}} rounded-md px-3 py-2 text-m font-semibold" 
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
