<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allergy Record Form (ALF)</title>
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

/* ── TOP HEADER ── */
.top-header { display: grid; grid-template-columns: 140px 1fr 210px; border-bottom: 2px solid var(--navy); min-height: 60px; }
.logo-area { padding: 8px 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; border-right: 1px solid var(--border); }
.logo-box { width: 52px; height: 52px; background: var(--navy); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 9px; font-weight: 800; text-align: center; line-height: 1.2; }
.logo-area .hosp-name { font-size: 8px; font-weight: 700; color: var(--navy); text-align: center; margin-top: 3px; text-transform: uppercase; }
.title-area { display: flex; align-items: center; justify-content: center; padding: 10px 16px; background: var(--navy-light); }
.title-area h1 { font-size: 20px; font-weight: 800; color: var(--navy); text-align: center; text-transform: uppercase; letter-spacing: 0.5px; }
.patient-label-box { border-left: 1px solid var(--border); padding: 6px 10px; font-size: 9.5px; }
.patient-label-box .lbl-title { font-weight: 700; font-size: 9.5px; text-align: center; border: 1px solid var(--border); padding: 2px; margin-bottom: 4px; color: var(--navy); text-transform: uppercase; }
.lbl-row { display: flex; align-items: center; gap: 3px; margin-bottom: 2px; color: var(--text-muted); }
.lbl-row span:first-child { font-weight: 600; color: var(--text); white-space: nowrap; }
.lbl-line { border-bottom: 1px solid var(--border); flex: 1; min-width: 40px; }

