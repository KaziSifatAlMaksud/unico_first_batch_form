<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Registration Success</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/favicon/android-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/img/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/img/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/img/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/img/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <style>
    :root {
      --bg: #f0f4f8;
      --white: #ffffff;
      --accent: #0f766e;
      --accent-light: #14b8a6;
      --accent-blue: #1d4ed8;
      --accent-red: #e84c6b;
      --text-dark: #0f172a;
      --text-mid: #334155;
      --text-light: #64748b;
      --text-dim: #94a3b8;
      --border: #e2e8f0;
      --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
      --shadow-md: 0 8px 32px rgba(0,0,0,0.10);
      --shadow-lg: 0 24px 64px rgba(0,0,0,0.12);
      --radius: 20px;
      --radius-sm: 12px;
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
 
    /* Ambient background */
    body::before, body::after {
      content: '';
      position: fixed;
      border-radius: 50%;
      filter: blur(90px);
      z-index: 0;
      pointer-events: none;
    }
    body::before {
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(20,184,166,0.12) 0%, transparent 70%);
      top: -200px; left: -200px;
      animation: floatA 12s ease-in-out infinite alternate;
    }
    body::after {
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(29,78,216,0.08) 0%, transparent 70%);
      bottom: -150px; right: -150px;
      animation: floatB 14s ease-in-out infinite alternate;
    }
    @keyframes floatA { from { transform: translate(0,0); } to { transform: translate(60px,60px); } }
    @keyframes floatB { from { transform: translate(0,0); } to { transform: translate(-50px,-50px); } }
    @keyframes fadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
    @keyframes popIn  { from { transform:scale(0.6); opacity:0; } to { transform:scale(1); opacity:1; } }
    @keyframes pulse  { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:.4; transform:scale(.7); } }

    .page-wrapper { position: relative; z-index: 1; min-height: 100vh; }

       .page-wrapper::before {
        content: "";
        position: fixed;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 90%;
        height: 100%;
        background: url("https://unicohospitals.com/images/static/shadow.svg") no-repeat left center;
        background-size: contain;
        opacity: 0.2;
        pointer-events: none;
        z-index: 0;
        filter: drop-shadow(10px 10px 40px rgba(0, 0, 0, 0.3));
    }


    /* ── Main Content ── */
    .main-content {
      padding: 40px 16px 70px;
      position: relative;
      z-index: 1;
      min-height: 100vh;
    }

    /* ── Success Banner ── */
    .success-banner {
      max-width: 90%;
      margin: 0 auto 28px;
      padding: 28px 32px;
      background: linear-gradient(135deg, #0f766e 0%, #14b8a6 60%, #0ea5e9 100%);
      border-radius: var(--radius);
      color: #fff;
      box-shadow: 0 12px 48px rgba(15,118,110,0.28);
      animation: fadeUp 0.6s ease both;
      position: relative;
      overflow: hidden;
    }
    /* decorative circles inside banner */
    .success-banner::before {
      content: '';
      position: absolute;
      width: 220px; height: 220px;
      border-radius: 50%;
      background: rgba(255,255,255,0.07);
      top: -80px; right: -60px;
      pointer-events: none;
    }
    .success-banner::after {
      content: '';
      position: absolute;
      width: 130px; height: 130px;
      border-radius: 50%;
      background: rgba(255,255,255,0.05);
      bottom: -50px; right: 120px;
      pointer-events: none;
    }

    .banner-inner { position: relative; z-index: 1; }

    /* .banner-logo-wrap {
      width: 120px; height: 120px;
      border-radius: 16px;
      background: rgba(255,255,255,0.18);
      border: 1.5px solid rgba(255,255,255,0.3);
      display: flex; align-items: center; justify-content: center;
      backdrop-filter: blur(8px);
      flex-shrink: 0;
    } */
    .banner-logo-wrap img {
      width: 120px; height: 120px;
      object-fit: contain; border-radius: 10%;
    }
    .banner-check {
      width: 66px; height: 66px;
      background: rgba(255,255,255,0.2);
      border: 2px solid rgba(255,255,255,0.4);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      animation: popIn 0.5s cubic-bezier(.22,1,.36,1) 0.3s both;
    }
    .banner-check i { font-size: 30px; color: #fff; }

    .banner-text h3 {
      font-size: clamp(1.1rem, 2.5vw, 1.45rem);
      font-weight: 800; margin-bottom: 2px; color: #fff;
    }
    .banner-text h4 {
      font-size: 1rem; font-weight: 600;
      color: rgba(255,255,255,0.82); margin-bottom: 10px;
    }
    .banner-text p {
      font-size: .88rem; color: rgba(255,255,255,0.85);
      line-height: 1.5; margin: 0;
    }
    .banner-text p + p { margin-top: 3px; }
    .banner-text a { color: rgba(255,255,255,0.9); text-decoration: none; }
    .banner-text a:hover { color: #fff; text-decoration: underline; }
    .banner-text b { font-weight: 700; }

    .banner-divider {
      width: 1px; height: 60px;
      background: rgba(255,255,255,0.25);
      flex-shrink: 0;
    }

    @media (max-width: 768px) {
      .success-banner { padding: 22px 20px; }
      .banner-divider { display: none !important; }
      .banner-logo-wrap { margin: 0 auto 16px; }
      .banner-text { text-align: center; }
      .banner-check { margin: 0 auto 12px; }
    }

    /* ── Form Card ── */
    .form-card {
      max-width: 90%;
      margin: 0 auto;
      background: var(--white);
       background: transparent !important;
      border-radius: var(--radius);
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      overflow: hidden;
      animation: fadeUp 0.7s ease 0.1s both;
    }

    /* Card top color bar */


    .card-header-strip {
      padding: 20px 32px;
      background: linear-gradient(135deg, #f8fafc, #f1f5f9);
      border-bottom: 1px solid var(--border);
            backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      flex-wrap: wrap;
    }
    .card-header-strip .header-title {
      font-size: .78rem; font-weight: 700;
      letter-spacing: .1em; text-transform: uppercase;
      color: var(--text-light);
      display: flex; align-items: center; gap: 8px;
    }
    .card-header-strip .header-title i { font-size: .9rem; color: var(--accent); }

    .patient-id-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(15,118,110,0.08);
      border: 1.5px solid rgba(15,118,110,0.2);
      border-radius: 50px;
      padding: 6px 18px;
      font-weight: 700; color: var(--accent);
      font-size: .82rem; letter-spacing: .06em;
    }
    .patient-id-badge i { font-size: .8rem; opacity: .7; }

    .card-inner { padding: 32px 32px 28px; }

    /* ── Patient Hero ── */
    .patient-hero {
      display: flex;
      align-items: center;
      gap: 22px;
        background: transparent !important;
      padding: 22px 24px;
      background: linear-gradient(135deg, #f8fafc, #f0fdf9);
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      margin-bottom: 28px;
    }

    .patient-avatar {
      width: 80px; height: 80px;
      border-radius: 50%;
      border: 3px solid #fff;
      box-shadow: 0 4px 16px rgba(15,118,110,0.18);
      background: linear-gradient(135deg, #d1fae5, #a7f3d0);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      font-size: 1.7rem; font-weight: 800; color: var(--accent);
      overflow: hidden;
    }
    .patient-avatar img {
      width: 100%; height: 100%;
      object-fit: cover; border-radius: 50%;
    }

    .patient-hero-info h3 {
      font-family: "Outfit", sans-serif;
      font-size: 1.45rem; font-weight: 400;
      color: var(--text-dark);
      margin-bottom: 4px;
    }
    .patient-hero-info .mobile-line {
      font-size: .82rem; color: var(--text-light);
      margin-bottom: 10px; display: flex; align-items: center; gap: 5px;
    }
    .patient-hero-info .mobile-line i { font-size: .82rem; }

    .meta { display: flex; flex-wrap: wrap; gap: 7px; align-items: center; }
    .meta-chip {
      display: inline-flex; align-items: center; gap: 5px;
      background: rgba(15,118,110,0.07);
      border: 1px solid rgba(15,118,110,0.15);
      border-radius: 50px;
      padding: 4px 13px;
      font-size: .74rem; font-weight: 600; color: var(--accent);
    }
    .meta-chip i { font-size: .74rem; }
    .meta-chip.blue {
      background: rgba(29,78,216,0.07);
      border-color: rgba(29,78,216,0.15);
      color: var(--accent-blue);
    }

    /* ── Section Headings ── */
    .section-heading {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 14px;
    }
    .section-icon {
      width: 34px; height: 34px; border-radius: 10px;
      background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
      display: flex; align-items: center; justify-content: center;
    }
    .section-icon i { color: #fff; font-size: 14px; }
    .section-icon.blue {
      background: linear-gradient(135deg, var(--accent-blue) 0%, #60a5fa 100%);
    }
    .section-heading h6 {
      font-size: .85rem; font-weight: 700;
      color: var(--text-dark); margin: 0;
    }

    /* ── Info Grid ── */
    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 10px;
    }
    .info-item {
      background: #f8fafc;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 13px 15px;
      transition: border-color var(--transition);
    }
    .info-item:hover { border-color: rgba(15,118,110,0.25); }
    .info-item .lbl {
      font-size: .62rem; font-weight: 700;
      color: var(--text-dim);
      letter-spacing: .08em; text-transform: uppercase;
      margin-bottom: 4px;
    }
    .info-item .val {
      font-size: .9rem; font-weight: 600; color: var(--text-dark);
    }
    .info-item .val.empty { color: var(--text-dim); font-style: italic; font-weight: 400; }
    .info-item.full-width { grid-column: 1 / -1; }

    /* ── Divider ── */
    .form-divider {
      border: none;
      border-top: 1px dashed #e2e8f0;
      margin: 0 0 24px;
    }

    /* ── Action Buttons ── */
    .btn-nav {
      border-radius: 50px;
      padding: 12px 28px;
      font-family: "Outfit", sans-serif;
      font-weight: 700; font-size: .88rem;
      letter-spacing: .04em; border: none;
      cursor: pointer; transition: var(--transition);
      display: inline-flex; align-items: center; gap: 8px;
    }
    .btn-download {
      background: linear-gradient(135deg, var(--accent), var(--accent-light));
      color: #fff;
      box-shadow: 0 6px 24px rgba(15,118,110,0.28);
    }
    .btn-download:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(15,118,110,0.38);
    }
    .btn-new {
      background: linear-gradient(135deg, var(--accent-blue), #132f5c);
      color: #fff;
      box-shadow: 0 6px 24px rgba(29,78,216,0.22);
    }
    .btn-new:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(29,78,216,0.34);
    }
    

    /* ── PDF hidden styles ── */
    .pdf-mode button,
    .pdf-mode .btn,
    .pdf-mode .action-row { display: none !important; }

    /* ── Responsive ── */
    @media (max-width: 575px) {
      .card-inner { padding: 20px 16px; }
      .card-header-strip { padding: 14px 16px; }
      .patient-hero { flex-direction: column; align-items: flex-start; gap: 14px; padding: 16px; }
      .info-grid { grid-template-columns: 1fr; }
      .action-row { flex-direction: column; }
      .btn-nav { width: 100%; justify-content: center; }
    }
    @media (max-width: 375px) {
      .card-inner { padding: 14px 10px; }
    }

    @media print {
      @page { size: A4; margin: 15mm; }
      body { background: #fff !important; }
      .success-banner, .action-row, body::before, body::after { display: none !important; }
      .main-content { padding: 0 !important; }
      .form-card {   background: transparent !important; box-shadow: none !important; max-width: 100% !important; margin: 0 !important; border-radius: 0 !important; }
      .card-inner { padding: 10mm !important; }
      .info-grid { grid-template-columns: repeat(2, 1fr) !important; }
      .patient-hero, .info-section { page-break-inside: avoid; }
    }
  </style>
</head>
<body>

<div class="page-wrapper">
  <div class="main-content">

    <!-- ── Success Banner ── -->
    <div class="success-banner">
      <div class="banner-inner">
        <div class="d-flex align-items-center gap-3 flex-wrap">

          <!-- Logo -->
          <div class="banner-logo-wrap">
            <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="Unico Hospital Logo">
          </div>

          <div class="banner-divider d-none d-md-block"></div>

          <!-- Check icon -->
          {{-- <div class="banner-check">
            <i class="ti ti-check"></i>
          </div> --}}

          <!-- Text -->
          <div class="banner-text flex-grow-1">
            <h3>Thank You for Registering!</h3>
            <h4>Unico Hospital PLC</h4>
            <p>All information has been saved successfully. Please provide your name or phone number at the reception desk.</p>
            <p style="margin-top:8px;">
              <b>Address:</b>
              <a href="https://maps.app.goo.gl/mjN8w5R5cSYCwxc67" target="_blank">
                23 Bir Uttam K. M. Shafiullah Sarak (Green Road), Dhaka-1205
              </a>
            </p>
            <p><b>Contact:</b> 09677667766, 09677661166 &nbsp;|&nbsp; <b>Email:</b> info@unicohospitals.com</p>
          </div>

        </div>
      </div>
    </div>

    <!-- ── Patient Card ── -->
    <div class="form-card">
      <!-- Card Header -->
      <div class="card-header-strip">
        <span class="header-title">
          <i class="ti ti-id"></i> Patient Registration Summary
        </span>
        {{-- <span class="patient-id-badge">
          <i class="ti ti-hash"></i> UNH-2025-00842
        </span> --}}
      </div>

      <!-- Card Body -->
      <div class="card-inner" id="printArea">

        <!-- ── Patient Hero ── -->
        <div class="patient-hero">
          <div class="patient-avatar">
            @if(!empty($latestEntry->patient_photo))
              {{-- <img src="{{ asset('uploads/patient/' . $latestEntry->patient_photo) }}"
                   alt="{{ $latestEntry->full_name }}"
                   onerror="this.style.display='none'"> --}}
                   <img src="data:{{ $latestEntry->patient_photo_type }};base64,{{ base64_encode($latestEntry->patient_photo) }}">
            @else
              {{ strtoupper(substr($latestEntry->full_name, 0, 2)) }}
            @endif
          </div>
          <div class="patient-hero-info">
            <h3>{{ $latestEntry->full_name }}</h3>
            <div class="mobile-line">
              <i class="ti ti-phone"></i>
              {{ $latestEntry->mobile }}
            </div>
            <div class="meta">
              <span class="meta-chip">
                <i class="ti ti-gender-{{ strtolower($latestEntry->gender) }}"></i>
                {{ ucfirst(strtolower($latestEntry->gender)) }}
              </span>
              <span class="meta-chip blue">
                <i class="ti ti-cake"></i>
                {{ explode('-', $latestEntry->age)[0] }} Years
              </span>
            </div>
          </div>
        </div>

        <hr class="form-divider">

        <!-- ── Action Buttons ── -->
        <div class="action-row d-flex justify-content-end gap-3 flex-wrap">
          <button class="btn-nav btn-download" onclick="downloadPDF()">
            <i class="ti ti-download"></i> Download PDF
          </button>
          <button class="btn-nav btn-new" onclick="window.location.href='{{ route('patient_registration') }}'">
            <i class="ti ti-user-plus"></i> New Registration
          </button>
        </div>

      </div><!-- /.card-inner -->
    </div><!-- /.form-card -->

  </div><!-- /.main-content -->
</div><!-- /.page-wrapper -->

<script>
function downloadPDF() {
  const element = document.getElementById('printArea');
  element.classList.add('pdf-mode');

  const opt = {
    margin: 0,
    filename: 'patient-registration.pdf',
    image: { type: 'jpeg', quality: 1 },
    html2canvas: { scale: 2, useCORS: true },
    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
  };

  html2pdf().set(opt).from(element).save().then(() => {
    element.classList.remove('pdf-mode');
  });
}
</script>
</body>
</html>