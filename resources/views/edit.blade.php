<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="max-w-full" method="post" action="{{route('update', $todo->_id)}}">
                        @csrf
                        <label class="pt-5 pb-5 pr-5">
                            Todo
                            <x-text-input name="todo" placeholder="Update todo" class="p-3 border-gray-900" value="{{$todo->todo}}"></x-text-input>
                        </label>
                        <x-primary-button>Update</x-primary-button>
                        <button class="btn btn-sm btn-primary"><a href="{{ route('dashboard') }}">Cancel</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>