/* ── PATIENT BAR ── */
.patient-bar { background: #1c7da3; padding: 0; display: grid; grid-template-columns: 1fr 200px; }
.pb-cell { padding: 4px 10px; display: flex; align-items: center; gap: 6px; border-right: 1px solid rgba(255,255,255,0.2); }
.pb-cell:last-child { border-right: none; }
.pb-cell label { font-size: 10px; color: rgba(255,255,255,0.8); font-weight: 700; text-transform: uppercase; white-space: nowrap; }
.pb-cell input { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; border-radius: 3px; padding: 2px 6px; font-size: 11px; height: 22px; outline: none; flex: 1; }
.pb-cell input::placeholder { color: rgba(255,255,255,0.4); }

/* ── INFO ROWS ── */
.info-row { display: flex; flex-wrap: wrap; gap: 3px 10px; align-items: center; padding: 3px 10px; border-bottom: 1px solid var(--border); font-size: 11px; background: #f7f9fc; }
.ir-label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.info-row input[type="text"], .info-row input[type="date"], .info-row input[type="time"], .info-row input[type="number"] {
  height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; background: var(--white); outline: none;
}
.cblabel { display: inline-flex; align-items: center; gap: 3px; cursor: pointer; font-size: 11px; white-space: nowrap; user-select: none; }
.cblabel input[type="checkbox"] { width: 12px; height: 12px; accent-color: var(--navy); cursor: pointer; }

/* ── SECTION HEADER ── */
.sec-hd { background: var(--navy-light); border-bottom: 1px solid var(--border); border-top: 2px solid var(--navy); padding: 5px 12px; font-size: 10.5px; font-weight: 700; color: var(--navy); text-transform: uppercase; letter-spacing: 0.6px; display: flex; align-items: center; gap: 5px; margin-top: 10px; }
.sec-hd::before { content: ''; display: inline-block; width: 3px; height: 11px; background: var(--navy-mid); border-radius: 2px; }

/* ── ALLERGY TABLE ── */
.alf-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.alf-table th { background: var(--navy-light); color: var(--navy); font-weight: 700; font-size: 10.5px; padding: 4px 8px; border: 1px solid var(--border); text-align: left; }
.alf-table td { padding: 3px 7px; border: 1px solid var(--border-light); vertical-align: middle; }
.alf-table tr:nth-child(even) td { background: #f8fbff; }
.alf-table .row-lbl { font-weight: 600; color: var(--navy); white-space: nowrap; background: var(--navy-light) !important; border: 1px solid var(--border); width: 180px; }
.alf-table td input[type="text"] { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; }
.alf-table td input[type="date"] { height: 22px; padding: 1px 4px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; outline: none; }
.cbgroup { display: flex; flex-wrap: wrap; gap: 3px 10px; align-items: center; }

/* ── INTERVENTIONS TABLE ── */
.int-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.int-table td { padding: 3px 8px; border: 1px solid var(--border-light); vertical-align: middle; }
.int-table tr:nth-child(even) td { background: #f8fbff; }
.int-table .row-lbl { font-size: 11px; color: var(--text); width: 55%; }
.int-table .yn { display: flex; gap: 10px; }
.int-table td input[type="text"] { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; }

/* ── SIGNATURE GRID ── */
.sig-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; border-top: 2px solid var(--navy); }
.sig-cell { padding: 8px 12px; border-right: 1px solid var(--border); }
.sig-cell:last-child { border-right: none; }
.sig-cell label { display: block; font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 3px; }
.sig-cell input { width: 100%; border: none; border-bottom: 1px solid var(--border); border-radius: 0; padding: 2px 0; background: transparent; font-size: 11px; outline: none; height: 24px; }
.sig-row { display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid var(--border-light); }
.sig-row:last-child { border-bottom: none; }

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

/* spacer between big sections */
.spacer { height: 12px; background: var(--bg); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }

@media (max-width: 700px) {
  .top-header { grid-template-columns: 1fr; }
  .sig-grid, .sig-row { grid-template-columns: 1fr; }
}
@media print {
  body { background: #fff; padding: 0; }
  .btn-group { display: none; }
  .form-card { box-shadow: none; }
}
</style>
</head>
<body>
<form id="mainForm" action="{{ route('form7.store') }}"   method="POST" enctype="multipart/form-data">
@csrf
<div class="form-card">



  <!-- ══ PATIENT BAR ══ -->
  <div class="patient-bar">
    <div class="pb-cell">
      <label>Patient Name:</label>
      <input type="text" name="patient_name" placeholder="Full Name">
    </div>
    <div class="pb-cell">
      <label>UHID:</label>
      <input type="text" name="uhid" placeholder="UHID">
    </div>
  </div>

  <!-- ══ INFO ROWS ══ -->
  <div class="info-row">
    <span class="ir-label">Gender:</span>
    <label class="cblabel"><input type="checkbox" name="gender" value="M"> M</label>
    <label class="cblabel"><input type="checkbox" name="gender" value="F"> F</label>
    <span class="ir-label" style="margin-left:14px;">Age:</span>
    <input type="number" name="age" style="width:50px;">
  </div>
  <div class="info-row">
    <span class="ir-label">Weight:</span>
    <input type="number" name="weight" style="width:55px;" step="0.1"> <span>Kg</span>
    <span class="ir-label" style="margin-left:10px;">Height:</span>
    <input type="number" name="height" style="width:55px;" step="0.1"> <span>cm</span>
  </div>
  <div class="info-row">
    <span class="ir-label">Location:</span>
    <label class="cblabel"><input type="checkbox" name="location" value="Ward/Cabin"> Ward/Cabin</label>
    <label class="cblabel"><input type="checkbox" name="location" value="CCU"> CCU</label>
    <label class="cblabel"><input type="checkbox" name="location" value="Cathlab"> Cathlab</label>
    <label class="cblabel"><input type="checkbox" name="location" value="ICU"> ICU</label>
    <label class="cblabel"><input type="checkbox" name="location" value="HDU"> HDU</label>
    <label class="cblabel"><input type="checkbox" name="location" value="ER"> ER</label>
  </div>
  <div class="info-row">
    <span class="ir-label">Date of Assessment:</span>
    <input type="date" name="assess_date">
    <span class="ir-label" style="margin-left:14px;">Time:</span>
    <input type="time" name="assess_time">
  </div>

  <!-- ══════════════════════════════════════
       ALLERGY IDENTIFICATION
  ══════════════════════════════════════ -->
  <div class="spacer"></div>
  <div class="sec-hd">Allergy Identification</div>
  <table class="alf-table">
    <thead>
      <tr>
        <th style="width:35%;">Parameter</th>
        <th>Details / Observations</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="row-lbl">Known Allergy</td>
        <td>
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="known_allergy" value="Yes"> Yes</label>
            <label class="cblabel"><input type="checkbox" name="known_allergy" value="No"> No</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Type of Allergy</td>
        <td>
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="allergy_type" value="Drug"> Drug</label>
            <label class="cblabel"><input type="checkbox" name="allergy_type" value="Food"> Food</label>
            <label class="cblabel"><input type="checkbox" name="allergy_type" value="Latex"> Latex</label>
            <label class="cblabel"><input type="checkbox" name="allergy_type" value="Contrast/Dye"> Contrast/Dye</label>
            <label class="cblabel"><input type="checkbox" name="allergy_type" value="Environmental"> Environmental</label>
            <label class="cblabel"><input type="checkbox" name="allergy_type" value="Others"> Others</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Severity</td>
        <td>
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="ai_severity" value="Mild"> Mild</label>
            <label class="cblabel"><input type="checkbox" name="ai_severity" value="Moderate"> Moderate</label>
            <label class="cblabel"><input type="checkbox" name="ai_severity" value="Severe"> Severe</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Reaction type</td>
        <td>
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="Rash/Hives"> Rash/Hives</label>
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="Itching"> Itching</label>
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="Swelling"> Swelling</label>
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="Respiratory Distress"> Respiratory Distress</label>
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="Anaphylaxis"> Anaphylaxis</label>
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="GI Symptoms"> GI Symptoms</label>
            <label class="cblabel"><input type="checkbox" name="ai_reaction" value="Others"> Others</label>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="background:#fffdf5;">
          <span style="font-weight:600;color:var(--navy);">Describe the reaction type (if any):</span>
          <input type="text" name="ai_reaction_desc" placeholder="Describe…" style="width:70%;margin-left:8px;">
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Date first noted</td>
        <td>
          <input type="date" name="ai_date_noted" style="margin-right:16px;">
          <span style="font-weight:600;color:var(--navy);">Documented:</span>
          <label class="cblabel" style="margin-left:8px;"><input type="checkbox" name="ai_documented" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="ai_documented" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Source / Documentation</td>
        <td>
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="ai_source" value="Patient Report"> Patient Report</label>
            <label class="cblabel"><input type="checkbox" name="ai_source" value="Family"> Family</label>
            <label class="cblabel"><input type="checkbox" name="ai_source" value="Previous Records"> Previous Records</label>
            <label class="cblabel"><input type="checkbox" name="ai_source" value="Lab tests"> Lab tests</label>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       DRUG / MEDICATION ALLERGIES
  ══════════════════════════════════════ -->
  <div class="spacer"></div>
  <div class="sec-hd">Drug / Medication Allergies</div>
  <table class="alf-table">
    <tbody>
      <tr>
        <td class="row-lbl">Name of the Drug(s)</td>
        <td><input type="text" name="drug_name" placeholder="Drug name(s)"></td>
        <td class="row-lbl" style="width:130px;">Date of Reaction</td>
        <td><input type="date" name="drug_reaction_date"></td>
      </tr>
      <tr>
        <td class="row-lbl">Medication Reaction Observed</td>
        <td colspan="3">
          <label class="cblabel"><input type="checkbox" name="drug_reaction_obs" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="drug_reaction_obs" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Severity</td>
        <td colspan="3">
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="drug_severity" value="Mild"> Mild</label>
            <label class="cblabel"><input type="checkbox" name="drug_severity" value="Moderate"> Moderate</label>
            <label class="cblabel"><input type="checkbox" name="drug_severity" value="Severe"> Severe</label>
            <label class="cblabel"><input type="checkbox" name="drug_severity" value="Life-threatening"> Life-threatening</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Reaction type</td>
        <td colspan="3">
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="Rash/Hives"> Rash/Hives</label>
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="Itching"> Itching</label>
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="Swelling"> Swelling</label>
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="Respiratory Distress"> Respiratory Distress</label>
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="Anaphylaxis"> Anaphylaxis</label>
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="GI Symptoms"> GI Symptoms</label>
            <label class="cblabel"><input type="checkbox" name="drug_reaction_type" value="Others"> Others</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Precautions</td>
        <td colspan="3">
          <label class="cblabel"><input type="checkbox" name="drug_precautions" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="drug_precautions" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Notes</td>
        <td colspan="3">
          <label class="cblabel"><input type="checkbox" name="drug_notes_yn" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="drug_notes_yn" value="No"> No</label>
          <input type="text" name="drug_notes" placeholder="Notes…" style="width:60%;margin-left:10px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       FOOD & OTHER ALLERGIES
  ══════════════════════════════════════ -->
  <div class="spacer"></div>
  <div class="sec-hd">Food &amp; Other Allergies</div>
  <table class="alf-table">
    <tbody>
      <tr>
        <td class="row-lbl">Name of the Allergen(s)</td>
        <td><input type="text" name="food_allergen" placeholder="Allergen name(s)"></td>
        <td class="row-lbl" style="width:130px;">Date of Reaction</td>
        <td><input type="date" name="food_reaction_date"></td>
      </tr>
      <tr>
        <td class="row-lbl">Food/Other Reaction Observed</td>
        <td colspan="3">
          <label class="cblabel"><input type="checkbox" name="food_reaction_obs" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="food_reaction_obs" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Severity</td>
        <td colspan="3">
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="food_severity" value="Mild"> Mild</label>
            <label class="cblabel"><input type="checkbox" name="food_severity" value="Moderate"> Moderate</label>
            <label class="cblabel"><input type="checkbox" name="food_severity" value="Severe"> Severe</label>
            <label class="cblabel"><input type="checkbox" name="food_severity" value="Life-threatening"> Life-threatening</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Reaction type</td>
        <td colspan="3">
          <div class="cbgroup">
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="Rash/Hives"> Rash/Hives</label>
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="Itching"> Itching</label>
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="Swelling"> Swelling</label>
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="Respiratory Distress"> Respiratory Distress</label>
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="Anaphylaxis"> Anaphylaxis</label>
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="GI Symptoms"> GI Symptoms</label>
            <label class="cblabel"><input type="checkbox" name="food_reaction_type" value="Others"> Others</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Precautions</td>
        <td colspan="3">
          <label class="cblabel"><input type="checkbox" name="food_precautions" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="food_precautions" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Notes</td>
        <td colspan="3">
          <label class="cblabel"><input type="checkbox" name="food_notes_yn" value="Yes"> Yes</label>
          <label class="cblabel" style="margin-left:10px;"><input type="checkbox" name="food_notes_yn" value="No"> No</label>
          <input type="text" name="food_notes" placeholder="Notes…" style="width:60%;margin-left:10px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       INTERVENTIONS / PRECAUTIONS
  ══════════════════════════════════════ -->
  <div class="spacer"></div>
  <div class="sec-hd">Interventions / Precautions</div>
  <table class="int-table">
    <tbody>
      <tr>
        <td class="row-lbl">Allergy bracelet / Identification worn</td>
        <td class="yn">
          <label class="cblabel"><input type="checkbox" name="bracelet" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="bracelet" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Medication alerts in EMR system</td>
        <td class="yn">
          <label class="cblabel"><input type="checkbox" name="emr_alert" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="emr_alert" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Special diet / environment precaution implemented</td>
        <td class="yn">
          <label class="cblabel"><input type="checkbox" name="special_diet" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="special_diet" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Pre-medication given (if required for procedures)</td>
        <td class="yn">
          <label class="cblabel"><input type="checkbox" name="pre_med" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="pre_med" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Staff informed of allergies</td>
        <td class="yn">
          <label class="cblabel"><input type="checkbox" name="staff_informed" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="staff_informed" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td class="row-lbl">
          Other Precautions, specify:
          <input type="text" name="other_precautions_txt" placeholder="Specify…" style="width:55%;margin-left:6px;">
        </td>
        <td class="yn">
          <label class="cblabel"><input type="checkbox" name="other_precautions" value="Yes"> Yes</label>
          <label class="cblabel"><input type="checkbox" name="other_precautions" value="No"> No</label>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="padding:4px 8px;">
          <span style="font-weight:600;color:var(--navy);">Notes / Observations:</span>
          <input type="text" name="int_notes" style="width:78%;margin-left:8px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;" placeholder="Notes…">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- ══ SPACER ══ -->
  <div style="height:16px;background:var(--bg);border-top:1px solid var(--border);"></div>

  <!-- ══ SIGNATURE ROWS ══ -->
  <div class="sig-row">
    <div class="sig-cell" style="background:var(--navy-light);">
      <label>Name of the Physician</label>
      <input type="text" name="physician_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Signature of the Physician</label>
      <input type="text" name="physician_sig" placeholder="Signature">
    </div>
    <div class="sig-cell">
      <label>Date and Time</label>
      <input type="datetime-local" name="physician_datetime">
    </div>
  </div>
  <div class="sig-row">
    <div class="sig-cell" style="background:var(--navy-light);">
      <label>Name of the Nurse</label>
      <input type="text" name="nurse_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Signature of the Nurse</label>
      <input type="text" name="nurse_sig" placeholder="Signature">
    </div>
    <div class="sig-cell">
      <label>Date and Time</label>
      <input type="datetime-local" name="nurse_datetime">
    </div>
  </div>
  <div class="sig-row" style="border-top:1px solid var(--border);">
    <div class="sig-cell" style="background:var(--navy-light);">
      <label>Verified By</label>
      <input type="text" name="verified_by" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Signature</label>
      <input type="text" name="verified_sig" placeholder="Signature">
    </div>
    <div class="sig-cell">
      <label>Date and Time</label>
      <input type="datetime-local" name="verified_datetime">
    </div>
  </div>

  <!-- ══ FOOTER ══ -->
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
function resetForm() {
  if (confirm('Reset all form fields?')) document.getElementById('mainForm').reset();
}
</script>
</body>
</html>