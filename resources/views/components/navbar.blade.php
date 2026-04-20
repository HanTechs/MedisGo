<nav x-data="{ open: false }"
    class="bg-neutral-primary fixed w-full z-[60] top-0 start-0 border-b border-default shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3 px-7 ">
        <a href="#" class="flex items-center space-x-2 rtl:space-x-reverse group">
            <img src="/images/logo.png"
                class="m-0 h-12 w-auto transform transition-transform duration-300 group-hover:scale-150"
                alt="MedisGo Logo" />
            <span
                class="self-center text-2xl font-bold whitespace-nowrap transition-all duration-500
                       bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] 
                       bg-clip-text text-transparent">
                MedisGo
            </span>
        </a>

        <div class="flex items-center md:order-2 space-x-3 rtl:space-x-reverse pr-2 gap-3">

            {{-- Nama & Role --}}
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-slate-800 leading-tight">Nama Pengguna</p>
                <p class="text-xs font-bold text-formal-accent">Administrator</p>
            </div>

            {{-- Profil --}}
            <div class="relative">
                <button @click="open = !open" type="button"
                    class="flex text-sm bg-neutral-primary rounded-full focus:ring-4 focus:ring-blue-100 transition-all border border-formal-accent ">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/images/logo.png" alt="user photo">
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" x-cloak @click.away="open = false"
                    class="z-50  absolute right-0 mt-2 bg-neutral-primary border border-default rounded-base shadow-lg w-44 :class="open
                    ? 'block' , 'hidden' ">
                    <div class="px-4 py-3 text-sm border-b border-default text-center">
                        <span class="block text-slate-800 font-bold">Joseph McFall</span>
                        <span class="block text-slate-500 text-[10px] truncate">joseph@medisgo.com</span>
                    </div>
                    <ul class="p-2 text-sm text-slate-600 font-medium">
                        <li>
                            <a href="#"
                                class="inline-flex items-center w-full p-2 hover:bg-slate-50 hover:text-blue-600 rounded-base">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="inline-flex items-center w-full p-2 hover:bg-danger-soft hover:text-danger-strong rounded-base">Sign
                                Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
