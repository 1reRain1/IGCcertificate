<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>I.G.C.C</title>
    <link rel="icon" type="image/x-icon" href="/assets/logo.png" />
    <link rel="stylesheet" href="css/main.css" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>

<body>
  <header>
    <div class="container">
      <a class="logo" href="/"
        ><img src="./assets/logo.png" alt=""
      /></a>
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
        <li><a href="/#WhyUs">Why Us</a></li>
        <li><a href="/#howWorks">How it works</a></li>
      </ul>
      <div class="buttons">
         <a href="RequestCertificate"> <button class="btn purpleGradient"> Apply Now </button></a>
      </div>
      <div id="open__items-btn" class="active">
        <span>|</span>
        <span>|</span>
        <span>|</span>
      </div>
    </div>
  </header>
  <section class="certificate">
    <div class="container">
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
            <span class="file-selector"> choose file  </span>
            <span class="hideInMobile"> to upload (pdf - less than 2 mb)</span>
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
        <div class="up">
          <div class="accounts">
        <a href="https://www.facebook.com/profile.php?id=61554657521065&mibextid=PlNXYD"><img src="assets/facebook.png"
            alt="" /></a>
        <a href=""><img src="assets/email.png" alt="" /></a>
          </div>
          <div class="logo">
            <a class="logo" href="./index.html"
              ><img src="assets/logo.png" alt=""
            /></a>
          </div>
          <a class="contactUs" href="">Contact Us</a>
        </div>
        <div class="down">
          <p>Copyright &copy; 2023 igccenter.</p>
          <div class="links">
            <a href="">TERMS & conditions</a>
            <a href="">privacy policy </a>
            <a href="">FAQ</a>
          </div>
        </div>
      </div>
    </footer>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/form.js') }}"></script>
</body>

</html>