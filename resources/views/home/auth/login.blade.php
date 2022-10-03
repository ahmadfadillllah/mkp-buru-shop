@include('home.layout.head')
@include('home.layout.header')
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url(https://template.hasthemes.com/ezone/ezone/assets/img/bg/breadcrumb.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>masuk</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li> masuk </li>
            </ul>
        </div>
    </div>
</div>
<div class="register-area ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-6 col-xl-6 ms-auto me-auto">
                @include('auth.notification.index')
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">
                            <form action="{{ route('logincustomer.post') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Email">
                                <input type="password" name="password" placeholder="Password">
                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <input type="checkbox">
                                        <label>Ingat saya</label>
                                        <a href="#">Lupa password?</a>
                                    </div>
                                    <button type="submit" class="default-btn floatright">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.layout.footer')
