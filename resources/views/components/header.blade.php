<nav class="navbar navbar-expand-md navbar-light shadow-sm samazon-header-container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div>
        <a href="{{ url('/') }}" style="text-decoration:none;color:black;"><h1>バスケットマン集結!</h1></a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto mr-5 mt-2">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('register') }}">
                <i class="fas fa-external-link-alt"></i><label>新規登録</label></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i><label>ログイン</label>
                </a>
            </li>
            <li class="nav-item mr-3">
               <a class="nav-link" href="{{ route('teams.index') }}">
                   <i class="fas fa-search mr-1"></i><label>チームを探す</label>
               </a>
             </li>
            <li class="nav-item mr-3">
               <a class="nav-link" href="{{ route('users.index') }}">
                   <i class="fas fa-search mr-1"></i><label>プレイヤーを探す</label>
               </a>
             </li>
            @endguest
            @auth
             <li class="nav-item mr-3">
               <a class="nav-link" href="{{ route('mypage') }}">
                   <i class="fas fa-user mr-1"></i><label>マイページ</label>
               </a>
           </li>
           <li class="nav-item mr-3">
               <a class="nav-link" href="{{ route('teams.index') }}">
                   <i class="fas fa-search mr-1"></i><label>チームを探す</label>
               </a>
             </li>
            <li class="nav-item mr-3">
               <a class="nav-link" href="{{ route('users.index') }}">
                   <i class="fas fa-search mr-1"></i><label>プレイヤーを探す</label>
               </a>
             </li>
            @endauth
            
        </ul>
    </div>
</nav>