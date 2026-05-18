<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Peripheral Intra-Venous Cannula Monitoring (PIVC)</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 7.5pt;
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
  td, th { border: 1px solid #000; padding: 1.5px 3px; vertical-align: middle; font-size: 7.5pt; }

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
    width: 52mm;
    padding: 2px 4px;
    font-size: 7pt;
    line-height: 1.6;
    flex-shrink: 0;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    border-bottom: 1px solid #000;
    margin-bottom: 2px;
    padding-bottom: 1px;
    font-size: 7.5pt;
  }
  .patient-label-box .lb-row { border-bottom: 0.5px dotted #999; }

  /* ── Patient name bar ── */
  .name-bar {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
  }

  .section-wrap { border: 1px solid #000; margin-bottom: 3px; }
  .info-table td { font-size: 7.5pt; padding: 1.5px 3px; }
  .lbl { font-weight: 700; white-space: nowrap; }

  /* ── Two-column checklist layout ── */
  .two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0 4px;
    margin-bottom: 3px;
  }

  /* ── Section title ── */
  .sec-title {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 1.5px 5px;
  }
  .sub-title {
    background: #d0d0d0;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 1px 4px;
  }

  /* Checklist table */
  .chk-table td { font-size: 7.5pt; padding: 1.5px 3px; border: 1px solid #000; }
  .chk-table .row-label { width: 60%; }
  .chk-table .opt { width: 13%; text-align: center; }
  .chk-table tr:nth-child(even) td { background: #f8f8f8; }
  .chk-table .sub-hdr td { background: #d8d8d8; font-weight: 700; }
  .chk-table .green-hdr td { background: #e8e8e8; font-weight: 700; font-style: italic; }

  /* ── Assessment chart ── */
  .chart-table th {
    background: #d0d0d0;
    font-weight: 700;
    font-size: 7pt;
    text-align: center;
    padding: 2px 2px;
    border: 1px solid #000;
  }
  .chart-table td {
    font-size: 7pt;
    text-align: center;
    padding: 2px 1px;
    border: 1px solid #000;
    height: 7mm;
  }
  .chart-table .row-lbl {
    text-align: left;
    font-weight: 700;
    background: #f0f0f0;
    width: 36px;
    padding: 1px 3px;
  }
  .chart-table .date-row td { background: #fff; height: 6mm; }

  /* sign off */
  .signoff-table td { font-size: 8pt; padding: 3px 5px; }
  .signoff-table .s-label { font-weight: 700; background: #f0f0f0; width: 70px; }

  .footer { margin-top: 3px; font-size: 6.5pt; color: #444; }

  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { width: 210mm; min-height: 297mm; padding: 5mm 6mm; box-shadow: none; }
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
    <div class="logo-block">
        <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100"  class="logo-icon"> 
    </div>

    <div class="form-title">PERIPHERAL INTRA-VENOUS CANNULA<br>MONITORING (PIVC)</div>

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

  <!-- ═══ PATIENT NAME + INFO ═══ -->
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="name-bar">
      <span>PATIENT NAME: &nbsp;&nbsp;  {{ $latestEntry->patient_name ?? '-' }}</span> 
      <span>UHID: &nbsp; &nbsp; {{ $latestEntry->uhid ?? '-' }}</span>
    </div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:90px;">Patient's location</td>
        <td> @if ($latestEntry->location  == 'Others')
                  {{ $latestEntry->location_other   ?? '-' }}
            @else
                     {{ $latestEntry->location  ?? '-' }} 
            @endif

        </td>
      </tr>
      <tr>
        <td class="lbl">Date of IV Cannula Insertion:</td>
        <td>
          {{ $latestEntry->cannula_date  ?? '-' }}&nbsp;&nbsp; <strong>Time:</strong> {{ $latestEntry->cannula_time  ?? '-' }} &nbsp;&nbsp;
          <strong>Primary Diagnosis:</strong> {{ $latestEntry->primary_diagnosis ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="lbl">Site of Insertion:</td>
        <td>
         {{ $latestEntry->site == 'Others' 
            ? ($latestEntry->site_other ?? '-') 
            : ($latestEntry->site ?? '-') 
        }}&nbsp; &nbsp;
              {{ $latestEntry->indication  == 'Others' 
                    ? ($latestEntry->indication_other  ?? '-') 
                    : ($latestEntry->indication  ?? '-') 
                }}
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ TWO COLUMN: CHECKLIST + REMOVAL/CARE ═══ -->
  <div class="two-col">

    <!-- LEFT: PIVC Checklist -->
    <div class="section-wrap" style="margin-bottom:0;">
      <div class="sec-title">PIVC CHECKLIST</div>
      <table class="chk-table">
        <tr class="sub-hdr"><td colspan="4">PIVC Insertion</td></tr>
        <tr>
          <td class="row-label">Aseptic technique used</td>
          <td class="opt" colspan="3">{{ $latestEntry->aseptic_technique ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">A topical anesthetic considered</td>
          <td class="opt" colspan="3">{{ $latestEntry->topical_anesthetic  ?? '-' }}</td>
        </tr>
        <tr class="sub-hdr"><td colspan="4">Dressings</td></tr>
        <tr>
          <td class="row-label">Transparent film used at the insertion site</td>
            <td class="opt" colspan="3">{{ $latestEntry->transparent_film  ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">A sterile compress used if blood or exudate</td>
          <td class="opt" colspan="3">{{ $latestEntry->sterile_compress   ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Dressing change if wet, dirty or peeling off</td>
          <td class="opt" colspan="3">{{ $latestEntry->dressing_change ?? '-' }}</td>
        </tr>
        <tr class="sub-hdr"><td colspan="4">Inspection</td></tr>
        <tr>
          <td class="row-label">Inspection schedule</td>
              <td class="opt" colspan="3">{{ $latestEntry->inspection_schedule ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Hand hygiene before and after contact</td>
          <td class="opt" colspan="3">{{ $latestEntry->hand_hygiene  ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Aseptic technique is used during care</td>
            <td class="opt" colspan="3">{{ $latestEntry->aseptic_care   ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">PIVC patency checked</td>
            <td class="opt" colspan="3">{{ $latestEntry->pivc_patency   ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">PIVCs are flushed and locked after use</td>
            <td class="opt" colspan="3">{{ $latestEntry->pivc_flushed   ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Unused PIVC flushed once per shift</td>
            <td class="opt" colspan="3">{{ $latestEntry->unused_flushed    ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Saline solution used in PIVC flush</td>
           <td class="opt" colspan="3">{{ $latestEntry->saline_flush     ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Amount of flush solution</td>
          <td class="opt" colspan="3">{{ $latestEntry->flush_amount      ?? '-' }}</td>
        </tr>
        <tr class="green-hdr"><td colspan="4">Pain score (0–10): &nbsp; &nbsp; {{ $latestEntry->pain_score ?? '-' }}  </td></tr>
        <tr class="green-hdr"><td colspan="4">Reported by RN: &nbsp; &nbsp;{{ $latestEntry->reported_rn ?? '-' }} </td></tr>
        <tr class="green-hdr"><td colspan="4">Reviewed by ICN: &nbsp; &nbsp;{{ $latestEntry->reviewed_icn  ?? '-' }} </td></tr>
        <tr class="green-hdr"><td colspan="4">Note by – Nursing Administrator: &nbsp; &nbsp; {{ $latestEntry->note_admin  ?? '-' }} </td></tr>
      </table>
    </div>

    <!-- RIGHT: PIVC Removal + PIVC Care -->
    <div>
      <div class="section-wrap" style="margin-bottom:4px;">
        <div class="sec-title">PIVC REMOVAL</div>
        <table class="chk-table">
          <tr>
            <td class="row-label">Remove: as no clinical indication</td>
            <td class="opt">{{ $latestEntry->remove_no_indication    ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Remove due to malfunction</td>
         <td class="opt">{{ $latestEntry->remove_malfunction     ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Remove as it shows signs of phlebitis</td>
            <td class="opt">{{ $latestEntry->remove_phlebitis       ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">After removal firm pressure exerted</td>
            <td class="opt">{{ $latestEntry->firm_pressure        ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Replacement done at a new site</td>
            <td class="opt">{{ $latestEntry->replacement_new_site    ?? '-' }}</td>
          </tr>
          <tr class="sub-hdr"><td colspan="4">Removal Note</td></tr>
          <tr>
            <td class="row-label">Integrity of PIVC checked after removal</td>           
            <td class="opt">{{ $latestEntry->integrity_checked     ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Date and time of PIVC removal</td>
            <td colspan="3">{{ $latestEntry->removal_date ?? '-' }} {{ $latestEntry->removal_time ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Reason for PIVC removal</td>
            <td colspan="3">{{ $latestEntry->removal_reason  ?? '-' }}</td>
          </tr>
        </table>
      </div>

      <div class="section-wrap">
        <div class="sec-title">PIVC CARE</div>
        <table class="chk-table">
          <tr>
            <td class="row-label">Frequency of assessment:</td>
          <td colspan="4">{{ $latestEntry->freq_assessment   ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Date of insertion marked</td>
            <td colspan="4">{{ $latestEntry->date_marked    ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Any swelling, pain, tenderness</td>
            <td colspan="4">{{ $latestEntry->swelling_pain   ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Breach of sterility</td>
            <td colspan="4">{{ $latestEntry->breach_sterility   ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Complication during insertion</td>
            <td colspan="4">{{ $latestEntry->complication  ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Multiple puncture needed</td>
            <td colspan="4">{{ $latestEntry->multi_puncture ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Insertion site changed</td>
            <td colspan="4">{{ $latestEntry->site_changed   ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Expert help needed</td>
            <td colspan="3">{{ $latestEntry->expert_help    ?? '-' }}</td>
            <td colspan="2"> <strong> Name: </strong>  {{ $latestEntry->expert_name ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Next Review Date:</td>
            <td colspan="4">{{ $latestEntry->next_review  ?? '-' }}</td> 
          </tr>
        </table>
      </div>
    </div>
  </div>

  <!-- ═══ PIVC ASSESSMENT CHART ═══ -->
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="sec-title">PIVC ASSESSMENT CHART &nbsp;<span style="font-weight:400;font-size:7pt;">(Plz tick ✓)</span></div>
    <table class="chart-table">
      <thead>
        <tr>
          <th class="row-lbl" rowspan="2" style="text-align:left;">Date:</th>
          <th colspan="3">Morning / Evening / Night</th>
          <th colspan="3">Morning / Evening / Night</th>
          <th colspan="3">Morning / Evening / Night</th>
          <th colspan="3">Morning / Evening / Night</th>
          <th colspan="3">Morning / Evening / Night</th>
        </tr>
        <tr>
          <th>Mng</th><th>Eve</th><th>Ngt</th>
          <th>Mng</th><th>Eve</th><th>Ngt</th>
          <th>Mng</th><th>Eve</th><th>Ngt</th>
          <th>Mng</th><th>Eve</th><th>Ngt</th>
          <th>Mng</th><th>Eve</th><th>Ngt</th>
        </tr>
      </thead>
      <tbody>
        <tr class="date-row">
          <td class="row-lbl">Date</td>
          <td colspan="3"></td>
          <td colspan="3"></td>
          <td colspan="3"></td>
          <td colspan="3"></td>
          <td colspan="3"></td>
        </tr>
        <tr>
          <td class="row-lbl">Patency</td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
        </tr>
        <tr>
          <td class="row-lbl">Flush</td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
        </tr>
        <tr>
          <td class="row-lbl">Lock</td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
        </tr>
        <tr>
          <td class="row-lbl">Sign</td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
          <td></td><td></td><td></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="signoff-table" style="margin-bottom:3px;">
    <tr>
      <td class="s-label">Sign off</td>
      <td>Assigned ICN with Emp. ID</td>
    </tr>
    <tr style="height:11mm;">
      <td class="s-label">Verified by</td>
      <td>with Emp. ID</td>
    </tr>
  </table>

  <div class="footer">NF/NAF/PIVC/v02/Apr2026– NF07</div>
  <div class="footer">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>


</div>
</body>
</html>