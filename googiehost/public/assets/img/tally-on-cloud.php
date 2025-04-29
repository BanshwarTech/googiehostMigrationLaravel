<?php
$page = 'tally-on-cloud';
include('inc/header.php');
?>

<style>
  button.nav-link.teb-bg-purple {
    padding: 20px 15px;
  }

  .forex-video {
    background: #FAF9FF;

  }

  .forex-app-installer-icon {
    width: 50%;
    margin: auto;
  }

  button.nav-link.active.installer-button {
    padding: 18px !important;
  }

  button.nav-link.installer-button {
    padding: 10px;
  }

  .installer-banner {
    border: 0px !important;
  }

  .installer-banner-con {
    width: 75%;
    margin: auto;
    border: 1px solid #E38601;
    background: #FFFDF6;
    border-radius: 18px;
    padding: 18px
  }

  ul.banner-list.list-unstyled img {
    width: 10%;
  }

  .tally-features {
    background-color: #FFF9E4;
  }

  @media(min-width:991px) {
    .server-title {
      width: 75%;
      margin: auto;
    }
  }

  p.hosting-price {

    margin: 8px 0 0 0;

  }

  .wid-more {
    padding: 4px;
  }

  .bg-light-yellow {
    padding: 15px;
  }

  .second-child {
    background-color: #ffffff;
  }

  .usa-host-price {
    display: none;
  }

  .fa-check {
    margin-top: 4px;
    width: 20px;
    margin-right: 8px;
    font-size: 23px;
    color: #656161;
  }
</style>


<section class="banner-sec share-bg">
  <div class=" container">
    <div class="row align-items-center reverse-column">
      <div class="col-md-6">
        <div class="banner-left-content margin-top dedicated-margin">
          <p class="experience">Tally on Cloud</p>
          <h1 class="Banner-Heading padding-heading robust">India's #1 Tally on Cloud Hosting</h1>
          <p class="Banner-title p-0">Access Tally anytime, anywhere with Tally on Cloud. Secure, fast, and hassle-free accounting solution!
          </p>
          <div class="d-flex gap-3 lists-hosting">
            <ul class="banner-list list-unstyled">
              <li class="purple-text_dark mb-3 color-black-1"><img
                  src="assets/img/newImages/anywhere-access.svg" alt="tick" class="tick-square img-fluid">Anywhere Access</li>
              <li class="purple-text_dark color-black-1"><img src="assets/img/managed-security-modules.svg" alt="tick"
                  class="tick-square img-fluid">Enhanced Security</li>
            </ul>
            <ul class="banner-list list-unstyled">
              <li class="purple-text_dark mb-3 color-black-1"><img src="assets/img/newImages/cost-effective.svg"
                  alt="tick" class="tick-square img-fluid"> Cost-Effective
              </li>
              <li class="purple-text_dark color-black-1"><img src="assets/img/newImages/scalable-solution.svg"
                  alt="tick" class="tick-square img-fluid"> Scalable Solutions
              </li>
            </ul>
          </div>
        </div>
        <a href="#explore"><button class="btn-yellow btn-explore-plan">Get Started Today <i
              class="fa-solid fa-arrow-right"></i></button></a>
        <p class="Money-Back-Guarantee"><img src="assets/img/ic-shield.webp" alt="shield" class="img-fluid">30-Day Money-Back Guarantee</p>
      </div>
      <div class="col-md-6">
        <img class="banner_img floatings img-fluid" src="assets/img/tally-on-cloud.webp" alt="Banner">
      </div>
    </div>
  </div>
</section>

<!-- (Rating section) -->
<?php
include('inc/rating.php');
?>

