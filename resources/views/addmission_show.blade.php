<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body{
            font-family: Arial, sans-serif;
            margin:0;
            padding:20px;
            background:#f4f6f9;
            color:#333;
        }

        .container{
            /* max-width:1000px; */
            margin:auto;
        }

        .card{
            background:#fff;
            padding:10px;
            margin-bottom:10px;
          
        }

        h1{
            margin-bottom:25px;
            text-align:center;
            color:#222;
            font-size:28px;
        }

        h2{
            margin-top:0;
       
            border-bottom:2px solid #eee;
            font-size:15px;
            color:#444;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        td{
            /* padding:px 8px; */
            border-bottom:1px solid #eee;
            vertical-align:top;
        }

        .label{
            width:auto;
            font-weight:bold;
            background:#fafafa;
        }

        .print-btn{
            display:inline-block;
            background:#0d6efd;
            color:#fff;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-size:5px;
            margin-bottom:20px;
        }

        .print-btn:hover{
            background:#0b5ed7;
        }

        @media print {

            body{
                background:#fff;
                padding:0;
            }

            .print-btn{
                display:none;
            }

            .card{
                box-shadow:none;
                border:1px solid #ddd;
                margin-bottom:15px;
            }
        }
    </style>
</head>
<body>

<div class="lg-container">

    <button onclick="window.print()" class="btn" style="background-color: #1a3a5c; color: white;">
        Print 
    </button>

    <h1>Admission Details</h1>

    <!-- Header Information -->
    <div class="row">
      <div class="col-6"> 
            <div class="card">

                    <h2>Header Information</h2>

                    <table>

                        <tr>
                            <td class="label">Admission ID</td>
                            <td>{{ $admission->id }}</td>
                        </tr>
                        <tr>
                            <td class="label">Admission Date</td>
                            <td>{{ $admission->admission_date }}</td>
                        </tr>

                        <tr>
                            <td class="label">Initiated At</td>
                            <td>{{ $admission->initiated_at }}</td>
                        </tr>

                        <tr>
                            <td class="label">Admission Method</td>
                            <td>{{ $admission->admission_method }}</td>
                        </tr>

                        <tr>
                            <td class="label">Bystander Present</td>
                            <td>{{ $admission->bystander_present }}</td>
                        </tr>

                    </table>

                </div>
      </div>

       <div class="col-6">
            <!-- GCS -->
                <div class="card">

                    <h2>GCS Assessment</h2>

                    <table>

                        <tr>
                            <td class="label">GCS Eyes</td>
                            <td>{{ $admission->gcs_eyes }}</td>
                        </tr>

                        <tr>
                            <td class="label">GCS Verbal</td>
                            <td>{{ $admission->gcs_verbal }}</td>
                        </tr>

                        <tr>
                            <td class="label">GCS Motor</td>
                            <td>{{ $admission->gcs_motor }}</td>
                        </tr>

                        <tr>
                            <td class="label">GCS Total</td>
                            <td>
                                {{
                                    ($admission->gcs_eyes ?? 0)
                                    + ($admission->gcs_verbal ?? 0)
                                    + ($admission->gcs_motor ?? 0)
                                }}
                            </td>
                        </tr>

                    </table>

                </div>

       </div>
        <div class="col-12"> 
        <!-- General Information -->
            <div class="card">

                <h2>General Information</h2>

                <table>

                    <tr>
                        <td class="label">General Condition</td>
                        <td>{{ $admission->general_condition }}</td>
                    </tr>

                    <tr>
                        <td class="label">Respiratory Support</td>
                        <td>{{ $admission->respiratory_support }}</td>
                    </tr>

                    <tr>
                        <td class="label">Respiratory Support Detail</td>
                        <td>{{ $admission->respiratory_support_detail }}</td>
                    </tr>

                    <tr>
                        <td class="label">Mother Tongue</td>
                        <td>{{ $admission->mother_tongue }}</td>
                    </tr>

                    <tr>
                        <td class="label">Can Speak</td>
                        <td>{{ $admission->can_speak }}</td>
                    </tr>

                    <tr>
                        <td class="label">Has Lines / Drains</td>
                        <td>{{ $admission->has_lines_drains }}</td>
                    </tr>

                    <tr>
                        <td class="label">Height</td>
                        <td>{{ $admission->height_cm }} cm</td>
                    </tr>

                    <tr>
                        <td class="label">Weight</td>
                        <td>{{ $admission->weight_kg }} kg</td>
                    </tr>

                    <tr>
                        <td class="label">Cultural Needs</td>
                        <td>{{ $admission->cultural_needs }}</td>
                    </tr>

                    <tr>
                        <td class="label">Allergies</td>
                        <td>{{ $admission->allergies }}</td>
                    </tr>

                    <tr>
                        <td class="label">Pain Present</td>
                        <td>{{ $admission->pain_present }}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
 

 

 

    <!-- Vitals -->
    <div class="card">

        <h2>Vital Signs</h2>

        <table>

            <tr>
                <td class="label">Temperature</td>
                <td>{{ $admission->temp_fahrenheit }} °F</td>
            </tr>

            <tr>
                <td class="label">Pulse Rate</td>
                <td>{{ $admission->pulse_per_min }} /min</td>
            </tr>

            <tr>
                <td class="label">Respiratory Rate</td>
                <td>{{ $admission->resp_rate_per_min }} /min</td>
            </tr>

            <tr>
                <td class="label">Blood Pressure</td>
                <td>
                    {{ $admission->bp_systolic }}/{{ $admission->bp_diastolic }} mmHg
                </td>
            </tr>

            <tr>
                <td class="label">SpO2</td>
                <td>{{ $admission->spo2_percent }}%</td>
            </tr>

        </table>

    </div>

    <!-- Ventilation -->
    <div class="card">

        <h2>Ventilation</h2>

        <table>

            <tr>
                <td class="label">Ventilation Type</td>
                <td>{{ $admission->ventilation_type }}</td>
            </tr>

        </table>

    </div>

    <!-- Orientation -->
    <div class="card">

        <h2>Orientation Information</h2>

        <table>

            <tr>
                <td class="label">Side Rails Oriented</td>
                <td>{{ $admission->oriented_side_rails }}</td>
            </tr>

            <tr>
                <td class="label">Privacy Oriented</td>
                <td>{{ $admission->oriented_privacy }}</td>
            </tr>

            <tr>
                <td class="label">Visitor Policy Oriented</td>
                <td>{{ $admission->oriented_visitor_policy }}</td>
            </tr>

        </table>

    </div>

    <!-- Personal Aids -->
    <div class="card">

        <h2>Personal Aids</h2>

        <table>

            <tr>
                <td class="label">Dentures</td>
                <td>{{ $admission->dentures }}</td>
            </tr>

            <tr>
                <td class="label">Eyewear</td>
                <td>{{ $admission->eyewear }}</td>
            </tr>

            <tr>
                <td class="label">Hearing Aid</td>
                <td>{{ $admission->hearing_aid }}</td>
            </tr>

        </table>

    </div>

    <!-- DVT -->
    <div class="card">

        <h2>DVT Assessment</h2>

        <table>

            <tr>
                <td class="label">DVT Wells Total</td>
                <td>{{ $admission->dvt_wells_total }}</td>
            </tr>

            <tr>
                <td class="label">DVT Risk Level</td>
                <td>{{ $admission->dvt_risk_level }}</td>
            </tr>

        </table>

    </div>

    <!-- Created -->
    <div class="card">

        <h2>System Information</h2>

        <table>

            <tr>
                <td class="label">Created By</td>
                <td>{{ $admission->created_by }}</td>
            </tr>

            <tr>
                <td class="label">Created At</td>
                <td>{{ $admission->created_at }}</td>
            </tr>

            <tr>
                <td class="label">Updated At</td>
                <td>{{ $admission->updated_at }}</td>
            </tr>

        </table>

    </div>

</div>
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>