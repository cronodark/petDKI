<!-- Create a new file: resources/views/partials/confirmation-modal.blade.php -->
<div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <h3 id="modalTitle" class="text-2xl font-bold text-blue-950 mb-4"></h3>
        <p id="modalMessage" class="text-gray-700 mb-6"></p>
        <div class="flex justify-end gap-4">
            <button id="cancelButton" class="px-4 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100">
                Cancel
            </button>
            <button id="confirmButton" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:brightness-110">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
function showConfirmationModal(title, message, onConfirm) {
    // Set modal content
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalMessage').textContent = message;
    
    // Show modal
    document.getElementById('confirmationModal').classList.remove('hidden');
    
    // Handle confirm button
    const confirmButton = document.getElementById('confirmButton');
    const cancelButton = document.getElementById('cancelButton');
    
    // Remove old event listeners
    const newConfirmButton = confirmButton.cloneNode(true);
    confirmButton.parentNode.replaceChild(newConfirmButton, confirmButton);
    
    const newCancelButton = cancelButton.cloneNode(true);
    cancelButton.parentNode.replaceChild(newCancelButton, cancelButton);
    
    // Add new event listeners
    newConfirmButton.addEventListener('click', function() {
        onConfirm();
        document.getElementById('confirmationModal').classList.add('hidden');
    });
    
    newCancelButton.addEventListener('click', function() {
        document.getElementById('confirmationModal').classList.add('hidden');
    });
}
</script>