<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded px-3 no-print z-50">
    <div class="container-fluid">
        <a href="{{ route('admin.my-page', $group->id) }}" class="navbar-brand title">現場共有カレンダー：管理画面</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('my-page') }}" class="user-name mx-1">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('group.my-page', $group->id) }}" class="change-mode mx-1">グループ画面へ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

