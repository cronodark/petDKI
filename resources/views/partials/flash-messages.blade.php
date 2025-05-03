<!-- Enhanced Notification System -->

<!-- Success Modal -->
@if(session('success'))
    <div id="successModal" class="fixed inset-0 flex items-center justify-center z-[1000] bg-black bg-opacity-40 backdrop-blur-sm">
        <div class="relative w-[480px] max-w-[90%] transition-all transform scale-100 animate-fade-in">
            <!-- Success Icon -->
            <div class="absolute -top-12 left-1/2 -translate-x-1/2">
                <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg" class="drop-shadow-md">
                    <circle cx="48" cy="48" r="48" fill="#D7F6D4"/>
                    <path d="M66.5 37.5L43.5 60.5L30.5 47.5" stroke="#05CD99" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            
            <!-- Message Container -->
            <div class="bg-white rounded-2xl shadow-lg pt-16 pb-6 px-8">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-3">
                    {{ session('success') }}
                </h2>
                <p class="text-lg text-gray-600 text-center mb-6">
                    Operation completed successfully.
                </p>
                
                <!-- OK Button -->
                <div class="flex justify-center">
                    <button class="close-modal px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Error Modal -->
@if(session('error'))
    <div id="errorModal" class="fixed inset-0 flex items-center justify-center z-[1000] bg-black bg-opacity-40 backdrop-blur-sm">
        <div class="relative w-[480px] max-w-[90%] transition-all transform scale-100 animate-fade-in">
            <!-- Error Icon -->
            <div class="absolute -top-12 left-1/2 -translate-x-1/2">
                <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg" class="drop-shadow-md">
                    <circle cx="48" cy="48" r="48" fill="#FDE8E8"/>
                    <path d="M60 36L36 60M36 36L60 60" stroke="#EF4444" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            
            <!-- Message Container -->
            <div class="bg-white rounded-2xl shadow-lg pt-16 pb-6 px-8">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-3">
                    {{ session('error') }}
                </h2>
                <p class="text-lg text-gray-600 text-center mb-6">
                    Please try again later.
                </p>
                
                <!-- OK Button -->
                <div class="flex justify-center">
                    <button class="close-modal px-8 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Validation Error Modal -->
@if($errors->any())
    <div id="validationModal" class="fixed inset-0 flex items-center justify-center z-[1000] bg-black bg-opacity-40 backdrop-blur-sm">
        <div class="relative w-[480px] max-w-[90%] transition-all transform scale-100 animate-fade-in">
            <!-- Warning Icon -->
            <div class="absolute -top-12 left-1/2 -translate-x-1/2">
                <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg" class="drop-shadow-md">
                    <circle cx="48" cy="48" r="48" fill="#FEF3C7"/>
                    <path d="M48 32V52M48 64H48.01" stroke="#F59E0B" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            
            <!-- Message Container -->
            <div class="bg-white rounded-2xl shadow-lg pt-16 pb-6 px-8">
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">
                    There were some problems with your input
                </h2>
                <ul class="text-base text-gray-600 list-disc pl-6 mb-6 max-h-48 overflow-y-auto">
                    @foreach($errors->all() as $error)
                        <li class="mb-2">{{ $error }}</li>
                    @endforeach
                </ul>
                
                <!-- OK Button -->
                <div class="flex justify-center">
                    <button class="close-modal px-8 py-2 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    
    @keyframes fadeOut {
        from { opacity: 1; transform: scale(1); }
        to { opacity: 0; transform: scale(0.95); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
    
    .animate-fade-out {
        animation: fadeOut 0.3s ease-in forwards;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Auto-close modals after 5 seconds
        const modals = document.querySelectorAll('#successModal, #errorModal, #validationModal');
        
        setTimeout(function () {
            modals.forEach(function (modal) {
                if (modal) {
                    modal.classList.add('animate-fade-out');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 300);
                }
            });
        }, 5000);
        
        // Close on button click
        const closeButtons = document.querySelectorAll('.close-modal');
        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const modal = this.closest('[id$="Modal"]');
                if (modal) {
                    modal.classList.add('animate-fade-out');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 300);
                }
            });
        });
        
        // Close on click outside
        modals.forEach(function(modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('animate-fade-out');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
</script>