<!--Explore Section-->
<section class="explore-section vps hosting-plan mt-4" id="explore">
  <div class="container">
    <div class="text-center margin-top-bottom ideak-choice">
      <h2 class="server-heading shared-heading-plan">Choose Tally on Cloud Price that Suits Your Needs </h2>
      <p class="server-title">Fast NVMe SSDs & 1Gbps connection—at no extra cost. Get private cloud hosting now!</p>
    </div>

    <?php

    $plangroup = "TALLY-ON-CLOUD";
    include('/home/youstable/Youstable/public_html/db.php');
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);

    // Select currency conversion rate
    $rate = 0.00;
    $conv_rate = "SELECT * FROM conv_rate";
    $r_conv_rate = mysqli_query($con, $conv_rate);

    if ($r_conv_rate) {
      while ($row_conv_rate = mysqli_fetch_assoc($r_conv_rate)) {
        $rate = $row_conv_rate["usd"]; // Ensure "usd" is the correct column name
      }
    } else {
      echo "Query failed: " . mysqli_error($con);
    }

    // Query to fetch unique billing cycles
    $billingCycleQuery = "SELECT DISTINCT plan_pricing.billing_cycle 
          FROM plans  
          LEFT JOIN plangroup ON plangroup.pg_id = plans.planGroup_id 
          LEFT JOIN plan_pricing ON plan_pricing.plan_id = plans.p_id  
          WHERE plangroup.Name = '" . $plangroup . "'";

    $billingCycleResult = $con->query($billingCycleQuery);
    $billingCycles = [];

    if ($billingCycleResult->num_rows > 0) {
      while ($row = $billingCycleResult->fetch_assoc()) {
        $billingCycles[] = $row['billing_cycle'];
      }
    }

    // Define the correct order
    $billingCycleOrder = ['annually', 'semiannually', 'quarterly', 'monthly'];

    // Sort the billing cycles correctly
    usort($billingCycles, function ($a, $b) use ($billingCycleOrder) {
      return array_search($a, $billingCycleOrder) - array_search($b, $billingCycleOrder);
    });


    // Billing cycle labels
    $billingCycleLabels = [
      'annually' => '12 Month',
      'semiannually' => '6 Month',
      'quarterly' => '3 Month',
      'monthly' => '1 Month'
    ];

    // Query to fetch all plans grouped by billing cycle
    $plansQuery = "SELECT * 
                    FROM plans 
                    LEFT JOIN plangroup ON plangroup.pg_id = plans.planGroup_id 
                    LEFT JOIN plan_pricing ON plan_pricing.plan_id = plans.p_id  
                    WHERE plangroup.Name = '" . $plangroup . "'";

    $plansResult = $con->query($plansQuery);
    $plansData = [];

    if ($plansResult->num_rows > 0) {
      while ($row = $plansResult->fetch_assoc()) {
        $billingCycle = $row['billing_cycle'];
        $plansData[$billingCycle][] = [
          'plan_name' => $row['name'],
          'price_inr' => $row['usd_price'] * $rate,
          'price_usd' => $row['usd_price'],
          'plan_details' => $row['details'],
          'plan_you_save' => $row['you_save'],
          'plan_billing_cycle' => $row['billing_cycle'],
          'pro_id' => $row['pro_id']
        ];
      }
    }

    ?>

    <!-- Tabs Navigation -->
    <div class="row nav nav-pills wid-more" id="pills-tab" role="tablist" style="padding: 4px;">
      <?php foreach ($billingCycles as $index => $cycle):
        $label = isset($billingCycleLabels[$cycle]) ? $billingCycleLabels[$cycle] : ucfirst($cycle); // Default to Capitalized Cycle Name
      ?>
        <div class="col-lg-3 nav-button-plans">
          <button class="nav-link nav-linked <?= $index === 0 ? 'active' : '' ?>"
            id="pills-<?= $cycle ?>-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-<?= $cycle ?>"
            type="button"
            role="tab"
            aria-controls="pills-<?= $cycle ?>"
            aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
            tabindex="-1">
            <?= $label ?>
          </button>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tabs Content -->
    <div class="tab-content" id="pills-tabContent">
      <?php foreach ($billingCycles as $index => $cycle) : ?>
        <div class="tab-pane fade tab-titles <?= $index === 0 ? 'show active' : '' ?>"
          id="pills-<?= strtolower(str_replace(' ', '-', $cycle)) ?>"
          role="tabpanel"
          aria-labelledby="pills-<?= strtolower(str_replace(' ', '-', $cycle)) ?>-tab">

          <div class="row flex_unset ">
            <?php if (!empty($plansData[$cycle])) : ?>
              <?php foreach ($plansData[$cycle] as $index_bg => $plan) : ?>
                <div class="col-md-4 explore-cols">
                  <div class="position-relative h-100">
                    <div class="upper-card" style="background-color: <?= $index_bg % 2 == 0 ? '#fffdf9' : '#FEFDFF' ?>;">
                      <h4 class="hosting-heading"><?= htmlspecialchars($plan['plan_name']) ?></h4>
                      <div class="price-container">
                        <p class="hosting-price vps-price indian-host-price">
                          <span class="hin-rs-1-1">₹</span><?= ($plan['price_inr']) - floor($plan['price_inr']) >= 0.5 ? ceil($plan['price_inr'])     : floor($plan['price_inr']); ?>
                        </p>
                        <p class="hosting-price vps-price usa-host-price">
                          <span class="hin-rs-1-1">$</span><?= $plan['price_usd'] ?>
                        </p>
                        <p class="per_month">/month</p>
                      </div>
                      <a href="https://www.youstable.com/manage/cart.php?currency=2&pid=<?php echo $plan['pro_id'] ?>&billingcycle=<?php echo $plan['plan_billing_cycle'] ?>"
                        class=" indian-host-price" target="_self"><button
                          class=" exploreplan-btn  <?= $index_bg % 2 == 0 ? 'btn-yellow' : 'btn-purple' ?>" type="submit">Get
                          Started</button></a>
                      <a href="https://www.youstable.com/manage/cart.php?currency=1&pid=<?php echo $plan['pro_id'] ?>&billingcycle=<?php echo $plan['plan_billing_cycle'] ?>"
                        class=" usa-host-price" target="_self"><button
                          class="exploreplan-btn  <?= $index_bg % 2 == 0 ? 'btn-yellow' : 'btn-purple' ?>" type="submit">Get
                          Started</button></a>

                      <div class="hosting_specification">

                        <?php
                        $features = explode(",", $plan['plan_details']); // Split into an array
                        foreach ($features as $feature) :
                          $feature = trim($feature); // Trim whitespace
                        ?>
                          <div class="d-flex gap-2 specifications">
                            <img src="assets/img/speci-tick.png" class="specification-tick">

                            <p><?= htmlspecialchars($feature) ?></p>

                          </div>
                        <?php endforeach; ?>


                        <?php
                        if ($plan['plan_billing_cycle'] == 'quarterly' || $plan['plan_billing_cycle'] == 'semiannually' || $plan['plan_billing_cycle'] == 'annually'): ?>
                          <div class="free_setup <?= $index_bg % 2 == 0 ? 'btn-yellow' : 'btn-light-purple' ?>">
                            <p class='m-0' style="font-size: 14px;"><?= $plan['plan_you_save'] ?></p>
                          </div>
                        <?php
                        elseif ($plan['plan_billing_cycle'] == 'monthly'): ?>
                          <div class=" free_setup <?= $index_bg % 2 == 0 ? 'btn-yellow' : 'btn-light-purple' ?>">
                            <p class='m-0' style="font-size: 14px;"><?= $plan['plan_you_save'] ?></p>
                          </div>
                        <?php
                        else: ?>
                          <!-- Optional: Handle any other billing cycle that is not 'monthly', 'triennially', or 'annually' -->
                          <p class='m-0'>Billing cycle not supported</p>
                        <?php endif; ?>




                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <p>No plans available for <?= htmlspecialchars($cycle) ?></p>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<section class="awesome-youstable affiliate-two affiliate-four">
  <div class="container">
    <div class="right-cols-awesome">
      <div class="text-center">
        <h2 class="ay_heading">Why choose Tally on Cloud powered by YouStable</span></h2>
        <p class="server-title title_sides_width pb-3">Our Tally on Cloud servers offer advanced features to ensure high performance and top-notch security for your critical data.</p>
        <!--<p class="purple-text_dark see-yourself">See for yourself!</p>-->
        <P></P>
      </div>
      <div class="features-vps">
        <div class="row text-left">
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/NVMessd.svg" alt="NVMe SSD" class="img-fluid">
              <h5 class="ay-heading">NVMe SSD Drive</h5>
              <p class="ay-title m-0 w-100">Boost efficiency with SSD storage, delivering fast processing, sustained performance, and durability.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/connectivity-1gb.svg" alt="1 gb connectivity" class="img-fluid">
              <h5 class="ay-heading">1Gbps Connectivity</h5>
              <p class="ay-title m-0 w-100"> Enjoy uninterrupted, high-speed access with a 1Gbps connection at no additional cost to your plan.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/99.9-Server-Uptime.svg" alt="uptime" class="img-fluid">
              <h5 class="ay-heading">24/7 Uptime</h5>
              <p class="ay-title m-0 w-100"> Ensure continuous availability of your Tally data with a reliable cloud infrastructure and 99.9% uptime.</p>
            </div>
          </div>
        </div>
        <div class="row text-left mt-4">
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/enhanced-security_1.svg" alt="enhanced-security" class="img-fluid">
              <h5 class="ay-heading">Enhanced Security</h5>
              <p class="ay-title m-0 w-100"> Protect your data with advanced encryption, firewalls, and regular security updates for peace of mind.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/daily-backup.svg" alt="backup" class="img-fluid">
              <h5 class="ay-heading">Weekly Backups</h5>
              <p class="ay-title m-0 w-100">Secure your data with Weekly backups(Paid), allowing quick recovery from accidental deletions or hardware failures.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Highly-scalable.svg" alt="highly scalable" class="img-fluid">
              <h5 class="ay-heading">Scalable Resource</h5>
              <p class="ay-title m-0 w-100">Upgrade storage or computing power effortlessly as your business and data requirements expand.
              </p>
            </div>
          </div>
        </div>
        <div class="row text-left mt-4">
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/multiple-os_1.svg" alt="multi device" class="img-fluid">
              <h5 class="ay-heading">Multi-Device Access</h5>
              <p class="ay-title m-0 w-100">Access Tally seamlessly on PCs, laptops, or mobile devices from anywhere, ensuring flexibility and convenience.</p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/servers/Easy-of-use.svg" alt="user friendly" class="img-fluid">
              <h5 class="ay-heading">User-Friendly Interface</h5>
              <p class="ay-title m-0 w-100"> Simplified dashboard and management tools make it easy for anyone to use without technical expertise.
              </p>
            </div>
          </div>
          <div class="col-md-4 cols-awesome-youstable">
            <div class="feature_cols_desciption">
              <img src="assets/img/icons/247-Support.svg" alt="Support" class="img-fluid">
              <h5 class="ay-heading">Dedicated Support</h5>
              <p class="ay-title m-0 w-100"> Get 24/7 expert assistance to resolve issues promptly, ensuring smooth operations and minimal downtime.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="awesome-youstable affiliate-two affiliate-four">
  <div class="container">
    <div class="right-cols-awesome">

      <div class="why-choose">
        <div class="row text-left">
          <div class="col-lg-6">
            <h3>Why Tally on Cloud?</h3>

            <div class="d-flex gap-3 mt-5 align-items-center">
              <!-- <div> <img src="assets/img/nvme-icon-why.svg" class="icons-why img-fluid" alt="nvme-ssd"></div> -->
              <div>

                <p class="why-para">Tally on Cloud is the perfect solution for businesses using Tally or seeking an ERP to streamline activities. Whether expanding to multiple cities or managing several branches, Tally on YouStable empowers centralized account management with ease. With anytime, anywhere access, this multi-tier application ensures seamless operations over the internet.
                </p><br>
                <p class="why-para">Tally on YouStable Cloud connects finance across locations, providing reliable and efficient tools to scale your business effortlessly.</p>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="assets/img/tally-sub-img.webp" alt="tally-sub" class="img-fluid" loading="lazy">
          </div>
        </div>


      </div>
    </div>
  </div>
