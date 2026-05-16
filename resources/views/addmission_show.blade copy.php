<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admission Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0f2342;
            --teal: #1a6b72;
            --accent: #c8963e;
            --light-bg: #f5f7fa;
            --border: #d8dde6;
            --text: #1e2a38;
            --muted: #6b7a8d;
            --white: #ffffff;
            --label-bg: #eef1f6;
            --section-header: #1a3a5c;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Source Sans 3', sans-serif;
            background: var(--light-bg);
            color: var(--text);
            padding: 24px;
            font-size: 14px;
        }

        /* ── SCREEN TOOLBAR ── */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--navy);
            color: #fff;
            padding: 14px 24px;
            border-radius: 10px;
            margin-bottom: 28px;
            gap: 12px;
            flex-wrap: wrap;
        }
        .toolbar h1 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            letter-spacing: 0.3px;
            color: #fff;
            border: none;
            padding: 0;
            margin: 0;
        }
        .toolbar-actions { display: flex; gap: 10px; flex-wrap: wrap; }
        .btn {
            padding: 9px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-family: 'Source Sans 3', sans-serif;
            font-size: 13px;
            font-weight: 600;
            transition: opacity .2s, transform .1s;
        }
        .btn:hover { opacity: .85; transform: translateY(-1px); }
        .btn-print  { background: var(--accent); color: #fff; }
        .btn-full   { background: #2d6a4f; color: #fff; }
        .btn-compact{ background: #555e6c; color: #fff; }

        /* ── REPORT WRAPPER ── */
        #report {
            max-width: 1100px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 28px rgba(0,0,0,.10);
        }

        /* ── REPORT HEADER BANNER ── */
        .report-header {
            background: linear-gradient(135deg, var(--navy) 0%, var(--section-header) 60%, var(--teal) 100%);
            color: #fff;
            padding: 30px 36px 24px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            flex-wrap: wrap;
        }
        .report-header .hospital-name {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            letter-spacing: .5px;
            line-height: 1.1;
        }
        .report-header .hospital-sub {
            font-size: 12px;
            color: rgba(255,255,255,.65);
            margin-top: 4px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }
        .report-header .report-meta {
            text-align: right;
            font-size: 12px;
            color: rgba(255,255,255,.8);
            line-height: 1.8;
        }
        .report-header .report-meta strong {
            color: var(--accent);
            font-size: 18px;
            display: block;
            font-family: 'Playfair Display', serif;
        }

        /* ── STATUS BAR ── */
        .status-bar {
            background: #e8f0fe;
            border-left: 4px solid var(--teal);
            padding: 10px 24px;
            font-size: 12.5px;
            color: var(--teal);
            font-weight: 600;
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }
        .status-bar span { display: flex; align-items: center; gap: 6px; }
        .dot { width: 8px; height: 8px; border-radius: 50%; background: var(--teal); display: inline-block; }

        /* ── REPORT BODY ── */
        .report-body { padding: 28px 32px 36px; }

        /* ── GRID LAYOUT ── */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .span-2 { grid-column: span 2; }
        .span-3 { grid-column: span 3; }

        /* ── SECTION CARD ── */
        .section {
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            break-inside: avoid;
        }
        .section-title {
            background: var(--section-header);
            color: #fff;
            padding: 9px 16px;
            font-family: 'Playfair Display', serif;
            font-size: 14px;
            letter-spacing: .3px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-title .icon { font-size: 13px; opacity: .8; }

        /* ── TABLE ── */
        table { width: 100%; border-collapse: collapse; }
        tr:last-child td { border-bottom: none; }
        td {
            padding: 8px 14px;
            border-bottom: 1px solid #eef0f4;
            vertical-align: top;
            font-size: 13px;
            line-height: 1.5;
        }
        td.label {
            width: 42%;
            background: var(--label-bg);
            font-weight: 600;
            color: var(--muted);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        td.value { color: var(--text); }
        td.value.highlight {
            font-weight: 700;
            color: var(--navy);
            font-size: 14px;
        }

        /* ── VITALS GRID ── */
        .vitals-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 0;
        }
        .vital-cell {
            text-align: center;
            padding: 14px 10px;
            border-right: 1px solid #eef0f4;
        }
        .vital-cell:last-child { border-right: none; }
        .vital-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: var(--muted);
            margin-bottom: 6px;
            font-weight: 600;
        }
        .vital-value {
            font-size: 22px;
            font-family: 'Playfair Display', serif;
            color: var(--navy);
            line-height: 1;
        }
        .vital-unit {
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px;
        }

        /* ── GCS SCORE ── */
        .gcs-total {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 16px;
            background: var(--navy);
            color: #fff;
            grid-row: span 3;
        }
        .gcs-total .big-num {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            line-height: 1;
            color: var(--accent);
        }
        .gcs-total .big-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 4px;
            opacity: .7;
        }

        /* ── DVT BADGE ── */
        .dvt-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .dvt-low  { background: #d1fae5; color: #065f46; }
        .dvt-med  { background: #fef3c7; color: #92400e; }
        .dvt-high { background: #fee2e2; color: #991b1b; }

        /* ── DIVIDER ── */
        .section-divider {
            text-align: center;
            margin: 24px 0 18px;
            position: relative;
        }
        .section-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0; right: 0;
            height: 1px;
            background: var(--border);
        }
        .section-divider span {
            position: relative;
            background: var(--white);
            padding: 0 16px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--muted);
            font-weight: 600;
        }

        /* ── FOOTER ── */
        .report-footer {
            border-top: 2px solid var(--border);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: var(--muted);
            flex-wrap: wrap;
            gap: 8px;
        }
        .report-footer .sig-line {
            border-top: 1px solid #aaa;
            margin-top: 32px;
            padding-top: 6px;
            font-size: 11px;
            color: var(--muted);
            text-align: center;
            min-width: 180px;
        }
        .sig-group { display: flex; gap: 48px; align-items: flex-end; }

        /* ══════════════════════════════════════
           PRINT STYLES
        ══════════════════════════════════════ */
        @media print {
            @page {
                size: A4;
                margin: 14mm 12mm 14mm 12mm;
            }

            body {
                background: #fff;
                padding: 0;
                font-size: 12px;
            }

            .toolbar { display: none !important; }

            #report {
                box-shadow: none;
                border-radius: 0;
                max-width: 100%;
            }

            .report-header {
                padding: 18px 22px 14px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .report-header .hospital-name { font-size: 20px; }

            .status-bar {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                padding: 7px 18px;
            }

            .report-body { padding: 16px 18px 20px; }

            .grid-2 { gap: 12px; margin-bottom: 12px; }
            .grid-3 { gap: 12px; margin-bottom: 12px; }

            .section-title {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                padding: 6px 12px;
                font-size: 12px;
            }

            td { padding: 6px 10px; font-size: 11px; }
            td.label { font-size: 10px; }

            .vital-value { font-size: 18px; }
            .vital-cell { padding: 10px 6px; }

            .gcs-total {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .gcs-total .big-num { font-size: 36px; }

            .section { break-inside: avoid; }

            .report-footer {
                padding: 10px 18px;
            }

            .label-bg {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        /* Compact mode toggle */
        body.compact .report-body { padding: 16px 20px; }
        body.compact td { padding: 5px 10px; font-size: 12px; }
        body.compact .vital-cell { padding: 10px 6px; }
        body.compact .vital-value { font-size: 18px; }
        body.compact .grid-2, body.compact .grid-3 { gap: 12px; margin-bottom: 12px; }
    </style>
</head>
<body>

<!-- Screen toolbar -->
<div class="toolbar">
    <h1>🏥 Hospital Admission Report</h1>
    <div class="toolbar-actions">
        <button class="btn btn-full" onclick="document.body.classList.remove('compact')">Full View</button>
        <button class="btn btn-compact" onclick="document.body.classList.toggle('compact')">Compact View</button>
        <button class="btn btn-print" onclick="window.print()">🖨 Print / Save PDF</button>
    </div>
</div>

<!-- REPORT -->
<div id="report">

    <!-- Banner -->
    <div class="report-header">
        <div>
            <div class="hospital-name">City General Hospital</div>
            <div class="hospital-sub">Department of Clinical Services &nbsp;|&nbsp; Inpatient Admission</div>
        </div>
        <div class="report-meta">
            <strong>ADM-2024-00482</strong>
            Report Date: 11 May 2026 &nbsp;|&nbsp; Time: 09:42
        </div>
    </div>

    <!-- Status bar -->
    <div class="status-bar">
        <span><span class="dot"></span> Patient ID: PT-10234</span>
        <span><span class="dot"></span> Admission: 10 May 2026, 14:30</span>
        <span><span class="dot"></span> Ward: ICU – Bed 7</span>
        <span><span class="dot"></span> Consultant: Dr. R. Ahmed</span>
    </div>

    <div class="report-body">

        <!-- Row 1: Header Info + GCS -->
        <div class="grid-2">

            <!-- Header Info -->
            <div class="section">
                <div class="section-title"><span class="icon">📋</span> Header Information</div>
                <table>
                    <tr><td class="label">Admission ID</td><td class="value highlight">ADM-2024-00482</td></tr>
                    <tr><td class="label">Patient ID</td><td class="value">PT-10234</td></tr>
                    <tr><td class="label">Admission Date</td><td class="value">10 May 2026</td></tr>
                    <tr><td class="label">Initiated At</td><td class="value">14:30 hrs</td></tr>
                    <tr><td class="label">Admission Method</td><td class="value">Emergency</td></tr>
                    <tr><td class="label">Bystander Present</td><td class="value">Yes – Wife</td></tr>
                </table>
            </div>

            <!-- GCS -->
            <div class="section">
                <div class="section-title"><span class="icon">🧠</span> GCS Assessment</div>
                <div style="display:grid; grid-template-columns:1fr auto;">
                    <table>
                        <tr><td class="label">Eyes (E)</td><td class="value">4 — Spontaneous</td></tr>
                        <tr><td class="label">Verbal (V)</td><td class="value">5 — Oriented</td></tr>
                        <tr><td class="label">Motor (M)</td><td class="value">6 — Obeys Commands</td></tr>
                        <tr><td class="label">GCS Total</td><td class="value highlight">15 / 15</td></tr>
                    </table>
                    <div class="gcs-total">
                        <div class="big-num">15</div>
                        <div class="big-label">GCS Score</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Row 2: Vital Signs (full width) -->
        <div class="section" style="margin-bottom:20px;">
            <div class="section-title"><span class="icon">❤️</span> Vital Signs</div>
            <div class="vitals-grid">
                <div class="vital-cell">
                    <div class="vital-label">Temperature</div>
                    <div class="vital-value">98.6</div>
                    <div class="vital-unit">°F</div>
                </div>
                <div class="vital-cell">
                    <div class="vital-label">Pulse Rate</div>
                    <div class="vital-value">82</div>
                    <div class="vital-unit">/min</div>
                </div>
                <div class="vital-cell">
                    <div class="vital-label">Resp. Rate</div>
                    <div class="vital-value">18</div>
                    <div class="vital-unit">/min</div>
                </div>
                <div class="vital-cell">
                    <div class="vital-label">Blood Pressure</div>
                    <div class="vital-value" style="font-size:18px;">120/80</div>
                    <div class="vital-unit">mmHg</div>
                </div>
                <div class="vital-cell">
                    <div class="vital-label">SpO₂</div>
                    <div class="vital-value">98</div>
                    <div class="vital-unit">%</div>
                </div>
            </div>
        </div>

        <!-- Row 3: General Info -->
        <div class="section" style="margin-bottom:20px;">
            <div class="section-title"><span class="icon">🩺</span> General Information</div>
            <div style="display:grid; grid-template-columns:1fr 1fr;">
                <table>
                    <tr><td class="label">General Condition</td><td class="value">Stable</td></tr>
                    <tr><td class="label">Respiratory Support</td><td class="value">Yes</td></tr>
                    <tr><td class="label">Resp. Support Detail</td><td class="value">Nasal Cannula @ 2 L/min</td></tr>
                    <tr><td class="label">Mother Tongue</td><td class="value">Bengali</td></tr>
                    <tr><td class="label">Can Speak</td><td class="value">Yes</td></tr>
                    <tr><td class="label">Has Lines / Drains</td><td class="value">IV Line – Right Forearm</td></tr>
                </table>
                <table>
                    <tr><td class="label">Height</td><td class="value">172 cm</td></tr>
                    <tr><td class="label">Weight</td><td class="value">68 kg</td></tr>
                    <tr><td class="label">Cultural Needs</td><td class="value">Halal diet</td></tr>
                    <tr><td class="label">Allergies</td><td class="value">Penicillin</td></tr>
                    <tr><td class="label">Pain Present</td><td class="value">Yes – VAS 4/10</td></tr>
                    <tr><td class="label">Ventilation Type</td><td class="value">Spontaneous</td></tr>
                </table>
            </div>
        </div>

        <!-- Row 4: Orientation + Personal Aids -->
        <div class="grid-2">

            <div class="section">
                <div class="section-title"><span class="icon">🧭</span> Orientation</div>
                <table>
                    <tr><td class="label">Side Rails Oriented</td><td class="value">Yes</td></tr>
                    <tr><td class="label">Privacy Oriented</td><td class="value">Yes</td></tr>
                    <tr><td class="label">Visitor Policy Oriented</td><td class="value">Yes</td></tr>
                </table>
            </div>

            <div class="section">
                <div class="section-title"><span class="icon">👓</span> Personal Aids</div>
                <table>
                    <tr><td class="label">Dentures</td><td class="value">None</td></tr>
                    <tr><td class="label">Eyewear</td><td class="value">Glasses – stored in locker</td></tr>
                    <tr><td class="label">Hearing Aid</td><td class="value">None</td></tr>
                </table>
            </div>

        </div>

        <!-- Row 5: DVT + System Info -->
        <div class="grid-2" style="margin-top:20px;">

            <div class="section">
                <div class="section-title"><span class="icon">🩸</span> DVT Assessment (Wells Score)</div>
                <table>
                    <tr><td class="label">DVT Wells Total</td><td class="value highlight">3</td></tr>
                    <tr>
                        <td class="label">DVT Risk Level</td>
                        <td class="value">
                            <span class="dvt-badge dvt-high">High Risk</span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="section">
                <div class="section-title"><span class="icon">💻</span> System Information</div>
                <table>
                    <tr><td class="label">Created By</td><td class="value">Nurse A. Hossain (ID: N-0412)</td></tr>
                    <tr><td class="label">Created At</td><td class="value">10 May 2026, 14:45</td></tr>
                    <tr><td class="label">Updated At</td><td class="value">10 May 2026, 17:20</td></tr>
                </table>
            </div>

        </div>

    </div><!-- /report-body -->

    <!-- Footer -->
    <div class="report-footer">
        <div>
            <div>City General Hospital &nbsp;·&nbsp; 42 Hospital Road, Dhaka 1215</div>
            <div style="margin-top:2px;">Tel: +880-2-9876543 &nbsp;·&nbsp; report generated by HMS v3.4</div>
        </div>
        <div class="sig-group">
            <div class="sig-line">Admitting Nurse</div>
            <div class="sig-line">Duty Doctor</div>
            <div class="sig-line">Consultant</div>
        </div>
    </div>

</div><!-- /report -->

</body>
</html>