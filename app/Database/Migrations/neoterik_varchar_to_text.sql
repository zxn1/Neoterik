ALTER TABLE `learning_standard_item`
	CHANGE COLUMN `lsi_desc` `lsi_desc` TEXT NULL COLLATE 'utf8mb4_general_ci' AFTER `lsi_number`;

ALTER TABLE `standard_performance`
	CHANGE COLUMN `sp_tp_level_desc` `sp_tp_level_desc` TEXT NULL COLLATE 'utf8mb4_general_ci' AFTER `sp_tp_level`;