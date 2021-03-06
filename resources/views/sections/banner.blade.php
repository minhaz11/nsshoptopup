  <!--===Banner===-->
  <section class="banner-slider owl-theme owl-carousel">
      @foreach ($banners as $banner)

      @php
          if($banner->image == ''){
            $image = asset('public/assets/admin/img/banner/banner2.jpg');
          } else {
            $image = asset('public/assets/admin/img/banner/'.$banner->image);
          }
      @endphp


      <div class="banner-item bg_img" data-background="{{ $image }}">
          <div class="container">
              <div class="banner-area">
                  <div class="banner-content">
                      <h3 class="title">
                          <a href="{{ $banner->link }}">{{ $banner->heading }}</a>
                      </h3>
                      <p>
                          {{ $banner->short_details }}
                      </p>
                  </div>
                  <a href="{{ $banner->link }}" class="custom-button mt-4">Read More</a>
              </div>
          </div>
      </div>
      @endforeach

</section>
<!--===Banner===-->