</section>


<!-- <section class="map-section about-maps awesome-youstable">
  <div class="container">
    <div class="text-center">
      <h2 class="Banner-Heading VPS-Hosting-Needss">Our Datacenters for Tally on Cloud</h2>
      <p class="server-title title_sides-width">Tally on Cloud servers are hosted in prime data centers across Mumbai, Delhi, Bangalore, and Indore. Choose the location that fits your needs and experience seamless Tally on Cloud solutions
      </p>
      <div class="row">
        <div class="col">
          <img src="assets/img/map-INDIA.png" alt="open cart" class="deploy-app-imgs img-fluid">
        </div>
      </div>
    </div>

        </div>
        
        </div>
    </div>

  </div>
</section> -->

<section class="tally-features mb-5">
  <div class="container text-center">
    <div class="row  mt-4 py-3">
      <div class="col-md-4 forex-features-section p-3">
        <img src="assets/img/any-device-access.svg" alt="any-device-access" class="w-25 mb-3 img-fluid">
        <h5>Any Device Access</h5>
        <p class="p-0"> Access your Tally on Cloud seamlessly from any device, anytime, anywhere with ease.</p>
      </div>
      <div class="col-md-4 forex-features-section p-3">
        <img src="assets/img/tally-support.svg" alt="tally-support" class="w-25 mb-3 img-fluid">
        <h5>24*7 Support</h5>
        <p class="p-0"> Get round-the-clock expert assistance to resolve issues and ensure uninterrupted service</p>
      </div>
      <div class="col-md-4 forex-features-section p-3">
        <img src="assets/img/weekly-backup_1.svg" alt="weekly-backup" class="w-25 mb-3 img-fluid">
        <h5>Weekly Auto Backup</h5>
        <p class="p-0">Enjoy automated weekly backups (paid) to secure your data and ensure quick recovery when needed.</p>
      </div>

    </div>
  </div>
