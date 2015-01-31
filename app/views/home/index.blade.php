<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'nesti')</title>
    <!-- Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    {{ HTML::style('css/animate.min.css') }}
    <!-- Bootstrap -->
    {{ HTML::style('css/jquery.nouislider.min.css') }}
    {{ HTML::style('css/bootstrap.min.css') }}
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
    {{ HTML::style('css/style.css') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="home">
  <div class="container-fluid hero">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section">
            <ul>
<!--               <li><a href="">Blog</a></li>
              <li><a href="">City Tips</a></li> -->
              <li><a href="{{ route('signup.index') }}">List your nest</a></li>
              <li><a href="{{ route('users_search') }}">Find flatmates</a></li>
              @if(Auth::check())
                <li>
                    @if( Auth::user()->avatar )
                      <img src="{{ asset(Auth::user()->avatar) }}" class="avatar" alt="">
                    @else
                      <img src="{{ asset('assets/avatar@2x.png') }}" class="avatar" alt="">
                    @endif  
                  <a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                </li>
                <li><a href="{{ route('logout') }}">Sign Out</a></li>
              @else
                <li><a href="{{ route('login') }}" class="btn btn-default">Sign In</a></li>
              @endif
            </ul>
            <img src="{{ asset('assets/logobeta-white@2x.png') }}" class="logo">
            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <h1>Find rooms and flatmates in London</h1>
                <form action="{{ route('search') }}" method="get">
                      <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Where do you want to live?" id="nesti-search">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-default btn-lg" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                        </span>
                      </div>
                </form>
                <div class="row">
                  <div class="col-md-4">
                    <div class="stat">
                      5,500<br />
                      <span>Tenants Searching</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="stat">
                      10,500<br />
                      <span>Nests Available</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="stat">
                      Join<br />
                      <span>And find your nest</span>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>  
            <img src="{{ asset('assets/scroll@2x.png') }}" class="scroll" alt="" id="btn-scroll">    
          </div>
        </div>
    </div>
    </div>
  </div><!--/hero-section -->
  
  <div class="container-fluid services-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="intro">
            <h1>What is nesti?</h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at imperdiet mauris, quis dictum ipsum. Proin ornare at est sed ornare. Cras auctor est at ultrices laoreet. Vestibulum eu sapien vehicula, auctor nunc in, semper ligula. Mauris facilisis lorem sit amet tincidunt imperdiet.</p>
            <a href="{{ route('signup.index') }}" class="btn btn-primary btn-lg btn-signup">Sign Up</a>
          </div>
        </div>
      </div>
      <div class="row services">
        <div class="col-md-4">
          <div class="service">
            <img src="{{ asset('assets/discover-blue@2x.png') }}" alt="">
            <h2>Discover</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at imperdiet mauris, quis dictum ipsum.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <img src="{{ asset('assets/explore-blue@2x.png') }}" alt="">
            <h2>Explore</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at imperdiet mauris, quis dictum ipsum.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <img src="{{ asset('assets/connect-blue@2x.png') }}" alt="">
            <h2>Connect</h2>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at imperdiet mauris, quis dictum ipsum.</p>
          </div>
        </div>          
      </div>
    </div>
  </div><!--/services -->





  <div class="container-fluid featured-listings">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Featured listings</h2>
        </div>
      </div>

      <div class="row">
        @foreach($listings as $listing)
        <div class="col-md-4">
          <div class="listing-container">
            @if(Auth::check())
            <i class="fa {{ $listing->isBookmarked($listing->id) }} save-listing" data-listing-id="{{ $listing->id }}"></i>
            @else
              <a href="{{ route('signup.index') }}"><i class="fa fa-heart-o"></i></a>
            @endif            
            <a href="{{ route('listing.show', $listing->id) }}"><div class="photo-container" style="background-image: url({{ $listing->photos()->first()->url }});"></div></a>
            @if ($listing->user->avatar)
                    <a href="{{ route('user.show',$listing->user->id ) }}"><img src="{{ asset($listing->user->avatar) }}" class="avatar" alt=""></a>
                  @elseif (!$listing->user->avatar)
                    <img src="{{ asset('assets/avatar@2x.png') }}" class="avatar" alt="">
                  @endif  
                  <div class="description">
                    <p class="title">{{ str_limit($listing->title, 42, '...') }}</p>
                      <p><span class="rent">&pound;{{ $listing->rent }}<br /><span class="per-month">Per month</span></span></p>
                      <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{ $listing->borough->name }}<span class="glyphicon glyphicon-time" aria-hidden="true"></span><abbr class="timeago" title="{{ $listing->created_at }}"></abbr></p>
                  </div><!--/description-->
          </div><!--/listing-container-->       
        </div>
        @endforeach        
      </div>
    </div>
  </div><!--/featured-listings-->   

  
  <div class="container-fluid footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-container">
            <div class="socials">
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-instagram"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
            </div>
            <ul>
              <li>Copyright &copy; 2014 nesti</li>
              <li><a href="{{ route('page', 'about') }}">About</a></li>
              <li><a href="{{ route('page', 'terms-conditions') }}">Terms &amp; Conditions</a></li>
              <li><a href="{{ route('page', 'privacy-policy') }}">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!--/footer-->   


@section('scripts')
<script>
  $(function(){
    $('#nesti-search').geocomplete();
    $("#btn-scroll").hover(function(){
      $("#btn-scroll").toggleClass('animated bounce');
    })
    
    $(".service").addClass('animated fadeInRight');
    $(".intro").addClass('animated fadeInLeft');

    $(".stat").addClass('animated fadeInDown');

    //Jquery timeago
    $("abbr.timeago").timeago();

    // Save listing
    $(".save-listing").click(function(){

      var listing_id = $(this).attr('data-listing-id');

      if($(this).hasClass('fa-heart-o')){
        $(this).removeClass('fa-heart-o');
        $(this).addClass('fa-heart');

        // Add listing to favourites
        $.post("{{ route('bookmark.store') }}", { listing_id: listing_id  } );



      }
      else{
          $(this).removeClass('fa-heart');
          $(this).addClass('fa-heart-o');

           // Remove listing from favourites
           $.post("{{ route('bookmark.destroy') }}", { listing_id: listing_id, _method: 'DELETE'  } );
      }
    });




  });
</script>
@stop


@include('partials.footer')















