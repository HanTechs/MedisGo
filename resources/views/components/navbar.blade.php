<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 h-20">
    <div class="max-w-[1440px] mx-auto px-6 h-full flex justify-between items-center">
        {{-- Branding --}}
        <a href="#" class="flex items-center space-x-3 group">
            <img src="/img/logo.png" class="h-10 w-auto transition-transform duration-300 group-hover:scale-110"
                alt="MedisGo Logo" />
            <span
                class="text-2xl font-bold tracking-tight  bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] 
                           bg-clip-text text-transparent
                           group-hover:from-blue-600 group-hover:to-purple-600">
                MedisGo
            </span>
        </a>

        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block mr-2">
                <p class="text-xs font-extrabold text-[#0F172A]">

                </p>
                <p class="text-[10px] font-black text-[#0061A8] uppercase tracking-[0.15em]"></p>
            </div>

            {{-- Profil dropdown --}}

            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                class="flex text-sm bg-dark rounded-full md:me-0 focus:ring-4 focus:ring-neutral-quaternary"
                type="button">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="user photo">
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatar"
                class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-72">
                <div class="p-2">
                    <div class="flex items-center px-2.5 p-2 space-x-1.5 text-sm bg-neutral-secondary-strong rounded">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg"
                            alt="Rounded avatar">
                        <div class="text-sm">
                            <div class="font-medium text-heading">Joseph McFall</div>
                            <div class="truncate text-body">name@flowbite.com</div>
                        </div>
                    </div>
                </div>
                <ul class="px-2 pb-2 text-sm text-body font-medium" aria-labelledby="dropdownAvatarButton">
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                            <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Account
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 text-fg-danger hover:bg-neutral-tertiary-medium rounded">
                            <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                            </svg>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