</section>


<?php include('animate-text.php') ?>


<section class="performance-sec plans">
  <div class="container">
    <div class="text-center">
      <h2 class="Banner-Heading">Technology Included with Tally on Cloud</h2>
      <p class="server-title server-title-width mt-0 mt-p">With Tally on Cloud, leverage cutting-edge technologies like TSPLus, Acronis, and Norton to ensure secure access, data protection, and seamless performance.
    </div>

    <div class="row nav nav-pills mb-3 tab-four-heads" id="pills-tabs" role="tablist">
      <div class="col-lg-4 quality-standard">
        <p class="nav-item" role="presentation">
          <button class="nav-link active teb-bg-purple" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
            <span class="text-dark dot"><img src="assets/img/tsplus.svg" alt="tsplus-perf" class="img-fluid"></span>TSPLus

          </button>
        </p>
      </div>
      <div class="col-lg-4 quality-standard">
        <p class="nav-item" role="presentation">
          <button class="nav-link teb-bg-purple" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">
            <span class="text-dark dot"><img src="assets/img/acronis.svg" alt="acronis-perf" class="img-fluid"></span>Acronis
          </button>
        </p>
      </div>
      <div class="col-lg-4 quality-standard">
        <p class="nav-item" role="presentation">
          <button class="nav-link teb-bg-purple" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">
            <span class="text-dark dot"><img src="assets/img/norton.svg" alt="norton-perf" class="img-fluid"></span>Norton
          </button>
        </p>
      </div>

    </div>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active border tab-titles" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <div class="row">
          <div class="col-lg-8 m-auto">
            <h5 class="heading-servers m-0">TSPLus</h5>
            <p class="server-title py-3 m-0">Enhance your Tally on Cloud experience with TSPLus, providing secure remote
              access, optimized performance, and seamless multi-user connectivity.
            </p>
          </div>
          <div class="col-lg-4">
            <img src="assets/img/tsplus.png" alt="tsplus" class="content-images img-fluid" loading="lazy">
          </div>
        </div>
      </div>
      <div class=" tab-pane fade border tab-titles" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <h5 class="heading-servers m-0">Acronis </h5>
            <p class="server-title py-3 m-0">Protect your Tally data on Cloud with Acronis, ensuring secure automated backups, quick recovery, and robust ransomware protection.
            </p>
          </div>
          <div class="col-lg-4">
            <img src="assets/img/acronis.png" alt="acronis" class="content-images img-fluid" loading="lazy">
          </div>
        </div>

      </div>
      <div class="tab-pane fade border tab-titles" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="row">
          <div class="col-lg-8 m-auto">
            <h5 class="heading-servers m-0">Norton</h5>
            <p class="server-title py-3 m-0">Safeguard your Tally on Cloud with Norton, offering advanced security features, real-time threat detection, and data protection.</p>
          </div>
          <div class="col-lg-4">
            <img src="assets/img/norton.png" alt="norton" class="content-images img-fluid" loading="lazy">
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<?php
include('inc/customer-reviews.php');
?>

