create TABLE project_info
    (
        project INT REFERENCES project_head(project),
        name VARCHAR(80),
        spec_link VARCHAR(500),
        img_link VARCHAR(500),
        created INT,
        modified INT
    );
