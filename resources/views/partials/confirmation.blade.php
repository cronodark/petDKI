<!-- resources/views/partials/confirmation-modal.blade.php -->
<div id="confirmationModal" class="flex fixed inset-0 justify-center items-center backdrop-blur-sm bg-black bg-opacity-30 z-50 hidden">
  <div class="relative p-8 mt-20 text-center bg-white rounded-2xl w-[600px] shadow-lg">
    
    <!-- Icon Container -->
    <div class="absolute left-1/2 -translate-x-1/2 top-[-80px]">
      <div class="bg-red-100 rounded-full w-[160px] h-[160px] flex items-center justify-center">
        <svg width="80" height="80" viewBox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
                d="M89.25 26.25V21C89.25 18.2152 88.1438 15.5445 86.1746 13.5754C84.2055 11.6062 81.5348 10.5 78.75 10.5H47.25C44.4652 10.5 41.7945 11.6062 39.8254 13.5754C37.8562 15.5445 36.75 18.2152 36.75 21V26.25H21C19.6076 26.25 18.2723 26.8031 17.2877 27.7877C16.3031 28.7723 15.75 30.1076 15.75 31.5C15.75 32.8924 16.3031 34.2277 17.2877 35.2123C18.2723 36.1969 19.6076 36.75 21 36.75H26.25V94.5C26.25 98.6772 27.9094 102.683 30.8631 105.637C33.8168 108.591 37.8228 110.25 42 110.25H84C88.1772 110.25 92.1832 108.591 95.1369 105.637C98.0906 102.683 99.75 98.6772 99.75 94.5V36.75H105C106.392 36.75 107.728 36.1969 108.712 35.2123C109.697 34.2277 110.25 32.8924 110.25 31.5C110.25 30.1076 109.697 28.7723 108.712 27.7877C107.728 26.8031 106.392 26.25 105 26.25H89.25ZM78.75 21H47.25V26.25H78.75V21ZM89.25 36.75H36.75V94.5C36.75 95.8924 37.3031 97.2277 38.2877 98.2123C39.2723 99.1969 40.6076 99.75 42 99.75H84C85.3924 99.75 86.7277 99.1969 87.7123 98.2123C88.6969 97.2277 89.25 95.8924 89.25 94.5V36.75Z"
                fill="#FF3A4C" />
          <path d="M47.25 47.25H57.75V89.25H47.25V47.25ZM68.25 47.25H78.75V89.25H68.25V47.25Z"
                fill="#FF3A4C" />
        </svg>
      </div>
    </div>

    <!-- Content -->
    <div class="mt-24">
      <h2 id="modalTitle" class="mb-3 text-3xl font-bold text-slate-700">
        Delete Item
      </h2>
      <p id="modalMessage" class="mb-6 text-lg text-slate-600">
        Are you sure you want to perform this action?
      </p>

      <!-- Buttons -->
      <div class="flex justify-center gap-4 mt-6">
        <button id="cancelButton"
          class="px-6 py-3 text-lg font-medium rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
          Cancel
        </button>
        <button id="confirmButton"
          class="px-6 py-3 text-lg font-medium text-white bg-red-600 rounded-xl hover:bg-red-700 transition-colors">
          Confirm
        </button>
      </div>
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

  // Remove old event listeners by cloning
  const confirmButton = document.getElementById('confirmButton');
  const cancelButton = document.getElementById('cancelButton');

  const newConfirm = confirmButton.cloneNode(true);
  const newCancel = cancelButton.cloneNode(true);

  confirmButton.parentNode.replaceChild(newConfirm, confirmButton);
  cancelButton.parentNode.replaceChild(newCancel, cancelButton);

  // Add new listeners
  newConfirm.addEventListener('click', () => {
    onConfirm();
    document.getElementById('confirmationModal').classList.add('hidden');
  });

  newCancel.addEventListener('click', () => {
    document.getElementById('confirmationModal').classList.add('hidden');
  });
}
</script>
