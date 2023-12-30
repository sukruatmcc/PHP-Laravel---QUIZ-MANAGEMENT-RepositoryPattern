<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('admin') }}/dist/img/quiz.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">My Quiz</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('student.exams') }}" class="d-block">{{ Auth::user()->name }} - {{ Auth::user()->role }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
             <li class="nav-item">
                <a href="{{ route('student.exams') }}" class="nav-link {{ Request::is('student/exams') ? 'active' : '' }}">
                    <i class="fa-solid fa-book-open"></i>
                    <p>
                        My Exams
                    </p>
                </a>
            </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()";
                        class="nav-link">
                        <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
