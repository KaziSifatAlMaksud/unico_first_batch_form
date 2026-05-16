<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nursing Assessment on Admission (NAA) - Cardiac</title>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --navy: #207ba2;
  --navy-light: #eef3f8;
  --navy-mid: #2d5a8e;
  --border: #c8d4e0;
  --border-light: #e2eaf2;
  --text: #1e2d3d;
  --text-muted: #5a7a9a;
  --bg: #f4f7fa;
  --white: #ffffff;
  --accent: #2d5a8e;
  --input-bg: #fafcff;
  --success: #15803d;
  --danger: #b91c1c;
  --header-blue: #1c7da3;
  --radius: 6px;
  --radius-sm: 4px;
  --row-alt: #f8fbff;
}

body {
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
  font-size: 12px;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  padding: 10px;
}

/* ── PATIENT BAR ── */
.patient-bar {
  background: var(--navy);
  padding: 5px 12px;
  display: grid;
  grid-template-columns: 1fr 200px;
  gap: 10px; align-items: center;
}
.patient-bar .pb-group { display: flex; align-items: center; gap: 6px; }
.patient-bar label { font-size: 10px; color: rgba(255,255,255,0.75); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap; }
.patient-bar input {
  background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
  color: #fff; border-radius: 3px; padding: 2px 7px; font-size: 11px; height: 22px; outline: none; font-weight: 600;
}
.patient-bar input::placeholder { color: rgba(255,255,255,0.4); }
.patient-bar .name-inp { width: 240px; }
.patient-bar .uid-inp { width: 130px; }

/* ── PAGE TITLE ── */
.page-title {
  text-align: center;
  font-size: 17px;
  font-weight: 700;
  color: var(--navy);
  margin-bottom: 12px;
  letter-spacing: 0.4px;
  text-transform: uppercase;
}

/* ── MAIN CARD ── */
.form-card {
  margin: 0 auto;
  background: var(--white);
  border-radius: var(--radius);
  box-shadow: 0 2px 12px rgba(26,58,92,0.1);
  overflow: hidden;
  border: 1px solid var(--border);
}

/* ── TOP HEADER: LOGO + TITLE + PATIENT LABEL ── */
.top-header {
  display: grid;
  grid-template-columns: 160px 1fr 200px;
  border-bottom: 2px solid var(--navy);
}

/* ── ADMIT ROW ── */
.admit-row {
  display: flex;
  flex-wrap: wrap;
  gap: 4px 12px;
  align-items: center;
  padding: 5px 14px;
  background: #f0f5fa;
  border-bottom: 1px solid var(--border);
  font-size: 11.5px;
}
.admit-row .ar-group { display: flex; align-items: center; gap: 5px; }
.admit-row label { font-weight: 600; color: var(--navy); white-space: nowrap; font-size: 11px; }
.admit-row input, .admit-row select {
  height: 24px;
  padding: 2px 6px;
  font-size: 11px;
  border: 1px solid var(--border);
  border-radius: 3px;
  background: var(--white);
  color: var(--text);
  outline: none;
}

/* ── LOCATION ROW ── */
.location-row {
  display: flex;
  flex-wrap: wrap;
  gap: 4px 10px;
  align-items: center;
  padding: 4px 14px;
  border-bottom: 1px solid var(--border);
  font-size: 11.5px;
}
.location-row .loc-label { font-weight: 600; color: var(--navy); margin-right: 6px; }
.location-row .radio-group { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }
.location-row label { display: flex; align-items: center; gap: 3px; cursor: pointer; font-size: 11px; }
.surgeon-row {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 4px 14px;
  border-bottom: 1px solid var(--border);
  font-size: 11.5px;
}
.surgeon-row .sr-label { font-weight: 600; color: var(--navy); white-space: nowrap; font-size: 11px; }
.surgeon-row input { flex: 1; height: 24px; padding: 2px 8px; border: 1px solid var(--border); border-radius: 3px; font-size: 11px; outline: none; background: var(--input-bg); }

/* ── SECTIONS ── */
.section { border-bottom: 1px solid var(--border-light); }
.section-header {
  background: var(--navy-light);
  border-bottom: 1px solid var(--border);
  border-top: 1px solid var(--border-light);
  padding: 5px 14px;
  font-size: 10.5px;
  font-weight: 700;
  color: var(--navy);
  text-transform: uppercase;
  letter-spacing: 0.8px;
  display: flex;
  align-items: center;
  gap: 6px;
}
.section-header::before {
  content: '';
  display: inline-block;
  width: 3px;
  height: 11px;
  background: var(--navy-mid);
  border-radius: 2px;
  flex-shrink: 0;
}
.section-body { padding: 8px 14px; }

/* ── FORM ROW ── */
.form-row {
  display: flex;
  flex-wrap: wrap;
  gap: 4px 12px;
  align-items: center;
  padding: 4px 0;
  border-bottom: 1px dashed var(--border-light);
  font-size: 11.5px;
}
.form-row:last-child { border-bottom: none; }

