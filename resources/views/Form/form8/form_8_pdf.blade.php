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
  }

  .page {
    width: 100%;
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
    background: transparent;
  }
  .cb.checked { background: #000; }

  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 3px;
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

  .ft td { font-size: 7pt; padding: 1.5px 3px; border: 1px solid #000; }
  .ft .rl { font-weight: 700; background: #f0f0f0; }
  .ft tr:nth-child(even) td { background: #fafafa; }
  .ft tr:nth-child(even) .rl { background: #ebebeb; }

  .vitals-table th { background: #d0d0d0; font-weight: 700; font-size: 7pt; text-align: center; padding: 1px 3px; }
  .vitals-table td { font-size: 7pt; height: 5mm; }
  .vitals-table .param { font-weight: 700; background: #f0f0f0; width: 22%; }

  .lines-table th { background: #d0d0d0; font-weight: 700; font-size: 7pt; text-align: center; padding: 2px 3px; }
  .lines-table td { font-size: 7pt; height: 5mm; }
  .lines-table .dev { font-weight: 700; background: #f0f0f0; width: 22%; }

  .med-table th { background: #d0d0d0; font-weight: 700; font-size: 7pt; text-align: center; padding: 2px 3px; }
  .med-table td { font-size: 7pt; height: 5mm; }

  .sign-table td { font-size: 7pt; padding: 3px 5px; border: 1px solid #000; }
  .sign-table .s-label { font-weight: 700; background: #f0f0f0; width: 30%; }
  .sign-table .tall { height: 6mm; vertical-align: top; }

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

  {{-- ═══ HEADER ═══ --}}
  <div class="header">
    <div class="logo-block">
      <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100" class="logo-icon">
    </div>

    <div class="form-title">ADMISSION NOTE – ICU/HDU (IAN)</div>

    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">Invoice No:…………………………</div>
      <div class="lb-row">UHID: {{ $latestEntry->uhid }}</div>
      <div class="lb-row">Patient name: {{ $latestEntry->patient_name }}</div>
      <div class="lb-row">Consultant name: {{ $latestEntry->consultant_name }}</div>
      <div class="lb-row">Age: {{ $latestEntry->age }} Year</div>
      <div class="lb-row">Mobile no:……………………………</div>
      <div class="lb-row">Print:……………………………………</div>
    </div>
  </div>

  {{-- ═══ PATIENT INFO ═══ --}}
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="name-bar">
      <span>PATIENT NAME: {{ $latestEntry->patient_name }}</span>
      <span>UHID: {{ $latestEntry->uhid }}</span>
    </div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:60px;">Gender: M/F</td>
        <td style="width:70px;">{{ trim($latestEntry->gender, '"') }}</td>
        <td class="rl" style="width:30px;">Age:</td>
        <td style="width:60px;">{{ $latestEntry->age }}</td>
        <td class="rl" style="width:50px;">Weight:</td>
        <td style="width:60px;">{{ $latestEntry->weight }} kg</td>
        <td class="rl" style="width:45px;">Height:</td>
        <td>{{ $latestEntry->height }} cm</td>
      </tr>
      <tr>
        <td class="rl">Location:</td>
        <td colspan="3">
          <span class="cb {{ trim($latestEntry->location, '"') === 'ICU' ? 'checked' : '' }}"></span>ICU &nbsp;&nbsp;
          <span class="cb {{ trim($latestEntry->location, '"') === 'HDU' ? 'checked' : '' }}"></span>HDU
        </td>
        <td class="rl">Consultant:</td>
        <td colspan="3">{{ $latestEntry->consultant }}</td>
      </tr>
      <tr>
        <td class="rl">Admitting Nurse:</td>
        <td colspan="3">{{ $latestEntry->admitting_nurse }}</td>
        <td class="rl">Date of Admission:</td>
        <td>{{ \Carbon\Carbon::parse($latestEntry->adm_date)->format('d/m/Y') }}</td>
        <td class="rl">Time:</td>
        <td>{{ \Carbon\Carbon::parse($latestEntry->adm_time)->format('H:i') }}</td>
      </tr>
    </table>
  </div>

  {{-- ═══ ADMISSION DETAILS ═══ --}}
  @php
    $source  = trim($latestEntry->source  ?? '', '"');
    $reason  = trim($latestEntry->reason  ?? '', '"');
    $status  = trim($latestEntry->status  ?? '', '"');
  @endphp
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">ADMISSION DETAILS</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:100px;">Source of Admission</td>
        <td colspan="7">
          <span class="cb {{ $source === 'CT-OT'       ? 'checked' : '' }}"></span>CT-OT &nbsp;
          <span class="cb {{ $source === 'Ward/Cabin'   ? 'checked' : '' }}"></span>Ward/Cabin &nbsp;
          <span class="cb {{ $source === 'CCU'          ? 'checked' : '' }}"></span>CCU &nbsp;
          <span class="cb {{ $source === 'MICU/SICU'    ? 'checked' : '' }}"></span>MICU/SICU &nbsp;
          <span class="cb {{ $source === 'ER'           ? 'checked' : '' }}"></span>ER &nbsp;
          <span class="cb {{ $source === 'Other'        ? 'checked' : '' }}"></span>Other
          @if($latestEntry->source_other) &nbsp;: {{ $latestEntry->source_other }} @endif
        </td>
      </tr>
      <tr>
        <td class="rl">Reason for Admission</td>
        <td colspan="7">
          <span class="cb {{ $reason === 'Emergency'    ? 'checked' : '' }}"></span>Emergency &nbsp;
          <span class="cb {{ $reason === 'Elective'     ? 'checked' : '' }}"></span>Elective &nbsp;
          <span class="cb {{ $reason === 'Urgent'       ? 'checked' : '' }}"></span>Urgent &nbsp;
          <span class="cb {{ $reason === 'Salvage'      ? 'checked' : '' }}"></span>Salvage &nbsp;
          <span class="cb {{ $reason === 'Post-Surgical'? 'checked' : '' }}"></span>Post-Surgical &nbsp;
          <span class="cb {{ $reason === 'Other'        ? 'checked' : '' }}"></span>Other
          @if($latestEntry->reason_other) &nbsp;: {{ $latestEntry->reason_other }} @endif
        </td>
      </tr>
      <tr>
        <td class="rl">Current Status</td>
        <td colspan="7">
          <span class="cb {{ $status === 'Stable'       ? 'checked' : '' }}"></span>Stable &nbsp;
          <span class="cb {{ $status === 'Critical'     ? 'checked' : '' }}"></span>Critical &nbsp;
          <span class="cb {{ $status === 'Intubated'    ? 'checked' : '' }}"></span>Intubated &nbsp;
          <span class="cb {{ $status === 'On Inotropes' ? 'checked' : '' }}"></span>On Inotropes &nbsp;
          <span class="cb {{ $status === 'Others'       ? 'checked' : '' }}"></span>Others
          @if($latestEntry->status_other) &nbsp;: {{ $latestEntry->status_other }} @endif
        </td>
      </tr>
    </table>
  </div>

  {{-- ═══ PRESENTING HISTORY ═══ --}}
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">PRESENTING HISTORY / PATIENT'S SUMMARY</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:150px;">Surgery/Procedure Performed:</td>
        <td>{{ $latestEntry->surgery_procedure }}</td>
      </tr>
      <tr>
        <td class="rl">Date &amp; Time of Surgery:</td>
        <td>
          {{ $latestEntry->surgery_date ? \Carbon\Carbon::parse($latestEntry->surgery_date)->format('d/m/Y') : '___/___/______' }}
          &nbsp;
          {{ $latestEntry->surgery_time ? \Carbon\Carbon::parse($latestEntry->surgery_time)->format('H:i') : '' }}
        </td>
      </tr>
      <tr>
        <td class="rl">Intraoperative Events / Complications:</td>
        <td>{{ $latestEntry->intraop_events }}</td>
      </tr>
      <tr>
        <td class="rl">Current Clinical Concerns:</td>
        <td style="height:8mm;">{{ $latestEntry->clinical_concerns }}</td>
      </tr>
    </table>
  </div>

  {{-- ═══ VITAL SIGNS ═══ --}}
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
        <tr>
          <td class="param">HR (bpm)</td>
          <td>{{ $latestEntry->hr_val }}</td>
          <td>{{ $latestEntry->hr_target }}</td>
          <td>{{ $latestEntry->hr_notes }}</td>
        </tr>
        <tr>
          <td class="param">BP (mmHg)</td>
          <td>{{ $latestEntry->bp_sys }} / {{ $latestEntry->bp_dia }}</td>
          <td>{{ $latestEntry->bp_target }}</td>
          <td>{{ $latestEntry->bp_notes }}</td>
        </tr>
        <tr>
          <td class="param">MAP (mmHg)</td>
          <td>{{ $latestEntry->map_val }}</td>
          <td>{{ $latestEntry->map_target }}</td>
          <td>{{ $latestEntry->map_notes }}</td>
        </tr>
        <tr>
          <td class="param">Temp (°C)</td>
          <td>{{ $latestEntry->temp_val }}</td>
          <td>{{ $latestEntry->temp_target }}</td>
          <td>{{ $latestEntry->temp_notes }}</td>
        </tr>
        <tr>
          <td class="param">SpO2 (%)</td>
          <td>{{ $latestEntry->spo2_val }}</td>
          <td>{{ $latestEntry->spo2_target }}</td>
          <td>{{ $latestEntry->spo2_notes }}</td>
        </tr>
        <tr>
          <td class="param">RR (/min)</td>
          <td>{{ $latestEntry->rr_val }}</td>
          <td>{{ $latestEntry->rr_target }}</td>
          <td>{{ $latestEntry->rr_notes }}</td>
        </tr>
        <tr>
          <td class="param">CVP (cmH2O)</td>
          <td>{{ $latestEntry->cvp_val }}</td>
          <td>{{ $latestEntry->cvp_target }}</td>
          <td>{{ $latestEntry->cvp_notes }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  {{-- ═══ AIRWAY & VENTILATION ═══ --}}
  @php
    $ventMode = trim($latestEntry->vent_mode ?? '', '"');
  @endphp
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">AIRWAY &amp; VENTILATION</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:140px;">Spontaneously Breathing:</td>
        <td>
          <span class="cb {{ $latestEntry->spont_breathing == 1 ? 'checked' : '' }}"></span>Yes &nbsp;&nbsp;&nbsp;
          <span class="cb {{ $latestEntry->spont_breathing == 0 ? 'checked' : '' }}"></span>No
        </td>
      </tr>
      <tr>
        <td class="rl">Intubated:</td>
        <td>
          <span class="cb {{ $latestEntry->intubated == 1 ? 'checked' : '' }}"></span>Yes &nbsp;&nbsp;
          <span class="cb {{ $latestEntry->intubated == 0 ? 'checked' : '' }}"></span>No &nbsp;&nbsp;&nbsp;
          ETT Size: {{ $latestEntry->ett_size }}
        </td>
      </tr>
      <tr>
        <td class="rl">Tracheostomy:</td>
        <td>
          <span class="cb {{ $latestEntry->tracheostomy == 1 ? 'checked' : '' }}"></span>Yes &nbsp;&nbsp;&nbsp;
          <span class="cb {{ $latestEntry->tracheostomy == 0 ? 'checked' : '' }}"></span>No
        </td>
      </tr>
      <tr>
        <td class="rl">Ventilator Mode:</td>
        <td>
          <span class="cb {{ $ventMode === 'SIMV' ? 'checked' : '' }}"></span>SIMV &nbsp;
          <span class="cb {{ $ventMode === 'PCV'  ? 'checked' : '' }}"></span>PCV &nbsp;
          <span class="cb {{ $ventMode === 'PSV'  ? 'checked' : '' }}"></span>PSV &nbsp;
          <span class="cb {{ $ventMode === 'CPAP' ? 'checked' : '' }}"></span>CPAP &nbsp;
          <span class="cb {{ $ventMode === 'TV'   ? 'checked' : '' }}"></span>TV
        </td>
      </tr>
      <tr>
        <td class="rl">Settings:</td>
        <td>
          FiO2: {{ $latestEntry->fio2 }} &nbsp;&nbsp;
          PEEP: {{ $latestEntry->peep }} &nbsp;&nbsp;
          Rate: {{ $latestEntry->vent_rate }} &nbsp;&nbsp;
          TV: {{ $latestEntry->tv_val }}
        </td>
      </tr>
    </table>
  </div>

  {{-- ═══ LINES, DRAINS & CATHETERS ═══ --}}
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
        <tr>
          <td class="dev">Central Line</td>
          <td>{{ $latestEntry->cl_site }}</td>
          <td>{{ $latestEntry->cl_patency }}</td>
          <td>{{ $latestEntry->cl_notes }}</td>
        </tr>
        <tr>
          <td class="dev">Arterial Line</td>
          <td>{{ $latestEntry->al_site }}</td>
          <td>{{ $latestEntry->al_patency }}</td>
          <td>{{ $latestEntry->al_notes }}</td>
        </tr>
        <tr>
          <td class="dev">Chest Tube / Drain</td>
          <td>{{ $latestEntry->ct_site }}</td>
          <td>{{ $latestEntry->ct_patency }}</td>
          <td>{{ $latestEntry->ct_notes }}</td>
        </tr>
        <tr>
          <td class="dev">Urinary Catheter</td>
          <td>{{ $latestEntry->uc_site }}</td>
          <td>{{ $latestEntry->uc_patency }}</td>
          <td>{{ $latestEntry->uc_notes }}</td>
        </tr>
        <tr>
          <td class="dev">Other</td>
          <td>{{ $latestEntry->oth_site }}</td>
          <td>{{ $latestEntry->oth_patency }}</td>
          <td>{{ $latestEntry->oth_notes }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  {{-- ═══ INVESTIGATIONS / LAB ORDERS ═══ --}}
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">INVESTIGATIONS / LAB ORDERS</div>
    <table class="ft">
      <tr>
        <td class="rl" style="width:40%;">CBC/Renal/Electrolytes / ABG:</td>
        <td style="width:30%;">
          <span class="cb {{ $latestEntry->inv_cbc   === 'Done'    ? 'checked' : '' }}"></span>Done &nbsp;&nbsp;
         
        </td>
        <td> <span class="cb {{ $latestEntry->inv_cbc_p === 'Pending' ? 'checked' : '' }}"></span>Pending</td>
      </tr>
      <tr>
        <td class="rl">ECG/Echocardiography:</td>
        <td>
          <span class="cb {{ $latestEntry->inv_ecg   === 'Done'    ? 'checked' : '' }}"></span>Done &nbsp;&nbsp;
          
        </td>
        <td><span class="cb {{ $latestEntry->inv_ecg_p === 'Pending' ? 'checked' : '' }}"></span>Pending</td>
      </tr>
      <tr>
        <td class="rl">Imaging (CXR/CT):</td>
        <td>
          <span class="cb {{ $latestEntry->inv_img   === 'Done'    ? 'checked' : '' }}"></span>Done &nbsp;&nbsp;
          
        </td>
        <td><span class="cb {{ $latestEntry->inv_img_p === 'Pending' ? 'checked' : '' }}"></span>Pending</td>
      </tr>
      <tr>
        <td class="rl">Special Labs (Lactate, Troponin, etc.):</td>
        <td>
          <span class="cb {{ $latestEntry->inv_spl   === 'Done'    ? 'checked' : '' }}"></span>Done &nbsp;&nbsp;
         
        </td>
        <td> <span class="cb {{ $latestEntry->inv_spl_p === 'Pending' ? 'checked' : '' }}"></span>Pending</td>
      </tr>
    </table>
  </div>

  {{-- ═══ MEDICATIONS & INFUSIONS ═══ --}}
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
      @if(!empty($latestEntry) && $latestEntry->medications)
          @foreach($latestEntry->medications as $med)
              <tr>
                  <td>{{ $med->med_name ?? '-' }}</td>
                  <td>{{ $med->med_dose ?? '-' }}</td>
                  <td>{{ $med->med_route ?? '-' }}</td>
                  <td>{{ $med->med_indication ?? '-' }}</td>
                  <td>{{ $med->med_notes ?? '-' }}</td>
              </tr>
          @endforeach
      @endif
      </tbody>
    </table>
  </div>

  {{-- ═══ NURSING/CARE ORDERS ═══ --}}
  @php
    $careOrder = trim($latestEntry->care_order ?? '', '"');
  @endphp
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">NURSING/CARE ORDERS</div>
    <table class="ft">
      <tr>
        <td><span class="cb {{ $careOrder === 'Hourly vitals monitoring'      ? 'checked' : '' }}"></span>Hourly vitals monitoring</td>
        <td><span class="cb {{ $careOrder === 'Strict fluid balance charting' ? 'checked' : '' }}"></span>Strict fluid balance charting</td>
        <td><span class="cb {{ $careOrder === 'Strict fluid balance charting' ? 'checked' : '' }}"></span>Strict fluid balance charting</td>
      </tr>
      <tr>
        <td><span class="cb {{ $careOrder === 'Pain management / sedation'    ? 'checked' : '' }}"></span>Pain management / sedation</td>
        <td><span class="cb {{ $careOrder === 'Turn/reposition every 2 hours' ? 'checked' : '' }}"></span>Turn/reposition every 2 hours</td>
        <td><span class="cb {{ $careOrder === 'Wound/chest tube care'         ? 'checked' : '' }}"></span>Wound/chest tube care</td>
      </tr>
      <tr>
        <td><span class="cb {{ $careOrder === 'Blood glucose monitoring'      ? 'checked' : '' }}"></span>Blood glucose monitoring</td>
        <td><span class="cb {{ $careOrder === 'Insulin infusion protocol'     ? 'checked' : '' }}"></span>Insulin infusion protocol</td>
        <td><span class="cb {{ $careOrder === 'Infection prevention measures' ? 'checked' : '' }}"></span>Infection prevention measures</td>
      </tr>
    </table>
  </div>

  {{-- ═══ RISK / PRECAUTIONS ═══ --}}
  @php
    $risk = trim($latestEntry->risk ?? '', '"');
  @endphp
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">RISK / PRECAUTIONS</div>
    <table class="ft">
      <tr>
        <td><span class="cb {{ $risk === 'Fall risk'      ? 'checked' : '' }}"></span>Fall risk</td>
        <td><span class="cb {{ $risk === 'Bleeding risk'  ? 'checked' : '' }}"></span>Bleeding risk</td>
        <td><span class="cb {{ $risk === 'Infection risk' ? 'checked' : '' }}"></span>Infection risk</td>
      </tr>
      <tr>
        <td class="rl">Allergies:</td>
        <td>
          <span class="cb {{ $latestEntry->allergy_yn == 1 ? 'checked' : '' }}"></span>Yes &nbsp;&nbsp;
          <span class="cb {{ $latestEntry->allergy_yn == 0 ? 'checked' : '' }}"></span>No
        </td>
        <td>If Yes, Specify: {{ $latestEntry->allergy_specify }}</td>
      </tr>
      <tr>
        <td class="rl">DNR/Code Status:</td>
        <td><span class="cb {{ $latestEntry->code_status === 'Full Code' ? 'checked' : '' }}"></span>Full Code</td>
        <td>
          <span class="cb {{ $latestEntry->code_status === 'DNR' ? 'checked' : '' }}"></span>DNR
          @if($latestEntry->dnr_specify) &nbsp; {{ $latestEntry->dnr_specify }} @endif
        </td>
      </tr>
    </table>
  </div>

  {{-- ═══ ADMISSION SUMMARY / PLAN ═══ --}}
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="sec-title">ADMISSION SUMMARY / PLAN</div>
    <table class="ft">
      <tr>
        <td style="height:auto; vertical-align:top;">{{ $latestEntry->admission_summary }}</td>
      </tr>
    </table>
  </div>

  {{-- ═══ SIGN OFF ═══ --}}
  <table class="sign-table" style="margin-bottom:3px;">
    <tr>
      <td class="s-label">Admitting Resident Doctor</td>
      <td class="s-label" style="width:34%;">Signature</td>
      <td class="s-label" style="width:22%;">Date and Time</td>
    </tr>
    <tr class="tall">
      <td>{{ $latestEntry->resident_name }}</td>
      <td>{{ $latestEntry->resident_sig }}</td>
      <td>{{ $latestEntry->resident_dt ? \Carbon\Carbon::parse($latestEntry->resident_dt)->format('d/m/Y H:i') : '' }}</td>
    </tr>
    <tr>
      <td class="s-label">Consultant/Intensivist</td>
      <td class="s-label">Signature</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr class="tall">
      <td>{{ $latestEntry->consultant_name }}</td>
      <td>{{ $latestEntry->consultant_sig }}</td>
      <td>{{ $latestEntry->consultant_dt ? \Carbon\Carbon::parse($latestEntry->consultant_dt)->format('d/m/Y H:i') : '' }}</td>
    </tr>
    <tr>
      <td class="s-label">Verified By</td>
      <td class="s-label">Signature</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr class="tall">
      <td>{{ $latestEntry->verified_by }}</td>
      <td>{{ $latestEntry->verified_sig }}</td>
      <td>{{ $latestEntry->verified_dt ? \Carbon\Carbon::parse($latestEntry->verified_dt)->format('d/m/Y H:i') : '' }}</td>
    </tr>
  </table>

  <div class="footer">AF/ICF/IAN/v01/Jan2026 – AF03</div>
   <div class="footer">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>

</div>
</body>
</html>