@extends('layouts.app')
@section('content')
<div class="container">
    {{-- sliider --}}
    <div class="row" >
        <div class="col mt-3 mb-4">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @if($slidders->count())
                        <img src="{{ asset('storage/'.$slidders[0]->image_slidder) }}" class="d-block w-100" alt="...">
                        @endif
                    </div>
                    @foreach ($slidders->skip(1) as $slidder)
                    <div class="carousel-item">
                        <img src="{{ asset('storage/'.$slidder->image_slidder) }}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    {{-- endslidder --}}
    {{-- info utama --}}
    <div class="row mt-5 rounded shadow" style="background:#ffffff;">
        <h2 class="text-center mt-3 mb-3" style="color: #3ee728">Info Utama</h2>

        @foreach ($infos as $info)
        <div class="col-md-3 mb-3">
            <div class="card rounded card rounded  shadow" style="background:#ffffff;
                border:solid 4px  #3ee728;
                border-radius:5px; ">
                <img src="{{ asset('storage/'. $info->image_info) }}" class="card-img-top p-2"
                    style="border-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #3ee728;">{{ $info->title}}</h5>
                    <p class="card-text">{{ $info->short }}</p>
                    <a href="/info/{{ $info->slug}}" class="btn" style="background: #3ee728;; color:white; 
                      border-bottom:solid 4px #15b915;
                      border-right:solid 4px #15b915;" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='white'">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- end info utama --}}
    {{-- berita --}}
    <div class="row mt-5 rounded shadow" style="background:#ffffff;">
        <h2 class="text-center mt-3 mb-3" style="color: #ebdd1e;">Kabar Terkini</h2>
        @foreach ($posts as $post)
        <div class="col-md-3 mb-3" data-aos="zoom-in" data-aos-duration="2000" data-aos-easing="ease-out-cubic">
            <div class="card rounded card rounded  shadow" style="background:#ffffff;
            border:solid 4px #ebdd1e;
            border-radius:5px; ">
                <img src="{{ asset('storage/'. $post->image_post) }}" class="card-img-top p-2"
                    style="border-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #ebdd1e;">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->slug }}</p>
                    <a href="/posts/{{ $post->slug}}" class="btn" style="background: #ebdd1e; color:white; 
                  border-bottom:solid 4px #c5ba1c;
                  border-right:solid 4px #c5ba1c;" onMouseOver="this.style.color='green'"
                        onMouseOut="this.style.color='white'">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
        <a href="/posts" class="btn mb-3" style="background: #ebdd1e; color:white; 
          border-bottom:solid 4px #c5ba1c;
          border-right:solid 4px #c5ba1c;" onMouseOver="this.style.color='green'"
                onMouseOut="this.style.color='white'">Kabar Terlengkap</a>
                
    </div>
    {{-- end berita --}}
    {{-- partner --}}
    <div class="row rounded mt-5 shadow" style="background:#ffffff; ">
        <h2 class="text-center mt-3 mb-3" style="color: #3ee728;">Partner Kami</h2>

        @foreach ($partners as $partner)
        <div class="col-md-3 mb-3">
            <div class="card rounded  shadow" style=" border:solid 3px #3ee728;">
                <a href="" class="text-decoration-none text-dark font-weight-bold"><img
                        src="{{ asset('storage/'.$partner->image_partner) }}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #3ee728;" >{{ $partner->name }}</h5>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    {{-- end partner --}}

</div>
@endsection
