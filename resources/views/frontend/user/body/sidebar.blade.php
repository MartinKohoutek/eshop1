<div class="card-body">
    <div class="list-group list-group-flush"> <a href="{{ url('dashboard') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
        <a href="{{ route('user.orders') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
        <a href="account-downloads.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Downloads <i class='bx bx-download fs-5'></i></a>
        <a href="account-addresses.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
        <a href="account-payment-methods.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
        <a href="{{ route('user.change.password') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Change Password <i class='bx bx-user-circle fs-5'></i></a>
        <a href="{{ route('user.details') }}" class="list-group-item active d-flex justify-content-between align-items-center">Account Details <i class='bx bx-user-circle fs-5'></i></a>
        <a href="{{ route('user.logout') }}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
    </div>
</div>