<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Virtual Card</title>
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

   body {
        font-family: "Outfit", sans-serif;
        background: var(--bg);
        min-height: 100vh;
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
      height: 90px;
      background: linear-gradient(135deg, #0f766e 0%, #14b8a6 60%, #0ea5e9 100%);
      z-index: 0;
    }
    .card-stripe::after {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* Decorative circle on stripe */
    .stripe-circle {
      position: absolute;
      width: 160px; height: 160px;
      border-radius: 50%;
      background: rgba(255,255,255,0.06);
      top: -60px; right: -30px;
      z-index: 1; pointer-events: none;
    }
    .stripe-circle2 {
      position: absolute;
      width: 90px; height: 90px;
      border-radius: 50%;
      background: rgba(255,255,255,0.08);
      top: -20px; right: 80px;
      z-index: 1; pointer-events: none;
    }

    /* Shimmer */
    .card-shimmer {
      position: absolute; inset: 0;
      background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.06) 50%, transparent 60%);
      background-size: 200% 100%;
      animation: shimmer 3.5s ease-in-out infinite;
      z-index: 10; pointer-events: none;
    }
    @keyframes shimmer {
      0%   { background-position: 200% 0; }
      100% { background-position: -200% 0; }
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
      justify-content: space-between;
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
    /* Chip */
    /* .card-chip {
      width: 36px; height: 26px;
      border-radius: 5px;
      background: linear-gradient(135deg, #d4a843, #f5c842, #b8902d);
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.4), 0 2px 6px rgba(0,0,0,0.2);
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-rows: 1fr 1fr 1fr;
      gap: 2px; padding: 4px;
    } */
    .chip-cell { background: rgba(0,0,0,0.15); border-radius: 1px; }

    /* Avatar floats over the stripe/white divide */
    .card-mid {
      display: flex;
      align-items: flex-end;
      gap: 14px;
      margin-top: 4px;
    }
    .patient-avatar {
      width: 58px; height: 58px;
      border-radius: 14px;
      border: 3px solid #fff;
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
      border-top: 1px solid #f1f5f9;
      padding-top: 10px;
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

    /* ── Details Panel ── */
    .details-panel {
      position: relative; z-index: 1;
      width: var(--card-w);
      background: #fff;
      border: 1px solid rgba(0,0,0,0.07);
      border-radius: 20px;
      padding: 24px 26px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.06);
      animation: fadeUp 0.9s ease 0.2s both;
    }
    .panel-header {
      font-size: .62rem; font-weight: 700;
      letter-spacing: .12em; text-transform: uppercase;
      color: var(--accent); margin-bottom: 16px;
      display: flex; align-items: center; gap: 8px;
    }
    .panel-header::after {
      content: ''; flex: 1;
      height: 1px; background: #e2e8f0;
    }
    .details-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }
    .detail-item .d-label {
      font-size: .58rem; font-weight: 700;
      letter-spacing: .1em; text-transform: uppercase;
      color: #94a3b8; margin-bottom: 3px;
    }
    .detail-item .d-val {
      font-size: .85rem; font-weight: 600; color: #1e293b;
    }
    .detail-item.wide { grid-column: 1 / -1; }

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

    @media (max-width: 480px) {
      :root { --card-w: 340px; --card-h: 215px; }
      .details-panel { width: 340px; }
      .card-body { padding: 14px 16px 16px; }
      .patient-name { font-size: .92rem; }
      .card-stripe { height: 78px; }
    }
    @media (max-width: 360px) {
      :root { --card-w: 300px; --card-h: 195px; }
      .details-panel { width: 300px; }
    }
  </style>
</head>
<body>

  <div class="page-title">
    {{-- <span class="pill">Patient Card</span> --}}
    <h1>Your Medical Identity</h1>
    <p>Unico Hospital PLC — Digital Patient Record</p>
  </div>

  <!-- ── Virtual Card ── -->
  <div class="card-stage">
    <div class="patient-card" id="patientCard">
      <div class="card-stripe">
        <div class="stripe-circle"></div>
        <div class="stripe-circle2"></div>
      </div>
      <div class="card-shimmer"></div>
      

      <div class="card-body">
        <!-- Top -->
        <div class="card-top">
          <div class="hospital-brand">
            <div class="hospital-logo">
                <img src="{{ asset('assets/img/unico_icon.jpg') }}" width="50" style="border-radius: 10%; margin-top: 10px;" alt="Unico Logo">
            
            </div>
            <div class="hospital-name">
              <div class="name">Unico Hospital</div>
              <div class="sub">Patient Identity Card</div>
            </div>
          </div>
        </div>

        <!-- Mid -->
        <div class="card-mid">
          <div class="patient-avatar" id="cardAvatar">  <img src="data:{{ $latestEntry->patient_photo_type }};base64,{{ base64_encode($latestEntry->patient_photo) }}"></div>
          <div class="patient-details">
            <div class="patient-name">{{ $latestEntry->full_name }}</div>
            <div class="patient-meta">
              <span class="meta-tag"><i class="ti ti-gender-{{ strtolower($latestEntry->gender) }}"></i> {{ $latestEntry->gender }}</span>
              <span class="meta-tag" style="color:#cbd5e1">•</span>
              <span class="meta-tag"><i class="ti ti-cake"></i> {{ $latestEntry->age }} Years</span>
              <span class="meta-tag" style="color:#cbd5e1">•</span>
              <span class="meta-tag"><i class="ti ti-phone"></i> {{ $latestEntry->mobile }}</span>
            </div>
          </div>
        </div>

        <!-- Bottom -->
        <div class="card-bottom">
          <div class="patient-id-section">
            <div class="id-label">Patient ID</div>
            <div class="id-number">UNH-2025-00842</div>
          </div>
          {{-- <div class="card-qr">
            <i class="ti ti-qrcode"></i>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- ── Details Panel ── -->
  <div class="details-panel">
    <div class="panel-header"><i class="ti ti-id"></i> Registration Details</div>
    <div class="details-grid">
      <div class="detail-item">
        <div class="d-label">Full Name</div>
        <div class="d-val">{{ $latestEntry->full_name ?? '' }}</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Date of Birth</div>
        <div class="d-val">{{ $latestEntry->dob ?? '' }}</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Gender</div>
        <div class="d-val">{{ $latestEntry->gender ?? '' }}</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Age</div>
        <div class="d-val">{{ $latestEntry->age ?? '' }} Years</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Mobile</div>
        <div class="d-val">{{ $latestEntry->mobile ?? '' }}</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Religion</div>
        <div class="d-val">{{ $latestEntry->religion ?? '' }}</div>
      </div>
      <div class="detail-item wide">
        <div class="d-label">Address</div>
        <div class="d-val">{{ $latestEntry->address ?? '' }}</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Reg. Date</div>
        <div class="d-val">{{ $latestEntry->created_at->format('d M Y') ?? '' }}</div>
      </div>
      <div class="detail-item">
        <div class="d-label">Category</div>
        <div class="d-val" style="color:#0f766e; font-weight:700;">● {{ $latestEntry->patient_category ?? ''}}</div>
      </div>
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