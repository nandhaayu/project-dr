@props(['active' => false])
<a {{ $attributes }} 
class="{{ $active ? 'bg-teal-900 text-teal-100' : 'text-white hover:bg-teal-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium" 
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
