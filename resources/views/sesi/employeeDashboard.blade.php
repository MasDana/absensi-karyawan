@extends('layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/employeeDashboard.css') }}">
@endsection

@section('konten')

<header class="header">
    <div class="header-left">
        <h1>Sistem Manajemen Karyawan</h1>
    </div>
    <div class="header-right">
        <div class="profile">
            <img src="{{ asset('gambar/tara.png') }}" alt="Profile" class="profile-pic">
            <span>Nama</span>
        </div>

        <div class="logout">
        <form action="/sesi/logout" method="get">
            <button type="submit">Logout</button>
        </form>
        <div class="toggle-sidebar">
    <button id="toggleButton">
        <i class="fas fa-bars"></i> <!-- Ganti dengan ikon Font Awesome -->
    </button>
</div>
</header>

<!-- Main content -->
<div class="container">
    <!-- Sidebar -->
    <nav class="sidebar">
    <ul>
        <li class="sidebar-title">Report</li>
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>

        <li class="sidebar-title">Manage</li>
        <li><a href="#"><i class="fas fa-users"></i> Karyawan</a></li>
        <li><a href="#"><i class="fas fa-calendar-check"></i> Kehadiran</a></li>
        <li><a href="#"><i class="fas fa-briefcase"></i> Jabatan</a></li>
        <li><a href="#"><i class="fas fa-clock"></i> Shift</a></li>
    </ul>
</nav>

    
    <!-- Employee Dashboard -->
    <div class="dashboard">
    <main class="employee-dashboard">
    <h1>Dashboard Karyawan</h1> <!-- Tambahkan judul dashboard di sini -->
        <div class="card">
            <div class="image-section">
                <img src="{{ asset('gambar/profile1.jpg') }}" alt="Profile picture of I Putu Putri Kumala Sari">
            </div>
            <div class="text-section">
                <h2>I Putu Putri Kumala Sari</h1>
                <h3>Business Analyst Strategy Development</h2>
                <p>"The key to success in business analysis is the ability to accurately interpret data, understand needs, and turn opportunities into solid, sustainable strategies for business growth"</p>
            </div>
        </div>
    </main>

    <main class="main-dashboard">
        <div class="main-card">
            <i class="fas fa-chart-line"></i> 
            <h3>Pencapaian</h3>
        </div>
        <div class="card-dashboard">
            <i class="fas fa-briefcase"></i>
            <h3>Kinerja</h3>
        </div>
    </main>
</div>
</div>

@section('java')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
@endsection