<section class="faq faq-1">
  <div class="container">
    <h2 class="text-center faq-question">Frequently asked questions</h2>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button acc-purple-bg" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            What is Tally on Cloud, and how does it work?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Tally on Cloud is a cloud-based solution that hosts your Tally ERP software on secure servers. It allows users to access Tally from any internet-enabled device, ensuring flexibility and mobility. With Tally on Cloud, there’s no need for complex local installations or high-end infrastructure. Your data is stored securely in the cloud, and updates or changes made are reflected in real-time, making it ideal for businesses of all sizes.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Why should I choose YouStable for Tally on Cloud services?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>YouStable stands out with its reliable, high-performance infrastructure and 24/7 support. Our Tally on Cloud solutions come with advanced technologies like TSPLus for seamless multi-user access, Acronis for automated backups, and Norton for enhanced security. With data centers in Mumbai, Delhi, Bangalore, and Indore, we ensure low latency and fast performance. We also provide a 99.9% uptime guarantee and scalable plans tailored to your business needs.
            </p>
          </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Can I access Tally on Cloud from multiple devices and locations?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Yes, YouStable’s Tally on Cloud solution is designed for flexibility. You can access it from any device—PC, laptop, tablet, or smartphone—and from any location with an internet connection. This makes it a perfect choice for businesses with remote teams or multiple branches. The multi-device compatibility ensures that your accounting data is always within reach.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            How does YouStable ensure data security for Tally on Cloud?
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>YouStable employs multiple layers of security to protect your data. Our servers use advanced encryption to ensure data privacy and Norton technology for real-time threat detection and prevention. Acronis provides automated backups and ransomware protection, ensuring your data is safe from potential cyber threats. We also regularly update our systems to mitigate vulnerabilities, giving you peace of mind.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingFive">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
            What happens if I lose my Tally data on the cloud?
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>With YouStable, data loss is not a concern. Our Acronis-powered automated backup system regularly stores your data securely. In the unlikely event of accidental deletion or system failure, you can quickly recover your data with just a few clicks. This ensures business continuity without downtime or significant losses.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingsix">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapseFive">
            Is Tally on Cloud suitable for businesses with multiple branches?
          </button>
        </h2>
        <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>
              Absolutely! Tally on Cloud is an ideal solution for businesses with multiple branches. It allows centralized access to your accounting data, enabling you to manage and consolidate accounts effortlessly. Multi-user support ensures that teams across different locations can work simultaneously on the same system, streamlining operations and improving efficiency.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingseven">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseFive">
            What are the hardware requirements to use Tally on Cloud?
          </button>
        </h2>
        <div id="flush-collapseseven" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Tally on Cloud eliminates the need for high-end hardware. You only need a basic device with internet access, such as a PC, laptop, tablet, or smartphone. This reduces the overall infrastructure cost and ensures that even older devices can access the platform seamlessly, making it a cost-effective solution.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingeight">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseeight" aria-expanded="false" aria-controls="flush-collapseFive">
            How does TSPLus enhance the Tally on Cloud experience? </button>
        </h2>
        <div id="flush-collapseeight" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>TSPLus improves the Tally on Cloud experience by offering secure remote access and supporting multiple users. It ensures that your team can access Tally securely from different locations without any interruptions. TSPLus also optimizes performance, reducing lag and enhancing user experience, making it a robust tool for businesses relying on cloud-based accounting.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item faq-items">
        <h2 class="accordion-header" id="flush-headingnine">
          <button class="accordion-button acc-purple-bg collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapsenine" aria-expanded="false" aria-controls="flush-collapseFive">
            What kind of support does YouStable provide for Tally on Cloud?
          </button>
        </h2>
        <div id="flush-collapsenine" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>YouStable provides 24/7 dedicated support to assist you with any technical issues or queries. Our support team ensures quick resolution of problems, minimizing downtime and keeping your business operations running smoothly. Whether it’s setup, troubleshooting, or customization, we’re here to help every step of the way.
            </p>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

