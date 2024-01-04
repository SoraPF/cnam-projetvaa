<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            inscription au cours
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between items-center text-gray-800 dark:text-gray-100">
                    <div>
                        @if(!$cours->contains('jours', 'mardi'))
                            <p>Aucun cours disponible le mardi.</p>
                        @elseif($cours->contains('jours', 'mardi') && (!isset($cours_rameur) || 
                        $cours_rameur->where('rameur_id', auth()->user()->id)->where('cours_id',
                         $cours->where('jours', 'mardi')->first()->id)->count() < 1))
                            <form action="{{route('inscritMardi')}}" method="post">
                                @csrf
                                <x-primary-button class="ms-3">
                                    S'inscrire au cours de mardi
                                </x-primary-button>
                            </form>
                        @elseif(isset($cours_rameur) && $cours_rameur->where('rameur_id', auth()->user()->id)->count() > 0)
                            <p>Vous est deja inscrit.</p>
                        @endif
                    </div>
                    <div>
                        @if(!$cours->contains('jours', 'vendredi'))
                            <p>Aucun cours disponible le vendredi.</p>
                        @elseif($cours->contains('jours', 'vendredi') && (!isset($cours_rameur) || 
                            $cours_rameur->where('rameur_id', auth()->user()->id)->where('cours_id',
                             $cours->where('jours', 'vendredi')->first()->id)->count() < 1))
                            <form action="{{route('inscritvendredi')}}" method="post">
                                @csrf
                                <x-primary-button class="ms-3">
                                    S'inscrire au cours de vendredi
                                </x-primary-button>
                            </form>
                        @elseif(isset($cours_rameur) && $cours_rameur->where('rameur_id', auth()->user()->id)->count() > 0)
                            <p>Vous est deja inscrit.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
