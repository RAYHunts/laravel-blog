<nav class="p-6 px-auto w-full bg-slate-200 dark:bg-slate-800 fixed">
    <div class="container flex justify-between  ">
        <div>
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="w-24"/>
            </a>
        </div>
        <div>
            <ul class="flex gap-3">
                <li>
                    <a href="">Logout</a>
                </li>
                <li>
                    <a href="">Logout</a>
                </li>
                <li>
                    {{ now() }}
                </li>
                <li>
                    {{ Auth::user()->name }}
                </li>
            </ul>
        </div>
    </div>

</nav>