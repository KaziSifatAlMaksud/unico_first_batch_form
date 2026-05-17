<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nutritional Assessment for Adult – Nursing (NAN)</title>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #207ba2; --navy-light: #eef3f8; --navy-mid: #2d5a8e;
  --border: #c8d4e0; --border-light: #e2eaf2;
  --text: #1e2d3d; --text-muted: #5a7a9a;
  --bg: #f4f7fa; --white: #ffffff; --input-bg: #fafcff;
  --success: #15803d; --radius: 5px; --radius-sm: 3px;
}
body { font-family: 'Segoe UI', system-ui, sans-serif; font-size: 12px; background: var(--bg); color: var(--text); padding: 10px; }

/* ── CARD ── */
.form-card { margin: 0 auto; background: var(--white); border-radius: var(--radius); box-shadow: 0 2px 12px rgba(26,58,92,0.1); overflow: hidden; border: 1px solid var(--border); }

/* ── TOP HEADER ── */
.top-header { display: grid; grid-template-columns: 140px 1fr 200px; border-bottom: 2px solid var(--navy); }
.logo-area { padding: 8px 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; border-right: 1px solid var(--border); }
.logo-box { width: 52px; height: 52px; background: var(--navy); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px; font-weight: 800; text-align: center; line-height: 1.2; }
.logo-area .hosp-name { font-size: 8px; font-weight: 700; color: var(--navy); text-align: center; margin-top: 3px; text-transform: uppercase; }
.title-area { display: flex; align-items: center; justify-content: center; padding: 10px 16px; background: var(--navy-light); }
.title-area h1 { font-size: 17px; font-weight: 800; color: var(--navy); text-align: center; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.3; }
.patient-label-box { border-left: 1px solid var(--border); padding: 6px 10px; }
.patient-label-box .lbl-title { font-weight: 700; font-size: 9.5px; text-align: center; border: 1px solid var(--border); padding: 2px; margin-bottom: 4px; color: var(--navy); text-transform: uppercase; }
.lbl-row { display: flex; align-items: center; gap: 3px; margin-bottom: 2px; font-size: 9.5px; color: var(--text-muted); }
.lbl-row span:first-child { font-weight: 600; color: var(--text); white-space: nowrap; }
.lbl-line { border-bottom: 1px solid var(--border); flex: 1; min-width: 40px; }

/* ── PATIENT BAR ── */
.patient-bar { background: var(--navy); padding: 5px 12px; display: grid; grid-template-columns: 1fr 180px; gap: 10px; align-items: center; }
.pb-group { display: flex; align-items: center; gap: 6px; }
.pb-group label { font-size: 10px; color: rgba(255,255,255,0.75); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap; }
.pb-group input { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; border-radius: 3px; padding: 2px 7px; font-size: 11px; height: 22px; outline: none; font-weight: 600; }
.pb-group input::placeholder { color: rgba(255,255,255,0.4); }

