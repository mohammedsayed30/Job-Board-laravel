@extends('layout')

@section('content')
<main>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Your Jobs 
                </h1>
            </header>
        @foreach($listings as $listing)
            <table class="w-full table-auto rounded-sm">
                <tbody>
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="show">
                                {{ $listing->title }}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="listings/{{$listing->id}}/edit"
                                class="text-blue-400 px-6 py-2 rounded-xl"
                                ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edit</a
                            >
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form action="listings/{{$listing->id}}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
        </div>
    </div>
</main>
@endsection