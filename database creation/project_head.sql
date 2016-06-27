create TABLE project_head
    (
        project INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        owner INT REFERENCES account_head(account)
    );


--SELECT * FROM project_info INNER JOIN project_head ON project_info.project=project_head.project WHERE project_head.owner=$account_num;
