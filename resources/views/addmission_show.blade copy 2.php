<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Report</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #222;
            background: #f0f0f0;
            padding: 24px;
        }

        .print-btn {
            display: block;
            margin: 0 auto 20px;
            padding: 10px 28px;
            background: #1a3a5c;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
        .print-btn:hover { background: #14305a; }

        #report {
            max-width: 860px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ccc;
            padding: 32px;
        }

        /* Hospital Header */
        .report-top {
            text-align: center;
            border-bottom: 2px solid #1a3a5c;
            padding-bottom: 14px;
            margin-bottom: 20px;
        }
        .report-top h1 {
            font-size: 20px;
            color: #1a3a5c;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .report-top p {
            font-size: 12px;
            color: #555;
            margin-top: 4px;
        }
        .report-top .report-title {
            font-size: 15px;
            font-weight: bold;
            margin-top: 10px;
            color: #222;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        /* Section */
        .section { margin-bottom: 20px; }
        .section-title {
            background: #1a3a5c;
            color: #fff;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 0;
        }

        table { width: 100%; border-collapse: collapse; }
        td {
            padding: 7px 12px;
            border: 1px solid #ddd;
            font-size: 13px;
            vertical-align: top;
        }
        td.label {
            width: 35%;
            background: #f5f5f5;
            font-weight: bold;
            color: #444;
        }

        /* Two column layout */
        .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        /* Vitals row */
        .vitals-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            border: 1px solid #ddd;
        }
        .vital-box {
            text-align: center;
            padding: 12px 6px;
            border-right: 1px solid #ddd;
        }
        .vital-box:last-child { border-right: none; }
        .vital-box .v-label { font-size: 11px; color: #666; margin-bottom: 4px; }
        .vital-box .v-val { font-size: 20px; font-weight: bold; color: #1a3a5c; }
        .vital-box .v-unit { font-size: 11px; color: #888; margin-top: 2px; }

        /* Footer */
        .report-footer {
            border-top: 1px solid #ccc;
            margin-top: 28px;
            padding-top: 14px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #666;
        }
        .sig { text-align: center; }
        .sig-line {
            border-top: 1px solid #888;
            margin-top: 28px;
            padding-top: 4px;
            font-size: 11px;
            color: #555;
            min-width: 160px;
        }
        .sigs { display: flex; gap: 40px; align-items: flex-end; }

        @media print {
            @page { size: A4; margin: 14mm 12mm; }
            body { background: #fff; padding: 0; font-size: 13px; }
            .print-btn { display: none; }
            #report { border: none; padding: 0; max-width: 100%; }
            .section-title {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            td.label {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .section { break-inside: avoid; }
        }
    </style>
</head>
<body>

<button class="print-btn align-end" onclick="window.print()">🖨 Print / Save as PDF</button>

<div id="report">

    <!-- Header Info + GCS side by side -->
    <div class="two-col" style="margin-bottom:20px;">

        <div class="section" style="margin:0;">
            <div class="section-title">Header Information</div>
            <table>
                <tr><td class="label">Admission ID</td><td>{{ $admission->admission_id }}</td></tr>
                <tr><td class="label">Patient ID</td><td>{{ $admission->patient_id }}</td></tr>
                <tr><td class="label">Admission Date</td><td>{{ $admission->admission_date }}</td></tr>
                <tr><td class="label">Initiated At</td><td>{{ $admission->initiated_at }}</td></tr>
                <tr><td class="label">Admission Method</td><td>{{ $admission->admission_method }}</td></tr>
                <tr><td class="label">Bystander Present</td><td>{{ $admission->bystander_present }}</td></tr>
            </table>
        </div>

        <div class="section" style="margin:0;">
            <div class="section-title">GCS Assessment</div>
            <table>
                <tr><td class="label">GCS Eyes</td><td>{{ $admission->gcs_eyes }}</td></tr>
                <tr><td class="label">GCS Verbal</td><td>{{ $admission->gcs_verbal }}</td></tr>
                <tr><td class="label">GCS Motor</td><td>{{ $admission->gcs_motor }}</td></tr>
                <tr>
                    <td class="label">GCS Total</td>
                    <td><strong>{{ ($admission->gcs_eyes ?? 0) + ($admission->gcs_verbal ?? 0) + ($admission->gcs_motor ?? 0) }} / 15</strong></td>
                </tr>
            </table>
        </div>

    </div>

    <!-- Vital Signs -->
    <div class="section">
        <div class="section-title">Vital Signs</div>
        <div class="vitals-row">
            <div class="vital-box">
                <div class="v-label">Temperature</div>
                <div class="v-val">{{ $admission->temp_fahrenheit }}</div>
                <div class="v-unit">°F</div>
            </div>
            <div class="vital-box">
                <div class="v-label">Pulse Rate</div>
                <div class="v-val">{{ $admission->pulse_per_min }}</div>
                <div class="v-unit">/min</div>
            </div>
            <div class="vital-box">
                <div class="v-label">Resp. Rate</div>
                <div class="v-val">{{ $admission->resp_rate_per_min }}</div>
                <div class="v-unit">/min</div>
            </div>
            <div class="vital-box">
                <div class="v-label">Blood Pressure</div>
                <div class="v-val" style="font-size:16px;">{{ $admission->bp_systolic }}/{{ $admission->bp_diastolic }}</div>
                <div class="v-unit">mmHg</div>
            </div>
            <div class="vital-box">
                <div class="v-label">SpO₂</div>
                <div class="v-val">{{ $admission->spo2_percent }}</div>
                <div class="v-unit">%</div>
            </div>
        </div>
    </div>

    <!-- General Information -->
    <div class="section">
        <div class="section-title">General Information</div>
        <table>
            <tr><td class="label">General Condition</td><td>{{ $admission->general_condition }}</td></tr>
            <tr><td class="label">Respiratory Support</td><td>{{ $admission->respiratory_support }}</td></tr>
            <tr><td class="label">Respiratory Support Detail</td><td>{{ $admission->respiratory_support_detail }}</td></tr>
            <tr><td class="label">Ventilation Type</td><td>{{ $admission->ventilation_type }}</td></tr>
            <tr><td class="label">Mother Tongue</td><td>{{ $admission->mother_tongue }}</td></tr>
            <tr><td class="label">Can Speak</td><td>{{ $admission->can_speak }}</td></tr>
            <tr><td class="label">Has Lines / Drains</td><td>{{ $admission->has_lines_drains }}</td></tr>
            <tr><td class="label">Height</td><td>{{ $admission->height_cm }} cm</td></tr>
            <tr><td class="label">Weight</td><td>{{ $admission->weight_kg }} kg</td></tr>
            <tr><td class="label">Cultural Needs</td><td>{{ $admission->cultural_needs }}</td></tr>
            <tr><td class="label">Allergies</td><td>{{ $admission->allergies }}</td></tr>
            <tr><td class="label">Pain Present</td><td>{{ $admission->pain_present }}</td></tr>
        </table>
    </div>

    <!-- Orientation + Personal Aids side by side -->
    <div class="two-col" style="margin-bottom:20px;">

        <div class="section" style="margin:0;">
            <div class="section-title">Orientation</div>
            <table>
                <tr><td class="label">Side Rails Oriented</td><td>{{ $admission->oriented_side_rails }}</td></tr>
                <tr><td class="label">Privacy Oriented</td><td>{{ $admission->oriented_privacy }}</td></tr>
                <tr><td class="label">Visitor Policy Oriented</td><td>{{ $admission->oriented_visitor_policy }}</td></tr>
            </table>
        </div>

        <div class="section" style="margin:0;">
            <div class="section-title">Personal Aids</div>
            <table>
                <tr><td class="label">Dentures</td><td>{{ $admission->dentures }}</td></tr>
                <tr><td class="label">Eyewear</td><td>{{ $admission->eyewear }}</td></tr>
                <tr><td class="label">Hearing Aid</td><td>{{ $admission->hearing_aid }}</td></tr>
            </table>
        </div>

    </div>

    <!-- DVT + System Info side by side -->
    <div class="two-col">

        <div class="section" style="margin:0;">
            <div class="section-title">DVT Assessment</div>
            <table>
                <tr><td class="label">DVT Wells Total</td><td>{{ $admission->dvt_wells_total }}</td></tr>
                <tr><td class="label">DVT Risk Level</td><td>{{ $admission->dvt_risk_level }}</td></tr>
            </table>
        </div>

        <div class="section" style="margin:0;">
            <div class="section-title">System Information</div>
            <table>
                <tr><td class="label">Created By</td><td>{{ $admission->created_by }}</td></tr>
                <tr><td class="label">Created At</td><td>{{ $admission->created_at }}</td></tr>
                <tr><td class="label">Updated At</td><td>{{ $admission->updated_at }}</td></tr>
            </table>
        </div>

    </div>

    <!-- Footer -->
    <div class="report-footer">
        <div>
            <div>Unico Hospital PLC &nbsp;·&nbsp; 23 Bir Uttam K. M. Shafiullah Sarak (Green Road) Dhaka-1205, Bangladesh</div>
            <div style="margin-top:3px;">Printed on: <script>document.write(new Date().toLocaleDateString('en-GB',{day:'2-digit',month:'short',year:'numeric'}))</script></div>
        </div>
        <div class="sigs">
            <div class="sig"><div class="sig-line">Admitting Nurse</div></div>
            <div class="sig"><div class="sig-line">Duty Doctor</div></div>
            <div class="sig"><div class="sig-line">Consultant</div></div>
        </div>
    </div>

</div>

</body>
</html>