<!--customer support-->
<div class="container customer-support-container">
  <section class="bg-light-yellow">
    <div class="row reverse ">
      <div class="col-lg-6 support-rev">
        <div class="mt-4">
          <h2 class="ay_heading text-start">Have Concerns?</h2>
          <p class="server-titles py-4">Connect to our Best Technical Support Team now! Our Staff is online
            24/7 and accessible via LiveChat Window, Ticket Support, Call and email.</p>
        </div>
        <div class="d-flex">
          <div class="contact-hosting one">
            <img src="assets/img/phone-call.png" alt="phone call">
          </div>
          <div class="mb-4">
            <a href="tel:+919616782253" class="contact-hosting one" data-toggle="tooltip" data-placement="top" target="_self" data-bs-original-title="Contact us anytime">+919616782253</a>
          </div>
        </div>
        <div class="d-flex">
          <div class="contact-hosting one">
            <img src="assets/img/newImages/Expert-Support.svg" alt="Expert Support">
          </div>
          <div class="mb-4">
            <a href="javascript:void(Tawk_API.toggle())" class="contact-hosting one" data-toggle="tooltip" data-placement="top" target="_self" data-bs-original-title="Click to Chat">Live Chat with Experts</a>
          </div>
        </div>
        <div>

        </div>
      </div>
      <div class="col-lg-6 support-rev">
        <img class="thinking-girl support-imgs" src="assets/img/support-new.png" alt="support new">
      </div>
    </div>
  </section>
</div>
<br>


<?php include('inc/footer.php') ?>