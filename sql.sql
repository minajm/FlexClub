/*
create the database
*/
create database hassanProject;


/*
create user table
*/
CREATE TABLE `hassanProject`.`user`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `first_name`    VARCHAR(150) NOT NULL,
    `last_name`     VARCHAR(150) NOT NULL,
    `email`         VARCHAR(100) NOT NULL,
    `password`      VARCHAR(255) NOT NULL,
    `role`          INT(1)       NOT NULL,
    `status`        INT(1)       NOT NULL,
    `membership_id` int(10),
    `class_id`      int(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`membership_id`) REFERENCES membership (`id`),
    FOREIGN KEY (`class_id`) REFERENCES class (`id`)
);

/*
editing user table to add additional columns
*/
ALTER TABLE `hassanProject`.`user`
    ADD `gender`        CHAR(1)      NOT NULL AFTER `last_name`,
    ADD `age`           INT(2)       NOT NULL AFTER `gender`,
    ADD `height`        INT(3)       NOT NULL AFTER `age`,
    ADD `weight`        INT(3)       NOT NULL AFTER `height`,
    ADD `mobile_number` INT(20)      NOT NULL AFTER `weight`,
    ADD `address`       VARCHAR(255) NOT NULL AFTER `mobile_number`;


/*
create testimonial table

*/
CREATE TABLE `hassanproject`.`testimonial`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `reviewer_name` VARCHAR(255) NOT NULL,
    `review_body`   VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);


/*
edit table testimonial to add approved_by_admin column
*/
ALTER TABLE `testimonial`
    ADD `approved_by_admin` INT(1) NOT NULL DEFAULT '0' AFTER `review_body`;


/*
create contact_us table

*/
CREATE TABLE `hassanproject`.`contact_us`
(
    `id`           INT          NOT NULL AUTO_INCREMENT,
    `name`         VARCHAR(255) NOT NULL,
    `subject`      VARCHAR(255) NOT NULL,
    `email`        VARCHAR(255) NOT NULL,
    `phone_number` INT(20)      NOT NULL,
    `body`         TEXT         NOT NULL,
    PRIMARY KEY (`id`)
);


/*
create membership table
*/
CREATE TABLE `hassanproject`.`membership`
(
    `id`   INT(10)      NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;


/*
    insert the three membership categories
 */
INSERT INTO `membership` (`id`, `name`)
VALUES (NULL, 'golden'),
       (NULL, 'silver'),
       (NULL, 'bronze');

/*
 add column summery to membership
 */
ALTER TABLE `membership`
    ADD `summery` TEXT NOT NULL AFTER `name`;

/*
add fee column to membership
 */
ALTER TABLE `membership`
    ADD `fee` INT(10) NOT NULL AFTER `summery`;


/*
 create class table
 */
CREATE TABLE `hassanproject`.`class`
(
    `id`         INT          NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(255) NOT NULL,
    `summery`    TEXT         NOT NULL,
    `photo_link` TEXT         NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

/*
 add class_id column to user table
 */
ALTER TABLE user
    ADD COLUMN class_id int(10);


/*
 insert dummy data for class table
 */
INSERT INTO `class` (`id`, `name`, `summery`, `photo_link`)
VALUES (NULL, 'Karatee', 'a Karatee responsible of bla bla bla  ', 'image/classes/aqary.png');