@foreach (config('admin.menu') as $item)
@php
$active = Route::currentRouteName() == $item['route'];
@endphp
<a href="{{route($item['route'])}}" wire:navigate @class(['flex items-center px-2 py-2 text-sm font-medium rounded-md
    group ',' bg-gray-900 text-white'=> $active,
    'text-gray-300 hover:bg-gray-700 hover:text-white' => !$active,
    ])>
    <x-filament::icon @class(['flex-shrink-0 w-6 h-6 mr-3','text-white'=> $active,
        'text-gray-300' => !$active,
        ])
        icon="{{$item['icon']}}" color="white" label="{{$item['name']}}" />
        {{$item['name']}}
</a>
@endforeach
