create TABLE account_head
    (
        account INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255),
        status VARCHAR(255),
        session VARCHAR(255),
        last_seen int
    );
