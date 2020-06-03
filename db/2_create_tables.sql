use nofw;

DROP TABLE IF EXISTS nofw_user;

CREATE TABLE `nofw_user`
(
    `id`            int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name`          varchar(256)     NOT NULL DEFAULT '',
    `email`         varchar(256)     NOT NULL DEFAULT '',
    `password`      varchar(256)     NOT NULL DEFAULT '',
    `status`        tinyint(1)       NOT NULL,
    `last_login`    datetime         NOT NULL,
    `date_created`  datetime         NOT NULL,
    `date_modified` datetime         NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;



DROP TABLE IF EXISTS nofw_task;

CREATE TABLE `nofw_task`
(
    `id`            int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name`          varchar(256)     NOT NULL DEFAULT '',
    `text`         varchar(256)     NOT NULL DEFAULT '',
    `status`        tinyint(1)       NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;