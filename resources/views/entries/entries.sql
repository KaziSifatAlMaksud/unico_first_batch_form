

-- ============================================================
-- 1. DATABASE SETUP
-- ============================================================

CREATE DATABASE IF NOT EXISTS hospital_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE hospital_db;


-- ============================================================
-- 2. LOOKUP / REFERENCE TABLES
-- ============================================================

CREATE TABLE IF NOT EXISTS ref_admission_method (
    id      TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    label   VARCHAR(50) NOT NULL
);
INSERT INTO ref_admission_method (label) VALUES
    ('Stretcher'), ('Wheelchair'), ('Ambulatory'), ('Ambulance');

-- ---------------------------------------------------------

CREATE TABLE IF NOT EXISTS ref_respiratory_support (
    id      TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    label   VARCHAR(60) NOT NULL
);
INSERT INTO ref_respiratory_support (label) VALUES
    ('Room air'), ('O2 Mask'), ('NIV'), ('Mechanical Ventilation');

-- ---------------------------------------------------------

CREATE TABLE IF NOT EXISTS ref_ventilation_mode (
    id      TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    label   VARCHAR(30) NOT NULL
);
INSERT INTO ref_ventilation_mode (label) VALUES
    ('CPAP'), ('BiPAP'), ('SIMV'), ('AC');

-- ---------------------------------------------------------

CREATE TABLE IF NOT EXISTS ref_language (
    id      TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    label   VARCHAR(50) NOT NULL
);
INSERT INTO ref_language (label) VALUES
    ('Bangla'), ('English'), ('Hindi'), ('Other');


-- ============================================================
-- 3. CORE PATIENT TABLE (if not already present)
-- ============================================================

