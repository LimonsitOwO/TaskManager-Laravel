@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>
        <button class="bg-blue-400 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded mb-4"
            onclick="document.getElementById('modal-create').classList.remove('hidden')">
            Crear Tarea
        </button>

        <div class="overflow-x-auto">
            <table
                class="w-full border-collapse border border-gray-300 shadow-md overflow-hidden rounded-lg text-sm lg:text-base">
                <thead class="bg-blue-400 text-white">
                    <tr>
                        <th class="border border-gray-50 px-4 py-2 text-center ">Nombre</th>
                        <th class="border border-gray-50 px-4 py-2 text-center ">Descripción</th>
                        <th class="border border-gray-50 px-4 py-2 text-center">Estado</th>
                        <th class="border border-gray-50 px-4 py-2 text-center ">Fecha de Vencimiento
                        </th>
                        <th class="border border-gray-50 px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($tasks as $task)
                        <tr class="bg-white border-b border-gray-300 hover:bg-gray-100 cursor-pointer">
                            <td class="border border-gray-50 px-4 py-2" onclick="openEditModal({{ $task }})">
                                {{ $task->title }}
                            </td>
                            <td class="border border-gray-50 px-4 py-2 "
                                onclick="openEditModal({{ $task }})">
                                {{ $task->description }}
                            </td>
                            <td class="border border-gray-50 px-4 py-2 cursor-pointer text-center {{ $task->completed ? 'bg-lime-300' : 'bg-yellow-300' }}"
                                onclick="openEditModal({{ $task }})">
                                {{ $task->completed ? 'Completa' : 'Pendiente' }}
                            </td>
                            <td class="border border-gray-50 px-4 py-2 text-center "
                                onclick="openEditModal({{ $task }})">
                                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Sin fecha' }}
                            </td>
                            <td class="border border-gray-50 px-4 py-2 bg-red-500 text-white cursor-pointer text-center hover:bg-red-700"
                                onclick="showDeleteModal({{ $task->id }})">
                                Eliminar
                            </td>
                            <form id="delete-task-{{ $task->id }}" action="/api/task/{{ $task->id }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('livewire.create-task')
        @include('livewire.edit-task')

        <div id="modal-delete" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-bold mb-4 text-center">¿Seguro que deseas eliminar esta tarea?</h2>
                <div class="flex flex-col md:flex-row justify-end gap-4">
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
                document.getElementById('edit-status').value = task.completed;
                document.getElementById('edit-task-form').action = `/api/tasks/${task.id}`;
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
