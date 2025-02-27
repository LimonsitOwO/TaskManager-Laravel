<section class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden" id="modal-create">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
      <h2 class="text-xl font-bold mb-4">Crear Nueva Tarea</h2>
      
      <form action="/api/task" method="POST">
          @csrf
          <div class="mb-4">
              <label for="title" class="block text-gray-700">Título</label>
              <input type="text" name="title" id="title" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg">
          </div>

          <div class="mb-4">
              <label for="description" class="block text-gray-700">Descripción</label>
              <textarea name="description" id="description" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg"></textarea>
          </div>

          <div class="mb-4">
              <label for="due_date" class="block text-gray-700">Fecha de vencimiento</label>
              <input type="date" name="due_date" id="due_date"
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg">
          </div>

          <div class="flex justify-between">
              <button type="submit" class="bg-lime-400 text-white px-4 py-2 rounded hover:bg-lime-500">
                  Guardar
              </button>
              <button type="button" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-500"
                  onclick="document.getElementById('modal-create').classList.add('hidden')">
                  Cancelar
              </button>
          </div>
      </form>
  </div>
</section>
