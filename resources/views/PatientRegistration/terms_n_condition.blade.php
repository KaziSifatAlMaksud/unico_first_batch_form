<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Terms & Conditions — Patient Consent</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --white: #ffffff;
      --off-white: #fafaf8;
      --paper: #f5f4f0;
      --ink: #1a1a18;
      --ink-light: #4a4a47;
      --ink-muted: #8a8a85;
      --rule: #d8d6cf;
      --accent: #c8a96e;
      --accent-light: #f0e8d6;
      --red-soft: #b84040;
    }

    html { scroll-behavior: smooth; }

    body {
      background: var(--off-white);
      font-family: 'Source Serif 4', Georgia, serif;
      color: var(--ink);
      min-height: 100vh;
    }

    /* ── HEADER ─────────────────────────────────────────── */
    header {
      background: var(--white);
      border-bottom: 1px solid var(--rule);
      padding: 40px 0 32px;
      text-align: center;
      position: relative;
    }

    header::after {
      content: '';
      display: block;
      width: 80px;
      height: 2px;
      background: var(--accent);
      margin: 20px auto 0;
    }

    .hospital-tag {
      font-size: 11px;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--ink-muted);
      margin-bottom: 12px;
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(26px, 4vw, 40px);
      font-weight: 700;
      color: var(--ink);
      line-height: 1.15;
    }

    h1 span {
      display: block;
      font-weight: 400;
      font-style: italic;
      font-size: 0.6em;
      color: var(--ink-muted);
      margin-top: 4px;
    }

    /* ── LAYOUT ─────────────────────────────────────────── */
    .page {
      max-width: 860px;
      margin: 0 auto;
      padding: 48px 24px 80px;
    }

    /* ── SECTION CARD ───────────────────────────────────── */
    .card {
      background: var(--white);
      border: 1px solid var(--rule);
      border-radius: 2px;
      margin-bottom: 32px;
      overflow: hidden;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }

    .card-header {
      background: var(--paper);
      border-bottom: 1px solid var(--rule);
      padding: 18px 32px;
      display: flex;
      align-items: baseline;
      gap: 12px;
    }

    .card-header h2 {
      font-family: 'Playfair Display', serif;
      font-size: 17px;
      font-weight: 600;
      color: var(--ink);
    }

    .card-header .bn {
      font-size: 13px;
      color: var(--ink-muted);
      font-style: italic;
    }

    .card-body {
      padding: 28px 32px;
    }

    /* ── BILINGUAL PARAGRAPH ────────────────────────────── */
    .bilingual {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      border: 1px solid var(--rule);
      border-radius: 2px;
      overflow: hidden;
    }

    .lang-block {
      padding: 24px 26px;
    }

    .lang-block:first-child {
      border-right: 1px solid var(--rule);
    }

    .lang-label {
      font-size: 10px;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--accent);
      font-family: 'Playfair Display', serif;
      margin-bottom: 10px;
    }

    .lang-block p {
      font-size: 14px;
      line-height: 1.78;
      color: var(--ink-light);
      font-weight: 300;
    }

    .lang-block.bn-block p {
      font-size: 13.5px;
      line-height: 1.9;
    }

    /* ── PARTICIPATION SECTION ──────────────────────────── */
    .choices {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .choice-item {
      display: flex;
      align-items: flex-start;
      gap: 16px;
      padding: 18px 22px;
      border: 1px solid var(--rule);
      border-radius: 2px;
      cursor: pointer;
      transition: background 0.18s, border-color 0.18s;
    }

    .choice-item:hover {
      background: var(--accent-light);
      border-color: var(--accent);
    }

    .choice-item.selected {
      background: var(--accent-light);
      border-color: var(--accent);
    }

    .checkbox-visual {
      width: 18px;
      height: 18px;
      border: 1.5px solid var(--rule);
      border-radius: 2px;
      flex-shrink: 0;
      margin-top: 2px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: border-color 0.18s, background 0.18s;
    }

    .choice-item.selected .checkbox-visual {
      background: var(--accent);
      border-color: var(--accent);
    }

    .checkbox-visual svg { display: none; }
    .choice-item.selected .checkbox-visual svg { display: block; }

    .choice-text strong {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: var(--ink);
      margin-bottom: 3px;
    }

    .choice-text span {
      font-size: 13px;
      color: var(--ink-muted);
      font-style: italic;
    }

    /* ── SIGNATURE AREA ─────────────────────────────────── */
    .sig-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-top: 8px;
    }

    .sig-field label {
      display: block;
      font-size: 11px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--ink-muted);
      margin-bottom: 10px;
    }

    .sig-line {
      border: none;
      border-bottom: 1px solid var(--ink);
      width: 100%;
      height: 36px;
      background: transparent;
      font-family: 'Source Serif 4', serif;
      font-size: 15px;
      color: var(--ink);
      padding: 0 4px;
      outline: none;
    }

    .sig-line:focus {
      border-bottom-color: var(--accent);
    }

    /* ── NOTE BOX ───────────────────────────────────────── */
    .note-box {
      border-left: 3px solid var(--accent);
      background: var(--accent-light);
      padding: 16px 20px;
      margin-top: 24px;
      font-size: 13px;
      color: var(--ink-light);
      line-height: 1.7;
    }

    .note-box strong { color: var(--ink); }

    /* ── SUBMIT ─────────────────────────────────────────── */
    .actions {
      text-align: center;
      margin-top: 40px;
    }

    .btn-primary {
      background: var(--ink);
      color: var(--white);
      border: none;
      padding: 16px 56px;
      font-family: 'Playfair Display', serif;
      font-size: 15px;
      letter-spacing: 0.06em;
      cursor: pointer;
      border-radius: 1px;
      transition: background 0.2s, transform 0.15s;
    }

    .btn-primary:hover {
      background: #333;
      transform: translateY(-1px);
    }

    .btn-sub {
      display: block;
      margin-top: 10px;
      font-size: 12px;
      color: var(--ink-muted);
    }

    /* ── FOOTER ─────────────────────────────────────────── */
    footer {
      text-align: center;
      padding: 32px 24px;
      border-top: 1px solid var(--rule);
      font-size: 12px;
      color: var(--ink-muted);
      background: var(--white);
    }

    /* ── RESPONSIVE ─────────────────────────────────────── */
    @media (max-width: 640px) {
      .bilingual { grid-template-columns: 1fr; }
      .lang-block:first-child { border-right: none; border-bottom: 1px solid var(--rule); }
      .sig-grid { grid-template-columns: 1fr; }
      .card-body { padding: 20px 18px; }
      .card-header { padding: 14px 18px; }
    }
  </style>
