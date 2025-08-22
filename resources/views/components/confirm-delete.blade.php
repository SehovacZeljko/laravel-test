{{-- Reusable Delete Confirmation Modal --}}
<div id="confirmModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Are you sure?</h2>
        <p id="confirmMessage" class="mb-6">Do you really want to delete this item? This action cannot be undone.</p>
        <div class="flex justify-end space-x-4">
            <div>
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancel
                </button>
            </div>
            <form id="confirmForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>
</div>


{{-- Script (you can also move this to app.js if you want) --}}
<script>
    function openModal(button) {
        const action = button.getAttribute('data-action');
        const name = button.getAttribute('data-name');

        // update form action dynamically
        document.getElementById('confirmForm').setAttribute('action', action);

        // update modal message
        document.getElementById('confirmMessage').innerHTML =
            `Do you really want to delete <strong>${name}</strong>? This action cannot be undone.`;

        // show modal
        document.getElementById('confirmModal').classList.remove('hidden');
        document.getElementById('confirmModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.remove('flex');
        document.getElementById('confirmModal').classList.add('hidden');
    }
</script>
