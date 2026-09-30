<!--
  ACI Marine Homepage Document
  ==============================================================================
  Project: ACI Marine Official Website
  File: index.html
  Description: Main landing page for ACI Marine. Contains the website structure,
               embedded styling, cookie banners, headers, main navigation,
               hero sections, case references, and tracking scripts.
  ==============================================================================
-->
<html lang="en" style="scroll-behavior: smooth;" class>

<head>
    <!--
    ============================================================================
    HEAD SECTION
    Includes character encoding, responsive viewport settings, typography,
    favicons, metadata (SEO, Facebook OpenGraph, Twitter Cards), canonical URLs,
    and third-party analytics/consent scripts (Piwik, Google Tag Manager, LinkedIn).
    ============================================================================
  -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://acimarine.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">
    <link rel="dns-prefetch" href="https://acimarine.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SVG favicon: ACI green circle badge — scales perfectly at all sizes -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('image/favicon.svg') }}">
    <!-- PNG fallback for browsers that don't support SVG favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo_white_bg.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo_white_bg.png') }}">
    <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">
    <!-- Apple home screen icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo_white_bg.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('image/logo_white_bg.png') }}">
    <meta name="msapplication-TileColor" content="#27a844">
    <meta name="theme-color" content="#0a0f14">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Home - ACI Marine</title>
    <meta name="description"
        content="Together with our customers and partners, we utilize our innovation power to meet the world’s changing needs with modern shipbuilding facilities, new vessels, products and services.">

    <meta property="fb:app_id" content>
    <meta property="og:url" content="#">
    <meta property="og:type" content="website">
    <meta property="og:title" content="acimarine.com">
    <meta property="og:image" content="{{ asset('image/logo_white_bg.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <meta property="og:description"
        content="Together with our customers and partners, we utilize our innovation power to meet the world’s changing needs with modern shipbuilding facilities, new vessels, products and services.">
    <meta property="og:site_name" content="ACI Marine">
    <meta property="og:locale" content="en">
    <meta property="og:locale:alternate" content="en">
 
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content>
    <meta name="twitter:url" content="#">
    <meta name="twitter:title" content="acimarine.com">
    <meta name="twitter:description"
        content="Together with our customers and partners, we utilize our innovation power to meet the world’s changing needs with modern shipbuilding facilities, new vessels, products and services.">
    <meta name="twitter:image" content="{{ asset('image/logo_white_bg.png') }}">

    <link rel="home" href="#">
    <link rel="canonical" href="#">

    <script async src="https://snap.licdn.com/li.lms-analytics/insight.old.min.js"></script>
    <script type="text/javascript" async src="https://snap.licdn.com/li.lms-analytics/insight.min.js"></script>

    
    
    
    
    
    <script id="CookieConsent" src="https://policy.app.cookieinformation.com/uc.js" data-culture="EN"
        type="text/javascript" data-gcm-enabled="”false”"></script><iframe
        name="cookie-information-sharinglibrary-iframe"
        src="https://policy.app.cookieinformation.com/cookiesharingiframe.html"
        title="Cookie Information cookie sharing library" style="display: none;"></iframe>
    <style id="maxtool-css-f5kh2af4wog">
        div[style*="position: absolute"][style*="top: -25px"][style*="left: -3px"][style*="background: rgb(255, 0, 0)"][style*="z-index: 1000000"][style*="font-family: Arial, sans-serif"] {
            display: none !important;
        }
    </style>
    

    <!-- Global ACI Marine Config -->
    <script src="{{ asset('config.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--[if IE]>
    <style type="text/css">
        .section-blockquote-image {
            z-index: -1;
        }
    </style>
    <![endif]-->
    <style>
        :root {
            --accent-01: #ff3366;
            /* slide 1 – hot pink */
            --accent-02: #00bfa5;
            /* slide 2 – teal */
            --accent-03: #ffb400;
            /* slide 3 – amber */
        }

        /* ── MODERN ANIMATION & STYLE ENHANCEMENTS ── */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), filter 1.2s ease;
            filter: blur(4px);
            will-change: transform, opacity;
        }

        .reveal-on-scroll.active {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .reveal-left {
            transform: translateX(-40px);
            opacity: 0;
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }

        .reveal-right {
            transform: translateX(40px);
            opacity: 0;
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }

        .reveal-left.active,
        .reveal-right.active {
            transform: translateX(0);
            opacity: 1;
        }

        .delay-100 {
            transition-delay: 0.1s !important;
        }

        .delay-200 {
            transition-delay: 0.2s !important;
        }

        .delay-300 {
            transition-delay: 0.3s !important;
        }

        .delay-400 {
            transition-delay: 0.4s !important;
        }

        .delay-500 {
            transition-delay: 0.5s !important;
        }

        /* Force body and html to have no margins/paddings and occupy full viewport height */
        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100vh !important;
            width: 100% !important;
        }

        /* Force main section to be full width with auto height to allow other sections to render below */
        .main {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100vh !important;
            height: auto !important;
            position: relative !important;
            top: 0 !important;
        }

        /* Force hero section and slider components to be full width and height, starting at top 0 */
        .hero_v2,
        .hero_v2-home,
        #heroSlider,
        #heroSlider-track,
        #heroSlider-list,
        .splide__track,
        .splide__list {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            height: 100vh !important;
            min-height: 100vh !important;
            position: relative !important;
            top: 0 !important;
        }

        /* Position slides absolutely so they overlay each other for the fade effect */
        .splide__slide {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            height: 100vh !important;
            min-height: 100vh !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
        }

        /* Modern Floating Capsule Header Design */
        header.header_v2 {
            position: fixed !important;
            top: 1.5rem !important;
            /* stick to top */
            left: 50% !important;
            transform: translateX(-50%) !important;
            /* center horizontally */
            width: 80% !important;
            /* max-width: 1200px !important; */
            /* keep max width for large screens */
            margin: 0 auto !important;
            height: 6rem !important;
            /* increased height */
            border-radius: 999px !important;
            background: rgba(10, 15, 20, 0.45) !important;
            /* Premium transparent glass */
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            z-index: 1080 !important;
            padding: 0.5rem 2.5rem !important;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.4), inset 0 1px 1px rgba(255, 255, 255, 0.08) !important;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.5s ease, background 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
        }

        header.header_v2.header-hidden {
            transform: translate(-50%, -170%) scale(0.9) !important;
            opacity: 0 !important;
            pointer-events: none !important;
            transition: transform 0.4s cubic-bezier(0.7, 0, 0.84, 0), opacity 0.3s ease !important;
        }

        /* Logo holder style without background, using screen blend mode for logo_black_bg */
        .logo-holder {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .logo-holder:hover {
            transform: scale(1.04) !important;
        }

        .logo-holder img {
            mix-blend-mode: screen !important;
            /* Blends away the black background of logo_black_bg, leaving light text/icon */
            display: block !important;
        }

        /* Modern glass capsules for search and menu icons */
        .icon-search_v2,
        #toggleDropDown {
            background: rgba(255, 255, 255, 0.06) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 50% !important;
            width: 3rem !important;
            height: 3rem !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            margin-left: 0.75rem !important;
            cursor: pointer !important;
        }

        .icon-search_v2:hover,
        #toggleDropDown:hover {
            background: rgba(255, 255, 255, 0.18) !important;
            border-color: rgba(255, 255, 255, 0.25) !important;
            transform: scale(1.08) !important;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.15) !important;
        }

        .icon-search_v2 svg path,
        #toggleDropDown svg path {
            stroke: #ffffff !important;
            transition: stroke 0.3s ease !important;
        }

        header.header_v2 .icon-search_v2,
        header.header_v2 #toggleDropDown {
            position: relative !important;
            z-index: 1095 !important;
        }

        header.header_v2 a.icon-search_v2 {
            display: flex !important;
            visibility: visible !important;
        }

        /* Enforce header transparent glass color above 100vh */
        header.header_v2.header-negative,
        header.header_v2.header-positive {
            background: rgba(10, 15, 20, 0.55) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
        }

        /* Scrolled state: Clean white glass capsule below 100vh */
        header.header_v2.header-scrolled:not(.header-custom),
        header.header_v2.header-negative.header-scrolled:not(.header-custom),
        header.header_v2.header-positive.header-scrolled:not(.header-custom) {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
            border-color: rgba(246, 0, 0, 0.15) !important;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.6) !important;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        /* Scrolled state: logo blend mode changes to multiply to blend white-bg logo */
        header.header_v2.header-scrolled:not(.header-custom) .logo-holder img {
            mix-blend-mode: multiply !important;
        }

        /* Scrolled state: search and menu buttons turn dark gray with red accent */
        header.header_v2.header-scrolled:not(.header-custom) .icon-search_v2,
        header.header_v2.header-scrolled:not(.header-custom) #toggleDropDown {
            background: #ffffff !important;
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
        }

        header.header_v2.header-scrolled:not(.header-custom) .icon-search_v2:hover,
        header.header_v2.header-scrolled:not(.header-custom) #toggleDropDown:hover {
            background: #f8f9fa !important;
            border-color: rgba(0, 0, 0, 0.25) !important;
        }

        header.header_v2.header-scrolled:not(.header-custom) .icon-search_v2 svg path,
        header.header_v2.header-scrolled:not(.header-custom) #toggleDropDown svg path {
            stroke: #1a1e20 !important;
        }

        header.header_v2 nav a,
        header.header_v2 .nav-main a {
            color: rgba(255, 255, 255, 0.85) !important;
            font-size: 1.15rem !important;
            font-weight: 600 !important;
            letter-spacing: 0.03em !important;
            position: relative !important;
            padding: 0.5rem 0.25rem !important;
            transition: color 0.3s ease !important;
            text-decoration: none !important;
        }

        header.header_v2 nav a::after {
            content: '' !important;
            position: absolute !important;
            bottom: -2px !important;
            left: 0 !important;
            width: 100% !important;
            height: 2px !important;
            background: #F60000 !important;
            transform: scaleX(0) !important;
            transform-origin: right !important;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        header.header_v2 nav a:hover {
            color: #ffffff !important;
        }

        header.header_v2 nav a:hover::after {
            transform: scaleX(1) !important;
            transform-origin: left !important;
        }

        header.header_v2.header-scrolled:not(.header-custom) nav a,
        header.header_v2.header-scrolled:not(.header-custom) .nav-main a {
            color: #1a1e20 !important;
        }

        header.header_v2.header-scrolled:not(.header-custom) nav a:hover {
            color: #F60000 !important;
        }

        header.header_v2.header-scrolled:not(.header-custom) nav a::after {
            background: #F60000 !important;
        }

        /* Futuristic Dark Glass Overlay Menu */
        header.header_v2 #dropDownMenu {
            position: fixed !important;
            inset: 0 !important;
            background: rgba(255, 255, 255, 0.6) !important;
            backdrop-filter: blur(25px) !important;
            -webkit-backdrop-filter: blur(25px) !important;
            display: flex !important;
            align-items: flex-start !important;
            justify-content: center !important;
            padding: 2.5rem 1rem 2rem !important;
            overflow-y: auto !important;
            z-index: 1090 !important;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.5s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        header.header_v2 #dropDownMenu.visible {
            opacity: 1 !important;
            visibility: visible !important;
            display: flex !important;
        }

        header.header_v2 #dropDownMenu.visible .menu-panel_v2,
        #dropDownMenu.visible .menu-panel_v2 {
            transform: translate(-50%, 0) scale(1) !important;
            opacity: 1 !important;
            visibility: visible !important;
        }

        .menu-panel_v2 {
            background: #ffffff !important;
            border-radius: 40px !important;
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 40px 90px rgba(0, 0, 0, 0.12), inset 0 1px 1px rgba(255, 255, 255, 0.5) !important;
            width: min(1120px, calc(100% - 3rem)) !important;
            max-width: 1120px !important;
            max-height: calc(100vh - 4rem) !important;
            left: 50% !important;
            top: 1.5rem !important;
            padding: 4.5rem 4rem !important;
            position: absolute !important;
            transform: translate(-50%, -40px) scale(0.95) !important;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease, visibility 0.4s ease !important;
            opacity: 0 !important;
            visibility: hidden !important;
            z-index: 1095 !important;
            overflow: hidden !important;
            color: #1e293b !important;
        }

        /* Hide scrollbars on modal overlay and panel while retaining functionality */
        header.header_v2 #dropDownMenu,
        .menu-panel_v2 {
            -ms-overflow-style: none !important;
            scrollbar-width: none !important;
        }

        header.header_v2 #dropDownMenu::-webkit-scrollbar,
        .menu-panel_v2::-webkit-scrollbar {
            display: none !important;
        }

        .modal-close-btn {
            position: absolute !important;
            top: 1.5rem !important;
            right: 1.5rem !important;
            width: 3.5rem !important;
            height: 3.5rem !important;
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            border-radius: 50% !important;
            background: rgba(0, 0, 0, 0.03) !important;
            color: rgba(30, 41, 59, 0.7) !important;
            font-size: 1.6rem !important;
            font-weight: 300 !important;
            display: grid !important;
            place-items: center !important;
            cursor: pointer !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05) !important;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1),
                background 0.3s ease,
                border-color 0.3s ease,
                color 0.3s ease !important;
        }

        .modal-close-btn:hover {
            transform: rotate(90deg) scale(1.08) !important;
            background: rgba(39, 168, 68, 0.15) !important;
            color: #27a844 !important;
            border-color: rgba(39, 168, 68, 0.4) !important;
            box-shadow: 0 0 20px rgba(39, 168, 68, 0.3) !important;
        }

        header.header_v2 #toggleDropDown [data-dropdown-menu-v2-target="closeIcon"] {
            display: none !important;
        }

        header.header_v2 #toggleDropDown [data-dropdown-menu-v2-target="menuIcon"] {
            display: inline-flex !important;
        }

        header.header_v2.menu-open #toggleDropDown [data-dropdown-menu-v2-target="closeIcon"] {
            display: inline-flex !important;
        }

        header.header_v2.menu-open #toggleDropDown [data-dropdown-menu-v2-target="menuIcon"] {
            display: none !important;
        }

        /* Enforce header style when menu is open */
        header.header_v2.menu-open,
        header.header_v2.header-scrolled.menu-open:not(.header-custom) {
            background: rgba(255, 255, 255, 0.8) !important;
            border-color: rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), inset 0 1px 1px rgba(255, 255, 255, 0.6) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }

        header.header_v2.menu-open .logo-holder img {
            mix-blend-mode: multiply !important;
        }

        header.header_v2.menu-open .icon-search_v2,
        header.header_v2.menu-open #toggleDropDown {
            background: #ffffff !important;
            border-color: rgba(0, 0, 0, 0.1) !important;
        }

        header.header_v2.menu-open .icon-search_v2:hover,
        header.header_v2.menu-open #toggleDropDown:hover {
            background: #f8f9fa !important;
            border-color: rgba(0, 0, 0, 0.25) !important;
        }

        header.header_v2.menu-open .icon-search_v2 svg path,
        header.header_v2.menu-open #toggleDropDown svg path {
            stroke: #1a1e20 !important;
        }

        .menu-panel_v2 .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .menu-panel_v2 .custom-modal-shell {
            display: block !important;
        }

        .menu-panel_v2 .old-modal-content,
        .menu-panel_v2 .secondary-menu {
            display: none !important;
        }

        .custom-modal-grid {
            display: grid !important;
            grid-template-columns: minmax(0, 1.35fr) minmax(280px, 420px) !important;
            gap: 3rem !important;
        }

        @media (max-width: 900px) {
            .custom-modal-grid {
                grid-template-columns: 1fr !important;
                gap: 2rem !important;
            }
        }

        /* Nav links staggered load animation & micro-interactions */
        .modal-nav-link {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            width: 100% !important;
            padding: 1.25rem 1.75rem !important;
            border-radius: 1.5rem !important;
            background: rgba(0, 0, 0, 0.02) !important;
            border: 1px solid rgba(0, 0, 0, 0.06) !important;
            color: #475569 !important;
            font-size: 1.4rem !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(15px);
        }

        #dropDownMenu.visible .modal-nav-link {
            opacity: 1;
            transform: translateY(0);
        }

        #dropDownMenu.visible .modal-nav-link:nth-child(1) {
            transition-delay: 0.08s !important;
        }

        #dropDownMenu.visible .modal-nav-link:nth-child(2) {
            transition-delay: 0.14s !important;
        }

        #dropDownMenu.visible .modal-nav-link:nth-child(3) {
            transition-delay: 0.2s !important;
        }

        #dropDownMenu.visible .modal-nav-link:nth-child(4) {
            transition-delay: 0.26s !important;
        }

        .modal-nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(39, 168, 68, 0.08), transparent) !important;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .modal-nav-link span {
            position: relative;
            z-index: 1;
        }

        .modal-nav-link:hover {
            background: rgba(0, 0, 0, 0.04) !important;
            color: #27a844 !important;
            border-color: rgba(39, 168, 68, 0.25) !important;
            transform: translateX(10px) !important;
            box-shadow: 0 10px 25px rgba(39, 168, 68, 0.05) !important;
        }

        .modal-nav-link:hover::before {
            opacity: 1;
        }

        .modal-contact-card {
            padding: 2.25rem !important;
            background: rgba(0, 0, 0, 0.02) !important;
            border-radius: 28px !important;
            border: 1px solid rgba(0, 0, 0, 0.06) !important;
            box-shadow: 0 35px 75px rgba(0, 0, 0, 0.05),
                inset 0 1px 1px rgba(255, 255, 255, 0.8) !important;
            color: #1e293b !important;
            backdrop-filter: blur(10px);
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease !important;
            opacity: 0;
            transform: translateY(20px);
        }

        #dropDownMenu.visible .modal-contact-card {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.2s !important;
        }

        .modal-contact-card:hover {
            border-color: rgba(39, 168, 68, 0.2) !important;
            box-shadow: 0 35px 75px rgba(0, 0, 0, 0.08), 0 0 30px rgba(39, 168, 68, 0.08) !important;
            transform: translateY(-2px);
        }

        .modal-contact-label {
            color: #64748b !important;
            font-size: 0.8rem !important;
            letter-spacing: 0.14em !important;
            text-transform: uppercase !important;
            margin-bottom: 0.65rem !important;
            display: block !important;
            font-weight: 600 !important;
        }

        .modal-contact-phone,
        .modal-contact-email {
            color: #0f172a !important;
            font-size: 1.8rem !important;
            font-weight: 800 !important;
            line-height: 1.15 !important;
            margin: 0 !important;
            letter-spacing: -0.02em !important;
        }

        .modal-contact-email {
            font-size: 1.15rem !important;
            color: #475569 !important;
            font-weight: 600 !important;
            margin-top: 0.4rem !important;
        }

        .modal-cta-btn {
            display: inline-flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
            margin-top: 1.75rem !important;
            padding: 1.15rem 1.5rem !important;
            border-radius: 999px !important;
            background: linear-gradient(135deg, #27a844, #1b7430) !important;
            color: #ffffff !important;
            font-size: 1.05rem !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            box-shadow: 0 15px 30px rgba(39, 168, 68, 0.2) !important;
        }

        .modal-cta-btn:hover {
            transform: translateY(-2px) !important;
            background: linear-gradient(135deg, #2ec44f, #218c3a) !important;
            box-shadow: 0 20px 45px rgba(39, 168, 68, 0.3) !important;
        }

        .menu-panel_v2 h2 {
            margin-top: 0 !important;
            color: transparent !important;
            font-size: clamp(2.3rem, 3vw, 3.6rem) !important;
            letter-spacing: -0.035em !important;
            line-height: 1.05 !important;
            max-width: 42rem !important;
        }

        .menu-panel_v2 .primary-menu {
            list-style: none !important;
            margin: 0 !important;
            padding-left: 0 !important;
        }

        .menu-panel_v2 .primary-menu li {
            padding: 1.3rem 0 !important;
            margin: 0 !important;
            border-bottom: 1px solid rgba(18, 24, 34, 0.08) !important;
        }

        .menu-panel_v2 .primary-menu li:last-child {
            border-bottom: none !important;
            padding-bottom: 0 !important;
        }

        .menu-panel_v2 .primary-menu a {
            font-family: 'Archivo', sans-serif !important;
            font-size: clamp(1.85rem, 2vw, 2.4rem) !important;
            font-weight: 700 !important;
            line-height: 1.04 !important;
            color: #121212 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 1rem !important;
            transition: color 0.25s ease !important;
        }

        .menu-panel_v2 .primary-menu a:hover {
            color: #ff3366 !important;
        }

        .menu-panel_v2 .primary-menu a .arrow-icon {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 2.5rem !important;
            height: 2.5rem !important;
            border-radius: 50% !important;
            background: rgba(255, 51, 102, 0.08) !important;
            color: #ff3366 !important;
            transition: transform 0.3s ease, background 0.3s ease !important;
        }

        .menu-panel_v2 .primary-menu a:hover .arrow-icon {
            transform: translateX(4px) !important;
            background: rgba(255, 51, 102, 0.14) !important;
        }

        .menu-panel_v2 .hover-underline {
            font-weight: 600 !important;
            letter-spacing: 0.02em !important;
            position: relative !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.75rem !important;
        }

        .menu-panel_v2 .hover-underline::after {
            content: '' !important;
            position: absolute !important;
            left: 0 !important;
            bottom: -0.2rem !important;
            width: 100% !important;
            height: 2px !important;
            background: linear-gradient(90deg, #ff3366, #ff0055) !important;
            opacity: 0.35 !important;
            transition: transform 0.3s ease, opacity 0.3s ease !important;
            transform: scaleX(0) !important;
            transform-origin: left center !important;
        }

        .menu-panel_v2 .hover-underline:hover::after {
            transform: scaleX(1) !important;
            opacity: 1 !important;
        }

        .menu-panel_v2 .arrow-icon svg {
            transition: transform 0.3s ease !important;
        }

        .menu-panel_v2 .hover-underline:hover .arrow-icon svg {
            transform: translateX(4px) !important;
        }

        .menu-panel_v2 .secondary-menu {
            margin-top: 2rem !important;
            padding: 1.8rem 1.8rem 1.6rem !important;
            background: rgba(255, 255, 255, 0.72) !important;
            border-radius: 24px !important;
            border: 1px solid rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(18px) !important;
        }

        .menu-panel_v2 .secondary-menu .text-menu-title,
        .menu-panel_v2 .secondary-menu .hover-underline {
            color: #121212 !important;
        }

        .menu-panel_v2 .secondary-menu .text-body-sm {
            color: #4f5764 !important;
            transition: color 0.25s ease !important;
        }

        .menu-panel_v2 .secondary-menu a:hover .text-body-sm {
            color: #ff3366 !important;
        }

        @keyframes fadeInOverlay {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Centered layout in the usable space between header and bottom nav */
        .splide__slide .overlay {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            /* Vertically centered */
            align-items: center !important;
            height: 100% !important;
            width: 100% !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            z-index: 10 !important;
            padding-top: 3rem !important;
            /* Reduced top offset */
            padding-bottom: 4rem !important;
            /* Reduced bottom offset */
        }

        /* Centered content bounding box for text overlays, aligning with header & bottom nav */
        .splide__slide .overlay .container-fluid {
            width: 100% !important;
            max-width: 1200px !important;
            margin-left: auto !important;
            margin-right: auto !important;
            padding-left: 2.5rem !important;
            padding-right: 2.5rem !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            /* Centered, offset handled by parent padding */
        }

        /* ── INNOVATIVE EDITORIAL SLIDER LAYOUT ── */

        .splide__slide .overlay .container-fluid>.flex {
            background: rgba(255, 255, 255, 0.03) !important;
            /* frosted glass */
            backdrop-filter: blur(8px) !important;
            -webkit-backdrop-filter: blur(8px) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 20px !important;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25), inset 0 1px 2px rgba(255, 255, 255, 0.05) !important;
            max-width: 720px !important;
            padding: 1.75rem 2rem !important;
            position: relative !important;
            border-left: 4px solid var(--accent-01) !important;
            /* default, overridden per slide */
            transform: translateY(40px) !important;
            /* entry start */
            opacity: 0 !important;
            transition: transform .9s cubic-bezier(.16, 1, .3, 1), opacity .9s ease !important;
        }

        .splide__slide.is-active .overlay .container-fluid>.flex {
            transform: translateY(0) !important;
            opacity: 1 !important;
        }

        /* Per‑slide accent overrides */
        [data-slide-number="01"] .flex {
            border-left-color: var(--accent-01) !important;
        }

        [data-slide-number="02"] .flex {
            border-left-color: var(--accent-02) !important;
        }

        [data-slide-number="03"] .flex {
            border-left-color: var(--accent-03) !important;
        }

        /* Ghost number color per slide */
        [data-slide-number="01"] .flex::before {
            color: rgba(255, 255, 255, 0.04) !important;
        }

        [data-slide-number="02"] .flex::before {
            color: rgba(0, 191, 165, 0.04) !important;
        }

        [data-slide-number="03"] .flex::before {
            color: rgba(255, 180, 0, 0.04) !important;
        }

        /* Hover interaction */
        .splide__slide .overlay .container-fluid>.flex:hover {
            transform: translateY(0) scale(1.02) !important;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.55), inset 0 2px 4px rgba(255, 255, 255, 0.1) !important;
        }

        /* Ghost slide number — decorative oversized number behind content */
        .splide__slide .overlay .container-fluid>.flex::before {
            content: attr(data-slide-number) !important;
            position: absolute !important;
            top: -3.5rem !important;
            left: -1rem !important;
            font-family: 'Archivo', sans-serif !important;
            font-size: clamp(6rem, 12vw, 12rem) !important;
            font-weight: 900 !important;
            line-height: 1 !important;
            color: rgba(255, 255, 255, 0.04) !important;
            letter-spacing: -0.05em !important;
            pointer-events: none !important;
            z-index: 0 !important;
            user-select: none !important;
        }

        .splide__slide.is-active .overlay .container-fluid>.flex {
            transform: translateY(0) !important;
            opacity: 1 !important;
        }

        /* All text inside the card is white with layered text shadow for direct-on-video legibility */
        .splide__slide .overlay .container-fluid>.flex * {
            color: #ffffff !important;
            position: relative !important;
            z-index: 1 !important;
        }

        /* Subtitle tag — slides up with delay */
        .splide__slide .overlay h2.text-heading-xs {
            font-family: 'Archivo', sans-serif !important;
            font-size: clamp(0.65rem, 0.8vw, 0.85rem) !important;
            text-transform: uppercase !important;
            letter-spacing: 0.35em !important;
            background: linear-gradient(90deg, #ff3366, #ff8800) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            font-weight: 700 !important;
            margin-bottom: 1rem !important;
            display: inline-block !important;
            opacity: 0 !important;
            transform: translateY(20px) !important;
            transition: opacity 0.7s ease 0.15s, transform 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.15s !important;
        }

        .splide__slide.is-active .overlay h2.text-heading-xs {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        /* Thin horizontal rule separator between subtitle and heading */
        .splide__slide .overlay h2.text-heading-xs::after {
            content: '' !important;
            display: block !important;
            width: 0 !important;
            height: 1px !important;
            background: rgba(255, 255, 255, 0.25) !important;
            margin-top: 0.75rem !important;
            transition: width 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.4s !important;
        }

        .splide__slide.is-active .overlay h2.text-heading-xs::after {
            width: 100% !important;
        }

        /* Main heading — slides up with slightly longer delay */

        font-weight: 800 !important;
        letter-spacing: -0.04em !important;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5),
        0 8px 24px rgba(0, 0, 0, 0.35),
        0 20px 50px rgba(0, 0, 0, 0.2) !important;
        opacity: 0 !important;
        transform: translateY(28px) !important;
        transition: opacity 0.8s ease 0.3s,
        transform 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s !important;
        }

        .splide__slide.is-active .overlay .text-heading-1 p {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        /* Ensure video wrapper stretches across the entire slide, occupying 100vw and 100vh */
        .video-wrapper {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            max-width: 100vw !important;
            max-height: 100vh !important;
            overflow: hidden !important;
            z-index: 0 !important;
        }

        .video-wrapper video {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            object-fit: cover !important;
        }

        /* Style the iframe to cover the entire space, preserving 16:9 ratio and avoiding letterboxing */
        .video-wrapper iframe {
            position: absolute !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            min-width: 100% !important;
            min-height: 100% !important;
            width: 177.78vh !important;
            height: 56.25vw !important;
        }

        /* Modern Floating Navigation Bar at the Bottom */
        .hero_v2-home-nav {
            position: absolute !important;
            bottom: 2.5rem !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            width: 90% !important;
            max-width: 1200px !important;
            /* Cap width for consistency on large displays */
            height: auto !important;
            background: rgba(10, 15, 20, 0.45) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 24px !important;
            padding: 1.5rem 2.5rem !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.05) !important;
            z-index: 1030 !important;
        }

        #custom-slider-progress {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            height: 3px !important;
            background: linear-gradient(90deg, #ff3366, #ff0055) !important;
            box-shadow: 0 0 10px rgba(255, 51, 102, 0.8) !important;
        }

        .hero_v2-home-nav .slide-link {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.16) !important;
            border-radius: 28px !important;
            padding: 1rem 1.25rem !important;
            gap: 1rem !important;
            transition: transform .35s ease, background .35s ease, border-color .35s ease, box-shadow .35s ease !important;
        }

        .hero_v2-home-nav .slide-link:hover {
            transform: translateY(-3px) !important;
            background: linear-gradient(135deg, rgba(246, 0, 0, 0.28), rgba(255, 255, 255, 0.08)) !important;
            border-color: rgba(246, 0, 0, 0.4) !important;
            box-shadow: 0 15px 35px rgba(246, 0, 0, 0.25), 0 5px 15px rgba(0, 0, 0, 0.25) !important;
        }

        .hero_v2-home-nav .slide-link p {
            color: #ffffff !important;
            font-weight: 600 !important;
            letter-spacing: 0.02em !important;
            margin: 0 !important;
        }

        .hero_v2-home-nav .arrow-right-icon {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 3rem !important;
            height: 3rem !important;
            border-radius: 999px !important;
            border: 1px solid rgba(255, 255, 255, 0.24) !important;
            transition: transform .4s cubic-bezier(0.16, 1, 0.3, 1), background .4s ease, border-color .4s ease, box-shadow .4s ease !important;
            color: #ffffff !important;
        }

        .hero_v2-home-nav .hover-arrow-rotate:hover .arrow-right-icon,
        .hero_v2-home-nav .slide-link:hover .arrow-right-icon {
            transform: translateX(6px) !important;
            background: rgba(246, 0, 0, 0.2) !important;
            border-color: rgba(246, 0, 0, 0.6) !important;
            box-shadow: 0 0 15px rgba(246, 0, 0, 0.3) !important;
        }

        .hero_v2-home-nav .arrow-right-icon svg {
            transition: transform .4s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .hero_v2-home-nav .slide-link:hover .arrow-right-icon svg,
        .hero_v2-home-nav .hover-arrow-rotate:hover .arrow-right-icon svg {
            transform: rotate(-45deg) scale(1.1) !important;
        }

        .hero_v2-home-nav .slide-link span {
            color: #ffffff !important;
        }

        /* Modern glass button styling for pagination indicators */
        .slide-index {
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            background: rgba(255, 255, 255, 0.05) !important;
            color: rgba(255, 255, 255, 0.7) !important;
            font-family: 'Archivo', sans-serif !important;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
            width: 2.75rem !important;
            height: 2.75rem !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .slide-index:hover {
            background: rgba(255, 255, 255, 0.15) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
            transform: scale(1.1) !important;
            color: #ffffff !important;
        }

        .slide-index .text-body {
            color: inherit !important;
            font-weight: 600 !important;
        }

        /* Active glass indicators */
        .slide-index.bg-white,
        .slide-index.bg-anthracite-100 {
            background: linear-gradient(135deg, #ff3366, #ff0055) !important;
            color: #ffffff !important;
            border-color: transparent !important;
            box-shadow: 0 0 25px rgba(255, 51, 102, 0.85) !important;
            transform: scale(1.12) !important;
        }

        /* Modern CTA slide link button */
        .slide-link {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1.25rem !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            text-decoration: none !important;
            max-width: 400px !important;
            border-left: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        .slide-link:hover {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(255, 255, 255, 0.25) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
        }

        .slide-link p {
            font-family: 'Archivo', sans-serif !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            color: rgba(255, 255, 255, 0.9) !important;
            margin: 0 !important;
            line-height: 1.3 !important;
        }

        .slide-link:hover p {
            color: #ffffff !important;
        }

        .slide-link .arrow-right-icon {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            color: #ff3366 !important;
        }

        .slide-link:hover .arrow-right-icon {
            transform: translateX(4px) !important;
        }

        .slide-link .arrow-right-icon svg {
            width: 20px !important;
            height: 20px !important;
        }

        /* =============================================
           PC Responsive Breakpoints (PC-only)
           ============================================= */

        /* Large Desktop: 1440px+ */
        @media (min-width: 1024px) {
            header.header_v2 {
                top: clamp(1rem, 2vh, 1.75rem) !important;
                height: clamp(4.5rem, 5.5vw, 5.5rem) !important;
                width: clamp(80%, 85vw, 92%) !important;
                max-width: 1360px !important;
                padding: 0.5rem clamp(1.5rem, 2.5vw, 3rem) !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
            }

            header.header_v2>.container-fluid {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
            }

            header.header_v2 .flex.justify-between {
                align-items: center !important;
                width: 100% !important;
            }

            .logo-holder img {
                height: clamp(40px, 4.5vw, 64px) !important;
                width: auto !important;
            }

            header.header_v2 nav {
                display: flex !important;
                gap: clamp(1.25rem, 2vw, 2.5rem) !important;
                align-items: center !important;
            }

            header.header_v2 nav a {
                font-size: clamp(14px, 1.1vw, 18px) !important;
                font-weight: 500 !important;
            }

            .icon-search_v2,
            #toggleDropDown {
                width: clamp(2.5rem, 3.2vw, 3.25rem) !important;
                height: clamp(2.5rem, 3.2vw, 3.25rem) !important;
            }

            /* Responsive Slider Overlay Card */
            .splide__slide .overlay {
                padding-top: clamp(6rem, 12vh, 8.5rem) !important;
                padding-bottom: clamp(7.5rem, 15vh, 10.5rem) !important;
            }

            .splide__slide .overlay .container-fluid {
                max-width: 1360px !important;
                padding-left: clamp(1.5rem, 4vw, 4rem) !important;
                padding-right: clamp(1.5rem, 4vw, 4rem) !important;
            }

            .splide__slide .overlay .container-fluid>.flex {
                padding: clamp(1.25rem, 2vw, 1.75rem) 2rem !important;
                width: clamp(400px, 40vw, 600px) !important;
                max-width: 90% !important;
            }

            /* Text sizes in card */
            .splide__slide .overlay h2.text-heading-xs {
                font-size: clamp(0.65rem, 0.75vw, 0.85rem) !important;
                margin-bottom: clamp(0.35rem, 0.7vw, 0.85rem) !important;
            }

            .splide__slide .overlay .text-heading-1 p {
                font-size: clamp(1.25rem, 1.85vw, 2.25rem) !important;
                line-height: 1.15 !important;
            }

            /* Bottom navigation bar container */
            .hero_v2-home-nav {
                bottom: clamp(1.25rem, 2.5vh, 2.75rem) !important;
                width: clamp(80%, 85vw, 92%) !important;
                max-width: 1360px !important;
                padding: clamp(0.35rem, 0.6vw, 0.65rem) clamp(1rem, 2vw, 2.5rem) !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
            }

            .hero_v2-home-nav .container-fluid {
                height: auto !important;
                padding: 0 !important;
                max-width: 100% !important;
            }

            /* Pagination slide link on bottom right */
            .slide-link {
                max-width: clamp(280px, 28vw, 420px) !important;
                height: clamp(52px, 6vh, 68px) !important;
                padding: 0.5rem clamp(0.75rem, 1.2vw, 1.5rem) !important;
            }

            .slide-link p {
                font-size: clamp(12px, 0.85vw, 15px) !important;
            }

            .slide-index {
                width: clamp(2.2rem, 2.5vw, 2.75rem) !important;
                height: clamp(2.2rem, 2.5vw, 2.75rem) !important;
            }
        }

        /* Responsive scaling adjustments for ultra-wide screens (min-width: 1800px) */
        @media (min-width: 1800px) {
            header.header_v2 {
                max-width: 1500px !important;
            }

            .splide__slide .overlay .container-fluid {
                max-width: 1500px !important;
            }

            .hero_v2-home-nav {
                max-width: 1500px !important;
            }
        }

        /* Tablet/Mobile Responsive adjustments */
        @media (max-width: 1023px) {
            header.header_v2 {
                width: 94% !important;
                left: 3% !important;
                top: 1rem !important;
                padding: 0.5rem 1.5rem !important;
                transform: none !important;
                height: 4rem !important;
            }

            .logo-holder img {
                height: 48px !important;
            }

            .icon-search_v2,
            #toggleDropDown {
                width: 2.5rem !important;
                height: 2.5rem !important;
            }

            .splide__slide .overlay .container-fluid>.flex {
                padding: 2rem !important;
                max-width: 480px !important;
            }

            .hero_v2-home-nav {
                padding: 1rem 1.75rem !important;
                bottom: 1.25rem !important;
                left: 3% !important;
                width: 94% !important;
                transform: none !important;
            }

            .splide__slide .overlay {
                padding-top: 5rem !important;
                padding-bottom: 7rem !important;
            }

            .slide-link {
                margin-top: 0.75rem !important;
                max-width: 100% !important;
                width: 100% !important;
            }
        }

        @media (max-width: 768px) {
            header.header_v2 {
                height: 4rem !important;
                padding: 0.5rem 1.25rem !important;
                transform: none !important;
            }

            .splide__slide .overlay .text-heading-1 p {
                font-size: 1.35rem !important;
            }

            .splide__slide .overlay .container-fluid>.flex {
                padding: 1rem 1.25rem !important;
                margin: 0 1rem !important;
            }

            .splide__slide .overlay {
                padding-top: 5.5rem !important;
                padding-bottom: 6.5rem !important;
            }

            .hero_v2-home-nav {
                bottom: 1rem !important;
                left: 2.5% !important;
                width: 95% !important;
                padding: 1rem !important;
                transform: none !important;
            }

            .slide-link {
                margin-top: 0.75rem !important;
                max-width: 100% !important;
                width: 100% !important;
            }

            /* Responsive styles for Mobile View Menu Panel */
            .menu-panel_v2 {
                width: calc(100% - 1.5rem) !important;
                max-height: calc(100vh - 3rem) !important;
                padding: 3.5rem 1.5rem 2rem !important;
                border-radius: 24px !important;
                overflow-y: auto !important;
            }

            .menu-panel_v2 h2 {
                font-size: 1.8rem !important;
                margin-top: 1rem !important;
                line-height: 1.2 !important;
            }

            .modal-intro {
                margin-top: 0.5rem !important;
                font-size: 0.9rem !important;
            }

            .modal-nav-link {
                padding: 0.85rem 1.25rem !important;
                font-size: 1.15rem !important;
            }

            .modal-contact-card {
                padding: 1.5rem !important;
                border-radius: 20px !important;
            }

            .modal-contact-phone {
                font-size: 1.4rem !important;
            }

            .modal-contact-email {
                font-size: 1.05rem !important;
            }

            .modal-cta-btn {
                margin-top: 1.25rem !important;
                padding: 0.85rem 1.25rem !important;
            }
        }

        /* Search Modal Overlay styling */
        .search-modal-overlay {
            position: fixed !important;
            inset: 0 !important;
            background: rgba(5, 10, 15, 0.4) !important;
            backdrop-filter: blur(32px) !important;
            -webkit-backdrop-filter: blur(32px) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            z-index: 1200 !important;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .search-modal-overlay.visible {
            opacity: 1 !important;
            visibility: visible !important;
        }

        .search-modal-card {
            background: transparent !important;
            border: none !important;
            padding: 1.5rem !important;
            width: min(750px, calc(100% - 4rem)) !important;
            position: relative !important;
            transform: translateY(-20px) scale(0.97) !important;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease !important;
            box-shadow: none !important;
        }

        .search-modal-overlay.visible .search-modal-card {
            transform: translateY(0) scale(1) !important;
        }

        .search-modal-close-btn {
            position: fixed !important;
            top: 2rem !important;
            right: 2rem !important;
            width: 3rem !important;
            height: 3rem !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 50% !important;
            background: rgba(255, 255, 255, 0.04) !important;
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 1.5rem !important;
            font-weight: 300 !important;
            display: grid !important;
            place-items: center !important;
            cursor: pointer !important;
            transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s ease, border-color 0.3s ease !important;
            z-index: 1210 !important;
        }

        .search-modal-close-btn:hover {
            transform: rotate(90deg) scale(1.06) !important;
            background: rgba(246, 0, 0, 0.15) !important;
            color: #ffffff !important;
            border-color: rgba(246, 0, 0, 0.4) !important;
            box-shadow: 0 0 20px rgba(246, 0, 0, 0.3) !important;
        }

        .search-input-wrapper {
            display: flex !important;
            align-items: center !important;
            background: transparent !important;
            border-bottom: 2px solid rgba(255, 255, 255, 0.15) !important;
            padding: 1rem 0 !important;
            transition: all 0.4s ease !important;
            width: 100% !important;
            position: relative !important;
        }

        .search-input-icon {
            color: rgba(255, 255, 255, 0.5) !important;
            margin-right: 1.5rem !important;
            transition: color 0.4s ease, transform 0.4s ease !important;
        }

        .search-input-wrapper:focus-within .search-input-icon {
            color: #F60000 !important;
            transform: scale(1.05) !important;
        }

        .search-input {
            background: transparent !important;
            border: none !important;
            outline: none !important;
            color: #ffffff !important;
            font-size: 2.25rem !important;
            font-weight: 300 !important;
            width: 100% !important;
            letter-spacing: -0.02em !important;
            padding: 0 !important;
            margin: 0 !important;
            height: auto !important;
            line-height: normal !important;
            transition: all 0.3s ease !important;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.25) !important;
        }

        /* Animated glowing line below the search input */
        .search-glow-bar {
            position: absolute !important;
            bottom: 0;
            left: 50% !important;
            width: 0 !important;
            height: 2px !important;
            background: linear-gradient(90deg, transparent, #F60000, transparent) !important;
            transition: width 0.5s cubic-bezier(0.16, 1, 0.3, 1), left 0.5s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .search-input-wrapper:focus-within+.search-glow-bar {
            width: 100% !important;
            left: 0 !important;
            box-shadow: 0 0 15px rgba(246, 0, 0, 0.6) !important;
        }

        /* =============================================
           ACI HERO SLIDER — Responsive Mobile Design
           ============================================= */
        /* Base Glass Box Styling for Slide Content */
        .hero_v2-home .overlay [data-slide-number] {
            position: relative;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 16px;
            padding: 2.5rem 3rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-left: 4px solid #F60000;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 90%;
        }

        /* Large background "01" watermark */
        .hero_v2-home .overlay [data-slide-number]::before {
            content: attr(data-slide-number);
            position: absolute;
            top: -15%;
            left: 5%;
            font-size: clamp(8rem, 15vw, 15rem);
            font-weight: 900;
            color: rgba(255, 255, 255, 0.04);
            line-height: 1;
            z-index: 0;
            pointer-events: none;
            letter-spacing: -0.05em;
        }

        .hero_v2-home .overlay [data-slide-number]>* {
            position: relative;
            z-index: 1;
        }

        .hero_v2-home .text-heading-xs {
            color: #F60000;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }

        /* Mobile Responsive Overrides */
        @media (max-width: 768px) {
            .hero_v2-home .overlay {
                align-items: flex-end;
                /* Push to bottom on mobile to see image */
                padding-bottom: 7rem;
                /* Leave space for slider navigation */
            }

            .hero_v2-home .overlay [data-slide-number] {
                padding: 1.5rem 1.25rem;
                width: 100%;
                max-width: 100%;
                background: rgba(255, 255, 255, 0.03);
                backdrop-filter: blur(4px);
                -webkit-backdrop-filter: blur(4px);
            }

            .hero_v2-home .overlay [data-slide-number]::before {
                font-size: 6rem;
                top: 0;
                left: 10px;
            }

            .hero_v2-home .text-heading-1 {
                font-size: 1.75rem !important;
                line-height: 1.3 !important;
            }

            .hero_v2-home .text-heading-xs {
                font-size: 0.75rem !important;
                margin-bottom: 0.5rem;
            }
        }

        /* =============================================
           ACI PRODUCT CARDS — Modern Sleek Dark Theme
           ============================================= */
        .aci-prod-card {
            position: relative;
            overflow: hidden;
            background: #111315;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            transition: all 0.5s cubic-bezier(0.2, 0.8, 0.2, 1);
            display: flex;
            flex-direction: column;
            min-height: 440px;
        }

        .aci-prod-card:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 40px rgba(246, 0, 0, 0.15);
            transform: translateY(-8px);
            border-color: rgba(246, 0, 0, 0.3);
        }

        .aci-prod-img-wrap {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .aci-prod-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .aci-prod-card:hover .aci-prod-img {
            transform: scale(1.08);
        }

        .aci-prod-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, #111315 0%, rgba(17, 19, 21, 0) 80%);
            transition: background 0.5s ease;
        }

        .aci-prod-card:hover .aci-prod-img-overlay {
            background: linear-gradient(to top, rgba(246, 0, 0, 0.8) 0%, rgba(17, 19, 21, 0) 80%);
            opacity: 0.6;
        }

        .aci-prod-img-tag {
            position: absolute;
            bottom: 1rem;
            left: 1.5rem;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            background: rgba(255, 255, 255, 0.1);
            padding: 0.35rem 0.8rem;
            border-radius: 6px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            z-index: 1;
        }

        .aci-prod-card:hover .aci-prod-img-tag {
            background: #F60000;
            border-color: #F60000;
            transform: translateY(-3px);
        }

        .aci-prod-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #111315;
            padding: 1.5rem;
            z-index: 1;
        }

        /* Seamless blending: Default state hides on hover, Hover panel fades in */
        .aci-prod-default {
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
        }

        .aci-prod-card:hover .aci-prod-default {
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
        }

        .aci-prod-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .aci-prod-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #F60000;
            border-radius: 50%;
            flex-shrink: 0;
            box-shadow: 0 0 10px rgba(246, 0, 0, 0.5);
        }

        .aci-prod-sub {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-left: 1.25rem;
        }

        /* Modern Hover Panel */
        .aci-prod-hover-panel {
            position: absolute;
            inset: 0;
            background: rgba(17, 19, 21, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
            z-index: 20;
        }

        .aci-prod-card:hover .aci-prod-hover-panel {
            opacity: 1;
            pointer-events: auto;
        }

        .aci-prod-hover-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }

        .aci-prod-hover-header h3 {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
        }

        .aci-prod-list {
            list-style: none;
            padding: 0;
            margin: 0 0 1.5rem 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .aci-prod-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            color: #cbd5e1;
            font-size: 0.95rem;
            line-height: 1.4;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .aci-prod-list li:last-child {
            border-bottom: none;
        }

        .aci-prod-list li:hover {
            color: #ffffff;
            transform: translateX(5px);
        }

        .aci-list-icon {
            color: #F60000;
            font-size: 1.1rem;
            margin-top: -0.1rem;
            transition: transform 0.3s ease;
        }

        .aci-prod-list li:hover .aci-list-icon {
            transform: translateX(3px);
        }

        .aci-prod-btn {
            margin-top: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: transparent;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 8px;
            border: 1px solid rgba(246, 0, 0, 0.5);
            text-decoration: none;
            align-self: flex-start;
            transition: all 0.3s ease;
        }

        .aci-prod-btn:hover {
            background: rgba(246, 0, 0, 0.1);
            border-color: #F60000;
            box-shadow: 0 0 15px rgba(246, 0, 0, 0.2);
        }

        .aci-prod-btn svg {
            transition: transform 0.3s ease;
        }

        .aci-prod-btn:hover svg {
            transform: translateX(4px);
        }

        /* =============================================
           ACI NEWS & EVENTS SECTION (Modern & Premium Upgrade)
           ============================================= */
        .aci-news-card {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 40px -15px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.7);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            animation: newsCardReveal 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
            /* Counter for card numbering */
            counter-increment: news-card;
        }

        .aci-news-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #F60000, #ff5e62);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 10;
        }

        .aci-news-card:hover {
            transform: translateY(-8px);
            border-color: rgba(246, 0, 0, 0.25);
            box-shadow: 0 30px 60px -20px rgba(246, 0, 0, 0.15), 0 20px 40px -15px rgba(0, 0, 0, 0.05);
            background: rgba(255, 255, 255, 0.85);
        }

        .aci-news-card:hover::before {
            opacity: 1;
        }

        .aci-news-iframe-wrap {
            position: relative;
            width: 100%;
            height: 380px;
            background: #f8fafc;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: background 0.3s ease;
        }

        .aci-news-card:hover .aci-news-iframe-wrap {
            background: #f1f5f9;
        }

        .aci-news-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            flex: 1;
        }

        .aci-news-text {
            color: #334155;
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.6;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }

        .aci-news-card:hover .aci-news-text {
            color: #1e293b;
        }

        .aci-news-link {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            color: #ffffff;
            background: #1a1e20;
            padding: 0.7rem 1.5rem;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            margin-top: auto;
            align-self: flex-start;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .aci-news-link:hover {
            background: #F60000;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(246, 0, 0, 0.35);
            border-color: transparent;
        }

        .aci-news-link svg {
            transition: transform 0.3s ease;
        }

        .aci-news-link:hover svg {
            transform: translateX(4px);
        }

        /* =============================================
           ACI PREMIUM BANNER CAROUSEL
           ============================================= */
        .aci-banner-slider-section {
            position: relative;
            width: 100%;
            margin: 4rem auto;
            max-width: 1200px;
            padding: 0 1.5rem;
            box-sizing: border-box;
        }

        .aci-slides-container {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
            border-radius: 32px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .aci-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            z-index: 1;
            transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            padding: 4rem;
            box-sizing: border-box;
        }

        .aci-slide.active {
            opacity: 1;
            z-index: 2;
        }

        .aci-slide.active {
            animation: aciKenBurns 10s ease-out forwards;
        }

        @keyframes aciKenBurns {
            from {
                transform: scale(1.03);
            }

            to {
                transform: scale(1);
            }
        }

        .aci-slide-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 15, 20, 0.6) 0%, rgba(10, 15, 20, 0.3) 50%, rgba(10, 15, 20, 0.6) 100%);
            z-index: 1;
        }

        .aci-slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 600px;
            background: rgba(10, 15, 20, 0.5);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 28px;
            padding: 3rem;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            transform: translateY(30px);
            opacity: 0;
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease;
        }

        .aci-slide.active .aci-slide-content {
            transform: translateY(0);
            opacity: 1;
            transition-delay: 0.3s;
        }

        .aci-slide-content.text-center {
            margin: 0 auto;
            text-align: center;
        }

        .aci-slide-content.text-left {
            margin-right: auto;
            text-align: left;
        }

        .aci-slide-content.text-right {
            margin-left: auto;
            text-align: right;
        }

        .aci-slide-tag {
            display: inline-block;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            color: #F60000;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .aci-slide-title {
            font-family: 'Archivo', sans-serif;
            font-size: clamp(2rem, 3.5vw, 3rem);
            font-weight: 800;
            color: #ffffff !important;
            line-height: 1.15;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.03em;
        }

        .aci-slide-subtitle {
            font-size: clamp(1.1rem, 1.5vw, 1.4rem);
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8) !important;
            margin: 0 0 2rem 0;
            line-height: 1.4;
        }

        .aci-slide-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .aci-slide-actions.justify-center {
            justify-content: center;
        }

        .aci-slide-actions.justify-start {
            justify-content: flex-start;
        }

        .aci-slide-actions.justify-end {
            justify-content: flex-end;
        }

        .aci-slide-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.85rem 2rem;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .aci-slide-btn.primary {
            background: #F60000;
            color: #ffffff !important;
            box-shadow: 0 6px 20px rgba(246, 0, 0, 0.3);
            border: 1px solid transparent;
        }

        .aci-slide-btn.primary:hover {
            background: #d50000;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(246, 0, 0, 0.45);
        }

        .aci-slide-btn.outline {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffffff !important;
        }

        .aci-slide-btn.outline:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .aci-slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            background: rgba(10, 15, 20, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .aci-slider-arrow:hover {
            background: #F60000;
            border-color: transparent;
            box-shadow: 0 0 15px rgba(246, 0, 0, 0.5);
            transform: translateY(-50%) scale(1.08);
        }

        .aci-slider-arrow.prev {
            left: 2rem;
        }

        .aci-slider-arrow.next {
            right: 2rem;
        }

        .aci-slider-dots {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.75rem;
            z-index: 10;
        }

        .aci-dot {
            width: 1.5rem;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .aci-dot.active {
            background: #F60000;
            width: 3rem;
            box-shadow: 0 0 8px rgba(246, 0, 0, 0.8);
        }

        .aci-slider-progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background: #F60000;
            width: 0%;
            z-index: 10;
            box-shadow: 0 -2px 10px rgba(246, 0, 0, 0.5);
        }

        @media (max-width: 768px) {
            .aci-slides-container {
                height: 500px;
            }

            .aci-slide {
                padding: 2rem;
            }

            .aci-slide-content {
                padding: 2rem;
            }

            .aci-slider-arrow {
                display: none;
            }
        }

        /* =============================================
           ACI CLIENT LOGO MARQUEE SLIDER
           ============================================= */
        .logo-marquee-section {
            background-color: #ffffff;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo-marquee-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 2.5rem 0;
            display: flex;
            align-items: center;
        }

        /* Gradient fade masks at left/right edges for a premium look */
        .logo-marquee-wrapper::before,
        .logo-marquee-wrapper::after {
            content: "";
            position: absolute;
            top: 0;
            width: 12%;
            min-width: 80px;
            max-width: 250px;
            height: 100%;
            z-index: 10;
            pointer-events: none;
        }

        .logo-marquee-wrapper::before {
            left: 0;
            background: linear-gradient(to right, #ffffff 20%, transparent);
        }

        .logo-marquee-wrapper::after {
            right: 0;
            background: linear-gradient(to left, #ffffff 20%, transparent);
        }

        .logo-marquee-track {
            display: flex;
            width: max-content;
            align-items: center;
            animation: marquee-scroll 45s linear infinite;
        }

        .logo-marquee-track:hover {
            animation-play-state: paused;
        }

        .logo-marquee-item {
            flex-shrink: 0;
            width: 180px;
            height: 60px;
            margin: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.75;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.02));
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .logo-marquee-item:hover {
            opacity: 1;
            transform: scale(1.08);
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.08));
        }

        .logo-marquee-item img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            user-select: none;
            pointer-events: none;
        }

        @keyframes marquee-scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* =============================================
           ACI OUR STORY & GALLERY SECTION
           ============================================= */
        .aci-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        @media (min-width: 640px) {
            .aci-gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.85rem;
            }
        }

        @media (min-width: 1024px) {
            .aci-gallery-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
            /* First item spans 2 columns and 2 rows — the big hero card */
            .aci-gallery-item.featured {
                grid-column: span 2;
                grid-row: span 2;
                aspect-ratio: unset; /* let row span define its height */
            }
        }

        .aci-gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #101622;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            aspect-ratio: 4/3;
            cursor: pointer;
        }

        .aci-gallery-item:hover {
            transform: translateY(-6px) scale(1.015);
            border-color: rgba(246, 0, 0, 0.4);
            box-shadow: 0 16px 32px rgba(246, 0, 0, 0.12), 0 0 2px rgba(246, 0, 0, 0.35);
        }

        .aci-gallery-img-wrap {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .aci-gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .aci-gallery-item:hover .aci-gallery-img {
            transform: scale(1.1) rotate(1deg);
        }

        /* Persistent Badge for Card Type */
        .aci-gallery-badge {
            position: absolute;
            top: 1.25rem;
            left: 1.25rem;
            background: rgba(12, 18, 25, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 30px;
            padding: 0.35rem 0.85rem;
            font-size: 0.7rem;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            z-index: 3;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .aci-gallery-item:hover .aci-gallery-badge {
            background: #F60000;
            border-color: transparent;
            box-shadow: 0 4px 12px rgba(246, 0, 0, 0.35);
        }

        /* Modern Glass Overlays for Cards */
        .aci-gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(8, 12, 18, 0.9) 0%, rgba(8, 12, 18, 0.4) 60%, rgba(8, 12, 18, 0.15) 100%);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            opacity: 0;
            transform: translateY(15px);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem 1.75rem;
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 2;
        }

        .aci-gallery-item:hover .aci-gallery-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .aci-gallery-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #F60000;
            font-weight: 700;
            margin-bottom: 0.35rem;
            transform: translateY(10px);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1) 0.05s;
        }

        .aci-gallery-title {
            font-size: 1.25rem;
            font-weight: 900;
            color: #ffffff;
            line-height: 1.25;
            transform: translateY(10px);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1) 0.1s;
        }

        .aci-gallery-desc {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.75);
            margin-top: 0.5rem;
            line-height: 1.45;
            transform: translateY(10px);
            opacity: 0;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1) 0.15s, opacity 0.4s ease 0.15s;
        }

        /* Action Explore Indicator on hover */
        .aci-gallery-action {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            font-size: 0.8rem;
            font-weight: 700;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            opacity: 0;
            transform: translateY(10px);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1) 0.2s, opacity 0.4s ease 0.2s;
        }

        .aci-gallery-action-btn {
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 50%;
            background: #F60000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            transition: transform 0.3s ease;
        }

        .aci-gallery-item:hover .aci-gallery-action {
            opacity: 1;
            transform: translateY(0);
        }

        .aci-gallery-item:hover .aci-gallery-action-btn {
            transform: translateX(4px);
        }

        .aci-gallery-item:hover .aci-gallery-category,
        .aci-gallery-item:hover .aci-gallery-title,
        .aci-gallery-item:hover .aci-gallery-desc {
            transform: translateY(0);
        }

        .aci-gallery-item:hover .aci-gallery-desc {
            opacity: 1;
        }

        /* Filter tabs wrapper styling */
        .aci-filter-container {
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: center;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 0.5rem;
            border-radius: 100px;
            gap: 0.35rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        @media (max-width: 640px) {
            .aci-filter-container {
                border-radius: 24px;
                width: 100%;
                padding: 0.75rem;
                gap: 0.5rem;
            }
        }

        .aci-filter-tab {
            position: relative;
            padding: 0.8rem 1.6rem;
            border-radius: 99px;
            font-weight: 700;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.65);
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .aci-filter-tab:hover {
            color: #ffffff;
        }

        .aci-filter-tab.active {
            color: #ffffff;
            background: linear-gradient(135deg, #FF1A1A, #B30000);
            box-shadow: 0 8px 20px rgba(246, 0, 0, 0.4);
        }

        .aci-filter-count {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.7rem;
            padding: 2px 7px;
            border-radius: 20px;
            margin-left: 8px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .aci-filter-tab.active .aci-filter-count {
            background: #ffffff;
            color: #F60000;
        }

        .aci-filter-tab:hover:not(.active) .aci-filter-count {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        /* Glassmorphic Stats styling */
        .aci-stat-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem 1rem;
            text-align: center;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .aci-stat-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 120%, rgba(246, 0, 0, 0.15), transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .aci-stat-card:hover {
            transform: translateY(-6px);
            border-color: rgba(246, 0, 0, 0.3);
            box-shadow: 0 15px 35px rgba(246, 0, 0, 0.15);
            background: rgba(255, 255, 255, 0.04);
        }

        .aci-stat-card:hover::before {
            opacity: 1;
        }

        .aci-stat-num {
            font-size: 2.25rem;
            font-weight: 950;
            background: linear-gradient(135deg, #ffffff, #999999);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Archivo', sans-serif;
            line-height: 1.1;
        }

        .aci-stat-card:hover .aci-stat-num {
            background: linear-gradient(135deg, #ff3333, #F60000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .aci-stat-label {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.45);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-top: 0.5rem;
            transition: color 0.3s ease;
        }

        .aci-stat-card:hover .aci-stat-label {
            color: rgba(255, 255, 255, 0.85);
        }

        /* Floating Featured Wrapper styling */
        .aci-featured-wrap {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            animation: aciFloat 6s ease-in-out infinite;
        }

        .aci-featured-wrap:hover {
            border-color: rgba(246, 0, 0, 0.3);
            box-shadow: 0 35px 80px rgba(246, 0, 0, 0.15);
            transform: scale(1.02);
        }

        @keyframes aciFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Interactive Lightbox CSS */
        .aci-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(6, 10, 15, 0.88);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }

        .aci-lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .aci-lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 85vh;
            width: auto;
            height: auto;
            transform: scale(0.95);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .aci-lightbox.active .aci-lightbox-content {
            transform: scale(1);
        }

        .aci-lightbox-img {
            max-width: 100%;
            max-height: 70vh;
            border-radius: 16px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            object-fit: contain;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .aci-lightbox-img.transitioning {
            opacity: 0;
            transform: scale(0.96);
        }

        .aci-lightbox-caption {
            color: #ffffff;
            margin-top: 1.5rem;
            text-align: center;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 1.25rem 2rem;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: opacity 0.3s ease;
        }

        .aci-lightbox-caption.transitioning {
            opacity: 0;
        }

        .aci-lightbox-caption h4 {
            font-size: 1.35rem;
            font-weight: 900;
            margin-bottom: 0.35rem;
            font-family: 'Archivo', sans-serif;
            background: linear-gradient(135deg, #ffffff, #cccccc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .aci-lightbox-caption p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.45;
        }

        .aci-lightbox-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 3.75rem;
            height: 3.75rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .aci-lightbox-btn:hover {
            background: #F60000;
            border-color: transparent;
            box-shadow: 0 0 25px rgba(246, 0, 0, 0.5);
            transform: translateY(-50%) scale(1.1);
        }

        .aci-lightbox-btn.prev {
            left: -5.5rem;
        }

        .aci-lightbox-btn.next {
            right: -5.5rem;
        }

        @media (max-width: 991px) {
            .aci-lightbox-btn.prev {
                left: 1rem;
                transform: translateY(-50%);
            }

            .aci-lightbox-btn.next {
                right: 1rem;
                transform: translateY(-50%);
            }

            .aci-lightbox-btn:hover {
                transform: translateY(-50%) scale(1.05);
            }

            .aci-lightbox-content {
                max-width: 95%;
            }
        }

        .aci-lightbox-close {
            position: absolute;
            top: 0;
            right: 0;
            width: 3.25rem;
            height: 3.25rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .aci-lightbox-close:hover {
            background: rgba(246, 0, 0, 0.2);
            color: #ffffff;
            border-color: rgba(246, 0, 0, 0.4);
            transform: rotate(90deg) scale(1.05);
            box-shadow: 0 0 20px rgba(246, 0, 0, 0.2);
        }

        .loader {
            transform: rotateZ(45deg);
            perspective: 1000px;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            color: black;
        }

        .loader:before,
        .loader:after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: inherit;
            height: inherit;
            border-radius: 50%;
            transform: rotateX(70deg);
            animation: 1s spin linear infinite;
        }

        .loader:after {
            color: #FF3D00;
            transform: rotateY(70deg);
            animation-delay: .4s;
        }

        @keyframes rotate {
            0% {
                transform: translate(-50%, -50%) rotateZ(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotateZ(360deg);
            }
        }

        @keyframes rotateccw {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(-360deg);
            }
        }

        @keyframes spin {

            0%,
            100% {
                box-shadow: .2em 0px 0 0px currentcolor;
            }

            12% {
                box-shadow: .2em .2em 0 0 currentcolor;
            }

            25% {
                box-shadow: 0 .2em 0 0px currentcolor;
            }

            37% {
                box-shadow: -.2em .2em 0 0 currentcolor;
            }

            50% {
                box-shadow: -.2em 0 0 0 currentcolor;
            }

            62% {
                box-shadow: -.2em -.2em 0 0 currentcolor;
            }

            75% {
                box-shadow: 0px -.2em 0 0 currentcolor;
            }

            87% {
                box-shadow: .2em -.2em 0 0 currentcolor;
            }
        }

        /* =============================================
           FULL WEBSITE RESPONSIVE — Logo & Text
           Covers: Header logo, nav links, all section
           headings, body text, cards, stats, gallery
           ============================================= */

        /* ---- Tablet (≤1023px) ---- */
        @media (max-width: 1023px) {

            /* Logo */
            .logo-holder img,
            header.header_v2 .logo-holder img {
                height: 44px !important;
                width: auto !important;
            }

            /* Section big headings (text-4xl / text-5xl classes) */
            .text-4xl {
                font-size: clamp(1.6rem, 4.5vw, 2.25rem) !important;
            }

            .text-5xl {
                font-size: clamp(1.8rem, 5vw, 2.5rem) !important;
            }

            .md\:text-5xl {
                font-size: clamp(1.8rem, 5vw, 2.5rem) !important;
            }

            /* Wave section full-width heading */
            .wave-pattern-bg h2 {
                font-size: clamp(1.75rem, 4.5vw, 3.5rem) !important;
            }

            /* Products / News section heading */
            section h2.text-4xl,
            section h2.md\:text-5xl {
                font-size: clamp(1.6rem, 4vw, 2.25rem) !important;
                letter-spacing: -0.02em !important;
            }

            /* Our Story heading (clamp inline style already handles it) */
            #our-story h2 {
                font-size: clamp(1.75rem, 4vw, 2.75rem) !important;
            }

            /* Body paragraphs */
            #our-story p[style] {
                font-size: 1rem !important;
                line-height: 1.75 !important;
            }

            /* Stat numbers */
            .aci-stat-num {
                font-size: clamp(1.5rem, 4vw, 2rem) !important;
            }

            /* Navigation font in desktop bar */
            header.header_v2 nav a {
                font-size: clamp(13px, 1.4vw, 17px) !important;
            }
        }

        /* ---- Mobile (≤768px) ---- */
        @media (max-width: 768px) {

            /* Logo */
            .logo-holder img,
            header.header_v2 .logo-holder img {
                height: 36px !important;
                width: auto !important;
            }

            /* Section subtext labels (e.g. "OUR PRODUCTS", "Our Journey") */
            .text-xs.font-bold.tracking-\[0\.25em\],
            span[style*="letter-spacing:0.25em"],
            span[style*="letter-spacing: 0.25em"] {
                font-size: 0.65rem !important;
            }

            /* All big h2s */
            .text-4xl,
            .text-5xl,
            .md\:text-5xl,
            h2.text-4xl,
            h2.text-5xl {
                font-size: clamp(1.4rem, 5.5vw, 1.9rem) !important;
                line-height: 1.25 !important;
            }

            /* Wave section heading — full width + smaller */
            .wave-pattern-bg h2,
            [data-controller="reveal-icon-v2"] h2 {
                width: 95% !important;
                font-size: clamp(1.35rem, 5vw, 2rem) !important;
                margin-top: 1.5rem !important;
            }

            /* "Our Story" section heading */
            #our-story h2 {
                font-size: clamp(1.4rem, 5vw, 2rem) !important;
            }

            /* "Our Story" paragraph text */
            #our-story p[style] {
                font-size: 0.92rem !important;
                line-height: 1.7 !important;
            }

            /* Featured project image overlay heading */
            #our-story h3[style] {
                font-size: clamp(1.1rem, 4vw, 1.4rem) !important;
            }

            /* Stat cards — 2 columns already via grid, shrink numbers */
            .aci-stat-num {
                font-size: clamp(1.3rem, 5vw, 1.75rem) !important;
            }

            .aci-stat-label {
                font-size: 0.72rem !important;
            }

            /* Product card titles */
            .aci-prod-title {
                font-size: 1rem !important;
            }

            .aci-prod-sub {
                font-size: 0.8rem !important;
            }

            .aci-prod-hover-panel h3 {
                font-size: 1rem !important;
            }

            .aci-prod-list li {
                font-size: 0.82rem !important;
            }

            /* News card text */
            .aci-news-text {
                font-size: 0.85rem !important;
            }

            /* Gallery filter tabs */
            .aci-filter-tab {
                font-size: 0.75rem !important;
                padding: 0.4rem 0.75rem !important;
            }

            /* ACI banner slider card headings */
            .aci-slide-title {
                font-size: clamp(1.25rem, 5vw, 1.75rem) !important;
            }

            .aci-slide-subtitle {
                font-size: 0.8rem !important;
            }

            /* Section padding reduction */
            section.py-24 {
                padding-top: 3.5rem !important;
                padding-bottom: 3.5rem !important;
            }

            section.my-default {
                margin-top: 2.5rem !important;
                margin-bottom: 2.5rem !important;
            }

            /* container-fluid side padding */
            .container-fluid {
                padding-left: 1.25rem !important;
                padding-right: 1.25rem !important;
            }
        }

        /* ---- Small Mobile (≤480px) ---- */
        @media (max-width: 480px) {

            /* Logo smaller */
            .logo-holder img,
            header.header_v2 .logo-holder img {
                height: 30px !important;
            }

            /* All h2 headings */
            .text-4xl,
            .text-5xl,
            .md\:text-5xl,
            h2.text-4xl,
            h2.text-5xl {
                font-size: clamp(1.2rem, 6vw, 1.55rem) !important;
            }

            /* Wave heading */
            .wave-pattern-bg h2,
            [data-controller="reveal-icon-v2"] h2 {
                font-size: clamp(1.15rem, 6vw, 1.5rem) !important;
            }

            /* Our Story headings */
            #our-story h2 {
                font-size: clamp(1.2rem, 6vw, 1.55rem) !important;
            }

            /* Stat grid — 2 cols stays, but numbers smaller */
            .aci-stat-num {
                font-size: 1.25rem !important;
            }

            /* Reduce mb-16 heading margin on mobile */
            .mb-16 {
                margin-bottom: 2.5rem !important;
            }

            /* Section padding */
            section.py-24 {
                padding-top: 2.5rem !important;
                padding-bottom: 2.5rem !important;
            }

            /* container-fluid minimal padding */
            .container-fluid {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }

            /* inline logo in navbar for tiny screens */
            header.header_v2 {
                padding: 0 1rem !important;
            }
        }

        /* --- DARK FOOTER CONTRAST FIXES --- */
        .footer-v2:not(.bg-white) {
            background: #0a0f14 !important;
            border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #a0aec0 !important;
        }
        .footer-v2:not(.bg-white) .footer-title-glow {
            color: #ffffff !important;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.15) !important;
        }
        .footer-v2:not(.bg-white) p,
        .footer-v2:not(.bg-white) span,
        .footer-v2:not(.bg-white) div,
        .footer-v2:not(.bg-white) address {
            color: #a0aec0 !important;
        }
        .footer-v2:not(.bg-white) strong {
            color: #ffffff !important;
        }
        .footer-v2:not(.bg-white) a {
            color: #a0aec0 !important;
            transition: color 0.3s ease;
        }
        .footer-v2:not(.bg-white) a:hover {
            color: #ffffff !important;
        }
        .footer-v2:not(.bg-white) .border-t {
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        /* Premium Modern Social Icon Buttons */
        .social-icon-btn {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 44px !important;
            height: 44px !important;
            border-radius: 12px !important; /* Premium rounded corner instead of generic circle */
            background: #ffffff !important;
            border: 1px solid rgba(0, 0, 0, 0.06) !important;
            color: #4a5568 !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02) !important;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
            position: relative !important;
            overflow: hidden !important;
        }
        
        .social-icon-btn svg {
            position: relative !important;
            z-index: 2 !important;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), stroke 0.35s ease !important;
        }

        /* Hover animation: scale up, rotate slightly, change colors, custom shadows */
        .social-icon-btn:hover {
            transform: translateY(-4px) scale(1.05) !important;
            color: #ffffff !important;
        }

        .social-icon-btn:hover svg {
            transform: scale(1.1) rotate(-8deg) !important;
        }

        /* Platform specific brand colors and custom glows */
        .social-icon-btn[aria-label*="Facebook"]:hover {
            background: #1877F2 !important;
            border-color: #1877F2 !important;
            box-shadow: 0 10px 20px rgba(24, 119, 242, 0.25) !important;
        }

        .social-icon-btn[aria-label*="LinkedIn"]:hover {
            background: #0A66C2 !important;
            border-color: #0A66C2 !important;
            box-shadow: 0 10px 20px rgba(10, 102, 194, 0.25) !important;
        }

        /* For dark footer variations if they exist */
        .footer-v2:not(.bg-white) .social-icon-btn {
            background: rgba(255, 255, 255, 0.03) !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
            color: #cbd5e1 !important;
            box-shadow: none !important;
        }

        .footer-v2:not(.bg-white) .social-icon-btn:hover {
            color: #ffffff !important;
        }
    </style>
    <link href="{{ asset('css/modern.css') }}?v={{ time() }}" rel="stylesheet">
    
</head>

<body data-controller="main " class="@yield('body_class', 'home-negative')" style>
    <!--
    ============================================================================
    BODY CONTAINER
    Main body container with data-controller attribute for Stimulus JS framework.
    ============================================================================
  -->
    <!--
      ==========================================================================
      COOKIE CONSENT MODAL TEMPLATE
      This overlay contains the cookie information banner, consent settings,
      strictly necessary/functional/statistical cookie tables, and associated styles.
      ==========================================================================
    -->

    

    <!--
      ==========================================================================
      HEADER SECTION & SITE NAVIGATION
      Contains the brand logo, navigation menus, language selector, search bar,
      and main dropdown navigation using Stimulus controllers.
      ==========================================================================
    -->
    <header class="header_v2 header-scrolled @yield('header_animation') @yield('header_class')" data-controller="dropdown-menu-v2 logo-animation-v2"
        style="@yield('header_style', 'background-color: #ffffff; backdrop-filter: blur(0px); box-shadow: 0 2px 4px rgba(0,0,0,0.05);')">
        <div class="container-fluid z-50">
            <div class="flex justify-between">
                <a class="logo-holder self-center mr-6" href="/" aria-label="ACI Marine">
                    <img src="{{ asset('image/logo_white_bg.png') }}" style="height: 64px;" alt srcset>
                </a>
                <div class="flex justify-center">

                    <!-- Navigation Menu -->
                    <nav class="hidden md:flex items-center gap-10">
                        <a href="/"
                            class="text-[15px] font-medium text-anthracite-100 hover:text-red-accent" style="
    color: #212526;
    font-size: 23px;
">
                            Home
                        </a>

                        <a href="/about" class="text-[15px] font-medium text-anthracite-100 hover:text-red-accent"
                            style="
    color: #212526;
    font-size: 23px;
">
                            About Us
                        </a>

                        <a href="/products"
                            class="text-[15px] font-medium text-anthracite-100 hover:text-red-accent" style="
    color: #212526;
    font-size: 23px;
">
                            Products
                        </a>

                        <a href="/projects"
                            class="text-[15px] font-medium text-anthracite-100 hover:text-red-accent" style="
    color: #212526;
    font-size: 23px;
">
                            Projects
                        </a>

                        <a href="/contact" class="text-[15px] font-medium text-anthracite-100 hover:text-red-accent"
                            style="
    color: #212526;
    font-size: 23px;
">
                            Contact
                        </a>
                    </nav>

                    <div class="flex items-center">
                        <!-- Search Icon -->
                        <!-- Menu Icon -->
                    </div>

                </div>
                <div class="flex items-center">
                    <a href="javascript:void(0)" aria-label="Search"
                        onclick="document.getElementById('searchModal').classList.add('visible'); setTimeout(() => document.querySelector('.search-input').focus(), 50);"
                        data-dropdown-menu-v2-target="searchIcon" class="icon-search_v2"><svg width="44" height="44"
                            viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 29C25.4183 29 29 25.4183 29 21C29 16.5817 25.4183 13 21 13C16.5817 13 13 16.5817 13 21C13 25.4183 16.5817 29 21 29Z"
                                stroke="#212526" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M31.0004 31.0004L26.6504 26.6504" stroke="#212526" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                    <a id="toggleDropDown" href="javascript:void(0)" data-dropdown-menu-v2-target="toggleDropDown"
                        role="button" aria-label="Toggle dropdown menu" aria-expanded="false"
                        onclick="toggleHeaderMenu(event || window.event)"
                        class="w-[2.75rem] h-[2.75rem] flex items-center justify-center">
                        <span data-dropdown-menu-v2-target="menuIcon" class="icon-menu_v2"><svg width="44" height="44"
                                viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.9471 14.5H11.4521" stroke="#212526" stroke-width="1.5"
                                    stroke-linecap="square" stroke-linejoin="round"></path>
                                <path d="M32.9471 21.5H11.4521" stroke="#212526" stroke-width="1.5"
                                    stroke-linecap="square" stroke-linejoin="round"></path>
                                <path d="M32.9471 28.5H11.4521" stroke="#212526" stroke-width="1.5"
                                    stroke-linecap="square" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span data-dropdown-menu-v2-target="closeIcon" class="hidden"><svg width="17" height="17"
                                viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8914 15.5008L1.375 1.98438" stroke="currentColor" stroke-width="1.59089"
                                    stroke-linecap="square" stroke-linejoin="round"></path>
                                <path d="M14.8914 1.49919L1.375 15.0156" stroke="currentColor" stroke-width="1.59089"
                                    stroke-linecap="square" stroke-linejoin="round"></path>
                                <path d="M14.8914 1.49919L1.375 15.0156" stroke="currentColor" stroke-width="1.59089"
                                    stroke-linecap="square" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>

            <div id="dropDownMenu" data-dropdown-menu-v2-target="dropDownMenu" class="overflow-y-auto">
            <button type="button" class="modal-close-btn"
                style="position: fixed !important; top: 30px !important; right: 40px !important; z-index: 9999 !important; display: flex !important; align-items: center !important; justify-content: center !important; width: 50px !important; height: 50px !important; border-radius: 50% !important; background: rgba(0, 0, 0, 0.04) !important; border: 1px solid rgba(0, 0, 0, 0.08) !important; color: #1e293b !important; cursor: pointer !important; transition: all 0.3s ease !important;"
                aria-label="Close menu" onclick="document.getElementById('dropDownMenu').classList.remove('visible');">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <nav id="mainPanel" class="menu-panel_v2 pt-40">
                <div class="custom-modal-shell px-5 md:px-0">
                    <div class="custom-modal-grid">
                        <div class="custom-modal-left">
                            <div class="mb-8 max-w-xl">
                                <div class="mb-6 logo-holder">
                                    <img src="{{ asset('image/logo_white_bg.png') }}" style="height: 52px; mix-blend-mode: multiply;"
                                        alt="ACI Marine">
                                </div>
                                <h2
                                    class="text-heading-xl font-bold bg-gradient-to-r from-slate-900 via-slate-800 to-slate-600 text-transparent bg-clip-text mt-6">
                                    We enable sustainable business at sea</h2>
                                <p class="modal-intro text-body-sm text-slate-600 mt-6">Quick access to our key sections
                                    and direct contact details in a clean, modern overlay.</p>
                            </div>
                            <div class="modal-nav-list space-y-4 mb-8">
                                <a href="/" class="modal-nav-link"
                                    onclick="document.getElementById('dropDownMenu').classList.remove('visible');">Home</a>
                                <a href="/about" class="modal-nav-link"
                                    onclick="document.getElementById('dropDownMenu').classList.remove('visible');">About
                                    Us</a>
                                <a href="/products" class="modal-nav-link"
                                    onclick="document.getElementById('dropDownMenu').classList.remove('visible');">Products</a>
                                <a href="/projects" class="modal-nav-link"
                                    onclick="document.getElementById('dropDownMenu').classList.remove('visible');">Projects</a>
                                <a href="/contact" class="modal-nav-link"
                                    onclick="document.getElementById('dropDownMenu').classList.remove('visible');">Contact</a>
                            </div>
                        </div>
                        <div class="custom-modal-right">
                            <div class="modal-contact-card">
                                <p class="modal-contact-label">Call Us</p>
                                <p class="modal-contact-phone">(+88) 01700-701761</p>
                                <div class="mt-10">
                                    <p class="modal-contact-label">Email Us</p>
                                    <p class="modal-contact-email">acimarine@aci-bd.com</p>
                                </div>
                                <a href="mailto:acimarine@aci-bd.com" class="modal-cta-btn">Get A Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="old-modal-content">
                    <div class="container-fluid md:pb-36">
                        <div class="flex flex-wrap md:flex-nowrap">
                            <div class="px-5 md:w-1/2 md:pl-12 md:pr-0 pb-6 md:pb-0">
                                <div data-controller="lottie-v2"
                                    data-lottie-v2-file-value="Infinity_symbol_anthracite.json">
                                    <lottie-player background="transparent" speed="1" loop autoplay
                                        class="w-[4.31219rem] h-[1.23375rem]"></lottie-player>
                                </div>
                                <h2 class="text-heading-xl text-anthracite-100 mt-11">We
                                    enable sustainable business at sea
                                </h2>
                                <a href="#" class="hover-underline flex items-center text-red gap-x-1 mt-7"><span
                                        class="link-label">How we lead the
                                        way</span><span class="arrow-icon"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 11.25H4.25V12.75H5V11.25ZM19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25V12.75ZM5 12.75H19V11.25H5V12.75Z"
                                                fill="currentColor"></path>
                                            <path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="square" stroke-linejoin="round"></path>
                                        </svg>
                                    </span></a>
                            </div>
                            <ul class="py-10 px-5 primary-menu md:w-1/2 md:pl-12 md:pr-0 md:py-0">
                                <li class="md:border-b md:border-b-anthracite-alpha-30 py-3 mb-1.5"><a href="#"
                                        class="group text-anthracite-100 flex items-center gap-x-1.5">Shipdesign<span
                                            class="w-[1.6875rem] h-[1.6875rem] [&amp;_svg]:w-full [&amp;_svg]:h-full text-anthracite-alpha-10 rotate-0 group-hover:text-red-accent group-hover:-rotate-45 transition-all"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="47" height="45"
                                                viewBox="0 0 47 45" fill="none">
                                                <path d="M6.38655 4.27734L40.5781 37.2025" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path d="M41.1992 5.19727V38.1224H7.00764" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg></span></a></li>
                                <li class="md:border-b md:border-b-anthracite-alpha-30 py-3 mb-1.5"><a href="#"
                                        class="group text-anthracite-100 flex items-center gap-x-1.5">Shipbuilding<span
                                            class="w-[1.6875rem] h-[1.6875rem] [&amp;_svg]:w-full [&amp;_svg]:h-full text-anthracite-alpha-10 rotate-0 group-hover:text-red-accent group-hover:-rotate-45 transition-all"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="47" height="45"
                                                viewBox="0 0 47 45" fill="none">
                                                <path d="M6.38655 4.27734L40.5781 37.2025" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path d="M41.1992 5.19727V38.1224H7.00764" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg></span></a></li>
                                <li class="md:border-b md:border-b-anthracite-alpha-30 py-3 mb-1.5"><a href="#"
                                        class="group text-anthracite-100 flex items-center gap-x-1.5">Ship
                                        repair &amp;
                                        conversion<span
                                            class="w-[1.6875rem] h-[1.6875rem] [&amp;_svg]:w-full [&amp;_svg]:h-full text-anthracite-alpha-10 rotate-0 group-hover:text-red-accent group-hover:-rotate-45 transition-all"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="47" height="45"
                                                viewBox="0 0 47 45" fill="none">
                                                <path d="M6.38655 4.27734L40.5781 37.2025" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path d="M41.1992 5.19727V38.1224H7.00764" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg></span></a></li>
                                <li class=" py-3 mb-1.5"><a href="#"
                                        class="group text-anthracite-100 flex items-center gap-x-1.5">Products
                                        &amp;
                                        services<span
                                            class="w-[1.6875rem] h-[1.6875rem] [&amp;_svg]:w-full [&amp;_svg]:h-full text-anthracite-alpha-10 rotate-0 group-hover:text-red-accent group-hover:-rotate-45 transition-all"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="47" height="45"
                                                viewBox="0 0 47 45" fill="none">
                                                <path d="M6.38655 4.27734L40.5781 37.2025" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path d="M41.1992 5.19727V38.1224H7.00764" stroke="currentColor"
                                                    stroke-width="1.57143" stroke-linecap="square"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="hidden md:block secondary-menu p-5 md:py-20 md:px-0">
                        <div class="container-fluid">
                            <ul class="md:grid md:grid-cols-12 gap-5 pl-12">
                                <li class="col-span-3">
                                    <p class="text-menu-title">Who we are</p>
                                    <ul class="mt-4">
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">About
                                                    us</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">ACI Marine
                                                    Electro</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">ACI Marine
                                                    Interiors</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Handling
                                                    systems</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Our
                                                    commitment</span></a></li>
                                    </ul>
                                </li>
                                <li class="col-span-3">
                                    <p class="text-menu-title">What we do</p>
                                    <ul class="mt-4">
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Shipdesign</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Shipbuilding</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Ship
                                                    repair
                                                    &amp;
                                                    conversion</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Products
                                                    &amp;
                                                    services</span></a></li>
                                    </ul>
                                </li>
                                <li class="col-span-3">
                                    <a href class="hover-underline text-menu-title"><span class="link-label">How we lead
                                            the way</span></a>
                                    <ul class="mt-4">
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">ACI Marine
                                                    Governmental Defense
                                                    Program</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Research
                                                    and
                                                    Innovation</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">ACI Marine
                                                    Maritime
                                                    Cyber</span></a></li>
                                        <li class="mb-1"><a href="/projects"
                                                class="hover-underline text-body-sm"><span class="link-label">Cases
                                                    &amp;
                                                    references</span></a></li>
                                    </ul>
                                </li>
                                <li class="col-span-3">
                                    <p class="text-menu-title">Contact</p>
                                    <ul class="mt-4">
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Contact
                                                    us</span></a></li>
                                    </ul>
                                </li>
                                <li class="col-span-3">
                                    <a href="#" class="hover-underline text-menu-title"><span
                                            class="link-label">Career</span></a>
                                    <ul class="mt-4">
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Career</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Available
                                                    positions</span></a></li>
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">Bli
                                                    lærling i
                                                    ACI Marine</span></a></li>
                                    </ul>
                                </li>
                                <li class="col-span-3">
                                    <p class="text-menu-title">News</p>
                                    <ul class="mt-4">
                                        <li class="mb-1"><a href="#" class="hover-underline text-body-sm"><span
                                                    class="link-label">News
                                                    &amp;
                                                    media</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:hidden container-fluid bg-white pb-16">
                        <ul class="px-5 py-10">
                            <ul class>
                                <li class="accordion-v2 border-b border-b-anthracite-alpha-30"
                                    data-controller="expand-v2">
                                    <button class="text-menu-title flex w-full justify-between items-center"
                                        data-action="click-&gt;expand-v2#toggleExpand">Who
                                        we are
                                        <span class="icon-chevron text-red"><svg width="48" height="48"
                                                viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 18L24 30L36 18" stroke="currentColor"
                                                    stroke-width="1.56522" stroke-linecap="square"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="content">
                                        <li class="px-6 py-3"><a href class="text-body-sm">Who we
                                                are</a></li>

                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">About
                                                us</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">ACI Marine
                                                Electro</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">ACI Marine
                                                Interiors</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Handling
                                                systems</a></li>
                                        <li class="px-6 py-3  mb-6 "><a href="#" class="text-body-sm">Our
                                                commitment</a></li>
                                    </ul>
                                </li>
                                <li class="accordion-v2 border-b border-b-anthracite-alpha-30"
                                    data-controller="expand-v2">
                                    <button class="text-menu-title flex w-full justify-between items-center"
                                        data-action="click-&gt;expand-v2#toggleExpand">What
                                        we do
                                        <span class="icon-chevron text-red"><svg width="48" height="48"
                                                viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 18L24 30L36 18" stroke="currentColor"
                                                    stroke-width="1.56522" stroke-linecap="square"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="content">
                                        <li class="px-6 py-3"><a href class="text-body-sm">What we
                                                do</a></li>

                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Shipdesign</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Shipbuilding</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Ship repair
                                                &amp; conversion</a></li>
                                        <li class="px-6 py-3  mb-6 "><a href="/products" class="text-body-sm">Products
                                                &amp; services</a></li>
                                    </ul>
                                </li>
                                <li class="accordion-v2 border-b border-b-anthracite-alpha-30"
                                    data-controller="expand-v2">
                                    <button class="text-menu-title flex w-full justify-between items-center"
                                        data-action="click-&gt;expand-v2#toggleExpand">How
                                        we lead the way
                                        <span class="icon-chevron text-red"><svg width="48" height="48"
                                                viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 18L24 30L36 18" stroke="currentColor"
                                                    stroke-width="1.56522" stroke-linecap="square"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="content">
                                        <li class="px-6 py-3"><a href class="text-body-sm">How we lead
                                                the way</a></li>

                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">ACI Marine
                                                Governmental Defense
                                                Program</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Research
                                                and Innovation</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">ACI Marine
                                                Maritime Cyber</a></li>
                                        <li class="px-6 py-3  mb-6 "><a href="/projects" class="text-body-sm">Cases
                                                &amp;
                                                references</a></li>
                                    </ul>
                                </li>
                                <li class="accordion-v2 border-b border-b-anthracite-alpha-30"
                                    data-controller="expand-v2">
                                    <button class="text-menu-title flex w-full justify-between items-center"
                                        data-action="click-&gt;expand-v2#toggleExpand">Contact
                                        <span class="icon-chevron text-red"><svg width="48" height="48"
                                                viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 18L24 30L36 18" stroke="currentColor"
                                                    stroke-width="1.56522" stroke-linecap="square"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="content">
                                        <li class="px-6 py-3"><a href class="text-body-sm">Contact</a></li>

                                        <li class="px-6 py-3  mb-6 "><a href="#" class="text-body-sm">Contact
                                                us</a></li>
                                    </ul>
                                </li>
                                <li class="accordion-v2 border-b border-b-anthracite-alpha-30"
                                    data-controller="expand-v2">
                                    <button class="text-menu-title flex w-full justify-between items-center"
                                        data-action="click-&gt;expand-v2#toggleExpand">Career
                                        <span class="icon-chevron text-red"><svg width="48" height="48"
                                                viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 18L24 30L36 18" stroke="currentColor"
                                                    stroke-width="1.56522" stroke-linecap="square"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="content">
                                        <li class="px-6 py-3"><a href="#" class="text-body-sm">Career</a></li>

                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Career</a></li>
                                        <li class="px-6 py-3 "><a href="#" class="text-body-sm">Available
                                                positions</a></li>
                                        <li class="px-6 py-3  mb-6 "><a href="#" class="text-body-sm">Bli lærling
                                                i ACI Marine</a></li>
                                    </ul>
                                </li>
                                <li class="accordion-v2 border-b border-b-anthracite-alpha-30"
                                    data-controller="expand-v2">
                                    <button class="text-menu-title flex w-full justify-between items-center"
                                        data-action="click-&gt;expand-v2#toggleExpand">News
                                        <span class="icon-chevron text-red"><svg width="48" height="48"
                                                viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 18L24 30L36 18" stroke="currentColor"
                                                    stroke-width="1.56522" stroke-linecap="square"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="content">
                                        <li class="px-6 py-3"><a href class="text-body-sm">News</a></li>

                                        <li class="px-6 py-3  mb-6 "><a href="#" class="text-body-sm">News &amp;
                                                media</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </ul>
                    </div>
            </nav>
        </div>
    </header>

    @yield('content')

@php
    if (!isset($settings)) {
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    }
@endphp
<footer class="footer-v2 relative bg-white border-t border-gray-100 overflow-hidden mt-10">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-600 via-gray-800 to-gray-400"></div>
    <div class="absolute -top-[300px] -right-[300px] w-[600px] h-[600px] bg-gray-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>


    <div class="container-fluid relative z-10">
        <!-- Grid columns -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 pt-10 pb-16">
            <!-- Column 1: About Us -->
            <div class="flex flex-col gap-6">
                <div>
                    <h3 class="text-gray-900 font-extrabold tracking-wider text-sm uppercase relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-12 after:h-0.5 after:bg-[#E30613]">About Us</h3>
                </div>
                <p class="text-gray-500 leading-relaxed text-sm">
                    {{ $settings['footer_about_text'] ?? 'ACI Marine and Riverine Technologies Limited, a concern of ACI Group, started its journey in 2018 with the vision to pioneer advanced engineering, shipbuilding, and propulsion systems in Bangladesh.' }}
                </p>
                <!-- Social Icons -->
                <style>
                    .modern-social-btn {
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        width: 44px !important;
                        height: 44px !important;
                        border-radius: 50% !important;
                        background-color: #ffffff !important;
                        border: 1px solid #eaeaea !important;
                        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important;
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
                        text-decoration: none !important;
                        position: relative !important;
                        overflow: hidden !important;
                    }
                    .modern-social-btn i {
                        font-size: 18px !important;
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
                        position: relative !important;
                        z-index: 10 !important;
                        margin: 0 !important;
                        display: inline-block !important;
                        line-height: 1 !important;
                    }
                    .modern-social-btn::before {
                        content: '' !important;
                        position: absolute !important;
                        inset: 0 !important;
                        border-radius: 50% !important;
                        transform: scale(0) !important;
                        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
                        z-index: 1 !important;
                    }
                    
                    /* Facebook Styling */
                    .modern-social-btn.fb-btn i { color: #1877F2 !important; }
                    .modern-social-btn.fb-btn::before { background-color: #1877F2 !important; }
                    .modern-social-btn.fb-btn:hover { 
                        border-color: #1877F2 !important; 
                        box-shadow: 0 10px 20px -5px rgba(24, 119, 242, 0.4) !important;
                        transform: translateY(-4px) !important;
                    }
                    .modern-social-btn.fb-btn:hover::before { transform: scale(1.5) !important; }
                    .modern-social-btn.fb-btn:hover i { color: #ffffff !important; transform: scale(1.1) !important; }

                    /* LinkedIn Styling */
                    .modern-social-btn.in-btn i { color: #0A66C2 !important; }
                    .modern-social-btn.in-btn::before { background-color: #0A66C2 !important; }
                    .modern-social-btn.in-btn:hover { 
                        border-color: #0A66C2 !important; 
                        box-shadow: 0 10px 20px -5px rgba(10, 102, 194, 0.4) !important;
                        transform: translateY(-4px) !important;
                    }
                    .modern-social-btn.in-btn:hover::before { transform: scale(1.5) !important; }
                    .modern-social-btn.in-btn:hover i { color: #ffffff !important; transform: scale(1.1) !important; }
                </style>
                <div class="flex gap-4 items-center mt-6">
                    @if(!empty($settings['footer_facebook_1']))
                    <a href="{{ $settings['footer_facebook_1'] }}" target="_blank" class="modern-social-btn fb-btn" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if(!empty($settings['footer_facebook_2']))
                    <a href="{{ $settings['footer_facebook_2'] }}" target="_blank" class="modern-social-btn fb-btn" aria-label="Facebook Equipment">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if(!empty($settings['footer_linkedin']))
                    <a href="{{ $settings['footer_linkedin'] }}" target="_blank" class="modern-social-btn in-btn" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Column 2: Business Areas -->
            <div class="flex flex-col gap-6">
                <div>
                    <h3 class="text-gray-900 font-extrabold tracking-wider text-sm uppercase relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-12 after:h-0.5 after:bg-[#E30613]">Business Areas</h3>
                </div>
                <ul class="space-y-4 text-gray-500 text-sm font-medium">
                    <li>
                        <a href="#" class="group flex items-center transition-colors duration-300 hover:text-[#E30613]">
                            <span class="w-0 h-[2px] bg-[#E30613] mr-0 transition-all duration-300 group-hover:w-3 group-hover:mr-2"></span>
                            Marine and Shipbuilding Equipment
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group flex items-center transition-colors duration-300 hover:text-[#E30613]">
                            <span class="w-0 h-[2px] bg-[#E30613] mr-0 transition-all duration-300 group-hover:w-3 group-hover:mr-2"></span>
                            Ship Repair Service
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Head Office -->
            <div class="flex flex-col gap-6">
                <div>
                    <h3 class="text-gray-900 font-extrabold tracking-wider text-sm uppercase relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-12 after:h-0.5 after:bg-[#E30613]">Head Office</h3>
                </div>
                <div class="flex flex-col gap-5 text-gray-500 text-sm">
                    <div class="flex items-start gap-4 group">
                        <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:bg-[#E30613] group-hover:border-[#E30613] transition-colors duration-300">
                            <svg class="text-gray-400 group-hover:text-white transition-colors duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <span class="mt-1">{{ $settings['contact_address'] ?? 'ACI Centre, 245 Tejgaon Industrial Area, Dhaka-1208, Bangladesh' }}</span>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:bg-[#E30613] group-hover:border-[#E30613] transition-colors duration-300">
                            <svg class="text-gray-400 group-hover:text-white transition-colors duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <span>{{ $settings['contact_hours'] ?? 'Sat - Thu: 9:00 AM - 6:00 PM' }}</span>
                    </div>
                </div>
            </div>

            <!-- Column 4: Contact Support -->
            <div class="flex flex-col gap-6">
                <div>
                    <h3 class="text-gray-900 font-extrabold tracking-wider text-sm uppercase relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-12 after:h-0.5 after:bg-[#E30613]">Contact Info</h3>
                </div>
                <div class="flex flex-col gap-5 text-gray-500 text-sm">
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:bg-[#E30613] group-hover:border-[#E30613] transition-colors duration-300">
                            <svg class="text-gray-400 group-hover:text-white transition-colors duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                        </div>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'acimarine@aci-bd.com' }}" class="hover:text-[#E30613] font-medium transition-colors">{{ $settings['contact_email'] ?? 'acimarine@aci-bd.com' }}</a>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:bg-[#E30613] group-hover:border-[#E30613] transition-colors duration-300">
                            <svg class="text-gray-400 group-hover:text-white transition-colors duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </div>
                        @php
                            $phone = $settings['contact_office_phone'] ?? '(+88) 01700701761';
                            $phoneLink = preg_replace('/[^0-9+]/', '', $phone);
                        @endphp
                        <a href="tel:{{ $phoneLink }}" class="hover:text-[#E30613] font-medium transition-colors">{{ $phone }}</a>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:bg-[#E30613] group-hover:border-[#E30613] transition-colors duration-300">
                            <svg class="text-gray-400 group-hover:text-white transition-colors duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-500">Hotline: <strong class="text-gray-900 text-lg">{{ $settings['contact_hotline'] ?? '16533' }}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="border-t border-gray-100 py-6 flex flex-col-reverse md:flex-row justify-between items-center gap-6 mt-4">
            <!-- Copyright Left -->
            <div class="flex flex-col items-center md:items-start gap-1">
                <p class="text-sm text-gray-400">
                    &copy; <script>document.write(new Date().getFullYear())</script> ACI Marine. All rights reserved.
                </p>
                <div class="flex gap-4 text-xs text-gray-400">
                    <a href="#" class="hover:text-gray-700 transition-colors">Privacy Policy</a>
                    <span class="w-1 h-1 bg-gray-300 rounded-full self-center"></span>
                    <a href="#" class="hover:text-gray-700 transition-colors">Terms of Service</a>
                </div>
            </div>

            <!-- Logos Right/Center -->
            <div class="flex items-center justify-center gap-8">
                <a href="https://acimarine.com" target="_blank" class="group">
                    <img src="{{ asset('image/logo_white_bg.png') }}" style="height: 40px; object-fit: contain;" alt="ACI Marine" class="grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                </a>
                <div class="w-[1px] h-8 bg-gray-200"></div>
                <a href="#" class="group">
                    <img src="{{ asset('image/mitsubishi_logo.png') }}" style="height: 35px; object-fit: contain;" alt="Mitsubishi" class="grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                </a>
            </div>
        </div>
    </div>
</footer>
    <!--
      ==========================================================================
      FOOTER SCRIPTS
      Includes the global app JS bundle.
      ==========================================================================
    -->

    



    <!-- Custom Fallback Slider JS to ensure "same-to-same" replica behavior of the ACI Marine slider -->
    <script>
        window.toggleHeaderMenu = function (event) {
            if (event) event.preventDefault();
            const menuToggle = document.getElementById('toggleDropDown');
            const dropDownMenu = document.getElementById('dropDownMenu');
            if (!dropDownMenu || !menuToggle) return;
            const headerElement = document.querySelector('header.header_v2');
            const menuIcon = menuToggle.querySelector('[data-dropdown-menu-v2-target="menuIcon"]');
            const closeIcon = menuToggle.querySelector('[data-dropdown-menu-v2-target="closeIcon"]');
            const visible = !dropDownMenu.classList.contains('visible');
            dropDownMenu.classList.toggle('visible', visible);
            if (headerElement) headerElement.classList.toggle('menu-open', visible);
            menuToggle.setAttribute('aria-expanded', visible ? 'true' : 'false');
            if (menuIcon) menuIcon.classList.toggle('hidden', visible);
            if (closeIcon) closeIcon.classList.toggle('hidden', !visible);
            dropDownMenu.setAttribute('aria-hidden', visible ? 'false' : 'true');
            console.log('toggleHeaderMenu', visible, menuToggle, dropDownMenu);
        }

        document.addEventListener("DOMContentLoaded", function () {
            const header = document.querySelector("header.header_v2");
            const logoImg = header ? header.querySelector(".logo-holder img") : null;
            const backToTopBtn = document.getElementById("back-to-top");

            // Enforce layout resets dynamically to prevent any spacing offsets at the top
            const enforceResets = () => {
                if (header) {
                    header.style.setProperty("position", "fixed", "important");
                }
                const mainEl = document.querySelector(".main");
                if (mainEl) {
                    mainEl.style.setProperty("padding-top", "0", "important");
                    mainEl.style.setProperty("margin-top", "0", "important");
                    mainEl.style.setProperty("position", "relative", "important");
                    mainEl.style.setProperty("top", "0", "important");
                }
                document.body.style.setProperty("padding-top", "0", "important");
                document.body.style.setProperty("margin-top", "0", "important");
            };

            let lastScrollY = window.scrollY;

            const handleScroll = () => {
                enforceResets();

                const currentScrollY = window.scrollY;

                // Show Back to Top button when scroll top is greater than 300px
                if (backToTopBtn) {
                    if (currentScrollY > 300) {
                        backToTopBtn.style.opacity = "1";
                        backToTopBtn.style.pointerEvents = "auto";
                    } else {
                        backToTopBtn.style.opacity = "0";
                        backToTopBtn.style.pointerEvents = "none";
                    }
                }

                if (header) {
                    header.classList.add("header-scrolled");
                    if (logoImg && !logoImg.src.includes("logo_white_bg.png")) {
                        logoImg.src = "{{ asset('image/logo_white_bg.png') }}";
                    }

                    // Hide on scroll down, show on scroll up (keep visible when dropdown menu is open or close to top)
                    const isMenuOpen = header.classList.contains('menu-open');
                    if (currentScrollY > lastScrollY && currentScrollY > 100 && !isMenuOpen) {
                        header.classList.add("header-hidden");
                    } else {
                        header.classList.remove("header-hidden");
                    }
                }

                lastScrollY = currentScrollY;
            };

            handleScroll();
            window.addEventListener("scroll", handleScroll, { passive: true });
            window.addEventListener("resize", handleScroll, { passive: true });

            // --- 1.5. HEADER MENU TOGGLE ---
            const menuToggle = document.getElementById('toggleDropDown');
            const dropDownMenu = document.getElementById('dropDownMenu');
            const menuIcon = menuToggle ? menuToggle.querySelector('[data-dropdown-menu-v2-target="menuIcon"]') : null;
            const closeIcon = menuToggle ? menuToggle.querySelector('[data-dropdown-menu-v2-target="closeIcon"]') : null;
            const closeLinks = dropDownMenu ? dropDownMenu.querySelectorAll('.modal-close-btn, .modal-nav-link') : [];

            const setMenuState = (visible) => {
                if (!dropDownMenu || !menuToggle) return;
                dropDownMenu.classList.toggle('visible', visible);
                if (header) header.classList.toggle('menu-open', visible);
                menuToggle.setAttribute('aria-expanded', visible ? 'true' : 'false');
                if (menuIcon) menuIcon.classList.toggle('hidden', visible);
                if (closeIcon) closeIcon.classList.toggle('hidden', !visible);
                dropDownMenu.setAttribute('aria-hidden', visible ? 'false' : 'true');
            };

            const toggleMenu = (event) => {
                if (event) event.preventDefault();
                if (!dropDownMenu) return;
                setMenuState(!dropDownMenu.classList.contains('visible'));
            };

            if (menuToggle) {
                menuToggle.addEventListener('click', toggleMenu);
                menuToggle.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        toggleMenu(event);
                    }
                });
            }

            document.addEventListener('click', (event) => {
                const toggleElement = event.target.closest('#toggleDropDown');
                if (!toggleElement) return;
                event.preventDefault();
                window.toggleHeaderMenu(event);
            });

            if (dropDownMenu) {
                dropDownMenu.addEventListener('click', (event) => {
                    if (event.target === dropDownMenu) {
                        setMenuState(false);
                    }
                });
            }

            closeLinks.forEach((link) => {
                link.addEventListener('click', () => setMenuState(false));
            });

            // --- 2. SCROLL REVEAL LOGIC FOR SHIP ICON & TEXT ---
            const revealSection = document.querySelector('[data-controller="reveal-icon-v2"]');

            if (revealSection) {
                const icon = revealSection.querySelector('[data-reveal-icon-v2-target="icon"]');
                const title = revealSection.querySelector('[data-reveal-icon-v2-target="title"]');
                const titleSpans = revealSection.querySelectorAll('[data-reveal-icon-v2-target="title"] span');

                // Set initial state via style attributes so they are ready to animate
                if (icon) {
                    icon.style.opacity = "0";
                    icon.style.visibility = "hidden";
                    icon.style.transform = "translate(0px, 10rem)";
                    icon.style.transition = "transform 0.25s ease-out, opacity 0.25s ease-out";
                }
                if (title) {
                    title.style.transform = "translate(0px, 5rem)";
                    title.style.transition = "transform 0.3s ease-out";
                }
                titleSpans.forEach(span => {
                    span.style.opacity = "0.1";
                    span.style.transform = "translateY(20px) scale(0.92)";
                    span.style.filter = "blur(8px)";
                    span.style.transition = "transform 0.25s ease-out, opacity 0.25s ease-out, filter 0.25s ease-out";
                });

                // --- Cache section offset to avoid forced synchronous layout ---
                let _revealSectionTop = revealSection.getBoundingClientRect().top + window.scrollY;
                const _updateRevealCache = () => {
                    _revealSectionTop = revealSection.getBoundingClientRect().top + window.scrollY;
                };
                window.addEventListener('resize', _updateRevealCache, { passive: true });

                // --- Premium Automatic Opening Animation ---
                const duration = 2800; // Extend duration for a more epic feel
                const startTime = performance.now();

                // Easing functions
                const easeOutQuart = (x) => 1 - Math.pow(1 - x, 4);
                const easeOutBack = (x) => {
                    const c1 = 1.70158;
                    const c3 = c1 + 1;
                    return 1 + c3 * Math.pow(x - 1, 3) + c1 * Math.pow(x - 1, 2);
                };

                function animateReveal(currentTime) {
                    let rawProgress = (currentTime - startTime) / duration;
                    rawProgress = Math.max(0, Math.min(1, rawProgress));
                    
                    const progressFade = easeOutQuart(rawProgress);
                    const progressSpring = easeOutBack(rawProgress);

                    // Animate Icon (Logo)
                    if (icon) {
                        if (rawProgress > 0) {
                            icon.style.visibility = "visible";
                            icon.style.opacity = progressFade.toString();

                            // Slide up with spring effect, start from slightly lower, scale up
                            const translateY = (1 - progressSpring) * 80; // 80px down
                            const scale = 0.8 + (progressSpring * 0.2); 
                            // add slight rotation for dynamic feel
                            const rotate = (1 - progressSpring) * -15; 
                            
                            icon.style.transform = `translateY(${translateY}px) scale(${scale}) rotate(${rotate}deg)`;
                            icon.style.filter = `drop-shadow(0px ${progressFade * 15}px ${progressFade * 20}px rgba(39, 168, 68, ${progressFade * 0.4}))`;
                        }
                    }

                    // Animate Title Container
                    if (title) {
                        title.style.transform = `translateY(${(1 - progressFade) * 30}px)`;
                        title.style.opacity = progressFade.toString();
                    }

                    // Animate sentence spans sequentially with a premium 3D flip effect
                    if (titleSpans.length > 0) {
                        const totalSpans = titleSpans.length;

                        titleSpans.forEach((span, i) => {
                            // Stagger start times
                            const delay = i * 0.08; 
                            const spanDuration = 0.4;
                            
                            let spanProgress = (rawProgress - delay) / spanDuration;
                            spanProgress = Math.max(0, Math.min(1, spanProgress));
                            
                            const spanSpring = easeOutBack(spanProgress);
                            const spanFade = easeOutQuart(spanProgress);

                            // 3D Flip & slide up
                            span.style.opacity = Math.max(0.1, spanFade).toString();
                            const translateY = (1 - spanSpring) * 40;
                            const rotateX = (1 - spanSpring) * 60; // 60 deg rotation
                            const blurAmount = (1 - spanFade) * 10;
                            const scaleAmount = Math.max(0, 0.5 + (spanSpring * 0.5));
                            
                            // We need perspective for rotateX to look good
                            span.style.display = "inline-block";
                            span.style.transformOrigin = "bottom center";
                            span.style.transform = `perspective(400px) translateY(${translateY}px) rotateX(${rotateX}deg) scale(${scaleAmount})`;
                            span.style.filter = `blur(${blurAmount}px)`;
                        });
                    }
                    
                    if (rawProgress < 1) {
                        requestAnimationFrame(animateReveal);
                    }
                }
                
                // Delay slightly to ensure page load is smooth, then start animation
                setTimeout(() => {
                    requestAnimationFrame(animateReveal);
                }, 300);
            }
        });
    </script>

    <!-- ACI Gallery Filter & Lightbox Controller -->
    <script>
        (function () {
            // --- Gallery Filter Logic ---
            const filterBtns = document.querySelectorAll('#aciGalleryFilters .aci-filter-tab');
            const galleryItems = document.querySelectorAll('#aciGalleryGrid .aci-gallery-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    const filter = btn.dataset.filter;

                    galleryItems.forEach(item => {
                        const match = filter === 'all' || item.dataset.category === filter;
                        if (match) {
                            item.style.display = '';
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'translateY(0) scale(1)';
                            }, 50);
                        } else {
                            item.style.opacity = '0';
                            item.style.transform = 'translateY(20px) scale(0.95)';
                            setTimeout(() => { item.style.display = 'none'; }, 400);
                        }
                    });
                });
            });

            // --- Lightbox Logic ---
            const lightbox = document.getElementById('aciGalleryLightbox');
            const lbImg = document.getElementById('aciLightboxImg');
            const lbTitle = document.getElementById('aciLightboxTitle');
            const lbDesc = document.getElementById('aciLightboxDesc');
            const lbCaption = document.querySelector('.aci-lightbox-caption');
            let lbIndex = 0;

            function getVisible() {
                return Array.from(galleryItems).filter(i => i.style.display !== 'none');
            }

            function openLightbox(idx) {
                const vis = getVisible();
                if (idx < 0 || idx >= vis.length) return;
                lbIndex = idx;
                const item = vis[idx];
                const img = item.querySelector('.aci-gallery-img');
                const title = item.querySelector('.aci-gallery-title');
                const desc = item.querySelector('.aci-gallery-desc');

                const targetSrc = img ? img.src : '';
                const targetAlt = img ? img.alt : '';
                const targetTitle = title ? title.textContent : '';
                const targetDesc = desc ? desc.textContent : '';

                if (lightbox.classList.contains('active')) {
                    // Smooth transition between items
                    lbImg.classList.add('transitioning');
                    if (lbCaption) lbCaption.classList.add('transitioning');

                    setTimeout(() => {
                        lbImg.src = targetSrc;
                        lbImg.alt = targetAlt;
                        lbTitle.textContent = targetTitle;
                        lbDesc.textContent = targetDesc;

                        const finishTransition = () => {
                            lbImg.classList.remove('transitioning');
                            if (lbCaption) lbCaption.classList.remove('transitioning');
                        };

                        if (lbImg.complete) {
                            finishTransition();
                        } else {
                            lbImg.onload = finishTransition;
                        }
                    }, 150);
                } else {
                    lbImg.src = targetSrc;
                    lbImg.alt = targetAlt;
                    lbTitle.textContent = targetTitle;
                    lbDesc.textContent = targetDesc;
                    lightbox.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeLightbox() {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }

            function nextLB() {
                const vis = getVisible();
                openLightbox((lbIndex + 1) % vis.length);
            }

            function prevLB() {
                const vis = getVisible();
                openLightbox((lbIndex - 1 + vis.length) % vis.length);
            }

            // Click on gallery items
            galleryItems.forEach(item => {
                item.addEventListener('click', () => {
                    const vis = getVisible();
                    const idx = vis.indexOf(item);
                    if (idx !== -1) openLightbox(idx);
                });
            });

            // Lightbox controls
            const btnClose = document.getElementById('aciLightboxClose'); if (btnClose) btnClose.addEventListener('click', closeLightbox);
            const btnPrev = document.getElementById('aciLightboxPrev'); if (btnPrev) btnPrev.addEventListener('click', (e) => { e.stopPropagation(); prevLB(); });
            const btnNext = document.getElementById('aciLightboxNext'); if (btnNext) btnNext.addEventListener('click', (e) => { e.stopPropagation(); nextLB(); });
            if (lightbox) lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (!lightbox || !lightbox.classList.contains('active')) return;
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowRight') nextLB();
                if (e.key === 'ArrowLeft') prevLB();
            });

            // Touch swipe support for lightbox
            let lbTouchX = 0;
            if (lightbox) lightbox.addEventListener('touchstart', (e) => { lbTouchX = e.changedTouches[0].screenX; }, { passive: true });
            if (lightbox) lightbox.addEventListener('touchend', (e) => {
                const diff = e.changedTouches[0].screenX - lbTouchX;
                if (Math.abs(diff) > 50) { diff < 0 ? nextLB() : prevLB(); }
            }, { passive: true });
        })();

        // --- OPTIMIZED SCROLL REVEAL TRIGGERS ---
        document.addEventListener("DOMContentLoaded", function () {

            // ── LAZY-LOAD OFFSCREEN ASSETS ──────────────────────────────
            document.querySelectorAll('.logo-marquee-item img, #aciGalleryGrid img').forEach(img => {
                img.setAttribute('loading', 'lazy');
            });

            // ── PROGRAMMATICALLY ADD REVEAL CLASSES ────────────────────────────────
            // Clients section heading
            const clientsHeading = document.querySelector('#our-clients .text-center');
            if (clientsHeading) clientsHeading.classList.add('reveal-on-scroll');

            // News / Events section heading + cards
            const newsHeading = document.querySelector('#project-area .text-center');
            if (newsHeading) newsHeading.classList.add('reveal-on-scroll');
            document.querySelectorAll('#project-area .aci-news-card').forEach((card, i) => {
                card.classList.add('reveal-on-scroll');
                if (i > 0) card.style.transitionDelay = Math.min(i * 0.08, 0.4) + 's';
            });

            // Our Story section — heading, narrative text, featured image, stat cards
            const storyHeading = document.querySelector('#our-story .text-center');
            if (storyHeading) storyHeading.classList.add('reveal-on-scroll');

            const storyGrid = document.querySelector('#our-story .grid.grid-cols-1.lg\\:grid-cols-2');
            if (storyGrid) {
                const textSide = storyGrid.children[0];
                const imageSide = storyGrid.children[1];
                if (textSide) textSide.classList.add('reveal-left');
                if (imageSide) imageSide.classList.add('reveal-right');
            }
            document.querySelectorAll('#our-story .aci-stat-card').forEach((card, i) => {
                card.classList.add('reveal-on-scroll');
                card.style.transitionDelay = (i * 0.1) + 's';
            });

            // Gallery section — filter bar + individual gallery items with stagger
            const filterWrap = document.querySelector('#aciGalleryFilters');
            if (filterWrap && filterWrap.parentElement) filterWrap.parentElement.classList.add('reveal-on-scroll');
            document.querySelectorAll('#aciGalleryGrid .aci-gallery-item').forEach((item, i) => {
                item.classList.add('reveal-on-scroll');
                item.style.transitionDelay = Math.min(i * 0.06, 0.5) + 's';
            });

            // ── INTERSECTION OBSERVER ──────────────────────────────────────────────
            const revealItems = document.querySelectorAll('.reveal-on-scroll, .reveal-left, .reveal-right');
            const observerOptions = {
                threshold: 0.05,
                rootMargin: '0px 0px -40px 0px'
            };
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        // Unobserve immediately after reveal to minimise future intersection calculations
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            revealItems.forEach(item => {
                revealObserver.observe(item);
            });
        });
    </script>


    <!-- Back to Top Button -->
    <a href="#" id="back-to-top" class="w-10 h-10 text-white flex items-center justify-center transition-colors"
        aria-label="Back to top"
        style="text-decoration: none; position: fixed; bottom: 20px; right: 20px; z-index: 999999999; opacity: 0; pointer-events: none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 15-6-6-6 6" />
        </svg>
    </a>

    @yield('scripts')
</body>

</html>