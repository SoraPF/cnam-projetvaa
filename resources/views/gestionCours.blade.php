<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Gestion de cours
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between items-center text-gray-800 dark:text-gray-100">
                    <div>
                        <form action="{{route('gestionCours')}}" method="get">
                            <input type="hidden" name="jour" value="mardi">
                            <x-primary-button>
                                gestion cours Mardi
                            </x-primary-button>
                        </form>
                    </div>
                    <div>
                        <form action="{{route('gestionCours')}}" method="get">
                            <input type="hidden" name="jour" value="vendredi">
                            <x-primary-button>
                                gestion cours Vendredi
                            </x-primary-button>
                        </form>
                    </div>                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
