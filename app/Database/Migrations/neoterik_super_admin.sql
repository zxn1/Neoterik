INSERT INTO `staff_main` (`sm_fullname`, `sm_nickname`, `sm_title`, `sm_icno`, `sm_ic_type`, `sm_gender`, `sm_race`, `sm_religion`, `sm_flag`, `sm_status`) VALUES ('SUPER ADMIN', 'ADMIN', '01', 'admin', 'KP', 'M', 'M', 'I', '1', '1');

INSERT INTO `login_staff_main` (`lsm_sm_recid`, `lsm_password`, `lsm_created_at`, `lsm_updated_at`) VALUES ((SELECT `sm_recid` FROM `staff_main` WHERE `sm_fullname` = 'SUPER ADMIN' AND `sm_nickname` = 'ADMIN'), '$2y$10$MVfI0OU4qVpIfYp/nx46rOaPssFRVg3sIEs4jooDC5eUOLae96NeS', '2025-05-20 23:06:54', '2025-05-20 23:06:55');

INSERT INTO `access_roles` (`ar_name`, `ar_desc`) VALUES ('Admin', 'ADMIN');

INSERT INTO `user_access_roles` (`uar_ar_id`, `uar_sm_recid`, `uar_isChecked`) VALUES ((SELECT `ar_id` FROM `access_roles` WHERE `ar_name` = 'Admin' AND `ar_desc` = 'ADMIN'), (SELECT `sm_recid` FROM `staff_main` WHERE `sm_fullname` = 'SUPER ADMIN' AND `sm_nickname` = 'ADMIN'), '1');