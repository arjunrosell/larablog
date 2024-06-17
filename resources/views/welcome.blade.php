<x-layout>
    <h1>Larablog</h1>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div id="success-message" class="fixed bottom-0 right-0 p-4 text-white hidden">
        <div id="toast-success" class="flex items-center max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Created successfully</div>
        </div>
    </div>

    <button onclick="showSuccessMessage()" class="mt-4 p-2 bg-blue-500 text-white rounded">Show Success Message</button>

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
    </script>
</body>
</html>

</x-layout>
