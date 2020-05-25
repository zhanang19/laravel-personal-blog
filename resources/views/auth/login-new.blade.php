@extends('layouts.blogmag.main')
@section('content')
    <!-- cart -->
    <section id="account" class="account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="account-inner">
                        <div class="section-title">
                            <h3>Login</h3>
                        </div>
                        <form class="" method="">
                            <div class="form-group">
                                <label>Username/Email Address:</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="Password" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <button class="btn-red">Login</button>
                                <input class="checkbox" type="checkbox"> <span>Remember me</span>
                            </div>    
                            <p class="lost_password">
                                <a href="lost_password.html">Lost your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="account-inner">
                        <div class="section-title">
                            <h3 class="h1" style="color: #bcbcbc;">Sign Up</h3>
                        </div>
                        <form class="" method="">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <label>Phone No.:</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <label>Country:</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <label>Categories:</label>
                                <select>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="Password" class="form-control" name="">
                            </div> 
                            <div class="form-group">
                                <button class="btn-red">Register</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End store -->
@endsection