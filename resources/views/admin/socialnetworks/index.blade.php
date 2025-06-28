@extends('tablar::page')
@section('title', 'datospersonals/create')
@section('content_header')
    <h1></h1>
@endsection
@section('content')
<div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        {{-- imagen uno facebook--}}
        <div class="col-sm-6 col-lg-4">
          <div class="card card-sm">
            <a href="https://www.facebook.com/partidobatallaperu" class="d-block"><img src="http://127.0.0.1:8000/assets/avatars/facebook1.png" class="card-img-top"></a>
            <div class="card-body">
                <div class="d-flex align-items-center">
                {{-- imagen de facebook --}}
                    <span class="bg-facebook text-white avatar me-3 rounded">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                        </svg>
                    </span>
                {{-- FIN DE IMAGEN  --}}
                    <div>
                        <div> Batalla Perú</div>
                        <div class="text-secondary">3 days ago</div>
                    </div>
                {{-- datos de vista --}}
                    <div class="ms-auto">
                        <div>
                            <a class="x1i10hfl xjbqb8w x1ejq31n xd10rxx x1sy0etr x17r0tee x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xi81zsa x1s688f" 
                            href="https://www.facebook.com/partidobatallaperu/friends_likes/" 
                            role="link" tabindex="0">3,7&nbsp;mil Me gusta
                            </a>
                        </div>
                        <div>
                            <a class="x1i10hfl xjbqb8w x1ejq31n xd10rxx x1sy0etr x17r0tee x972fbf xcfux6l x1qhh985 xm0m39n x9f619 x1ypdohk xt0psk2 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xi81zsa x1s688f" 
                            href="https://www.facebook.com/partidobatallaperu/followers/" 
                            role="link" tabindex="0">15&nbsp;mil seguidores
                            </a>
                        </div>
                    </div>
                    {{-- fin de datos de vista --}}
                </div>
                {{-- fin de datos de vista --}}
            </div>
          </div>
        </div>
        {{-- fin de imagen uno --}}

        {{-- imagen dos tiktok--}}
        <div class="col-sm-6 col-lg-4">
          <div class="card card-sm">
            <a href="https://www.tiktok.com/search?q=batalla%20peru%20tiktok&t=1743182476431" class="d-block">
                <img src="http://127.0.0.1:8000/assets/avatars/tiktok3.png" class="card-img-top"></a>
            <div class="card-body">
                <div class="d-flex align-items-center">
                {{-- imagen de tiktok --}}
                    <span class="bg-facebook text-white avatar me-3 rounded">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  
                            fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  
                            stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-tiktok">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z" />
                        </svg>
                    </span>
                {{-- FIN DE IMAGEN  --}}
                    <div>
                        <div> Batalla Perú</div>
                        <div class="text-secondary">now</div>
                    </div>
                {{-- datos de vista --}}
                    <div class="ms-auto">
                        <div class="css-1ldzp5s-DivNumber e1457k4r1">
                            <strong title="Siguiendo" data-e2e="following-count">4035</strong>
                            <span data-e2e="following" class="css-1hig5p0-SpanUnit e1457k4r2">Siguiendo</span>
                        </div>
                        <div class="css-1ldzp5s-DivNumber e1457k4r1">
                            <strong title="Seguidores" data-e2e="followers-count">7966</strong>
                            <span data-e2e="followers" class="css-1hig5p0-SpanUnit e1457k4r2">Seguidores</span>
                        </div>
                    </div>
                    {{-- fin de datos de vista --}}
                </div>
                {{-- fin de datos de vista --}}
            </div>
          </div>
        </div>
        {{-- fin de imgaen dos --}}

        {{-- imagen tres x--}}
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
              <a href="https://x.com/BatallaPer44439" class="d-block"><img src="http://127.0.0.1:8000/assets/avatars/x2.png" class="card-img-top"></a>
              <div class="card-body">
                  <div class="d-flex align-items-center">
                  {{-- imagen de tiktok --}}
                      <span class="bg-facebook text-white avatar me-3 rounded">
                          <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M18 6l-12 12" /><path d="M6 6l12 12" />
                        </svg>
                      </span>
                  {{-- FIN DE IMAGEN  --}}
                      <div>
                          <div> Batalla Perú</div>
                          <div class="text-secondary">2 day ago</div>
                      </div>
                  {{-- datos de vista --}}
                      <div class="ms-auto">
                        <div class="css-175oi2r r-1rtiivn">
                            <a href="/BatallaPer44439/following" dir="ltr" role="link" class="css-146c3p1 r-bcqeeo r-1ttztb7 r-qvutc0 r-37j5jr r-a023e6 r-rjixqe r-16dba41 r-1loqt21" style="color: rgb(231, 233, 234);">
                                <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1b43r93 r-1cwl3u0 r-b88u0q" style="color: rgb(10, 11, 11);">
                                    <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3">75</span></span> 
                                    <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1b43r93 r-1cwl3u0" style="color: rgb(8, 8, 8);">
                                        <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3">Following</span></span>
                            </a>
                        </div>
                        <div class="css-175oi2r">
                            <a href="/BatallaPer44439/verified_followers" dir="ltr" role="link" class="css-146c3p1 r-bcqeeo r-1ttztb7 r-qvutc0 r-37j5jr r-a023e6 r-rjixqe r-16dba41 r-1loqt21" style="color: rgb(231, 233, 234);">
                                <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1b43r93 r-1cwl3u0 r-b88u0q" style="color: rgb(10, 10, 10);">
                                    <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3">10</span></span> 
                                    <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1b43r93 r-1cwl3u0" style="color: rgb(19, 19, 20);">
                                        <span class="css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3">Followers</span></span>
                            </a>
                        </div>
                      </div>
                      {{-- fin de datos de vista --}}
                  </div>
                  {{-- fin de datos de vista --}}
              </div>
            </div>
        </div>
        {{-- fin de imagen tres --}}

        {{-- iamgen cuatro youtube--}}
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
              <a href="https://www.youtube.com/@BatallaPer%C3%BA" class="d-block"><img src="http://127.0.0.1:8000/assets/avatars/youtube1.png" class="card-img-top"></a>
              <div class="card-body">
                  <div class="d-flex align-items-center">
                  {{-- imagen de tiktok --}}
                      <span class="bg-facebook text-white avatar me-3 rounded">
                          <!-- Download SVG icon from http://tabler.io/icons/icon/brand-facebook -->
                        <svg  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                            <path d="M10 9l5 3l-5 3z" />
                        </svg>
                      </span>
                  {{-- FIN DE IMAGEN  --}}
                      <div>
                          <div> Batalla Perú</div>
                          <div class="text-secondary">1 day ago</div>
                      </div>
                  {{-- datos de vista --}}
                      <div class="ms-auto">
                        <div class="css-175oi2r r-1rtiivn">
                            <span class="yt-core-attributed-string yt-content-metadata-view-model-wiz__metadata-text yt-core-attributed-string--white-space-pre-wrap yt-core-attributed-string--link-inherit-color" dir="auto" role="text">10 suscriptores</span>
                        </div>
                        <div class="css-175oi2r">
                            <span class="yt-core-attributed-string yt-content-metadata-view-model-wiz__metadata-text yt-core-attributed-string--white-space-pre-wrap yt-core-attributed-string--link-inherit-color" dir="auto" role="text"><span class="" dir="auto" style="">20 videos</span></span>
                        </div>
                      </div>
                      {{-- fin de datos de vista --}}
                  </div>
                  {{-- fin de datos de vista --}}
              </div>
            </div>
        </div>
        {{-- fin de imagen cuatro --}}
        
    </div>
    {{-- paginación --}}
        <div class="d-flex mt-5">
        <ul class="pagination ms-auto">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
              <!-- Download SVG icon from http://tabler.io/icons/icon/chevron-left -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                <path d="M15 6l-6 6l6 6"></path>
              </svg>
              prev
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#">
              next
              <!-- Download SVG icon from http://tabler.io/icons/icon/chevron-right -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                <path d="M9 6l6 6l-6 6"></path>
              </svg>
            </a>
          </li>
        </ul>
        </div>
    {{-- termino de paginacion --}}
    </div>

</div>
@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    <script></script>
@endsection