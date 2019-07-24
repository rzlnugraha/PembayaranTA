<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>

      @if (Auth::user())
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#">Dashboard</a></li>
          </ul>
        </li>
      @endif
      @if (Auth::user()->role == 'admin')
        <li><a><i class="fa fa-user"></i> Data<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('dataangkatan') }}">Data Angkatan</a></li>
            <li><a href="{{ url('datasiswa') }}">Data Siswa</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-desktop"></i> History Pembayaran <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('data_bayar') }}">Data Pembayaran</a></li>
            <li><a href="{{ url('historypembayaran') }}">History Pembayaran</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Data Warga Sekolah <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('Kepsek.index') }}">User</a></li>
          </ul>
        </li>
      @endif
      @if (Auth::user()->role == 'siswa')
      <li><a><i class="fa fa-pencil"></i> Data<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('Siswa.index')}}">Pembayaran</a></li>
          <li><a href="">History Pembayaran</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::user()->role == 'bendahara')
      <li><a><i class="fa fa-bank"></i> Data Pengajuan<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('Bendahara.index') }}">Pengajuan Biaya SPP</a></li>
        </ul>
      </li>
      @endif
      </ul>
  </div>
</div>
<!-- /sidebar menu -->