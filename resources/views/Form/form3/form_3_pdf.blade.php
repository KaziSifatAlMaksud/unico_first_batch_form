<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Activity of Daily Living (ADL)</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 8pt;
    background: #ccc;
    display: flex;
    justify-content: center;
  }

  .page {
    width: 100%;
    min-height: 297mm;
    background: #fff;
    color: #000;
  }

  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 1.5px 4px; vertical-align: middle; font-size: 8pt; }

  .cb {
    display: inline-block;
    width: 8px; height: 8px;
    border: 1px solid #000;
    margin-right: 2px;
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
    padding: 3px 6px;
    font-weight: 700;
    font-size: 9pt;
    display: flex;
    align-items: center;
    gap: 5px;
    flex-shrink: 0;
  }

  .form-title {
    font-size: 15pt;
    font-weight: 900;
    text-align: center;
    letter-spacing: 0.5px;
    flex: 1;
    padding: 0 8px;
  }

  .patient-label-box {
    border: 1.5px solid #000;
    width: 55mm;
    padding: 2px 5px;
    font-size: 7pt;
    line-height: 1.65;
    flex-shrink: 0;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    border-bottom: 1px solid #000;
    margin-bottom: 2px;
    padding-bottom: 1px;
  }
  .patient-label-box .lb-row { border-bottom: 0.5px dotted #999; }

  /* ── Patient info ── */
  .patient-info {
    border: 1px solid #000;
    margin-bottom: 3px;
  }
  .patient-info .pi-head {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #d3d3d3;
    color: #000;
    font-weight: 700;
    font-size: 8.5pt;
    padding: 2px 5px;
  }

  .patient-info .pi-rows { padding: 2px 5px; }
  .patient-info .pi-row {
    display: flex;
    gap: 16px;
    border-bottom: 0.5px solid #ccc;
    padding: 1px 0;
    font-size: 8pt;
  }
  .patient-info .pi-row:last-child { border-bottom: none; }
  .pi-label { font-weight: 700; white-space: nowrap; }
  .pi-val { border-bottom: 1px solid #000; flex: 1; min-width: 30px; }

  /* ── Section headers ── */
  .sec-title {
      background: #d3d3d3;
    color: #000;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
  }
  .sec-subtitle {
    font-style: italic;
    font-size: 7pt;
    padding: 1px 5px;
    background: #f0f0f0;
    border-bottom: 1px solid #000;
  }

  /* ── ADL activity tables ── */
  .adl-table th {
    background: #d8d8d8;
    font-weight: 700;
    font-size: 7.5pt;
    text-align: center;
    padding: 2px 4px;
  }
  .adl-table td { font-size: 7.5pt; }
  .adl-table .act-col { width: 28%; font-weight: 700; }
  .adl-table .loa-col { width: 48%; }
  .adl-table .rem-col { width: 24%; }
  .adl-table tr:nth-child(even) td { background: #f9f9f9; }

  /* ── Functional Tolerance ── */
  .ft-table td { font-size: 7.5pt; }
  .ft-table .ft-label { font-weight: 700; background: #f0f0f0; white-space: nowrap; }

  /* ── Overall ADL ── */
  .overall-table td { font-size: 7.5pt; }
  .overall-table .ov-label { font-weight: 700; background: #f0f0f0; }

  /* ── Sign off ── */
  .signoff-table td { font-size: 8pt; padding: 3px 6px; }
  .signoff-table .s-label { font-weight: 700; background: #f0f0f0; }

  .footer { margin-top: 3px; font-size: 7pt; color: #444; }

  .section-wrap { border: 1px solid #000; margin-bottom: 3px; }

  /* ── Print ── */
  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { width: 210mm; min-height: 297mm; padding: 6mm 7mm; box-shadow: none; }
    @page { size: A4; margin: 0; }
  }
</style>
</head>
<body>
<div class="page">

         {{-- @if($latestEntry)
           <p>
                @foreach($latestEntry->toArray() as $key => $value)
                  
                        <strong>{{ $key }} :</strong> {{ $value }}
                 
                @endforeach
            </p>
            @else <p>No data found.</p>
         @endif --}}

  <!-- ═══ HEADER ═══ -->
  <div class="header">
           <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100"  class="logo-icon"> 
    <div class="form-title">ACTIVITY OF DAILY LIVING (ADL)</div>

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
  <div class="patient-info" style="margin-bottom:3px;">
    <div class="pi-head">
      <span><strong>PATIENT'S NAME:</strong> {{ $latestEntry->patient_name ?? '-' }}</span>
      <span>UHID: {{ $latestEntry->uhid ?? '-' }}</span>
    </div>
    <div class="pi-rows">
      <div class="pi-row">
        <span class="pi-label">Age:</span> {{ $latestEntry->age ?? '-' }} Years
        <span class="pi-label">Gender:</span> 
          @php
              $gender = $latestEntry->gender ?? '-';

              $genderText = match ($gender) {
                  'F' => 'Female',
                  'M' => 'Male',
                  'O' => 'Others',
                  default => '-',
              };
          @endphp

          {{ $genderText }}
        <span class="pi-label">Date of Assessment:</span> {{ $latestEntry->assessment_date  ?? '-' }}
        <span class="pi-label">Time:</span> {{ $latestEntry->assessment_time  ?? '-' }}
      </div>
      <div class="pi-row">
        <span class="pi-label">Height:</span>{{ $latestEntry->height_cm  ?? '-' }}<span>cm</span>
        <span class="pi-label">Weight:</span>{{ $latestEntry->weight_kg  ?? '-' }}<span>kg</span>
        <span class="pi-label">BMI:</span>{{ $latestEntry->bmi  ?? '-' }}
      </div>
      <div class="pi-row">
        <span class="pi-label">Location:</span>
        <span>{{ $latestEntry->location  ?? '-' }}</span>
      </div>
      <div class="pi-row">
        <span class="pi-label">Consultant:</span>{{ $latestEntry->consultant   ?? '-' }}
      </div>
    </div>
  </div>

  <!-- ═══ BASIC ADL ═══ -->
  <div class="section-wrap">
    <div class="sec-title">BASIC ADL (BADL)</div>
    <div class="sec-subtitle">Self-care (Derived from Barthel Index / Katz ADL)</div>
    <table class="adl-table">
      <thead>
        <tr>
          <th class="act-col">Activity</th>
          <th class="loa-col">Level of Assistance</th>
          <th class="rem-col">Remarks</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="act-col">Feeding / Eating</td>
          <td>
             {{ $latestEntry->badl_0_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td>{{ $latestEntry->badl_0_rem  ?? '-' }}</td>
        </tr>
        <tr>
          <td>Grooming (face, hair, etc)</td>
          <td>
            {{ $latestEntry->badl_1_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}    
          </td>
          <td> {{ $latestEntry->badl_1_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Oral Care / Brushing</td>
          <td>
            {{ $latestEntry->badl_2_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}    
          </td>
          <td> {{ $latestEntry->badl_2_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Bathing / Showering</td>
          <td>
            {{ $latestEntry->badl_3_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}    
          </td>
          <td> {{ $latestEntry->badl_3_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Dressing / Undressing</td>
          <td>
            {{ $latestEntry->badl_4_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}    
          </td>
          <td> {{ $latestEntry->badl_4_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Toileting / Commode</td>
          <td>
            {{ $latestEntry->badl_5_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}    
          </td>
          <td> {{ $latestEntry->badl_5_rem   ?? '-' }}</td>
        </tr>
        </tr>
        <tr>
          <td>Bladder &amp; Bowel control</td>
          <td>
            {{ $latestEntry->badl_6_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td>
              {{ $latestEntry->badl_6_rem   ?? '-' }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ MOBILITY ADL ═══ -->
  <div class="section-wrap">
    <div class="sec-title">MOBILITY-RELATED ADL</div>
    <div class="sec-subtitle">(Critical for post-CABG, valve surgery, elderly CR patients)</div>
    <table class="adl-table">
      <thead>
        <tr>
          <th class="act-col">Activity</th>
          <th class="loa-col">Level of Assistance</th>
          <th class="rem-col">Remarks</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Bed mobility (rolling)</td>
          <td>
            {{ $latestEntry->mob_0_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->mob_0_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Sit ↔ Stand</td>
          <td>
            {{ $latestEntry->mob_1_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->mob_1_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Transfer Bed → Chair</td>
          <td>
            {{ $latestEntry->mob_2_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->mob_2_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Walking / Ambulation</td>
          <td>
            {{ $latestEntry->mob_3_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->mob_3_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Stair Climbing</td>
          <td>
            {{ $latestEntry->mob_4_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->mob_4_rem   ?? '-' }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ INSTRUMENTAL ADL ═══ -->
  <div class="section-wrap">
    <div class="sec-title">Instrumental ADL (IADL)</div>
    <div class="sec-subtitle">(Lawton IADL – predicts CR adherence &amp; independence)</div>
    <table class="adl-table">
      <thead>
        <tr>
          <th class="act-col">Activity</th>
          <th class="loa-col">Level of Assistance</th>
          <th class="rem-col">Remarks</th>
        </tr>
      </thead>
      <tbody>
        <tr>

          <td>Using telephone</td>
          <td>
            {{ $latestEntry->iadl_0_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_0_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Medication management</td>
          <td>
            {{ $latestEntry->iadl_1_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_1_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Meal preparation</td>
          <td>
            {{ $latestEntry->iadl_2_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_2_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Light housework</td>
          <td>
            {{ $latestEntry->iadl_3_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_3_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Shopping</td>
          <td>
            {{ $latestEntry->iadl_4_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_4_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Handling finances</td>
          <td>
            {{ $latestEntry->iadl_5_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_5_rem   ?? '-' }}</td>
        </tr>
        <tr>
          <td>Transportation</td>
          <td>
            {{ $latestEntry->iadl_6_loa  ?? '-' }}

            {{-- <span class="cb"></span>Independent &nbsp;&nbsp;
            <span class="cb"></span>Partial &nbsp;&nbsp;
            <span class="cb"></span>Full Assistance --}}
          </td>
          <td> {{ $latestEntry->iadl_6_rem   ?? '-' }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ FUNCTIONAL TOLERANCE ═══ -->
  <div class="section-wrap">
    <div class="sec-title">FUNCTIONAL TOLERANCE DURING ADL</div>
    <table class="ft-table">
      <tr>
        <td class="ft-label" style="width:120px;">During ADL:</td>
        <td>
           {{ $latestEntry->ft_symptom  ?? '-' }} &nbsp;&nbsp;
        </td>
      </tr>
      <tr>
        <td class="ft-label">Patient Reports:</td>
          <td>
           {{ $latestEntry->patient_reports ?? '-' }}
          </td>
      </tr>
      <tr>
        <td class="ft-label">Borg RPE during ADL:</td>
        <td>
          {{ $latestEntry->borg_rpe  ?? '-' }}/ 20 &nbsp;&nbsp;&nbsp;
          <strong>Rest breaks needed:</strong> {{ $latestEntry->rest_breaks ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="ft-label">Assistive Devices / Support:</td>
        <td>
          <span class="cb"></span>None &nbsp;&nbsp;
          <span class="cb"></span>Caregiver assistance &nbsp;&nbsp;
          <span class="cb"></span>Walking aid &nbsp;&nbsp;
          <span class="cb"></span>Toilet aid &nbsp;&nbsp;
          <span class="cb"></span>Bath chair &nbsp;&nbsp;
          <span class="cb"></span>Others: …………………
        </td>
      </tr>
      <tr>
        <td class="ft-label">ADL Safety &amp; Risk</td>
        <td>
          Falls in last 6 months: <span class="cb"></span>Yes &nbsp;<span class="cb"></span>No &nbsp;&nbsp;&nbsp;
          Fear of falling: <span class="cb"></span>Yes &nbsp;<span class="cb"></span>No
        </td>
      </tr>
      <tr>
        <td></td>
        <td>Environmental barriers at home: <span class="cb"></span>Yes &nbsp;<span class="cb"></span>No</td>
      </tr>
      <tr>
        <td class="ft-label">Sleeping disturbance:</td>
        <td>
          <span class="cb"></span>Yes &nbsp;<span class="cb"></span>No &nbsp;&nbsp;&nbsp;
          Remarks: {{ $latestEntry->sleeping_disturbance_remarks ?? '-' }}
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ OVERALL ADL ═══ -->
  <div class="section-wrap">
    <div class="sec-title">OVERALL ADL STATUS &amp; RECOMMENDATION</div>
    <table class="overall-table">
      <tr>
        <td colspan="4">
          {{ $latestEntry->latestEntry ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="ov-label" style="width:130px;">Continue ADL Progression</td>
        <td>
            {{ $latestEntry->adl_prog   ?? '-' }} &nbsp;&nbsp;
        </td>
        <td class="ov-label" style="width:130px;">Remarks</td>
        <td>
            {{ $latestEntry->adl_prog_remarks   ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="ov-label">Recommendations</td>
        <td colspan="3">
            {{ $latestEntry->recommendation   ?? '-' }}
          {{-- <span class="cb"></span>Suitable for standard CR program &nbsp;&nbsp;
          <span class="cb"></span>Requires supervised / low-intensity CR &nbsp;&nbsp;
           <span class="cb"></span>Needs ADL-focused prehabilitation before CR --}}
        </td>
      </tr>
      <tr>
        <td class="ov-label">Patient / Family Education</td>
        <td colspan="3">
            {{ $latestEntry->education   ?? '-' }}
          {{-- <span class="cb"></span>Provided &nbsp;&nbsp;
          <span class="cb"></span>Pending &nbsp;&nbsp;
          <span class="cb"></span>Scheduled,  --}}
          
          <strong>Date:</strong> {{ $latestEntry->education_date ?? '-' }}
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="signoff-table" style="margin-bottom:3px;">
    <tr>
      <td class="s-label" style="width:200px;">Name &amp; Signature of the Physiotherapist</td>
      <td style="width:130px;" class="s-label">Date and Time</td>
    </tr>
    <tr>
      <td style="height:14mm; vertical-align:top;">{{ $latestEntry->physio_name  ?? '-' }} </td>
      <td style="vertical-align:top;">{{ $latestEntry->physio_datetime   ?? '-' }}</td>
    </tr>
    <tr>
      <td class="s-label">Verified by:</td>
      <td class="s-label">Emp. ID</td>
    </tr>
    <tr>
      <td style="height:10mm;">{{ $latestEntry->verified_by ?? '-' }} </td>
      <td>{{ $latestEntry->emp_id ?? '-' }}</td>
    </tr>
  </table>
  <br>
  <br>
  <div class="footer">CR/CRC/ADL/v01/Feb2026 – CR02</div>
   <div class="footer-ref">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>

</div>
</body>
</html>