</head>
<body>

<header>
  <p class="hospital-tag">Patient Registration Form</p>
  <h1>
    Terms &amp; Conditions
    <span>শর্তাবলী ও নিয়মনীতি</span>
  </h1>
</header>

<div class="page">

  <!-- ── SECTION 1: General Consent ── -->
  <div class="card">
    <div class="card-header">
      <h2>General Consent</h2>
      <span class="bn">সাধারণ সম্মতি</span>
    </div>
    <div class="card-body">
      <div class="bilingual">
        <div class="lang-block">
          <p class="lang-label">English</p>
          <p>The undersigned patient and/or responsible relative or person hereby consent to authorize physicians and medical professionals to administer and perform medical examinations, routine investigation, medical treatments, outpatient procedures, vaccinations and immunizations during the patient's care, be deemed necessary.</p>
          <p style="margin-top:14px;">I have been explained that in the event of need of specific tests/procedures, a separate consent will be obtained. The undersigned also gives consent to receive communication on treatment related information via text message or email or phone call as per the details provided at the time of registration.</p>
          <p style="margin-top:14px;">The undersigned also gives consent to the hospital to use medical information for insurance coverage and to contact him or her by telephone, if needed, regarding appointments and follow-up needs.</p>
        </div>
        <div class="lang-block bn-block">
          <p class="lang-label">বাংলা</p>
          <p>আমি নিম্ন স্বাক্ষরকারী রোগী / রোগীর আত্মীয়, দায়িত্বপ্রাপ্ত স্বজন এই মর্মে সম্মতি প্রদান করলাম যে, চিকিৎসা চলাকালীন সময়ে চিকিৎসক এবং স্বাস্থ্যসেবা কর্মী চিকিৎসা প্রয়োজনীয় সকল চিকিৎসা সংক্রান্ত মেডিকেল টেস্ট, স্বাভাবিক পরীক্ষা নিরীক্ষা, বহির্বিভাগীয় কার্যপ্রণালী, টিকাদান করতে পারবে।</p>
          <p style="margin-top:14px;">আমাকে ব্যাখ্যা করা হয়েছে যে, আরও নির্দিষ্ট কোন পরীক্ষা / কার্যপ্রণালীর প্রয়োজন হলে তার জন্য পৃথক সম্মতিপত্র নেয়া হতে পারে। আমি নিম্ন স্বাক্ষরকারী আরও সম্মতি প্রদান করলাম যে, রেজিস্ট্রেশনের সময় দেয়া মোবাইল নাম্বারে বা ইমেইলে চিকিৎসা সম্পর্কিত তথ্য এসএমএস / ফোন কল/ইমেইলের মাধ্যমে জানাতে পারবে।</p>
          <p style="margin-top:14px;">আমি, নিম্ন স্বাক্ষরকারী আরও সম্মতি প্রদান করলাম যে, বীমা কভারেজের জন্য চিকিৎসা সংক্রান্ত তথ্য ব্যবহার এবং এপয়েন্টমেন্ট ও ফেলোআপের প্রয়োজনে টেলিফোনে যোগাযোগের দরকার হলে হাসপাতাল তা করতে পারবে।</p>
        </div>
      </div>
    </div>
  </div>

  <!-- ── SECTION 2: Participation of Relatives ── -->
  <div class="card">
    <div class="card-header">
      <h2>Participation of Relatives in Care Decisions</h2>
      <span class="bn">চিকিৎসা-সম্পর্কিত সিদ্ধান্তে আত্মীয়দের অংশগ্রহণ</span>
    </div>
    <div class="card-body">
      <p style="font-size:14px; color:var(--ink-muted); margin-bottom:20px; font-style:italic;">Please select one of the following options / নিচের যেকোনো একটি বিকল্প বেছে নিন</p>

      <div class="choices">
        <div class="choice-item" onclick="toggleChoice(this)">
          
          <div class="choice-text">
            <strong>I do not permit participation of any person in my care decision.</strong>
            <span>আমি আমার চিকিৎসা-সংক্রান্ত কোনো সিদ্ধান্তে অন্য কোনো ব্যক্তির অংশগ্রহণ অনুমোদন করি না।</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</body>
</html>