ALTER TABLE `agent_funding_ipay`
MODIFY COLUMN `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT FIRST ,
MODIFY COLUMN `agent_id`  int(11) UNSIGNED NOT NULL AFTER `id`;

ALTER TABLE `ipay_bank_statment`
MODIFY COLUMN `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT FIRST ;