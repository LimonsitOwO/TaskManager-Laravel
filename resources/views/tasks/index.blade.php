@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>
        <button class="bg-lime-400 hover:bg-lime-500 text-white font-semibold px-4 py-2 rounded mb-4"
            onclick="document.getElementById('modal-create').classList.remove('hidden')">
            Crear Tarea
        </button>

        <table class="w-full border-collapse border border-gray-300 shadow-md">
            <thead class="bg-lime-200">
                <tr>
                    <th class="border border-gray-50 px-4 py-2">Nombre</th>
                    <th class="border border-gray-50 px-4 py-2">Descripción</th>
                    <th class="border border-gray-50 px-4 py-2">Estado</th>
                    <th class="border border-gray-50 px-4 py-2">Fecha de Vencimiento</th>
                    <th class="border border-gray-50 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="bg-white border-b border-gray-300 hover:bg-gray-100 cursor-pointer">
                        <td class="border border-gray-50 px-4 py-2" onclick="openEditModal({{ $task }})">
                            {{ $task->title }}
                        </td>
                        <td class="border border-gray-50 px-4 py-2" onclick="openEditModal({{ $task }})">
                            {{ $task->description }}
                        </td>
                        <td class="border border-gray-50 px-4 py-2 cursor-pointer text-center 
                            {{ $task->status == 'pendiente' ? 'bg-yellow-200' : ($task->status == 'vencida' ? 'bg-red-200' : ($task->status == 'completada' ? 'bg-green-200' : '')) }}"
                            onclick="openEditModal({{ $task }})">
                            {{ ucfirst($task->status) }}
                        </td>
                        <td class="border border-gray-50 px-4 py-2 text-center" onclick="openEditModal({{ $task }})">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Sin fecha' }}
                        </td>
                        <td class="border border-gray-50 px-4 py-2 bg-red-400 cursor-pointer text-center hover:bg-red-500"
                            onclick="showDeleteModal({{ $task->id }})">
                            Eliminar
                        </td>
                        <form id="delete-task-{{ $task->id }}" action="/api/task/{{ $task->id }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('livewire.create-task')
        @include('livewire.edit-task')

        <div id="modal-delete" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">¿Seguro que deseas eliminar esta tarea?</h2>
                <div class="flex justify-end gap-4">
                    <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Cancelar
                    </button>
                    <button id="confirm-delete" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>

        <script>
            function openEditModal(task) {
                document.getElementById('edit-task-id').value = task.id;
                document.getElementById('edit-title').value = task.title;
                document.getElementById('edit-description').value = task.description;
                document.getElementById('edit-due_date').value = task.due_date || '';
                document.getElementById('edit-status').value = task.status;
                document.getElementById('edit-task-form').action = `/api/task/${task.id}`;
                document.getElementById('modal-edit').classList.remove('hidden');
            }
        </script>
        <script>
            let currentTaskId = null;

            function showDeleteModal(taskId) {
                currentTaskId = taskId;
                document.getElementById('modal-delete').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('modal-delete').classList.add('hidden');
                currentTaskId = null;
            }

            document.getElementById('confirm-delete').onclick = function() {
                if (currentTaskId) {
                    document.getElementById(`delete-task-${currentTaskId}`).submit();
                }
            }
        </script>
    </div>
@endsection
