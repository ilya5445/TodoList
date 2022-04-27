CREATE TABLE `works` (
   `id` INTEGER PRIMARY KEY   AUTOINCREMENT,
   `name`           TEXT      NOT NULL,
   `email`          TEXT      NOT NULL,
   `text`        CHAR(50),
   `status` INTEGER,
   `is_edit` INTEGER,
   `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TRIGGER [UpdateLastTime]
AFTER UPDATE
ON `works`
FOR EACH ROW
BEGIN
UPDATE `works` SET `updated` = CURRENT_TIMESTAMP WHERE id = old.id;
END