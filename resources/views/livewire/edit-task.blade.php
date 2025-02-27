<section class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden" id="modal-edit">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
      <h2 class="text-xl font-bold mb-4">Editar Tarea</h2>
      
      <form id="edit-task-form" method="POST">
          @csrf
          @method('PUT')

          <input type="hidden" id="edit-task-id" name="task_id">

          <div class="mb-4">
              <label for="edit-title" class="block text-gray-700">Título</label>
              <input type="text" name="title" id="edit-title" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg">
          </div>

          <div class="mb-4">
              <label for="edit-description" class="block text-gray-700">Descripción</label>
              <textarea name="description" id="edit-description" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg"></textarea>
          </div>

          <div class="mb-4">
              <label for="edit-due_date" class="block text-gray-700">Fecha de vencimiento</label>
              <input type="date" name="due_date" id="edit-due_date"
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg">
          </div>

          <div class="mb-4">
              <label for="edit-status" class="block text-gray-700">Estado</label>
              <select name="status" id="edit-status"
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg">
                  <option value="pendiente">Pendiente</option>
                  <option value="vencida">Vencida</option>
                  <option value="completada">Completada</option>
              </select>
          </div>

          <div class="flex justify-between">
              <button type="submit" class="bg-lime-400 text-white px-4 py-2 rounded hover:bg-lime-500">
                  Guardar Cambios
              </button>
              <button type="button" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-500"
                  onclick="document.getElementById('modal-edit').classList.add('hidden')">
                  Cancelar
              </button>
          </div>
      </form>
  </div>
</section>
