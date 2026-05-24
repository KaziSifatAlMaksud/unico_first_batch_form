<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ISBAR Handover Communication Form</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 7.5pt;
    background: #ccc;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 0;
  }

  .page {
    width: 100%;
    min-height: 297mm;
    background: #fff;
    padding: 5mm 8mm 5mm 8mm;
    color: #000;
    box-shadow: 0 0 8px rgba(0,0,0,0.25);
  }

  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 1.5px 3px; vertical-align: middle; font-size: 7.5pt; }

  /* ── CHECKBOX ── */
  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 2px;
    vertical-align: middle;
    position: relative; top: -1px;
    flex-shrink: 0;
  }
  .cb.checked::after {
    content: '✓';
    font-size: 6pt;
    position: absolute;
    top: -2px; left: 0;
    line-height: 1;
  }

  /* ── HEADER ── */
  .header {
    display: flex;
    align-items: stretch;
    margin-bottom: 3px;
    gap: 3px;
  }
  .logo-area {
    width: 22mm;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .logo-area img { max-width: 100%; max-height: 18mm; object-fit: contain; }
  .title-area {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  .title-area h1 {
    font-size: 12pt;
    font-weight: 900;
    text-align: center;
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }
  .title-area .copy-badge {
    font-size: 7pt;
    font-weight: 700;
    color: #444;
    margin-top: 2px;
    letter-spacing: 0.8px;
    text-transform: uppercase;
  }
  .patient-label-box {
    border: 1.5px solid #000;
    width: 56mm;
    flex-shrink: 0;
    padding: 2px 3px;
    font-size: 6pt;
    line-height: 1.6;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    font-size: 7pt;
    border-bottom: 1px solid #000;
    padding-bottom: 1px;
    margin-bottom: 2px;
  }
  .patient-label-box .lb-row {
    border-bottom: 0.5px dotted #bbb;
    padding: 0.5px 0;
  }

  /* ── NAME BAR ── */
  .name-bar {
    display: grid;
    grid-template-columns: 65fr 35fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
    margin-bottom: 0;
  }

  /* ── INFO TABLE ── */
  .info-table td {
    font-size: 7pt;
    padding: 2px 4px;
    height: 6mm;
  }

  /* ── SECTION HEADER (dark) ── */
  .sec-row td {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 2px 5px;
    border-color: #000;
    letter-spacing: 0.5px;
  }

  /* ── SUB-SECTION (gray) ── */
  .sub-row td {
    background: #e0e0e0;
    font-weight: 700;
    font-size: 7pt;
    padding: 2px 5px;
  }

  /* ── DATA ROWS ── */
  .data-row td { font-size: 7pt; padding: 2px 4px; }
  .data-row.alt td { background: #f7f7f7; }

  /* checkbox group inline */
  .cb-group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 2px 10px;
  }
  .cb-item {
    display: inline-flex;
    align-items: center;
    gap: 2px;
    white-space: nowrap;
    font-size: 7pt;
  }

  /* vitals inline */
  .vitals-row {
    display: flex;
    flex-wrap: wrap;
    gap: 3px 14px;
    align-items: center;
    font-size: 7pt;
  }
  .vp { display: inline-flex; align-items: center; gap: 3px; }
  .vp strong { font-size: 7pt; }
  .vp .vval {
    display: inline-block;
    min-width: 18mm;
    border-bottom: 0.5px solid #555;
  }

  /* action rows */
  .action-row { display: flex; align-items: center; gap: 5px; font-size: 7pt; padding: 2px 0; }
  .action-row .aval {
    flex: 1;
    border-bottom: 0.5px dotted #888;
    min-height: 9px;
  }

  /* write line */
  .write-line {
    display: block;
    border-bottom: 0.5px dotted #999;
    min-height: 10px;
    width: 100%;
    margin: 1.5px 0;
  }

  /* ── SIGNATURE TABLE ── */
  .sig-table th {
    background: #e0e0e0;
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
  .sig-table .row-lbl {
    font-weight: 700;
    background: #f5f5f5;
    width: 26mm;
  }

  /* ── FOOTER ── */
  .footer {
    display: flex;
    justify-content: space-between;
    font-size: 6pt;
    color: #444;
    margin-top: 3px;
    border-top: 0.5px solid #ccc;
    padding-top: 2px;
  }

  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { box-shadow: none; width: 210mm; min-height: 297mm; }
    @page { size: A4; margin: 0; }
  }
</style>
</head>
<body>

@php
  /* helper: render a checkbox, ticked if $checked is true */
  function cbChecked(bool $checked): string {
    return $checked
      ? '<span class="cb checked"></span>'
      : '<span class="cb"></span>';
  }

  /* helper: check whether $val exists in a DB array/JSON field */
  function inArr($field, string $val): bool {
    if (!$field) return false;
    $arr = is_array($field) ? $field : json_decode($field, true);
    return is_array($arr) && in_array($val, $arr);
  }
@endphp

<div class="page">

  <!-- ═══ HEADER ═══ -->
  <div class="header">
    <div class="logo-area">
      <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="Logo">
    </div>
    <div class="title-area">
      <h1>ISBAR Handover Communication Form</h1>
      <div class="copy-badge">Office Copy</div>
    </div>
    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">UHID: {{ $latestEntry->uhid ?? '……………………………………' }}</div>
      <div class="lb-row">Patient Name: {{ $latestEntry->patient_name ?? '………………………………' }}</div>
      <div class="lb-row">Ward / Bed: {{ $latestEntry->ward_bed ?? '…………………………………' }}</div>
      <div class="lb-row">Date: {{ $latestEntry->handover_date ?? '……………………………………' }}</div>
      <div class="lb-row">Time: {{ $latestEntry->handover_time ?? '……………………………………' }}</div>
    </div>
  </div>

  <!-- ═══ NAME BAR ═══ -->
  <div class="name-bar">
    <span><strong>PATIENT'S NAME:</strong>&nbsp; {{ $latestEntry->patient_name ?? '-' }}</span>
    <span><strong>UHID:</strong>&nbsp; {{ $latestEntry->uhid ?? '-' }}</span>
  </div>

  <!-- ═══ INFO TABLE ═══ -->
  <table class="info-table" style="margin-bottom:3px;">
    <tr>
      <td style="width:34%;"><strong>Ward / Bed:</strong> {{ $latestEntry->ward_bed ?? '-' }}</td>
      <td style="width:33%;"><strong>Date:</strong> {{ $latestEntry->handover_date ?? '-' }}</td>
      <td style="width:33%;"><strong>Time:</strong> {{ $latestEntry->handover_time ?? '-' }}</td>
    </tr>
    <tr>
      <td colspan="3"><strong>Handover From:</strong> {{ $latestEntry->handover_from ?? '-' }}</td>
    </tr>
  </table>

  <!-- ═══ MAIN SECTIONS ═══ -->
  <table style="margin-bottom:3px;">

    <!-- ══ S — SITUATION ══ -->
    <tr class="sec-row"><td colspan="4">S &mdash; SITUATION</td></tr>

    <tr class="sub-row"><td colspan="4">1. Patient Condition:</td></tr>
    <tr class="data-row">
      <td colspan="4">
        <div class="cb-group">
          @foreach(['Good','Improving','Not good','Deteriorating','Critical'] as $v)
            <span class="cb-item">
              {!! cbChecked(inArr($latestEntry->patient_condition ?? null, $v)) !!} {{ $v }}
            </span>
          @endforeach
        </div>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">2. Abnormal Vital Signs:</td></tr>
    <tr class="data-row alt">
      <td colspan="4">
        <span class="cb-group" style="display:inline-flex; gap:12px; margin-right:16px;">
          @foreach(['Stable','Borderline','Unstable'] as $v)
            <span class="cb-item">
              {!! cbChecked(inArr($latestEntry->vital_status ?? null, $v)) !!} {{ $v }}
            </span>
          @endforeach
        </span>
        <strong>Details:</strong>
        {{ $latestEntry->vital_status_details ?? '…………………………………………………………………………………' }}
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">3. Post-Procedure Concern:</td></tr>
    <tr class="data-row">
      <td colspan="4">{{ $latestEntry->post_procedure_concern ?? '…………………………………………………………………………………………………………………………' }}</td>
    </tr>

    <tr class="sub-row"><td colspan="4">4. Medication Related Issues:</td></tr>
    <tr class="data-row alt">
      <td colspan="4">{{ $latestEntry->medication_issues ?? '…………………………………………………………………………………………………………………………' }}</td>
    </tr>

    <tr class="sub-row"><td colspan="4">5. Lines / Devices:</td></tr>
    <tr class="data-row">
      <td colspan="4">
        <div class="cb-group">
          @foreach(['IV','Central line','Foley','NG','Drain','Ventilator','CPAP/BiPAP','O2','Inotrope'] as $v)
            <span class="cb-item">
              {!! cbChecked(inArr($latestEntry->lines_devices ?? null, $v)) !!}
              {{ $v === 'O2' ? 'O₂' : $v }}
            </span>
          @endforeach
        </div>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">6. Situation Details:</td></tr>
    <tr class="data-row alt">
      <td colspan="4" style="min-height:12mm;">
        {{ $latestEntry->situation_details ?? '' }}
        <span class="write-line"></span>
        <span class="write-line"></span>
      </td>
    </tr>

    <!-- ══ B — BACKGROUND ══ -->
    <tr class="sec-row"><td colspan="4">B &mdash; BACKGROUND</td></tr>

    <tr class="sub-row"><td colspan="4">1. Diagnosis:</td></tr>
    <tr class="data-row">
      <td colspan="4">{{ $latestEntry->diagnosis ?? '………………………………………………………………………………………………………………………………………' }}</td>
    </tr>

    <tr class="sub-row"><td colspan="4">2. Relevant History:</td></tr>
    <tr class="data-row alt">
      <td colspan="4">
        <div class="cb-group">
          @foreach(['DM','HTN','CKD','IHD','Asthma','Stroke'] as $v)
            <span class="cb-item">
              {!! cbChecked(inArr($latestEntry->history ?? null, $v)) !!} {{ $v }}
            </span>
          @endforeach
          <span class="cb-item">
            {!! cbChecked(inArr($latestEntry->history ?? null, 'Others')) !!}
            Others:&nbsp;<span style="display:inline-block; min-width:32mm; border-bottom:0.5px solid #555;">{{ $latestEntry->history_others ?? '' }}</span>
          </span>
        </div>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">3. History of Surgery / Procedure:</td></tr>
    <tr class="data-row">
      <td colspan="4">{{ $latestEntry->surgery_history ?? '……………………………………………………………………………………………………………………………………' }}</td>
    </tr>

    <tr class="sub-row"><td colspan="4">4. Allergies:</td></tr>
    <tr class="data-row alt">
      <td colspan="4">
        <div class="cb-group">
          <span class="cb-item">
            {!! cbChecked(inArr($latestEntry->allergy ?? null, 'Drug')) !!}
            Drug:&nbsp;<span style="display:inline-block; min-width:24mm; border-bottom:0.5px solid #555;">{{ $latestEntry->allergy_drug ?? '' }}</span>
          </span>
          <span class="cb-item">
            {!! cbChecked(inArr($latestEntry->allergy ?? null, 'Food')) !!}
            Food:&nbsp;<span style="display:inline-block; min-width:24mm; border-bottom:0.5px solid #555;">{{ $latestEntry->allergy_food ?? '' }}</span>
          </span>
          <span class="cb-item">
            {!! cbChecked(inArr($latestEntry->allergy ?? null, 'Latex')) !!} Latex
          </span>
          <span class="cb-item">
            {!! cbChecked(inArr($latestEntry->allergy ?? null, 'Other')) !!}
            Other:&nbsp;<span style="display:inline-block; min-width:24mm; border-bottom:0.5px solid #555;">{{ $latestEntry->allergy_other ?? '' }}</span>
          </span>
        </div>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">5. Additional Background:</td></tr>
    <tr class="data-row">
      <td colspan="4" style="min-height:12mm;">
        {{ $latestEntry->additional_background ?? '' }}
        <span class="write-line"></span>
        <span class="write-line"></span>
      </td>
    </tr>

    <!-- ══ A — ASSESSMENT ══ -->
    <tr class="sec-row"><td colspan="4">A &mdash; ASSESSMENT</td></tr>

    <tr class="sub-row"><td colspan="4">1. Vital Signs Status:</td></tr>
    <tr class="data-row alt">
      <td colspan="4">
        <div class="vitals-row">
          @php
            $vitals = [
              'HR'    => ['vs_hr',   'bpm'],
              'BP'    => ['vs_bp',   'mmHg'],
              'RR'    => ['vs_rr',   '/min'],
              'Temp'  => ['vs_temp', '°C'],
              'SpO₂'  => ['vs_spo2', '%'],
              'Pain Score' => ['vs_pain', '/10'],
            ];
          @endphp
          @foreach($vitals as $lbl => [$field, $unit])
            <span class="vp">
              <strong>{{ $lbl }}:</strong>
              <span class="vval">{{ $latestEntry->$field ?? '' }}</span>
              <span style="font-size:6pt; color:#555;">{{ $unit }}</span>
            </span>
          @endforeach
        </div>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">2. Consciousness:</td></tr>
    <tr class="data-row">
      <td colspan="4">
        <div class="cb-group">
          @foreach(['Alert & Oriented','Drowsy','Unresponsive'] as $v)
            <span class="cb-item">
              {!! cbChecked(inArr($latestEntry->consciousness ?? null, $v)) !!} {{ $v }}
            </span>
          @endforeach
          <span class="cb-item">
            {!! cbChecked(inArr($latestEntry->consciousness ?? null, 'GCS')) !!}
            GCS:&nbsp;<span style="display:inline-block; min-width:16mm; border-bottom:0.5px solid #555;">{{ $latestEntry->consciousness_gcs ?? '' }}</span>
          </span>
        </div>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">3. Critical Investigations:</td></tr>
    <tr class="data-row alt">
      <td colspan="4" style="min-height:12mm;">
        {{ $latestEntry->critical_investigations ?? '' }}
        <span class="write-line"></span>
        <span class="write-line"></span>
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">4. Assessment Notes:</td></tr>
    <tr class="data-row">
      <td colspan="4" style="min-height:12mm;">
        {{ $latestEntry->assessment_notes ?? '' }}
        <span class="write-line"></span>
        <span class="write-line"></span>
      </td>
    </tr>

    <!-- ══ R — RECOMMENDATION ══ -->
    <tr class="sec-row"><td colspan="4">R &mdash; RECOMMENDATION</td></tr>

    <tr class="sub-row"><td colspan="4">1. Action Required:</td></tr>
    <tr class="data-row alt">
      <td colspan="4" style="padding:3px 5px;">
        @php
          $actions = [
            ['Continue monitoring',     'action_monitoring'],
            ['Inform doctor',           'action_doctor'],
            ['Medication review',       'action_medication'],
            ['Investigations',          'action_investigations'],
            ['Immediate escalation ↑',  'action_escalation'],
          ];
        @endphp
        @foreach($actions as [$label, $field])
          <div class="action-row">
            {!! cbChecked(inArr($latestEntry->action ?? null, $label)) !!}
            <strong>{{ $label }}:</strong>
            <span class="aval">{{ $latestEntry->$field ?? '' }}</span>
          </div>
        @endforeach
      </td>
    </tr>

    <tr class="sub-row"><td colspan="4">2. Recommendation / Plan:</td></tr>
    <tr class="data-row">
      <td colspan="4" style="min-height:14mm;">
        {{ $latestEntry->recommendation_plan ?? '' }}
        <span class="write-line"></span>
        <span class="write-line"></span>
        <span class="write-line"></span>
      </td>
    </tr>

  </table>

  <!-- ═══ SIGNATURE TABLE ═══ -->
  <table class="sig-table" style="margin-bottom:4px;">
    <thead>
      <tr>
        <th style="width:22%;">Role</th>
        <th style="width:30%;">Name &amp; Signature</th>
        <th style="width:18%;">Emp. ID</th>
        <th style="width:18%;">Date</th>
        <th style="width:12%;">Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="row-lbl">Handing Over Nurse</td>
        <td>{{ $latestEntry->handover_nurse_sig ?? '' }}</td>
        <td></td>
        <td>{{ $latestEntry->handover_nurse_date ?? '' }}</td>
        <td>{{ $latestEntry->handover_nurse_time ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Receiving Nurse</td>
        <td>{{ $latestEntry->receiving_nurse_sig ?? '' }}</td>
        <td></td>
        <td>{{ $latestEntry->receiving_nurse_date ?? '' }}</td>
        <td>{{ $latestEntry->receiving_nurse_time ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Verified By</td>
        <td>{{ $latestEntry->verified_sig ?? '' }}</td>
        <td></td>
        <td>{{ $latestEntry->verified_date ?? '' }}</td>
        <td>{{ $latestEntry->verified_time ?? '' }}</td>
      </tr>
    </tbody>
  </table>

  <!-- ═══ FOOTER ═══ -->
  <div class="footer">
    <span>AF/LES/ISBAR/v01/Jan2026 – ISBAR</span>
    <span>OFFICE COPY</span>
    <span>Print By: {{ auth()->user()->name ?? 'N/A' }}, {{ auth()->user()->emp_id ?? '' }}, {{ auth()->user()->designation ?? '' }} | Printed on: {{ now()->format('Y-m-d H:i:s') }}</span>
  </div>

</div><!-- /.page -->

</body>
</html>