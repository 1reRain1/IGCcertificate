<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>I.G.C.C</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  <link rel="icon" type="image/x-icon" href="/assets/logo.png" />
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <header>
    <div class="container">
      <a class="logo" href="/"><img src="assets/logo.png" alt="logo" /></a>
      <ul id="nav__items" class="nav__items">
        <button class="close__items-btn showInMoblie">
          <svg
            width="15"
            height="14"
            viewBox="0 0 15 14"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect
              width="18.3049"
              height="2.03388"
              rx="1.01694"
              transform="matrix(0.7375 0.675348 -0.7375 0.675348 1.5 0)"
              fill="black"
            />
            <rect
              width="18.3049"
              height="2.03388"
              rx="1.01694"
              transform="matrix(0.7375 -0.675348 0.7375 0.675348 0 12.6265)"
              fill="black"
            />
          </svg>
        </button>
        <a class="logo showInMoblie" href="/"
          ><img src="./assets/logo.png" alt=""
        /></a>
        <li><a href="/">Home</a></li>
        <li><a href="#WhyUs">Why Us</a></li>
        <li><a href="#howWorks">How it works</a></li>
      {{-- <div class="buttons">
        <button class="btn purpleGradient"><a href="RequestCertificate">Apply Now</a></button>
      </div> --}}
      <form action="RequestCertificate">
        <button class="btn purpleGradient" type="submit">Apply Now</button>
      </form>
      <div id="open__items-btn" class="active">
        <span>|</span>
        <span>|</span>
      </div>
    </div>
  </header>
  <section class="landingPage" >
    <div class="container">
      <h1>
        international general <span>certification</span> center
        <img src="assets/svgIcons/landingPage.svg" alt="" />
      </h1>
      <p>
        unlock new opportunities with our certificate , show off your skill
        and expertise to the world.
      </p>
      <button class="btn purpleGradient">
        <a href="RequestCertificate">create your certificate</a>
      </button>
      <div class="landingPage__images">
        <img src="./assets/1.svg" data-number="1" />
        <img src="./assets/2.svg" data-number="2" />
        <img src="./assets/3.svg" data-number="3" />
      </div>
    </div>
  </section>
  <section class="whyUs" id="WhyUs">
    <div class="container">
      <div class="image">
        <img src="./assets/section2.png" alt="" />
      </div>
      <div class="content">
        <h1>why choose our certififcate?</h1>
        <p>
          Elevate your career with IGC – swift certification, instant
          recognition. Our seamless process propels your skills forward.
        </p>
        <ul>
          <li>open to all</li>
          <li>trustworthy</li>
          <li>Real Appreciation</li>
        </ul>
      </div>
    </div>
  </section>
  <section id="howWorks" class="howWorks">
    <div class="container">
      <h2 class="h2title">
        How it works?
        <img src="./assets/svgIcons/howItWorks.svg" alt="" />
      </h2>
      <p class="ptitle">
        Follow this simple steps to obtain your certificate :
      </p>
      <div class="steps">
        <div class="step">
          <span>1</span>
          <h3>apply</h3>
          <p>fill out the form with your details and skills</p>
        </div>
        <div class="step">
          <span>2</span>
          <h3>submit</h3>
          <p>
            provide your cv to help us better understand your qualifications .
          </p>
        </div>
        <div class="step">
          <span>3</span>
          <h3>review</h3>
          <p>our team will asess your application and skills.</p>
        </div>
        <div class="step">
          <span>4</span>
          <h3>receive</h3>
          <p>if approved, you will recieve your certificate via email.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="certificate">
    <div href="{{'RequestCertificate'}}" class="container">
      <h2 class="h2title">Create your certificate</h2>
      <p class="ptitle">
        Ready to showcase your skills and unlock new opportunities? Fill out
        the form below to start your certificate journey.
      </p>
      @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      
      @if (session('confirmed'))
      <div class="alert alert-success" role="alert">
        {{ session('confirmed') }}
      </div>
      @endif

      @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
      @endif

      <!-- If there are any validation errors -->
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{route('RequestStore')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Personal Inforamtion</h3>
        <label for="name">Full Name</label>
        <input type="text" name="FullName" id="FullName" placeholder="Your Full Name" required />
        <label for="">Place of Birth</label>
        <input type="text" name="PlaceOfBirth" id="PlaceOfBirth" placeholder="Algeria Algeries" required />
        <label for="">Date of Birth</label>
        <input type="date" name="DateOfBirth" id="DateOfBirth" placeholder="name" required />

        <h3>Contact Inforamiton</h3>
        <label for="">Email</label>
        <input type="email" name="Email" id="name" placeholder="example@example.com" required />
        @if ($errors->has('email'))
    <span class="error">{{ $errors->first('email') }}</span>
        @endif
        <label for="">Phone Number</label>
        <input type="text" name="PhoneNumber" id="PhoneNumber" placeholder="+213796091539" required />
        <h3>Certificate Information</h3>
        <label for="">Skill Name</label>
        <input type="text" name="SkillName" id="SkillName" placeholder="UI & UX Design" required />
        <label for="">Upload CV</label>
        <div class="drop-section">
          <div class="col">
            <div class="cloud-icon">
              <img src="assets/upload_1-512-1744225666.png" alt="" />
            </div>
            <span class="hideInMobile">drag & drop or </span>
            <span class="file-selector"> choose file </span>
            <span class="hideInMobile"> to upload</span>
            <input type="file" name="CV" class="file-selector-input" multiple required />
          </div>
          <div class="col">
            <div class="drop-here">Drop Here</div>
          </div>
        </div>

        <div class="list-section">
          <div class="list-title">Uploaded Files</div>
          <div class="list"></div>
        </div>
        <input type="submit" class="submit btn purpleGradient" value="place request" />
      </form>
    </div>
  </section>
  <footer >
    <div class="container">
      <div class="accounts">
        <a href="https://www.facebook.com/profile.php?id=61554657521065&mibextid=PlNXYD"><img src="assets/facebook.png"
            alt="" /></a>
        <a href=""><img src="assets/telegram.png" alt="" /></a>
      </div>
      <div class="logo">
        <a class="logo" href="/"><img src="assets/logo.png" alt="" /></a>
      </div>
      <a class="contactUs"  href="">Contact Us</a>
    </div> 
  </footer>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/form.js') }}"></script>
</body>

</html>