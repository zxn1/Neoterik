ALTER TABLE `competency_mapping`
	ADD COLUMN `cmp_column_index` INT NULL DEFAULT NULL AFTER `cmp_dskpn_id`;

ALTER TABLE `domain_mapping`
	ADD COLUMN `dm_column_index` INT NULL DEFAULT NULL AFTER `dm_dskpn_id`;