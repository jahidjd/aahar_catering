<div class="col-md-6 col-sm-12">
    <ul class="notification-area pull-right">
        <li>
            <span class="nav-btn pull-left d_none_lg">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </li>
        <li id="full-view" class="d_none_sm"><i class="feather ft-maximize"></i></li>


        <li class="user-dropdown">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d_none_sm">{{ Auth::user()->name }} <i class="feather ft-chevron-down"></i></span>
                    <img src="{{ url('assets/images/user.png') }}" alt="" class="img-fluid">
                </button>
                <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="user_img mb-3">
                            <img src="{{ url('assets/images/user.png') }}" alt="User Image">
                        </div>
                        <div class="user_bio text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"
                        style="text-align-last: end;">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>
</div>