CREATE TABLE IF NOT EXISTS patients (
    patient_id      INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    full_name       VARCHAR(150) NOT NULL,
    date_of_birth   DATE,
    gender          ENUM('Male','Female','Other'),
    national_id     VARCHAR(30),
    contact_phone   VARCHAR(20),
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ============================================================
-- 4. MAIN ADMISSION RECORD
-- ============================================================

CREATE TABLE IF NOT EXISTS admission_records (
    admission_id        INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    patient_id          INT UNSIGNED NOT NULL,

    -- Header
    admission_date      DATE            NOT NULL,
    initiated_at        TIME            NOT NULL,
    admission_method_id TINYINT UNSIGNED,               -- FK → ref_admission_method
    bystander_present   BOOLEAN         DEFAULT FALSE,

    -- General
    general_condition   VARCHAR(100),
    resp_support_id     TINYINT UNSIGNED,               -- FK → ref_respiratory_support
    resp_support_detail VARCHAR(100),
    mother_tongue_id    TINYINT UNSIGNED,               -- FK → ref_language
    can_speak_id        TINYINT UNSIGNED,               -- FK → ref_language
    has_lines_drains    BOOLEAN         DEFAULT FALSE,
    height_cm           DECIMAL(5,1),
    weight_kg           DECIMAL(5,1),
    cultural_needs      BOOLEAN         DEFAULT FALSE,
    allergies           BOOLEAN         DEFAULT FALSE,
    pain_present        BOOLEAN         DEFAULT FALSE,

    -- GCS
    gcs_eyes            TINYINT         CHECK (gcs_eyes BETWEEN 1 AND 4),
    gcs_verbal          TINYINT         CHECK (gcs_verbal BETWEEN 1 AND 5),
    gcs_motor           TINYINT         CHECK (gcs_motor BETWEEN 1 AND 6),
    gcs_total           TINYINT         GENERATED ALWAYS AS (gcs_eyes + gcs_verbal + gcs_motor) STORED,

    -- Vital Signs
    temp_fahrenheit     DECIMAL(4,1),
    pulse_per_min       SMALLINT,
    resp_rate_per_min   SMALLINT,
    bp_systolic         SMALLINT,
    bp_diastolic        SMALLINT,
    spo2_percent        TINYINT         CHECK (spo2_percent BETWEEN 0 AND 100),

    -- Ventilation
    ventilation_type    ENUM('None','Invasive','Non-Invasive','Hiflow') DEFAULT 'None',

    -- Orientation
    oriented_side_rails     BOOLEAN DEFAULT FALSE,
    oriented_privacy        BOOLEAN DEFAULT FALSE,
    oriented_visitor_policy BOOLEAN DEFAULT FALSE,

    -- Personal Aids
    dentures    ENUM('No','Upper','Lower','Both')    DEFAULT 'No',
    eyewear     ENUM('No','Glasses','Contact lenses') DEFAULT 'No',
    hearing_aid ENUM('No','Left','Right','Both')     DEFAULT 'No',

    -- DVT Wells Score (stored for audit; individual flags in sub-table)
    dvt_wells_total     SMALLINT DEFAULT 0,
    dvt_risk_level      ENUM('Low','Moderate','High') DEFAULT 'Low',

    -- Metadata
    created_by          INT UNSIGNED,                  -- staff/user id
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_adm_patient   FOREIGN KEY (patient_id)          REFERENCES patients(patient_id),
    CONSTRAINT fk_adm_method    FOREIGN KEY (admission_method_id)  REFERENCES ref_admission_method(id),
    CONSTRAINT fk_adm_resp      FOREIGN KEY (resp_support_id)      REFERENCES ref_respiratory_support(id),
    CONSTRAINT fk_adm_lang1     FOREIGN KEY (mother_tongue_id)     REFERENCES ref_language(id),
    CONSTRAINT fk_adm_lang2     FOREIGN KEY (can_speak_id)         REFERENCES ref_language(id)
);


-- ============================================================
-- 5. LINES / TUBES / DRAINS  (many per admission)
-- ============================================================

CREATE TABLE IF NOT EXISTS admission_lines (
    line_id         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    admission_id    INT UNSIGNED NOT NULL,
    line_type       ENUM(
                        'CV Line','IV Cannula','Foleys Catheta',
                        'ICD','Ryles Tube','Wound Drain',
                        'Tracheostomy Tube','Peg Tube','Pig Line'
                    ) NOT NULL,
    CONSTRAINT fk_line_adm FOREIGN KEY (admission_id) REFERENCES admission_records(admission_id) ON DELETE CASCADE
);


-- ============================================================
-- 6. VENTILATOR PARAMETERS
-- ============================================================

CREATE TABLE IF NOT EXISTS admission_ventilator (
    vent_id             INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    admission_id        INT UNSIGNED NOT NULL UNIQUE,
    mode_id             TINYINT UNSIGNED,               -- FK → ref_ventilation_mode
    rate_breaths_min    SMALLINT,
    tidal_volume_ml     SMALLINT,
    exp_tidal_vol_ml    SMALLINT,
    total_rr            SMALLINT,
    ie_ratio            VARCHAR(10),                    -- e.g. "1:2"
    fio2_percent        TINYINT,
    peep_cpap_cmh2o     DECIMAL(4,1),
    peak_airway_p       DECIMAL(4,1),
    plateau_cmh2o       DECIMAL(4,1),
    flow_l_per_min      DECIMAL(4,1),
    CONSTRAINT fk_vent_adm  FOREIGN KEY (admission_id) REFERENCES admission_records(admission_id) ON DELETE CASCADE,
    CONSTRAINT fk_vent_mode FOREIGN KEY (mode_id)      REFERENCES ref_ventilation_mode(id)
);


-- ============================================================
-- 7. VULNERABILITY ASSESSMENT
-- ============================================================

CREATE TABLE IF NOT EXISTS admission_vulnerability (
    vuln_id                 INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    admission_id            INT UNSIGNED NOT NULL UNIQUE,
    children_under_16       BOOLEAN DEFAULT FALSE,
    adolescent              BOOLEAN DEFAULT FALSE,
    elderly_over_65         BOOLEAN DEFAULT FALSE,
    frail_elderly           BOOLEAN DEFAULT FALSE,
    physically_challenged   BOOLEAN DEFAULT FALSE,
    cognitive_impairment    BOOLEAN DEFAULT FALSE,
    sensory_impairment      BOOLEAN DEFAULT FALSE,
    language_barrier        BOOLEAN DEFAULT FALSE,
    at_risk_of_violence     BOOLEAN DEFAULT FALSE,
    CONSTRAINT fk_vuln_adm FOREIGN KEY (admission_id) REFERENCES admission_records(admission_id) ON DELETE CASCADE
);


-- ============================================================
-- 8. DVT WELLS SCORING (individual criteria flags)
-- ============================================================

CREATE TABLE IF NOT EXISTS admission_dvt_wells (
    dvt_id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    admission_id            INT UNSIGNED NOT NULL UNIQUE,

    -- Each flag maps to its score when TRUE
    active_cancer           BOOLEAN DEFAULT FALSE,  -- +1
    paralysis_immobilized   BOOLEAN DEFAULT FALSE,  -- +1
    bedridden_or_surgery    BOOLEAN DEFAULT FALSE,  -- +1
    localized_tenderness    BOOLEAN DEFAULT FALSE,  -- +1
    entire_leg_swollen      BOOLEAN DEFAULT FALSE,  -- +1
    calf_swelling_3cm       BOOLEAN DEFAULT FALSE,  -- +1
    pitting_oedema          BOOLEAN DEFAULT FALSE,  -- +1
    collateral_veins        BOOLEAN DEFAULT FALSE,  -- +1
    alternative_diagnosis   BOOLEAN DEFAULT FALSE,  -- -2

    -- Computed total (can also be a generated column)
    wells_score             SMALLINT DEFAULT 0,

    CONSTRAINT fk_dvt_adm FOREIGN KEY (admission_id) REFERENCES admission_records(admission_id) ON DELETE CASCADE
);


-- ============================================================
-- 9. INDEXES FOR PERFORMANCE
-- ============================================================

CREATE INDEX idx_adm_patient   ON admission_records(patient_id);
CREATE INDEX idx_adm_date      ON admission_records(admission_date);
CREATE INDEX idx_adm_gcs       ON admission_records(gcs_total);
CREATE INDEX idx_adm_dvt_risk  ON admission_records(dvt_risk_level);
CREATE INDEX idx_lines_adm     ON admission_lines(admission_id);


-- ============================================================
-- 10. SAMPLE DATA INSERT  (mirrors the form screenshot)
-- ============================================================

-- Insert a sample patient first
INSERT INTO patients (full_name, date_of_birth, gender, national_id, contact_phone)
VALUES ('Sample Patient', '1958-03-15', 'Female', 'BD-0000001', '+880-1700-000000');

-- Main admission record
INSERT INTO admission_records (
    patient_id, admission_date, initiated_at,
    admission_method_id, bystander_present,
    general_condition,
    resp_support_id, resp_support_detail,
    mother_tongue_id, can_speak_id,
    has_lines_drains,
    height_cm, weight_kg,
    cultural_needs, allergies, pain_present,
    gcs_eyes, gcs_verbal, gcs_motor,
    temp_fahrenheit, pulse_per_min, resp_rate_per_min,
    bp_systolic, bp_diastolic, spo2_percent,
    ventilation_type,
    oriented_side_rails, oriented_privacy, oriented_visitor_policy,
    dentures, eyewear, hearing_aid,
    dvt_wells_total, dvt_risk_level
) VALUES (
    1, '2026-05-10', '12:20:00',
    1, TRUE,                        -- Stretcher, bystander yes
    'DROWSY',
    1, '15 LI/NRM',                 -- Room air
    1, 1,                           -- Bangla / Bangla
    FALSE,
    NULL, 41.0,
    FALSE, FALSE, FALSE,
    3, 3, 3,                        -- GCS 9
    99.0, 112, NULL,
    120, 90, 97,
    'None',
    FALSE, FALSE, FALSE,
    'No', 'No', 'No',
    0, 'Low'
);

-- Lines (example — add when has_lines_drains = TRUE)
-- INSERT INTO admission_lines (admission_id, line_type) VALUES (1, 'IV Cannula');

-- Vulnerability
INSERT INTO admission_vulnerability (
    admission_id,
    children_under_16, adolescent, elderly_over_65, frail_elderly,
    physically_challenged, cognitive_impairment, sensory_impairment,
    language_barrier, at_risk_of_violence
) VALUES (
    1,
    FALSE, FALSE, TRUE, FALSE,
    FALSE, FALSE, FALSE,
    FALSE, FALSE
);

-- DVT Wells
INSERT INTO admission_dvt_wells (
    admission_id,
    active_cancer, paralysis_immobilized, bedridden_or_surgery,
    localized_tenderness, entire_leg_swollen, calf_swelling_3cm,
    pitting_oedema, collateral_veins, alternative_diagnosis,
    wells_score
) VALUES (
    1,
    FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE,
    0
);


-- ============================================================
-- 11. USEFUL QUERIES
-- ============================================================

-- A) Full admission summary for one patient
SELECT
    ar.admission_id,
    p.full_name,
    ar.admission_date,
    ar.initiated_at,
    ram.label                   AS admitted_via,
    ar.bystander_present,
    ar.general_condition,
    rrs.label                   AS respiratory_support,
    ar.resp_support_detail,
    rl1.label                   AS mother_tongue,
    rl2.label                   AS can_speak,
    ar.weight_kg,
    ar.height_cm,
    ar.gcs_eyes,
    ar.gcs_verbal,
    ar.gcs_motor,
    ar.gcs_total,
    ar.temp_fahrenheit,
    ar.pulse_per_min,
    ar.bp_systolic,
    ar.bp_diastolic,
    ar.spo2_percent,
    ar.ventilation_type,
    ar.dvt_wells_total,
    ar.dvt_risk_level
