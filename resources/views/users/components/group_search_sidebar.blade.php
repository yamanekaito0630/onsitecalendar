<nav class="navbar navbar-expand-lg p-0 position-sticky top-0">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="w-100 d-flex flex-column flex-shrink-0 p-3 bg-light min-vh-100">
            <div class="text-center">
                <span class="fs-4">カレンダー</span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="py-1">
                    <label>グループ検索</label>
                    <div class="input-group">
                        <input type="text" id="search-text" class="form-control" placeholder="グループ名" autofocus>
                    </div>
                </li>
                <li class="py-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                    this.closest('form').submit();" class="logout">
                            <span class="btn btn-secondary">ログアウト</span>
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>



