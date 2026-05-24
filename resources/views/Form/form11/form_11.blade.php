<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ISBAR Handover Communication Form</title>
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
  padding: 12px;
}
.form-card {
  margin: 0 auto;
  /* max-width: 960px; */
  width: 100%;
  border-radius: var(--radius);
  box-shadow: 0 2px 12px rgba(26,58,92,0.1);
  overflow: hidden;
  border: 1px solid var(--border);
  background: var(--white);
}

/* ── PATIENT BAR ── */
.patient-bar {
  background: #1c7da3;
  display: grid;
  grid-template-columns: 1fr 1fr 200px;
}
.pb-cell {
  padding: 4px 10px;
  display: flex; align-items: center; gap: 6px;
  border-right: 1px solid rgba(255,255,255,0.2);
}
.pb-cell:last-child { border-right: none; }
.pb-cell label { font-size: 12px; color: rgba(255,255,255,0.85); font-weight: 700; text-transform: uppercase; white-space: nowrap; }
.pb-cell input {
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.3);
  color: #fff; border-radius: 3px;
  padding: 2px 6px; font-size: 14px;
  height: 26px; outline: none; flex: 1; width: 100%;
}
.pb-cell input::placeholder { color: rgba(255,255,255,0.4); }

/* ── SECTION HEADER ── */
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
  height: 14px;
  background: var(--navy-mid);
  border-radius: 2px;
}
.sec-letter {
  background: var(--navy);
  color: #fff;
  font-size: 13px;
  font-weight: 800;
  width: 22px; height: 22px;
  border-radius: 4px;
  display: inline-flex;
  align-items: center; justify-content: center;
  margin-left: 4px;
  flex-shrink: 0;
}
.sec-title { flex: 1; }

/* ── FORM ROWS ── */
.field-row {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  padding: 5px 12px;
  border-bottom: 1px solid var(--border-light);
  font-size: 14px;
  background: var(--white);
}
.field-row:nth-child(even) { background: var(--row-alt); }
.field-row .row-label {
  font-weight: 600;
  color: var(--navy);
  white-space: nowrap;
  min-width: 200px;
  padding-top: 3px;
  font-size: 13.5px;
}
.field-row .row-content {
  flex: 1;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 6px;
}

/* ── INPUTS ── */
input[type="text"],
input[type="date"],
input[type="time"],
input[type="number"],
select,
textarea {
  background: var(--input-bg);
  border: 1px solid var(--border);
  border-radius: 3px;
  color: var(--text);
  font-size: 13.5px;
  padding: 3px 7px;
  height: 26px;
  outline: none;
  font-family: inherit;
  transition: border-color 0.15s;
}
input[type="text"]:focus,
input[type="date"]:focus,
input[type="time"]:focus,
input[type="number"]:focus,
select:focus,
textarea:focus {
  border-color: var(--navy);
}
input.full { width: 100%; }
input.w80 { width: 80px; }
input.w120 { width: 120px; }
input.w160 { width: 160px; }
input.w200 { width: 200px; }
select { height: 26px; }
textarea { height: auto; min-height: 60px; resize: vertical; padding: 5px 8px; }

/* ── CHECKBOX GROUPS ── */
.cb-group {
  display: flex;
  flex-wrap: wrap;
  gap: 6px 14px;
  align-items: center;
}
.cblabel {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  cursor: pointer;
  font-size: 13.5px;
  white-space: nowrap;
  user-select: none;
}
.cblabel input[type="checkbox"] {
  width: 13px; height: 13px;
  accent-color: var(--navy);
  cursor: pointer;
  margin: 0;
}

/* ── VITAL SIGNS INLINE ── */
.vitals-inline {
  display: flex;
  flex-wrap: wrap;
  gap: 6px 14px;
  align-items: center;
}
.vital-pair {
  display: flex;
  align-items: center;
  gap: 4px;
}
.vital-pair .vlbl {
  font-weight: 600;
  color: var(--navy);
  font-size: 13px;
  white-space: nowrap;
}

/* ── RECOMMENDATION ROWS ── */
.rec-row {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 5px 12px;
  border-bottom: 1px solid var(--border-light);
  font-size: 14px;
  background: var(--white);
}
.rec-row:nth-child(even) { background: var(--row-alt); }
.rec-row .rec-check { min-width: 180px; display: flex; align-items: center; gap: 5px; }
.rec-row input.rec-input {
  flex: 1;
  border: none;
  border-bottom: 1px dashed var(--border);
  background: transparent;
  font-size: 13.5px;
  height: 22px;
  outline: none;
  padding: 1px 4px;
}

