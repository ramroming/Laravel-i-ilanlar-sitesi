<div class="col-lg-2 mr-auto">
    <div class="border p-4 rounded">
        <p class="text-black font-weight-bold">User Panel</p>
        <hr>
        <br>
        @auth
        <ul class="list-unstyled block mb-0">
            <li class="border-bottom mb-3"><a href="{{route('myprofile')}}">Profile</a></li>
            <li class="border-bottom mb-3"><a href="{{route('user_public_profile')}}">Public profile</a></li>
            <li class="border-bottom mb-3"><a href="{{route('user_cv')}}">Cv</a></li>
            <li class="border-bottom mb-3"><a href="{{route('mycomments')}}">comments</a></li>
            <li class="border-bottom mb-3"><a href="{{route('user_application')}}">Applications</a></li>
            <li class="border-bottom mb-3"><a href="{{route('user_received_applications')}}">Received Applications</a></li>
            <li class="border-bottom mb-3"><a href="{{route('user_jobs')}}">Jobs</a></li>
            <li class="border-bottom mb-3"><a href="{{route('logout')}}">Logout</a></li>

            @php
                $userRoles = Auth::user()->roles->pluck('name');
            @endphp
            @if($userRoles->contains('admin'))
                <li class="border-bottom mb-3"><a href="{{route('adminHome')}}" target="_blank">Admin Panel</a></li>
            @endif
        </ul>
        @endauth
    </div>
</div>