FROM admission_records ar
JOIN patients              p   ON p.patient_id          = ar.patient_id
LEFT JOIN ref_admission_method  ram ON ram.id            = ar.admission_method_id
LEFT JOIN ref_respiratory_support rrs ON rrs.id          = ar.resp_support_id
LEFT JOIN ref_language     rl1  ON rl1.id               = ar.mother_tongue_id
LEFT JOIN ref_language     rl2  ON rl2.id               = ar.can_speak_id
WHERE ar.patient_id = 1
ORDER BY ar.admission_date DESC;

-- ---------------------------------------------------------
-- B) All lines/drains for an admission
SELECT al.line_type
FROM admission_lines al
WHERE al.admission_id = 1;

-- ---------------------------------------------------------
-- C) Patients with GCS ≤ 8 (severe) admitted today
SELECT
    p.full_name,
    ar.admission_date,
    ar.gcs_total,
    ar.general_condition,
    ar.bp_systolic,
    ar.bp_diastolic,
    ar.spo2_percent
FROM admission_records ar
JOIN patients p ON p.patient_id = ar.patient_id
WHERE ar.gcs_total <= 8
  AND ar.admission_date = CURDATE()
ORDER BY ar.gcs_total ASC;

-- ---------------------------------------------------------
-- D) Patients with HIGH DVT risk
SELECT
    p.full_name,
    ar.admission_date,
    ar.dvt_wells_total,
    ar.dvt_risk_level,
    dw.active_cancer,
    dw.paralysis_immobilized,
    dw.bedridden_or_surgery
