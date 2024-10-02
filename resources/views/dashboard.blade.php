@extends('layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
    </div>
    
        
        <div class="toggle-sidebar">
            <button id="toggleButton">☰</button> <!-- Tombol untuk membuka/menutup sidebar -->
        </div>
    </div>
</header>

<!-- Main content -->
<div class="container">
    <!-- Sidebar -->
    <nav class="sidebar">
        <ul>
            <li class="sidebar-title">Report</li>
            <li><a href="#">Beranda</a></li>
            <li class="sidebar-title">Manage</li>
            <li><a href="#">Karyawan</a></li>
            <li><a href="#">Kehadiran</a></li>
            <li><a href="#">Jabatan</a></li>
            <li><a href="#">Shift</a></li>
        </ul>
    </nav>

    <!-- Dashboard -->
    <main class="dashboard">
        <div class="card">
            <h2>Jumlah Karyawan</h2>
            <p>218</p>
        </div>
        <div class="card">
            <h2>TES</h2>
            <p>21</p>
        </div>
        <div class="card">
            <h2>TES</h2>
            <p>18</p>
        </div>

    </main>
</div>

@section('java')

<script src="{{ asset('js/dashboard.js  ') }}"></script>
    
@endsection
    
@endsection