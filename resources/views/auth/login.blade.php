<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - {{ config('app.name') }}.</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS files -->
    <link href="{{ asset("/tabler-assets/css/tabler.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("/tabler-assets/css/tabler-flags.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("/tabler-assets/css/tabler-payments.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("/tabler-assets/css/tabler-vendors.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("/tabler-assets/css/demo.min.css") }}" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body  class=" d-flex flex-column">
    <script src="{{ asset("/tabler-assets/js/demo-theme.min.js") }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset("/images/logo.jpg")}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form id="loginForm">   
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    <a href="/auth/reset-password">I forgot password</a>
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" placeholder="Your password" name="password" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" value="1"/>
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="/auth/register" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset("/tabler-assets/js/tabler.min.js") }}" defer></script>
    <script src="{{ asset("/tabler-assets/js/demo.min.js") }}" defer></script>
    <script type="text/javascript">
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var form = this;
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/auth/login', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            //on sending request
            xhr.onloadstart = function() {
                Swal.fire({
                    title: 'Please Wait',
                    html: 'Logging in...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            };
            //on success
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });
                        //redirect to dashboard after login
                        window.location.href = '/admin/dashboard';
                    } else if(response.status == 'validation_error') { 
                        //show validation errors
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: response.messages.join('<br>'),
                        });
                    } else {
                        //show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Request failed'
                    });
                }
            };
            //on error
            xhr.onerror = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Request failed'
                });
            };
            //send request
            xhr.send(formData);
        });
    </script>
</body>
</html>