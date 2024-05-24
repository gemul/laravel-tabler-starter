<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #loader {
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000;
        }
        
        #loader.fadeOut {
            opacity: 0;
            visibility: hidden;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }
        
        @-webkit-keyframes sk-scaleout {
            0% { -webkit-transform: scale(0) }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }
        
        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 100% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
                opacity: 0;
            }
        }
    </style>
    <script defer="defer" src="{{asset("/adminator-assets/main.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{asset("/adminator-assets/style.css")}}" rel="stylesheet">
    <body class="app">
        <div id="loader">
            <div class="spinner"></div>
        </div>
        
        <script>
            window.addEventListener('load', function load() {
                const loader = document.getElementById('loader');
                setTimeout(function() {
                    loader.classList.add('fadeOut');
                }, 300);
            });
        </script>
        <div class="peers ai-s fxw-nw h-100vh">
            <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("/adminator-assets/bg.jpg")'>
                <div class="pos-a centerXY">
                    <div class="bgc-white bdrs-50p pos-r" style="width: 120px; height: 120px;">
                        <img class="pos-a centerXY" src="/adminator-assets/logo.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width: 320px;">
                <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
                <form id="loginForm">
                    <div class="mb-3">
                        <label class="text-normal text-dark form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label class="text-normal text-dark form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="">
                        <div class="peers ai-c jc-sb fxw-nw">
                            <div class="peer">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="remember_me" name="remember_me" class="peer" value="1">
                                    <label for="remember_me" class="peers peer-greed js-sb ai-c form-label">
                                        <span class="peer peer-greed">Remember Me</span>
                                    </label>
                                </div>
                            </div>
                            <div class="peer">
                                <button class="btn btn-primary btn-color">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script type="text/javascript">
    //on form submit (without jquery)
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
</html>
    