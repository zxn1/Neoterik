ALTER TABLE domain_mapping DROP FOREIGN KEY FK_domain_mapping_domain;
ALTER TABLE competency_mapping DROP FOREIGN KEY FK_competency_mapping_core_competency;
ALTER TABLE standard_performance DROP FOREIGN KEY FK_standard_performance_dskp;
ALTER TABLE standard_performance_dskp_mapping DROP FOREIGN KEY FK_standard_performance_dskp_mapping_dskp;

START TRANSACTION;
ALTER TABLE activity_item
MODIFY COLUMN aci_desc TEXT COLLATE 'utf8mb4_general_ci';

ALTER TABLE assessment_item
MODIFY COLUMN asi_desc TEXT COLLATE 'utf8mb4_general_ci';

ALTER TABLE cluster_main
MODIFY COLUMN ctm_desc VARCHAR(254) COLLATE 'utf8mb4_general_ci';

ALTER TABLE cluster_main
MODIFY COLUMN ctm_code VARCHAR(254) COLLATE 'utf8mb4_general_ci';

ALTER TABLE core_competency
MODIFY COLUMN cc_desc VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE dskpn
MODIFY COLUMN dskpn_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE dskpn
MODIFY COLUMN dskpn_theme VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE dskpn
MODIFY COLUMN dskpn_sub_theme VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE dskpn
MODIFY COLUMN dskpn_remarks VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE dskpn
MODIFY COLUMN dskpn_delete_reason VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE learning_aid
MODIFY COLUMN la_desc VARCHAR(254) COLLATE 'utf8mb4_general_ci';

ALTER TABLE learning_standard_item
MODIFY COLUMN lsi_desc VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE objective_performance
MODIFY COLUMN opm_number VARCHAR(10) COLLATE 'utf8mb4_general_ci';

ALTER TABLE objective_performance
MODIFY COLUMN opm_desc LONGTEXT COLLATE 'utf8mb4_general_ci';

ALTER TABLE opm_assessment_code
MODIFY COLUMN oac_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE opm_reff_code
MODIFY COLUMN orc_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE standard_performance
MODIFY COLUMN sp_tp_level_desc VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE standard_performance
MODIFY COLUMN sp_dskp_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE standard_performance_dskp_mapping
MODIFY COLUMN spdm_dskp_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE subject_main
MODIFY COLUMN sbm_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE subject_main
MODIFY COLUMN sbm_desc VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE teaching_approach
MODIFY COLUMN tapp_desc VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE teaching_approach_category
MODIFY COLUMN tappc_desc VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE assessment_item
MODIFY COLUMN asi_desc_number VARCHAR(10) COLLATE 'utf8mb4_general_ci';

ALTER TABLE competency_mapping
MODIFY COLUMN cmp_cc_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE core_competency
MODIFY COLUMN cc_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE domain
MODIFY COLUMN dmn_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE domain
MODIFY COLUMN dmn_desc VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE domain_group
MODIFY COLUMN dg_title VARCHAR(255) COLLATE 'utf8mb4_general_ci';

ALTER TABLE domain_mapping
MODIFY COLUMN dm_dmn_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';

ALTER TABLE dskp
MODIFY COLUMN dskp_code VARCHAR(50) COLLATE 'utf8mb4_general_ci';
COMMIT;

ALTER TABLE domain_mapping
ADD CONSTRAINT FK_domain_mapping_domain FOREIGN KEY (dm_dmn_code) REFERENCES domain(dmn_code);

ALTER TABLE competency_mapping
ADD CONSTRAINT FK_competency_mapping_core_competency
FOREIGN KEY (cmp_cc_code, cmp_cc_batch)
REFERENCES core_competency(cc_code, cc_batch);

ALTER TABLE standard_performance
ADD CONSTRAINT FK_standard_performance_dskp
FOREIGN KEY (sp_dskp_code, sp_dskp_batch)
REFERENCES dskp(dskp_code, dskp_batch);

ALTER TABLE standard_performance_dskp_mapping
ADD CONSTRAINT FK_standard_performance_dskp_mapping_dskp
FOREIGN KEY (spdm_dskp_code, spdm_dskp_batch)
REFERENCES dskp(dskp_code, dskp_batch);

