@extends('layouts.store')

@section('styles')
    <style>
        .paytone-slate {
            font-family:
                "Paytone One",
                -apple-system,
                Roboto,
                Helvetica,
                sans-serif;
            font-weight: 400;
            color: rgba(55, 73, 106, 1);
        }

        /* Animation and transition styles */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .slide-in {
            animation: slideIn 0.4s ease-out;
        }

        .scale-in {
            animation: scaleIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Loading spinner animation */
        .spinner {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: #475569;
            animation: spin 1s infinite linear;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Loading overlay */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition:
                opacity 0.3s,
                visibility 0.3s;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Hover effects for buttons and links */
        .nav-item {
            transition:
                background-color 0.2s,
                transform 0.2s;
        }

        .nav-item:hover:not(.active-nav) {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .btn-hover {
            transition:
                transform 0.2s,
                box-shadow 0.2s;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Table row hover effect */
        .table-row {
            transition: background-color 0.2s;
        }

        .table-row:hover {
            background-color: rgba(226, 232, 240, 0.5);
        }

        /* Page transition effect */
        .page-transition {
            transition:
                opacity 0.3s,
                transform 0.3s;
        }

        .page-transition.loading {
            opacity: 0.6;
            transform: scale(0.98);
        }

        /* Staggered animation for table rows */
        .stagger-item {
            opacity: 0;
            transform: translateY(10px);
        }

        .stagger-item.animate {
            animation: staggerIn 0.4s ease-out forwards;
        }

        @keyframes staggerIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Pulse animation for active elements */
        .pulse-effect {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(71, 85, 105, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(71, 85, 105, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(71, 85, 105, 0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    @livewireStyles
@endsection

@section('content')
    @livewire('transacsion-list')
@endsection

@section('script')
    @livewireScripts
    <script>
        function toggleExportDropdown() {
            const dropdown = document.getElementById('exportDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Optional: Tutup dropdown jika klik di luar
        window.addEventListener('click', function(e) {
            const exportButton = document.getElementById('exportButton');
            const exportDropdown = document.getElementById('exportDropdown');
            if (!exportButton.contains(e.target)) {
                exportDropdown.classList.add('hidden');
            }
        });
    </script>
    <script>
        function toggleFilterDropdown() {
            const dropdown = document.getElementById('filterDropdown');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');
            if (!filterButton.contains(e.target)) {
                filterDropdown.classList.add('hidden');
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Elements
            const mainContent = document.getElementById("main-content");
            const tableLoading = document.getElementById("table-loading");
            const tableRows = document.querySelectorAll(".stagger-item");
            const searchForm = document.getElementById("search-form");
            const searchButton = document.getElementById("search-button");
            const filterButton = document.getElementById("filter-button");
            const exportButton = document.getElementById("export-button");
            const paginationLinks = document.querySelectorAll("#pagination a");
            const prevPage = document.getElementById("prev-page");
            const nextPage = document.getElementById("next-page");

            // Show loading state
            function showLoading() {
                tableLoading.classList.add("active");
                mainContent.classList.add("loading");
                // Announce loading state for screen readers
                const loadingAnnouncement = document.createElement("div");
                loadingAnnouncement.setAttribute("aria-live", "polite");
                loadingAnnouncement.textContent = "Loading data, please wait...";
                document.body.appendChild(loadingAnnouncement);

                setTimeout(() => {
                    document.body.removeChild(loadingAnnouncement);
                }, 1000);
            }

            // Hide loading state
            function hideLoading() {
                tableLoading.classList.remove("active");
                mainContent.classList.remove("loading");

                // Animate table rows with staggered effect
                tableRows.forEach((row, index) => {
                    setTimeout(() => {
                        row.classList.add("animate");
                    }, 100 * index);
                });

                // Announce completion for screen readers
                const completionAnnouncement = document.createElement("div");
                completionAnnouncement.setAttribute("aria-live", "polite");
                completionAnnouncement.textContent = "Data loaded successfully";
                document.body.appendChild(completionAnnouncement);

                setTimeout(() => {
                    document.body.removeChild(completionAnnouncement);
                }, 1000);
            }

            // Simulate initial page load
            setTimeout(() => {
                // Animate table rows with staggered effect
                tableRows.forEach((row, index) => {
                    setTimeout(() => {
                        row.classList.add("animate");
                    }, 100 * index);
                });
            }, 500);

            // Search functionality with loading state
            searchForm.addEventListener("submit", function(e) {
                e.preventDefault();
                showLoading();

                // Simulate search delay
                setTimeout(() => {
                    hideLoading();
                }, 1200);
            });

            // Filter button click handler
            filterButton.addEventListener("click", function() {
                showLoading();

                // Simulate filter processing
                setTimeout(() => {
                    hideLoading();
                }, 800);
            });

            // Export button click handler
            exportButton.addEventListener("click", function() {
                // Add a temporary pulse effect
                this.classList.add("pulse-effect");

                // Remove the effect after animation completes
                setTimeout(() => {
                    this.classList.remove("pulse-effect");
                }, 2000);

                // Show a brief loading state
                const exportText = this.querySelector("span");
                const originalText = exportText.textContent;
                exportText.textContent = "Exporting...";

                setTimeout(() => {
                    exportText.textContent = originalText;
                }, 1500);
            });

            // Pagination functionality
            paginationLinks.forEach((link) => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();

                    // Don't do anything if clicking the current page
                    if (this.getAttribute("aria-current") === "page") {
                        return;
                    }

                    // Show loading state
                    showLoading();

                    // Remove current page indicator
                    document
                        .querySelector('[aria-current="page"]')
                        .removeAttribute("aria-current");
                    document
                        .querySelector(".pulse-effect")
                        .classList.remove("pulse-effect");

                    // Reset all page links
                    document.querySelectorAll("#pagination a").forEach((a) => {
                        a.classList.remove(
                            "self-stretch",
                            "px-2",
                            "pt-px",
                            "pb-2.5",
                            "text-white",
                            "rounded-md",
                            "bg-slate-600",
                            "h-[25px]",
                            "w-[25px]",
                            "text-center",
                        );
                    });

                    // Set new current page
                    if (this.id.includes("page")) {
                        this.classList.add(
                            "self-stretch",
                            "px-2",
                            "pt-px",
                            "pb-2.5",
                            "text-white",
                            "rounded-md",
                            "bg-slate-600",
                            "h-[25px]",
                            "w-[25px]",
                            "text-center",
                            "pulse-effect",
                        );
                        this.setAttribute("aria-current", "page");
                    } else {
                        // If prev/next was clicked, update the appropriate page number
                        const currentPage = parseInt(
                            document.querySelector('[aria-current="page"]')?.textContent ||
                            "2",
                        );
                        let newPage;

                        if (this.id === "prev-page") {
                            newPage = Math.max(currentPage - 1, 1);
                        } else {
                            newPage = Math.min(currentPage + 1, 3);
                        }

                        const pageElement = document.getElementById(`page-${newPage}`);
                        pageElement.classList.add(
                            "self-stretch",
                            "px-2",
                            "pt-px",
                            "pb-2.5",
                            "text-white",
                            "rounded-md",
                            "bg-slate-600",
                            "h-[25px]",
                            "w-[25px]",
                            "text-center",
                            "pulse-effect",
                        );
                        pageElement.setAttribute("aria-current", "page");
                    }

                    // Simulate page change delay
                    setTimeout(() => {
                        // Reset animation on table rows
                        tableRows.forEach((row) => {
                            row.classList.remove("animate");
                        });

                        // Re-animate rows with staggered effect
                        setTimeout(() => {
                            tableRows.forEach((row, index) => {
                                setTimeout(() => {
                                    row.classList.add("animate");
                                }, 100 * index);
                            });
                        }, 100);

                        hideLoading();
                    }, 800);
                });
            });

            // Add focus styles for keyboard navigation
            const focusableElements = document.querySelectorAll("a, button, input");
            focusableElements.forEach((el) => {
                el.addEventListener("focus", function() {
                    this.style.outline = "2px solid #475569";
                    this.style.outlineOffset = "2px";
                });

                el.addEventListener("blur", function() {
                    this.style.outline = "none";
                });
            });

            // Simulate data refresh on interval (for demo purposes)
            let refreshInterval;

            function startAutoRefresh() {
                refreshInterval = setInterval(() => {
                    const randomRow = Math.floor(Math.random() * tableRows.length);
                    const targetRow = tableRows[randomRow];

                    // Add a subtle highlight effect to simulate data update
                    targetRow.style.backgroundColor = "rgba(226, 232, 240, 0.8)";
                    setTimeout(() => {
                        targetRow.style.backgroundColor = "";
                    }, 1000);
                }, 10000); // Refresh random row every 10 seconds
            }

            // Start auto-refresh after initial page load
            setTimeout(startAutoRefresh, 2000);

            // Cleanup interval when page is hidden
            document.addEventListener("visibilitychange", function() {
                if (document.hidden) {
                    clearInterval(refreshInterval);
                } else {
                    startAutoRefresh();
                }
            });

            // Keyboard shortcuts for navigation
            document.addEventListener("keydown", function(e) {
                // Left arrow for previous page
                if (e.key === "ArrowLeft" && e.altKey) {
                    prevPage.click();
                }

                // Right arrow for next page
                if (e.key === "ArrowRight" && e.altKey) {
                    nextPage.click();
                }

                // F key for filter
                if (e.key === "f" && e.altKey) {
                    e.preventDefault();
                    filterButton.click();
                }

                // S key for search focus
                if (e.key === "s" && e.altKey) {
                    e.preventDefault();
                    document.getElementById("search-input").focus();
                }
            });

            // Announce keyboard shortcuts for screen reader users
            const keyboardHelpButton = document.createElement("button");
            keyboardHelpButton.textContent = "?";
            keyboardHelpButton.className =
                "fixed bottom-4 right-4 w-8 h-8 rounded-full bg-slate-600 text-white flex items-center justify-center";
            keyboardHelpButton.setAttribute(
                "aria-label",
                "Keyboard shortcuts help",
            );
            document.body.appendChild(keyboardHelpButton);

            keyboardHelpButton.addEventListener("click", function() {
                const helpText =
                    "Keyboard shortcuts: Alt+Left Arrow for previous page, Alt+Right Arrow for next page, Alt+F for filter, Alt+S to focus search";
                alert(helpText);
            });
        });
    </script>
@endsection
