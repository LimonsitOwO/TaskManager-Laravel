<section class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden" id="modal-edit">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl">
      <h2 class="text-xl font-bold mb-4 text-center">Editar Tarea</h2>
      
      <form id="edit-task-form" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" id="edit-task-id" name="task_id">

          <div class="mb-4">
              <label for="edit-title" class="block text-gray-700">Título</label>
              <input type="text" name="title" id="edit-title" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>

          <div class="mb-4">
              <label for="edit-description" class="block text-gray-700">Descripción</label>
              <textarea name="description" id="edit-description" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400"></textarea>
          </div>

          <div class="mb-4">
              <label for="edit-due_date" class="block text-gray-700">Fecha de vencimiento</label>
              <input type="date" name="due_date" id="edit-due_date"
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>

          <div class="mb-4">
            <label for="edit-status" class="block text-gray-700">Estado</label>
            <select name="completed" id="edit-status"
                class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400">
                <option value="0">Pendiente</option>
                <option value="1">Completada</option>
            </select>
          </div>

          <div class="flex justify-between gap-4">
              <button type="submit" class="bg-blue-400 text-white w-full py-2 rounded hover:bg-blue-500">Guardar Cambios</button>
              <button type="button" class="bg-red-500 text-white w-full py-2 rounded hover:bg-red-700"
                  onclick="document.getElementById('modal-edit').classList.add('hidden')">Cancelar</button>
          </div>
      </form>
  </div>
</section>