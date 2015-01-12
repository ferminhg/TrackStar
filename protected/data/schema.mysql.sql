ALTER TABLE `tbl_issue` 
ADD INDEX `FK_issue_project_idx` (`project_id` ASC);
ALTER TABLE `tbl_issue` 
ADD CONSTRAINT `FK_issue_project`
  FOREIGN KEY (`project_id`)
  REFERENCES `tbl_project` (`id`)
  ON DELETE CASCADE
  ON UPDATE RESTRICT;

ALTER TABLE `tbl_issue` 
ADD INDEX `FK_issue_owner_idx` (`owner_id` ASC);
ALTER TABLE `tbl_issue` 
ADD CONSTRAINT `FK_issue_owner`
  FOREIGN KEY (`owner_id`)
  REFERENCES `tbl_user` (`id`)
  ON DELETE CASCADE
  ON UPDATE RESTRICT;

ALTER TABLE `tbl_issue` 
ADD INDEX `FK_issue_requester_idx` (`requester_id` ASC);
ALTER TABLE `tbl_issue` 
ADD CONSTRAINT `FK_issue_requester`
  FOREIGN KEY (`requester_id`)
  REFERENCES `tbl_project` (`id`)
  ON DELETE CASCADE
  ON UPDATE RESTRICT;

  ALTER TABLE `tbl_project_user_assignment` 
ADD CONSTRAINT `FK_project_user`
  FOREIGN KEY (`project_id`)
  REFERENCES `tbl_project` (`id`)
  ON DELETE CASCADE
  ON UPDATE RESTRICT;

ALTER TABLE `tbl_project_user_assignment` 
ADD INDEX `FK_user_project_idx` (`user_id` ASC);
ALTER TABLE `tbl_project_user_assignment` 
ADD CONSTRAINT `FK_user_project`
  FOREIGN KEY (`user_id`)
  REFERENCES `tbl_user` (`id`)
  ON DELETE CASCADE
  ON UPDATE RESTRICT;



INSERT INTO `tbl_user`
  (`email`, `username`, `password`)
VALUES
  ('test1@notanaddress.com','Test_User_One', MD5('test1')),
  ('test2@notanaddress.com','Test_User_Two', MD5('test2'))
;