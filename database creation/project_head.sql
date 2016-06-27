create TABLE project_head
    (
        project INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        owner INT REFERENCES account_head(account)
    );
