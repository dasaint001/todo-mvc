<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-6">
                        <a href="{{ route('create-form') }}" class="btn btn-sm btn-primary">
                           Create Todo
                        </a>
                    </div>
                    <div class="panel-bod">
                        <table class="table">

                            <!-- Table Headings -->
                            <thead>
                                <th>All Todos</th>
                                <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody class="max-w-full">
                                @foreach($todos as $todo)
                                <tr class="max-w-full">
                                    <!-- Task Name -->
                                    <td class="pt-5 pb-5 pr-5">
                                        <div class=""> 
                                        <h1 class="sm:font-bold">{{ $todo->todo }}</h1>
                                        </div>

                                    </td>

                                    <td>
                                        <div>
                                            @if($todo->userId == auth()->user()->id)
                                            <form method="GET" action="{{ route('edit-form', $todo->_id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="GET">
                                                <x-primary-button type="submit" class="bg-yellow-500">Edit</x-primary-button>
                                            </form>

                                            <form method="POST" action="{{ route('delete', $todo->_id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <x-primary-button type="submit" class="bg-red-500">Delete</x-primary-button>
                                            </form>
                                            
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
