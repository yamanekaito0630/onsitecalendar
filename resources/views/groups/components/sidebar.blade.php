<nav class="navbar navbar-expand-lg p-0 position-sticky top-0 no-print">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="w-100 d-flex flex-column flex-shrink-0 p-3 bg-light min-vh-100">
            <div class="text-center">
                <span class="fs-4">{{ $group->name }}</span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="py-1">
                    <form method="post">
                        @csrf
                        <label for="">現場検索</label>
                        <div class="input-group">
                            <select name="onsite" class="form-control">
                                @foreach($onsites as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">
		                        <button type="submit" class="btn btn-default search-btn"><i class="fas fa-search"></i></button>
	                        </span>
                        </div>
                    </form>
                </li>
                <li class="py-1">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#salaryModal">給与確認</button>
                </li>
                <li class="py-1">
                    <form>
                        <input class="btn btn-primary w-100" type="button" value="カレンダー出力" onclick="window.print();">
                    </form>
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

