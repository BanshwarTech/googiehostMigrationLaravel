 <!-- top header -->

 <div class="top-bar">
     <div class="top-bar-text">Unlimited Hosting, Unmatched Performance <div class="btn">
             <a href="https://googiehost.com/blog/go/interserver/" target="_blank">Start at $0.01 Now</a>
         </div>
     </div>

 </div>



 <header class="header p-2">
     <nav class="navbar navbar-expand-lg navbar-dark">
         <div class="container ps-0 pe-0">
             <a class="navbar-brand header-logo" href="{{ route('home') }}">
                 <img src="{{ asset('images/logo.png') }}" alt="Googiehost" width="250">
             </a>
             <!-- Offcanvas Trigger Button -->
             <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas"
                 aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="fa-solid fa-bars"></i> <!-- Mobile menu icon -->
             </button>
             <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="navbarOffcanvas"
                 aria-labelledby="navbarOffcanvasLabel">
                 <div class="offcanvas-header">
                     <h5 class="offcanvas-title text-white" id="navbarOffcanvasLabel">Menu</h5>
                     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                         aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                             <a class="nav-link text-white" href="{{ route('freehosting') }}">Free Hosting</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link text-white" href="{{ route('web.hosting.sale.coupons') }}">Paid
                                 Hosting <span class="badge">Save 90%*</span></a>
                         </li>

                         <li class="nav-item dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                             <a class="nav-link text-white" href="#" id="serversDropdown" role="button"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Servers <i class="fa-solid fa-angle-down  dropdown-icon"></i>
                             </a>
                             <div class="dropdown-menu rounded" aria-labelledby="serversDropdown" id="serversDropdown">
                                 <a class="dropdown-item" href="/googiehost/cheap-vps-hosting.php">VPS Hosting</a>
                                 <a class="dropdown-item" href="/googiehost/cheap-dedicated-server.php">Dedicated
                                     Servers</a>
                             </div>
                         </li>

                         <li class="nav-item dropdown" onmouseover="showDropdown(this)" onmouseout="hideDropdown(this)">
                             <a class="nav-link  text-white" href="#" id="reviewsDropdown" role="button"
                                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Reviews <i class="fa-solid fa-angle-down dropdown-icon"></i>
                             </a>


                             <div class=" dropdown-menu dropdown-menu-left p-3 rounded"
                                 aria-labelledby="reviewsDropdown" id="reviewsDropdown">
                                 <div class="row">
                                     <div class="col-md-4">
                                         <h5 class="dropdown-header">
                                             <i class="fa fa-wordpress"></i> Hosting
                                         </h5>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/youstable-review/">YouStable</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/interserver-review/">InterServer</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/a2-hosting-review/">A2 Hosting</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/ultahost-review/">UltaHost</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/kamatera-review/">Kamatera</a>
                                         <a class="btn  btn-block mt-2"
                                             href="https://googiehost.com/blog/hosting-reviews/">VIEW BEST HOSTS →</a>
                                     </div>
                                     <div class="col-md-4">
                                         <h5 class="dropdown-header">
                                             <i class="fa fa-bolt"></i> VPN
                                         </h5>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/nordvpn-review/">NordVPN</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/ivacy-vpn-review/">IvacyVPN</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/go/expressvpn/">ExpressVPN</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/go/ipvanish/">IPVanish</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/go/hotspotshield/">HotSpotShield</a>
                                         <a class="btn btn-block mt-2" href="https://googiehost.com/blog/vpn">VIEW
                                             MORE VPN →</a>
                                     </div>
                                     <div class="col-md-4">
                                         <h5 class="dropdown-header">
                                             <i class="fa fa-rss"></i> SEO/Blogging
                                         </h5>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/best-email-marketing-software-tools/">Email
                                             Marketing Tools</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/best-live-chat-software/">Top LiveChat
                                             Apps</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/best-blogging-tools/">Best Blogging
                                             Tools</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/tutorials/">Blogging Tutorials</a>
                                         <a class="dropdown-item"
                                             href="https://googiehost.com/blog/top-5-wordpress-plugins/">Top WordPress
                                             Plugins</a>
                                         <a class="btn btn-block mt-2"
                                             href="https://googiehost.com/blog/blogging/">VIEW MORE TOOLS →</a>
                                     </div>
                                 </div>
                             </div>
                         </li>

                         <li class="nav-item dropdown me-lg-2">
                             <a class=" btn nav-link SignInUp" href="https://client.googiehost.com/clientarea.php"
                                 id="loginDropdown" role="button">Sign In</a>
                         </li>
                         <li class="nav-item dropdown">
                             <a class=" btn nav-link SignUp" href="https://googiehost.com/signup.php"
                                 id="loginDropdown" role="button">Sign Up</a>
                         </li>

                     </ul>
                 </div>
             </div>
         </div>
     </nav>
 </header>
