@extends('layouts.app')
@section('content')
<div class="container bg-white pt-5 pb-5">
    <h1 class="mb-5 mt-3 text-center" style="color: #15b915">Profil  Teknik Informatika UBY</h1>
    <div class="d-flex justify-content-center">
        <div class="col-sm-4"><img src="{{ url('images/uby.png') }}" alt=""></div>
    </div>
    <table class="d-flex justify-content-center mt-3 mb-3">
        <tr>
            <td><b>Nama Fakultas</b></td>
            <td>:</td>
            <td>Ilmu Komputer</td>
        </tr>
        <tr>
            <td><b>Nama Prodi</b></td>
            <td>:</td>
            <td>Teknik Informatika</td>
        </tr>
        <tr>
            <td><b>Pertama Kali Operasional</b></td>
            <td>:</td>
            <td>Maret 2007</td>
        </tr>
        <tr>
            <td><b>Gelar Lulusan</b></td>
            <td>:</td>
            <td>Sarjana Komputer [S.Kom]</td>
        </tr>
    </table>
 
    
    <div>
        <b>Visi</b>
        <ul>
            <li>“Menjadi  program studi yang unggul di bidang teknik informatika berbasis pengembangan potensi lokal se Solo Raya  pada tahun 2022”</li>
        </ul>
     </div>
    <div>
        <b>Misi</b>
        <ul>
            <li>Menyelenggarakan pendidikan di bidang Teknik Informatika yang inovatif, kreatif, berjiwa wirausaha, dan berkepribadian.</li>
            <li>Mengembangkan penelitian di bidang Teknik Informatika untuk menggali dan mengembangkan potensi lokal guna kesejahteraan masyarakat dengan keunggulan kompetitif</li>
            <li>Menyelenggarakan pengabdian kepada masyarakat dengan penerapan Teknik Informatika guna peningkatan daya saing masyarakat</li>
            <li>Menyelenggarakan kerjasama dan membangun jejaring untuk keberlanjutan dalam mengembangkan potensi lokal dan peningkatan kualitas pendidikan</li>
        </ul>
     </div>
    <div>
        Program Studi Teknik Informatika UBY didirikan dengan tujuan untuk menghasilkan sarjana teknik informatika yang mampu merencanakan, merancang, dan mengimplementasikan suatu sistem terpadu untuk menyelesaikan persoalan teknologi informasi di berbagai bidang seperti pendidikan, perbankan, telekomunikasi, manufaktur, atau industri lainnya.
        Dengan Kurikulum Berbasis Kompetensi yang selalu mengikuti perkembangan, Program Studi Teknik Informatika UBY menerapkan model pembelajaran yang lebih kreatif dan inovatif dengan penyediaan kerjasama dengan vendor terkemuka seperti Oracle,  ICSE, Red Hat, Mikrotik, dan Microsoft; model pembelajaran yang lebih kreatif dan inovatif. Program Studi Teknik Informatika UBY berhasil menduduki peringkat baik berdasarkan penilaian dari Badan Akreditasi Nasional (SK No. 0602/SK/BAN-PT/Akred/S/V/2016)
        Program Studi Teknik Informatika UBY menerapkan model pembelajaran yang lebih kreatif dan inovatif dengan penyediaan materi pelajaran yang dapat diakses dari mana saja dan kapan saja serta menyajikannya dalam bentuk multimedia.
        Untuk memperkaya kurikulum, kerjasama dengan :
        <ul class="mt-2 mb-2">
            <li>Mikrotik (Program Mikrotik Academy dan penggunaan materi dari Mikrotik dalam perkuliahan)</li>
            <li>Red Hat (Pengembangan perangkat lunak dan konten Open Source)</li>
            <li>Oracle Indonesia (Program Oracle WDP dan penggunaan materi dari Oracle dalam perkuliahan)</li>
        </ul>
        Dengan kerjasama tersebut mahasiswa informatika tidak hanya lulus dengan ijazah saja tetapi juga mempunyai sertifikat bertaraf internasional.
    
    </div>
      {{-- partner --}}
      <div class="row mt-5">
        <h2 class="text-center mb-3" style="color: #15b915">Partner Kami</h2>
                      <div class="col-md-3 mb-3">
                              <div class="card rounded  shadow" style=" border:solid 3px #15b915;">
                                  <a href="" class="text-decoration-none text-dark font-weight-bold"><img src="{{ url('images/co.jpg') }}" class="card-img-top" alt="..."></a>
                                  <div class="card-body">
                                    <h5 class="card-title text-center"><a href="" class="text-decoration-none text-dark font-weight-bold">Partner</a></h5>
                                  </div>
                              </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <div class="card rounded  shadow" style=" border:solid 3px #15b915;">
                            <a href="" class="text-decoration-none text-dark font-weight-bold"><img src="{{ url('images/co.jpg') }}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                              <h5 class="card-title text-center"><a href="" class="text-decoration-none text-dark font-weight-bold">Partner</a></h5>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <div class="card rounded  shadow" style=" border:solid 3px #15b915;">
                            <a href="" class="text-decoration-none text-dark font-weight-bold"><img src="{{ url('images/co.jpg') }}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                              <h5 class="card-title text-center"><a href="" class="text-decoration-none text-dark font-weight-bold">Partner</a></h5>
                            </div>
                        </div>
                </div>
                <div class="col-md-3 mb-3">
                  <div class="card rounded  shadow" style=" border:solid 3px #15b915;">
                      <a href="" class="text-decoration-none text-dark font-weight-bold"><img src="{{ url('images/co.jpg') }}" class="card-img-top" alt="..."></a>
                      <div class="card-body">
                        <h5 class="card-title text-center"><a href="" class="text-decoration-none text-dark font-weight-bold">Partner</a></h5>
                      </div>
                  </div>
                </div>

      </div>
      {{-- end partner --}}
</div>   
@endsection