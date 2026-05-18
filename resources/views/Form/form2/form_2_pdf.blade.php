<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pressure Sore Form (PSF)</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 9pt;
    background: #ccc;
    display: flex;
    justify-content: center;
  }

  .page {
    width: 100%;
    min-height: 297mm;
    background: #fff;
    padding: 8mm 8mm 6mm 8mm;
    color: #000;
  }

  /* ── Header ── */
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 4px;
  }

  .form-title {
    font-size: 16pt;
    font-weight: 900;
    letter-spacing: 1px;
    text-align: center;
    flex: 1;
  }

  /* Patient Label Box */
  .patient-label-box {
    border: 1.5px solid #000;
    width: 58mm;
    padding: 3px 5px;
    font-size: 7.5pt;
    line-height: 1.7;
    flex-shrink: 0;
  }
  .patient-label-box .label-title {
    text-align: center;
    font-weight: 700;
    border-bottom: 1px solid #000;
    margin-bottom: 2px;
    padding-bottom: 1px;
  }
  .patient-label-box .label-row { border-bottom: 0.5px dotted #888; }

  /* ── Patient Info Table ── */
  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 2px 4px; vertical-align: middle; }

  .section-header {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 9pt;
    padding: 2px 5px;
    letter-spacing: 0.5px;
  }

  .patient-info-table td { font-size: 8pt; }
  .patient-info-table .label-cell { font-weight: 700; white-space: nowrap; }

  /* Checkbox style */
  .cb {
    display: inline-block;
    width: 9px; height: 9px;
    border: 1px solid #000;
    margin-right: 2px;
    vertical-align: middle;
    position: relative;
    top: -1px;
  }

  /* ── Two-column detail section ── */
  .two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0 6px;
    margin-top: 5px;
  }

  .section-box { border: 1.5px solid #000; }

  .section-box .sec-title {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8.5pt;
    padding: 2px 5px;
    letter-spacing: 0.5px;
  }

  .detail-table td {
    font-size: 8pt;
    border: 1px solid #000;
    padding: 2px 4px;
    vertical-align: top;
  }
  .detail-table .row-label { font-weight: 700; width: 40%; }
  .detail-table .row-sub { padding-left: 14px; }
  .detail-table .value-cell { width: 60%; }

  /* Monitoring table */
  .monitor-table td {
    font-size: 8pt;
    border: 1px solid #000;
    padding: 2px 4px;
  }
  .monitor-table .row-label { font-weight: 700; }
  .monitor-table .opt-cell { white-space: nowrap; }

  /* Stage rows */
  .stage-row td { font-size: 7.5pt; border: 1px solid #000; padding: 1px 4px; }
  .stage-row.alt td { background: #f0f0f0; }
  .stage-unst td { background: #e8e8e8; font-style: italic; }
  .stage-report td { background: #fff; }
  .stage-icn td { background: #f5f5f5; }
  .stage-cns td { background: #fff; }

  /* Care table */
  .care-table td { font-size: 8pt; border: 1px solid #000; padding: 2px 4px; }
  .care-table .row-label { font-weight: 700; }

  /* Progress/Remarks tall row */
  /* .tall-cell { height: 22mm; vertical-align: top; } */
  .next-review-cell { height: 10mm; vertical-align: top; }

  /* ── Photo row ── */
  .photo-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 6px;
    margin-top: 5px;
  }
  .photo-box {
    border: 1px solid #000;
    text-align: center;
  }
  .photo-area {
    height: 28mm;
    border-bottom: 1px solid #000;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fafafa;
  }
  .photo-caption {
    font-size: 7.5pt;
    font-style: italic;
    padding: 2px 0;
  }

  /* ── Sign off ── */
  .signoff-table { margin-top: 5px; }
  .signoff-table td { font-size: 8.5pt; border: 1px solid #000; padding: 3px 6px; }
  .signoff-table .label-cell { font-weight: 700; background: #f0f0f0; width: 80px; }

  /* ── Footer ── */
  .footer {
    margin-top: 4px;
    font-size: 7pt;
    color: #333;
  }

  .photo-area img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border: 1px solid #ccc;
    border-radius: 6px;
}

  /* ── Print ── */
  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page {
      width: 210mm;
      min-height: 297mm;
      padding: 8mm;
      box-shadow: none;
    }
    @page { size: A4; margin: 0; }
  }
</style>
</head>
<body>


   
<div class="page">

     {{-- @if($latestEntry)

            @foreach($latestEntry->toArray() as $key => $value)

                <p>
                    <strong>{{ $key }} :</strong> {{ $value }}
                </p>

            @endforeach

        @else

            <p>No data found.</p>

    @endif --}}

  <!-- ═══ TOP HEADER ═══ -->
  <div class="header">
    <!-- Logo -->


       <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100"  class="logo-icon"> 


    <!-- Title -->
    <div class="form-title">PRESSURE SORE FORM (PSF)</div>

    <!-- Patient Label -->
    <div class="patient-label-box">
      <div class="label-title">PATIENT LABEL</div>
      <div class="label-row">Invoice No:……………………………</div>
      <div class="label-row">UHID:…………………………………</div>
      <div class="label-row">Patient name:……………………………</div>
      <div class="label-row">Consultant name:………………………</div>
      <div class="label-row">Age:….Day……Month………Year……</div>
      <div class="label-row">Mobile no:……………………………</div>
    </div>
  </div>

  <!-- ═══ PATIENT INFO ═══ -->
  <table class="patient-info-table" style="margin-top:4px;">
    <tr>
      <td style="background:#000;color:#fff;font-weight:2000;font-size:9pt;padding:2px 5px;" colspan="3"><strong>PATIENT NAME: &nbsp; {{ $latestEntry->patient_name ?? '-' }}</strong></td>
      <td style="background:#000;color:#fff;font-weight:2000;font-size:9pt;padding:2px 5px;" colspan="3"><strong>UHID: &nbsp;</strong> {{ $latestEntry->uhid ?? '-' }}</td>
    </tr>
    <tr>
      <td class="label-cell" style="width:100px;">Patient's location</td>
     <td colspan="5">

    <strong>Location:</strong>

    @if(strtolower($latestEntry->location) == 'others')
        {{ $latestEntry->location ?? '-' }} - {{ $latestEntry->location_other ?? '-' }}
    @else
        {{ $latestEntry->location ?? '-' }}
    @endif

    &nbsp;&nbsp;&nbsp;

    <strong>Bed No:</strong>
    {{ $latestEntry->bed_no ?? '-' }}

</td>
    </tr>
    <tr>
      <td class="label-cell">Date of Admission:</td>
      <td style="width:90px;"  colspan="2">{{ $latestEntry->admission_date  ?? '-' }}</td>
      <td class="label-cell" style="width:120px;">Primary Diagnosis:</td>
      <td colspan="2">{{ $latestEntry->primary_diagnosis ?? '-' }}</td>
    </tr>
    <tr>
      <td class="label-cell">Mobility Status:</td>
      <td colspan="3">
        {{ $latestEntry->mobility ?? '-' }}
      </td>
      <td class="label-cell" style="width:120px;">Nutritional status:</td>
      <td>
        {{ $latestEntry->nutrition  ?? '-' }}
      </td>
    </tr>
  </table>

  <!-- ═══ TWO-COLUMN SECTION ═══ -->
  <div class="two-col">

    <!-- LEFT: Pressure Sore Details -->
    <div class="section-box">
      <div class="sec-title">PRESSURE SORE DETAILS</div>
      <table class="detail-table">
        <tr>
          <td class="row-label">Date and time of detection</td>
          <td class="value-cell">{{ $latestEntry->detection_datetime  ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Location(s) of sore(s) <span style="font-weight:400;">(e.g., sacrum)</span></td>
          <td class="value-cell">{{ $latestEntry->sore_locations ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-label">Size <span style="font-weight:400;">(length × width × depth):</span></td>
          <td class="value-cell">
                {{ $latestEntry->size_l ?? '-' }} × 
                {{ $latestEntry->size_w ?? '-' }} × 
                {{ $latestEntry->size_d ?? '-' }}

                @if($latestEntry->size_l && $latestEntry->size_w && $latestEntry->size_d)
                    <br>
                    <small>
                        Total Size:
                        {{
                            $latestEntry->size_l *
                            $latestEntry->size_w *
                            $latestEntry->size_d
                        }} cm³
                    </small>
                @endif
            </td>
        </tr>
        <tr>
          <td class="row-label" colspan="2">Appearance / Characteristics:</td>
        </tr>
        <tr>
          <td class="row-sub" >– Color (red, yellow, black) : </td>
          <td class="row-sub" >{{ $latestEntry->color ?? '-' }} </td>
        </tr>
        <tr>
          <td class="row-sub" >– Exudate / discharge</td>
          <td class="row-sub" >{{ $latestEntry->exudate ?? '-' }} </td>
        </tr>
        <tr>
          <td class="row-sub" >– Odor</td>
          <td class="row-sub" >{{ $latestEntry->odor ?? '-' }} </td>
        </tr>
        <tr>
          <td class="row-sub" >– Surrounding skin condition</td>
          <td class="row-sub" >{{ $latestEntry->skin_cond  ?? '-' }} </td>
        </tr>
        <tr>
          <td class="row-label" colspan="2">
            <strong>Stage / Grade</strong><br>
            <span style="font-weight:400;">(NPUAP/EPUAP classification):</span>
          </td>
        </tr>
       <tr class="stage-row">
            <td colspan="2">
                @if($latestEntry->stage == 'Stage I')
                    <span style="text-decoration: line-through;">
                        Stage I: Non-blanchable erythema
                    </span>
                @else
                    Stage I: Non-blanchable erythema
                @endif
            </td>
        </tr>

        <tr class="stage-row alt">
            <td colspan="2">
                @if($latestEntry->stage == 'Stage II')
                    <span style="text-decoration: line-through;">
                        Stage II: Partial thickness skin loss
                    </span>
                @else
                    Stage II: Partial thickness skin loss
                @endif
            </td>
        </tr>

        <tr class="stage-row">
            <td colspan="2">
                @if($latestEntry->stage == 'Stage III')
                    <span style="text-decoration: line-through;">
                        Stage III: Full thickness skin loss
                    </span>
                @else
                    Stage III: Full thickness skin loss
                @endif
            </td>
        </tr>

        <tr class="stage-row alt">
            <td colspan="2">
                @if($latestEntry->stage == 'Stage IV')
                    <span style="text-decoration: line-through;">
                        Stage IV: Full thickness tissue loss
                    </span>
                @else
                    Stage IV: Full thickness tissue loss
                @endif
            </td>
        </tr>

        <tr class="stage-unst">
            <td colspan="2">
                @if($latestEntry->stage == 'Unstageable')
                    <span style="text-decoration: line-through;">
                        Unstageable: Suspected deep tissue injury
                    </span>
                @else
                    Unstageable: Suspected deep tissue injury
                @endif
            </td>
        </tr>
        <tr class="stage-report">
          <td>Reported by</td>
          <td>{{ $latestEntry->reported_by  ?? '-' }}</td>
        </tr>
        <tr class="stage-icn">
          <td >Reviewed by ICN (In-charge Nurse)</td>
          <td>{{ $latestEntry->reviewed_by_icn   ?? '-' }}</td>
        </tr>
        <tr class="stage-cns">
          <td >Note to – CNS (Chief of Nursing)</td>
          <td>{{ $latestEntry->note_cns    ?? '-' }}</td>
        </tr>
      </table>
    </div>

    <!-- RIGHT: Monitoring + Care -->
    <div>
      <!-- Pressure Sore Monitoring -->
      <div class="section-box" style="margin-bottom:6px;">
        <div class="sec-title">PRESSURE SORE MONITORING</div>
        <table class="monitor-table">
          <tr>
            <td class="row-label">Repositioning schedule:</td>
            <td colspan="3">{{ $latestEntry->repo_schedule   ?? '-' }}</td>
            
          </tr>
          <tr>
            <td class="row-label">Pressure-relieving devices used:</td>
            <td colspan="3">{{ $latestEntry->pressure_device     ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Wound care / Dressing type:</td>
            <td colspan="3">{{ $latestEntry->dressing_type     ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Topical medications:</td>
            <td colspan="3">{{ $latestEntry->topical_meds    ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Wound care team consulted:</td>
            <td colspan="3">{{ $latestEntry->wc_team     ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Pain score (0–10):</td>
            <td colspan="3">{{ $latestEntry->pain_score   ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Pain characteristics:</td>
            <td colspan="3">{{ $latestEntry->pain_char   ?? '-' }}</td>
          </tr>
        </table>
      </div>

      <!-- Pressure Sore Care -->
      <div class="section-box">
        <div class="sec-title">PRESSURE SORE CARE</div>
        <table class="care-table">
          <tr>
            <td class="row-label">Frequency of assessment:</td>
            <td colspan="3">{{ $latestEntry->freq_assessment    ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Progress:</td>
            <td colspan="3">{{ $latestEntry->progress    ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label" style="vertical-align:top;">Progress Note:</td>
            <td colspan="3" >{{ $latestEntry->progress_note  ?? '-' }}</td>
        
          </tr>
          <tr>
              <td  class="row-label" style="vertical-align:top;">Remarks</td>
              <td colspan="3" >{{ $latestEntry->remarks   ?? '-' }}</td>
          </tr>
          <tr>
            <td class="row-label">Next Review Date:</td>
            <td colspan="3" class="next-review-cell">{{ $latestEntry->next_review_date  ?? '-' }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <!-- ═══ PHOTOS ═══ -->
    <div class="photo-row">
      
      <div class="photo-box">
        <div class="photo-area">
          @if($latestEntry->wound_photo_1)
            <img src="{{ asset('storage/' . $latestEntry->wound_photo_1) }}" alt="Photo 1">
          @endif
        </div>
        <div class="photo-caption">Wound Photo (In &lt;3 months)</div>
      </div>

      <div class="photo-box">
        <div class="photo-area">
          @if($latestEntry->wound_photo_2)
            <img src="{{ asset('storage/' . $latestEntry->wound_photo_2) }}" alt="Photo 2">
          @endif
        </div>
        <div class="photo-caption">Wound Photo (During last dressing)</div>
      </div>

      <div class="photo-box">
        <div class="photo-area">
          @if($latestEntry->wound_photo_3)
            <img src="{{ asset('storage/' . $latestEntry->wound_photo_3) }}" alt="Photo 3">
          @endif
        </div>
        <div class="photo-caption">Wound Photo (Current)</div>
      </div>

    </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="signoff-table">
    <tr>
      <td class="label-cell">Sign off</td>
      <td>{{ $latestEntry->signoff_name  ?? '-' }}  -  {{ $latestEntry->signoff_emp_id  ?? '-' }}</td>
    </tr>
    <tr>
      <td class="label-cell">Verified by</td>
      <td>{{ $latestEntry->verified_by ?? '-' }} with Emp. ID {{ $latestEntry->verified_emp_id  ?? '-' }}</td>
    </tr>
  </table>

  <!-- ═══ FOOTER ═══ -->
  <br>
  <br>
  <div class="footer">NF/NAF/PSF/v01/Feb26 – NF13</div>
  <div class="footer-ref">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>


</div>
</body>
</html>