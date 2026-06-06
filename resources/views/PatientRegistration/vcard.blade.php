<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Virtual Card</title>

    <link rel="icon" href="{{ asset('img/favicon_icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <style>
    :root {
      --bg: #f0f4f8;
      --accent: #0f766e;
      --accent2: #1d4ed8;
      --accent3: #e84c6b;
      --card-w: 420px;
      --card-h: 260px;
      --radius: 22px;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    .barcode svg text {
        display: none !important;
        visibility: hidden !important;
    }
   body {
        font-family: "Outfit", sans-serif;
        background: var(--bg);
        /* min-height: 100vh; */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 36px;
        padding: 40px 16px;
        overflow-x: hidden;
        position: relative;
    }

    /* Shadow SVG */
    body::before {
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

    /* Gradient Glow */
    body::after {
        content: "";
        position: fixed;
        inset: 0;
        background:
            radial-gradient(
                ellipse 600px 400px at 15% 15%,
                rgba(20, 184, 166, 0.10) 0%,
                transparent 70%
            ),
            radial-gradient(
                ellipse 500px 400px at 85% 85%,
                rgba(29, 78, 216, 0.08) 0%,
                transparent 70%
            );
        pointer-events: none;
        z-index: 0;
    }


    .card-top h3 {
      font-size: clamp(1.0rem, 2.5vw, 1.45rem);
      font-weight: 300; margin-bottom: 2px; color: #fff;
    }

    /* ── Page Title ── */
    .page-title {
      position: relative; z-index: 1;
      text-align: center;
      animation: fadeUp 0.7s ease both;
    }
    .page-title .pill {
      display: inline-block;
      background: rgba(15,118,110,0.1);
      border: 1px solid rgba(15,118,110,0.25);
      color: var(--accent);
      font-size: .7rem; font-weight: 700;
      letter-spacing: .12em; text-transform: uppercase;
      border-radius: 50px; padding: 4px 14px;
      margin-bottom: 10px;
    }
    .page-title h1 {
       font-family: "Outfit", sans-serif;
      font-size: clamp(1.5rem, 4vw, 2.2rem);
      color: #0f172a;
      letter-spacing: -0.02em; margin-bottom: 5px;
    }
    .page-title p { font-size: .85rem; color: #64748b; }

    /* ── Card Stage ── */
    .card-stage {
      position: relative; z-index: 1;
      perspective: 1200px;
      animation: fadeUp 0.8s ease 0.1s both;

    }

    /* ── The Card ── */
    .patient-card {
      width: var(--card-w);
      height: var(--card-h);
      border-radius: var(--radius);
      position: relative;
      overflow: hidden;
      background: #ffffff;
      box-shadow:
        0 0 0 1px rgba(0,0,0,0.06),
        0 24px 60px rgba(0,0,0,0.12),
        0 4px 16px rgba(0,0,0,0.06);
      transition: transform 0.5s cubic-bezier(.22,1,.36,1), box-shadow 0.5s ease;
      cursor: default;
            border-bottom: 25px solid #158dc9;
    }
    .patient-card:hover {
      transform: rotateY(-5deg) rotateX(3deg) scale(1.02);
      box-shadow:
        0 0 0 1px rgba(0,0,0,0.08),
        0 40px 80px rgba(0,0,0,0.18),
        0 8px 24px rgba(0,0,0,0.08);
    }
    

    /* Top color bar */
    .card-stripe {
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 40px;
      background: #158dc9;
      z-index: 0;
    }

    /* Card content */
    .card-body {
      position: relative; z-index: 6;
      padding: 18px 22px 20px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    /* Top: hospital brand */
    .card-top {
      display: flex;
      align-items: center;
      width: 100%;
      margin-top: -8px;
    }
    .hospital-brand {
      display: flex; align-items: center; gap: 20px;
    }
    .hospital-logo {
      margin-left: 16px;
      width: 32px; height: 32px;
      border-radius: 8px;
      background: rgba(255,255,255,0.25);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.35);
      display: flex; align-items: center; justify-content: center;
    }
    .hospital-logo i { color: #fff; font-size: 15px; }
    .hospital-name .name {
      font-size: .75rem; font-weight: 800;
      color: #fff; letter-spacing: .03em; 
      
    }
    .hospital-name .sub {
      font-size: .58rem; color: rgba(255,255,255,0.7);
      font-weight: 400; letter-spacing: .06em; text-transform: uppercase;
    }
    .chip-cell { background: rgba(0,0,0,0.15); border-radius: 1px; }

    /* Avatar floats over the stripe/white divide */
    .card-mid {
      display: flex;
      align-items: flex-start;
    }
    .patient-avatar {
      width: 90px; height: 90px;
      border-radius: 14px;
      border: 2px solid #000;
      box-shadow: 0 4px 16px rgba(0,0,0,0.15);
      background: linear-gradient(135deg, #e0f2f1, #b2dfdb);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem; font-weight: 800; color: var(--accent);
      flex-shrink: 0; overflow: hidden;
    }
    .patient-avatar img { width: 100%; height: 100%; object-fit: cover; }

    .patient-details { flex: 1; }
    .patient-name {
      font-size: 1.05rem; font-weight: 800;
      color: #0f172a; letter-spacing: -0.01em;
      line-height: 1.1; margin-bottom: 5px;
    }
    .patient-meta { display: flex; gap: 8px; flex-wrap: wrap; }
    .meta-tag {
      font-size: .6rem; font-weight: 600;
      letter-spacing: .05em; text-transform: uppercase;
      color: #64748b;
      display: flex; align-items: center; gap: 3px;
    }
    .meta-tag i { font-size: .6rem; }

    /* Bottom */
    .card-bottom {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      padding-top: 15px;
    }
    .patient-id-section .id-label {
      font-size: .52rem; font-weight: 700;
      letter-spacing: .12em; text-transform: uppercase;
      color: #94a3b8; margin-bottom: 2px;
    }
    .patient-id-section .id-number {
      font-family: "Courier New", monospace;
      font-size: .8rem; font-weight: 700;
      color: var(--accent); letter-spacing: .1em;
    }
    .card-qr {
      width: 36px; height: 36px;
      border-radius: 8px;
      border: 1.5px solid #e2e8f0;
      background: #f8fafc;
      display: flex; align-items: center; justify-content: center;
    }
    .card-qr i { font-size: 20px; color: #94a3b8; }


     /* ── Success Banner ── */
    .success-banner {
      width: 90%;
      /* margin: 0 auto 28px; */
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



    /* ── Download Button ── */
    .download-btn {
      position: relative; z-index: 1;
      border: none;
      background: linear-gradient(135deg, #0f766e, #14b8a6);
      color: #fff;
      font-family: "Outfit", sans-serif;
      font-size: .88rem; font-weight: 700;
      letter-spacing: .04em;
      padding: 14px 36px;
      border-radius: 50px;
      cursor: pointer;
      display: inline-flex; align-items: center; gap: 10px;
      box-shadow: 0 8px 28px rgba(15,118,110,0.30);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      animation: fadeUp 1s ease 0.3s both;
    }
    .download-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 40px rgba(15,118,110,0.42);
    }
    .download-btn:active { transform: translateY(0); }
    .download-btn .btn-loading { display: none; }
    .download-btn.loading .btn-text { display: none; }
    .download-btn.loading .btn-loading { display: flex; align-items: center; gap: 8px; }

    .spinner {
      width: 16px; height: 16px;
      border: 2px solid rgba(255,255,255,0.35);
      border-top-color: #fff;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    .toast {
      position: fixed;
      bottom: 30px; left: 50%;
      transform: translateX(-50%) translateY(80px);
      background: #0f766e;
      color: #fff;
      font-size: .85rem; font-weight: 600;
      padding: 12px 28px;
      border-radius: 50px;
      display: flex; align-items: center; gap: 10px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.18);
      transition: transform 0.4s cubic-bezier(.22,1,.36,1), opacity 0.4s ease;
      z-index: 1000; opacity: 0; pointer-events: none;
    }
    .toast.show { transform: translateX(-50%) translateY(0); opacity: 1; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

  </style>
</head>
<body>

  {{-- <div class="page-title">
    <span class="pill">Patient Card</span>
    <h1>Your Medical Identity</h1>
    <p>Unico Hospital PLC — Digital Patient Record</p>
  </div> --}}

      <!-- ── Success Banner ── -->
    <div class="success-banner">
      <div class="banner-inner">
        <div class="d-flex align-items-center gap-3 flex-wrap">

          <div class="banner-logo-wrap">
            <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="Unico Hospital Logo">
          </div>

          <div class="banner-divider d-none d-md-block"></div>

          {{-- <div class="banner-icon">
            <i class="ti ti-file-certificate"></i>
          </div> --}}

          <div class="banner-text flex-grow-1">
            <h3> Download Your Patient Registration Card </h3>
            <h4>Unico Hospital PLC</h4>
            <p>Please read all terms carefully before signing. By registering at Unico Hospital you confirm your acceptance of these conditions.</p>
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

  <!-- ── Virtual Card ── -->
  <div class="card-stage">
    <div class="patient-card" id="patientCard">
      <div class="card-stripe"></div>
      

      <div class="card-body">
        <!-- Top -->
      <div class="card-top text-center">
          <h3 class="fw-bold" style=" width: 100%; padding: 0; text-align: center; margin-top: 0; color: #fff; letter-spacing: .01em;">PATIENT REGISTRATION CARD</h3>
      </div>
        <!-- Mid -->
        <div class="card-mid mt-3">
        
          <div class="patient-details">
         <div><b style="display:inline-block; width:50px;">Name</b>: {{ $latestEntry->full_name }}</div>
        <div><b style="display:inline-block; width:50px;">UHID</b>: {{ $latestEntry->uhid }}</div>
        <div><b style="display:inline-block; width:50px;">SEX</b>: {{ $latestEntry->gender }}</div>
        @php
            $cleanAge = str_replace(' Years', '', $latestEntry->age ?? '');
            $firstValue = explode('-', $cleanAge)[0];
        @endphp
        <div><b style="display:inline-block; width:50px;">AGE</b>: {{ $firstValue }} Years</div>
                  
          </div>
            <div class="patient-avatar" id="cardAvatar">  <img src="data:{{ $latestEntry->patient_photo_type }};base64,{{ base64_encode($latestEntry->patient_photo) }}"></div>
        </div>
      {{-- @php  dd($barcode); @endphp --}}
     
        <!-- Bottom -->
       <div class="card-bottom d-flex justify-content-center mt-3">
          <div class="barcode">
              {!! \DNS1D::getBarcodeSVG((string)$latestEntry->id, 'C128', 4, 50) !!}
          </div>
      </div>
      </div>
       <div class="card-stripe"></div>
    </div>
  </div>


  <!-- ── Download Button ── -->
  <button class="download-btn" onclick="downloadCard()" id="dlBtn">
    <span class="btn-text"><i class="ti ti-download"></i> Download Patient Card</span>
    <span class="btn-loading"><div class="spinner"></div> Generating...</span>
  </button>

  <div class="toast" id="toast">
    <i class="ti ti-circle-check"></i> Card downloaded successfully!
  </div>

<script>
async function downloadCard() {
  const btn = document.getElementById('dlBtn');
  btn.classList.add('loading');
  try {
    const card = document.getElementById('patientCard');
    card.style.transform = 'none';
    const canvas = await html2canvas(card, {
      scale: 3,
      useCORS: true,
      backgroundColor: '#ffffff',
      logging: false,
    });
    const link = document.createElement('a');
    link.download = 'unico-patient-card.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
    btn.classList.remove('loading');
    showToast();
  } catch (e) {
    btn.classList.remove('loading');
    alert('Download failed. Please try again.');
  }
}
function showToast() {
  const t = document.getElementById('toast');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3500);
}
</script>
</body>
</html>