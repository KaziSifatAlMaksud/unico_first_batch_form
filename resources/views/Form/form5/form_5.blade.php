<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Peripheral Intra-Venous Cannula Monitoring (PIVC)</title>


<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --navy: #207ba2;
  --navy-light: #eef3f8;
  --navy-mid: #207ba2;
  --border: #c8d4e0;
  --border-light: #dde8f0;
  --text: #1e2d3d;
  --text-muted: #5a7a9a;
  --bg: #f4f7fa;
  --white: #ffffff;
  --input-bg: #fafcff;
  --success: #15803d;
  --header-blue: #1c7da3;
  --olive: #5a6e2a;
  --olive-light: #e8edda;
  --section-green: #4a6741;
  --section-green-light: #dde8d8;
  --dark-row: #c8d8b8;
  --radius: 5px;
  --radius-sm: 3px;
}

body {
  font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
  font-size: 11.5px;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  padding: 10px;
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

/* ── TOP HEADER ── */
.top-header {
  display: grid;
  grid-template-columns: 150px 1fr 200px;
  border-bottom: 2px solid var(--navy);
  min-height: 60px;
}
.logo-area {
  padding: 8px 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-right: 1px solid var(--border);
  background: var(--white);
}
.logo-box {
  width: 56px; height: 56px;
  background: var(--navy);
  border-radius: 6px;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 9px; font-weight: 800;
  text-align: center; line-height: 1.2; letter-spacing: 0.5px;
}
.logo-area .hosp-name {
  font-size: 8.5px; font-weight: 700; color: var(--navy);
  text-align: center; margin-top: 3px; text-transform: uppercase; letter-spacing: 0.4px;
}
.title-area {
  display: flex; align-items: center; justify-content: center;
  padding: 10px 16px;
  background: var(--navy-light);
}
.title-area h1 {
  font-size: 19px; font-weight: 800; color: var(--navy);
  text-align: center; text-transform: uppercase; letter-spacing: 0.8px; line-height: 1.3;
}
.patient-label-box {
  border-left: 1px solid var(--border);
  padding: 6px 10px;
}
.patient-label-box .lbl-title {
  font-weight: 700; font-size: 9.5px; text-align: center;
  border: 1px solid var(--border); padding: 2px; margin-bottom: 4px;
  color: var(--navy); text-transform: uppercase;
}
.patient-label-box .lbl-row {
  display: flex; align-items: center; gap: 3px;
  margin-bottom: 2px; font-size: 9.5px; color: var(--text-muted);
}
.patient-label-box .lbl-row span:first-child { font-weight: 600; color: var(--text); white-space: nowrap; }
.lbl-line { border-bottom: 1px solid var(--border); flex: 1; min-width: 50px; }

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

/* ── INFO ROWS ── */
.info-row {
  display: flex; flex-wrap: wrap; gap: 3px 12px; align-items: center;
  padding: 4px 10px; border-bottom: 1px solid var(--border);
  font-size: 11px; background: #f7f9fc;
}
.info-row .ir-label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.info-row input[type="text"], .info-row input[type="date"], .info-row input[type="time"] {
  height: 22px; padding: 1px 5px; font-size: 10.5px;
  border: 1px solid var(--border); border-radius: 3px; background: var(--white); outline: none;
}
.info-row .cblabel { display: flex; align-items: center; gap: 2px; font-size: 10.5px; cursor: pointer; }
.info-row .cblabel input { width: 12px; height: 12px; accent-color: var(--navy); }

/* ── MAIN BODY GRID ── */
.main-body {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0;
  border-bottom: 1px solid var(--border);
}
.left-panel { border-right: 2px solid var(--border); }


/* ── CHECKLIST TABLE ── */
.chk-table { width: 100%; border-collapse: collapse; font-size: 11px; }
.chk-table .sub-header td {
  background: #eef3f8;
  font-weight: 700; font-size: 10.5px;
  padding: 3px 8px; color: #2479a1;
  border: 1px solid #eef3f8;
}
.chk-table td {
  padding: 3px 8px;
  border: 1px solid var(--border-light);
  vertical-align: middle;
}
.chk-table tr:nth-child(even) td { background: #f5f8f2; }
.chk-table .row-label { font-size: 10.5px; color: var(--text); }
.chk-table .options { white-space: nowrap; }
.chk-table .options .cblabel { display: inline-flex; align-items: center; gap: 2px; margin-right: 6px; font-size: 10.5px; cursor: pointer; }
.chk-table .options .cblabel input { width: 11px; height: 11px; accent-color: var(--navy); }
.chk-table .text-row td { background: #f0f0f0; }
.chk-table .text-row input { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 10.5px; height: 20px; padding: 1px 4px; outline: none; }

/* ── PIVC CARE / REMOVAL on right ── */
.removal-header {
  background: #3b5e8a;
  color: #fff;
  font-weight: 700; font-size: 11px;
  padding: 5px 10px; text-transform: uppercase; letter-spacing: 0.5px;
  border-bottom: 1px solid var(--border);
}

/* ── ASSESSMENT CHART ── */
.chart-title::before {
  content: '';
  display: inline-block;
  width: 3px;
  height: 11px;
  background: var(--navy-mid);
  border-radius: 2px;
  flex-shrink: 0;
}
.chart-title {
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


.chart-table { width: 100%; border-collapse: collapse; font-size: 10.5px; }
.chart-table th {
  background: var(--navy-light);
  color: var(--navy); font-weight: 700; font-size: 10px;
  padding: 3px 5px; border: 1px solid var(--border); text-align: center;
}
.chart-table td {
  padding: 2px 4px;
  border: 1px solid var(--border-light);
  vertical-align: middle;
}
.chart-table .row-head {
  font-weight: 600; background: var(--navy-light); color: var(--navy);
  white-space: nowrap; padding: 3px 8px; font-size: 10.5px;
  border: 1px solid var(--border);
}
.chart-table .date-inp { width: 100%; border: none; background: transparent; font-size: 10px; text-align: center; height: 20px; outline: none; }
.chart-table .shift-label { font-size: 9px; color: var(--text-muted); text-align: center; display: block; }
.chart-table .shift-cell { text-align: center; }
.chart-table select {
  width: 100%; border: none; background: transparent; font-size: 10px;
  height: 20px; outline: none; cursor: pointer;
}
.chart-table input[type="text"] {
  width: 100%; border: none; background: transparent; font-size: 10px;
  height: 20px; outline: none; padding: 1px 2px;
}

/* ── SIGN OFF ── */
.signoff-grid { display: grid; grid-template-columns: 1fr 1fr; border-top: 2px solid var(--navy); }
.signoff-cell {
  display: grid; grid-template-columns: 120px 1fr;
  border-right: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}
.signoff-cell:last-child { border-right: none; }
.signoff-cell .so-label {
  background: var(--navy-light); color: var(--navy);
  font-weight: 700; font-size: 10.5px;
  padding: 6px 10px; display: flex; align-items: center;
  border-right: 1px solid var(--border);
}
.signoff-cell .so-input {
  padding: 4px 10px; display: flex; align-items: center; gap: 6px;
}
.signoff-cell .so-input input {
  flex: 1; border: none; border-bottom: 1px solid var(--border);
  background: transparent; font-size: 11px; height: 22px; outline: none; padding: 1px 4px;
}

/* ── FOOTER ── */
.form-footer {
  background: var(--navy-light);
  padding: 8px 14px;
  display: flex; justify-content: space-between; align-items: center;
  border-top: 1px solid var(--border);
}
.form-footer .footer-ref { font-size: 10px; color: var(--text-muted); }
.btn-group { display: flex; gap: 8px; }
.btn {
  padding: 5px 18px; border-radius: 3px; font-size: 11.5px;
  font-weight: 600; cursor: pointer; border: 1px solid transparent; transition: all 0.15s;
}
.btn-outline { background: var(--white); border-color: var(--border); color: var(--text-muted); }
.btn-outline:hover { border-color: var(--navy-mid); color: var(--navy); }
.btn-primary { background: var(--navy); color: #fff; border-color: var(--navy); }
.btn-primary:hover { background: var(--navy-mid); }

/* ── TOAST ── */
.toast {
  position: fixed; top: 20px; right: 20px;
  background: var(--success); color: #fff;
  padding: 10px 16px; border-radius: 5px; font-size: 12px; font-weight: 600;
  box-shadow: 0 4px 16px rgba(0,0,0,0.2);
  transform: translateX(120%); transition: transform 0.3s ease; z-index: 9999;
}
.toast.show { transform: translateX(0); }

/* ── INLINE YNT ── */
.ynt { display: inline-flex; gap: 6px; align-items: center; white-space: nowrap; }
.ynt label { display: inline-flex; align-items: center; gap: 2px; font-size: 10.5px; cursor: pointer; }
.ynt input { width: 11px; height: 11px; accent-color: var(--navy); }

@media (max-width: 800px) {
  .top-header { grid-template-columns: 1fr; }
  .main-body { grid-template-columns: 1fr; }
  .left-panel { border-right: none; }
  .signoff-grid { grid-template-columns: 1fr; }
}

@media print {
  body { background: #fff; padding: 0; }
  .form-footer .btn-group { display: none; }
  .form-card { box-shadow: none; border: 1px solid #999; }
}
</style>
</head>
<body>

<form id="mainForm" action="{{ route('form5.store') }}"   method="POST" enctype="multipart/form-data">
@csrf
<div class="form-card">
  <!-- ══ PATIENT NAME BAR ══ -->
  <div class="patient-bar">
    <div class="pb-group">
      <label>Patient Name</label>
      <input type="text" class="name-inp" name="patient_name" placeholder="Full Patient Name">
    </div>
    <div class="pb-group">
      <label>UHID</label>
      <input type="text" class="uid-inp" name="uhid" placeholder="UHID No.">
    </div>
  </div>

  <!-- ══ INFO ROW 1: Location ══ -->
  <div class="info-row">
    <span class="ir-label">Patient's location:</span>
    <label class="cblabel"><input type="checkbox" name="location" value="Cabin/Ward"> Cabin/Ward</label>
    <label class="cblabel"><input type="checkbox" name="location" value="CCU"> CCU</label>
    <label class="cblabel"><input type="checkbox" name="location" value="ICU"> ICU</label>
    <label class="cblabel"><input type="checkbox" name="location" value="Emergency"> Emergency</label>
    <label class="cblabel"><input type="checkbox" name="location" value="Cathlab"> Cathlab</label>
    <label class="cblabel"><input type="checkbox" name="location" value="Others"> Others</label>
    <input type="text" name="location_other" style="width:80px;" placeholder="Specify">
  </div>

  <!-- ══ INFO ROW 2: Date / Time / Diagnosis ══ -->
  <div class="info-row">
    <span class="ir-label">Date of IV Cannula Insertion:</span>
    <input type="date" name="cannula_date">
    <span class="ir-label">Time:</span>
    <input type="time" name="cannula_time">
    <span class="ir-label" style="margin-left:14px;">Primary Diagnosis:</span>
    <input type="text" name="primary_diagnosis" style="width:220px;" placeholder="Diagnosis">
  </div>

  <!-- ══ INFO ROW 3: Site / Indication ══ -->
  <div class="info-row">
    <span class="ir-label">Site of Insertion:</span>
    <label class="cblabel"><input type="checkbox" name="site" value="Dorsum of Hand"> Dorsum of Hand</label>
    <label class="cblabel"><input type="checkbox" name="site" value="Forearm"> Forearm</label>
    <label class="cblabel"><input type="checkbox" name="site" value="Others"> Others</label>
    <input type="text" name="site_other" style="width:80px;" placeholder="Specify">
    <span class="ir-label" style="margin-left:16px;">Indication:</span>
    <label class="cblabel"><input type="checkbox" name="indication" value="IV Fluid"> IV Fluid</label>
    <label class="cblabel"><input type="checkbox" name="indication" value="IV Medication"> IV Medication</label>
    <label class="cblabel"><input type="checkbox" name="indication" value="BT"> BT</label>
    <label class="cblabel"><input type="checkbox" name="indication" value="Contrast"> Contrast</label>
    <label class="cblabel"><input type="checkbox" name="indication" value="Others"> Others</label>
    <input type="text" name="indication_other" style="width:80px;" placeholder="Specify">
  </div>

  <!-- ══ MAIN BODY: 2 COLUMN ══ -->
  <div class="main-body">

    <!-- ══════ LEFT: PIVC CHECKLIST ══════ -->
    <div class="left-panel section-header">
      <div class="chart-title">PIVC Checklist</div>
      <table class="chk-table">
        <colgroup><col style="width:62%"><col style="width:38%"></colgroup>

        <!-- PIVC Insertion -->
        <tr class="sub-header"><td colspan="2">PIVC Insertion</td></tr>
        <tr>
          <td class="row-label">Aseptic technique used</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="aseptic_technique" value="Yes"> Yes</label>
              <label><input type="checkbox" name="aseptic_technique" value="No"> No</label>
              <label><input type="checkbox" name="aseptic_technique" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">A topical anesthetic considered</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="topical_anesthetic" value="Yes"> Yes</label>
              <label><input type="checkbox" name="topical_anesthetic" value="No"> No</label>
              <label><input type="checkbox" name="topical_anesthetic" value="NA"> NA</label>
            </div>
          </td>
        </tr>

        <!-- Dressings -->
        <tr class="sub-header"><td colspan="2">Dressings</td></tr>
        <tr>
          <td class="row-label">Transparent film used at the insertion site</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="transparent_film" value="Yes"> Yes</label>
              <label><input type="checkbox" name="transparent_film" value="No"> No</label>
              <label><input type="checkbox" name="transparent_film" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">A sterile compress used if blood or exudate</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="sterile_compress" value="Yes"> Yes</label>
              <label><input type="checkbox" name="sterile_compress" value="No"> No</label>
              <label><input type="checkbox" name="sterile_compress" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Dressing change if wet, dirty or peeling off</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="dressing_change" value="Yes"> Yes</label>
              <label><input type="checkbox" name="dressing_change" value="No"> No</label>
              <label><input type="checkbox" name="dressing_change" value="NA"> NA</label>
            </div>
          </td>
        </tr>

        <!-- Inspection -->
        <tr class="sub-header"><td colspan="2">Inspection</td></tr>
        <tr>
          <td class="row-label">Inspection schedule</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="insp_schedule" value="4 Hr"> 4 Hr</label>
              <label><input type="checkbox" name="insp_schedule" value="6 Hr"> 6 Hr</label>
              <label><input type="checkbox" name="insp_schedule" value="Others"> Others</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Hand hygiene before and after contact</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="hand_hygiene" value="Yes"> Yes</label>
              <label><input type="checkbox" name="hand_hygiene" value="No"> No</label>
              <label><input type="checkbox" name="hand_hygiene" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Aseptic technique is used during care</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="aseptic_care" value="Yes"> Yes</label>
              <label><input type="checkbox" name="aseptic_care" value="No"> No</label>
              <label><input type="checkbox" name="aseptic_care" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">PIVC patency checked</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="pivc_patency" value="Yes"> Yes</label>
              <label><input type="checkbox" name="pivc_patency" value="No"> No</label>
              <label><input type="checkbox" name="pivc_patency" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">PIVCs are flushed and locked after use</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="pivc_flushed" value="Yes"> Yes</label>
              <label><input type="checkbox" name="pivc_flushed" value="No"> No</label>
              <label><input type="checkbox" name="pivc_flushed" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Unused PIVC flushed once per shift</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="unused_flushed" value="Yes"> Yes</label>
              <label><input type="checkbox" name="unused_flushed" value="No"> No</label>
              <label><input type="checkbox" name="unused_flushed" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Saline solution used in PIVC flush</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="saline_flush" value="Yes"> Yes</label>
              <label><input type="checkbox" name="saline_flush" value="No"> No</label>
              <label><input type="checkbox" name="saline_flush" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Amount of flush solution</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="flush_amount" value="3 ml"> 3 ml</label>
              <label><input type="checkbox" name="flush_amount" value="5 ml"> 5 ml</label>
              <label><input type="checkbox" name="flush_amount" value="Others"> Others</label>
            </div>
          </td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Pain score (0–10)</td>
          <td><input type="number" name="pain_score" min="0" max="10" placeholder="0–10" style="width:80px;height:20px;border:1px solid var(--border);border-radius:3px;padding:1px 5px;font-size:10.5px;"></td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Reported by RN</td>
          <td><input type="text" name="reported_rn" placeholder="Name"></td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Reviewed by ICN</td>
          <td><input type="text" name="reviewed_icn" placeholder="Name"></td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Note by – Nursing Administrator</td>
          <td><input type="text" name="note_admin" placeholder="Note"></td>
        </tr>
      </table>
    </div>

    <!-- ══════ RIGHT: PIVC REMOVAL + PIVC CARE ══════ -->
    <div class="right-panel">

      <!-- PIVC REMOVAL -->
      <div class="chart-title">PIVC Removal</div>
      <table class="chk-table">
        <colgroup><col style="width:62%"><col style="width:38%"></colgroup>
        <tr>
          <td class="row-label">Remove: as no clinical indication</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="remove_no_indication" value="Yes"> Yes</label>
              <label><input type="checkbox" name="remove_no_indication" value="No"> No</label>
              <label><input type="checkbox" name="remove_no_indication" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Remove due to malfunction</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="remove_malfunction" value="Yes"> Yes</label>
              <label><input type="checkbox" name="remove_malfunction" value="No"> No</label>
              <label><input type="checkbox" name="remove_malfunction" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Remove as it shows signs of phlebitis</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="remove_phlebitis" value="Yes"> Yes</label>
              <label><input type="checkbox" name="remove_phlebitis" value="No"> No</label>
              <label><input type="checkbox" name="remove_phlebitis" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">After removal firm pressure exerted</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="firm_pressure" value="Yes"> Yes</label>
              <label><input type="checkbox" name="firm_pressure" value="No"> No</label>
              <label><input type="checkbox" name="firm_pressure" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Replacement done at a new site</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="replacement_new_site" value="Yes"> Yes</label>
              <label><input type="checkbox" name="replacement_new_site" value="No"> No</label>
              <label><input type="checkbox" name="replacement_new_site" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr class="sub-header"><td colspan="2">Removal Note</td></tr>
        <tr>
          <td class="row-label">Integrity of PIVC checked after removal</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="integrity_checked" value="Yes"> Yes</label>
              <label><input type="checkbox" name="integrity_checked" value="No"> No</label>
              <label><input type="checkbox" name="integrity_checked" value="NA"> NA</label>
            </div>
          </td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Date and time of PIVC removal</td>
          <td>
            <input type="date" name="removal_date" style="width:110px;height:20px;border:1px solid var(--border);border-radius:3px;font-size:10px;padding:1px 3px;">
            <input type="time" name="removal_time" style="width:80px;height:20px;border:1px solid var(--border);border-radius:3px;font-size:10px;padding:1px 3px;">
          </td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Reason for PIVC removal</td>
          <td><input type="text" name="removal_reason" placeholder="Reason"></td>
        </tr>

        <!-- PIVC CARE (within right panel) -->
        <tr>
          <td colspan="2" style="padding:0;">
            <div class="chart-title" style="margin-top:4px;">PIVC Care</div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Frequency of assessment:</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="freq_assessment" value="Each Shift"> Each Shift</label>
              <label><input type="checkbox" name="freq_assessment" value="Daily"> Daily</label>
              <label><input type="checkbox" name="freq_assessment" value="Other"> Other</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Date of insertion marked</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="date_marked" value="Yes"> Yes</label>
              <label><input type="checkbox" name="date_marked" value="No"> No</label>
              <label><input type="checkbox" name="date_marked" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Any swelling, pain, tenderness</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="swelling_pain" value="Yes"> Yes</label>
              <label><input type="checkbox" name="swelling_pain" value="No"> No</label>
              <label><input type="checkbox" name="swelling_pain" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Breach of sterility</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="breach_sterility" value="Yes"> Yes</label>
              <label><input type="checkbox" name="breach_sterility" value="No"> No</label>
              <label><input type="checkbox" name="breach_sterility" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Complication during insertion</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="complication" value="Yes"> Yes</label>
              <label><input type="checkbox" name="complication" value="No"> No</label>
              <label><input type="checkbox" name="complication" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Multiple puncture needed</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="multi_puncture" value="Yes"> Yes</label>
              <label><input type="checkbox" name="multi_puncture" value="No"> No</label>
              <label><input type="checkbox" name="multi_puncture" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Insertion site changed</td>
          <td class="options">
            <div class="ynt">
              <label><input type="checkbox" name="site_changed" value="Yes"> Yes</label>
              <label><input type="checkbox" name="site_changed" value="No"> No</label>
              <label><input type="checkbox" name="site_changed" value="NA"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Expert help needed</td>
          <td class="options">
            <div class="ynt" style="align-items:center;">
              <label><input type="checkbox" name="expert_help" value="Yes"> Yes</label>
              <span style="font-size:10.5px;margin-left:4px;">Name:</span>
              <input type="text" name="expert_name" style="width:90px;height:20px;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:10.5px;outline:none;padding:1px 3px;">
            </div>
          </td>
        </tr>
        <tr class="text-row">
          <td class="row-label">Next Review Date:</td>
          <td>
            <input type="date" name="next_review" style="width:140px;height:20px;border:1px solid var(--border);border-radius:3px;font-size:10px;padding:1px 3px;">
          </td>
        </tr>
      </table>
    </div><!-- /right-panel -->

  </div><!-- /main-body -->

  <!-- ══ PIVC ASSESSMENT CHART ══ -->
  <div class="chart-section">
    <div class="chart-title ">PIVC Assessment Chart &nbsp;<span style="font-weight:400;font-size:10px;">(Plz tick ✓)</span></div>
    <div style="overflow-x:auto;">
    <table class="chart-table" style="min-width:800px;">
      <thead>
        <tr>
          <th style="width:70px;text-align:left;padding-left:8px;">Row</th>
          <!-- Day 1 -->
          <th colspan="3" style="background:#eef3f8;color:#2d7ea5;">Date: <input type="date" name="chart_date_1" class="date-inp" style="width:105px;display:inline-block;border-bottom:1px solid #aaa;"></th>
          <!-- Day 2 -->
          <th colspan="3" style="background:#eef3f8;color:#2d7ea5;">Date: <input type="date" name="chart_date_2" class="date-inp" style="width:105px;display:inline-block;border-bottom:1px solid #aaa;"></th>
          <!-- Day 3 -->
          <th colspan="3" style="background:#eef3f8;color:#2d7ea5;">Date: <input type="date" name="chart_date_3" class="date-inp" style="width:105px;display:inline-block;border-bottom:1px solid #aaa;"></th>
          <!-- Day 4 -->
          <th colspan="3" style="background:#eef3f8;color:#2d7ea5;">Date: <input type="date" name="chart_date_4" class="date-inp" style="width:105px;display:inline-block;border-bottom:1px solid #aaa;"></th>
          <!-- Day 5 -->
          <th colspan="3" style="background:#eef3f8;color:#2d7ea5;">Date: <input type="date" name="chart_date_5" class="date-inp" style="width:105px;display:inline-block;border-bottom:1px solid #aaa;"></th>
        </tr>
        <tr>
          <th style="text-align:left;padding-left:8px;"></th>
          <!-- shifts repeat x5 -->
          <th>Morning</th><th>Evening</th><th>Night</th>
          <th>Morning</th><th>Evening</th><th>Night</th>
          <th>Morning</th><th>Evening</th><th>Night</th>
          <th>Morning</th><th>Evening</th><th>Night</th>
          <th>Morning</th><th>Evening</th><th>Night</th>
        </tr>
      </thead>
      <tbody>
        <!-- Time row -->
        <tr>
          <td class="row-head">Time</td>
          <td><input type="time" name="time_1m" class="date-inp"></td>
          <td><input type="time" name="time_1e" class="date-inp"></td>
          <td><input type="time" name="time_1n" class="date-inp"></td>
          <td><input type="time" name="time_2m" class="date-inp"></td>
          <td><input type="time" name="time_2e" class="date-inp"></td>
          <td><input type="time" name="time_2n" class="date-inp"></td>
          <td><input type="time" name="time_3m" class="date-inp"></td>
          <td><input type="time" name="time_3e" class="date-inp"></td>
          <td><input type="time" name="time_3n" class="date-inp"></td>
          <td><input type="time" name="time_4m" class="date-inp"></td>
          <td><input type="time" name="time_4e" class="date-inp"></td>
          <td><input type="time" name="time_4n" class="date-inp"></td>
          <td><input type="time" name="time_5m" class="date-inp"></td>
          <td><input type="time" name="time_5e" class="date-inp"></td>
          <td><input type="time" name="time_5n" class="date-inp"></td>
        </tr>
        <!-- Patency row -->
        <tr>
          <td class="row-head">Patency</td>
          <td><input type="text" name="pat_1m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_1e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_1n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_2m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_2e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_2n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_3m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_3e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_3n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_4m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_4e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_4n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_5m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_5e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="pat_5n" class="date-inp" placeholder="✓"></td>
        </tr>
        <!-- Flush row -->
        <tr>
          <td class="row-head">Flush</td>
          <td><input type="text" name="flu_1m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_1e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_1n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_2m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_2e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_2n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_3m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_3e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_3n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_4m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_4e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_4n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_5m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_5e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="flu_5n" class="date-inp" placeholder="✓"></td>
        </tr>
        <!-- Lock row -->
        <tr>
          <td class="row-head">Lock</td>
          <td><input type="text" name="lock_1m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_1e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_1n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_2m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_2e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_2n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_3m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_3e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_3n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_4m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_4e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_4n" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_5m" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_5e" class="date-inp" placeholder="✓"></td>
          <td><input type="text" name="lock_5n" class="date-inp" placeholder="✓"></td>
        </tr>
        <!-- Sign row -->
        <tr>
          <td class="row-head">Sign</td>
          <td><input type="text" name="sign_1m" class="date-inp"></td>
          <td><input type="text" name="sign_1e" class="date-inp"></td>
          <td><input type="text" name="sign_1n" class="date-inp"></td>
          <td><input type="text" name="sign_2m" class="date-inp"></td>
          <td><input type="text" name="sign_2e" class="date-inp"></td>
          <td><input type="text" name="sign_2n" class="date-inp"></td>
          <td><input type="text" name="sign_3m" class="date-inp"></td>
          <td><input type="text" name="sign_3e" class="date-inp"></td>
          <td><input type="text" name="sign_3n" class="date-inp"></td>
          <td><input type="text" name="sign_4m" class="date-inp"></td>
          <td><input type="text" name="sign_4e" class="date-inp"></td>
          <td><input type="text" name="sign_4n" class="date-inp"></td>
          <td><input type="text" name="sign_5m" class="date-inp"></td>
          <td><input type="text" name="sign_5e" class="date-inp"></td>
          <td><input type="text" name="sign_5n" class="date-inp"></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>

  <!-- ══ SIGN OFF ══ -->
  <div class="signoff-grid">
    <div class="signoff-cell">
      <div class="so-label">Sign off</div>
      <div class="so-input">
        <span style="font-size:10.5px;white-space:nowrap;">Assigned ICN with Emp. ID:</span>
        <input type="text" name="signoff_icn" placeholder="Name / ID">
      </div>
    </div>
    <div class="signoff-cell">
      <div class="so-label">Verified by</div>
      <div class="so-input">
        <span style="font-size:10.5px;white-space:nowrap;">with Emp. ID:</span>
        <input type="text" name="verified_by" placeholder="Name / ID">
      </div>
    </div>
  </div>

  <!-- ══ FOOTER ══ -->
  <div class="form-footer">
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
  if (confirm('Reset all form fields?')) {
    document.getElementById('mainForm').reset();
  }
}
</script>
</body>
</html>