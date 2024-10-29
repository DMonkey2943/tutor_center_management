<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 style="color: #136ad5" class="font-weight-bold text-uppercase">@yield('title')</h3>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <div class="d-flex align-items-center dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span>{{ Auth::user()->name }}</span>
            </div>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                    @csrf
                    <input type="submit" class="bg-transparent" style="width: 100%" value="Đăng xuất">
                </form>
            </div>
        </div>
    </div>
</div>
