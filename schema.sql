CREATE TABLE IF NOT EXISTS project
(
    project_id int NOT NULL PRIMARY KEY  AUTO_INCREMENT,
    project_name varchar(255) NOT NULL,
    creator_id int NOT NULL,
    FOREIGN KEY (creator_id) REFERENCES user(user_id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS task 
(
    task_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    task_date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    task_status int DEFAULT 0,
    task_name varchar(255) NOT NULL,
    task_file varchar(255),
    task_date_finish varchar(10),
    task_project_id  int NOT NULL,
    FOREIGN KEY (task_project_id) REFERENCES project(project_id) on DELETE CASCADE
);

ALTER TABLE task ADD INDEX `task_name` (`task_name`) ;