/* ── INFO ROWS ── */
.info-row { display: flex; flex-wrap: wrap; gap: 3px 10px; align-items: center; padding: 4px 10px; border-bottom: 1px solid var(--border); font-size: 11px; background: #f7f9fc; }
.ir-label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.info-row input[type="text"], .info-row input[type="number"] { height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; background: var(--white); outline: none; }
.cblabel { display: inline-flex; align-items: center; gap: 3px; cursor: pointer; font-size: 11px; white-space: nowrap; user-select: none; }
.cblabel input[type="checkbox"], .cblabel input[type="radio"] { width: 12px; height: 12px; accent-color: var(--navy); cursor: pointer; }

/* ── SECTION HEADER ── */
.section-header { background: var(--navy-light); border-bottom: 1px solid var(--border); border-top: 1px solid var(--border-light); padding: 4px 12px; font-size: 10.5px; font-weight: 700; color: var(--navy); text-transform: uppercase; letter-spacing: 0.6px; display: flex; align-items: center; gap: 5px; }
.section-header::before { content: ''; display: inline-block; width: 3px; height: 10px; background: var(--navy-mid); border-radius: 2px; flex-shrink: 0; }

/* ── GENERIC TABLE ── */
.g-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.g-table th { background: var(--navy-light); color: var(--navy); font-weight: 700; font-size: 10.5px; padding: 4px 8px; border: 1px solid var(--border); text-align: left; }
.g-table td { padding: 3px 8px; border: 1px solid var(--border-light); vertical-align: middle; }
.g-table tr:nth-child(even) td { background: #f8fbff; }
.g-table .sub-hd td { background: #dde8f5; font-weight: 700; font-size: 10.5px; color: var(--navy); border: 1px solid var(--border); }
.g-table .row-lbl { font-size: 11px; color: var(--text); }
.g-table td input[type="text"] { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; }

/* ── SIGNATURE ── */
.sig-grid { display: grid; grid-template-columns: 1fr 1fr; border-top: 1px solid var(--border); }
.sig-cell { padding: 8px 12px; border-right: 1px solid var(--border-light); }
.sig-cell:last-child { border-right: none; }
.sig-cell label { display: block; font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 3px; }
.sig-cell input { width: 100%; border: none; border-bottom: 1px solid var(--border); border-radius: 0; padding: 2px 0; background: transparent; font-size: 12px; outline: none; }

/* ── FOOTER ── */
.form-footer { background: var(--navy-light); padding: 8px 14px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); }
.form-footer .footer-ref { font-size: 10px; color: var(--text-muted); }
.btn-group { display: flex; gap: 8px; }
.btn { padding: 5px 18px; border-radius: 3px; font-size: 11.5px; font-weight: 600; cursor: pointer; border: 1px solid transparent; transition: all 0.15s; }
.btn-outline { background: var(--white); border-color: var(--border); color: var(--text-muted); }
.btn-outline:hover { border-color: var(--navy-mid); color: var(--navy); }
.btn-primary { background: var(--navy); color: #fff; }
.btn-primary:hover { background: var(--navy-mid); }

/* ── TOAST ── */
.toast { position: fixed; top: 20px; right: 20px; background: var(--success); color: #fff; padding: 10px 16px; border-radius: 5px; font-size: 12px; font-weight: 600; box-shadow: 0 4px 16px rgba(0,0,0,0.2); transform: translateX(120%); transition: transform 0.3s ease; z-index: 9999; }
.toast.show { transform: translateX(0); }

/* ── NAN-SPECIFIC ── */
.three-col { display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid var(--border); }
.col-block { padding: 6px 10px; border-right: 1px solid var(--border); }
.col-block:last-child { border-right: none; }
.col-block .col-title { font-weight: 700; font-size: 10.5px; color: var(--navy); text-align: center; margin-bottom: 4px; padding-bottom: 3px; border-bottom: 1px solid var(--border-light); text-transform: uppercase; letter-spacing: 0.4px; }
.col-block .col-row { display: flex; justify-content: space-between; align-items: center; padding: 2px 0; border-bottom: 1px dashed var(--border-light); font-size: 10.5px; }
.col-block .col-row:last-child { border-bottom: none; }
.col-block .col-row .range { color: var(--text-muted); min-width: 65px; }
.col-block .col-row .grade { font-size: 10.5px; }

.section-body { padding: 6px 12px; border-bottom: 1px solid var(--border); }
.form-row { display: flex; flex-wrap: wrap; gap: 4px 10px; align-items: center; padding: 3px 0; border-bottom: 1px dashed var(--border-light); font-size: 11px; }
.form-row:last-child { border-bottom: none; }
.fl { font-weight: 600; color: var(--navy); white-space: nowrap; min-width: 100px; }

.diag-area { padding: 6px 12px; border-bottom: 1px solid var(--border); }
.diag-area textarea { width: 100%; border: 1px solid var(--border); border-radius: 3px; font-size: 11px; padding: 4px 6px; resize: vertical; outline: none; background: var(--input-bg); }

.sign-area { display: grid; grid-template-columns: 1fr 1fr; gap: 0; border: 1px solid var(--border); margin: 8px 12px; border-radius: 3px; overflow: hidden; }
.sign-block { padding: 6px 10px; border-right: 1px solid var(--border); }
.sign-block:last-child { border-right: none; }
.sign-block label { display: block; font-size: 10px; font-weight: 600; color: var(--text-muted); margin-bottom: 3px; text-transform: uppercase; }
.sign-block textarea { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; resize: vertical; padding: 3px; outline: none; min-height: 60px; }

@media (max-width: 700px) {
  .top-header { grid-template-columns: 1fr; }
  .three-col { grid-template-columns: 1fr; }
  .sign-area { grid-template-columns: 1fr; }
}
@media print {
  body { background: #fff; padding: 0; }
  .btn-group { display: none; }
  .form-card { box-shadow: none; }
}
</style>
</head>
<body>
<form id="mainForm" action="{{ route('form6.store') }}"   method="POST" enctype="multipart/form-data">
@csrf
<H1 style="text-align: center; font-size: 15px; font-weight: bold;"> NUTRITIONAL ASSESSMENT FOR ADULT – NURSING (NAN) </H1>
<div class="form-card">

  <!-- PATIENT BAR -->
  <div class="patient-bar">
    <div class="pb-group">
      <label>Patient's Name</label>
      <input type="text" name="patient_name" placeholder="Full Name" style="width:220px;">
    </div>
    <div class="pb-group">
      <label>UHID</label>
      <input type="text" name="uhid" placeholder="UHID" style="width:120px;">
    </div>
  </div>

  <!-- INFO ROWS -->
  <div class="info-row">
    <span class="ir-label">Age:</span>
    <input type="number" name="age" style="width:45px;">
    <span class="ir-label">Gender:</span>
    <label class="cblabel"><input type="checkbox" name="gender" value="M"> M</label>
    <label class="cblabel"><input type="checkbox" name="gender" value="F"> F</label>
    <span class="ir-label" style="margin-left:10px;">Diagnosis:</span>
    <input type="text" name="diagnosis_hdr" style="width:200px;">
  </div>
  <div class="info-row">
    <span class="ir-label">Location:</span>
    <label class="cblabel"><input type="checkbox" name="loc" value="Cabin"> Cabin</label>
    <label class="cblabel"><input type="checkbox" name="loc" value="Ward"> Ward</label>
    <label class="cblabel"><input type="checkbox" name="loc" value="ICU"> ICU</label>
    <label class="cblabel"><input type="checkbox" name="loc" value="HDU"> HDU</label>
    <label class="cblabel"><input type="checkbox" name="loc" value="Others"> Others</label>
  </div>
  <div class="info-row">
    <span class="ir-label">Weight:</span>
    <input type="number" name="weight" style="width:55px;" step="0.1"> <span>Kg</span>
    <span class="ir-label" style="margin-left:10px;">Height:</span>
    <input type="number" name="height" style="width:55px;" step="0.1"> <span>cm</span>
    <span class="ir-label" style="margin-left:10px;">BMI:</span>
    <input type="number" name="bmi" id="bmiVal" style="width:55px;" step="0.1" readonly>
  </div>

  <!-- THREE-COL: Weight Change / Obesity / CED -->
  <div class="three-col">
    <!-- Recent Weight Change -->
    <div class="col-block">
      <div class="col-title">Recent Weight Change</div>
      <div class="col-row">
        <label class="cblabel"><input type="checkbox" name="wt_change" value="Yes"> Yes</label>
        <span>/</span>
        <label class="cblabel"><input type="checkbox" name="wt_change" value="No"> No</label>
      </div>
      <div class="col-row">
        <span>Weight gain or loss:</span>
        <input type="number" name="wt_amount" style="width:50px;border:none;border-bottom:1px solid var(--border);background:transparent;outline:none;font-size:11px;"> Kg
      </div>
      <div class="col-row">
        <span>Time:</span>
        <input type="number" name="wt_months" style="width:40px;border:none;border-bottom:1px solid var(--border);background:transparent;outline:none;font-size:11px;"> months
      </div>
      <div class="col-row">
        <label class="cblabel"><input type="checkbox" name="wt_intentional" value="Intentional"> Intentional</label>
        <span>/</span>
        <label class="cblabel"><input type="checkbox" name="wt_intentional" value="Un-intentional"> Un-intentional</label>
      </div>
    </div>

    <!-- Grading of Obesity -->
    <div class="col-block">
      <div class="col-title">Grading of Obesity</div>
      <div class="col-row"><span class="range">18.5–24.9</span> <label class="cblabel grade"><input type="checkbox" name="obesity_grade" value="Not Obese"> Not Obese</label></div>
      <div class="col-row"><span class="range">25–29.9</span>  <label class="cblabel grade"><input type="checkbox" name="obesity_grade" value="Overweight"> Overweight</label></div>
      <div class="col-row"><span class="range">30–40</span>    <label class="cblabel grade"><input type="checkbox" name="obesity_grade" value="Obesity"> Obesity</label></div>
      <div class="col-row"><span class="range">&gt;40</span>   <label class="cblabel grade"><input type="checkbox" name="obesity_grade" value="Morbid"> Morbid</label></div>
    </div>

    <!-- Grading of CED -->
    <div class="col-block">
      <div class="col-title">Grading of Chronic Energy Deficiency (CED)</div>
      <div class="col-row"><span class="range">≥ 18.5</span>    <label class="cblabel grade"><input type="checkbox" name="ced_grade" value="No CED"> No CED</label></div>
      <div class="col-row"><span class="range">17.0–18.4</span> <label class="cblabel grade"><input type="checkbox" name="ced_grade" value="Grade I"> Grade I</label></div>
      <div class="col-row"><span class="range">16.0–16.9</span> <label class="cblabel grade"><input type="checkbox" name="ced_grade" value="Grade II"> Grade II</label></div>
      <div class="col-row"><span class="range">&lt; 16.0</span> <label class="cblabel grade"><input type="checkbox" name="ced_grade" value="Grade III"> Grade III</label></div>
    </div>
  </div>

  <!-- PRIMARY DIAGNOSIS -->
  <div class="section-body">
    <div class="form-row">
      <span class="fl" style="min-width:140px;">Primary Diagnosis:</span>
      <input type="text" name="primary_diag" style="flex:1;height:24px;border:1px solid var(--border);border-radius:3px;padding:2px 6px;font-size:11px;outline:none;background:var(--input-bg);">
    </div>
    <div class="form-row" style="align-items:flex-start;">
      <span class="fl" style="min-width:140px;padding-top:3px;">Nutrition Related Diagnosis:</span>
      <div style="display:flex;flex-wrap:wrap;gap:4px 12px;">
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Malnutrition"> Malnutrition</label>
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Sepsis"> Sepsis</label>
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Diabetes"> Diabetes</label>
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Hypertension"> Hypertension</label>
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Cardiac"> Cardiac:</label>
        <input type="text" name="cardiac_specify" style="width:100px;height:22px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;outline:none;">
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Renal"> Renal:</label>
        <input type="text" name="renal_specify" style="width:100px;height:22px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;outline:none;">
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Hepatic"> Hepatic:</label>
        <label class="cblabel"><input type="checkbox" name="nutr_diag" value="Others"> Others:</label>
        <input type="text" name="nutr_diag_other" style="width:120px;height:22px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;outline:none;">
      </div>
    </div>
  </div>

  <!-- GASTRO-INTESTINAL SYMPTOMS -->
  <div class="section-header">Gastro-intestinal Symptoms</div>
  <table class="g-table" style="border-bottom:1px solid var(--border);">
    <thead>
      <tr>
        <th style="width:25%;">Symptom</th>
        <th style="width:18%;">Present?</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="row-lbl">GI Symptoms (overall)</td>
        <td>
          <label class="cblabel"><input type="checkbox" name="gi_overall" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:6px;"><input type="checkbox" name="gi_overall" value="No"> No</label>
        </td>
        <td><em style="font-size:10px;color:var(--text-muted);">If yes, fill up below section</em></td>
      </tr>
      <tr>
        <td class="row-lbl">Loss of appetite</td>
        <td>
          <label class="cblabel"><input type="checkbox" name="appetite" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:6px;"><input type="checkbox" name="appetite" value="No"> No</label>
        </td>
        <td><input type="text" name="appetite_remarks" placeholder="Remarks"></td>
      </tr>
      <tr>
        <td class="row-lbl">Nausea</td>
        <td>
          <label class="cblabel"><input type="checkbox" name="nausea" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:6px;"><input type="checkbox" name="nausea" value="No"> No</label>
        </td>
        <td><input type="text" name="nausea_remarks" placeholder="Remarks"></td>
      </tr>
      <tr>
        <td class="row-lbl">Vomiting</td>
        <td>
          <label class="cblabel"><input type="checkbox" name="vomiting" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:6px;"><input type="checkbox" name="vomiting" value="No"> No</label>
        </td>
        <td><input type="text" name="vomiting_remarks" placeholder="Remarks"></td>
      </tr>
      <tr>
        <td class="row-lbl">Diarrhoea</td>
        <td>
          <label class="cblabel"><input type="checkbox" name="diarrhoea" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:6px;"><input type="checkbox" name="diarrhoea" value="No"> No</label>
        </td>
        <td><input type="text" name="diarrhoea_remarks" placeholder="Remarks"></td>
      </tr>
    </tbody>
  </table>

  <!-- FOOD ALLERGY -->
  <div class="section-body" style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
    <span class="fl" style="min-width:100px;">Food Allergy</span>
    <label class="cblabel"><input type="checkbox" name="food_allergy" value="Yes"> Yes</label>
    <label class="cblabel"><input type="checkbox" name="food_allergy" value="No"> No</label>
    <span style="font-weight:600;color:var(--navy);margin-left:10px;">Remarks:</span>
    <input type="text" name="food_allergy_remarks" style="flex:1;min-width:120px;height:22px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;outline:none;">
  </div>

  <!-- FOOD PREFERENCE -->
  <div class="section-header">Food Preference</div>
  <div class="section-body">
    <input type="text" name="food_preference" placeholder="Describe food preferences…" style="width:100%;height:28px;border:1px solid var(--border);border-radius:3px;padding:3px 8px;font-size:11px;outline:none;background:var(--input-bg);">
  </div>

  <!-- FEEDING MODE -->
  <div class="section-body" style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
    <span class="fl" style="min-width:100px;">Feeding Mode</span>
    <label class="cblabel"><input type="checkbox" name="feeding_mode" value="NPO"> NPO</label>
    <label class="cblabel"><input type="checkbox" name="feeding_mode" value="Oral"> Oral</label>
    <label class="cblabel"><input type="checkbox" name="feeding_mode" value="Feeding Tube"> Feeding Tube</label>
  </div>

  <!-- CHEWING / SWALLOWING -->
  <div class="section-body" style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
    <span class="fl" style="min-width:160px;">Chewing / Swallowing difficulty</span>
    <label class="cblabel"><input type="checkbox" name="chewing" value="Yes"> Yes</label>
    <label class="cblabel"><input type="checkbox" name="chewing" value="No"> No</label>
    <span style="font-weight:600;color:var(--navy);margin-left:10px;">Remarks:</span>
    <input type="text" name="chewing_remarks" style="flex:1;min-width:100px;height:22px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;outline:none;">
  </div>

  <!-- ACTIVITY LEVEL -->
  <div class="section-body" style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
    <span class="fl" style="min-width:100px;">Activity Level</span>
    <label class="cblabel"><input type="checkbox" name="activity" value="Inactive"> Inactive</label>
    <label class="cblabel"><input type="checkbox" name="activity" value="Moderate"> Moderate</label>
    <label class="cblabel"><input type="checkbox" name="activity" value="Very active"> Very active</label>
  </div>

  <!-- DIET RECOMMENDATION BY CLINICIAN -->
  <div class="section-header">Diet Recommendation by Clinician</div>
  <div class="sign-area" style="margin:0;">
    <div class="sign-block" style="grid-column:1;">
      <label>Recommendation</label>
      <textarea name="clinician_recommendation" placeholder="Diet recommendation details…" rows="4"></textarea>
    </div>
    <div class="sign-block">
      <label>Name, Seal, Signature with Date and Time</label>
      <textarea name="clinician_signature" rows="4"></textarea>
    </div>
  </div>

  <!-- DIET PLAN BY DIETITIAN -->
  <div class="section-header" style="margin-top:0;">Diet Plan by Dietitian</div>
  <div class="sign-area" style="margin:0;">
    <div class="sign-block">
      <label>Diet Plan</label>
      <textarea name="dietitian_plan" placeholder="Diet plan details…" rows="4"></textarea>
    </div>
    <div class="sign-block">
      <label>Name, Seal, Signature with Date and Time</label>
      <textarea name="dietitian_signature" rows="4"></textarea>
    </div>
  </div>

  <!-- SIGNATURE -->
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

  <!-- FOOTER -->
  <div class="form-footer">
    <span class="footer-ref"></span>
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
/* Auto BMI */
const wt = document.querySelector('[name="weight"]');
const ht = document.querySelector('[name="height"]');
const bmi = document.getElementById('bmiVal');
function calcBMI() {
  const h = parseFloat(ht.value) / 100, w = parseFloat(wt.value);
  if (h > 0 && w > 0) bmi.value = (w / (h * h)).toFixed(1);
}
wt.addEventListener('input', calcBMI);
ht.addEventListener('input', calcBMI);

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