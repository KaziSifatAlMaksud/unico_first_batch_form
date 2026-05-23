<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Registration Success</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
    :root {
      --bg: #e9ebf0;
      --bg-dark: #6a9ccf;
      --white: #ffffff;
      --card-bg: rgba(255,255,255,0.92);
      --accent: #1a5fa8;
      --accent2: #e84c6b;
      --text-dark: #0e2a45;
      --text-mid: #2d5480;
      --text-light: #6c9ec8;
      --border: rgba(26,95,168,0.18);
      --shadow: 0 24px 80px rgba(14,42,69,0.18);
      --radius: 20px;
      --input-radius: 12px;
      --transition: 0.3s cubic-bezier(.4,0,.2,1);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: "Outfit", sans-serif;
      background: var(--bg);
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* Animated background blobs */
    body::before, body::after {
      content: '';
      position: fixed;
      border-radius: 50%;
      filter: blur(80px);
      z-index: 0;
      pointer-events: none;
    }
    body::before {
      width: 520px; height: 520px;
      background: radial-gradient(circle, rgba(255,255,255,0.35) 0%, transparent 70%);
      top: -140px; left: -140px;
      animation: floatA 10s ease-in-out infinite alternate;
    }
    body::after {
      width: 420px; height: 420px;
      background: radial-gradient(circle, rgba(232,76,107,0.18) 0%, transparent 70%);
      bottom: -100px; right: -100px;
      animation: floatB 12s ease-in-out infinite alternate;
    }
    @keyframes floatA { from { transform: translate(0,0) scale(1); } to { transform: translate(60px,60px) scale(1.1); } }
    @keyframes floatB { from { transform: translate(0,0) scale(1); } to { transform: translate(-50px,-50px) scale(1.15); } }

    /* Page layout */
    .page-wrapper {
      position: relative;
      z-index: 1;
      min-height: 100vh;
    }

    @keyframes slideDown { from { opacity:0; transform:translateY(-28px);} to { opacity:1; transform:translateY(0);} }
    @keyframes riseUp   { from { opacity:0; transform:translateY(40px); } to { opacity:1; transform:translateY(0); } }
    @keyframes fadeIn   { from { opacity:0; } to { opacity:1; } }
    @keyframes popIn    { from { transform:scale(0); } to { transform:scale(1); } }
    @keyframes pulse    { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:.5; transform:scale(.8); } }

    /* ── Header ── */
    .contact-header {
      position: relative;
      width: 100%;
      min-height: 220px;
      height: clamp(220px, 38vh, 340px);
      overflow: hidden;
      display: flex;
      align-items: flex-end;
    }
    .contact-header__bg {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      z-index: 1;
    }
    .contact-header__fallback {
      position: absolute;
      inset: 0;
      background: #0f1e46;
      z-index: 0;
    }
    .contact-header__overlay {
      position: absolute;
      inset: 0;
      z-index: 2;
      background: linear-gradient(135deg, rgba(14,42,69,0.82) 0%, rgba(26,95,168,0.60) 100%);
    }
    .contact-header__content {
      position: relative;
      z-index: 3;
      padding: 2.5rem 2.5rem 2rem;
      width: 100%;
    }
    .contact-header__title {
      font-weight: 700;
      font-size: clamp(22px, 4vw, 32px);
      color: #fff;
      margin-bottom: .5rem;
      line-height: 1.2;
    }
    .contact-header__breadcrumb {
      font-size: 13px;
      color: rgba(255,255,255,0.65);
    }
    .contact-header__breadcrumb a { color: rgba(255,255,255,0.65); text-decoration: none; }
    .contact-header__breadcrumb a:hover { color: #fff; }
    .contact-header__breadcrumb .sep { margin: 0 8px; color: rgba(255,255,255,0.3); }
    .contact-header__breadcrumb .active { color: #fff; font-weight: 500; }

    /* Main content */
    /* .main-content { padding: 40px 16px 60px; position: relative; z-index: 1; } */

       .main-content {
    /* background-color: #000; */
        padding: 40px 16px 60px; 
         z-index: 1;
        position: relative;
        overflow: hidden; /* keeps image inside section */
        min-height: 120vh;
        }

        .main-content::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 900px;
        height: 100%;
        background: url("https://unicohospitals.com/images/static/shadow.svg") no-repeat left center;
        background-size: contain;
        opacity: 0.2;
        pointer-events: none;
        z-index: 3;
        filter: drop-shadow(10px 10px 40px rgba(0,0,0,0.3));
        }

    /* ── Success Banner ── */

    .success-banner {
    max-width: 90%;
    margin: 20px auto;
    padding: 20px;
    background: linear-gradient(135deg, #14b8a6, #0f766e);
    border-radius: 16px;
    color: #fff;
}

  /* LOGO BOX */
  .success-banner-icon {
      display: flex;
      justify-content: center;
      align-items: center;
  }

  /* RESPONSIVE IMAGE (KEY FIX) */
  .logo-icon {
      width: 100%;
      max-width: 120px;   /* prevents overflow */
      height: auto;
      object-fit: contain;
  }

  /* TEXT */
  .success-banner-text h3 {
      font-size: 1.50rem;
      font-weight: 700;
      margin: 0;
  }

  .success-banner-text h4 {
      font-size: 1.40rem;
      margin: 4px 0;
      opacity: 0.9;
  }

  .success-banner-text p {
      font-size: 1.20rem;
      margin: 0;
      opacity: 0.9;
      line-height: 1.4;
  }

  /* MOBILE SPACING FIX */
/* MOBILE FIX */
@media (max-width: 768px) {

    .success-banner {
        text-align: center;
    }

    .success-banner-icon {
        display: flex;
        justify-content: center;
        margin-bottom: 12px;
    }

    /* BIGGER LOGO ON MOBILE */
    .logo-icon {
        max-width: 160px;   /* increase size */
        width: 100%;
        height: auto;
    }

}
@media (max-width: 768px) {

    .success-banner-icon {
        background: rgba(255,255,255,0.15);
        padding: 15px;
        border-radius: 16px;
        margin-bottom: 15px;
    }

}
  /* Animation */
  @keyframes riseUp {
      from {
          opacity: 0;
          transform: translateY(10px);
      }
      to {
          opacity: 1;
          transform: translateY(0);
      }
  }
  

    /* ── Form Card ── */
    .form-card {
      max-width: 90%;
      margin: 0 auto;
      /* background: var(--bg); */
      /* background: rgba(255,255,255,0.92); */
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow: hidden;
      animation: riseUp .65s cubic-bezier(.22,1,.36,1) .1s both;
    }

    .patient-id-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,255,255,0.18);
      border: 1.5px solid rgba(255,255,255,0.4);
      border-radius: 50px;
      padding: 6px 18px;
      font-weight: 700;
      color: #fff;
      font-size: .9rem;
      letter-spacing: .06em;
    }
    .patient-id-badge i { font-size: .85rem; opacity: .8; }

    .card-inner { padding: 36px 40px; }

    /* ── Patient Hero ── */
    .patient-hero {
      display: flex;
      align-items: center;
      gap: 24px;
      padding-bottom: 28px;
      border-bottom: 1px dashed rgba(154,189,226,0.5);
      margin-bottom: 28px;
    }
    .patient-avatar {
      width: 92px; height: 92px;
      border-radius: 50%;
      border: 3px solid var(--accent);
      background: linear-gradient(135deg, #c8dff5, #e8f0fa);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      font-size: 2rem; font-weight: 700; color: var(--accent);
      box-shadow: 0 6px 24px rgba(26,95,168,0.22);
    }
    .patient-avatar img {
      width: 100%; height: 100%;
      object-fit: cover;
      border-radius: 50%;
    }
    .patient-hero-info h3 {
      font-size: 1.50rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 8px;
    }
    .meta { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; }
    .meta-chip {
      display: inline-flex; align-items: center; gap: 5px;
      background: rgba(26,95,168,0.07);
      border: 1px solid rgba(26,95,168,0.15);
      border-radius: 50px;
      padding: 4px 12px;
      font-size: .78rem; font-weight: 600; color: var(--text-mid);
    }
    .meta-chip i { font-size: .78rem; }
    .meta-chip.blood {
      background: rgba(232,76,107,0.08);
      border-color: rgba(232,76,107,0.2);
      color: var(--accent2);
    }
    .status-badge {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(197, 194, 34, 0.12);
      border: 1.5px solid rgba(194, 197, 34, 0.3);
      border-radius: 50px;
      padding: 4px 14px;
      font-size: .78rem; font-weight: 700; color: var(--text-mid);
    }
    .status-dot {
      width: 7px; height: 7px;
      background: #a8a05f; border-radius: 50%;
      animation: pulse 1.5s ease-in-out infinite;
    }

    /* ── Section Headings ── */
    .section-heading { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
    .section-icon {
      width: 38px; height: 38px; border-radius: 11px;
      background: linear-gradient(135deg, var(--accent) 0%, #2386d4 100%);
      display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .section-icon i { color: #fff; font-size: 15px; }
    .section1-icon {
      width: 38px; height: 38px; border-radius: 11px;
      background: linear-gradient(135deg, var(--accent) 0%, #23ced4 100%);
      display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .section1-icon i { color: #fff; font-size: 15px; }
    .section-heading h6 { font-size: .9rem; font-weight: 700; color: var(--text-dark); margin: 0; }

    /* ── Info Grid ── */
    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 12px;
    }
    .info-item {
      background: rgba(26,95,168,0.04);
      border: 1px solid rgba(26,95,168,0.10);
      border-radius: 12px;
      padding: 14px 16px;
    }
    .info-item .lbl {
      font-size: .7rem; font-weight: 700;
      color: var(--text-light);
      letter-spacing: .05em; text-transform: uppercase;
      margin-bottom: 5px;
    }
    .info-item .val { font-size: .95rem; font-weight: 600; color: var(--text-dark); }
    .info-item .val.empty { color: var(--text-light); font-weight: 400; font-style: italic; }
    .info-item.full-width { grid-column: 1 / -1; }

    /* ── Divider ── */
    .form-divider { border: none; border-top: 1px dashed rgba(154,189,226,0.5); margin: 0 0 28px; }

    /* ── Navigation Buttons ── */
    .btn-nav {
      border-radius: 50px;
      padding: 12px 28px;
      font-weight: 700; font-size: .9rem;
      letter-spacing: .04em; border: none;
      cursor: pointer; transition: var(--transition);
      display: inline-flex; align-items: center; gap: 8px;
    }
    .btn-primary-custom {
      background: linear-gradient(135deg, var(--accent), #2386d4);
      color: #fff;
      box-shadow: 0 6px 24px rgba(26,95,168,0.28);
    }
    .btn-primary-custom:hover { transform: translateY(-2px); background: #30b5a7; box-shadow: 0 10px 30px rgba(26,95,168,0.4); }
    .btn-secondary-custom {
      background: rgba(154,189,226,0.15);
      color: var(--text-mid);
      border: 1.5px solid var(--border);
    }
    .btn-secondary-custom:hover { background: rgba(154,189,226,0.3); }
    .btn-submit-custom {
      background: linear-gradient(135deg, #30b5a7, #169ea3);
      color: #fff;
      box-shadow: 0 6px 24px rgba(25, 156, 173, 0.28);
    }
    .btn-submit-custom:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(28, 199, 221, 0.38); }

    /* ── Responsive ── */
    @media (max-width: 768px) {
      .contact-header { height: 280px; }
      .contact-header__content { padding: 1.5rem; }
      .card-header-strip { padding: 16px 20px; flex-direction: column; align-items: flex-start; }
    }

    @media (max-width: 575px) {
      .card-inner { padding: 22px 16px; }
      .patient-hero { flex-direction: column; align-items: flex-start; gap: 16px; }
      .info-grid { grid-template-columns: 1fr; }
      .action-row { flex-direction: column; }
      .btn-nav { width: 100%; justify-content: center; }
      .success-banner { padding: 16px 18px; }
      .success-banner-icon { width: 60%; height: 60%;  align-items: center; justify-content: center; margin: 0 auto 12px; }
    }

    @media (max-width: 375px) {
      .card-inner { padding: 16px 10px; }
      .meta-chip { font-size: .72rem; padding: 3px 9px; }
    }

    /* ── Print Styles ── */

    .pdf-mode {
      background: #fff !important;
      color: #000 !important;
    }

    .pdf-mode * {
      color: #000 !important;
      box-shadow: none !important;
      text-shadow: none !important;
    }

    /* Hide UI elements */
    .pdf-mode .action-row,
    .pdf-mode .success-banner {
      display: none !important;
    }

    /* Make layout compact */
    .pdf-mode .form-card {
      max-width: 100% !important;
      margin: 0 !important;
      border-radius: 0 !important;
    }

    /* Force grayscale look */
    .pdf-mode img {
      filter: grayscale(100%) !important;
    }
    .pdf-mode button,
      .pdf-mode .btn,
      .pdf-mode .upload-trigger-btn,
      .pdf-mode .remove-photo-btn {
          display: none !important;
      }

   
     @media print {

        @page {
          size: A4;
          margin: 15mm;
        }

        body {
          background: #fff !important;
        }

        /* Hide non-report elements */
        .success-banner,
        .action-row,
        .contact-header,
        body::before,
        body::after {
          display: none !important;
        }

        /* Main container becomes full page */
        .main-content {
          padding: 0 !important;
          min-height: auto !important;
        }

        .form-card {
          box-shadow: none !important;
          max-width: 100% !important;
          margin: 0 !important;
          border-radius: 0 !important;
        }

        .card-inner {
          padding: 10mm !important;
        }

        /* Force single page layout */
        .info-grid {
          grid-template-columns: repeat(2, 1fr) !important;
        }

        /* Avoid breaking sections */
        .patient-hero,
        .info-section {
          page-break-inside: avoid;
        }

        /* Reduce spacing */
        .patient-hero {
          padding-bottom: 10px;
          margin-bottom: 10px;
        }

        .info-section {
          margin-bottom: 10px !important;
        }
      }
  </style>
</head>
<body>

<div class="page-wrapper">

  <!-- ── Page Header ── -->
  <!-- <div class="contact-header">
    <div class="contact-header__fallback"></div>
    <img class="contact-header__bg"
         src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1200&q=80"
         alt="Hospital background">
    <div class="contact-header__overlay"></div>
    <div class="contact-header__content">
      <h1 class="contact-header__title">Registration Complete</h1>
      <nav class="contact-header__breadcrumb">
        <a href="#">Home</a>
        <span class="sep">›</span>
        <a href="#">Patients</a>
        <span class="sep">›</span>
        <span class="active">Registration Success</span>
      </nav>
    </div>
  </div> -->

  <!-- ── Main Content ── -->
      <div class="main-content">

        <!-- Success Banner -->
      <!-- Success Banner -->
        <div class="success-banner">

        <div class="row align-items-center  justify-content-between">

            <!-- LEFT SIDE (Logo) -->
            <div class="col-12 col-md-3 text-center text-md-center mb-4 mb-md-0">
                <div >
                    <img src="{{ asset('assets/img/unico_icon.jpg') }}"
                        alt="Unico Hospital Logo" style=" margin-left:10px; max-width: 140px; border-radius: 10%; height: auto;"
                        >
                </div>
            </div>

            <!-- RIGHT SIDE (Text only) -->
            <div class="col-12 col-md-9  pl-md-4">

                <div class="success-banner-text">

                    <h3>Thank You for Temporary Registering!</h3>
                    <h4>Unico Hospital PLC</h4>
                    <p>
                        All information has been saved successfully.
                        Please provide your name or phone number at the reception desk.
                    </p>
                    <Br>

                    <p><b>Address:</b> <a href="https://maps.app.goo.gl/mjN8w5R5cSYCwxc67" target="_blank" style="text-decoration:none; color:#fff;"> 23 Bir Uttam K. M. Shafiullah Sarak (Green Road) Dhaka-1205, Bangladesh</a></p>
                    <p><b>Contact Us:</b> 09677667766 , 09677661166</p>
                    <p><b>Email:</b> info@unicohospitals.com</p>
                </div>

            </div>

        </div>

    </div>

    <!-- Patient Summary Card -->
    <div class="form-card"  >
      <div class="card-inner" id="printArea" >
        <!-- ── Patient Hero: Avatar + Name ── -->
        <div class="patient-hero">
          <!-- If you have a photo, replace the initials div with an <img> inside .patient-avatar -->
          <div class="patient-avatar">
                @if(!empty($latestEntry->patient_photo))
                    <img src="{{ asset('uploads/patient/' . $latestEntry->patient_photo) }}"
                        alt="{{ $latestEntry->full_name }}"
                        onerror="this.style.display='none'">
                @else
                    {{ strtoupper(substr($latestEntry->full_name, 0, 2)) }}
                @endif
            </div>

          <div class="patient-hero-info">
            <h3>{{ $latestEntry->full_name }}</h3>
            <p> <b>Mobile:</b> {{$latestEntry->mobile}}</p>
            <div class="meta">
              <span class="meta-chip">
                  <i class="ti ti-gender-{{ strtolower($latestEntry->gender) }}"></i>
                  {{ strtolower($latestEntry->gender) }}
              </span>
              <span class="meta-chip">
                  <i class="ti ti-cake"></i>
                  {{ explode('-', $latestEntry->age)[0] }} Years.
              </span>
              <!-- <span class="meta-chip blood"><i class="ti ti-droplet"></i> B+</span> -->
              {{-- <span class="status-badge">
                <span class="status-dot"></span> Draft
              </span> --}}
            </div>
          </div>
        </div>


        

        <div class="row">

            {{-- <div class="col-md-6">
                  <!-- ── Personal Information ── -->
                    <div class="info-section mb-4">
                    <div class="section-heading">
                        <div class="section-icon"><i class="ti ti-user"></i></div>
                        <h6>Personal Information</h6>
                        
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                          <div class="lbl">Father's Name</div>
                          <div class="val">{{ $latestEntry->father_name }}</div>
                        </div>
                        <div class="info-item">
                          <div class="lbl">Mother's Name</div>
                          <div class="val">{{ $latestEntry->mother_name }}</div>
                        </div>
                        <div class="info-item">
                          <div class="lbl">Date of Birth</div>
                          <div class="val">{{ $latestEntry->dob }}</div>
                        </div>
                        <div class="info-item">
                        <div class="lbl">Religion</div>
                        <div class="val">{{ $latestEntry->religion }}</div>
                        </div>
                        <div class="info-item">
                        <div class="lbl">Marital Status</div>
                        <div class="val">{{ $latestEntry->marital_status }}</div>
                        </div>
                       
                    
                    </div>
                    </div>

            </div> --}}

            {{-- <div class="col-md-6">
            <!-- ── Contact Information ── -->
                    <div class="info-section mb-4">
                    <div class="section-heading">
                        <div class="section1-icon"><i class="ti ti-phone"></i></div>
                        <h6>Contact Information</h6>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                        <div class="lbl">Phone Number</div>
                        <div class="val">{{ $latestEntry->mobile }}</div>
                        </div>
                        <div class="info-item">
                        <div class="lbl">Email Address</div>
                        <div class="val">{{ $latestEntry->email }}</div>
                        </div>
                        <div class="info-item">
                            <div class="lbl">District</div>
                            <div class="val">{{ $latestEntry->district }}</div>
                        </div>
                        <div class="info-item">
                            <div class="lbl">Thana</div>
                            <div class="val">{{ $latestEntry->thana }}</div>
                        </div>
                        <div class="info-item full-width">
                        <div class="lbl">Address</div>
                        <div class="val">{{ $latestEntry->address }}</div>
                        </div>
                    </div>
                    </div>
            </div> --}}

        </div>

      

        <hr class="form-divider">


        <!-- ── Action Buttons ── -->
        <div class="action-row d-flex justify-content-end gap-3 flex-wrap">
          {{-- <button class="btn-nav btn-secondary-custom" onclick="window.print()">
            <i class="ti ti-printer"></i> Print Summary
          </button> --}}
          <button class="btn-nav btn-primary-custom" onclick="downloadPDF()">
            <i class="ti ti-download" ></i> Download PDF
          </button>
          <button class="btn-nav btn-submit-custom" onclick="window.location.href='{{ route('patient_registration') }}'">
            <i class="ti ti-user-plus"></i> New Registration
          </button>
        </div>

      </div><!-- /.card-inner -->
    </div><!-- /.form-card -->

  </div><!-- /.main-content -->
</div><!-- /.page-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function downloadPDF() {

    const element = document.getElementById('printArea');

    // enable PDF mode (hide buttons + black & white)
    element.classList.add('pdf-mode');

    const opt = {
        margin: 0,
        filename: 'patient-registration.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: {
            scale: 2,
            useCORS: true
        },
        jsPDF: {
            unit: 'in',
            format: 'a4',
            orientation: 'portrait'
        }
    };

    html2pdf()
        .set(opt)
        .from(element)
        .save()
        .then(() => {
            // restore normal view after download
            element.classList.remove('pdf-mode');
        });
}
</script>
</body>
</html>