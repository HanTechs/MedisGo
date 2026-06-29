@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="fixed top-20 right-5 z-[110] flex items-center p-4 mb-4 text-emerald-800 rounded-[2rem] bg-emerald-50 border border-emerald-100 shadow-xl animate-in fade-in slide-in-from-right-10 duration-500"
        role="alert">
        <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Success</span>
        <div class="ms-3 text-sm font-black tracking-wide">
            {{ session('success') }}
        </div>
        <button type="button" @click="show = false"
            class="ms-auto -mx-1.5 -my-1.5 bg-emerald-50 text-emerald-500 rounded-full focus:ring-2 focus:ring-emerald-400 p-1.5 hover:bg-emerald-100 inline-flex items-center justify-center h-8 w-8 transition-colors"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="fixed top-20 right-5 z-[110] flex items-center p-4 mb-4 text-red-800 rounded-[2rem] bg-red-50 border border-red-100 shadow-xl animate-in fade-in slide-in-from-right-10 duration-500"
        role="alert">
        <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.422 13.313a1.474 1.474 0 0 1 0-2.084 1.474 1.474 0 0 1 2.084 0 1.474 1.474 0 0 1 0 2.084 1.474 1.474 0 0 1-2.084 0ZM11 10a1 1 0 1 1-2 0V7a1 1 0 1 1 2 0v3Z" />
        </svg>
        <span class="sr-only">Error</span>
        <div class="ms-3 text-sm font-black tracking-wide">
            {{ session('error') }}
        </div>
        <button type="button" @click="show = false"
            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-full focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 transition-colors"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif
