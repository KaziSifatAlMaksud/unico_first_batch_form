<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Palliative Care Notes (PCN)</title>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #1a3a5c;
  --navy-light: #eef3f8;
  --navy-mid: #2d5a8e;
  --border: #c8d4e0;
  --border-light: #e2eaf2;
  --text: #1e2d3d;
  --text-muted: #5a7a9a;
  --bg: #f4f7fa;
  --white: #ffffff;
  --input-bg: #fafcff;
  --row-alt: #f0f5fa;
  --peach: #fde8dc;
  --success: #15803d;
  --radius: 5px;
}
body {
  font-family: 'Segoe UI', system-ui, sans-serif;
  font-size: 14.5px;
  background: var(--bg);
  color: var(--text);
}
.form-card {
  margin: 0 auto;
  width: 100%;
  border-radius: var(--radius);
  box-shadow: 0 2px 12px rgba(26,58,92,0.1);
  overflow: hidden;
  border: 1px solid var(--border);
}

/* ── TOP HEADER ── */
.top-header {
  display: grid;
  grid-template-columns: 130px 1fr 210px;
  border-bottom: 2px solid var(--navy);
  min-height: 62px;
}
.logo-area {
  padding: 8px 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-right: 1px solid var(--border);
  gap: 2px;
}
.logo-box {
  width: 50px; height: 50px;
  background: var(--navy);
  border-radius: 6px;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 11.5px; font-weight: 800;
  text-align: center; line-height: 1.2;
}
.logo-area .hosp-name {
  font-size: 10.5px; font-weight: 700;
  color: var(--navy); text-align: center;
  text-transform: uppercase; margin-top: 2px;
}
.logo-area .hosp-tag {
  font-size: 9px; color: var(--text-muted); text-align: center;
}
.title-area {
  display: flex; align-items: center;
  justify-content: center;
  padding: 10px 16px;
  background: var(--navy-light);
}
.title-area h1 {
  font-size: 23px; font-weight: 800;
  color: var(--navy); text-align: center;
  text-transform: uppercase; letter-spacing: 0.5px;
}
.patient-label-box {
  border-left: 1px solid var(--border);
  padding: 6px 10px; font-size: 12.5px;
}
.patient-label-box .lbl-title {
  font-weight: 700; font-size: 12.5px;
  text-align: center; border: 1px solid var(--border);
  padding: 2px; margin-bottom: 4px;
  color: var(--navy); text-transform: uppercase;
}
.lbl-row {
  display: flex; align-items: center;
  gap: 3px; margin-bottom: 2px; color: var(--text-muted);
}
.lbl-row span:first-child { font-weight: 600; color: var(--text); white-space: nowrap; }
.lbl-line { border-bottom: 1px solid var(--border); flex: 1; min-width: 30px; }

/* ── PATIENT BAR ── */
.patient-bar {
  background: #1c7da3;
  display: grid;
  grid-template-columns: 1fr 200px;
}
.pb-cell {
  padding: 4px 10px;
  display: flex; align-items: center; gap: 6px;
  border-right: 1px solid rgba(255,255,255,0.2);
}
.pb-cell:last-child { border-right: none; }
.pb-cell label { font-size: 14px; color: rgba(255,255,255,0.85); font-weight: 700; text-transform: uppercase; white-space: nowrap; }
.pb-cell input {
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.3);
  color: #fff; border-radius: 3px;
  padding: 2px 6px; font-size: 14px;
  height: 22px; outline: none; flex: 1;
}
.pb-cell input::placeholder { color: rgba(255,255,255,0.4); }

/* ── INFO GRID ── */
.info-grid { display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid var(--border); }
.info-cell {
  padding: 3px 10px;
  display: flex; align-items: center; gap: 6px;
  border-right: 1px solid var(--border);
  border-bottom: 1px solid var(--border-light);
  font-size: 14px; background: #f7f9fc;
}
.info-cell:nth-child(even) { border-right: none; }
.info-cell.full { grid-column: 1 / -1; border-right: none; }
.info-cell label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.info-cell input {
  flex: 1; height: 22px; padding: 1px 5px;
  font-size: 14px; border: 1px solid var(--border);
  border-radius: 3px; background: var(--white); outline: none;
}
.cblabel {
  display: inline-flex; align-items: center;
  gap: 3px; cursor: pointer; font-size: 14px;
  white-space: nowrap; user-select: none;
}
.cblabel input[type="checkbox"] { width: 12px; height: 12px; accent-color: var(--navy); cursor: pointer; }

/* ── SECTION HEADER ── */
/* .sec-hd {
  background: var(--navy); color: #fff;
  padding: 5px 12px; font-size: 10.5px;
  font-weight: 700; text-transform: uppercase;
  letter-spacing: 0.6px; border-bottom: 1px solid var(--border);
} */
.sec-hd {
    background: var(--navy-light);
    border-bottom: 1px solid var(--border);
    border-top: 1px solid var(--border-light);
    padding: 6px 16px;
    font-size: 14px;
    font-weight: 700;
    color: var(--navy);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

  .sec-hd::before {
    content: '';
    display: inline-block;
    width: 3px;
    height: 12px;
    background: var(--navy-mid);
    border-radius: 2px;
  }


/* ── THREE-COLUMN ASSESSMENT TABLE ── */
.assess-table { width: 100%; border-collapse: collapse; }
.assess-table th {
  background: var(--navy-light); color: var(--navy);
  font-weight: 700; font-size: 14px;
  padding: 4px 10px; border: 1px solid var(--border);
  text-align: center;
}
.assess-table th.left { text-align: left; }
.assess-table td {
  border: 1px solid var(--border-light);
  padding: 3px 8px; font-size: 14px;
  vertical-align: middle;
}
.assess-table td.param { font-size: 14px; width: 28%; background: #f7f9fc; }
.assess-table td.obs   { width: 44%; color: var(--text-muted); font-style: italic; }
.assess-table td.rem   { width: 28%; }
.assess-table tr:nth-child(even) td { background: var(--row-alt); }
.assess-table tr:nth-child(even) td.param { background: var(--row-alt); }
.assess-table td input[type="text"] {
  width: 100%; border: none;
  border-bottom: 1px dashed var(--border);
  background: transparent; font-size: 14px;
  height: 20px; padding: 1px 2px; outline: none;
}
.cb-sm {
  display: inline-block; width: 9px; height: 9px;
  border: 1px solid var(--navy); border-radius: 1px;
  margin-right: 3px; vertical-align: middle;
  position: relative; top: -1px; flex-shrink: 0;
}

/* ── COMFORT ROWS ── */
.comfort-grid {
  display: grid;
  border-bottom: 1px solid var(--border-light);
}
.comfort-grid.four-col { grid-template-columns: 1fr 1fr 1fr 1fr; }
.comfort-grid.three-col { grid-template-columns: 2fr 1.2fr 1.2fr; }
.comfort-cell {
  padding: 4px 10px;
  display: flex; align-items: center; gap: 5px;
  border-right: 1px solid var(--border-light);
  font-size: 14px; background: #f7f9fc;
}
.comfort-cell:last-child { border-right: none; }

/* ── FAMILY SUPPORT TABLE ── */
.family-table { width: 100%; border-collapse: collapse; }
.family-table td {
  border: 1px solid var(--border-light);
  padding: 4px 10px; font-size: 14px;
  vertical-align: middle;
}
.family-table tr:nth-child(even) td { background: var(--row-alt); }

/* ── NURSING NOTE AREA ── */
.note-area {
  min-height: 36mm;
  padding: 6px 12px;
  border-bottom: 1px solid var(--border);
  background: var(--white);
  display: flex; flex-direction: column; gap: 1px;
}
.note-line {
  border-bottom: 1px dashed var(--border);
  height: 22px; flex: 1;
}

/* ── PHYSICIAN / DIRECTIVES ── */
.directive-row {
  display: flex; align-items: center; gap: 8px;
  padding: 4px 12px;
  border-bottom: 1px solid var(--border-light);
  font-size: 14px;
}
.directive-row:nth-child(odd) { background: var(--row-alt); }

/* ── TIME OF DEATH ── */
.tod-table { width: 100%; border-collapse: collapse; }
.tod-table td {
  border: 1px solid var(--border-light);
  padding: 4px 10px; font-size: 14px;
  vertical-align: middle;
}
.tod-table .lbl { font-weight: 600; color: var(--navy); background: #f7f9fc; white-space: nowrap; }
.tod-table input[type="text"], .tod-table input[type="date"], .tod-table input[type="time"] {
  width: 100%; border: none; border-bottom: 1px solid var(--border);
  background: transparent; font-size: 14px;
  height: 20px; outline: none; padding: 1px 3px;
}

/* ── SIGNATURE TABLE ── */
.sig-table { width: 100%; border-collapse: collapse; font-size: 14px; border-top: 2px solid var(--navy); }
.sig-table th {
  background: var(--navy-light); color: var(--navy);
  font-weight: 700; font-size: 14px;
  padding: 4px 10px; border: 1px solid var(--border);
  text-align: left;
}
.sig-table td { padding: 6px 10px; border: 1px solid var(--border-light); vertical-align: middle; height: 32px; }
.sig-table tr:nth-child(2) td { background: var(--white); }
.sig-table tr:nth-child(3) td { background: var(--peach); }
.sig-table tr:nth-child(4) td { background: var(--white); }
.sig-table .rlbl { font-weight: 600; color: var(--navy); background: var(--navy-light) !important; white-space: nowrap; width: 130px; }
.sig-table input {
  width: 100%; border: none;
  border-bottom: 1px solid var(--border);
  background: transparent; font-size: 14px;
  height: 20px; padding: 1px 3px; outline: none;
}

/* ── FOOTER ── */
.form-footer {
  background: var(--navy-light);
  padding: 8px 14px;
  display: flex; justify-content: space-between; align-items: center;
  border-top: 1px solid var(--border);
}
.footer-ref { font-size: 13px; color: var(--text-muted); }
.btn-group { display: flex; gap: 8px; }
.btn {
  padding: 5px 18px; border-radius: 3px;
  font-size: 14px; font-weight: 600;
  cursor: pointer; border: 1px solid transparent;
  transition: all 0.15s;
}
.btn-outline { background: var(--white); border-color: var(--border); color: var(--text-muted); }
.btn-outline:hover { border-color: var(--navy-mid); color: var(--navy); }
.btn-primary { background: var(--navy); color: #fff; }
.btn-primary:hover { background: var(--navy-mid); }

/* ── TOAST ── */
.toast {
  position: fixed; top: 20px; right: 20px;
  background: var(--success); color: #fff;
  padding: 10px 16px; border-radius: 5px;
  font-size: 15px; font-weight: 600;
  box-shadow: 0 4px 16px rgba(0,0,0,0.2);
  transform: translateX(120%);
  transition: transform 0.3s ease; z-index: 9999;
}
.toast.show { transform: translateX(0); }

  /* ── INPUTS ── */
   select {
    background: var(--input-bg);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    color: var(--text);
    font-size: 12px;
    padding: 3px 8px;
    height: 28px;
    outline: none;
    transition: border-color 0.15s, box-shadow 0.15s;
  }

/* ── PRINT ── */
@media print {
  body { background: #fff; padding: 0; }
  .btn-group { display: none; }
  .form-card { box-shadow: none; max-width: 100%; }
  @page { size: A4; margin: 8mm; }
}
@media (max-width: 700px) {
  .top-header { grid-template-columns: 1fr; }
  .info-grid { grid-template-columns: 1fr; }
  .comfort-grid.four-col { grid-template-columns: 1fr 1fr; }
}
</style>
</head>
<body>
<form id="mainForm" action="{{ route('form10.store') }}"   method="POST" enctype="multipart/form-data">
  @csrf
<div class="form-card">
         
   <h1 style="text-align: center; font-size: 15px; font-weight: bold;"> Palliative Care Notes (PCN) </h1>
  <!-- ══════════════════════════════════════
       PATIENT BAR
  ══════════════════════════════════════ -->
  <div class="patient-bar">
    <div class="pb-cell"><label>Patient Name:</label><input type="text" name="patient_name" placeholder="Full Name"></div>
    <div class="pb-cell"><label>UHID:</label><input type="text" name="uhid" placeholder="UHID"></div>
  </div>

  <!-- ══════════════════════════════════════
       INFO GRID
  ══════════════════════════════════════ -->
  <div class="info-grid">
    <div class="info-cell">
      <label>Gender:</label>

      <select id="howAdmitted" name="gender">
        <option value="" selected>Select Gender</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
      </select>
      
      {{-- <label class="cblabel"><input type="checkbox" name="gender" value="M"> M</label>
      <label class="cblabel"><input type="checkbox" name="gender" value="F"> F</label> --}}
    </div>
    <div class="info-cell"><label>Age:</label><input type="number" name="age" style="width:60px;"> <span style="color:var(--text-muted);margin-left:12px;font-size:13.5px;">Procedure:</span><input type="text" name="procedure" style="flex:1;"></div>
    <div class="info-cell"><label>Diagnosis:</label><input type="text" name="diagnosis"></div>
    <div class="info-cell"><label>Consultant:</label><input type="text" name="consultant"></div>
    <div class="info-cell full"><label>Unit/Bed:</label><input type="text" name="unit_bed" style="max-width:280px;"></div>
    <div class="info-cell"><label>Date of Note:</label><input type="date" name="date_of_note"></div>
    <div class="info-cell"><label>Time:</label><input type="time" name="time_of_note"></div>
  </div>

  <!-- ══════════════════════════════════════
       CLINICAL STATUS
  ══════════════════════════════════════ -->
  <div class="sec-hd">Clinical Status</div>
  <table class="assess-table">
    <thead>
      <tr>
        <th class="left" style="width:28%;">Parameter</th>
        <th style="width:44%;">Observation</th>
        <th style="width:28%;">Time Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="param"><span class="cb-sm"></span>Consciousness/GCS</td>
        <td class="obs"><input type="text" name="gcs_obs" placeholder="…"></td>
        <td class="rem"><input type="text" name="gcs_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Vital Signs: HR/BP/SpO₂/RR</td>
        <td class="obs"><input type="text" name="vitals_obs" placeholder="…"></td>
        <td class="rem"><input type="text" name="vitals_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Temp (°C)</td>
        <td class="obs"><input type="text" name="temp_obs" placeholder="…"></td>
        <td class="rem"><input type="text" name="temp_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Pain/Comfort Score (0-10)</td>
        <td class="obs"><input type="text" name="pain_obs" placeholder="…"></td>
        <td class="rem"><input type="text" name="pain_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Respiratory Status</td>
        <td class="obs" style="font-style:normal;color:var(--text-muted);">O₂ support, ventilation &nbsp;<input type="text" name="resp_obs" placeholder="details…" style="width:55%;"></td>
        <td class="rem"><input type="text" name="resp_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Cardiac Status</td>
        <td class="obs" style="font-style:normal;color:var(--text-muted);">Arrhythmia, inotropes, hemodynamics &nbsp;<input type="text" name="cardiac_obs" placeholder="…" style="width:30%;"></td>
        <td class="rem"><input type="text" name="cardiac_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Fluid Balance</td>
        <td class="obs" style="font-style:normal;color:var(--text-muted);">Input/Output &nbsp;<input type="text" name="fluid_obs" placeholder="…" style="width:60%;"></td>
        <td class="rem"><input type="text" name="fluid_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Skin/Pressure Areas</td>
        <td class="obs"><input type="text" name="skin_obs" placeholder="…"></td>
        <td class="rem"><input type="text" name="skin_rem" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Other Clinical Notes</td>
        <td class="obs"><input type="text" name="other_obs" placeholder="…"></td>
        <td class="rem"><input type="text" name="other_rem" placeholder="…"></td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       SYMPTOM MANAGEMENT
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">Symptom Management</div>
  <table class="assess-table">
    <thead>
      <tr>
        <th class="left" style="width:28%;">Symptom</th>
        <th style="width:44%;">Intervention/Medication Response/Relief</th>
        <th style="width:28%;">Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="param"><span class="cb-sm"></span>Pain</td>
        <td><input type="text" name="pain_int" placeholder="…"></td>
        <td><input type="text" name="pain_rmk" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Dyspnea/Labored Breathing</td>
        <td><input type="text" name="dysp_int" placeholder="…"></td>
        <td><input type="text" name="dysp_rmk" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Anxiety/Restlessness</td>
        <td><input type="text" name="anx_int" placeholder="…"></td>
        <td><input type="text" name="anx_rmk" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Nausea/Vomiting</td>
        <td><input type="text" name="nausea_int" placeholder="…"></td>
        <td><input type="text" name="nausea_rmk" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Secretions/Sputum</td>
        <td><input type="text" name="sec_int" placeholder="…"></td>
        <td><input type="text" name="sec_rmk" placeholder="…"></td>
      </tr>
      <tr>
        <td class="param"><span class="cb-sm"></span>Other Symptoms</td>
        <td><input type="text" name="othersym_int" placeholder="…"></td>
        <td><input type="text" name="othersym_rmk" placeholder="…"></td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       COMFORT & SUPPORTIVE CARE
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">Comfort &amp; Supportive Care</div>
  <div class="comfort-grid four-col">
    <div class="comfort-cell"><label class="cblabel"><input type="checkbox" name="comfort[]" value="positioning"> Positioning for comfort</label></div>
    <div class="comfort-cell"><label class="cblabel"><input type="checkbox" name="comfort[]" value="oral_eye"> Oral/Eye care</label></div>
    <div class="comfort-cell"><label class="cblabel"><input type="checkbox" name="comfort[]" value="skin_pressure"> Skin/Pressure area care</label></div>
    <div class="comfort-cell"><label class="cblabel"><input type="checkbox" name="comfort[]" value="suctioning"> Suctioning as needed</label></div>
  </div>
  <div class="comfort-grid three-col">
    <div class="comfort-cell" style="grid-column:span 1;"><label class="cblabel"><input type="checkbox" name="comfort[]" value="env_adj"> Environmental adjustments (light, noise, privacy)</label></div>
    <div class="comfort-cell"><label class="cblabel"><input type="checkbox" name="comfort[]" value="emotional"> Emotional support provided</label></div>
    <div class="comfort-cell"><label class="cblabel"><input type="checkbox" name="comfort[]" value="spiritual"> Spiritual/Cultural support</label></div>
  </div>

  <!-- ══════════════════════════════════════
       FAMILY SUPPORT & COMMUNICATION
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">Family Support &amp; Communication</div>
  <table class="family-table">
    <tbody>
      <tr>
        <td style="width:50%;"><label class="cblabel"><input type="checkbox" name="family[]" value="prognosis"> Prognosis and care goals discussed</label></td>
        <td><label class="cblabel"><input type="checkbox" name="family[]" value="presence"> Family presence facilitated</label></td>
      </tr>
      <tr>
        <td><label class="cblabel"><input type="checkbox" name="family[]" value="counseling"> Counseling/Emotional support provided</label></td>
        <td><label class="cblabel"><input type="checkbox" name="family[]" value="cultural"> Cultural/Religious practices respected</label></td>
      </tr>
      <tr>
        <td colspan="2"><label class="cblabel"><input type="checkbox" name="family[]" value="questions"> Questions/Concerns addressed</label></td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       NURSING/STAFF NOTE
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">Nursing/Staff Note</div>
  <div class="note-area">
    <textarea 
        name="nursing_notes" 
        rows="6" 
        style="width:100%; border:1px solid #ccc; padding:8px; font-size:15px;"
        placeholder="Write full notes here..."
    >{{ $latestEntry->nursing_notes ?? '' }}</textarea>
  </div>

  <!-- ══════════════════════════════════════
       PHYSICIAN ORDERS & ADVANCE DIRECTIVES
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">Physician Orders &amp; Advance Directives</div>
  <div class="directive-row"><label class="cblabel"><input type="checkbox" name="directive[]" value="comfort_meds"> Comfort medications (opioids, sedatives, anticholinergics)</label></div>
  <div class="directive-row"><label class="cblabel"><input type="checkbox" name="directive[]" value="dnr"> DNR/DNI status confirmed</label></div>
  <div class="directive-row"><label class="cblabel"><input type="checkbox" name="directive[]" value="limitations"> Limitations of interventions documented</label></div>
  <div class="directive-row"><label class="cblabel"><input type="checkbox" name="directive[]" value="symptom_orders"> Orders for symptom relief and comfort care</label></div>

  <!-- ══════════════════════════════════════
       TIME OF DEATH
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">Time of Death (If Applicable)</div>
  <table class="tod-table">
    <tbody>
      <tr>
        <td class="lbl" style="width:12%;">Date</td>
        <td style="width:38%;"><input type="date" name="death_date"></td>
        <td class="lbl" style="width:12%;">Time</td>
        <td><input type="time" name="death_time"></td>
      </tr>
      <tr>
        <td class="lbl" colspan="1">Verified by Physician</td>
        <td colspan="3"><input type="text" name="verifying_physician" placeholder="Physician name / signature"></td>
      </tr>
      <tr>
        <td style="padding:5px 10px;" colspan="2">
          <span style="font-weight:600;color:var(--navy);margin-right:10px;">Family informed:</span>
          <label class="cblabel" style="margin-right:10px;"><input type="checkbox" name="family_informed" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="family_informed" value="No"> No</label>
        </td>
        <td style="padding:5px 10px;" colspan="2">
          <span style="font-weight:600;color:var(--navy);margin-right:10px;">Post-mortem care initiated:</span>
          <label class="cblabel" style="margin-right:10px;"><input type="checkbox" name="postmortem" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="postmortem" value="No"> No</label>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       SIGNATURE TABLE
  ══════════════════════════════════════ -->
  <div style="height:10px;background:var(--bg);border-top:1px solid var(--border);"></div>
  <table class="sig-table">
    <thead>
      <tr>
        <th style="width:16%;">Role</th>
        <th style="width:36%;">Signature</th>
        <th style="width:48%;">Date and Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="rlbl">Nurse/Staff</td>
        <td><input type="text" name="nurse_sig" placeholder="Signature"></td>
        <td style="display:flex;gap:6px;align-items:center;border:none;">
          <input type="date" name="nurse_date" style="flex:1;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:14px;height:20px;outline:none;">
          <input type="time" name="nurse_time" style="flex:1;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:14px;height:20px;outline:none;">
        </td>
      </tr>
      <tr>
        <td class="rlbl">Consultant/<br>Intensivist</td>
        <td><input type="text" name="consult_sig" placeholder="Signature"></td>
        <td style="display:flex;gap:6px;align-items:center;border:none;">
          <input type="date" name="consult_date2" style="flex:1;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:14px;height:20px;outline:none;">
          <input type="time" name="consult_time2" style="flex:1;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:14px;height:20px;outline:none;">
        </td>
      </tr>
      <tr>
        <td class="rlbl">Verified By</td>
        <td><input type="text" name="verified_sig" placeholder="Signature"></td>
        <td style="display:flex;gap:6px;align-items:center;border:none;">
          <input type="date" name="verified_date" style="flex:1;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:14px;height:20px;outline:none;">
          <input type="time" name="verified_time" style="flex:1;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:14px;height:20px;outline:none;">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
  <div class="form-footer">
    <span class="footer-ref">AF/LES/PCN/v01/Jan2026 – AF10</span>
    <div class="btn-group">
      <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
      <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Save &amp; Submit</button>
    </div>
  </div>

</div>
</form>

<div class="toast" id="toast">✓ Form submitted successfully!</div>

<script>
function confirmSubmit() {
    if (confirm("Are you sure you want to submit this form?")) {
        document.getElementById("mainForm").submit();
    }
}
function resetForm() {
  if (confirm('Reset all form fields?')) document.getElementById('mainForm').reset();
}
</script>
</body>
</html>