/* ── FIELD LABEL ── */
.fl {
  font-size: 11.5px;
  font-weight: 600;
  color: var(--navy);
  white-space: nowrap;
}

/* ── INPUTS ── */
input[type="text"], input[type="date"], input[type="time"], input[type="number"], select, textarea {
  background: var(--input-bg);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  color: var(--text);
  font-size: 11px;
  padding: 2px 6px;
  height: 24px;
  outline: none;
  transition: border-color 0.15s, box-shadow 0.15s;
}
input:focus, select:focus, textarea:focus {
  border-color: var(--navy-mid);
  box-shadow: 0 0 0 2px rgba(45,90,142,0.12);
}
select { cursor: pointer; }
.inp-xs { width: 50px !important; }
.inp-sm { width: 65px !important; }
.inp-md { width: 110px !important; }
.inp-lg { width: 170px !important; }
.inp-xl { width: 220px !important; }
.inp-full { width: 100% !important; }

/* ── CHECKBOX & RADIO ── */
.cbgroup { display: flex; flex-wrap: wrap; gap: 4px 12px; align-items: center; }
.cblabel {
  display: flex; align-items: center; gap: 3px;
  font-size: 11px; cursor: pointer; white-space: nowrap;
  user-select: none;
}
.cblabel input[type="checkbox"], .cblabel input[type="radio"] {
  width: 13px; height: 13px; cursor: pointer;
  accent-color: var(--navy);
}

/* ── GRID TABLE ── */
.grid-table { width: 100%; border-collapse: collapse; font-size: 11px; margin: 4px 0; }
.grid-table th {
  background: var(--navy-light);
  color: var(--navy);
  font-weight: 700;
  font-size: 10.5px;
  padding: 4px 8px;
  border: 1px solid var(--border);
  text-align: left;
  white-space: nowrap;
}
.grid-table td {
  padding: 3px 7px;
  border: 1px solid var(--border-light);
  vertical-align: middle;
}
.grid-table tr:nth-child(even) td { background: var(--row-alt); }
.grid-table td:first-child { font-weight: 600; color: var(--navy); }

/* ── TWO COL GRID ── */
.two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 0; }
.two-col-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 0; }
.col-cell { padding: 4px 10px; border-right: 1px solid var(--border-light); }
.col-cell:last-child { border-right: none; }

/* ── CARE PLAN TABLE ── */
.care-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.care-table th {
  background: var(--navy);
  color: #fff;
  font-weight: 600;
  font-size: 10.5px;
  padding: 5px 8px;
  border: 1px solid var(--navy-mid);
  text-align: left;
}
.care-table td {
  padding: 0;
  border: 1px solid var(--border);
  vertical-align: top;
}
.care-table td input { width: 100%; height: 32px; border: none; border-radius: 0; background: transparent; padding: 4px 6px; font-size: 11px; }
.care-table td input:focus { background: rgba(45,90,142,0.04); border: none; box-shadow: none; }
.care-table .time-col { width: 70px; }
.care-table .diag-col { width: 22%; }
.care-table .goals-col { width: 20%; }
.care-table .interv-col { width: 22%; }
.care-table .eval-col { width: 18%; }
.care-table .sign-col { width: 14%; }

/* ── SIGNATURE ── */
.sig-grid { display: grid; grid-template-columns: 1fr auto 1fr auto; gap: 0; border-top: 1px solid var(--border); }
.sig-cell { padding: 8px 12px; border-right: 1px solid var(--border-light); }
.sig-cell:last-child { border-right: none; }
.sig-cell label { display: block; font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 3px; }
.sig-cell input { width: 100%; border: none; border-bottom: 1px solid var(--border); border-radius: 0; padding: 2px 0; background: transparent; font-size: 12px; }

