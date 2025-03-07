<section class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden" id="modal-create">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl">
      <h2 class="text-xl font-bold mb-4 text-center">Crear Nueva Tarea</h2>
      
      <form action="/api/tasks" method="POST">
          @csrf
          <div class="mb-4">
              <label for="title" class="block text-gray-700">Título</label>
              <input type="text" name="title" id="title" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>

          <div class="mb-4">
              <label for="description" class="block text-gray-700">Descripción</label>
              <textarea name="description" id="description" required
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400"></textarea>
          </div>

          <div class="mb-4">
              <label for="due_date" class="block text-gray-700">Fecha de vencimiento</label>
              <input type="date" name="due_date" id="due_date"
                  class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-400">
          </div>

          <div class="flex justify-between gap-4">
              <button type="submit" class="bg-blue-400 text-white w-full py-2 rounded hover:bg-blue-500">Guardar</button>
              <button type="button" class="bg-red-500 text-white w-full py-2 rounded hover:bg-red-700"
                  onclick="document.getElementById('modal-create').classList.add('hidden')">Cancelar</button>
          </div>
      </form>
  </div>
</section>