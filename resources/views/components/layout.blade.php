<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lara Blog - Laravel 11</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/custom.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    @if (session('message'))
    <div id="success-message" class="fixed  top-0 right-0 m-2 p-2 text-white hidden ">
        <div id="toast-success" class="flex items-center max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('message')}}</div>
        </div>
    </div>
    <script>
        function showSuccessMessage() {
            const message = document.getElementById('success-message');
            message.classList.remove('hidden');
            message.classList.add('block');

            // Hide the message after 3 seconds
            setTimeout(() => {
                message.classList.remove('block');
                message.classList.add('hidden');
            }, 3000);
        }

        // Call the function if there is a success message in the session
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('message'))
                showSuccessMessage();
            @endif
        });
    </script>
    @endif
    <x-navbar />
    <div class="max-w-screen-xl mx-auto xl:p-10 md:max-xl:p-8 max-sm:p-5">
        {{ $slot }}
    </div>
</body>
</html>
