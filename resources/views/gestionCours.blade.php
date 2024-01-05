<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Gestion de cours
        </h2>
    </x-slot>
    <style>
        /* Add some styling for better visualization */
        .draggable {            
            padding: 10px;
            margin: 5px;
            cursor: move;
            width: 100px;
            height: 50px;
            background-color: lightblue;
        }

        .dropzone {
            position: relative;
            border: 2px dashed #ccc;
            border-radius: 50%;
            padding: 10px;
            margin: 10px 0;
            width: auto;
            height: 200px;
            overflow: hidden;
            text-align: center;
        }

        .rectangle {
        display: inline-block;
        margin-top: 63px;
        margin-right: 10px;
        margin-left: 10px;
        width: 100px;
        height: 50px;
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        }
    </style>

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

                <!--<div id="draggable1" class="draggable" draggable="true" ondragstart="drag(event)">
                    <input type="hidden" name="draggedItems[]" value="val1">
                    val1
                </div>-->                
                @if( isset($participant_name))
                <div class="text-white text-center">Drop items here</div>
                <div class="dropzone">
                    <div class="rectangle" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                    <div class="rectangle" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                    <div class="rectangle" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                    <div class="rectangle" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                    <div class="rectangle" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                    <div class="rectangle" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
                </div>
                <div class="text-white">
                    @foreach($participant_name as $index => $name)
                        <div id="draggable{{ $index }}" class="draggable" draggable="true" ondragstart="drag(event)">
                            <input type="hidden" name="draggedItems[]" value="{{$name}}">
                            {{$name}}
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    let draggedItem;

    function drag(event) {
        // Set the data being dragged (in this case, the input value)
        event.dataTransfer.setData("text/plain", event.target.id);
        draggedItem = event.target;
    }

    function allowDrop(event) {
        // Prevent the default behavior to allow a drop
        event.preventDefault();
    }

    function drop(event) {
        // Prevent the default behavior to allow a drop
        event.preventDefault();

        // Get the data being dragged
        var data = event.dataTransfer.getData("text/plain");

        // Append the dragged element to the drop target
        var droppedElement = document.getElementById(data);
        event.target.appendChild(droppedElement);
    }

    function dragEnd() {
        // Remove the "dragging" class after the drag operation is completed
        draggedItem.classList.remove('dragging');
    }

    document.addEventListener('dragstart', function(event) {
        // Add a "dragging" class to the dragged item during the drag operation
        event.target.classList.add('dragging');
    });

    document.addEventListener('dragend', function() {
        // Remove the "dragging" class after the drag operation is completed
        dragEnd();
    });
</script>
