<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
    <div class="px-4">
        @auth
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        @endauth
    </div>

    <div class="mt-3 space-y-1">
        @auth
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        @else
            <!-- If the user is not authenticated, show a login link or other appropriate content -->
            {{-- <x-responsive-nav-link :href="route('login')">
                {{ __('Log In') }}
            </x-responsive-nav-link> --}}
            <!-- You can also add a link to the registration page if needed -->
            {{-- <x-responsive-nav-link :href="route('register')">
                {{ __('Register') }}
            </x-responsive-nav-link> --}}
        @endauth
    </div>
</div>
