<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Terms & Conditions – Unico Hospital PLC</title>
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

    .page-wrapper {
      position: relative; z-index: 1; min-height: 100vh;
    }
    .page-wrapper::before {
      content: "";
      position: fixed;
      top: 50%; left: 0;
      transform: translateY(-50%);
      width: 90%; height: 100%;
      background: url("https://unicohospitals.com/images/static/shadow.svg") no-repeat left center;
      background-size: contain;
      opacity: 0.2;
      pointer-events: none;
      z-index: 0;
      filter: drop-shadow(10px 10px 40px rgba(0,0,0,0.3));
    }

    .main-content {
      padding: 40px 16px 70px;
      position: relative; z-index: 1;
      min-height: 100vh;
    }

    /* ── Banner ── */
    .success-banner {
      max-width: 90%;
      margin: 0 auto 28px;
      padding: 28px 32px;
      background: linear-gradient(135deg, #0f766e 0%, #14b8a6 60%, #0ea5e9 100%);
      border-radius: var(--radius);
      color: #fff;
      box-shadow: 0 12px 48px rgba(15,118,110,0.28);
      animation: fadeUp 0.6s ease both;
      position: relative; overflow: hidden;
    }
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
    .banner-logo-wrap img {
      width: 120px; height: 120px;
      object-fit: contain; border-radius: 10%;
    }
    .banner-icon {
      width: 66px; height: 66px;
      background: rgba(255,255,255,0.2);
      border: 2px solid rgba(255,255,255,0.4);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      animation: popIn 0.5s cubic-bezier(.22,1,.36,1) 0.3s both;
      flex-shrink: 0;
    }
    .banner-icon i { font-size: 30px; color: #fff; }
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
      .banner-text { text-align: center; }
      .banner-icon { margin: 0 auto 12px; }
    }

    /* ── Form Card ── */
    .form-card {
      max-width: 90%;
      margin: 0 auto;
      background: transparent !important;
      border-radius: var(--radius);
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      overflow: hidden;
      animation: fadeUp 0.7s ease 0.1s both;
    }

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

    .effective-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(15,118,110,0.08);
      border: 1.5px solid rgba(15,118,110,0.2);
      border-radius: 50px;
      padding: 6px 18px;
      font-weight: 700; color: var(--accent);
      font-size: .82rem; letter-spacing: .06em;
    }
    .effective-badge i { font-size: .8rem; opacity: .7; }

    .card-inner { padding: 32px 32px 28px; }

    /* ── Section heading ── */
    .section-heading {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 14px;
    }
    .section-icon {
      width: 34px; height: 34px; border-radius: 10px;
      background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .section-icon i { color: #fff; font-size: 14px; }
    .section-icon.blue { background: linear-gradient(135deg, var(--accent-blue) 0%, #60a5fa 100%); }
    .section-icon.red  { background: linear-gradient(135deg, var(--accent-red) 0%, #fb7185 100%); }
    .section-icon.amber { background: linear-gradient(135deg, #d97706 0%, #fbbf24 100%); }
    .section-heading h6 {
      font-size: .92rem; font-weight: 700;
      color: var(--text-dark); margin: 0;
    }

    /* ── Terms Section ── */
    .terms-section {
      background: #f8fafc;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 20px 22px;
      margin-bottom: 16px;
      transition: border-color var(--transition);
    }
    .terms-section:hover { border-color: rgba(15,118,110,0.25); }

    .terms-section ul {
      list-style: none;
      padding: 0; margin: 0;
    }
    .terms-section ul li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: .875rem;
      color: var(--text-mid);
      line-height: 1.65;
      padding: 6px 0;
      border-bottom: 1px dashed #e9eef4;
    }
    .terms-section ul li:last-child { border-bottom: none; }
    .terms-section ul li::before {
      content: '';
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--accent);
      margin-top: 8px;
      flex-shrink: 0;
    }
    .terms-section.blue ul li::before { background: var(--accent-blue); }
    .terms-section.red  ul li::before { background: var(--accent-red); }
    .terms-section.amber ul li::before { background: #d97706; }

    /* ── Form Divider ── */
    .form-divider {
      border: none;
      border-top: 1px dashed #e2e8f0;
      margin: 0 0 24px;
    }

    /* ── Consent Block ── */
    .consent-block {
      background: linear-gradient(135deg, rgba(15,118,110,0.05), rgba(20,184,166,0.08));
      border: 1.5px solid rgba(15,118,110,0.2);
      border-radius: var(--radius-sm);
      padding: 22px 24px;
      margin-bottom: 24px;
    }
    .consent-block p {
      font-size: .88rem; color: var(--text-mid);
      line-height: 1.7; margin: 0;
    }
    .consent-block strong { color: var(--text-dark); }

    /* ── Signature Row ── */
    .signature-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 28px;
    }
    .sig-box {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 16px 18px;
    }
    .sig-box .sig-lbl {
      font-size: .62rem; font-weight: 700;
      color: var(--text-dim);
      letter-spacing: .08em; text-transform: uppercase;
      margin-bottom: 32px;
    }
    .sig-box .sig-line {
      border-top: 1.5px solid #cbd5e1;
      padding-top: 6px;
      font-size: .75rem; color: var(--text-dim);
      font-style: italic;
    }
    @media (max-width: 575px) {
      .signature-row { grid-template-columns: 1fr; }
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

    /* ── Notice box ── */
    .notice-box {
      display: flex; align-items: flex-start; gap: 12px;
      background: rgba(232,76,107,0.06);
      border: 1.5px solid rgba(232,76,107,0.2);
      border-radius: var(--radius-sm);
      padding: 16px 18px;
      margin-bottom: 24px;
    }
    .notice-box i { color: var(--accent-red); font-size: 1.2rem; margin-top: 1px; }
    .notice-box p { font-size: .82rem; color: var(--text-mid); line-height: 1.6; margin: 0; }

    /* Print / PDF */
    .pdf-mode button,
    .pdf-mode .btn,
    .pdf-mode .action-row { display: none !important; }

    @media print {
      @page { size: A4; margin: 15mm; }
      body { background: #fff !important; }
      .success-banner, .action-row, body::before, body::after { display: none !important; }
      .main-content { padding: 0 !important; }
      .form-card { background: transparent !important; box-shadow: none !important; max-width: 100% !important; margin: 0 !important; border-radius: 0 !important; }
      .card-inner { padding: 10mm !important; }
      .terms-section, .consent-block, .sig-box { page-break-inside: avoid; }
    }

    @media (max-width: 575px) {
      .card-inner { padding: 20px 16px; }
      .card-header-strip { padding: 14px 16px; }
      .action-row { flex-direction: column; }
      .btn-nav { width: 100%; justify-content: center; }
    }
  </style>
</head>
<body>

<div class="page-wrapper">
  <div class="main-content">

    <!-- ── Banner ── -->
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
            <h3>Patient Terms &amp; Conditions</h3>
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

    <!-- ── Main Card ── -->
    <div class="form-card">

      <div class="card-header-strip">
        <span class="header-title">
          <i class="ti ti-file-text"></i> Terms &amp; Conditions of Patient Registration
        </span>
        <span class="effective-badge">
          <i class="ti ti-calendar"></i> Effective: January 2025
        </span>
      </div>

      <div class="card-inner" id="printArea">

        <!-- 1. Admission & Registration -->
        <div class="section-heading">
          <div class="section-icon"><i class="ti ti-door-enter"></i></div>
          <h6>1. Admission &amp; Registration</h6>
        </div>
        <div class="terms-section mb-4">
          <ul>
            <li>Patients must provide accurate and complete personal information during registration. Any false information may result in refusal or termination of services.</li>
            <li>Registration does not guarantee immediate admission. Bed availability, clinical assessment, and specialist availability determine admission priority.</li>
            <li>A valid national ID, passport, or birth certificate must be presented upon request for identity verification.</li>
            <li>A legal guardian or authorized representative must sign on behalf of minors (under 18) or incapacitated patients.</li>
            <li>Unico Hospital reserves the right to refuse non-emergency services if registration requirements are not met.</li>
          </ul>
        </div>

        <!-- 2. Medical Treatment & Consent -->
        <div class="section-heading">
          <div class="section-icon blue"><i class="ti ti-stethoscope"></i></div>
          <h6>2. Medical Treatment &amp; Informed Consent</h6>
        </div>
        <div class="terms-section blue mb-4">
          <ul>
            <li>By registering, patients or their legal guardians consent to routine examinations, diagnostic procedures, and treatments deemed necessary by the attending physician.</li>
            <li>For surgical procedures, anesthesia, or invasive interventions, a separate written informed consent form must be signed prior to the procedure.</li>
            <li>Patients have the right to refuse treatment; however, the hospital shall not be liable for any adverse outcomes resulting from such refusal.</li>
            <li>Unico Hospital physicians follow evidence-based clinical guidelines; however, medical outcomes cannot be guaranteed.</li>
            <li>Patients are encouraged to disclose all current medications, allergies, and past medical history to facilitate safe treatment.</li>
          </ul>
        </div>

        <!-- 3. Payment & Billing -->
        <div class="section-heading">
          <div class="section-icon amber"><i class="ti ti-receipt"></i></div>
          <h6>3. Payment &amp; Billing Policy</h6>
        </div>
        <div class="terms-section amber mb-4">
          <ul>
            <li>Patients are financially responsible for all services rendered, including consultations, investigations, medications, procedures, and accommodation charges.</li>
            <li>An initial deposit may be required at the time of admission. The hospital will provide a detailed estimate on request.</li>
            <li>Final billing is generated upon discharge. Any outstanding balance must be settled before the patient leaves the facility.</li>
            <li>Insurance claims require valid documentation and prior authorization from the insurer; the patient remains liable for any uncovered balance.</li>
            <li>The hospital accepts cash, major debit/credit cards, and approved mobile banking methods (bKash, Nagad, Rocket).</li>
            <li>Itemized bills may be requested within 30 days of discharge. Billing disputes must be reported to the Finance Department within 7 working days.</li>
          </ul>
        </div>

        <!-- 4. Privacy & Data -->
        <div class="section-heading">
          <div class="section-icon"><i class="ti ti-lock"></i></div>
          <h6>4. Privacy &amp; Data Protection</h6>
        </div>
        <div class="terms-section mb-4">
          <ul>
            <li>All patient information is treated as strictly confidential in accordance with applicable Bangladeshi health privacy regulations.</li>
            <li>Medical records may be shared with referring physicians, specialists, or authorized parties solely for the purpose of continuing care.</li>
            <li>Patient data will not be disclosed to third parties without written consent, except as required by law or court order.</li>
            <li>Unico Hospital maintains electronic health records secured with industry-standard encryption and access controls.</li>
            <li>Patients may request access to or copies of their medical records through the Medical Records Department, subject to applicable fees.</li>
          </ul>
        </div>

        <!-- 5. Rights & Responsibilities -->
        <div class="section-heading">
          <div class="section-icon blue"><i class="ti ti-shield-check"></i></div>
          <h6>5. Patient Rights &amp; Responsibilities</h6>
        </div>
        <div class="terms-section blue mb-4">
          <ul>
            <li>Patients have the right to receive dignified, respectful, and non-discriminatory care regardless of gender, religion, or socioeconomic status.</li>
            <li>Patients have the right to be informed about their diagnosis, treatment options, and potential risks in a language they understand.</li>
            <li>Patients are responsible for following prescribed treatment plans and notifying healthcare providers of any changes in their condition.</li>
            <li>Disruptive, abusive, or threatening behavior toward staff, other patients, or visitors may result in discharge from the facility.</li>
            <li>Patients are responsible for safeguarding their personal belongings. The hospital is not liable for lost or stolen items.</li>
          </ul>
        </div>

        <!-- 6. Liability -->
        <div class="section-heading">
          <div class="section-icon red"><i class="ti ti-alert-triangle"></i></div>
          <h6>6. Liability &amp; Limitations</h6>
        </div>
        <div class="terms-section red mb-4">
          <ul>
            <li>Unico Hospital shall not be held liable for complications arising from pre-existing conditions, undisclosed medical history, or patient non-compliance.</li>
            <li>The hospital is not liable for delays in treatment caused by force majeure events including natural disasters, power failures, or civil unrest.</li>
            <li>Any claim or grievance must be submitted in writing to the Patient Relations Office within 30 days of the incident.</li>
            <li>Disputes shall be resolved in accordance with the laws of the People's Republic of Bangladesh; jurisdiction rests with courts in Dhaka.</li>
          </ul>
        </div>

        <hr class="form-divider">

        <!-- Important Notice -->
        <div class="notice-box">
          <i class="ti ti-info-circle"></i>
          <p>These terms may be updated periodically. The version in effect at the time of your registration will apply. For any queries, please contact the Patient Relations Office at the reception or email <strong>info@unicohospitals.com</strong>.</p>
        </div>

        <!-- Consent Statement -->
        <div class="consent-block mb-4">
          <p>
            <strong>Declaration:</strong> I, the undersigned patient / legal guardian / authorized representative, confirm that I have read, understood, and agree to all the Terms &amp; Conditions stated above. I acknowledge that the information I have provided during registration is true, complete, and accurate to the best of my knowledge. I consent to the collection, storage, and use of my personal and medical information by Unico Hospital PLC for the purpose of providing healthcare services.
          </p>
        </div>

        <!-- Signature Section -->
        <div class="signature-row">
          <div class="sig-box">
            <div class="sig-lbl">Patient / Guardian Signature</div>
            <div class="sig-line">Signature &amp; Date</div>
          </div>
          <div class="sig-box">
            <div class="sig-lbl">Patient Full Name (Print)</div>
            <div class="sig-line">Name &amp; Relationship (if Guardian)</div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-row d-flex justify-content-end gap-3 flex-wrap">
          {{-- <button class="btn-nav btn-download" onclick="downloadPDF()">
            <i class="ti ti-download"></i> Download PDF
          </button> --}}
          <button class="btn-nav btn-new" onclick="window.location.href='{{ route('patient_registration') }}'">
            <i class="ti ti-arrow-left"></i> Back to Registration
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
    margin: [10, 10, 10, 10],
    filename: 'unico-patient-terms-conditions.pdf',
    image: { type: 'jpeg', quality: 1 },
    html2canvas: { scale: 2, useCORS: true },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  html2pdf().set(opt).from(element).save().then(() => {
    element.classList.remove('pdf-mode');
  });
}
</script>
</body>
</html>