FROM admission_records ar
JOIN patients p             ON p.patient_id   = ar.patient_id
JOIN admission_dvt_wells dw ON dw.admission_id = ar.admission_id
WHERE ar.dvt_risk_level = 'High'
ORDER BY ar.dvt_wells_total DESC;

-- ---------------------------------------------------------
-- E) Elderly vulnerable patients admitted this month
SELECT
    p.full_name,
    ar.admission_date,
    ar.general_condition,
    av.elderly_over_65,
    av.frail_elderly,
    av.cognitive_impairment
FROM admission_records ar
JOIN patients p                   ON p.patient_id    = ar.patient_id
JOIN admission_vulnerability av   ON av.admission_id = ar.admission_id
WHERE av.elderly_over_65 = TRUE
  AND MONTH(ar.admission_date) = MONTH(CURDATE())
  AND YEAR(ar.admission_date)  = YEAR(CURDATE());

-- ---------------------------------------------------------
-- F) Daily admission count with average GCS and SpO2
SELECT
    admission_date,
    COUNT(*)                        AS total_admissions,
    ROUND(AVG(gcs_total), 1)        AS avg_gcs,
    ROUND(AVG(spo2_percent), 1)     AS avg_spo2,
    SUM(bystander_present)          AS with_bystander
FROM admission_records
GROUP BY admission_date
ORDER BY admission_date DESC
LIMIT 30;