/* ── HANDOVER META ── */
.handover-meta {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  border-bottom: 1px solid var(--border);
}
.hm-cell {
  padding: 5px 10px;
  display: flex; align-items: center; gap: 6px;
  border-right: 1px solid var(--border);
  font-size: 13.5px; background: #f7f9fc;
}
.hm-cell:last-child { border-right: none; }
.hm-cell label { font-weight: 600; color: var(--navy); white-space: nowrap; }

/* ── SIGNATURE TABLE ── */
.sig-table { width: 100%; border-collapse: collapse; font-size: 14px; border-top: 2px solid var(--navy); }
.sig-table th {
  background: var(--navy-light); color: var(--navy);
  font-weight: 700; font-size: 13.5px;
  padding: 5px 10px; border: 1px solid var(--border);
  text-align: left;
}
.sig-table td {
  padding: 5px 10px;
  border: 1px solid var(--border-light);
  vertical-align: middle;
  height: 30px;
}
.sig-table tr:nth-child(even) td { background: var(--row-alt); }
.sig-table .rlbl {
  font-weight: 600; color: var(--navy);
  background: var(--navy-light) !important;
  white-space: nowrap; width: 160px;
}
.sig-table input {
  width: 100%; border: none;
  border-bottom: 1px solid var(--border);
  background: transparent; font-size: 13.5px;
  height: 20px; padding: 1px 3px; outline: none;
}
.sig-dt {
  display: flex; gap: 6px; align-items: center;
}
.sig-dt input {
  flex: 1; border: none !important;
  border-bottom: 1px solid var(--border) !important;
  background: transparent; font-size: 13.5px;
  height: 20px; outline: none;
}

/* ── FOOTER ── */
.form-footer {
  background: var(--navy-light);
  padding: 8px 14px;
  display: flex; justify-content: space-between; align-items: center;
  border-top: 1px solid var(--border);
}
.footer-ref { font-size: 12px; color: var(--text-muted); }
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

