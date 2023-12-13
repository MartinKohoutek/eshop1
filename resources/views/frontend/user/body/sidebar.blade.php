@php
    $route = Route::current()->getName();
@endphp

<div class="card-body">
    <div class="list-group list-group-flush"> 
        <a href="{{ url('dashboard') }}" class="list-group-item {{ ($route == 'dashboard') ? 'active' : 'bg-transparent' }} d-flex justify-content-between align-items-center">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
        <a href="{{ route('user.orders') }}" class="list-group-item {{ ($route == 'user.orders') ? 'active' : 'bg-transparent' }} d-flex justify-content-between align-items-center ">Orders <i class='bx bx-cart-alt fs-5'></i></a>
        <a href="{{ route('return.order.page') }}" class="list-group-item {{ ($route == 'return.order.page') ? 'active' : 'bg-transparent' }} d-flex justify-content-between align-items-center ">Returned Orders <i class='bx bx-cart-alt fs-5'></i></a>
        <a href="{{ route('user.track.order') }}" class="list-group-item {{ ($route == 'user.track.order') ? 'active' : 'bg-transparent' }} d-flex justify-content-between align-items-center">Track Your Order <i class='bx bx-credit-card fs-5'></i></a>
        <a href="{{ route('user.change.password') }}" class="list-group-item {{ ($route == 'user.change.password') ? 'active' : 'bg-transparent' }} d-flex justify-content-between align-items-center ">Change Password <i class='bx bx-user-circle fs-5'></i></a>
        <a href="{{ route('user.details') }}" class="list-group-item {{ ($route == 'user.details') ? 'active' : 'bg-transparent' }} d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>
        <a href="{{ route('user.logout') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
    </div>
</div>