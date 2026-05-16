<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admission Note – ICU/HDU (IAN)</title>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #1a3a5c; --navy-light: #eef3f8; --navy-mid: #2d5a8e;
  --border: #c8d4e0; --border-light: #e2eaf2;
  --text: #1e2d3d; --text-muted: #5a7a9a;
  --bg: #f4f7fa; --white: #ffffff; --input-bg: #fafcff;
  --success: #15803d; --radius: 5px; --radius-sm: 3px;
}
body { font-family: 'Segoe UI', system-ui, sans-serif; font-size: 11.5px; background: var(--bg); color: var(--text); padding: 10px; }

/* ── CARD ── */
.form-card { margin: 0 auto; background: var(--white); border-radius: var(--radius); box-shadow: 0 2px 12px rgba(26,58,92,0.1); overflow: hidden; border: 1px solid var(--border); }


/* ── PATIENT BAR ── */
.patient-bar { background: #1c7da3; padding: 0; display: grid; grid-template-columns: 1fr 200px; }
.pb-cell { padding: 4px 10px; display: flex; align-items: center; gap: 6px; border-right: 1px solid rgba(255,255,255,0.2); border-bottom: 1px solid rgba(255,255,255,0.15); }
.pb-cell:last-child { border-right: none; }
.pb-cell label { font-size: 10px; color: rgba(255,255,255,0.8); font-weight: 700; text-transform: uppercase; white-space: nowrap; }
.pb-cell input { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; border-radius: 3px; padding: 2px 6px; font-size: 11px; height: 22px; outline: none; flex: 1; }
.pb-cell input::placeholder { color: rgba(255,255,255,0.4); }

/* ── INFO ROWS ── */
.info-row { display: flex; flex-wrap: wrap; gap: 2px 10px; align-items: center; padding: 3px 10px; border-bottom: 1px solid var(--border); font-size: 11px; background: #f7f9fc; }
.ir-label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.info-row input[type="text"], .info-row input[type="date"], .info-row input[type="time"], .info-row input[type="number"] {
  height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; background: var(--white); outline: none;
}
.cblabel { display: inline-flex; align-items: center; gap: 3px; cursor: pointer; font-size: 11px; white-space: nowrap; user-select: none; }
.cblabel input[type="checkbox"] { width: 12px; height: 12px; accent-color: var(--navy); cursor: pointer; }

/* ── SECTION HEADER ── */
.sec-hd { background: var(--navy-light); border-top: 2px solid var(--navy); border-bottom: 1px solid var(--border); padding: 4px 10px; font-size: 10.5px; font-weight: 700; color: var(--navy); text-transform: uppercase; letter-spacing: 0.5px; display: flex; align-items: center; gap: 5px; }
.sec-hd::before { content: ''; display: inline-block; width: 3px; height: 10px; background: var(--navy-mid); border-radius: 2px; }

/* ── SUB HEADER ── */
.sub-hd { background: #dde8f5; border-bottom: 1px solid var(--border); border-top: 1px solid var(--border-light); padding: 3px 10px; font-size: 10.5px; font-weight: 700; color: var(--navy); }

/* ── GENERIC TABLE ── */
.g-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.g-table th { background: var(--navy-light); color: var(--navy); font-weight: 700; font-size: 10.5px; padding: 3px 8px; border: 1px solid var(--border); text-align: left; }
.g-table td { padding: 2px 7px; border: 1px solid var(--border-light); vertical-align: middle; min-height: 24px; }
.g-table tr:nth-child(even) td { background: #f8fbff; }
.g-table .row-lbl { font-weight: 600; color: var(--navy); background: var(--navy-light) !important; border: 1px solid var(--border); white-space: nowrap; }
.g-table td input[type="text"], .g-table td input[type="number"] {
  width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none;
}

/* ── SECTION BODY ── */
.sec-body { padding: 4px 10px; border-bottom: 1px solid var(--border); }
.form-row { display: flex; flex-wrap: wrap; gap: 3px 8px; align-items: center; padding: 2px 0; border-bottom: 1px dashed var(--border-light); font-size: 11px; }
.form-row:last-child { border-bottom: none; }
.fl { font-weight: 600; color: var(--navy); white-space: nowrap; min-width: 120px; }
.inp-full { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; }
.inp-sm { height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; outline: none; background: var(--input-bg); width: 80px; }
.cbgroup { display: flex; flex-wrap: wrap; gap: 3px 8px; align-items: center; }

/* ── VITALS TABLE ── */
.vital-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.vital-table th { background: var(--navy-light); color: var(--navy); font-weight: 700; font-size: 10.5px; padding: 3px 8px; border: 1px solid var(--border); text-align: center; }
.vital-table td { padding: 2px 6px; border: 1px solid var(--border-light); vertical-align: middle; }
.vital-table .param { font-weight: 600; color: var(--navy); background: #f5f8fc; width: 130px; }
.vital-table input { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; text-align: center; }

/* ── MED TABLE ── */
.med-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.med-table th { background: var(--navy-light); color: var(--navy); font-weight: 700; font-size: 10.5px; padding: 3px 8px; border: 1px solid var(--border); text-align: left; }
.med-table td { padding: 2px 6px; border: 1px solid var(--border-light); vertical-align: middle; min-height: 24px; }
.med-table tr:nth-child(even) td { background: #f8fbff; }
.med-table input { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; }

/* ── SIGNATURE ── */
.sig-row { display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid var(--border-light); }
.sig-row:last-child { border-bottom: none; }
.sig-cell { padding: 8px 12px; border-right: 1px solid var(--border-light); }
.sig-cell:last-child { border-right: none; }
.sig-cell label { display: block; font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 3px; }
.sig-cell input { width: 100%; border: none; border-bottom: 1px solid var(--border); border-radius: 0; padding: 2px 0; background: transparent; font-size: 11px; outline: none; height: 24px; }

/* ── FOOTER ── */
.form-footer { background: var(--navy-light); padding: 8px 14px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); }
.footer-ref { font-size: 10px; color: var(--text-muted); }
.btn-group { display: flex; gap: 8px; }
.btn { padding: 5px 18px; border-radius: 3px; font-size: 11.5px; font-weight: 600; cursor: pointer; border: 1px solid transparent; transition: all 0.15s; }
.btn-outline { background: var(--white); border-color: var(--border); color: var(--text-muted); }
.btn-outline:hover { border-color: var(--navy-mid); color: var(--navy); }
.btn-primary { background: var(--navy); color: #fff; }
.btn-primary:hover { background: var(--navy-mid); }

/* ── TOAST ── */
.toast { position: fixed; top: 20px; right: 20px; background: var(--success); color: #fff; padding: 10px 16px; border-radius: 5px; font-size: 12px; font-weight: 600; box-shadow: 0 4px 16px rgba(0,0,0,0.2); transform: translateX(120%); transition: transform 0.3s ease; z-index: 9999; }
.toast.show { transform: translateX(0); }

.spacer { height: 10px; background: var(--bg); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

@media (max-width: 700px) {
  .top-header { grid-template-columns: 1fr; }
  .sig-row { grid-template-columns: 1fr; }
}
@media print {
  body { background: #fff; padding: 0; }
  .btn-group { display: none; }
  .form-card { box-shadow: none; }
}
</style>
</head>
<body>
<form id="mainForm">
<div class="form-card">

  <!-- PATIENT BAR -->
  <div class="patient-bar">
    <div class="pb-cell"><label>Patient Name:</label><input type="text" name="patient_name" placeholder="Full Name"></div>
    <div class="pb-cell"><label>UHID:</label><input type="text" name="uhid" placeholder="UHID"></div>
  </div>

  <!-- INFO ROWS -->
  <div class="info-row">
    <span class="ir-label">Gender:</span>
    <label class="cblabel"><input type="checkbox" name="gender" value="M"> M</label>
    <label class="cblabel"><input type="checkbox" name="gender" value="F"> F</label>
    <span class="ir-label" style="margin-left:16px;">Age:</span>
    <input type="number" name="age" style="width:50px;">
  </div>
  <div class="info-row">
    <span class="ir-label">Weight:</span>
    <input type="number" name="weight" style="width:55px;" step="0.1"> <span>Kg</span>
    <span class="ir-label" style="margin-left:12px;">Height:</span>
    <input type="number" name="height" style="width:55px;" step="0.1"> <span>cm</span>
  </div>
  <div class="info-row">
    <span class="ir-label">Location:</span>
    <label class="cblabel"><input type="checkbox" name="location" value="ICU"> ICU</label>
    <label class="cblabel"><input type="checkbox" name="location" value="HDU"> HDU</label>
  </div>
  <div class="info-row">
    <span class="ir-label">Consultant:</span>
    <input type="text" name="consultant" style="width:180px;" placeholder="Consultant name">
    <span class="ir-label" style="margin-left:12px;">Admitting Nurse:</span>
    <input type="text" name="admitting_nurse" style="width:150px;" placeholder="Nurse name">
  </div>
  <div class="info-row">
    <span class="ir-label">Date of Admission:</span>
    <input type="date" name="adm_date">
    <span class="ir-label" style="margin-left:12px;">Time:</span>
    <input type="time" name="adm_time">
  </div>

  <!-- ══ ADMISSION DETAILS ══ -->
  <div class="spacer"></div>
  <div class="sec-hd">Admission Details</div>
  <div class="sec-body">
    <div class="form-row">
      <span class="fl">Source of Admission:</span>
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="source" value="CT-OT"> CT-OT</label>
        <label class="cblabel"><input type="checkbox" name="source" value="Ward/Cabin"> Ward/Cabin</label>
        <label class="cblabel"><input type="checkbox" name="source" value="CCU"> CCU</label>
        <label class="cblabel"><input type="checkbox" name="source" value="MICU/SICU"> MICU/SICU</label>
        <label class="cblabel"><input type="checkbox" name="source" value="ER"> ER</label>
        <label class="cblabel"><input type="checkbox" name="source" value="Other"> Other:</label>
        <input type="text" name="source_other" style="width:80px;height:20px;border:none;border-bottom:1px solid var(--border);background:transparent;outline:none;">
      </div>
    </div>
    <div class="form-row">
      <span class="fl">Reason for Admission:</span>
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="reason" value="Emergency"> Emergency</label>
        <label class="cblabel"><input type="checkbox" name="reason" value="Urgent"> Urgent</label>
        <label class="cblabel"><input type="checkbox" name="reason" value="Salvage"> Salvage</label>
        <label class="cblabel"><input type="checkbox" name="reason" value="Post-Surgical"> Post-Surgical</label>
        <label class="cblabel"><input type="checkbox" name="reason" value="Other"> Other:</label>
        <input type="text" name="reason_other" style="width:80px;height:20px;border:none;border-bottom:1px solid var(--border);background:transparent;outline:none;">
      </div>
    </div>
    <div class="form-row">
      <span class="fl">Current Status:</span>
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="status" value="Stable"> Stable</label>
        <label class="cblabel"><input type="checkbox" name="status" value="Critical"> Critical</label>
        <label class="cblabel"><input type="checkbox" name="status" value="Intubated"> Intubated</label>
        <label class="cblabel"><input type="checkbox" name="status" value="On Inotropes"> On Inotropes</label>
        <label class="cblabel"><input type="checkbox" name="status" value="Others"> Others:</label>
        <input type="text" name="status_other" style="width:80px;height:20px;border:none;border-bottom:1px solid var(--border);background:transparent;outline:none;">
      </div>
    </div>
  </div>

  <!-- ══ PRESENTING HISTORY / PATIENT SUMMARY ══ -->
  <div class="sec-hd">Presenting History / Patient's Summary</div>
  <div class="sec-body">
    <div class="form-row">
      <span class="fl">Surgery/Procedure Performed:</span>
      <input type="text" name="surgery_procedure" style="flex:1;" class="inp-full">
    </div>
    <div class="form-row">
      <span class="fl">Date &amp; Time of Surgery:</span>
      <input type="date" name="surgery_date" class="inp-sm" style="width:130px;">
      <input type="time" name="surgery_time" class="inp-sm">
    </div>
    <div class="form-row">
      <span class="fl">Intraoperative Events / Complications:</span>
      <input type="text" name="intraop_events" style="flex:1;" class="inp-full">
    </div>
    <div class="form-row">
      <span class="fl">Current Clinical Concerns:</span>
      <input type="text" name="clinical_concerns" style="flex:1;" class="inp-full">
    </div>
  </div>

  <!-- ══ VITAL SIGNS ON ADMISSION ══ -->
  <div class="sec-hd">Vital Signs on Admission</div>
  <table class="vital-table">
    <thead>
      <tr>
        <th style="width:130px;text-align:left;">Parameters</th>
        <th>Value</th>
        <th>Target</th>
        <th>Notes</th>
      </tr>
    </thead>
    <tbody>
      <tr><td class="param">HR (bpm)</td><td><input type="number" name="hr_val" placeholder="bpm"></td><td><input type="text" name="hr_target"></td><td><input type="text" name="hr_notes"></td></tr>
      <tr><td class="param">BP (mmHg)</td>
        <td>
          <div style="display:flex;align-items:center;gap:3px;">
            <input type="number" name="bp_sys" placeholder="Sys" style="width:48%;text-align:center;">
            <span style="font-weight:700;">/</span>
            <input type="number" name="bp_dia" placeholder="Dia" style="width:48%;text-align:center;">
          </div>
        </td>
        <td><input type="text" name="bp_target"></td>
        <td><input type="text" name="bp_notes"></td>
      </tr>
      <tr><td class="param">MAP (mmHg)</td><td><input type="number" name="map_val"></td><td><input type="text" name="map_target"></td><td><input type="text" name="map_notes"></td></tr>
      <tr><td class="param">Temp (°C)</td><td><input type="number" name="temp_val" step="0.1"></td><td><input type="text" name="temp_target"></td><td><input type="text" name="temp_notes"></td></tr>
      <tr><td class="param">SpO₂ (%)</td><td><input type="number" name="spo2_val" max="100"></td><td><input type="text" name="spo2_target"></td><td><input type="text" name="spo2_notes"></td></tr>
      <tr><td class="param">RR (/min)</td><td><input type="number" name="rr_val"></td><td><input type="text" name="rr_target"></td><td><input type="text" name="rr_notes"></td></tr>
      <tr><td class="param">CVP (cmH₂O)</td><td><input type="number" name="cvp_val" step="0.1"></td><td><input type="text" name="cvp_target"></td><td><input type="text" name="cvp_notes"></td></tr>
    </tbody>
  </table>

  <!-- ══ AIRWAY & VENTILATION ══ -->
  <div class="sec-hd">Airway &amp; Ventilation</div>
  <div class="sec-body">
    <div class="form-row">
      <span class="fl">Spontaneously Breathing:</span>
      <label class="cblabel"><input type="checkbox" name="spont_breathing" value="Yes"> Yes</label>
      <label class="cblabel"><input type="checkbox" name="spont_breathing" value="No"> No</label>
    </div>
    <div class="form-row">
      <span class="fl">Intubated:</span>
      <label class="cblabel"><input type="checkbox" name="intubated" value="Yes"> Yes</label>
      <label class="cblabel"><input type="checkbox" name="intubated" value="No"> No</label>
      <span class="ir-label" style="margin-left:16px;">ETT Size:</span>
      <input type="text" name="ett_size" class="inp-sm" style="width:60px;" placeholder="mm">
    </div>
    <div class="form-row">
      <span class="fl">Tracheostomy:</span>
      <label class="cblabel"><input type="checkbox" name="tracheostomy" value="Yes"> Yes</label>
      <label class="cblabel"><input type="checkbox" name="tracheostomy" value="No"> No</label>
    </div>
    <div class="form-row">
      <span class="fl">Ventilator Mode:</span>
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="vent_mode" value="SIMV"> SIMV</label>
        <label class="cblabel"><input type="checkbox" name="vent_mode" value="PCV"> PCV</label>
        <label class="cblabel"><input type="checkbox" name="vent_mode" value="PSV"> PSV</label>
        <label class="cblabel"><input type="checkbox" name="vent_mode" value="CPAP"> CPAP</label>
      </div>
    </div>
    <div class="form-row">
      <span class="fl">Settings:</span>
      <span class="ir-label">FiO₂:</span>
      <input type="number" name="fio2" class="inp-sm" placeholder="%">
      <span class="ir-label" style="margin-left:8px;">PEEP:</span>
      <input type="number" name="peep" class="inp-sm" placeholder="cmH₂O">
      <span class="ir-label" style="margin-left:8px;">Rate:</span>
      <input type="number" name="vent_rate" class="inp-sm" placeholder="/min">
      <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="tv"> TV:</label>
      <input type="number" name="tv_val" class="inp-sm" placeholder="mL">
    </div>
  </div>

  <!-- ══ LINES, DRAINS & CATHETERS ══ -->
  <div class="sec-hd">Lines, Drains &amp; Catheters</div>
  <table class="g-table">
    <thead>
      <tr>
        <th style="width:25%;">Device</th>
        <th style="width:25%;">Site/Type</th>
        <th style="width:25%;">Patency/Flow</th>
        <th>Notes</th>
      </tr>
    </thead>
    <tbody>
      <tr><td class="row-lbl">Central Line</td><td><input type="text" name="cl_site"></td><td><input type="text" name="cl_patency"></td><td><input type="text" name="cl_notes"></td></tr>
      <tr><td class="row-lbl">Arterial Line</td><td><input type="text" name="al_site"></td><td><input type="text" name="al_patency"></td><td><input type="text" name="al_notes"></td></tr>
      <tr><td class="row-lbl">Chest Tube / Drain</td><td><input type="text" name="ct_site"></td><td><input type="text" name="ct_patency"></td><td><input type="text" name="ct_notes"></td></tr>
      <tr><td class="row-lbl">Urinary Catheter</td><td><input type="text" name="uc_site"></td><td><input type="text" name="uc_patency"></td><td><input type="text" name="uc_notes"></td></tr>
      <tr><td class="row-lbl">Other</td><td><input type="text" name="oth_site"></td><td><input type="text" name="oth_patency"></td><td><input type="text" name="oth_notes"></td></tr>
    </tbody>
  </table>

  <!-- ══ INVESTIGATIONS / LAB ORDERS ══ -->
  <div class="sec-hd">Investigations / Lab Orders</div>
  <div class="sec-body">
    <div class="form-row">
      <span class="fl" style="min-width:220px;">CBC/Renal/Electrolytes / ABG:</span>
      <label class="cblabel"><input type="checkbox" name="inv_cbc" value="Done"> Done</label>
      <label class="cblabel" style="margin-left:16px;"><input type="checkbox" name="inv_cbc_p" value="Pending"> Pending</label>
    </div>
    <div class="form-row">
      <span class="fl" style="min-width:220px;">ECG/Echocardiography:</span>
      <label class="cblabel"><input type="checkbox" name="inv_ecg" value="Done"> Done</label>
      <label class="cblabel" style="margin-left:16px;"><input type="checkbox" name="inv_ecg_p" value="Pending"> Pending</label>
    </div>
    <div class="form-row">
      <span class="fl" style="min-width:220px;">Imaging (CXR/CT):</span>
      <label class="cblabel"><input type="checkbox" name="inv_img" value="Done"> Done</label>
      <label class="cblabel" style="margin-left:16px;"><input type="checkbox" name="inv_img_p" value="Pending"> Pending</label>
    </div>
    <div class="form-row">
      <span class="fl" style="min-width:220px;">Special Labs (Lactate, Troponin, etc.):</span>
      <label class="cblabel"><input type="checkbox" name="inv_spl" value="Done"> Done</label>
      <label class="cblabel" style="margin-left:16px;"><input type="checkbox" name="inv_spl_p" value="Pending"> Pending</label>
    </div>
  </div>

  <!-- ══ MEDICATIONS & INFUSIONS ON ADMISSION ══ -->
  <div class="sec-hd">Medications &amp; Infusions on Admission</div>
  <table class="med-table">
    <thead>
      <tr>
        <th style="width:28%;">Medication/Infusion</th>
        <th style="width:18%;">Dose / Rate</th>
        <th style="width:18%;">Route</th>
        <th style="width:20%;">Indication</th>
        <th>Notes</th>
      </tr>
    </thead>
    <tbody id="medBody">
      <tr><td><input type="text" name="med1_name"></td><td><input type="text" name="med1_dose"></td><td><input type="text" name="med1_route"></td><td><input type="text" name="med1_indication"></td><td><input type="text" name="med1_notes"></td></tr>
      <tr><td><input type="text" name="med2_name"></td><td><input type="text" name="med2_dose"></td><td><input type="text" name="med2_route"></td><td><input type="text" name="med2_indication"></td><td><input type="text" name="med2_notes"></td></tr>
      <tr><td><input type="text" name="med3_name"></td><td><input type="text" name="med3_dose"></td><td><input type="text" name="med3_route"></td><td><input type="text" name="med3_indication"></td><td><input type="text" name="med3_notes"></td></tr>
      <tr><td><input type="text" name="med4_name"></td><td><input type="text" name="med4_dose"></td><td><input type="text" name="med4_route"></td><td><input type="text" name="med4_indication"></td><td><input type="text" name="med4_notes"></td></tr>
    </tbody>
  </table>
  <div style="padding:4px 10px;border-bottom:1px solid var(--border);">
    <button type="button" class="btn btn-outline" onclick="addMedRow()" style="font-size:10.5px;padding:3px 12px;">+ Add Row</button>
  </div>

  <!-- ══ NURSING/CARE ORDERS ══ -->
  <div class="sec-hd">Nursing / Care Orders</div>
  <div class="sec-body">
    <div class="form-row">
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="care_order" value="Hourly vitals monitoring"> Hourly vitals monitoring</label>
        <label class="cblabel"><input type="checkbox" name="care_order" value="Strict fluid balance charting 1"> Strict fluid balance charting</label>
        <label class="cblabel"><input type="checkbox" name="care_order" value="Strict fluid balance charting 2"> Strict fluid balance charting</label>
      </div>
    </div>
    <div class="form-row">
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="care_order" value="Pain management/sedation"> Pain management / sedation</label>
        <label class="cblabel"><input type="checkbox" name="care_order" value="Turn/reposition every 2 hours"> Turn/reposition every 2 hours</label>
        <label class="cblabel"><input type="checkbox" name="care_order" value="Wound/chest tube care"> Wound/chest tube care</label>
      </div>
    </div>
    <div class="form-row">
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="care_order" value="Blood glucose monitoring"> Blood glucose monitoring</label>
        <label class="cblabel"><input type="checkbox" name="care_order" value="Insulin infusion protocol"> Insulin infusion protocol</label>
        <label class="cblabel"><input type="checkbox" name="care_order" value="Infection prevention measures"> Infection prevention measures</label>
      </div>
    </div>
  </div>

  <!-- ══ RISK / PRECAUTIONS ══ -->
  <div class="sec-hd">Risk / Precautions</div>
  <div class="sec-body">
    <div class="form-row">
      <div class="cbgroup">
        <label class="cblabel"><input type="checkbox" name="risk" value="Fall risk"> Fall risk</label>
        <label class="cblabel"><input type="checkbox" name="risk" value="Bleeding risk"> Bleeding risk</label>
        <label class="cblabel"><input type="checkbox" name="risk" value="Infection risk"> Infection risk</label>
      </div>
    </div>
    <div class="form-row">
      <span class="fl" style="min-width:80px;">Allergies:</span>
      <label class="cblabel"><input type="checkbox" name="allergy_yn" value="Yes"> Yes</label>
      <label class="cblabel"><input type="checkbox" name="allergy_yn" value="No"> No</label>
      <input type="text" name="allergy_specify" style="width:200px;margin-left:8px;" class="inp-full" placeholder="Specify if Yes">
    </div>
    <div class="form-row">
      <span class="fl" style="min-width:100px;">DNR/Code Status:</span>
      <label class="cblabel"><input type="checkbox" name="code_status" value="Full Code"> Full Code</label>
      <label class="cblabel"><input type="checkbox" name="code_status" value="DNR"> DNR</label>
      <span style="font-size:11px;color:var(--text-muted);margin-left:6px;">If Yes, Specify:</span>
      <input type="text" name="dnr_specify" style="width:160px;" class="inp-full" placeholder="">
    </div>
  </div>

  <!-- ══ ADMISSION SUMMARY / PLAN ══ -->
  <div class="sec-hd">Admission Summary / Plan</div>
  <div class="sec-body">
    <textarea name="admission_summary" rows="4" style="width:100%;border:1px solid var(--border);border-radius:3px;padding:5px 8px;font-size:11px;resize:vertical;outline:none;background:var(--input-bg);font-family:inherit;" placeholder="Summary and management plan…"></textarea>
  </div>

  <!-- SPACER -->
  <div style="height:14px;background:var(--bg);border-top:1px solid var(--border);"></div>

  <!-- SIGNATURES -->
  <div class="sig-row">
    <div class="sig-cell" style="background:var(--navy-light);"><label>Admitting Resident Doctor</label><input type="text" name="resident_name" placeholder="Full name"></div>
    <div class="sig-cell"><label>Signature</label><input type="text" name="resident_sig" placeholder="Signature"></div>
    <div class="sig-cell"><label>Date and Time</label><input type="datetime-local" name="resident_dt"></div>
  </div>
  <div class="sig-row">
    <div class="sig-cell" style="background:var(--navy-light);"><label>Consultant / Intensivist</label><input type="text" name="consultant_name" placeholder="Full name"></div>
    <div class="sig-cell"><label>Signature</label><input type="text" name="consultant_sig" placeholder="Signature"></div>
    <div class="sig-cell"><label>Date and Time</label><input type="datetime-local" name="consultant_dt"></div>
  </div>
  <div class="sig-row" style="border-top:1px solid var(--border);">
    <div class="sig-cell" style="background:var(--navy-light);"><label>Verified By</label><input type="text" name="verified_by" placeholder="Full name"></div>
    <div class="sig-cell"><label>Signature</label><input type="text" name="verified_sig" placeholder="Signature"></div>
    <div class="sig-cell"><label>Date and Time</label><input type="datetime-local" name="verified_dt"></div>
  </div>

  <!-- FOOTER -->
  <div class="form-footer">
    <span class="footer-ref">AF/ICF/IAN/v01/Jan2026 – AF03</span>
    <div class="btn-group">
      <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
      <button type="button" class="btn btn-primary" onclick="submitForm()">Save &amp; Submit</button>
    </div>
  </div>

</div>
</form>
<div class="toast" id="toast">✓ Form submitted successfully!</div>

<script>
let medCount = 4;
function addMedRow() {
  medCount++;
  const tbody = document.getElementById('medBody');
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td><input type="text" name="med${medCount}_name"></td>
    <td><input type="text" name="med${medCount}_dose"></td>
    <td><input type="text" name="med${medCount}_route"></td>
    <td><input type="text" name="med${medCount}_indication"></td>
    <td><input type="text" name="med${medCount}_notes"></td>`;
  tbody.appendChild(tr);
}
function submitForm() {
  const t = document.getElementById('toast');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}
function resetForm() {
  if (confirm('Reset all form fields?')) document.getElementById('mainForm').reset();
}
</script>
</body>
</html>