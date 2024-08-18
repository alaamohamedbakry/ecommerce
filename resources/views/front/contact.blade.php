@extends('layouts.master')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .social-icons {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-icons li {
            margin: 0 15px;
        }
        .social-icons a {
            text-decoration: none;
            color: #333;
            font-size: 32px;
            transition: color 0.3s, transform 0.3s;
        }
        .social-icons a:hover {
            color: #007bff; /* اللون عند التمرير */
            transform: scale(1.1); /* تأثير التكبير عند التمرير */
        }
        .fab.fa-whatsapp {
            font-size: 32px;
            color: #25D366; 
        }
    </style>
</head>

<div class="container">
    <h1 class="text-center">Contact Us</h4>
    <p class="text-center">Follow us on social media:</p>
    <ul class="social-icons">
        @if ($socialNetworks->facebook_url)
            <li><a href="{{ $socialNetworks->facebook_url }}" target="_blank" class="fa-brands fa-facebook" title="Facebook"></a></li>
        @endif
        @if ($socialNetworks->instagram_url)
            <li><a href="{{ $socialNetworks->instagram_url }}" target="_blank" class="fa-brands fa-instagram" title="Instagram"></a></li>
        @endif
        @if ($socialNetworks->linkedin_url)
            <li><a href="{{ $socialNetworks->linkedin_url }}" target="_blank" class="fa-brands fa-linkedin" title="LinkedIn"></a></li>
        @endif
        @if ($socialNetworks->github_url)
            <li><a href="{{ $socialNetworks->github_url }}" target="_blank" class="fa-brands fa-github" title="GitHub"></a></li>
        @endif
        @if ($socialNetworks->twitter_url)
            <li><a href="{{ $socialNetworks->twitter_url }}" target="_blank" class="fa-brands fa-twitter" title="Twitter"></a></li>
        @endif
        <li><a href="https://wa.me/01554911258" target="_blank" class="fab fa-whatsapp" title="WhatsApp"></a></li>
    </ul>
</div>

@endsection
