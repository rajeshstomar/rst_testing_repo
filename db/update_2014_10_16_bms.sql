INSERT INTO `purse_master` (`id`, `bank_id`, `product_id`, `global_purse_id`, `code`, `name`, `description`, `max_balance`, `allow_remit`, `allow_mvc`, `load_channel`, `load_validity_day`, `load_validity_hr`, `load_validity_min`, `load_min`, `load_max`, `load_max_cnt_daily`, `load_max_val_daily`, `load_max_cnt_monthly`, `load_max_val_monthly`, `load_max_cnt_yearly`, `load_max_val_yearly`, `txn_restriction_type`, `txn_upload_list`, `txn_min`, `txn_max`, `txn_max_cnt_daily`, `txn_max_val_daily`, `txn_max_cnt_monthly`, `txn_max_val_monthly`, `txn_max_cnt_yearly`, `txn_max_val_yearly`, `priority`, `date_start`, `date_created`, `date_updated`, `by_ops_id`, `status`) VALUES (NULL, '3', '23', '1', 'BRC923', 'Ratnakar BMS Recharge wallet', 'Ratnakar BMS Recharge wallet', '50000', 'yes', 'no', 'api', '0', '0', '0', '750', '50000', '0', '0', '0', '200000', '0', '0', 'mcc', 'yes', '1', '10000', '0', '0', '0', '200000', '0', '0', '2', '2014-09-09 15:15:32', '2014-09-09 15:15:32', '2014-09-09 15:15:32', '101', 'active');

UPDATE `purse_master` SET `product_id` = '23', `code` = 'BPR923', `name` = 'Ratnakar BMS Promotional Wallet', `description` = 'Ratnakar BMS Promotional Wallet' WHERE `purse_master`.`code` = 'BMS923';