/* ── PRINT ── */
@media print {
  body { background: #fff; padding: 0; }
  .btn-group { display: none; }
  .form-card { box-shadow: none; max-width: 100%; }
  @page { size: A4; margin: 8mm; }
}
@media (max-width: 700px) {
  .patient-bar { grid-template-columns: 1fr; }
  .handover-meta { grid-template-columns: 1fr; }
  .vital-pair input { width: 70px; }
}
</style>
</head>
<body>

<form id="mainForm" action="{{ route('isbar.store') }}"  method="POST" enctype="multipart/form-data">
@csrf

<div class="form-card">

  <!-- ══════════════════════════════════════
       TITLE
  ══════════════════════════════════════ -->
  <h1 style="text-align:center; font-size:15px; font-weight:bold; padding:8px 12px; background:#fff; border-bottom:2px solid var(--navy); color:var(--navy); text-transform:uppercase; letter-spacing:0.8px;">
    ISBAR Handover Communication Form
  </h1>

  <!-- ══════════════════════════════════════
       PATIENT BAR
  ══════════════════════════════════════ -->
  <div class="patient-bar">
    <div class="pb-cell"><label>Patient Name:</label><input type="text" name="patient_name" placeholder="Full Name"></div>
    <div class="pb-cell"><label>UHID:</label><input type="text" name="uhid" placeholder="UHID"></div>
    {{-- <div class="pb-cell"><label>Ward/Bed:</label><input type="text" name="ward_bed" placeholder="Ward / Bed No."></div> --}}
  </div>

  <!-- Handover Meta -->
  <div class="handover-meta">
    <div class="hm-cell"><label>Date:</label><input type="date" name="handover_date" style="flex:1;"></div>
    <div class="hm-cell"><label>Time:</label><input type="time" name="handover_time" style="flex:1;"></div>
    {{-- <div class="hm-cell"><label>Handover From:</label><input type="text" name="handover_from" placeholder="Staff name" style="flex:1;"></div> --}}
  </div>

  <!-- ══════════════════════════════════════
       I – INTRODUCTION
  ══════════════════════════════════════ -->
  {{-- <div class="sec-hd">
    <span class="sec-letter">I</span>
    <span class="sec-title">Introduction</span>
  </div>

  <div class="field-row">
    <div class="row-label">Nurse / Staff Introducing:</div>
    <div class="row-content">
      <input type="text" name="staff_name" placeholder="Full Name" class="w200">
      <span style="color:var(--text-muted);font-size:13px;">Designation:</span>
      <input type="text" name="staff_designation" placeholder="e.g. Staff Nurse" class="w160">
      <span style="color:var(--text-muted);font-size:13px;">Shift:</span>
      <select name="shift">
        <option value="">Select</option>
        <option>Morning</option>
        <option>Evening</option>
        <option>Night</option>
      </select>
    </div>
  </div>
  <div class="field-row">
    <div class="row-label">Receiving Staff:</div>
    <div class="row-content">
      <input type="text" name="receiving_staff" placeholder="Full Name" class="w200">
      <span style="color:var(--text-muted);font-size:13px;">Designation:</span>
      <input type="text" name="receiving_designation" placeholder="Designation" class="w160">
    </div>
  </div> --}}

  <!-- ══════════════════════════════════════
       S – SITUATION
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">
    {{-- <span class="sec-letter">S</span> --}}
    <span class="sec-title">Situation</span>
  </div>

  <!-- S1: Patient Condition -->
  <div class="field-row">
    <div class="row-label">1. Patient Condition:</div>
    <div class="row-content">
      <div class="cb-group">
        <label class="cblabel"><input type="checkbox" name="patient_condition[]" value="Good"> Good</label>
        <label class="cblabel"><input type="checkbox" name="patient_condition[]" value="Improving"> Improving</label>
        <label class="cblabel"><input type="checkbox" name="patient_condition[]" value="Not good"> Not good</label>
        <label class="cblabel"><input type="checkbox" name="patient_condition[]" value="Deteriorating"> Deteriorating</label>
        <label class="cblabel"><input type="checkbox" name="patient_condition[]" value="Critical"> Critical</label>
      </div>
    </div>
  </div>

  <!-- S2: Abnormal Vital Signs -->
  <div class="field-row">
    <div class="row-label">2. Abnormal Vital Signs:</div>
    <div class="row-content">
      <div class="cb-group">
        <label class="cblabel"><input type="checkbox" name="vital_status[]" value="Stable"> Stable</label>
        <label class="cblabel"><input type="checkbox" name="vital_status[]" value="Borderline"> Borderline</label>
        <label class="cblabel"><input type="checkbox" name="vital_status[]" value="Unstable"> Unstable</label>
      </div>
      <input type="text" name="vital_status_details" placeholder="Details if any…" style="flex:1; min-width:180px;">
    </div>
  </div>

  <!-- S3: Post-procedure concern -->
  <div class="field-row">
    <div class="row-label">3. Post-Procedure Concern:</div>
    <div class="row-content">
      <input type="text" name="post_procedure_concern" placeholder="If any…" class="full">
    </div>
  </div>

  <!-- S4: Medication related issues -->
  <div class="field-row">
    <div class="row-label">4. Medication Related Issues:</div>
    <div class="row-content">
      <input type="text" name="medication_issues" placeholder="If any…" class="full">
    </div>
  </div>

  <!-- S5: Lines / Devices -->
  <div class="field-row">
    <div class="row-label">5. Lines / Devices:</div>
    <div class="row-content">
      <div class="cb-group">
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="IV"> IV</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="Central line"> Central line</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="Foley"> Foley</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="NG"> NG</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="Drain"> Drain</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="Ventilator"> Ventilator</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="CPAP/BiPAP"> CPAP/BiPAP</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="O2"> O₂</label>
        <label class="cblabel"><input type="checkbox" name="lines_devices[]" value="Inotrope"> Inotrope</label>
      </div>
    </div>
  </div>

  <!-- S6: Situation Details -->
  <div class="field-row">
    <div class="row-label">6. Situation Details:</div>
    <div class="row-content">
      <textarea name="situation_details" placeholder="If any…" style="width:100%;"></textarea>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       B – BACKGROUND
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">
    {{-- <span class="sec-letter">B</span> --}}
    <span class="sec-title">Background</span>
  </div>

  <!-- B1: Diagnosis -->
  <div class="field-row">
    <div class="row-label">1. Diagnosis:</div>
    <div class="row-content">
      <input type="text" name="diagnosis" placeholder="Primary diagnosis…" class="full">
    </div>
  </div>

  <!-- B2: Relevant History -->
  <div class="field-row">
    <div class="row-label">2. Relevant History:</div>
    <div class="row-content">
      <div class="cb-group">
        <label class="cblabel"><input type="checkbox" name="history[]" value="DM"> DM</label>
        <label class="cblabel"><input type="checkbox" name="history[]" value="HTN"> HTN</label>
        <label class="cblabel"><input type="checkbox" name="history[]" value="CKD"> CKD</label>
        <label class="cblabel"><input type="checkbox" name="history[]" value="IHD"> IHD</label>
        <label class="cblabel"><input type="checkbox" name="history[]" value="Asthma"> Asthma</label>
        <label class="cblabel"><input type="checkbox" name="history[]" value="Stroke"> Stroke</label>
        <label class="cblabel"><input type="checkbox" name="history[]" value="Others">
          Others:
        </label>
        <input type="text" name="history_others" placeholder="Specify…" class="w160">
      </div>
    </div>
  </div>

  <!-- B3: Surgery / Procedure -->
  <div class="field-row">
    <div class="row-label">3. History of Surgery / Procedure:</div>
    <div class="row-content">
      <input type="text" name="surgery_history" placeholder="Details…" class="full">
    </div>
  </div>

  <!-- B4: Allergies -->
  <div class="field-row">
    <div class="row-label">4. Allergies:</div>
    <div class="row-content">
      <div class="cb-group">
        <label class="cblabel"><input type="checkbox" name="allergy[]" value="Drug"> Drug</label>
        <input type="text" name="allergy_drug" placeholder="Specify…" class="w120">
        <label class="cblabel"><input type="checkbox" name="allergy[]" value="Food"> Food</label>
        <input type="text" name="allergy_food" placeholder="Specify…" class="w120">
        <label class="cblabel"><input type="checkbox" name="allergy[]" value="Latex"> Latex</label>
        <label class="cblabel"><input type="checkbox" name="allergy[]" value="Other"> Other</label>
        <input type="text" name="allergy_other" placeholder="Specify…" class="w120">
      </div>
    </div>
  </div>

  <!-- B5: Additional Background -->
  <div class="field-row">
    <div class="row-label">5. Additional Background:</div>
    <div class="row-content">
      <textarea name="additional_background" placeholder="If any…" style="width:100%;"></textarea>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       A – ASSESSMENT
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">
    {{-- <span class="sec-letter">A</span> --}}
    <span class="sec-title">Assessment</span>
  </div>

  <!-- A1: Vital Signs -->
  <div class="field-row">
    <div class="row-label">1. Vital Signs Status:</div>
    <div class="row-content">
      <div class="vitals-inline">
        <div class="vital-pair">
          <span class="vlbl">HR:</span>
          <input type="text" name="vs_hr" placeholder="bpm" class="w80">
        </div>
        <div class="vital-pair">
          <span class="vlbl">BP:</span>
          <input type="text" name="vs_bp" placeholder="mmHg" class="w80">
        </div>
        <div class="vital-pair">
          <span class="vlbl">RR:</span>
          <input type="text" name="vs_rr" placeholder="/min" class="w80">
        </div>
        <div class="vital-pair">
          <span class="vlbl">Temp:</span>
          <input type="text" name="vs_temp" placeholder="°C" class="w80">
        </div>
        <div class="vital-pair">
          <span class="vlbl">SpO₂:</span>
          <input type="text" name="vs_spo2" placeholder="%" class="w80">
        </div>
        <div class="vital-pair">
          <span class="vlbl">Pain Score:</span>
          <input type="text" name="vs_pain" placeholder="0–10" class="w80">
        </div>
      </div>
    </div>
  </div>

  <!-- A2: Consciousness -->
  <div class="field-row">
    <div class="row-label">2. Consciousness:</div>
    <div class="row-content">
      <div class="cb-group">
        <label class="cblabel"><input type="checkbox" name="consciousness[]" value="Alert & Oriented"> Alert &amp; Oriented</label>
        <label class="cblabel"><input type="checkbox" name="consciousness[]" value="Drowsy"> Drowsy</label>
        <label class="cblabel"><input type="checkbox" name="consciousness[]" value="Unresponsive"> Unresponsive</label>
        <label class="cblabel"><input type="checkbox" name="consciousness[]" value="GCS"> GCS:</label>
        <input type="text" name="consciousness_gcs" placeholder="Score…" class="w80">
      </div>
    </div>
  </div>

  <!-- A3: Critical Investigations -->
  <div class="field-row">
    <div class="row-label">3. Critical Investigations:</div>
    <div class="row-content">
      <textarea name="critical_investigations" placeholder="Lab values, imaging, ECG findings…" style="width:100%;"></textarea>
    </div>
  </div>

  <!-- A4: Assessment Notes -->
  <div class="field-row">
    <div class="row-label">4. Assessment Notes:</div>
    <div class="row-content">
      <textarea name="assessment_notes" placeholder="Clinical impression and summary…" style="width:100%; min-height:70px;"></textarea>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       R – RECOMMENDATION
  ══════════════════════════════════════ -->
  <div class="sec-hd" style="margin-top:2px;">
    {{-- <span class="sec-letter">R</span> --}}
    <span class="sec-title">Recommendation</span>
  </div>

  <!-- R1: Action Required -->
  <div style="background:var(--navy-light); padding:4px 14px 2px; font-weight:600; font-size:13.5px; color:var(--navy); border-bottom:1px solid var(--border-light);">
    1. Action Required:
  </div>

  <div class="rec-row">
    <label class="cblabel rec-check"><input type="checkbox" name="action[]" value="Continue monitoring"> Continue monitoring:</label>
    <input type="text" class="rec-input" name="action_monitoring" placeholder="…">
  </div>
  <div class="rec-row">
    <label class="cblabel rec-check"><input type="checkbox" name="action[]" value="Inform doctor"> Inform doctor:</label>
    <input type="text" class="rec-input" name="action_doctor" placeholder="…">
  </div>
  <div class="rec-row">
    <label class="cblabel rec-check"><input type="checkbox" name="action[]" value="Medication review"> Medication review:</label>
    <input type="text" class="rec-input" name="action_medication" placeholder="…">
  </div>
  <div class="rec-row">
    <label class="cblabel rec-check"><input type="checkbox" name="action[]" value="Investigations"> Investigations:</label>
    <input type="text" class="rec-input" name="action_investigations" placeholder="…">
  </div>
  <div class="rec-row">
    <label class="cblabel rec-check"><input type="checkbox" name="action[]" value="Immediate escalation"> Immediate escalation ↑:</label>
    <input type="text" class="rec-input" name="action_escalation" placeholder="…">
  </div>

  <!-- R2: Recommendation / Plan -->
  <div class="field-row" style="background:var(--white);">
    <div class="row-label">2. Recommendation / Plan:</div>
    <div class="row-content">
      <textarea name="recommendation_plan" placeholder="Detailed plan and next steps…" style="width:100%; min-height:70px;"></textarea>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       SIGNATURE TABLE
  ══════════════════════════════════════ -->
  {{-- <div style="height:8px; background:var(--bg); border-top:1px solid var(--border);"></div>
  <table class="sig-table">
    <thead>
      <tr>
        <th style="width:18%;">Role</th>
        <th style="width:30%;">Name &amp; Signature</th>
        <th style="width:26%;">Date</th>
        <th style="width:26%;">Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="rlbl">Handing Over Nurse</td>
        <td><input type="text" name="handover_nurse_sig" placeholder="Name / Signature"></td>
        <td><input type="date" name="handover_nurse_date"></td>
        <td><input type="time" name="handover_nurse_time"></td>
      </tr>
      <tr>
        <td class="rlbl">Receiving Nurse</td>
        <td><input type="text" name="receiving_nurse_sig" placeholder="Name / Signature"></td>
        <td><input type="date" name="receiving_nurse_date"></td>
        <td><input type="time" name="receiving_nurse_time"></td>
      </tr>
      <tr>
        <td class="rlbl">Verified By</td>
        <td><input type="text" name="verified_sig" placeholder="Name / Signature"></td>
        <td><input type="date" name="verified_date"></td>
        <td><input type="time" name="verified_time"></td>
      </tr>
    </tbody>
  </table> --}}

  <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
  <div class="form-footer">
    <span class="footer-ref">AF/LES/ISBAR/v01/Jan2026 – ISBAR</span>
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
  if (confirm("Are you sure you want to submit this handover form?")) {
    document.getElementById("mainForm").submit();
  }
}
function resetForm() {
  if (confirm('Reset all form fields?')) {
    document.getElementById('mainForm').reset();
  }
}
</script>

</body>
</html>