/* ── FOOTER BAR ── */
.form-footer {
  background: var(--navy-light);
  padding: 10px 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-top: 1px solid var(--border);
}
.form-footer .footer-ref { font-size: 10px; color: var(--text-muted); }
.btn-group { display: flex; gap: 8px; }
.btn {
  padding: 6px 20px;
  border-radius: var(--radius-sm);
  font-size: 12px;
  font-weight: 600;
  cursor: pointer;
  border: 1px solid transparent;
  transition: all 0.15s;
}
.btn-outline { background: var(--white); border-color: var(--border); color: var(--text-muted); }
.btn-outline:hover { border-color: var(--navy-mid); color: var(--navy); }
.btn-primary { background: var(--navy); color: #fff; border-color: var(--navy); }
.btn-primary:hover { background: var(--navy-mid); }


/* ── TOAST ── */
.toast {
  position: fixed; top: 20px; right: 20px;
  background: var(--success); color: #fff;
  padding: 10px 18px; border-radius: var(--radius);
  font-size: 12px; font-weight: 600;
  box-shadow: 0 4px 16px rgba(0,0,0,0.2);
  transform: translateX(120%);
  transition: transform 0.3s ease; z-index: 9999;
}
.toast.show { transform: translateX(0); }

/* ── VITALS GRID ── */
.vitals-grid {
  display: flex; flex-wrap: wrap; gap: 8px 20px; align-items: flex-end;
}
.vital-cell { display: flex; flex-direction: column; gap: 2px; }
.vital-cell label { font-size: 10px; color: var(--text-muted); font-weight: 600; }
.vital-input-row { display: flex; align-items: center; gap: 3px; }
.vital-input-row input { width: 55px; }
.unit { font-size: 10px; color: var(--text-muted); white-space: nowrap; }
.bp-wrap { display: flex; align-items: center; gap: 3px; }
.bp-wrap input { width: 42px; }
.bp-sep { color: var(--text-muted); font-weight: 700; font-size: 13px; }

/* ── SYSTEMATIC EVAL TABLE ── */
.sys-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.sys-table td {
  padding: 3px 8px;
  border: 1px solid var(--border-light);
  vertical-align: middle;
}
.sys-table .sys-label {
  font-weight: 700;
  color: var(--navy);
  width: 190px;
  background: var(--navy-light);
  border: 1px solid var(--border);
  font-size: 11px;
}
.no-abn {
  font-size: 10.5px;
  color: var(--text-muted);
  white-space: nowrap;
  font-style: italic;
}

/* ── CHECKBOX INLINE PAIR ── */
.yn-pair { display: inline-flex; gap: 6px; align-items: center; }
.yn-pair label { display: flex; align-items: center; gap: 2px; font-size: 11px; cursor: pointer; }
.yn-pair input { width: 12px; height: 12px; accent-color: var(--navy); }

/* ── SUB-TITLE ── */
.sub-title {
  font-size: 10.5px;
  font-weight: 700;
  color: var(--navy);
  text-transform: uppercase;
  letter-spacing: 0.6px;
  margin: 6px 0 4px;
  padding-bottom: 3px;
  border-bottom: 1px solid var(--border-light);
}

@media (max-width: 800px) {
  .top-header { grid-template-columns: 1fr; }
  .two-col, .two-col-3 { grid-template-columns: 1fr; }
  .sig-grid { grid-template-columns: 1fr 1fr; }
}

/* Print */
@media print {
  body { background: #fff; padding: 0; font-size: 10px; }
  .form-footer .btn-group { display: none; }
  .form-card { box-shadow: none; border: 1px solid #000; }
}
</style>
</head>
<body>

<form id="mainForm" action="{{ route('form4.store') }}"   method="POST" enctype="multipart/form-data">
@csrf

<div class="form-card">


  <!-- ══ PATIENT NAME + UHID BAR ══ -->
  <div class="patient-bar">
    <div class="pb-group">
      <label>Patient's Name</label>
      <input type="text"  name="patient_name" placeholder="Full Patient Name">
    </div>
    <div class="pb-group">
      <label>UHID</label>
      <input type="text" class="uid-inp" name="uhid" placeholder="UHID No.">
    </div>
  </div>

  <!-- ══ DOA / TIME / HOW ADMITTED / BYSTANDER ══ -->
  <div class="admit-row">
    <div class="ar-group">
      <label>DOA:</label>
      <input type="date" name="doa">
    </div>
    <div class="ar-group">
      <label>Date:</label>
      <input type="date" name="adm_date">
    </div>
    <div class="ar-group">
      <label>Time:</label>
      <input type="time" name="adm_time">
    </div>
    <div class="ar-group">
      <label>How admitted:</label>
      <label class="cblabel"><input type="checkbox" name="how_admitted" value="Walking"> Walking</label>
      <label class="cblabel"><input type="checkbox" name="how_admitted" value="Wheelchair"> Wheel chair</label>
      <label class="cblabel"><input type="checkbox" name="how_admitted" value="Stretcher"> Stretcher</label>
    </div>
    <div class="ar-group">
      <label>Bystander present:</label>
      <label class="cblabel"><input type="checkbox" name="bystander" value="Yes"> Yes</label>
      <label class="cblabel"><input type="checkbox" name="bystander" value="No"> No</label>
    </div>
  </div>

  <!-- ══ LOCATION ══ -->
  <div class="location-row">
    <span class="loc-label">Location:</span>
    <div class="radio-group">
      <label class="cblabel"><input type="checkbox" name="location" value="Cabin"> Cabin</label>
      <label class="cblabel"><input type="checkbox" name="location" value="Ward"> Ward</label>
      <label class="cblabel"><input type="checkbox" name="location" value="ICU"> ICU</label>
      <label class="cblabel"><input type="checkbox" name="location" value="HDU"> HDU</label>
      <label class="cblabel"><input type="checkbox" name="location" value="Others"> Others:</label>
      <input type="text" name="location_other" class="inp-md" placeholder="Specify">
    </div>
  </div>

  <!-- ══ PRIMARY SURGEON ══ -->
  <div class="surgeon-row">
    <span class="sr-label">Primary Surgeon:</span>
    <input type="text" name="primary_surgeon" placeholder="Surgeon name">
  </div>

  <!-- ══════════════════════════════════════════════════════════
       SECTION: PATIENT INFORMATION AND INITIAL ASSESSMENT
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Patient Information and Initial Assessment</div>
    <div class="section-body">

      <div class="form-row">
        <span class="fl">ID band checked and correct:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="id_band" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="id_band" value="No"> No</label>
        </div>
        <span class="fl" style="margin-left:16px;">Informed consent verified:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="consent_surgery" value="Surgery"> Surgery</label>
          <label class="cblabel"><input type="checkbox" name="consent_anesthesia" value="Anesthesia"> Anesthesia</label>
          <label class="cblabel"><input type="checkbox" name="consent_blood" value="Blood products"> Blood products</label>
        </div>
        <div class="cbgroup" style="margin-left:10px;">
          <label class="cblabel"><input type="checkbox" name="consent_yn" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="consent_yn" value="No"> No</label>
        </div>
      </div>

      <div class="form-row">
        <span class="fl">Assessment time:</span>
        <input type="time" name="assessment_time">
        <span class="fl" style="margin-left:14px;">How admitted:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="admitted2" value="Walking"> Walking</label>
          <label class="cblabel"><input type="checkbox" name="admitted2" value="Wheelchair"> Wheel chair</label>
          <label class="cblabel"><input type="checkbox" name="admitted2" value="Stretcher"> Stretcher</label>
        </div>
        <span class="fl" style="margin-left:14px;">Bystander present:</span>
        <label class="cblabel"><input type="checkbox" name="bystander2" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="bystander2" value="No"> No</label>
      </div>

      <div class="form-row">
        <span class="fl">General condition:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="gen_condition" value="Conscious and oriented"> Conscious and oriented</label>
          <label class="cblabel"><input type="checkbox" name="gen_condition" value="Unconscious"> Unconscious</label>
          <label class="cblabel"><input type="checkbox" name="gen_condition" value="Restless"> Restless</label>
          <label class="cblabel"><input type="checkbox" name="gen_condition" value="Drowsy"> Drowsy</label>
          <label class="cblabel"><input type="checkbox" name="gen_condition" value="Others"> Others:</label>
          <input type="text" name="gen_condition_other" class="inp-md" placeholder="Specify">
        </div>
      </div>

      <div class="form-row">
        <span class="fl">Vitals:</span>
        <div class="vitals-grid">
          <div class="vital-cell">
            <label>Pulse</label>
            <div class="vital-input-row"><input type="number" name="pulse"> <span class="unit">/min</span></div>
          </div>
          <div class="vital-cell">
            <label>BP</label>
            <div class="bp-wrap">
              <input type="number" name="bp_sys">
              <span class="bp-sep">/</span>
              <input type="number" name="bp_dia">
              <span class="unit">mmHg</span>
            </div>
          </div>
          <div class="vital-cell">
            <label>Temp</label>
            <div class="vital-input-row"><input type="number" name="temp"> <span class="unit">°F</span></div>
          </div>
          <div class="vital-cell">
            <label>Resp</label>
            <div class="vital-input-row"><input type="number" name="resp"> <span class="unit">/min</span></div>
          </div>
          <div class="vital-cell">
            <label>SpO₂</label>
            <div class="vital-input-row"><input type="number" name="spo2" max="100"> <span class="unit">%</span></div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <span class="fl">Language:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="language" value="Bangla"> Bangla</label>
          <label class="cblabel"><input type="checkbox" name="language" value="English"> English</label>
          <label class="cblabel"><input type="checkbox" name="language" value="Others"> Others:</label>
          <input type="text" name="language_other" class="inp-sm" placeholder="">
        </div>
        <span class="fl" style="margin-left:14px;">Height:</span>
        <input type="number" name="height" class="inp-sm"> <span class="unit">cm</span>
        <span class="fl" style="margin-left:10px;">Weight:</span>
        <input type="number" name="weight" class="inp-sm"> <span class="unit">kg</span>
        <span class="fl" style="margin-left:10px;">BMI:</span>
        <input type="number" name="bmi" class="inp-sm" step="0.1">
      </div>

      <div class="form-row">
        <span class="fl">Allergies:</span>
        <label class="cblabel"><input type="checkbox" name="allergies" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="allergies" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="allergies" value="Not known"> Not known, specify:</label>
        <input type="text" name="allergies_specify" class="inp-xl" placeholder="Specify allergies">
        <span class="fl" style="margin-left:10px;">Any:</span>
        <label class="cblabel"><input type="checkbox" name="any_cultural" value="Cultural"> Cultural</label>
        <label class="cblabel"><input type="checkbox" name="any_religious" value="Religious"> Religious</label>
        <label class="cblabel"><input type="checkbox" name="any_special" value="Special needs"> Special needs:</label>
        <input type="text" name="special_needs" class="inp-md" placeholder="">
      </div>

      <div class="form-row">
        <span class="fl">Personal aid(s):</span>
        <label class="cblabel"><input type="checkbox" name="dentures"> Dentures:</label>
        <label class="cblabel"><input type="checkbox" name="dentures_yn" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="dentures_yn" value="No"> No</label>
        <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="eyewear"> Eyewear:</label>
        <label class="cblabel"><input type="checkbox" name="eyewear_yn" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="eyewear_yn" value="No"> No</label>
        <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="hearing"> Hearing:</label>
        <label class="cblabel"><input type="checkbox" name="hearing_yn" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="hearing_yn" value="No"> No</label>
        <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="others_aid"> Others:</label>
        <input type="text" name="others_aid_txt" class="inp-md" placeholder="Specify">
      </div>

      <div class="form-row">
        <span class="fl">Diagnosis:</span>
        <input type="text" name="diagnosis" class="inp-xl" placeholder="Pre-op Diagnosis">
        <span class="fl" style="margin-left:14px;">Planned Procedure:</span>
        <input type="text" name="planned_procedure" class="inp-xl" placeholder="Planned Procedure">
      </div>

    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       ORIENTATION
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Orientation (Patient / Attendant)</div>
    <div class="section-body">
      <div class="form-row">
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="orientation" value="Side rails"> Side rails</label>
          <label class="cblabel"><input type="checkbox" name="orientation" value="Patient rights of privacy and confidentiality"> Patient rights of privacy and confidentiality</label>
          <label class="cblabel"><input type="checkbox" name="orientation" value="Visitor policy"> Visitor policy</label>
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       VULNERABILITY ASSESSMENT
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Vulnerability Assessment</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl">Provide Assistance in:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="vuln_assist" value="Eating"> Eating</label>
          <label class="cblabel"><input type="checkbox" name="vuln_assist" value="Toileting"> Toileting</label>
          <label class="cblabel"><input type="checkbox" name="vuln_assist" value="Personal Hygiene"> Personal Hygiene</label>
          <label class="cblabel"><input type="checkbox" name="vuln_assist" value="Mobilization"> Mobilization</label>
          <label class="cblabel"><input type="checkbox" name="vuln_assist" value="Others"> Others:</label>
          <input type="text" name="vuln_assist_other" class="inp-md" placeholder="Specify">
        </div>
      </div>
      <div class="two-col" style="border-top:1px dashed var(--border-light);margin-top:4px;padding-top:4px;">
        <div class="col-cell">
          <div class="cbgroup" style="flex-direction:column;gap:4px;  align-items:flex-start;">
            <label class="cblabel"><input type="checkbox" name="vuln" value="Falls risk"> Falls risk</label>
            <label class="cblabel"><input type="checkbox" name="vuln" value="Aspiration risk"> Aspiration risk</label>
            <label class="cblabel"><input type="checkbox" name="vuln" value="Pain Management"> Pain Management</label>
          </div>
        </div>
        <div class="col-cell" style="text-align:left;">
                <div class="cbgroup"
                    style="display:flex; flex-direction:column; gap:4px; align-items:flex-start; justify-content:flex-start; width:100%; text-align:left;">

                    <label class="cblabel" style="display:flex; align-items:center; gap:6px;">
                        <input type="checkbox" name="vuln" value="Bleeding risk">
                        Bleeding risk
                    </label>

                    <label class="cblabel" style="display:flex; align-items:center; gap:6px;">
                        <input type="checkbox" name="vuln" value="Thromboembolism risk">
                        Thromboembolism risk
                    </label>

                    <label class="cblabel" style="display:flex; align-items:center; gap:6px;">
                        <input type="checkbox" name="vuln" value="Safety precaution">
                        Safety precaution
                    </label>

                </div>
            </div>

            <div class="col-cell" style="text-align:left;">
                <div class="cbgroup"
                    style="display:flex; flex-direction:column; gap:4px; align-items:flex-start;">

                    <label class="cblabel">
                        <input type="checkbox" name="vuln" value="DVT risk assessment">
                        DVT risk assessment
                    </label>

                    <label class="cblabel">
                        <input type="checkbox" name="vuln" value="Isolation precaution">
                        Isolation precaution
                    </label>

                    <label class="cblabel">
                        <input type="checkbox" name="vuln" value="Pressure sore prevention">
                        Pressure sore prevention
                    </label>

                </div>
            </div>
        
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       HISTORY COLLECTION
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">History Collection</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl">Present complaints:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="complaint" value="Chest pain"> Chest pain</label>
          <label class="cblabel"><input type="checkbox" name="complaint" value="Dyspnoea"> Dyspnoea</label>
          <label class="cblabel"><input type="checkbox" name="complaint" value="Palpitations"> Palpitations</label>
          <label class="cblabel"><input type="checkbox" name="complaint" value="Syncope"> Syncope</label>
          <label class="cblabel"><input type="checkbox" name="complaint" value="Others"> Others:</label>
          <input type="text" name="complaint_other" class="inp-md" placeholder="Specify">
        </div>
      </div>
      <div class="form-row">
        <span class="fl">Past medical history:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="past_med" value="Hypertension"> Hypertension</label>
          <label class="cblabel"><input type="checkbox" name="past_med" value="Diabetes mellitus"> Diabetes mellitus</label>
          <label class="cblabel"><input type="checkbox" name="past_med" value="CKD"> CKD</label>
          <label class="cblabel"><input type="checkbox" name="past_med" value="COPD/asthma"> COPD/asthma</label>
          <label class="cblabel"><input type="checkbox" name="past_med" value="Stroke/TIA"> Stroke/TIA</label>
          <label class="cblabel"><input type="checkbox" name="past_med" value="Thyroid disease"> Thyroid disease</label>
        </div>
      </div>
      <div class="form-row">
        <span class="fl">Past surgical history:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="past_surg" value="Previous cardiac interventions"> Previous cardiac interventions</label>
          <label class="cblabel"><input type="checkbox" name="past_surg" value="PCI"> PCI</label>
          <label class="cblabel"><input type="checkbox" name="past_surg" value="Pacemaker"> Pacemaker</label>
          <label class="cblabel"><input type="checkbox" name="past_surg" value="Prior surgery"> Prior surgery</label>
          <input type="text" name="past_surg_other" class="inp-md" placeholder="Specify">
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       MEDICATION HISTORY
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Medication History</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl" style="min-width:140px;">Current cardiac medications:</span>
        <div class="cbgroup">
          <span style="font-weight:600;font-size:11px;">Antiplatelets:</span>
          <label class="cblabel"><input type="checkbox" name="antiplatelet" value="Aspirin"> Aspirin</label>
          <label class="cblabel"><input type="checkbox" name="antiplatelet" value="Clopidogrel"> Clopidogrel</label>
          <label class="cblabel"><input type="checkbox" name="antiplatelet" value="Ticagrelor"> Ticagrelor</label>
          <span style="font-weight:600;font-size:11px;margin-left:8px;">Anticoagulants:</span>
          <label class="cblabel"><input type="checkbox" name="anticoag" value="Warfarin"> Warfarin</label>
          <label class="cblabel"><input type="checkbox" name="anticoag" value="DOACs"> DOACs</label>
          <label class="cblabel"><input type="checkbox" name="anticoag" value="Heparin"> Heparin</label>
        </div>
      </div>
      <div class="form-row">
        <div class="cbgroup">
          <span style="font-weight:600;font-size:11px;">Beta-blockers:</span>
          <input type="text" name="beta_blockers" class="inp-md" placeholder="Specify">
          <span style="font-weight:600;font-size:11px;margin-left:8px;">ACE-I / ARB:</span>
          <input type="text" name="ace_arb" class="inp-md" placeholder="Specify">
          <span style="font-weight:600;font-size:11px;margin-left:8px;">Diuretics:</span>
          <input type="text" name="diuretics" class="inp-md" placeholder="Specify">
        </div>
      </div>
      <div class="form-row">
        <span class="fl">Last dose taken (especially anticoagulants):</span>
        <input type="text" name="last_dose" class="inp-xl" placeholder="Date / time / drug">
      </div>
      <div class="form-row">
        <span class="fl">Drug allergies:</span>
        <label class="cblabel"><input type="checkbox" name="drug_allergy_yn" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="drug_allergy_yn" value="No"> No</label>
        <span class="fl" style="margin-left:14px;">Herbal / traditional medicines:</span>
        <label class="cblabel"><input type="checkbox" name="herbal_yn" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="herbal_yn" value="No"> No</label>
        <span style="font-size:11px;">, specify:</span>
        <input type="text" name="herbal_specify" class="inp-lg" placeholder="Specify">
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       SYSTEMATIC EVALUATION
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Systematic Evaluation</div>
    <div class="section-body">
      <table class="sys-table">
        <tbody>
          <tr>
            <td class="sys-label">Cardiovascular Assessment</td>
            <td>
              <div class="cbgroup">
                Heart rhythm:
                <label class="cblabel"><input type="checkbox" name="heart_rhythm" value="Regular"> Regular</label>
                <label class="cblabel"><input type="checkbox" name="heart_rhythm" value="Irregular"> Irregular</label>
                &nbsp; Presence of murmur:
                <label class="cblabel"><input type="checkbox" name="murmur" value="Yes"> Yes</label>
                <label class="cblabel"><input type="checkbox" name="murmur" value="No"> No</label>
              </div>
            </td>
            <td><span class="no-abn"><input type="checkbox" name="cv_no_abn"> No abnormality detected</span></td>
          </tr>
          <tr>
            <td class="sys-label">Respiratory Assessment</td>
            <td>
              <div class="cbgroup">
                Smoking history:
                <label class="cblabel"><input type="checkbox" name="smoking_hx" value="Yes"> Yes</label>
                <label class="cblabel"><input type="checkbox" name="smoking_hx" value="No"> No</label>
                &nbsp; Breath sounds:
                <label class="cblabel"><input type="checkbox" name="breath_sounds" value="Clear"> Clear</label>
                <label class="cblabel"><input type="checkbox" name="breath_sounds" value="Crepitations"> Crepitations</label>
              </div>
            </td>
            <td><span class="no-abn"><input type="checkbox" name="resp_no_abn"> No abnormality detected</span></td>
          </tr>
          <tr>
            <td class="sys-label">Neurological Status</td>
            <td>
              <div class="cbgroup">
                Orientation (
                <label class="cblabel"><input type="checkbox" name="orient" value="Person"> person</label>
                <label class="cblabel"><input type="checkbox" name="orient" value="Place"> place</label>
                <label class="cblabel"><input type="checkbox" name="orient" value="Time"> time</label>
                ) &nbsp; Level of consciousness:
                <input type="text" name="consciousness" class="inp-md" placeholder="Specify">
              </div>
            </td>
            <td><span class="no-abn"><input type="checkbox" name="neuro_no_abn"> No abnormality detected</span></td>
          </tr>
          <tr>
            <td class="sys-label">Renal &amp; Gastrointestinal Assessment</td>
            <td>
              <div class="cbgroup">
                Last voided time: <input type="text" name="last_voided" class="inp-md" placeholder="Time">
                &nbsp; Bowel habits: <input type="text" name="bowel_habits" class="inp-md" placeholder="Describe">
              </div>
            </td>
            <td><span class="no-abn"><input type="checkbox" name="gi_no_abn"> No abnormality detected</span></td>
          </tr>
          <tr>
            <td class="sys-label">Psychosocial Assessment</td>
            <td>
              <div class="cbgroup">
                Patient understanding of surgery:
                <label class="cblabel"><input type="checkbox" name="pt_understanding" value="Yes"> Yes</label>
                <label class="cblabel"><input type="checkbox" name="pt_understanding" value="No"> No</label>
                &nbsp; Anxiety level: <input type="text" name="anxiety_level" class="inp-md" placeholder="Describe">
              </div>
            </td>
            <td><span class="no-abn"><input type="checkbox" name="psycho_no_abn"> No abnormality detected</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       SKIN INTEGRITY
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Skin Integrity</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl">Skin intact:</span>
        <label class="cblabel"><input type="checkbox" name="skin_intact" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="skin_intact" value="No"> No</label>
        <span>, if No, specify:</span>
        <input type="text" name="skin_specify" class="inp-xl" placeholder="Specify">
        <span class="fl" style="margin-left:14px;">Previous bed sore:</span>
        <label class="cblabel"><input type="checkbox" name="bed_sore" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="bed_sore" value="No"> No</label>
        <span>, if yes, specify:</span>
        <input type="text" name="bed_sore_specify" class="inp-lg" placeholder="Specify">
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       NURSING DOCUMENTATION & HANDOVER
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Nursing Documentation &amp; Handover</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl">Baseline findings documented:</span>
        <label class="cblabel"><input type="checkbox" name="baseline_doc" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="baseline_doc" value="No"> No</label>
        <span>, if No, specify:</span>
        <input type="text" name="baseline_specify" class="inp-xl" placeholder="Specify">
        <span class="fl" style="margin-left:14px;">Abnormal findings escalated:</span>
        <label class="cblabel"><input type="checkbox" name="abnormal_esc" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="abnormal_esc" value="No"> No</label>
        <span>, if No, specify:</span>
        <input type="text" name="abnormal_specify" class="inp-lg" placeholder="Specify">
      </div>
      <div class="form-row">
        <span class="fl">Nursing Admission Summary:</span>
        <textarea name="nursing_summary" rows="3" style="flex:1;height:auto;min-height:60px;padding:5px 8px;resize:vertical;font-size:11px;"></textarea>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       NURSING CARE PLAN
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">Nursing Care Plan</div>
    <div class="section-body" style="padding:8px 0;">
      <table class="care-table">
        <thead>
          <tr>
            <th class="time-col">Time</th>
            <th class="diag-col">Nursing Diagnosis</th>
            <th class="goals-col">Goals &amp; Outcomes</th>
            <th class="interv-col">Interventions</th>
            <th class="eval-col">Evaluation</th>
            <th class="sign-col">Sign with ID</th>
          </tr>
        </thead>
        <tbody id="carePlanBody">
          <!-- 8 rows -->
          <tr>
            <td><input type="time" name="care_time_1"></td>
            <td><input type="text" name="care_diag_1" placeholder=""></td>
            <td><input type="text" name="care_goals_1" placeholder=""></td>
            <td><input type="text" name="care_interv_1" placeholder=""></td>
            <td><input type="text" name="care_eval_1" placeholder=""></td>
            <td><input type="text" name="care_sign_1" placeholder=""></td>
          </tr>
          <tr>
            <td><input type="time" name="care_time_2"></td>
            <td><input type="text" name="care_diag_2"></td>
            <td><input type="text" name="care_goals_2"></td>
            <td><input type="text" name="care_interv_2"></td>
            <td><input type="text" name="care_eval_2"></td>
            <td><input type="text" name="care_sign_2"></td>
          </tr>
          <tr>
            <td><input type="time" name="care_time_3"></td>
            <td><input type="text" name="care_diag_3"></td>
            <td><input type="text" name="care_goals_3"></td>
            <td><input type="text" name="care_interv_3"></td>
            <td><input type="text" name="care_eval_3"></td>
            <td><input type="text" name="care_sign_3"></td>
          </tr>
          <tr>
            <td><input type="time" name="care_time_4"></td>
            <td><input type="text" name="care_diag_4"></td>
            <td><input type="text" name="care_goals_4"></td>
            <td><input type="text" name="care_interv_4"></td>
            <td><input type="text" name="care_eval_4"></td>
            <td><input type="text" name="care_sign_4"></td>
          </tr>
          <tr>
            <td><input type="time" name="care_time_5"></td>
            <td><input type="text" name="care_diag_5"></td>
            <td><input type="text" name="care_goals_5"></td>
            <td><input type="text" name="care_interv_5"></td>
            <td><input type="text" name="care_eval_5"></td>
            <td><input type="text" name="care_sign_5"></td>
          </tr>       
       
        </tbody>
      </table>
      <div style="padding:6px 14px;">
        <button type="button" class="btn btn-outline" onclick="addCarePlanRow()" style="font-size:11px;padding:4px 14px;">+ Add Row</button>
      </div>
    </div>
  </div>

  <!-- ══ SIGNATURE ══ -->
  <div class="sig-grid">
    <div class="sig-cell">
      <label>Name &amp; Signature of the Nurse</label>
      <input type="text" name="nurse_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Date and Time</label>
      <input type="datetime-local" name="nurse_datetime">
    </div>
    <div class="sig-cell">
      <label>Verified by</label>
      <input type="text" name="verified_by" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Emp. ID</label>
      <input type="text" name="emp_id" placeholder="Employee ID">
    </div>
  </div>

  <!-- ══ FOOTER ══ -->
  <div class="form-footer">
    <span class="footer-ref">NF/NAF/NAA/v01/Feb2026– NF01</span>
    <div class="btn-group">
      <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
      <button type="submit" class="btn btn-primary" >Save &amp; Submit</button>
    </div>
  </div>

</div>
</form>

<div class="toast" id="toast">✓ Form submitted successfully!</div>

<script>
/* ── Add Care Plan Row ── */
let careRowCount = 5;
function addCarePlanRow() {
  careRowCount++;
  const tbody = document.getElementById('carePlanBody');
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td><input type="time" name="care_time_${careRowCount}"></td>
    <td><input type="text" name="care_diag_${careRowCount}"></td>
    <td><input type="text" name="care_goals_${careRowCount}"></td>
    <td><input type="text" name="care_interv_${careRowCount}"></td>
    <td><input type="text" name="care_eval_${careRowCount}"></td>
    <td><input type="text" name="care_sign_${careRowCount}"></td>
  `;
  tbody.appendChild(tr);
}

/* ── Submit ── */
function submitForm() {
  const toast = document.getElementById('toast');
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 3000);
}

/* ── Reset ── */
function resetForm() {
  if (confirm('Reset all form fields?')) {
    document.getElementById('mainForm').reset();
  }
}

/* ── Auto-calculate BMI ── */
const heightInp = document.querySelector('[name="height"]');
const weightInp = document.querySelector('[name="weight"]');
const bmiInp = document.querySelector('[name="bmi"]');
function calcBMI() {
  const h = parseFloat(heightInp.value) / 100;
  const w = parseFloat(weightInp.value);
  if (h > 0 && w > 0) {
    bmiInp.value = (w / (h * h)).toFixed(1);
  }
}
if (heightInp && weightInp) {
  heightInp.addEventListener('input', calcBMI);
  weightInp.addEventListener('input', calcBMI);
}
</script>
</body>
</html>