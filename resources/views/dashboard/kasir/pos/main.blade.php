<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        @media print {

            body,
            html {
                width: 80mm;
                max-width: 80mm;
                margin: 0;
                padding: 0;
                font-size: 12px;
                /* optional, biar lebih kecil */
            }

            @page {
                size: 80mm auto;
                /* auto height */
                margin: 0;
            }
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        xs: "480px",
                        sm: "640px",
                        md: "768px",
                        lg: "1024px",
                        xl: "1280px",
                        "2xl": "1536px",
                    },
                },
            },
        };
    </script>
    @livewireStyles
</head>

<body class="bg-white">
    @livewire('pos-system')
    @livewireScripts
    @stack('scripts')
</body>

</html>
