@extends('layouts.guest')
@section('content')
    <section id="contact" class="contact section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Login</h2>
        <p>Masuk menggunakan user dan password yang telah terdaftar.</p>
      </div>

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-12">
            <div class="form-wrapper">
            <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">
                  <span>Login</span>
                  <i class="bi bi-arrow-right"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
