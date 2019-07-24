@extends('layouts.app')
@section('title', ''.$siswa->nama_siswa)

@push('style')
@endpush

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data {{ $siswa->nama_siswa }} <small>Laporan</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="/images/{{ $siswa->foto_siswa }}" " alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h3>{{ $siswa->nama_siswa }}</h3>

                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i> Bandung, {{ date('d F Y', strtotime($siswa->tgl_lahir)) }}
                  </li>

                  <li>
                    <i class="fa fa-external-link user-profile-icon"></i> {{ $siswa->angkatan->th_angkatan }}
                  </li>
                  
                  <li class="m-top-xs">
                      <i class="fa fa-building user-profile-icon"></i> {{ $siswa->kelas->nama_kelas }}
                  </li>

                  <li class="m-top-xs">
                      <i class="fa fa-bank user-profile-icon"></i> Rp. {{ number_format($siswa->Angkatan->bayar_spp,2,',','.') }}
                  </li>
                </ul>

                <a class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                <br />
                {{-- Modal Edit --}}
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('Data.update',$siswa->id) }}" method="post" enctype="multipart/form-data">
                          @csrf @method('PUT')  
                          @include('siswa.modal')
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Send</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                        </form>
                    </div>

                  </div>
                </div>

                <!-- start skills -->
                <h4>Skills</h4>
                <ul class="list-unstyled user_data">
                  <li>
                    <p>Web Applications</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                    </div>
                  </li>
                  <li>
                    <p>Website Design</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                    </div>
                  </li>
                  <li>
                    <p>Automation & Testing</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                    </div>
                  </li>
                  <li>
                    <p>UI / UX</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                    </div>
                  </li>
                </ul>
                <!-- end of skills -->

              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="profile_title">
                  <div class="col-md-6">
                    <h2>Laporan {{$siswa->nama_siswa}}</h2>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>
                <!-- start of user-activity-graph -->
                
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                      <!-- start recent activity -->
                      <table class="table table-striped projects">
                          <thead>
                            <tr>
                              <th style="width: 1%">#</th>
                              <th style="width: 20%">Pembayaran Bulan</th>
                              <th style="width:15%">Bukti Transfer</th>
                              <th>Nominal</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          @php
                              $no=1;
                              @endphp
                          @forelse ($detail as $data)
                          <tbody>
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>
                                <a>{{ $data->bulan }}</a>
                                <br />
                                <small>Dibayar {{ date('d M Y', strtotime($data->tgl_bayar)) }}</small>
                              </td>
                              <td>
                                <ul class="list-inline">
                                  <li>
                                    <a href="/images/{{ $data->bukti_tf }}" target="_blank"><img src="/images/{{ $data->bukti_tf }}" class="avatar" alt="Avatar"></a>
                                  </li>
                                </ul>
                              </td>
                              <td class="project_progress">
                                Rp. {{ number_format($data->biaya,0,',','.') }}
                              </td>
                              <td>
                                <form action="{{ route('Siswa.update',$data->id) }}" method="post">@csrf @method('put')
                                    <button class="btn btn-success btn-xs" type="submit"><i class="fa fa-bank"></i></button>
                                </form>
                              </td>
                            </tr>
                            @empty
                              <center><span class="invalid-form-error-message"><strong>Data Kosong</strong></span></center>
                          </tbody>
                          @endforelse
                        </table>
                      <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                      <!-- start user projects -->
                      
                      <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">Nama Lengkap</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->nama_siswa }}</a></blockquote>
                      </div>
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">NIS</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->nis }}</a></blockquote>
                      </div>
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">Email</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->user->email }}</a></blockquote>
                      </div>
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">TTL</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->tempat_lahir }}, {{ date('d F Y', strtotime($siswa->tgl_lahir)) }}</a></blockquote>
                      </div>
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">Agama</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->agama }}</a></blockquote>
                      </div>
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">Jenis Kelamin</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->jenis_kelamin }}</a></blockquote>
                      </div>
                      <div class="message_wrapper" style="margin-left: 30px">
                        <h4 class="heading">Alamat</h4>
                        <blockquote class="message"><a style="font-size: 15px;"> {{ $siswa->alamat }}</a></blockquote>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@push('script')
@endpush