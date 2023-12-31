<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           inscription au cours
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <thead>
                        <th>Mardi</th>
                        <th>Vendredi</th>
                        </thead>
                        <tbody>
                        <td>
                            <form action="{{route('inscritMardi')}}" method="post">
                                @csrf
                                <button class="btn">S'inscrire</button>
                                date
                            </form>
                        </td>
                        <td>
                            <form action="{{route('inscritvendredi')}}" method="post">
                                @csrf
                                <button class="btn">S'inscrire</button>
                                date
                            </form>
                        </td>                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