-- ---------------------------------------------------------
-- G) UPDATE DVT score after ticking criteria
UPDATE admission_dvt_wells
SET
    active_cancer       = TRUE,
    bedridden_or_surgery = TRUE,
    wells_score         = (
        (active_cancer        * 1) +
        (paralysis_immobilized * 1) +
        (bedridden_or_surgery  * 1) +
        (localized_tenderness  * 1) +
        (entire_leg_swollen    * 1) +
        (calf_swelling_3cm     * 1) +
        (pitting_oedema        * 1) +
        (collateral_veins      * 1) +
        (alternative_diagnosis * -2)
    )
WHERE admission_id = 1;

-- Sync the risk level in the main record
UPDATE admission_records ar
JOIN admission_dvt_wells dw ON dw.admission_id = ar.admission_id
SET
    ar.dvt_wells_total = dw.wells_score,
    ar.dvt_risk_level  = CASE
        WHEN dw.wells_score >= 3 THEN 'High'
        WHEN dw.wells_score >= 1 THEN 'Moderate'
        ELSE 'Low'
    END
WHERE ar.admission_id = 1;

-- ---------------------------------------------------------
-- H) STORED PROCEDURE — Insert full admission in one call
DELIMITER $$

CREATE PROCEDURE sp_insert_admission (
    IN  p_patient_id            INT UNSIGNED,
    IN  p_admission_date        DATE,
    IN  p_initiated_at          TIME,
    IN  p_admission_method_id   TINYINT UNSIGNED,
    IN  p_bystander             BOOLEAN,
    IN  p_condition             VARCHAR(100),
    IN  p_resp_support_id       TINYINT UNSIGNED,
    IN  p_resp_detail           VARCHAR(100),
    IN  p_weight_kg             DECIMAL(5,1),
    IN  p_gcs_e                 TINYINT,
    IN  p_gcs_v                 TINYINT,
    IN  p_gcs_m                 TINYINT,
    IN  p_temp                  DECIMAL(4,1),
    IN  p_pulse                 SMALLINT,
    IN  p_resp_rate             SMALLINT,
    IN  p_bp_sys                SMALLINT,
    IN  p_bp_dia                SMALLINT,
    IN  p_spo2                  TINYINT,
    OUT p_new_admission_id      INT UNSIGNED
)
BEGIN
    INSERT INTO admission_records (
        patient_id, admission_date, initiated_at,
        admission_method_id, bystander_present,
        general_condition,
        resp_support_id, resp_support_detail,
        weight_kg,
        gcs_eyes, gcs_verbal, gcs_motor,
        temp_fahrenheit, pulse_per_min, resp_rate_per_min,
        bp_systolic, bp_diastolic, spo2_percent
    ) VALUES (
        p_patient_id, p_admission_date, p_initiated_at,
        p_admission_method_id, p_bystander,
        p_condition,
        p_resp_support_id, p_resp_detail,
        p_weight_kg,
        p_gcs_e, p_gcs_v, p_gcs_m,
        p_temp, p_pulse, p_resp_rate,
        p_bp_sys, p_bp_dia, p_spo2
    );

    SET p_new_admission_id = LAST_INSERT_ID();

    -- Auto-create blank vulnerability and DVT rows
    INSERT INTO admission_vulnerability (admission_id) VALUES (p_new_admission_id);
    INSERT INTO admission_dvt_wells     (admission_id) VALUES (p_new_admission_id);
END$$

DELIMITER ;

-- Example call:
-- CALL sp_insert_admission(1,'2026-05-10','12:20:00',1,TRUE,'DROWSY',1,'15 LI/NRM',41.0,3,3,3,99.0,112,NULL,120,90,97, @new_id);
-- SELECT @new_id;


-- ============================================================
-- 12. CLEANUP (run only in dev/testing)
-- ============================================================
-- DROP PROCEDURE IF EXISTS sp_insert_admission;
-- DROP TABLE IF EXISTS admission_dvt_wells, admission_vulnerability,
--     admission_ventilator, admission_lines, admission_records,
--     patients, ref_language, ref_ventilation_mode,
--     ref_respiratory_support, ref_admission_method;
-- DROP DATABASE IF EXISTS hospital_db;