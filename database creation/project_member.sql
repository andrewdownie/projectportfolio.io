create TABLE project_member
    (
        project INT REFERENCES project_head(project),
        account INT REFERENCES account_head(account),
        role VARCHAR(255),
        --probably need more fields here to describe what permissions
        --    this account has for the associated project
        date_added INT,
    );
