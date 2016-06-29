create TABLE project_info
    (
        project INT REFERENCES project_head(project),
        name VARCHAR(80),
        url_name VARCHAR(80),
        spec_link VARCHAR(500),
        img_link VARCHAR(500),
        created INT,
        modified INT
    );


--SELECT name, img_link, created FROM project_info INNER JOIN project_head ON project_info.project=project_head.project WHERE project_head.owner=$account_num;
