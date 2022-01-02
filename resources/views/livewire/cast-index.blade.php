
<section class="container mx-auto p-6 font-mono">
    <div class="w-full p-2 mb-4 flex justify-end">
        <x-jet-button>Create Cast</x-jet-button>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Name</th>
              <th class="px-4 py-3">Slug</th>
              <th class="px-4 py-3">Poster</th>
              <th class="px-4 py-3">Manage</th>
            </tr>
          </thead>
          <tbody class="bg-white">
          @forelse ($casts as $cast)

            <tr class="text-gray-700">
              <td class="px-4 py-3 border">
                Title hire
              </td>
              <td class="px-4 py-3 text-ms font-semibold border">Date hire </td>
              <td class="px-4 py-3 text-xs border">
                Rating hire
              </td>
              <td class="px-4 py-3 text-sm border">Public hire</td>
              <td class="px-4 py-3 text-sm border">Edit/Delete</td>
            </tr>

          @empty

          @endforelse
        </tbody>
        </table>
      </div>
    </div>
  </section>
