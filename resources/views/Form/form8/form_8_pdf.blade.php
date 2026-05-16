<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admission Note – ICU/HDU (IAN)</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 7pt;
    background: #ccc;
    display: flex;
    justify-content: center;
    padding: 20px;
  }

  .page {
    width: 210mm;
    min-height: 297mm;
    background: #fff;
    padding: 5mm 6mm 5mm 6mm;
    color: #000;
  }

  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 1.5px 3px; vertical-align: middle; font-size: 7pt; }

  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 1px;
    vertical-align: middle;
    position: relative; top: -1px;
  }

  /* ── Header ── */
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 3px;
  }
  .logo-block {
    border: 1.5px solid #000;
    padding: 3px 5px;
    display: flex;
    align-items: center;
    gap: 4px;
    flex-shrink: 0;
  }
  .form-title {
    font-size: 12.5pt;
    font-weight: 900;
    text-align: center;
    flex: 1;
    padding: 0 6px;
    line-height: 1.2;
  }
  .patient-label-box {
    border: 1.5px solid #000;
    width: 50mm;
    padding: 2px 4px;
    font-size: 6.5pt;
    line-height: 1.55;
    flex-shrink: 0;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    border-bottom: 1px solid #000;
    margin-bottom: 2px;
    padding-bottom: 1px;
    font-size: 7pt;
  }
  .patient-label-box .lb-row { border-bottom: 0.5px dotted #999; }

  /* ── Patient bar ── */
  .name-bar {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
  }

  .section-wrap { border: 1px solid #000; margin-bottom: 2px; }
  .lbl { font-weight: 700; white-space: nowrap; }

  /* ── Section title ── */
  .sec-title {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7pt;
    padding: 1.5px 5px;
  }
  .sub-title {
    background: #d0d0d0;
    font-weight: 700;
    font-size: 7pt;
    padding: 1px 4px;
    border-bottom: 1px solid #000;
  }

  /* ── Generic form table ── */
  .ft td { font-size: 7pt; padding: 1.5px 3px; border: 1px solid #000; }
  .ft .rl { font-weight: 700; background: #f0f0f0; }
  .ft tr:nth-child(even) td { background: #fafafa; }
  .ft tr:nth-child(even) .rl { background: #ebebeb; }

  /* ── Vitals table ── */
  .vitals-table th { background: #d0d0d0; font-weight: 700; font-size: 7pt; text-align: center; padding: 2px 3px; }
  .vitals-table td { font-size: 7pt; height: 7mm; }
  .vitals-table .param { font-weight: 700; background: #f0f0f0; width: 22%; }

  /* ── Lines/Drains table ── */
  .lines-table th { background: #d0d0d0; font-weight: 700; font-size: 7pt; text-align: center; padding: 2px 3px; }
  .lines-table td { font-size: 7pt; height: 6.5mm; }
  .lines-table .dev { font-weight: 700; background: #f0f0f0; width: 22%; }

  /* ── Medications table ── */
  .med-table th { background: #d0d0d0; font-weight: 700; font-size: 7pt; text-align: center; padding: 2px 3px; }
  .med-table td { font-size: 7pt; height: 7mm; }

  /* ── Sign rows ── */
  .sign-table td { font-size: 7pt; padding: 3px 5px; border: 1px solid #000; }
  .sign-table .s-label { font-weight: 700; background: #f0f0f0; width: 30%; }
  .sign-table .tall { height: 11mm; vertical-align: top; }

  .footer { margin-top: 3px; font-size: 6pt; color: #444; }

  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { width: 210mm; min-height: 297mm; padding: 5mm 6mm; box-shadow: none; }
    @page { size: A4; margin: 0; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- ═══ HEADER ═══ -->
  <div class="header">
    <div class="logo-block">
      <svg width="30" height="30" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
        <rect width="40" height="40" fill="#000"/>
        <text x="4" y="13" fill="#fff" font-size="8" font-weight="bold" font-family="Arial">UNICO</text>
        <text x="2" y="22" fill="#fff" font-size="5.5" font-family="Arial">HOSPITALS</text>
        <line x1="2" y1="25" x2="38" y2="25" stroke="#fff" stroke-width="0.5"/>
        <text x="2" y="33" fill="#fff" font-size="3.8" font-family="Arial">Care, as unique as you</text>
      </svg>
    </div>

    <div class="form-title">ADMISSION NOTE – ICU/HDU (IAN)</div>

    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">Invoice No:…………………………</div>
      <div class="lb-row">UHID:………………………………</div>
      <div class="lb-row">Patient name:……………………………</div>
      <div class="lb-row">Consultant name:……………………</div>
      <div class="lb-row">Age:….Day……Month……Year……</div>
      <div class="lb-row">Mobile no:……………………………</div>
      <div class="lb-row">Print:……………………………………</div>
    </div>
  </div>

  <!-- ═══ PATIENT INFO ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="name-bar"><span>PATIENT NAME:</span><span>UHID:</span></div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:60px;">Gender: M/F</td><td style="width:70px;"></td>
        <td class="rl" style="width:30px;">Age:</td><td style="width:60px;"></td>
        <td class="rl" style="width:50px;">Weight:</td><td style="width:60px;"></td>
        <td class="rl" style="width:45px;">Height:</td><td></td>
      </tr>
      <tr>
        <td class="rl">Location:</td>
        <td colspan="3"><span class="cb"></span>ICU &nbsp;&nbsp;<span class="cb"></span>HDU</td>
        <td class="rl">Consultant:</td><td colspan="3"></td>
      </tr>
      <tr>
        <td class="rl">Admitting Nurse:</td><td colspan="3"></td>
        <td class="rl">Date of Admission:</td><td>___/___/______</td>
        <td class="rl">Time:</td><td></td>
      </tr>
    </table>
  </div>

  <!-- ═══ ADMISSION DETAILS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">ADMISSION DETAILS</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:100px;">Source of Admission</td>
        <td colspan="7">
          <span class="cb"></span>CT-OT &nbsp;
          <span class="cb"></span>Ward/Cabin &nbsp;
          <span class="cb"></span>CCU &nbsp;
          <span class="cb"></span>MICU/SICU &nbsp;
          <span class="cb"></span>ER &nbsp;
          <span class="cb"></span>Other
        </td>
      </tr>
      <tr>
        <td class="rl">Reason for Admission</td>
        <td colspan="7">
          <span class="cb"></span>Emergency &nbsp;
          <span class="cb"></span>Elective &nbsp;
          <span class="cb"></span>Urgent &nbsp;
          <span class="cb"></span>Salvage &nbsp;
          <span class="cb"></span>Post-Surgical &nbsp;
          <span class="cb"></span>Other
        </td>
      </tr>
      <tr>
        <td class="rl">Current Status</td>
        <td colspan="7">
          <span class="cb"></span>Stable &nbsp;
          <span class="cb"></span>Critical &nbsp;
          <span class="cb"></span>Intubated &nbsp;
          <span class="cb"></span>On Inotropes &nbsp;
          <span class="cb"></span>Others
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ PRESENTING HISTORY ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">PRESENTING HISTORY / PATIENT'S SUMMARY</div>
    <table class="ft">
      <tr><td class="rl" style="width:150px;">Surgery/Procedure Performed:</td><td></td></tr>
      <tr><td class="rl">Date &amp; Time of Surgery:</td><td></td></tr>
      <tr><td class="rl">Intraoperative Events / Complications:</td><td></td></tr>
      <tr><td class="rl">Current Clinical Concerns:</td><td style="height:8mm;"></td></tr>
    </table>
  </div>

  <!-- ═══ VITAL SIGNS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">VITAL SIGNS ON ADMISSION</div>
    <table class="vitals-table">
      <thead>
        <tr>
          <th class="param">Parameters</th>
          <th style="width:26%;">Value</th>
          <th style="width:26%;">Target</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        <tr><td class="param">HR (bpm)</td><td></td><td></td><td></td></tr>
        <tr><td class="param">BP (mmHg)</td><td></td><td></td><td></td></tr>
        <tr><td class="param">MAP (mmHg)</td><td></td><td></td><td></td></tr>
        <tr><td class="param">Temp (°C)</td><td></td><td></td><td></td></tr>
        <tr><td class="param">SpO2 (%)</td><td></td><td></td><td></td></tr>
        <tr><td class="param">RR (/min)</td><td></td><td></td><td></td></tr>
        <tr><td class="param">CVP (cmH2O)</td><td></td><td></td><td></td></tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ AIRWAY & VENTILATION ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">AIRWAY &amp; VENTILATION</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:140px;">Spontaneously Breathing:</td>
        <td><span class="cb"></span>Yes &nbsp;&nbsp;&nbsp;<span class="cb"></span>No</td>
      </tr>
      <tr>
        <td class="rl">Intubated:</td>
        <td>
          <span class="cb"></span>Yes &nbsp;&nbsp;
          <span class="cb"></span>No &nbsp;&nbsp;&nbsp;
          ETT Size: ……………
        </td>
      </tr>
      <tr>
        <td class="rl">Tracheostomy:</td>
        <td><span class="cb"></span>Yes &nbsp;&nbsp;&nbsp;<span class="cb"></span>No</td>
      </tr>
      <tr>
        <td class="rl">Ventilator Mode:</td>
        <td>
          <span class="cb"></span>SIMV &nbsp;
          <span class="cb"></span>PCV &nbsp;
          <span class="cb"></span>PSV &nbsp;
          <span class="cb"></span>CPAP &nbsp;
          <span class="cb"></span>TV
        </td>
      </tr>
      <tr>
        <td class="rl">Settings:</td>
        <td>
          <span class="cb"></span>FiO2: ……… &nbsp;&nbsp;
          <span class="cb"></span>PEEP: ……… &nbsp;&nbsp;
          Rate: ………
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ LINES, DRAINS & CATHETERS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">LINES, DRAINS &amp; CATHETERS</div>
    <table class="lines-table">
      <thead>
        <tr>
          <th class="dev">Device</th>
          <th style="width:26%;">Site/Type</th>
          <th style="width:26%;">Patency/Flow</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        <tr><td class="dev">Central Line</td><td></td><td></td><td></td></tr>
        <tr><td class="dev">Arterial Line</td><td></td><td></td><td></td></tr>
        <tr><td class="dev">Chest Tube / Drain</td><td></td><td></td><td></td></tr>
        <tr><td class="dev">Urinary Catheter</td><td></td><td></td><td></td></tr>
        <tr><td class="dev">Other</td><td></td><td></td><td></td></tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ INVESTIGATIONS / LAB ORDERS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">INVESTIGATIONS / LAB ORDERS</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:40%;">CBC/Renal/Electrolytes / ABG:</td>
        <td style="width:30%;"><span class="cb"></span>Done &nbsp;&nbsp;<span class="cb"></span>Pending</td>
        <td></td>
      </tr>
      <tr>
        <td class="rl">ECG/Echocardiography:</td>
        <td><span class="cb"></span>Done &nbsp;&nbsp;<span class="cb"></span>Pending</td>
        <td></td>
      </tr>
      <tr>
        <td class="rl">Imaging (CXR/CT):</td>
        <td><span class="cb"></span>Done &nbsp;&nbsp;<span class="cb"></span>Pending</td>
        <td></td>
      </tr>
      <tr>
        <td class="rl">Special Labs (Lactate, Troponin, etc.):</td>
        <td><span class="cb"></span>Done &nbsp;&nbsp;<span class="cb"></span>Pending</td>
        <td></td>
      </tr>
    </table>
  </div>

  <!-- ═══ MEDICATIONS & INFUSIONS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">MEDICATIONS &amp; INFUSIONS ON ADMISSION</div>
    <table class="med-table">
      <thead>
        <tr>
          <th style="width:30%;">Medication/Infusion</th>
          <th style="width:18%;">Dose / Rate</th>
          <th style="width:18%;">Route</th>
          <th style="width:18%;">Indication</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ NURSING/CARE ORDERS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">NURSING/CARE ORDERS</div>
    <table class="ft">
      <tr>
        <td><span class="cb"></span>Hourly vitals monitoring</td>
        <td><span class="cb"></span>Strict fluid balance charting</td>
        <td><span class="cb"></span>Strict fluid balance charting</td>
      </tr>
      <tr>
        <td><span class="cb"></span>Pain management / sedation</td>
        <td><span class="cb"></span>Turn/reposition every 2 hours</td>
        <td><span class="cb"></span>Wound/chest tube care</td>
      </tr>
      <tr>
        <td><span class="cb"></span>Blood glucose monitoring</td>
        <td><span class="cb"></span>Insulin infusion protocol</td>
        <td><span class="cb"></span>Infection prevention measures</td>
      </tr>
    </table>
  </div>

  <!-- ═══ RISK / PRECAUTIONS ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">RISK / PRECAUTIONS</div>
    <table class="ft">
      <tr>
        <td><span class="cb"></span>Fall risk</td>
        <td><span class="cb"></span>Bleeding risk</td>
        <td><span class="cb"></span>Infection risk</td>
      </tr>
      <tr>
        <td class="rl">Allergies:</td>
        <td><span class="cb"></span>Yes &nbsp;&nbsp;<span class="cb"></span>No</td>
        <td>If Yes, Specify: ………………………………</td>
      </tr>
      <tr>
        <td class="rl">DNR/Code Status:</td>
        <td><span class="cb"></span>Full Code</td>
        <td><span class="cb"></span>DNR</td>
      </tr>
    </table>
  </div>

  <!-- ═══ ADMISSION SUMMARY / PLAN ═══ -->
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="sec-title">ADMISSION SUMMARY / PLAN</div>
    <table class="ft">
      <tr><td style="height:18mm; vertical-align:top;"></td></tr>
    </table>
  </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="sign-table" style="margin-bottom:3px;">
    <tr>
      <td class="s-label">Admitting Resident Doctor</td>
      <td class="s-label" style="width:34%;">Signature</td>
      <td class="s-label" style="width:22%;">Date and Time</td>
    </tr>
    <tr class="tall"><td></td><td></td><td></td></tr>
    <tr>
      <td class="s-label">Consultant/Intensivist</td>
      <td class="s-label">Signature</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr class="tall"><td></td><td></td><td></td></tr>
    <tr>
      <td class="s-label">Verified By</td>
      <td class="s-label">Signature</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr class="tall"><td></td><td></td><td></td></tr>
  </table>

  <div class="footer">AF/ICF/IAN/v01/Jan2026 – AF03</div>

</div>
</body>
</html>