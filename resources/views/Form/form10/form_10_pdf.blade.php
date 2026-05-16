<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Palliative Care Notes (PCN)</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 7.5pt;
    background: #ccc;
    display: flex;
    justify-content: center;
    padding: 10px;
  }

  .page {
    width: 210mm;
    min-height: 297mm;
    background: #fff;
    padding: 5mm 7mm 5mm 7mm;
    color: #000;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
  }

  /* ── Global table reset ── */
  table { border-collapse: collapse; width: 100%; }
  td, th {
    border: 1px solid #000;
    padding: 1.5px 3px;
    vertical-align: middle;
    font-size: 7.5pt;
  }

  /* Checkbox */
  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 1px;
    vertical-align: middle;
    position: relative; top: -1px;
  }

  /* ══════════════════════
     HEADER
  ══════════════════════ */
  .header {
    display: flex;
    align-items: stretch;
    gap: 3px;
    margin-bottom: 3px;
  }

  .logo-box {
    border: 1.5px solid #000;
    width: 28mm;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3px 2px;
    gap: 1px;
  }
  .logo-top {
    display: flex;
    align-items: center;
    gap: 3px;
  }
  .logo-icon {
    width: 14px; height: 14px;
    border: 1.5px solid #000;
    border-radius: 2px;
    display: flex; align-items: center; justify-content: center;
    font-size: 5pt; font-weight: 900;
  }
  .logo-text .logo-name { font-size: 9pt; font-weight: 900; line-height: 1; }
  .logo-text .logo-sub  { font-size: 5.5pt; letter-spacing: 0.3px; line-height: 1.2; }
  .logo-tag { font-size: 4.5pt; color: #555; text-align: center; }

  .title-area {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .title-area h1 {
    font-size: 14pt;
    font-weight: 900;
    text-align: center;
    letter-spacing: 0.3px;
  }

  .patient-label-box {
    border: 1.5px solid #000;
    width: 60mm;
    flex-shrink: 0;
    padding: 2px 3px;
    font-size: 6pt;
    line-height: 1.55;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    font-size: 6.5pt;
    border-bottom: 1px solid #000;
    padding-bottom: 1px;
    margin-bottom: 2px;
  }
  .patient-label-box .lb-row {
    border-bottom: 0.5px dotted #bbb;
    padding: 0.5px 0;
  }

  /* ══════════════════════
     PATIENT NAME BAR
  ══════════════════════ */
  .name-bar {
    display: grid;
    grid-template-columns: 65fr 35fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
  }

  /* ══════════════════════
     INFO TABLE
  ══════════════════════ */
  .info-table td {
    font-size: 7pt;
    padding: 2px 4px;
    height: 6.5mm;
  }
  .info-table .lbl { font-weight: 700; }

  /* ══════════════════════
     SECTION HEADER (black bg)
  ══════════════════════ */
  .sec-hdr td {
    background: #000 !important;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 2px 5px;
    border-color: #000;
  }

  /* ══════════════════════
     COLUMN HEADER (gray bg)
  ══════════════════════ */
  .col-hdr td {
    background: #d8d8d8;
    font-weight: 700;
    font-size: 7pt;
    text-align: center;
    padding: 2px 4px;
  }
  .col-hdr td.left { text-align: left; padding-left: 4px; }

  /* ══════════════════════
     DATA ROWS
  ══════════════════════ */
  .data-row td { font-size: 7pt; padding: 2px 4px; height: 7.5mm; }
  .data-row.alt td { background: #f5f5f5; }

  /* Checkbox item inline */
  .cbi { display: inline-flex; align-items: center; gap: 2px; white-space: nowrap; font-size: 7pt; margin-right: 6px; }

  /* Sub-section light gray */
  .sub-hdr td {
    background: #ececec;
    font-weight: 700;
    font-size: 7pt;
    padding: 2px 4px;
  }

  /* ══════════════════════
     COMFORT rows
  ══════════════════════ */
  .comfort-row td { font-size: 7pt; padding: 2px 4px; }

  /* ══════════════════════
     NURSING NOTE AREA
  ══════════════════════ */
  .note-area {
    border: 1px solid #000;
    min-height: 30mm;
    margin-bottom: 3px;
    position: relative;
  }
  .note-area .note-lines {
    padding: 2px 4px;
  }
  .note-line {
    border-bottom: 0.5px dotted #bbb;
    height: 7mm;
  }

  /* ══════════════════════
     TIME OF DEATH
  ══════════════════════ */
  .tod-table td { font-size: 7pt; padding: 2px 4px; height: 6.5mm; }
  .tod-table .lbl { font-weight: 700; }

  /* ══════════════════════
     SIGNATURE TABLE
  ══════════════════════ */
  .sig-table th {
    background: #d8d8d8;
    font-size: 7.5pt;
    font-weight: 700;
    text-align: center;
    padding: 2px 4px;
  }
  .sig-table td {
    font-size: 7pt;
    padding: 3px 4px;
    height: 9mm;
  }
  .sig-table .rlbl { font-weight: 700; background: #f0f0f0; }
  .sig-table tr:nth-child(2) td { background: #fde8dc; }
  .sig-table tr:nth-child(3) td { background: #fff; }

  /* ══════════════════════
     FOOTER
  ══════════════════════ */
  .footer {
    margin-top: 3px;
    font-size: 6pt;
    color: #444;
  }

  /* ══════════════════════
     SPACING HELPERS
  ══════════════════════ */
  .mb2 { margin-bottom: 2px; }
  .mb3 { margin-bottom: 3px; }

  /* ══════════════════════
     PRINT OVERRIDES
  ══════════════════════ */
  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { box-shadow: none; width: 210mm; min-height: 297mm; padding: 5mm 7mm; }
    @page { size: A4; margin: 0; }
    /* Force black & white - strip backgrounds for ink saving if needed */
    /* Remove next 4 lines if you want gray shading to print */
    /* .sec-hdr td { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .col-hdr td { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .sig-table tr:nth-child(2) td { -webkit-print-color-adjust: exact; print-color-adjust: exact; } */
    * { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- ══════════════════════════════════════
       HEADER
  ══════════════════════════════════════ -->
  <div class="header">

    <!-- Logo -->
    <div class="logo-box">
      <div class="logo-top">
        <div class="logo-icon">U</div>
        <div class="logo-text">
          <div class="logo-name">UNICO</div>
          <div class="logo-sub">HOSPITALS</div>
        </div>
      </div>
      <div class="logo-tag">Care, as we ought to give</div>
    </div>

    <!-- Title -->
    <div class="title-area">
      <h1>PALLIATIVE CARE NOTES (PCN)</h1>
    </div>

    <!-- Patient Label -->
    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">Invoice No:…………………………………</div>
      <div class="lb-row">UHID:………………………………………</div>
      <div class="lb-row">Patient name:…………………………</div>
      <div class="lb-row">Consultant name:……………………</div>
      <div class="lb-row">Age:……Day…… Month…… Year……</div>
      <div class="lb-row">Mobile no:……………………………</div>
      <div class="lb-row">Print:………………………………………</div>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       PATIENT NAME BAR
  ══════════════════════════════════════ -->
  <div class="name-bar">
    <span>PATIENT NAME:</span>
    <span>UHID:</span>
  </div>

  <!-- ══════════════════════════════════════
       PATIENT INFO TABLE
  ══════════════════════════════════════ -->
  <table class="info-table mb3">
    <tr>
      <td class="lbl" style="width:30%;">Gender: M/F</td>
      <td style="width:35%;">Age:</td>
      <td style="width:35%;"></td>
    </tr>
    <tr>
      <td class="lbl">Diagnosis:</td>
      <td colspan="2">Procedure</td>
    </tr>
    <tr>
      <td class="lbl">Consultant:</td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td class="lbl">Unit/Bed:</td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td class="lbl">Date of Note:</td>
      <td>Time:</td>
      <td></td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       CLINICAL STATUS
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="3">CLINICAL STATUS</td></tr>
    <tr class="col-hdr">
      <td class="left" style="width:28%;">Parameter</td>
      <td style="width:44%;">Observation</td>
      <td style="width:28%;">Time Remarks</td>
    </tr>
    <tr class="data-row">
      <td><span class="cb"></span> Consciousness/GCS</td><td></td><td></td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb"></span> Vital Signs: HR/BP/SpO₂/RR</td><td></td><td></td>
    </tr>
    <tr class="data-row">
      <td><span class="cb"></span> Temp (°C)</td><td></td><td></td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb"></span> Pain/Comfort Score (0-10)</td><td></td><td></td>
    </tr>
    <tr class="data-row">
      <td><span class="cb"></span> Respiratory Status</td>
      <td>O₂ support, ventilation</td><td></td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb"></span> Cardiac Status</td>
      <td>Arrhythmia, inotropes, hemodynamics</td><td></td>
    </tr>
    <tr class="data-row">
      <td><span class="cb"></span> Fluid Balance</td>
      <td>Input/Output</td><td></td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb"></span> Skin/Pressure Areas</td><td></td><td></td>
    </tr>
    <tr class="data-row">
      <td><span class="cb"></span> Other Clinical Notes</td><td></td><td></td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       SYMPTOM MANAGEMENT
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="3">SYMPTOM MANAGEMENT</td></tr>
    <tr class="col-hdr">
      <td class="left" style="width:28%;">Symptom</td>
      <td style="width:44%;">Intervention/Medication Response/Relief</td>
      <td style="width:28%;">Remarks</td>
    </tr>
    <tr class="data-row"><td><span class="cb"></span> Pain</td><td></td><td></td></tr>
    <tr class="data-row alt"><td><span class="cb"></span> Dyspnea/Labored Breathing</td><td></td><td></td></tr>
    <tr class="data-row"><td><span class="cb"></span> Anxiety/Restlessness</td><td></td><td></td></tr>
    <tr class="data-row alt"><td><span class="cb"></span> Nausea/Vomiting</td><td></td><td></td></tr>
    <tr class="data-row"><td><span class="cb"></span> Secretions/Sputum</td><td></td><td></td></tr>
    <tr class="data-row alt"><td><span class="cb"></span> Other Symptoms</td><td></td><td></td></tr>
  </table>

  <!-- ══════════════════════════════════════
       COMFORT & SUPPORTIVE CARE
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="4">COMFORT &amp; SUPPORTIVE CARE</td></tr>
    <tr class="comfort-row">
      <td style="width:25%;"><span class="cb"></span> Positioning for comfort</td>
      <td style="width:22%;"><span class="cb"></span> Oral/Eye care</td>
      <td style="width:27%;"><span class="cb"></span> Skin/Pressure area care</td>
      <td style="width:26%;"><span class="cb"></span> Suctioning as needed</td>
    </tr>
    <tr class="comfort-row">
      <td colspan="2"><span class="cb"></span> Environmental adjustments (light, noise, privacy)</td>
      <td><span class="cb"></span> Emotional support provided</td>
      <td><span class="cb"></span> Spiritual/Cultural support</td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       FAMILY SUPPORT & COMMUNICATION
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="2">FAMILY SUPPORT &amp; COMMUNICATION</td></tr>
    <tr class="data-row">
      <td style="width:50%;"><span class="cb"></span> Prognosis and care goals discussed</td>
      <td><span class="cb"></span> Family presence facilitated</td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb"></span> Counseling/Emotional support provided</td>
      <td><span class="cb"></span> Cultural/Religious practices respected</td>
    </tr>
    <tr class="data-row">
      <td colspan="2"><span class="cb"></span> Questions/Concerns addressed</td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       NURSING/STAFF NOTE
  ══════════════════════════════════════ -->
  <table class="mb2" style="margin-bottom:2px;">
    <tr class="sec-hdr"><td>NURSING/STAFF NOTE</td></tr>
    <tr>
      <td style="height:32mm; vertical-align:top; padding:3px 4px;">
        <div style="border-bottom:0.5px dotted #bbb; height:7mm;"></div>
        <div style="border-bottom:0.5px dotted #bbb; height:7mm;"></div>
        <div style="border-bottom:0.5px dotted #bbb; height:7mm;"></div>
        <div style="border-bottom:0.5px dotted #bbb; height:7mm;"></div>
      </td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       PHYSICIAN ORDERS & ADVANCE DIRECTIVES
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td>PHYSICIAN ORDERS &amp; ADVANCE DIRECTIVES</td></tr>
    <tr class="data-row"><td><span class="cb"></span> Comfort medications (opioids, sedatives, anticholinergics)</td></tr>
    <tr class="data-row alt"><td><span class="cb"></span> DNR/DNI status confirmed</td></tr>
    <tr class="data-row"><td><span class="cb"></span> Limitations of interventions documented</td></tr>
    <tr class="data-row alt"><td><span class="cb"></span> Orders for symptom relief and comfort care</td></tr>
  </table>

  <!-- ══════════════════════════════════════
       TIME OF DEATH
  ══════════════════════════════════════ -->
  <table class="tod-table mb2">
    <tr class="sec-hdr"><td colspan="2">TIME OF DEATH (If Applicable)</td></tr>
    <tr>
      <td class="lbl" style="width:50%;">Date</td>
      <td class="lbl">Time</td>
    </tr>
    <tr>
      <td colspan="2" class="lbl" style="height:7mm;">Verified by Physician</td>
    </tr>
    <tr>
      <td>
        Family informed: &nbsp;&nbsp;
        <span class="cbi"><span class="cb"></span> Yes</span>
        <span class="cbi"><span class="cb"></span> No</span>
      </td>
      <td>
        Post-mortem care initiated: &nbsp;&nbsp;
        <span class="cbi"><span class="cb"></span> Yes</span>
        <span class="cbi"><span class="cb"></span> No</span>
      </td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       SIGNATURE TABLE
  ══════════════════════════════════════ -->
  <table class="sig-table mb2">
    <thead>
      <tr>
        <th style="width:20%; text-align:left; padding-left:4px;"></th>
        <th style="width:38%;">Signature</th>
        <th style="width:42%;">Date and Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="rlbl" style="background:#fff;">Nurse/Staff</td>
        <td style="background:#fff;"></td>
        <td style="background:#fff;"></td>
      </tr>
      <tr>
        <td class="rlbl" style="background:#fde8dc;">Consultant/Intensivist</td>
        <td style="background:#fde8dc;"></td>
        <td style="background:#fde8dc;"></td>
      </tr>
      <tr>
        <td class="rlbl" style="background:#fff;">Verified By</td>
        <td style="background:#fff;"></td>
        <td style="background:#fff;"></td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
  <div class="footer">AF/LES/PCN/v01/Jan2026– AF10</div>

</div>
</body>
</html>