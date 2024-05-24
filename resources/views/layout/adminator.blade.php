<?php
$avatar = 'https://api.dicebear.com/8.x/bottts/svg?seed='.session()->get("_token");
$userName = 'John Doe';
if(auth()->check()) {
    $avatar = url('/storage/avatar/'.auth()->user()->avatar);
    $userName = auth()->user()->name;
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>@yield('title', 'Home') | {{ config('app.name') }}</title>
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
            0% {
                -webkit-transform: scale(0)
            }
            
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }
        
        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            
            100% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
                opacity: 0;
            }
        }
    </style>
    <script defer="defer" src="{{asset("/adminator-assets/main.js")}}"></script>
    <link href="{{asset("/adminator-assets/style.css")}}" rel="stylesheet">
    @yield('header')
</head>

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
    
    <div>
        <!-- #Left Sidebar ==================== -->
        <div class="sidebar">
            <div class="sidebar-inner">
                <!-- ### $Sidebar Header ### -->
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed">
                            <a class="sidebar-link td-n" href="index.html">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo">
                                            <img src="/adminator-assets/logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="peer peer-greed">
                                        <h5 class="lh-1 mB-0 logo-text">{{ config('app.name') }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle">
                                <a href="" class="td-n">
                                    <i class="ti-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ### $Sidebar Menu ### -->
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item mT-30 actived">
                        <a class="sidebar-link" href="/">
                            <span class="icon-holder">
                                <i class="c-blue-500 ti-home"></i>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="/forms">
                            <span class="icon-holder">
                                <i class="c-light-blue-500 ti-pencil"></i>
                            </span>
                            <span class="title">Forms</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="sidebar-link" href="/ui">
                            <span class="icon-holder">
                                <i class="c-pink-500 ti-palette"></i>
                            </span>
                            <span class="title">UI Elements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="/admin/settings">
                            <span class="icon-holder">
                                <i class="c-brown-500 ti-settings"></i>
                            </span>
                            <span class="title">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="/auth/logout">
                            <span class="icon-holder">
                                <i class="c-brown-500 ti-power-off"></i>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li>
                            <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <li class="search-box">
                            <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                                <i class="search-icon ti-search pdd-right-10"></i>
                                <i class="search-icon-close ti-close pdd-right-10"></i>
                            </a>
                        </li>
                        <li class="search-input">
                            <input class="form-control" type="text" placeholder="Search...">
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="peer mR-10">
                                    <img class="w-2r bdrs-50p" src="{{ $avatar }}" alt="">
                                </div>
                                <div class="peer">
                                    <span class="fsz-sm c-grey-900">{{ $userName }}</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu fsz-sm" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="/admin/settings" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-settings mR-10"></i>
                                        <span>Setting</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/profile" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-user mR-10"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="/auth/logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-power-off mR-10"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- ### $App Screen Content ### -->
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    @yield('content')
                </div>
            </main>
            
            <!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2024 Laravel Boilerplate Starter-kit by <a href="https://gemaulamaputra.id">Gemul</a>. Adminator template Designed by <a href="https://colorlib.com" target="_blank" title="Colorlib">Colorlib</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>
</body>
@yield('scripts')
</html>