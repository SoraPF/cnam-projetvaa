<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           inscription au cours
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100">
                    <form action="{{route('createCours')}}" method="post">
                        <input type="text" name="titre" class="text-gray-800 w-full"><br>
                        <select name="niveau" class="text-gray-800  w-full">
                            <option>débutant</option>
                            <option>intermédiaire</option>
                            <option>profetionnel</option>
                        </select><br>
                        
                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="submit" class="btn">
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
